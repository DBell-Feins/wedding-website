<?php
class Person extends Eloquent {

    public static $table = 'people';
    
    public static function get_person($name) 
    {
        return Person::where('slug', '=', $name)->first();
    }
    
    public static function get_people($names)
    {
        return Person::where_in('slug', $names)->get();
    }
}
