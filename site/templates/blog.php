<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php
  $blog = $pages->find('blog');
  $articles = $blog->children()->filterBy('justforrss','')->visible()->flip();

  function isBlogError($articles){
    global $site;
    if ( !isset($articles) ) {
      return true;
    } elseif ( $articles->count() == 0 ) {
      return true;
    } else {
      return false;
    }
  };

  function hasTags( $site ) {
    return $site->uri()->params()->count();
  };

?>
  <?php #var_dump(blogError()); ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        $('body').addClass('blog');
    });
</script>

<section class="blog">

  <?php if ( hasTags($site) ) : ?>
    <?php foreach ($site->uri()->params() as $key => $value) : ?>
      <?php $taglist = ''; ?>
      <?php if ($key != 'page') {
        $articles = $articles->filterBy($key, $value, ',');
      } ?>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php if ( isBlogError($articles) ) : ?>

    <?php go('/blog/tags') ?>

  <?php elseif ( hasTags($site) ) : ?>

    <h2>Artikel zum Thema: <?php echo $site->uri()->params('tags'); ?></h2>

    <ul id="articles">
      <?php foreach($articles as $article) : ?>
        <?php snippet( 'article-teaser-small', array( 'item' => $article )); ?>
      <?php endforeach; ?>
    </ul>

  <?php else : ?>

    <?php $articles = $articles->paginate(6); ?>
    <div id="articles">
      <?php foreach($articles as $article) : ?>
        <?php snippet( 'article-teaser-big', array( 'item' => $article )); ?>
      <?php endforeach; ?>
    </div>
    <?php snippet('pagination', array( 'articles' => $articles )); ?>

  <?php endif; ?>

</section>


<?php snippet('footer') ?>
<?php snippet('rss-button') ?>
