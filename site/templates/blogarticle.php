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
            <span>Published on <?php echo html($page->date('d').'·'.$page->date('M').'·'.$page->date('Y')) ?></span>
          </h6>
        </div>

      </article>

    </section>

  </div>
  <?php #snippet('options-bar') ?>

  <!-- <div class="comments bg-tertiary">
    <?php #if ($page->comments() != "1"): ?>
      <section>
        <h6><span>Comments</span></h6>
        <?php #commentForm(); ?>
        <?php #comments(); ?>
      </section>
    <?php #endif ?>

  </div> -->


  <div class="meta">
    <section>
      <?php snippet('article-suggestion') ?>
      <?php snippet('article-taglist') ?>
    </section>
  </div>

</section>

<?php snippet('sec-author') ?>
<?php snippet('footer') ?>
