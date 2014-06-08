<?php snippet('header'); ?>

<section class="blogarticle">
  <article>
    <div class="img-border">

      <div class="entry-date">
        <?php echo html($page->date('d').'·'.$page->date('m').'·'.$page->date('Y')) ?><br>
      </div>
      <h2 class="headline">
        <?php echo html($page->title()) ?>
      </h2>

      <div data-post="<?php echo html($page->uid()); ?>" data-likes="<?php echo html($page->likes()); ?>" class="article-text">
        <?php echo kirbytext($page->text()); ?>
      </div>
    </div>
  </article>

</section>

<?php snippet('article-nav') ?>

</div>

<div class="comments bg-tertiary">
  <section class="width-wrap">
      <?php snippet('options-bar') ?>
      <?php snippet('comments.list') ?>
      <?php snippet('comments.add.form') ?>
  </section>
</div>

<div class="meta">
  <section class="width-wrap">
    <?php snippet('article-suggestion') ?>
    <?php snippet('article-taglist') ?>
  </section>



  <?php snippet('footer') ?>
  <?php snippet('rss-button') ?>
