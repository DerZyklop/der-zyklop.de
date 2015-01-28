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
      <?php snippet('options-bar') ?>
    </div>
  </article>

</section>

</div>

<div class="comments bg-tertiary">
      <?php snippet('comments.list') ?>
      <?php #snippet('comments.add.form') ?>
</div>

<div class="author bg-tertiary">
  <section class="width-wrap">
    <img class="right" style="margin: 1.5em 0 1em 1em" height="60" width="60" src="<?= url('assets/images/derzyklop_avatar.png') ?>">
    <p>Autor: <strong><a href="https://twitter.com/derzyklop">@DerZyklop</a></strong></p>
    <?= kirbytext('(link: http://portfolio.pxwrk.de/ text: Internet-machender), (link: https://github.com/DerZyklop text: programmierender), (link: https://dribbble.com/derzyklop text: gestaltender), (link: http://der-zyklop.de/blog/langbrett text: Longboard fahrender), gießener Chabo auf der Suche nach einem (link: http://der-zyklop.de/blog/cult-of-less-update-3 text: minimalistischem Leben), (link: http://der-zyklop.de/blog/tags/tag:design text: gutem Design), (link: http://der-zyklop.de/blog/tags/tag:code text: sauberem Code), (link: http://der-zyklop.de/blog/tags/tag:weltretten text: einer besseren Welt) und (link: http://der-zyklop.de/blog/tags/ text: vielem mehr).') ?>
  </section>
  <div class="clearit"></div>
</div>

<div class="meta">
  <section class="width-wrap">
    <?php snippet('article-suggestion') ?>
    <?php snippet('article-nav') ?>
    <?php snippet('article-taglist') ?>
  </section>

<?php snippet('footer') ?>
