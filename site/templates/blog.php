<?php snippet('header') ?>

<?php
  $blog = $pages->find('blog');
  $articles = $blog->children()->filterBy('justforrss','')->visible()->flip();

?>
  <?php #var_dump(blogError()); ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
       'use strict';
       $('body').addClass('blog');
    });
</script>

<section class="blog">

    <?php $articles = $articles->paginate(6); ?>
    <div id="articles">
      <?php foreach($articles as $article) : ?>
        <?php snippet( 'article-teaser-big', array( 'item' => $article )); ?>
      <?php endforeach; ?>
    </div>
    <?php snippet('pagination', array( 'articles' => $articles )); ?>

</section>

<?php snippet('footer') ?>
