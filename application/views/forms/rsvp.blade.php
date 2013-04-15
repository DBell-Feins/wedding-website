{{ Form::inline_open() }}
{{ Form::token() }}
     <?php /*$table->boolean('attending')->nullable();
      $table->string('slug')->nullable();
      $table->text('description')->nullable();
      $table->text('quote')->nullable();
      $table->string('image_url')->nullable();
      $table->string('meal')->nullable();
      $table->string('alergies')->nullable(); */?>
        {{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'First Name')) }}

        {{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'Last Name')) }}
        {{ Form::label('attending', 'Please check the box if you will be attending') }}
        {{ Form::checkbox('name', 'value') }}

<div class="control-group {{ $errors->has('attending') ? 'error' : '' }}">

    <div class="controls">

        {{ $errors->first('attending') }}
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