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
  * Constructor function
  */
  function __construct() {
    // Register scripts
    Asset::container('header')->add('modernizr', 'js/vendor/modernizr-2.6.2-respond-1.1.0.min.js');
    Asset::container('footer')->add('bootstrap-js', 'http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js');
    Asset::container('footer')->add('flexslider', 'js/vendor/jquery.flexslider-min.js');
    Asset::container('footer')->add('plugins', 'js/plugins.js');
    Asset::container('footer')->add('main', 'js/main.js');


    // Register CSS
    Asset::container('header')->add('bootstrap', 'http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css');
    Asset::container('header.ie7')->add('font-awesome-ie7', 'http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome-ie7.css');
    Asset::container('header')->add('font-awesome-css', 'http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css');

    Asset::container('header')->add('flexslider-css', 'css/vendor/flexslider.css');
    Asset::container('header')->add('style', 'css/style.css');

    // Call parent constructor to complete Controller registration
    parent::__construct();
  }

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

    /*$this->layout->nest('content', 'page.about', array(
      'title' => 'Our Story',
      'people' => array('dave' => $dave, 'liz' => $liz),
      'nav' => Menu::build_menu($this->pages)));
*/
      //die('<pre>' . print_r($this->layout->data['nav'], true) . '</pre>');
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
          ->with('person', $ret_person->to_array())
          ->with('title', $ret_person->name);
      }
    }
    else
    {
      $people = Person::get_people(array('autumn', 'emily', 'ashley', 'jon', 'rob', 'curtis'));
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
    // Include leaflet resources
    Asset::container('header.ie7')->add('leaflet-ie7', 'http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.ie.css');
    Asset::container('header')->add('leaflet-css', 'http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css');
    Asset::container('footer')->add('leaflet', 'http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js');

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
    return View::make('page.rsvp-login')
      ->with('nav', Menu::build_menu($this->pages))
      ->with('title', 'RSVP');
  }

  public function post_rsvp()
  {
  // Get all the inputs.
    $creds = array('username' => Input::get('email'), 'password' => Input::get('rsvpid'));

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
          ->with('error', 'Username/password invalid.');
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
    return View::make('page.rsvp')
      ->with('nav', Menu::build_menu($this->pages))
      ->with('title', 'RSVP');
    //die('<pre>' . print_r(Invitation::get_people_by('email', Auth::user()->email), true) . '</pre>');

  }

  /**
   * Logout page.
   *
   * @access   public
   * @return   Redirect
   */
  public function get_logout()
  {
    // Log the user out.
    Auth::logout();

    // Redirect to the home page.
    return Redirect::to('/')
      ->with('success', 'Logged out successfully');
  }
}