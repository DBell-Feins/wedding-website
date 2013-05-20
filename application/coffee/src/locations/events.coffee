#_require ../global/singleton.coffee

class Events extends Singleton
  @mapImgClick: (locationStr, mapObj, locationObj) ->
    $('.location #'+ locationStr ).click ->
      loc = $('#map-modal')
      w = $(window).width() * 0.8
      h = $(window).height() * 0.6
      loc.height(h).width(w).css 'padding', '15px'
      $('#locModal .modal-header h4').html locationObj.title
      locationObj.marker.addTo mapObj
      mapObj.panTo locationObj.loc
      $('#locModal').modal().on('shown', ->
        mapObj.invalidateSize(true);
        return
      )
    return