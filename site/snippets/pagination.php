<nav id="pagination-nav">
    <?php if($articles->pagination()->hasNextPage()): ?>
      <div class="active prev-btn"><a class="button" href="<?php echo $articles->pagination()->nextPageURL() ?>">&#10096;&nbsp;&nbsp;Älter<span class="no-mobile">e Artikel</span></a></div>
    <?php else: ?>
        <div class="prev-btn"><a href="#" class="nolink passiv-btn button">&#10096;&nbsp;&nbsp;Älter<span class="no-mobile">e Artikel</span></a></div>
    <?php endif ?>

    <?php if($articles->pagination()->hasPrevPage()): ?>
        <div class="active next-btn"><a class="button" href="<?php echo $articles->pagination()->prevPageURL() ?>">Neuer<span class="no-mobile">e Artikel</span>&nbsp;&nbsp;&#10097;</a></div>
    <?php else: ?>
        <div class="next-btn"><a href="#" class="nolink passiv-btn button">Neuer<span class="no-mobile">e Artikel</span>&nbsp;&nbsp;&#10097;</a></div>
    <?php endif ?>

  <div class="clearit"></div>
</nav>
