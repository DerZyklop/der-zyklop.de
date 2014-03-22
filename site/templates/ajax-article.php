<?php
header('Access-Control-Allow-Origin: *');
$articles = $pages->find('blog')->children()->visible();
$frontend_articles = $articles->filterBy('justforrss','');
foreach ($site->uri()->params() as $key => $value) {
  if ($key != 'page') {
    $frontend_articles = $articles->filterBy($key, $value, ',');
  }
}
foreach($frontend_articles->flip()->paginate(6) as $article) {
    snippet( 'article-teaser', array( 'item' => $article, 'first' => true ));
}
?>
<div class="clearit"></div>
