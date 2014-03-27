<?php
$taglist = taglist($page->tags(), $pages->find('blog')->url());
?>

<div class="taglist">
  <!-- <h6><span>Weitere Artikel zum Thema</span></h6> -->
  <ul>
    <li>Themen: </li>
    <?php foreach($taglist as $tag): ?>
    <li><a href="<?php echo $tag->url() ?>"><?php echo $tag->name() ?></a></li>
    <?php endforeach ?>
  </ul>
</div>
