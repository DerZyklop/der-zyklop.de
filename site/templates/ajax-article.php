<?php
header('Access-Control-Allow-Origin: *');
$articles = $pages->find('blog')->children()->visible();
$frontend_articles = $articles->filterBy('justforrss','');
foreach (param() as $key => $value) {
  if ($key != 'page') {
    $frontend_articles = $articles->filterBy($key, $value, ',');
  }
}
foreach($frontend_articles->flip()->paginate(6) as $article) {
    snippet( 'article-teaser-big', array( 'item' => $article ));
}
?>
<div class="clearit"></div>
