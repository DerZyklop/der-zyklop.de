<li class="article-teaser-small">
  <div class="entry-date">
    <a href="<?php echo $item->url() ?>">
        <?php echo html($item->date('d').'·'.$item->date('m').'·'.$item->date('y')) ?>
    </a>
  </div>
  <h2 class="headline">
    <a href="<?php echo $item->url() ?>">
      <?php echo html($item->title()) ?>
    </a>
  </h2>
</li>
