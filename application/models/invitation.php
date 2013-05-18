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

  public static function get_people($arg)
  {
    $type = is_object($arg) ? get_class($arg) : gettype($arg);

    $people = array();
    switch ($type) {
      case 'Invitation':
        $people = $arg->people();
        break;
      case 'array':
        $invitations = Invitation::all();
        foreach($arg as $k => $v)
        {
          $people[] = Person::where($k, '=', $v)->get();
        }
        break;
    }
    return $people;
  }

  public static function logged_in_invitation($user)
  {
    return Invitation::where('rsvpid', '=', $user->rsvpid)->first();
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