<?php
class Person extends Eloquent {

  public static $table = 'people';

  /**
   * Invitation relationship
   * @return Person The person object with a belongs_to relationship applied
   */
  public function invitation()
  {
    return $this->belongs_to('Invitation');
  }

  public static function get_person($name)
  {
    return Person::where('slug', '=', $name)->first();
  }

  public static function get_people($names)
  {
    return Person::where_in('slug', $names)->get();
  }

  public static function get_guests()
  {
    return Person::where('role', '=', 'Guest')->get();
  }

  public static function get_bridal_party()
  {
    return Person::where_in('role', array('Maid of Honor', 'Bridesmaid', 'Best Man', 'Groomsman', 'Usher'))->get();
  }
}
