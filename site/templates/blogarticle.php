<?php snippet('header'); ?>
<?php snippet('dz-banner-small') ?>

<div class="page-wrap">
  <div class="content">


    <section class="blogarticle">
      <article>
        <div class="img-border">

          <h2 class="headline">
            <?php echo html($page->title()) ?>
          </h2>

          <div data-post="<?php echo html($page->uid()); ?>" data-likes="<?php echo html($page->likes()); ?>" class="article-text">
            <?php echo kirbytext($page->text()); ?>
          </div>
          <h6 style="text-align: right" class="entry-date">
            <span><?php echo html($page->date('d').'·'.$page->date('m').'·'.$page->date('Y')) ?></span>
          </h6>
        </div>
      </article>

    </section>

  </div>
  <div class="bg-tertiary">
    <section class="width-wrap">
      <?php snippet('options-bar') ?>
    </section>
  </div>

  <div class="comments bg-tertiary">
    <?php snippet('comments.list') ?>
    <?php #snippet('comments.add.form') ?>
  </div>

  <div class="meta">
    <section class="width-wrap">
      <?php snippet('article-suggestion') ?>
      <?php snippet('article-taglist') ?>
    </section>
  </div>

  <?php snippet('footer') ?>
