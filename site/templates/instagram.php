<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php snippet('submenu') ?>
<?php
  $instagram = instagram('161059.c103450.088260c0523643618bff0e812f2fcb2a', 27);
?>
<section class="instagram clearfix">
  <div class="img-border">
    <?php
    $images     = $instagram->images();

    foreach ($images as $image): ?>

    <?php 
      $cacheSubfolderName = 'instagram';
      $cacheDir = 'thumbs/' . $cacheSubfolderName;
      dir::make($cacheDir);
    
      $filename                  = 'thumbs/instagram/'.$image->created.'.306.306.jpg';
      $src                       = $image->image_lowres;
    
      if ( file_exists( $filename ) ) {
        $image->thumb          = url($filename);
      } else {
        //var_dump($filename);
        $copy = copy($src, $filename);
        if ( $copy ) {
          $image->thumb          = url($filename);
        } else {
          $image->thumb          = $src;
        }
      }
    ?>
    <div class="instagram-photo">
      <div class="img-outer-wrap">
        <a class="img-inner-wrap img-link" href="<?php echo $image->url ?>" data-link="<?php echo $pages->find('snapshots/detail')->url().'/image_id:'.$image->id ?>" rel="galery">
          <img class="addshadow" src="<?php echo $image->thumb ?>" title="" />
          <div class="image-likes">
            <span style="float:left;">
              <?php echo date('d. M', $image->created) ?>
            </span>
            <span style="float:right;">
              <?php echo($image->likes.' ♥') ?>
            </span>
          </div>
          
          <?php if($image->tags && isset($image->tags)): ?>
            <div class="description">
              <span>
                <?php 
                 $tags_maximum = 4;
                 if (count($image->tags) > $tags_maximum) {
                   for ($i = 0; $i < $tags_maximum; $i++) {
                     if ($i != 0) {
                       echo(' | ');
                     }
                     echo($image->tags[$i]);
                   }
                 } else {
                   $multible_tags = 0;
                   foreach ($image->tags as $tag) {
                     if ($multible_tags != 0) {
                       echo(' | ');
                     }
                     echo($tag);
                     $multible_tags = 1;
                   }
                 }
               ?>
             </span>
            </div>
          <?php endif; ?>
        </a>
      </div>
    </div>
    <?php endforeach ?>
    <div class="clearit"></div>
  </div>
</section>

<a class="btn" href="http://instagram.com/<?php echo $instagram->user->username; ?>/">Mehr Schnappschüsse auf Instagram</a>

<?php snippet('piwik') ?>
<?php snippet('footer') ?>
