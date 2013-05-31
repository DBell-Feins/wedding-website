<?php

class Page_Controller extends Base_Controller {

  public $restful = true;
  public $layout = 'layouts.master';

  /**
  * Static list of pages and their associated attributes and resources
  *
  * At some point it may be worth figuring out a way to have the controller's
  * methods define their attributes and resources, but not now.
  * @var array
  */
  private $pages = array(
    'index' => array('slug' => '/', 'name' => 'Home', 'icon' => 'home'),
    'about' => array('slug' => '/about', 'name' => 'Our Story', 'icon' => 'heart'),
    'photos' => array('slug' => '/photos', 'name' => 'Photos', 'icon' => 'camera-retro'),
    'wedding' => array('slug' => '/wedding', 'name' => 'Wedding Party', 'icon' => 'group'),
    'registry' => array('slug' => '/registry', 'name' => 'Registry', 'icon' => 'gift'),
    'location' => array('slug' => '/location', 'name' => 'Location', 'icon' => 'map-marker'),
    'rsvp' => array('slug' => '/rsvp', 'name' => 'RSVP', 'icon' => 'envelope-alt')
  );

  /**
  * Handles the page@index GET request
  * @return object
  */
  public function get_index()
  {
    return View::make('page.index')
      ->with('nav', Menu::build_menu($this->pages))
      ->with('title', 'We\'re Getting Married!' );
  }

  /**
  * Handles the page@about GET request
  * @return object
  */
  public function get_about()
  {
    $dave = Person::get_person('dave');
    $liz = Person::get_person('liz');

    return View::make('page.about')
      ->with('nav', Menu::build_menu($this->pages))
      ->with('title', 'Our Story')
      ->with('people', array('dave' => $dave, 'liz' => $liz ));
  }

  /**
  * Handles the page@photos GET request
  * @return object
  */
  public function get_photos($num = null)
  {
    $photos = Photos::get_photos($num);
    if(count($photos) <= 0)
    {
      return Event::fire('404');
    }
    else
    {
      return View::make('page.photos')
        ->with('nav', Menu::build_menu($this->pages))
        ->with('title', 'Photos')
        ->with('photos', $photos)
        ->with('num', $num );
    }
  }

  /**
  * Handles the page@wedding GET request
  * @param string $person
  * @return object
  */
  public function get_wedding($person = null)
  {
    if($person !== null)
    {
      $ret_person = Person::get_person($person);
      if($ret_person === null)
      {
        return Event::fire('404');
      }
      else
      {
        return View::make('page.wedding-person')
          ->with('nav', Menu::build_menu($this->pages))
          ->with('person', $ret_person)
          ->with('title', $ret_person->first_name . ' ' . $ret_person->last_name);
      }
    }
    else
    {
      $people = Person::get_bridal_party();
      return View::make('page.wedding')
        ->with('nav', Menu::build_menu($this->pages))
        ->with('title', 'The Wedding Party')
        ->with('people', $people );
    }
  }

  /**
  * Handles the page@registry GET request
  * @return object
  */
  public function get_registry()
  {
    return View::make('page.registry')
      ->with('nav', Menu::build_menu($this->pages))
      ->with('title', 'Registry' );
  }

  /**
  * Handles the page@location GET request
  * @return object
  */
  public function get_location()
  {
    return View::make('page.location')
      ->with('nav', Menu::build_menu($this->pages))
      ->with('title', 'Location');
  }

  /**
  * Handles the page@rsvp GET request
  * @return object
  */
  public function get_rsvp()
  {
    if(Auth::check())
    {
      return Redirect::to('rsvp/form');
    }
    else
    {
    return View::make('page.rsvp-login')
      ->with('nav', Menu::build_menu($this->pages))
      ->with('title', 'RSVP');
    }
  }

  public function post_rsvp()
  {
  // Get all the inputs.
    $creds = array('username' => Input::get('rsvpid'), 'password' => Input::get('rsvpid'));

    // Validate the inputs.
    if(($val = Invitation::validate(Input::all())) === true)
    {
    // Try to log the user in.
      if(Auth::attempt($creds))
      {
      // Redirect to the root (dashboard) page.
      return Redirect::to('rsvp/form')
        ->with('success', 'You have logged in successfully');
      }
      else
      {
        // Redirect to the login page.
        return Redirect::to('rsvp')
          ->with('error', 'Invalid RSVP ID.');
      }
    }
    else
    {
      return Redirect::to('rsvp')
        ->with_errors($val);
    }
  }

  public function get_rsvpform()
  {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');

    $invitation = Invitation::logged_in_invitation(Auth::user());
    $p = Invitation::get_people(Auth::user());
    $people = array();
    foreach($p->get() as $v)
    {
      $people[] = $v->to_array();
    }

    $people = count($people) > 0 ? $people : array();

    for($i = 0; $i < $invitation->seats; $i++)
    {
      if (($i + 1 % 100) >= 11 && ($i +1 % 100) <= 13)
      {
        $abbreviation = $i + 1 . 'th';
      }
      else
      {
        $abbreviation = $i + 1 . $ends[$i + 1 % 10];
      }
      $people[$i]['num'] = $abbreviation;
    }

    return View::make('page.rsvp')
      ->with('nav', Menu::build_menu($this->pages))
      ->with('title', 'RSVP')
      ->with('people', $people);
  }

  public function post_rsvpform()
  {
    $invitation = Invitation::logged_in_invitation(Auth::user());

    $fields = Input::all();
    foreach($fields['guest'] as $i => $guest)
    {
      /**
       * Laravel modifies the root query every time we pass another clause to it,
       * so we have to reset it with every iteration.
       */
      $id = isset($guest['id']) ? $guest['id'] : null;
      $people = Invitation::get_people(Auth::user());
      $query = $people->find($id);
      if(count($query) > 0)
      {
        unset($guest['id']);
        /**
         * Test if there are any actual updated values. If not, we don't want
         * to update the record so we can look at attending vs. declined trends
         * in the admin panel
         */
        $update = false;
        foreach($guest as $k => $v)
        {
          if($query->$k !== $v)
          {
            $update = true;
          }
        }
        if($update === true)
        {
          $query->update($id, $guest);
        }
      }
      else
      {
        // New
        $guest['role'] = 'Guest';
        // Create
        $invitation->people()->insert($guest);
      }
    }
    return $this->logout('success', 'Thank you for submitting your RSVP! We look forward to seeing you at our wedding.', '/rsvp');
  }

  /**
   * Logout page.
   *
   * @access   public
   * @return   Redirect
   */
  public function get_logout()
  {
    return $this->logout('success', 'Logged out successfully');
  }

  private function logout($type, $message, $path = '/')
  {
    Auth::logout();

    return Redirect::to($path)
      ->with($type, $message);
  }
}