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