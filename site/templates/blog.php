<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php
  $blog = $pages->find('pxwrk');
  $articles = $blog->children()->visible()->flip();
?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        $('body').addClass('pxwrk');
    });
</script>

<section class="blog">
  <?php if ( $articles->count() == 0 && $site->uri()->params() == '' ) : ?>
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
        $tags = tagcloud($blog, array('field'=>'tag', 'baseurl'=>$site->url().'/pxwrk/tags') );
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
      <div id="articles">
        <?php
          snippet( 'article-teaser', array( 'item' => $articles->first(), 'first' => true, 'articles_count' => !($articles->count() % 2) ));
        ?>
        <?php
          foreach($articles->offset(1)->paginate(2) as $article) {
            snippet( 'article-teaser', array( 'item' => $article, 'first' => false, 'articles_count' => !($articles->count() % 2) ));
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
