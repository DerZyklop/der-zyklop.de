<div id="article-nav">
  <?php if($page->prevVisible()): ?>
  <div class="prev-page">
    <a href="<?php echo $page->prevVisible()->url() ?>">
      <span class="icon">&#10092;</span>
      <span class="text"><?= $page->prevVisible()->title() ?></span>
    </a>
  </div>
  <?php endif ?>

  <?php if($page->nextVisible()): ?>
  <div class="next-page">
    <a href="<?php echo $page->nextVisible()->url() ?>">
      <span class="text"><?= $page->nextVisible()->title() ?></span>
      <span class="icon">&#10093;</span>
    </a>
  </div>
  <?php endif ?>
</div>

<script>
$(window).scroll(function() {
    if ($(this).scrollTop() > 1600) {
        $('#article-nav').fadeIn();
    } else {
        $('#article-nav').fadeOut();
    }
});
</script>
