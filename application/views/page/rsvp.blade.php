@layout('layouts.master')

@section('content')
    @include('partials.header')
    <div class="row-fluid">
        <div class="span12">
            <div class="well">
                <h3>Please fill out this form for each guest in your party</h3>
                {{ Form::vertical_open(null, 'POST', array('class' => 'rsvp')) }}
                {{ Form::token() }}
                @foreach($people as $i => $person)
                  @include('forms.rsvp')
                @endforeach
                {{ Form::actions(array(Button::primary_submit('Save'))) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection