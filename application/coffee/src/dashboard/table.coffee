#_require ../global/singleton.coffee
#_require ajax.coffee

class Table extends Singleton
  ###*
   * Generates a table from AJAX data
   * @param  {object} data  An object representing data returned from a $.get() request
   * @param  {string} state State/National depending on the context of the query
  ###
  @createTable: (data, state) ->
    state_name = (if (typeof state isnt "undefined") then state.replace("+", " ") else "National")
    state = data.state
    national = data.national
    @clearTable()
    table = $("#table table")
    tableBody = $("<tbody></tbody>")
    $("#table h2").text state_name
    if state.length == 0 and state_name != "National"
      table.hide()
      $("#table p").text "There are no results for this query."
      return
    table.append(tableBody)
    if state.length != 0
      obj = state
    else
      obj = national

    for els in obj
      row = $("<tr></tr>")
      tableBody.append(row)
      for i in [1..table.find("th").length]
        row.append("<td></td>")
      for field, val of els
        if field == "year"
          val = new Date(val)
          val = val.getUTCFullYear()
        $(row.find('td')[table.find("th[data-column=\""+field+"\"]").index()]).text(val)
    return

  ###*
   * Clear all rows from the table
  ###
  @clearTable: ->
    $("#table table tbody").remove()
    $("#table p").text ""
    $("#table table").show()
    return

Table.get()