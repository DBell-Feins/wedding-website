/*global $:true, L:true */


// global variables (kill me)

/**
 * Sets the popup for each location marker
 * @param {Object} args JSON object of all arguments (locations, coordinates, etc.)
 */
function setMarkers(args) {
  var loc = args.loc;
  $.each(args.locations, function() {
    this.marker.bindPopup(this.str + '<a href="https://maps.google.com/maps?saddr=' + loc + '&daddr=' + this.daddr + '&z=9" target="_blank">Get directions</a>');
  });
}

function equalHeight(group) {
  var tallest = 0;
  group.each(function() {
    var thisHeight = $(this).height();
    if(thisHeight > tallest) {
      tallest = thisHeight;
    }
  });
  group.height(tallest);
}

$(function() {
  if($(window).width() >= 768) {
    equalHeight($('.about'));
  }
  $('window').resize(function() {
    if($(window).width() > 767) {
      $('.location > .span6').eqHeights();
    }
  });

  // Slider setup
  $('.flexslider').flexslider({
    slideshow: true,
    directionNav: true,
    pauseOnHover: false,
    slideshowSpeed: 5000
  });

  // Leaflet setup
  if(typeof L !== 'undefined') {
    L.Icon.Default.imagePath = '/img/vendor';
    var cloudmadeUrl = 'http://{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.jpg',
    subDomains = ['otile1','otile2','otile3','otile4'],
    cloudmadeAttrib = 'Data, imagery and map information provided by <a href="http://open.mapquest.com" target="_blank">MapQuest</a>, <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> and contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/" target="_blank">CC-BY-SA</a>',
    tileLayerObj = {
      maxZoom: 18,
      attribution: cloudmadeAttrib,
      subdomains: subDomains,
      reuseTiles: true
    },
    layer = new L.TileLayer(cloudmadeUrl, tileLayerObj),
    /*venueLayer = new L.TileLayer(cloudmadeUrl, tileLayerObj),
    hotelLayer = new L.TileLayer(cloudmadeUrl, tileLayerObj),*/
    venue = new L.LatLng(42.2446341, -72.0185379),
    hotel = new L.LatLng(42.113588, -72.089949),
    locations = L.layerGroup([venue, hotel]),
    map = new L.Map('map-modal', {center: hotel, zoom: 13, layers: [layer]}),
    /*hotelMap = new L.Map('map-hotel-modal', {center: hotel, zoom: 13, layers: [hotelLayer]}),
    venueMap = new L.Map('map-venue-modal', {center: venue, zoom: 13, layers: [venueLayer]}),*/

    hotelMarker = L.marker(hotel),
    venueMarker = L.marker(venue),

    /*hotelMarker = L.marker(hotel).addTo(hotelMap),
    venueMarker = L.marker(venue).addTo(venueMap),*/
    hotelStr = '<div id="" class="vcard"><div class="org"><a href="http://www.sturbridgehosthotel.com/">Sturbridge Host Hotel & Conference Center</a></div><div class="adr"><div class="street-address">366 Main Street</div><span class="locality">Sturbridge</span>,<span class="region">MA</span>,<span class="postal-code">01566</span></div><div class="tel">(508) 347-7393</div></div>',
    venueStr = '<div id="" class="vcard"><div class="org"><a href="http://www.zukas.com/">Zukas Hilltop Barn</a></div><div class="adr"><div class="street-address">89 Smithville Road</div><span class="locality">Spencer</span>,<span class="region">MA</span>,<span class="postal-code">01562</span></div><div class="tel">(508) 885-5320</div></div>',
    currentLoc = '',
    markerArgs = {
      loc: '',
      locations: {
        hotel: {
          marker: hotelMarker,
          str: hotelStr,
          daddr: 'Sturbridge+Host+Hotel+Sturbridge,+MA,+01566'
        },
        venue: {
          marker: venueMarker,
          str: venueStr,
          daddr: 'Zukas+Hilltop+Barn+Spencer,+MA,+01562'
        }
      }
    };

    // Location services and event handlers
    map.locate();
    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);
    /*hotelMap.locate();
    venueMap.locate();
    hotelMap.on('locationfound', onLocationFound);
    venueMap.on('locationfound', onLocationFound);
    hotelMap.on('locationerror', onLocationError);
    venueMap.on('locationerror', onLocationError);*/



    /**
     * Handles modal invocation
     * @param  {String} location The location (venue or hotel)
     * @param  {Object} mapObj   Leaflet map objec
     */
    function mapImgClick(location, mapObj, marker, loc) {
      $('.location #'+ location ).click(function() {
        var loc = $('#map-modal'), w = $(window).width() * 0.8,
        h = $(window).height() * 0.6;
        loc.height(h).width(w).css('padding', '15px');
        $('#locModal').modal().on('shown', function() {
          if(location === 'hotel') {
            marker.addTo(mapObj);
          } else if(location === 'venue') {
            marker.addTo(mapObj);
          }
          mapObj.invalidateSize(true);
        });
      });
    }

    // Set markers and provide callbacks for locationfound and locationerror
    setMarkers(markerArgs);
    function onLocationError() {
      setMarkers(markerArgs);
    }
    function onLocationFound(e) {
      currentLoc = e.latlng.lat + ', ' + e.latlng.lng;
      markerArgs.loc = currentLoc;
      setMarkers(markerArgs);
    }

    // Leaflet interactions
    mapImgClick('hotel', map, hotelMarker);
    mapImgClick('venue', map, venueMarker);

    /*mapImgClick('hotel', hotelMap);
    mapImgClick('venue', venueMap);*/
  }
});