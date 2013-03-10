<?php

/**
 * Helper class for handling photos
 *
 * @author Dave Bell
 */
class Photos {
    
    /**
     * Photo retrieval function
     * 
     * Gets all photos in the folder by default, with $num param lets you
     * specify which picture (based on filename)
     * 
     * @param string $num
     * @return string/array
     */
    public static function get_photos($num = null) {
        $path = path('public').'img/photos';
		$files = scandir($path);
		$photos = array();
		foreach ($files as $file)
        {
			if(File::is(array('jpeg', 'jpg', 'png', 'gif'), $path . DS . $file))
			{
                $info = pathinfo($file);
                if($num !== null)
                {
                    if($info['filename'] === $num)
                    {
                        $photos = 'img/photos/' . $file;
                        break;
                    }
                }
                else
                {
                    $photos[] = 'img/photos/' . $file;				
                }
			}
		}
        return $photos;
    }
}

