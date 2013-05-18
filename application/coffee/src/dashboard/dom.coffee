#_require map.coffee
#_require ajax.coffee
#_require charts.coffee
#_require events.coffee

root.$(=>
  #$("#table").hide()
  Events.get()
  $("#event-processor").data("state", "National")
  config = {
    HP2020:
      color: "blue"
      width: 2
      dashStyle: "shortdot"
      style:
        "font-weight": "bold"
    National:
      color: "#0D233A"
      marker: "circle"
    State:
      color: "#2F7ED8"
      marker: "square"
    Region:
      color: "red"
      marker: "triangle"
  }
  chartObjs = new Charts({config, charts})
  obj = AJAX.getConfig()
  obj.state = "National"
  obj.race = "Total"
  obj.ethnicity = "Total"
  AJAX.setConfig obj
  AJAX.submitQuery(obj.state)
  return
)
