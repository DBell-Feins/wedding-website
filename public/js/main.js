/*global $:true, console:true */
$(function() {
    //$('.modal').modalResponsiveFix({ debug: true })
    //$('.modal').touchScroll();
    
    // Slider setup
     $('.flexslider').flexslider({
         slideshow: true,
         directionNav: true,
         pauseOnHover: true,
         slideshowSpeed: 5000
     });

     // Leaflet setup
     if(typeof L !== 'undefined') {
        var cloudmadeUrl = 'http://{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.jpg';
        var subDomains = ['otile1','otile2','otile3','otile4'];
        var cloudmadeAttrib = 'Data, imagery and map information provided by <a href="http://open.mapquest.com" target="_blank">MapQuest</a>, <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> and contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/" target="_blank">CC-BY-SA</a>';
        var tileLayerObj = {
            maxZoom: 18, 
            attribution: cloudmadeAttrib, 
            subdomains: subDomains, 
            reuseTiles: true
        }
        var venueLayer = new L.TileLayer(cloudmadeUrl, tileLayerObj);
        var hotelLayer = new L.TileLayer(cloudmadeUrl, tileLayerObj);

        L.Icon.Default.imagePath = '/img/vendor';

        var venue = new L.LatLng(42.2446341, -72.0185379);
        var hotel = new L.LatLng(42.113588, -72.089949);

        var hotelMap = new L.Map('map-hotel-modal', {center: hotel, zoom: 13, layers: [hotelLayer]});
        var venueMap = new L.Map('map-venue-modal', {center: venue, zoom: 13, layers: [venueLayer]});

        var hotelMarker = L.marker(hotel).addTo(hotelMap);
        var venueMarker = L.marker(venue).addTo(venueMap);

             // Leaflet interactions
        $('.location #hotel').click(function() {
            $('#map-hotel-modal').height($(window).height() * 0.7);
            $('#map-hotel-modal').width($(window).width() * 0.8);
            $('#map-hotel-modal').css('padding', '15px');
            $('#hotelModal').modal().on('shown', function() {
                hotelMap.invalidateSize(true);
            });
        });
        $('.location #venue').click(function() {
            $('#map-venue-modal').height($(window).height() * 0.7);
            $('#map-venue-modal').width($(window).width() * 0.8);
            $('#map-venue-modal').css('padding', '15px');
            $('#venueModal').modal().on('shown', function() {
                venueMap.invalidateSize(true);
            });
        })
     }
});