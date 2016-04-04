<?php snippet('header'); ?>
<?php snippet('dz-banner') ?>

<div class="page-wrap">
  <div class="content">

    <section>
      <article>
        <div class="img-border">
            <?php $image = $page->images()->find('01.png') ?>
            <?php if(isset($image)) { ?>
            <img src="<?php echo $image->url() ?>" alt="<?php echo $image->title() ?>" />
            <p><?php echo $image->caption()//; var_dump($image->caption()) ?></p>
            <?php } ?>
            <div class="article-text">
                <?php echo kirbytext($page->text()) ?>
            </div>
        </div>
      </article>
    </section>

  </div>

</section>

<?php snippet('sec-author') ?>
<?php snippet('footer') ?>
