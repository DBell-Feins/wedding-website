#_require map.coffee
#_require ajax.coffee

class Events extends Singleton
  constructor: ->
    $("#event-processor").on("click", (e, feature) ->
      state = (if (typeof feature is "object") then feature.properties.name else "National")
      state = state.replace(" ", "+");
      single = false
      if state == "National"
        single = true
      obj = AJAX.getConfig()
      obj.state = state
      AJAX.setConfig obj
      AJAX.submitQuery state
      return
    )

    $("#filters input:radio").on("change", ->
      single = false
      state = $("#event-processor").data("state")
      state = state.replace(" ", "+");
      if state == "National"
        single = true
      propVal = $(this).val();

      # set config object
      obj = AJAX.getConfig()
      if state == "National" and propVal == ""
        obj[$(this).prop("name")] = "Total"
      else
        obj[$(this).prop("name")] = propVal
      obj.state = state
      AJAX.setConfig obj

      AJAX.submitQuery state
      return
    )