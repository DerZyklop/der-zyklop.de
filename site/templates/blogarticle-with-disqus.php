<?php snippet('header'); ?>
<?php snippet('dz-banner-small') ?>

<div class="page-wrap">
  <div class="content">

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
          <?php snippet('options-bar') ?>
        </div>
      </article>

    </section>

  </div>

  <div class="comments bg-tertiary">
    <section>
      <?php snippet('disqus', array('disqus_shortname' => 'derzyklop', 'disqus_developer' => true)) ?>
    </section>
  </div>

  <div class="meta">
    <section>
      <?php snippet('article-suggestion') ?>
      <?php snippet('article-taglist') ?>
    </section>
  </div>

  <?php snippet('footer') ?>
