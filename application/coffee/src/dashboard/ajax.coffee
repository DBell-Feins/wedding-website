#_require ../global/singleton.coffee
#_require us-states.coffee
#_require map.coffee
#_require charts.coffee

###global jQuery:true, L:true, ApiUrl:true, queryResponse:true, Charts:true ###

###*
 * Class responsible for handling AJAX requests
###
class AJAX extends Singleton

    ###*
     * The config object
     * @type {object}
    ###
    @props =
      state: ""
      race: ""
      ethnicity: ""

    ###*
     * Getter for the config object
     * @return {object} The config object
    ###
    @getConfig: ->
      @props

    ###*
     * Setter for the config object
     * @param {object} obj The new config object
    ###
    @setConfig: (obj) ->
      @props = obj

    ###*
     * Assembles the query string so we hit the right API endpoint
     * @return {string}          The query string
    ###
    @queryString: ->
      str = ""
      localProps = $.extend(true, {}, @props)
      for prop of localProps
        if localProps[prop] != ""
          str += "/" + prop + "/" + localProps[prop];
      str

    ###*
     * Issues the query
     * @return {object}          jQuery $.deferred object
    ###
    @query: ->
      url = ApiUrl + @queryString()
      return $.get(url)

    ###*
     * Processes numeric values being returned as strings from the server
     * @param  {object} data The data being parsed
     * @return {array}      An array of normalized data
    ###
    @normalize: (data) ->
      if (typeof data == "string")
        return data
      arr = [];
      for value in data
        for prop of value
          if isNaN(parseFloat(value[prop])) == false
            if prop == "year"
              value[prop] = Date.UTC(value[prop], 0, 1)
            else
              value[prop] = parseFloat value[prop]

        arr.push value
      arr

    ###*
     * The query issuer/broker
     *
     * Responsible for issuing the query and handling responses
     *
     * @param  {string} state  State/National depending on the context of the query
    ###
    @submitQuery: (state) ->
      response = {}
      query = AJAX.query()
      $.when(query).then((queryResults) =>
        for key, result of queryResults
          #if key != "state_name"
          response[key] = AJAX.normalize result
          #else
           # response[key] = result

        root.queryResponse = response
        Table.createTable(queryResults, state)
        Charts.draw()
        return
      )
      return

AJAX.get()