Highcharts.setOptions(
  global:
    useUTC: false
)

$(=>
  if typeof rsvp != "undefined"
    categories = []
    attending = []
    declined = []
    for time, item of rsvp
      d = Date.parse(moment(time * 1e3).toString())
      attending.push [d, item.attending]
      declined.push [d, item.declined]

    $("#meals").highcharts(
      chart:
        type: "column"
      title:
        text: "Meals"
      xAxis:
        categories: ["Chicken", "Beef", "Vegetarian"]
      yAxis:
        title:
          text: "Orders"
      series: [
        name: "Count",
        data: [meals.chicken, meals.beef, meals.vegetarian]
      ]
    )

    $("#rsvp-time").highcharts(
      chart:
        type: "spline"
        zoomType: "x"
      title:
        text: "Attending/Not Attending Over Time"
      xAxis:
        type: "datetime"
        labels:
          y: 20
          rotation: -45
          align: "right"
        dateTimeLabelFormats:
          day: "%b %e, %Y"
          hour: "%l:%M %p"
          minute: "%l:%M %p"
      yAxis:
        title:
          text: "Count"
      series: [
        name: "Attending"
        data: attending
      ,
        name: "Not Attending"
        data: declined
      ]
      tooltip:
        formatter: ->
          dateObj = Highcharts.dateFormat "%b %e, %Y %l:%M:%S %p", this.x
          "<b> #{this.series.name}: #{this.y}</b><br/> #{dateObj}";
      legend:
        margin: 40
    )
  return
)
