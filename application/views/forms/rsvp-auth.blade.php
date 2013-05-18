{{ Form::vertical_open() }}
{{ Form::token() }}

{{ Form::label('rsvpid', 'RSVP ID') }}
{{ Form::text('rsvpid', Input::old('rsvpid')), $errors->has('rsvpid') ? 'error' : '', Form::block_help($errors->first('rsvpid')) }}

{{ Form::actions(array(Button::primary_submit('Login'))) }}

{{ Form::close() }}