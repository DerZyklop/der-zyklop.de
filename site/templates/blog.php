<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php
  $blog = $pages->find('blog');
  $articles = $blog->children()->filterBy('justforrss','')->visible()->flip();

  function isBlogError(){
    global $articles, $site;
    if ( !isset($articles) ) {
      return false;
    } elseif ( $articles->count() == 0 && $site->uri()->params() == '' ) {
      return false;
    } else {
      return true;
    }
  };

?>
  <?php #var_dump(blogError()); ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        $('body').addClass('blog');
    });
</script>

<section class="blog">
  <?php if ( isBlogError() ) : ?>
    <h3>Uuups!</h3>
    <p>Sieht aus, als hätte <?= $site->author() ?> noch keinen einzigen Artikel veröffentlicht.</p>
  <?php else: ?>
    <!-- If this is a keyword-search -->
    <?php foreach ($site->uri()->params() as $key => $value) : ?>
      <?php if ($key != 'page') {
        $articles = $articles->filterBy($key, $value, ',');
      } ?>
    <?php endforeach; ?>
    <!-- If cant find items -->
    <?php if ( $articles->count() == 0): ?>
      <h3>Sorry!</h3>
      <p>Ich hab überall gesucht, ich hab echt alles gegeben, ich konnte keine Einträge finden.</p>
      <p>Schau dir mal die anderen Schlagworte an, die ich gefunden habe – vielleicht interessiert dich ja eins davon:</p>
      <?php
        $tags = tagcloud($blog, array('field'=>'tag', 'baseurl'=>$site->url().'/blog/tags') );
      ?>
      <ul class="tagcloud">
        <?php $i = 0 ?>
        <?php foreach($tags as $tag): ?>
          <?php $i++; ?>
          <?php if ($i < 10): ?>
            <li<?php if($tag->isActive()) echo ' class="active"' ?>><a href="<?php echo $tag->url() ?>"><?php echo $tag->name() ?></a> (<?php echo $tag->results() ?> Artikel)</li>
          <?php endif; ?>
        <?php endforeach ?>
      </ul>
    <!-- Show items -->
    <?php else: ?>
      <?php $articles = $articles->paginate(6); ?>
      <?php #$i = 0; ?>
      <div id="articles">
        <?php
          foreach($articles as $article) {
            snippet( 'article-teaser', array( 'item' => $article, 'first' => true ));
          };
        ?>
        <div class="clearit"></div>
      </div>
      <?php snippet('pagination', array( 'articles' => $articles )); ?>
    <?php endif; ?>
  <?php endif; ?>
</section>

<?php snippet('rss-button') ?>

<?php snippet('footer') ?>
