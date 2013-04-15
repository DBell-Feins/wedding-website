@layout('layouts.master')

@section('content')
    @include('partials.header')
    <div class="row-fluid">
        <div class="span12">
            <div class="well">
                <h3>Please fill out the form below</h3>
                <p>Enter your email address and the RSVP ID included in your invitation.</p>
                <div class="span8">
                    {{ Form::horizontal_open() }}
                    {{ Form::token() }}

                    <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
                        {{ Form::label('email', 'E-Mail Address', array('class' => 'control-label')) }}
                        <div class="controls">
                            {{ Form::text('email', Input::old('email')) }}
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                    <div class="control-group {{ $errors->has('rsvpid') ? 'error' : '' }}">
                        {{ Form::label('rsvpid', 'RSVP ID', array('class' => 'control-label')) }}
                        <div class="controls">
                            {{ Form::text('rsvpid', Input::old('rsvpid')) }}
                            {{ $errors->first('rsvpid') }}
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            {{ Form::submit('Submit') }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection