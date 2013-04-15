<?php
class Invitation extends Eloquent {

  public static $table = 'invitations';
  public static $timestamps = true;

  /**
   * Validation rules for login attempts
   * @var array
   */
  public static $rules = array(
      'rsvpid' => array('required')
    );

  public static $messages = array(
    'rsvpid_required' => 'The RSVP ID field is required.',
  );

  /**
   * Person relationship
   * @return Invitation The invitation object with a has_many relationship applied
   */
  public function people()
  {
    return $this->has_many('Person');
  }

  /**
   * [get_people_by description]
   * @param  [type] $type [description]
   * @param  [type] $arg  [description]
   * @return [type]       [description]
   */
  public static function get_people_by($type, $arg)
  {
    return Invitation::where($type, '=', $arg)->first()->people()->get();
  }

  /**
   * Validation logic
   * @param  object $inputs A laravel Input object
   * @param  string $type   The type of validation: 'login'
   * @return boolean/object Returns true if the object validates, else returns the validator object
   */
  public static function validate($inputs)
  {
    $validator = Validator::make($inputs, self::$rules, self::$messages);
    if ($validator->passes()) {
      return true;
    }
    else
    {
      return $validator;
    }
  }


}