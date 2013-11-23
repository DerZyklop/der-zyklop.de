<div class="instagram-photo">
  <div class="img-outer-wrap">
      <a class="img-inner-wrap img-link" href="<?php echo $image->link; ?>">
        <img class="addshadow" src="<?php echo $image->url ?>" title="" />
        <div class="image-likes">
          <span style="float:left;">
            <?php echo date('d. M Y', $image->created) ?> | <?php echo date('h:i', $image->created) ?> Uhr
          </span>
          <span style="float:right;">
            <?php echo($image->likes.' ♥') ?>
          </span>
        </div>
        <?php if($image->tags): ?>
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
