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
    <?php if ( hasTags($site) ) : ?>
      <?php foreach (param() as $key => $value) : ?>
        <?php $taglist = ''; ?>
        <?php if ($key != 'page') {
          if ($key = 'tag') {
            $key = 'tags';
          }
          $articles = $articles->filterBy($key, urldecode($value), ',');
        } ?>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if ( isBlogError($articles) ) : ?>

      <h3>Sorry!</h3>
      <p>Ich habe ganz, ganz angestrengt nachgedacht, aber ich kann mich nicht erinnern schon mal etwas zum Thema <strong>"<?= param('tag') ?>"</strong> geschrieben zu haben.</p>
      <p>Aber vielleicht suchst du ja nach einem der folgenden Schlagwörter:</p>

      <?php snippet('taglist', array('blog'=>$blog)) ?>

    <?php elseif ( hasTags($site) ) : ?>

      <h2>Artikel zum Thema: <?php echo urldecode(param('tag')); ?></h2>

      <ul id="articles">
        <?php foreach($articles as $article) : ?>
          <?php snippet( 'article-teaser-small', array( 'item' => $article )); ?>
        <?php endforeach; ?>
      </ul>

    <?php else : ?>
          <h3>Nach was suchst du?</h3>
          <p>Ich habe bisher <?= $pages->find('blog')->children()->count() ?> Artikel geschrieben. Willst du dich ein bisschen umschauen? Dann schau dir mal die folgenden Schlagwörter an:</p>
          <?php snippet('taglist', array('blog'=>$blog)) ?>
    <?php endif; ?>

  </section>

  <?php snippet('rss-button') ?>

  </section>
</div>
<?php snippet('footer') ?>
