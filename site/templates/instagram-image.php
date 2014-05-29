<?php snippet('header') ?>
<?php snippet('submenu') ?>
<section class="instagram-detail clearfix">
  <article>
    <?php if ( param('image_id') ): ?>
      <?php
        $instagram  = instagram_single('161059.c103450.088260c0523643618bff0e812f2fcb2a', param('image_id'));
        $image = $instagram->image;
      ?>
      <h3><a href="http://instagram.com/<?php echo $instagram->user->username; ?>/"><img src="<?php echo $instagram->user->picture; ?>" style="float:left;margin-right:20px;border-radius:4px;" height="42px" alt="" /></a><?php echo $instagram->user->full_name; ?> auf Instagram</h3>
      <div class="img-border">
        <div class="left" style="margin-right: 1em;">
          <?php snippet('instagram-photo', array('image' => $image)) ?>
        </div>
        <div style="padding: 1em;">
          Filter: <?php echo $image->filter ?>
          <br />
          Ort: <?php if ($image->location) : ?>
            <a href="http://maps.google.de/maps?q=<?php echo $image->latitude; ?>,<?php echo $image->longitude; ?>&num=1&t=m&z=11"><?php echo $image->location; ?></a>
          <?php else: ?>
            <?php echo '-'; ?>
          <?php endif; ?>
          <br />
          Tags:
          <?php if($image->tags): ?>
          <?php
            foreach ($image->tags as $tag) {
               echo($tag);
               echo(', ');
            }
          ?>
        <?php endif; ?>
        <br />
        <a href="<?php echo $image->thumb ?>">Kleines Bild</a>
        <br />
        <a href="<?php echo $image->image_lowres ?>">Mittleres Bild</a>
        <br />
        <a href="<?php echo $image->url ?>">Original Bild</a>
      </div>
    </div>
  </article>
  <?php else: ?>
    <h2>Ich hab mein bestes gegeben</h2>
    <p>...ich konnte das Bild nicht finden.</p><p>Entweder ist das Bild gelöscht worden, oder DerZyklop hat mist gebaut. Bei letzterem würde ich mich über eine kurze <a href="mailto:mail@der-zyklop.de">Mail</a> freuen.</p>
  <?php endif; ?>
</section>
<?php snippet('piwik') ?>
<?php snippet('footer') ?>
