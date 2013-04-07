<?php

class Page_Controller extends Base_Controller {

    public $restful = true;
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
        return View::make('page.index', array( 'nav' => Menu::build_menu($this->pages), 'title' => 'We\'re Getting Married!' ));
    }

    /**
     * Handles the page@about GET request
     * @return object
     */
    public function get_about()
    {
        $dave = Person::get_person('dave');
        $liz = Person::get_person('liz');
        return View::make('page.about', array( 'nav' => Menu::build_menu($this->pages), 'title' => 'Our Story', 'people' => array('dave' => $dave, 'liz' => $liz ) ));
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
            return Response::error('404');
        }
        else
        {
            return View::make('page.photos', array( 'nav' => Menu::build_menu($this->pages), 'title' => 'Photos', 'photos' => $photos, 'num' => $num ));
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
                return Response::error('404');
            }
            else
            {
                return View::make('page.wedding-person', array(
                    'nav' => Menu::build_menu($this->pages),
                    'person' => $ret_person->to_array(),
                    'title' => $ret_person->name
                ));
            }
        } else {
            $people = Person::get_people(array('autumn', 'emily', 'ashley', 'jon', 'rob', 'curtis'));
            return View::make('page.wedding', array('nav' => Menu::build_menu($this->pages), 'title' => 'The Wedding Party', 'people' => $people ));
        }
    }

    /**
     * Handles the page@registry GET request
     * @return object
     */
    public function get_registry()
    {
        return View::make('page.registry', array( 'nav' => Menu::build_menu($this->pages), 'title' => 'Registry' ));
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

        return View::make('page.location', array( 'nav' => Menu::build_menu($this->pages), 'title' => 'Location' ));
    }

    /**
     * Handles the page@rsvp GET request
     * @return object
     */
    public function get_rsvp()
    {
        return View::make('page.rsvp', array( 'nav' => Menu::build_menu($this->pages), 'title' => 'RSVP' ));
    }
}