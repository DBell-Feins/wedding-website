$(=>
  if typeof rsvp != "undefined"
    categories = []
    attending = []
    declined = []
    for time, item of rsvp
      categories.push moment(time * 1000).format('MMMM Do YYYY, h:mm:ss a')
      attending.push item.attending
      declined.push item.declined

    $("#meals").highcharts(
      chart:
        type: "column"
      title:
        text: "Meals"
      xAxis:
        categories: ["Chicken", "Beef", "Vegetarian"]
      yAxis:
        title:
          text: "Orders"
      series: [
        name: "Count",
        data: [meals.chicken, meals.beef, meals.vegetarian]
      ]
    )
    #attending = attending.reverse()
    #declined = declined.reverse()
    $("#rsvp-time").highcharts(
      chart:
        type: "line"
      title:
        text: "Attending/Not Attending Over Time"
      xAxis:
        type: "datetime"
        categories: categories
      yAxis:
        title:
          text: "Count"
      series: [
        name: "Attending"
        data: attending
      ,
        name: "Not Attending"
        data: declined
      ]
    )
  return
)
