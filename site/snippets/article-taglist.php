<?php
  $taglist = taglist($page->tags(), url('blog/tags'));

  $blog = $pages->find('blog');

  $tagcloud = tagcloud($blog, array(
      'limit'=>50,
      'field'=>'tags',
      'param' => 'tag',
      'baseurl'=>url('blog/tags')
    ) );

  foreach ($taglist as $tag) {
    $taglist[$tag->name()]->results = $tagcloud[$tag->name()]['results'];
  }

?>

<div class="taglist">
  <h6><span>Mehr Artikel zum Thema...</span></h6>
  <ul>
    <?php foreach($taglist as $tag): ?>
    <li><a href="<?= $tag->url() ?>"><?= $tag->name() ?> <span class="result-counter"><?= $tag->results ?></span></a></li>
    <?php endforeach ?>
  </ul>
</div>
