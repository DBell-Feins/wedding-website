root = this
root.$ = jQuery
if typeof L != 'undefined'
  root.L = L


class Singleton
  @instance = null
  @get: ->
    @instance ?= new @()
