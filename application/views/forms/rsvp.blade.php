<h4>{{ $person['num'] }} Guest</h4>
{{ Form::hidden('guest[' . $i . '][id]', isset($person['id']) ? $person['id'] : '') }}
{{ Form::label('guest[' . $i . '][first_name]', 'First Name') }}
{{ Form::text('guest[' . $i . '][first_name]', isset($person['first_name']) ? $person['first_name'] : '') }}
{{ Form::label('guest[' . $i . '][last_name]', 'Last Name') }}
{{ Form::text('guest[' . $i . '][last_name]', isset($person['last_name']) ? $person['last_name'] : '') }}

{{ Form::labelled_checkbox('guest[' . $i . '][attending]', 'Please check the box if you will be attending', 1, isset($person['attending']) ? $person['attending'] : '') }}
{{ Form::block_help('Meal selection') }}
{{ Form::labelled_radio('guest[' . $i . '][meal]', 'Chicken breast with herbal cheese topping', 'chicken', isset($person['meal']) ? $person['meal'] === 'chicken' : '') }}
{{ Form::labelled_radio('guest[' . $i . '][meal]', 'Pepper crusted beef tenderloin', 'beef', isset($person['meal']) ? $person['meal']  === 'beef' : '') }}
{{ Form::labelled_radio('guest[' . $i . '][meal]', 'Butternut squash ravioli', 'veggie', isset($person['meal']) ? $person['meal']  === 'veggie' : '') }}

{{ Form::block_help('Please list any alergies we should be aware of:') }}
{{ Form::xlarge_textarea('guest[' . $i . '][alergies]', isset($person['alergies']) ? $person['alergies'] : '', array('rows' => '3')) }}