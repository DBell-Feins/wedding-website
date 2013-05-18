<?php

/**
 * Helper class for generating the menu
 *
 * @author Dave Bell
 */
Class Menu {

     /**
     * Get the name of the function that called Menu::build_menu($pages)
     * @return string
     */
    public static function get_caller()
    {
        foreach(debug_backtrace() as $k=>$v)
        {
            if(isset($v['class']) && $v['class'] !== __CLASS__)
            {
                $caller = $v['function'];
                break;
            }
        }
        return $caller;
    }

    /**
     * Builds the navbar string to pass into each view
     * @param array $pages
     * @return string
     */
    public static function build_menu($pages)
    {
        $caller = self::get_caller();
        foreach($pages as $k=>$v)
        {
            if($k === str_replace ('get_', '', $caller))
            {
                $pages[$k]['active'] = true;
            } else {
                $pages[$k]['active'] = false;
            }
        }
        $nav_arr = array();
        $logout = array();
        foreach($pages as $k=>$v)
        {
            $nav_arr[] = array($v['name'], $v['slug'], $v['active'], false, null, $v['icon']);
        }
        if(Auth::check())
        {
            $logout = Navigation::links(array(array('Logout', '/logout')));
        }
        return Navbar::create()
        ->with_menus(Navigation::links($nav_arr))
        ->with_menus($logout, array('class' => 'pull-right'))
        ->collapsible();
    }

}
