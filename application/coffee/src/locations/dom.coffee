#_require events.coffee

root.$(=>
  if($(window).width() >= 768)
    equalHeight($('.about'))

  $('.flexslider').flexslider(
    slideshow: true,
    directionNav: true,
    pauseOnHover: false,
    slideshowSpeed: 5000
  )

  if(typeof L != 'undefined')
    mapImgClick 'hotel', map, hotelMarker
    mapImgClick 'venue', map, venueMarker
  return
)
