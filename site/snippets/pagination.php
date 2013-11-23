<?php $articles = $articles->paginate(2) ?>
<nav id="pagination-nav">
    <?php if($articles->pagination()->hasNextPage()): ?>
      <div class="active prev-btn"><a class="btn" href="<?php echo $articles->pagination()->nextPageURL() ?>">< Älter<span class="no-mobile">e Artikel</span></a></div>
    <?php else: ?>
        <div class="prev-btn"><a href="#" class="nolink passiv-btn btn">< Älter<span class="no-mobile">e Artikel</span></a></div>
    <?php endif ?>

    <?php if($articles->pagination()->hasPrevPage()): ?>
        <div class="active next-btn"><a class="btn" href="<?php echo $articles->pagination()->prevPageURL() ?>">Neuer<span class="no-mobile">e Artikel</span> ></a></div>
    <?php else: ?>
        <div class="next-btn"><a href="#" class="nolink passiv-btn btn">Neuer<span class="no-mobile">e Artikel</span> ></a></div>
    <?php endif ?>
  
  <div class="clearit"></div>
</nav>

<script type="text/javascript">
  options = {
    <?php
      $i = 1;
      foreach ($site->uri()->params() as $key => $value) {
        if ($key != 'page') : ?>
          <?php echo($key) ?>:'<?php echo($value) ?>'
          <?php if ($site->uri()->params()->count() != $i) { echo(','); } ?>
        <?php 
        endif;
      }
    ?>
  }
  lazyLoadArticles(<?php echo($articles->pagination()->countPages() - 1 ) ?>, options)
</script>
