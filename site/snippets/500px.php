<section>

<?php
$contentfrom500px = load500px('8QD27m6Mi3ke2Kxs63bLL2GDIU8gEF6Ps2pY9A4u', array(
    'limit'    => 15,
    'username' => 'derzyklop'
));
$images     = $contentfrom500px->photos;

?>
<section class="instagram clearfix">
  <?php //echo '<h1>'.$page->text.'</h1>' ?>
  <div class="img-border">
    <?php
    foreach ($images as $image): ?>
    <div class="instagram-photo">
      <div class="img-outer-wrap">
        <a class="img-inner-wrap img-link" href="<?php echo $image->url ?>" rel="galery">
          <img class="addshadow" src="<?php echo $image->thumb ?>" title="" />
          <div class="image-likes">
            <span style="float:left;">
              <?php echo date('d. M', strtotime($image->created)) ?>
            </span>
            <span style="float:right;">
              <?php echo $image->category ?>
            </span>
          </div>

          <?php if($image->category): ?>
          <div class="description">
            <span>
              <?php echo(''.$image->name.'') ?>
           </span>
          </div>
          <?php endif; ?>
        </a>
      </div>
    </div>

  <?php endforeach ?>
  </div>
  <div class="clearit"></div>
</section>

<a class="button" href="http://www.500px.com/<?php echo $contentfrom500px->user->name; ?>/">Mehr Fotos auf 500px</a>