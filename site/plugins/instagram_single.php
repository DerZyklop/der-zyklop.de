<?php

/**
 * Returns an Instagram object.
 * @param string    The access token (see readme on how to obtain one) ALWAYS NEEDED!
 * @param integer   The number of photos that should be fetched.
 * @param boolean   Caching enabled.
 * @param integer   How many seconds until the cache expires.
 * @param string    The user-id of the user of whom the photos should be loaded. 'self' is the default, which means that your own user ID will be inserted automatically by Instagram.
 * @return object   Object of class Instagram, that holds all the images.
*/                    
function instagram_single($token = '', $image_id = false, $cache = true, $cache_expire = 3600) {
    return new instagram_single($token, $image_id, $cache, $cache_expire);
}

/**
 * An Instagram <http://instagram.com/> plugin for Kirby <http://getkirby.com/>.
 * In order to use this plugin, you'll need to obtain an access token for API access. See the readme for more information.
 * @author Simon Albrecht <http://albrecht.me/>
 * @version 1.0
 * @copyright (c) 2012 Simon Albrecht
 */
class instagram_single { 
    var $image;
    var $user;

    /**
     * Constructor. Loads the data from the Instagram API.
     * @param string    The access token.
     * @param integer   The number of shots that will be loaded.
     * @param boolean   Chache enabled.
     * @param integer   How many seconds until the cache expires.
     * @param string    The user-id of the user or 'self' for your own account.
     */
    function __construct($_token = '', $_image_id = false, $_cache = true, $_cache_expire = 3600) {
        // Init
        $this->image = new stdClass;
        $this->user        = new stdClass;
    
        // Check if a token is provided
        if (trim($_token) != '' && $_image_id) {

            // Construct the API url…
            // http://instagr.am/developer/endpoints/users/
            $url = "https://api.instagram.com/v1/media/{$_image_id}?access_token={$_token}";

            // Create cache directory if it doesn't exist yet
            if ($_cache) {
                dir::make(c::get('root.cache') . '/instagram');
            }
            $images_cache_id    = 'instagram/images.' . md5($_token) . '.' . $_image_id . '.php';

            $images_cache_data  = false;
            
            // Try to fetch data from cache
            if ($_cache) {
                $images_cache_data = (cache::modified($images_cache_id) < time() - $_cache_expire) ? false : cache::get($images_cache_id);
            }
            
            // Load data from the API if the cache expired or the cache is empty
            if (empty($images_cache_data)) {
                $data   = $this->fetch_data($url);
                $photo = json_decode($data);
                
                // Set new data for the cache
                if ($_cache) {
                    cache::set($images_cache_id, $photo);
                }
            } else {
                $photo = $images_cache_data;
            }
            
            // Process the images
            if (isset($photo->data) && count($photo->data) > 0) {
                
                // Get the user's data
                $this->user->username    = $photo->data->user->username; 
                $this->user->full_name   = $photo->data->user->full_name;
                $this->user->picture     = $photo->data->user->profile_picture;
                
                $this->image->id           =  $photo->data->id;
                $this->image->link         =  $photo->data->link;
                $this->image->comments     = @$photo->data->comments->count;
                $this->image->likes        = @$photo->data->likes->count;

                $this->image->likes        = @$photo->data->likes->count;

                $this->image->created      =  $photo->data->created_time;
                $this->image->thumb        = @$photo->data->images->thumbnail->url;

                //$filename                  = 'thumbs/instagram/'.date('F_d__Y', $photo->data->created_time).'_at_'.date('hiA', $photo->data->created_time).'.jpg';
                $filename                  = 'thumbs/instagram/'.$photo->data->created_time.'.612.612.jpg';
                $src                       = $photo->data->images->standard_resolution->url;

                if ( file_exists( $filename ) ) {
                  $this->image->url          = url($filename);
                } else {
                  $copy = copy($src, $filename);
                  if ( $copy ) {
                    $this->image->url          = url($filename);
                  } else {
                    $this->image->url          = $src;
                  }
                }

                $this->image->image_lowres = @$photo->data->images->low_resolution->url;
                $this->image->filter       =  $photo->data->filter;
                $this->image->location     = @$photo->data->location->name;
                $this->image->latitude     = @$photo->data->location->latitude;
                $this->image->longitude    = @$photo->data->location->longitude;
                $this->image->tags         = array();
                
                // Process tags
                for ($j = 0; $j < count($photo->data->tags); $j++) {
                    $this->image->tags[$j] = $photo->data->tags[$j];
                }               
            }
        } else {
            throw new Exception('$_token MUST be set!');
        }
    }
    
    /**
     * Returns information about the user.
     * @return object   Object with information about the user.
     */
    function user() {
        return $this->user;
    }

    /**
     * Returns the single-image that was loaded from the API.
     * @return array    Array of object containing all the photo-data.
     */
    function image() {
        return $this->image;
    }
    
     /**
     * Fetches data from an url.
     * @param string    The url from where data should be fetched.
     * @return object   The data loaded from the url
     */
    protected function fetch_data($url = null) {
        if (!is_null($url)) {
            
            // Init CURL
            $handler = curl_init();        
    
            // CURL options
            curl_setopt($handler, CURLOPT_URL, $url);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, 1);

            // Load data & close connection
            $data = curl_exec($handler);
            curl_close($handler);  
        
            return $data;
        }
    }
}