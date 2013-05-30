<h4>{{ $person['num'] }} Guest</h4>

<input type="hidden" name="guest[{{ $i }}][id]" value="{{ isset($person['id']) ? $person['id'] : '' }}">

<div class="control-group">
  <label class="control-label" for="guest[{{ $i }}][first_name]">First Name</label>
  <div class="controls">
    <input type="text" name="guest[{{ $i }}][first_name]" value="{{ isset($person['first_name']) ? $person['first_name'] : '' }}" id="guest[{{ $i }}][first_name]">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="guest[{{ $i }}][last_name]">Last Name</label>
  <div class="controls">
    <input type="text" name="guest[{{ $i }}][last_name]" value="{{ isset($person['last_name']) ? $person['last_name'] : '' }}" id="guest[{{ $i }}][last_name]">
  </div>
</div>

<div class="control-group">
  <label class="control-label">I will be:&nbsp;</label>
    <div class="controls">
      <label class="radio"><input type="radio" name="guest[{{ $i }}][attending]" value="1" {{ (isset($person['attending']) && $person['attending'] === '1') ? 'checked' : '' }}>Attending</label>
      <label class="radio"><input type="radio" name="guest[{{ $i }}][attending]" value="0" {{ (isset($person['attending']) && $person['attending'] === '0') ? 'checked' : '' }}>Not attending</label>
  </div>
</div>

<div class="control-group">
  <label class="control-label">Meal selection:&nbsp;</label>
    <div class="controls">
      <label class="radio"><input type="radio" name="guest[{{ $i }}][meal]" value="chicken" {{ (isset($person['meal']) && $person['meal'] === 'chicken') ? 'checked' : '' }}>Chicken breast with herbal cheese topping</label>
      <label class="radio"><input type="radio" name="guest[{{ $i }}][meal]" value="beef" {{ (isset($person['meal']) && $person['meal'] === 'beef') ? 'checked' : '' }}>Pepper crusted beef tenderloin</label>
      <label class="radio"><input type="radio" name="guest[{{ $i }}][meal]" value="veggie" {{ (isset($person['meal']) && $person['meal'] === 'veggie') ? 'checked' : '' }}>Butternut squash ravioli</label>
  </div>
</div>

<div class="control-group">
  <label class="control-label">Please list any allergies or special dietary concerns we should be aware of:&nbsp;</label>
  <div class="controls">
    <textarea rows="3" class="input-xlarge" name="guest[{{ $i }}][allergies]" cols="50">{{ isset($person['allergies']) ? $person['allergies'] : '' }}</textarea>
  </div>
</div>