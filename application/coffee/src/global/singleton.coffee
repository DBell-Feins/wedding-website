root = this
$ = jQuery

class Singleton
  @instance = null
  @get: ->
    @instance ?= new @()
