<?php
$articles = $pages->find('pxwrk')->children()->visible()->flip()->limit(10);
snippet('feed', array(
  'link'  => url('pxwrk'),
  'items' => $articles,
  'descriptionField'  => 'text',
  'descriptionExcerpt' => '0'
));
?>