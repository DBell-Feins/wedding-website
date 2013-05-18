#_require ../global/singleton.coffee

class Charts extends Singleton
  ###*
   * The charts this object is working with
   * @type {array}
  ###
  @charts: []

  ###*
   * Converts the data from our query form to chart form
   * @param  {obj}    data   An object containing the data
   * @param  {string} column The db column we need data from
   * @return {array}         An array of points to plot on a chart
  ###
  @prep = (data, column) ->
    cleaned = []
    if data.length == 0
      return cleaned
    else
      for year in data
        val = null
        if typeof year[column] != "string"
          val = year[column]
        cleaned.push [year["year"], val]
      return cleaned

  ###*
   * Function to populate charts
   * @return {null} Doesn't return anything but we don't want coffee implying a return
  ###
  @populate = (chartName, chartObj, data) ->
    for index, query of data
      if query.length > 0 and index != "state_name"
        switch index
          when 'region'
            name = query[0].name
            color = Charts.config.Region.color
            symbol = Charts.config.Region.marker
          when 'state'
            name = query[0].state_national
            color = Charts.config.State.color
            symbol = Charts.config.State.marker
          when 'national'
            name = query[0].state_national
            symbol = Charts.config.National.marker
            color = Charts.config.National.color
        newSeries =
          name: name
          data: Charts.prep query, chartName
          color: color
          marker:
            symbol: symbol
          pointInterval: 24 * 3600 * 1000 * 365
        chartObj.addSeries newSeries, false
    return

  ###*
   * Retrieves data from global object and delegates it to the populate() function
  ###
  @draw = ->
    data = root.queryResponse
    for chartName, chartObj of Charts.charts
      chartObj.series[0].remove(true) while chartObj.series.length > 0
      Charts.populate(chartName, chartObj, data)
      chartObj.redraw()
    return

  ###*
   * Default chart options
   * @type {object}
  ###
  @chartOpts:
    chart:
      type: "line"
    xAxis:
      title:
        text: "Year"
      type: "datetime"
      dateTimeLabelFormats:
        year: "%Y"
    yAxis:
      title:
        text: "Rate"
      min: 0
      #max: 20 # We might want to leave this as a free value until we get better data
    tooltip:
      crosshairs: true
      formatter: () ->
        return "<b>#{this.series.name}</b><br/>#{Highcharts.dateFormat("%Y", this.x)}: #{this.y}";
    plotOptions:
      line:
        dataLabels:
          enabled: true

  ###*
   * User-supplied configuration object
   * @type {Object}
  ###
  @config = {}

  ###*
   * Constructor
   * @param  {object} obj Object that contains 2 keys: config and charts
  ###
  constructor: (obj) ->
    Highcharts.setOptions(Charts.chartOpts)
    Charts.config = obj.config
    for value in obj.charts
      if hp2020[value] != null
        plotLines = [{
          color: Charts.config.HP2020.color
          width: Charts.config.HP2020.width
          value: hp2020[value]
          dashStyle: Charts.config.HP2020.dashStyle
          label:
            text: "HP2020: " + hp2020[value]
            align: "left"
            style: Charts.config.HP2020.style
          id: "hp2020"
        }]
      else
        plotLines = []
      Charts.charts[value] = new Highcharts.Chart(
        chart:
          renderTo: value
        title:
          text: $("#" + value).data("title")
        rangeSelector:
          selected: 1
        yAxis:
          plotLines: plotLines
      , (chart) ->
        #chart.yAxis[0].plotLinesAndBands[0].label.toFront()
        return
      )