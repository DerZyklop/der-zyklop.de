<article>
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
        <img class="img-border" src="<?php
          $image = $item->images()->first();
          echo thumb( $image, array(
            'width' => 800,
            'height' => 600,
            'quality' => 70,
            'crop' => true
          ), false);
        ?>" alt="<?php echo $item->images()->first()->name() ?>" />
      </a>
    <?php endif; ?>
    <?php echo '<p class="article-text">'.excerpt($item->text(), 260).'</p>' ?>
  </div>
</article>
