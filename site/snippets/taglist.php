<?php
$taglist = taglist($page->tags(), $pages->find('blog')->url());
?>

<div class="taglist">
  Mehr Artikel zum Thema:
  <ul>
    <?php foreach($taglist as $tag): ?>
    <li><a href="<?php echo $tag->url() ?>"><?php echo $tag->name() ?></a></li>
    <?php endforeach ?>
  </ul>
</div>
