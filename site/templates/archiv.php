<?php snippet('header'); ?>
<?php snippet('dz-banner') ?>

<div class="page-wrap">
  <div class="content">


  <section class="<?= $site->template() ?>">
  <?php
    $blog = $pages->find('blog');
    $articles = $blog->children()->filterBy('justforrss','')->visible()->flip();
  ?>


  <script type="text/javascript">
      jQuery(document).ready(function(){
        "use strict";
        $("body").addClass("blog");
      });
  </script>

  <?php
    function isBlogError($articles){
      if ( !isset($articles) ) {
        return true;
      } elseif ( $articles->count() == 0 ) {
        return true;
      } else {
        return false;
      }
    };

    function hasTags( $site ) {
      return count(param());
    };


   ?>

    <h3>Das Archiv</h3>
    <p>Hier findest du alle <?= $pages->find('blog')->children()->visible()->count() ?> Artikel, die ich jemals veröffentlicht habe, nach Datum sortiert. Falls dir das zu chaotisch ist, schau im <a href="<?= url('blog/tags') ?>">Schlagwort-Archiv</a>.</p>

    <ul id="articles">
      <?php foreach($articles as $article) : ?>
        <?php snippet( 'article-teaser-small', array( 'item' => $article )); ?>
      <?php endforeach; ?>
    </ul>

  </section>

  <?php snippet('rss-button') ?>

  </section>
</div>
<?php snippet('footer') ?>
