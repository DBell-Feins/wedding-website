#_require us-states.coffee

###global jQuery:true, L:true, statesData:true ###

class DashboardMap extends Singleton
  @selected = {}
  @geojson = {}

  @map = L.map("map",
    maxZoom: 4
  ).setView([37.8, -96], 4)
  cloudmade = L.tileLayer("http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png",
    attribution: "Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade"
    key: "BC9A493B41014CAABB98F0471D759707"
    styleId: 22677
  ).addTo @map

  @style: ->
    weight: 0.3
    opacity: 1
    color: "black"
    dashArray: ""
    fillOpacity: 0.7
    fillColor: "#FED976"

  @highlightFeature: (e) =>
    layer = e.target
    layer.setStyle
      weight: 2
      color: "red"
      dashArray: ""
      fillOpacity: 0.7
    layer.bringToFront()  if not L.Browser.ie and not L.Browser.opera
    @info.update layer.feature.properties
    return

  @resetHighlight: (e, target) =>
    target = (if (typeof target is "undefined") then e.target else target)
    if @selected isnt e.target
      @geojson.resetStyle target
      @info.update()
    return

  @clickFeature: (e) =>
    @resetHighlight e, @selected
    @selected = e.target
    @highlightFeature e
    $("#event-processor").data "state", e.target.feature.properties.name
    $("#event-processor").trigger "click", e.target.feature
    $("div.clear").show()
    return

  @onEachFeature: (feature, layer) =>
    layer.on
      mouseover: @highlightFeature
      mouseout: @resetHighlight
      click: @clickFeature
    return


  @ClearControl = L.Control.extend(
    options:
      position: "topright"

    onAdd: =>
      container = L.DomUtil.create("div", "clear")
      $(container).html("<a class=\"clear\">Clear</a>").hide()
      selected = @selected
      $(container).on "click", (ev) =>
        @geojson.setStyle @style()
        $("#event-processor").data("state", "National")
        $("#event-processor").trigger "click", ""
        $(ev.currentTarget).hide()
        @selected = {}
        return
      container
  )
  @InfoControl = L.Control.extend(
    onAdd: ->
      @_div = L.DomUtil.create("div", "info")
      @update()
      @_div
    update: (props) ->
      @_div.innerHTML = ((if props then "<b>" + props.name + "</b>" else "Hover over a state"))
      return
  )

  @clear = new @ClearControl()
  @info = new @InfoControl()
  @map.addControl @clear
  @map.addControl @info
  @geojson = L.geoJson(statesData,
    style: @style
    onEachFeature: @onEachFeature
  ).addTo @map


DashboardMap.get()