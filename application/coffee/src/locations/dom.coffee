#_require locations.coffee

equalHeight = (group) ->
  tallest = 0
  group.each( ->
    thisHeight = $(this).height()
    if thisHeight > tallest
      tallest = thisHeight
  )
  group.height tallest

root.$(=>
  if $(window).width() >= 768
    equalHeight $('.about')

  flex =
    slideshow: true,
    directionNav: true,
    pauseOnHover: false,
    slideshowSpeed: 5000
  $('.flexslider').flexslider flex

  if typeof L != 'undefined'
    Map()
    Events.mapImgClick 'hotel', Map.map, Map.MapObjects.hotel
    Events.mapImgClick 'venue', Map.map, Map.MapObjects.venue
  return
)
