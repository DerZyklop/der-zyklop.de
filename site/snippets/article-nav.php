<div id="article-nav">
  <?php if($page->prevVisible()): ?>
  <div class="prev-page">
    <a href="<?php echo $page->prevVisible()->url() ?>" onclick="javascript:_paq.push(['trackEvent', 'article-nav', '<?= $page->prevVisible()->title() ?>']);">
      <span class="icon">&#10092;</span>
      <span class="text"><?= $page->prevVisible()->title() ?></span>
    </a>
  </div>
  <?php endif ?>

  <?php if($page->nextVisible()): ?>
  <div class="next-page">
    <a href="<?php echo $page->nextVisible()->url() ?>" onclick="javascript:_paq.push(['trackEvent', 'article-nav', '<?= $page->nextVisible()->title() ?>']);">
      <span class="text"><?= $page->nextVisible()->title() ?></span>
      <span class="icon">&#10093;</span>
    </a>
  </div>
  <?php endif ?>
</div>

<script>
$(window).scroll(function() {
  'use strict';
  if ($(this).scrollTop() > 1600) {
      $('#article-nav').fadeIn();
  } else {
      $('#article-nav').fadeOut();
  }
});
</script>
