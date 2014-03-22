<article class="clearfix">
  <div class="clearfix">
    <a href="<?php echo $item->url() ?>">
      <span class="entry-date">
        <span class="day"><?php echo html($item->date('d')) ?></span>
        <span class="month"><?php echo html($item->date('m')) ?></span>
        <span class="year"><?php echo html($item->date('Y')) ?></span>
      </span>
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
