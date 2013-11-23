<?php

// get the post UID from the URL
$uid = param('post');
 
if(!$uid) die(a::json(array(
  'status' => 'error',
  'msg'    => 'The post could not be found', 
)));
 
// get the full post object
$post = $pages->find('pxwrk/' . $uid);
 
if($post->uid() != $uid) die(a::json(array(
  'status' => 'error',
  'msg'    => 'The post could not be found', 
)));
 
// get current likes count
$likes = intval((string)$post->likes());
$likes++;
 
// get all variables from the content text file
$variables = $post->content()->variables();
 
// add the updated likes counter
$variables['likes'] = $likes;
 
// set the filename
$file = $post->root() . '/' . $post->intendedTemplate() . '.txt';

// overwrite the file
$write = write($file, $variables);
 
// react on errors
if(error($write)) die(a::json($write));
 
die(a::json(array(
  'status' => 'success',
  'msg'    => 'The likes have been updated', 
  'likes'  => $likes
)));
 
 
// writer function
function write($file, $values) {
      
  if(file_exists($file) && !is_writable($file)) return array(
    'status' => 'error',
    'msg'    => 'The file could not be written'
  );
 
  $break  = false;
  $result = "\xEF\xBB\xBF";   
  $keys   = array();
  foreach($values AS $k => $v) {
    $k = str::urlify($k);
    $k = str::ucfirst(str_replace('-', '_', $k));
    if(in_array($k, $keys) || empty($k)) continue;
    $keys[] = $k;     
    $result .= $break . $k . ': ' . trim($v);
    $break = "\n\n----\n\n";    
  }
  $write = f::write($file, $result);
    
  if(!$write || !file_exists($file)) return array(
    'status' => 'error',
    'msg'    => 'The file could not be written'
  );
  
  return array(
    'status' => 'success',
    'msg'    => 'The file has been written'
  );
  
}
 
?>