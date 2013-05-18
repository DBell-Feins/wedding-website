<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

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


}