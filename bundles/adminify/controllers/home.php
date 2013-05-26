<?php

class Adminify_Home_Controller extends Adminify_Base_Controller {

  public function get_index(){
    $ignore = array('description', 'role', 'slug', 'quote', 'image_url');
    $models = Adminify\Libraries\Helpers::getModels();
    $meals = array(
      'chicken' => intval(DB::table('people')->where('meal', '=', 'chicken')->count()),
      'beef' => intval(DB::table('people')->where('meal', '=', 'beef')->count()),
      'vegetarian' => intval(DB::table('people')->where('meal', '=', 'veggie')->count())
    );

    $rsvp_time = DB::table('people')->select('updated_at')->distinct()->order_by('updated_at', 'asc')->get();

    foreach($rsvp_time as $time)
    {
      $count_attending = DB::table('people')
        ->where('attending', '=', '1')
        ->where('updated_at', '<=', date($time->updated_at))
        ->count();

      $count_declined = DB::table('people')->where('updated_at', '<=', date($time->updated_at))->count() - $count_attending;

      $rsvp[strtotime($time->updated_at)] = array(
        'attending' => intval($count_attending),
        'declined' => intval($count_declined)
      );
    }

    $query = DB::table('people')->select(array('first_name', 'last_name', 'attending', 'meal', 'allergies', 'updated_at'))->order_by('updated_at', 'desc')->paginate(20);

    $this->layout->title = 'Dashboard';
    $this->layout->nest('content', 'adminify::dashboard.index', array('models' => $models, 'table' => $query));
    $this->layout->nest('footer', 'adminify::dashboard.footer', array('rsvp' => json_encode($rsvp), 'meals' => json_encode($meals)));

  }

}