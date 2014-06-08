<?php

function load500px( $consumerkey = '', $params = array() ) {

  $defaults = array(
    'limit'      => 10,
    'cache'      => true,
    'feature'    => 'user',
    'thumb_size' => 3,
    'image_size' => 4,
    'username'   => 'derzyklop',
    'refresh'    => 60*20 // refresh every 20 minutes
  );

  $options = array_merge($defaults, $params);

  // check the cache dir
  $cacheSubfolderName = '500px';
  $cacheDir = c::get('root.cache') . '/' . $cacheSubfolderName;
  dir::make($cacheDir);

  // disable the cache if adding the cache dir failed
  if(!is_dir($cacheDir) || !is_writable($cacheDir)) $options['cache'] = false;

  // sanitize the limit
  if($options['limit'] > 200) $options['limit'] = 200;

  // generate a unique cache ID
  $cacheID = $cacheSubfolderName . '/' . $cacheSubfolderName . '.' . md5($options['username']) . '.' . $options['limit'] . '.php';

  if($options['cache']) {
    $cache = (cache::modified($cacheID) < time()-$options['refresh']) ? false : cache::get($cacheID);
  } else {
    $cache = false;
  }

  if(!empty($cache)) return $cache;

  $url  = 'https://api.500px.com/v1/photos?consumer_key=' . $consumerkey . '&feature=' . $options['feature'] . '&username=' . $options['username'] . '&image_size[]=' . $options['image_size'] . '&image_size[]=' . $options['thumb_size'];

  #$json = @file_get_contents($temp_url);
  $json = @file_get_contents($url);


  $data = str::parse($json);

  if(!$data) return false;

  $result = array();


  $stufffrom500px = new stdClass();
  $stufffrom500px->user     = new stdClass;

  // Process the images
  for ($i = 0; $i < $options['limit']; $i++) {
    if (isset($data['photos'][$i]) && count($data['photos'][$i]) > 0) {

      $photo = $data['photos'][$i];

      // Get the user's data from the first image
      if ($i == 0) {
        $stufffrom500px->user->id = $photo['user']['id'];
        $stufffrom500px->user->name = $photo['user']['username'];
        $stufffrom500px->user->firstname = $photo['user']['firstname'];
        $stufffrom500px->user->lastname = $photo['user']['lastname'];
        $stufffrom500px->user->city = $photo['user']['city'];
        $stufffrom500px->user->country = $photo['user']['country'];
        $stufffrom500px->user->fullname = $photo['user']['fullname'];
        $stufffrom500px->user->userpic_url = $photo['user']['userpic_url'];
        $stufffrom500px->user->upgrade_status = $photo['user']['upgrade_status'];
        $stufffrom500px->user->followers_count = $photo['user']['followers_count'];
      }

      // create a new object for each image
      $obj = new stdClass;

      $obj->id               =  $photo['id'];
      $obj->name             =  $photo['name'];
      $obj->description      =  $photo['description'];
      $obj->times_viewed     =  $photo['times_viewed'];
      $obj->rating           =  $photo['rating'];
      $obj->created          =  $photo['created_at'];
      $obj->privacy          =  $photo['privacy'];
      $obj->width            =  $photo['width'];
      $obj->height           =  $photo['height'];
      $obj->votes_count      =  $photo['votes_count'];
      $obj->favorites_count  =  $photo['favorites_count'];
      $obj->comments_count   =  $photo['comments_count'];
      $obj->nsfw             =  $photo['nsfw'];

      if ( $options['cache'] ) {
        $filename                  = 'thumbs/' . $cacheSubfolderName . '/'.$photo['id'].'.'.$options['image_size'].'.jpg';
        $src                       = $photo['image_url'][0];

        dir::make(c::get('root') . '/thumbs/' . $cacheSubfolderName);

        if ( file_exists( $filename ) ) {
          $obj->url          = url($filename);
        } else {
          $copy = copy($src, $filename);
          if ( $copy ) {
            $obj->url          = url($filename);
          } else {
            $obj->url          = $src;
          }
        }
      }

      // TODO: Find a good way to query a thumb
      $obj->thumb            =  $photo['image_url'][1];

      // Process the category
      switch ($photo['category']) {
        case 10:
          $obj->category = 'Abstract';
          break;
        case 11:
          $obj->category = 'Animals';
          break;
        case 5:
          $obj->category = 'Black and White';
          break;
        case 1:
          $obj->category = 'Celebrities';
          break;
        case 9:
          $obj->category = 'City and Architecture';
          break;
        case 15:
          $obj->category = 'Commercial';
          break;
        case 16:
          $obj->category = 'Concert';
          break;
        case 20:
          $obj->category = 'Family';
          break;
        case 14:
          $obj->category = 'Fashion';
          break;
        case 2:
          $obj->category = 'Film';
          break;
        case 24:
          $obj->category = 'Fine Art';
          break;
        case 23:
          $obj->category = 'Food';
          break;
        case 3:
          $obj->category = 'Journalism';
          break;
        case 8:
          $obj->category = 'Landscapes';
          break;
        case 12:
          $obj->category = 'Macro';
          break;
        case 18:
          $obj->category = 'Nature';
          break;
        case 4:
          $obj->category = 'Nude';
          break;
        case 7:
          $obj->category = 'People';
          break;
        case 19:
          $obj->category = 'Performing Arts';
          break;
        case 17:
          $obj->category = 'Sport';
          break;
        case 6:
          $obj->category = 'Still Life';
          break;
        case 21:
          $obj->category = 'Street';
          break;
        case 26:
          $obj->category = 'Transporation';
          break;
        case 13:
          $obj->category = 'Travel';
          break;
        case 22:
          $obj->category = 'Underwater';
          break;
        case 27:
          $obj->category = 'Urban Exploration';
          break;
        case 25:
          $obj->category = 'Wedding';
          break;
        default:
          $obj->category = false;
      }

      // attach the new object to the array
      $stufffrom500px->photos[$i] = $obj;

    }
  }

  $result = $stufffrom500px;

  if($options['cache']) cache::set($cacheID, $result);

  return $result;

}

class load500px extends obj {

  function date($format=false) {
    return ($format) ? date($format, $this->date) : $this->date;
  }

  function text($link=false) {
    return ($link) ? self::link(html($this->text)) : $this->text;
  }
/*
  static function link($text) {
    $text = preg_replace('/(http|https):\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="$1://$2">$1://$2</a>', $text);
    $text = preg_replace('/@([A-Za-z0-9_]+)/is', '<a href="https://twitter.com/#!/$1">@$1</a>', $text);
    $text = preg_replace('/#([A-Aa-z0-9_-]+)/is', '<a href="https://twitter.com/#!/search/%23$1">#$1</a>', $text);
    return $text;
  }
*/
}
