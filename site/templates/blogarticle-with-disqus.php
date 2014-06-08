<?php snippet('header'); ?>

<section class="blogarticle">
  <article>
    <div class="img-border">

      <div class="entry-date">
        <?php echo html($page->date('d').'·'.$page->date('m').'·'.$page->date('Y')) ?>
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
    <?php snippet('disqus', array('disqus_shortname' => 'derzyklop', 'disqus_developer' => true)) ?>
  </section>
</div>

<div class="meta">
  <section class="width-wrap">
    <?php snippet('article-suggestion') ?>
    <?php snippet('article-taglist') ?>
  </section>

<?php snippet('footer') ?>
