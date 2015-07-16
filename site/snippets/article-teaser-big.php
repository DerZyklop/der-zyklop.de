<article class="article-teaser-big <?php if ($item->targetgroup() == 'small') {
  //echo "invert";
} ?>">
  <div class="entry-date">
    <a href="<?php echo $item->url() ?>">
      <?php #echo html($item->date('d').'·'.$item->date('m').'·'.$item->date('Y')) ?>
      <?php echo html($item->date('m').'·'.$item->date('Y')) ?>
    </a>
  </div>
  <div class="img-border">
    <?php if($item->hasImages()): ?>
      <a href="<?php echo $item->url() ?>">
        <?php $image = $item->images()->first(); ?>


        <?php
          echo thumb( $image, array(
            'width' =>400,
            'height' => 200,
            'quality' => 70,
            'crop' => true
          ));
        ?>
<!--         <img class="img-border" src="<?= $image->url(); ?>" alt="<?= $image->name() ?>" />
 -->
      </a>
    <?php endif; ?>
    <h2 class="headline">
      <a href="<?php echo $item->url() ?>"><?php echo html($item->title()) ?></a>
    </h2>
    <?php echo '<p class="article-text">'.excerpt($item->text(), 300).'<a href="'.$item->url().'">weiterlesen</a></p>' ?>
  </div>
</article>
