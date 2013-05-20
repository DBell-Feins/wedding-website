root = this
root.$ = jQuery

class Singleton
  @instance = null
  @get: ->
    @instance ?= new @()
