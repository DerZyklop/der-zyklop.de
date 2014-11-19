<article class="article-teaser-big <?php if ($item->targetgroup() == 'small') {
  //echo "invert";
} ?>">
  <div class="entry-date">
    <a href="<?php echo $item->url() ?>">
      <?php echo html($item->date('d').'·'.$item->date('m').'·'.$item->date('Y')) ?>
    </a>
  </div>
  <h2 class="headline">
    <a href="<?php echo $item->url() ?>"><?php echo html($item->title()) ?></a>
  </h2>
  <div class="img-border">
    <?php if($item->hasImages()): ?>
      <a href="<?php echo $item->url() ?>">
        <?php $image = $item->images()->first(); ?>
        <img class="img-border" src="<?= $image->url(); ?>" alt="<?= $image->name() ?>" />
      </a>
    <?php endif; ?>
    <?php echo '<p class="article-text">'.excerpt($item->text(), 300).'<a href="'.$item->url().'">weiterlesen</a></p>' ?>
  </div>
</article>
