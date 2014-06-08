<?php
  $taglist = taglist($page->tags(), url('blog/tags'));
?>

<div class="taglist">
  <h6><span>Mehr Artikel zum Thema...</span></h6>
  <ul>
    <?php foreach($taglist as $tag): ?>
    <li><a href="<?php echo $tag->url() ?>"><?php echo $tag->name() ?></a></li>
    <?php endforeach ?>
  </ul>
</div>
