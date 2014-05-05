<?php

function taglist($tags, $tagpage) {
  $list = array();
  foreach( explode(',',$tags) as $tag ) {
    $tag = trim($tag);
    if(isset($list[$tag])) {
      $list[$tag]->results++;
    } else {
      $list[$tag] = new obj(array(
        'results'  => 1,
        'name'     => $tag,
        'url'      => $tagpage . '/tags:' . urlencode($tag),
      ));
    }

  }
  return $list;
}
