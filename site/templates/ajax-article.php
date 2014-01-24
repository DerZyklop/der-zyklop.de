<?php
header('Access-Control-Allow-Origin: *');
$articles = $pages->find('pxwrk')->children()->visible();
foreach ($site->uri()->params() as $key => $value) {
  if ($key != 'page') {
    $articles = $articles->filterBy($key, $value, ',');
  }
}
foreach($articles->flip()->offset(1)->paginate(2) as $article) {
    snippet( 'article-teaser', array( 'item' => $article, 'first' => false, 'articles_count' => !($articles->count() % 2) ));
}
?>
<div class="clearit"></div>
