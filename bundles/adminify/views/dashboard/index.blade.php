<div class="well well-white main-cont">

<div class="page-header">
  <h2>Dashboard</h2>
</div>

<div id="meals" style="width:100%; height:400px;"></div>

<div id="rsvp-time" style="width:100%; height:400px;"></div>
{{ Table::striped_bordered_hover_condensed_open() }}
{{ Table::headers('First Name', 'Last Name', 'Attending', 'Meal', 'Allergies', 'Updated At', 'Created At') }}
<tbody>
@foreach($table->results as $row)
  <tr>
    <td>{{ $row->first_name }}</td>
    <td>{{ $row->last_name }}</td>
    <td>{{ ($row->attending == '1') ? 'Yes' : 'No' }}</td>
    <td>{{ ucwords($row->meal) }}</td>
    <td>{{ $row->allergies }}</td>
    <td>{{ date('m/d/Y h:i:s A', strtotime($row->updated_at)) }}</td>
    <td>{{ date('m/d/Y h:i:s A', strtotime($row->created_at)) }}</td>
  </tr>
@endforeach
</tbody>
{{ Table::close() }}
{{ $table->links() }}
</div>