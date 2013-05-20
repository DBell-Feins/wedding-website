#_require events.coffee
if typeof L != 'undefined'
  class Map extends Singleton
    @L = root.L
    @L.Icon.Default.imagePath = '/img/vendor'
    @ConfigItems =
      cloudmadeUrl: 'http://{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.jpg'
      subDomains: ['otile1','otile2','otile3','otile4']
      cloudmadeAttrib: 'Data, imagery and map information provided by <a href="http://open.mapquest.com" target="_blank">MapQuest</a>, <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> and contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/" target="_blank">CC-BY-SA</a>'
      tileLayerObj: {}
      layer: {}
      mapConfig: {}

    @MapObjects =
      venue:
        loc: new @L.LatLng 42.2446341, -72.0185379
        str: '<div id="" class="vcard"><div class="org"><a href="http://www.zukas.com/">Zukas Hilltop Barn</a></div><div class="adr"><div class="street-address">89 Smithville Road</div><span class="locality">Spencer</span>,<span class="region">MA</span>,<span class="postal-code">01562</span></div><div class="tel">(508) 885-5320</div></div>'
        title: 'Zukas Hilltop Barn'
        marker: {}
      hotel:
        loc: new @L.LatLng 42.113588, -72.089949
        str: '<div id="" class="vcard"><div class="org"><a href="http://www.sturbridgehosthotel.com/">Sturbridge Host Hotel & Conference Center</a></div><div class="adr"><div class="street-address">366 Main Street</div><span class="locality">Sturbridge</span>,<span class="region">MA</span>,<span class="postal-code">01566</span></div><div class="tel">(508) 347-7393</div></div>'
        title: 'Sturbridge Host Hotel &amp; Conference Center'
        marker: {}
      locations: {}
      markerArgs: {}

    @map = {}
    @currentLoc = ''

    @setMarkers: (args) ->
      loc = args.loc
      $.each(args.locations, ->
        @marker.bindPopup(this.str + '<a href="https://maps.google.com/maps?saddr=' + loc + '&daddr=' + @daddr + '&z=9" target="_blank">Get directions</a>');
        return
      )
      return

    @init: ->
      # Location services and event handlers
      Map.map.locate();

      Map.map.on('locationfound', Map.onLocationFound);
      Map.map.on('locationerror', Map.onLocationError);

      # Set markers and provide callbacks for locationfound and locationerror
      Map.setMarkers Map.MapObjects.markerArgs
      return

    @onLocationError: ->
      Map.setMarkers Map.MapObjects.markerArgs

    @onLocationFound: (e) ->
      Map.currentLoc = e.latlng.lat + ', ' + e.latlng.lng
      Map.MapObjects.markerArgs.loc = Map.currentLoc
      Map.setMarkers Map.MapObjects.markerArgs

    ###*
     * Constructor
     * @return {void}
    ###
    constructor: () ->
      Map.ConfigItems.tileLayerObj =
        maxZoom: 18,
        attribution: Map.ConfigItems.cloudmadeAttrib,
        subdomains: Map.ConfigItems.subDomains,
        reuseTiles: true

      Map.ConfigItems.layer = new @L.TileLayer Map.ConfigItems.cloudmadeUrl, Map.ConfigItems.tileLayerObj
      Map.ConfigItems.mapConfig =
        zoom: 13
        layers: [Map.ConfigItems.layer]
        center: Map.MapObjects.venue.loc

      Map.MapObjects.locations = @L.layerGroup [Map.MapObjects.venue.loc, Map.MapObjects.hotel.loc]


      Map.map = new @L.Map 'map-modal', Map.ConfigItems.mapConfig

      Map.MapObjects.hotel.marker = @L.marker Map.MapObjects.hotel.loc
      Map.MapObjects.venue.marker = @L.marker Map.MapObjects.venue.loc


      Map.MapObjects.markerArgs =
        loc: ''
        locations:
          hotel:
            marker: Map.MapObjects.hotel.marker
            str: Map.MapObjects.hotel.str
            daddr: 'Sturbridge+Host+Hotel+Sturbridge,+MA,+01566'
          venue:
            marker: Map.MapObjects.venue.marker
            str: Map.MapObjects.venue.str
            daddr: 'Zukas+Hilltop+Barn+Spencer,+MA,+01562'

      Map.ConfigItems.layer.addTo Map.map
      Map.init()
      return