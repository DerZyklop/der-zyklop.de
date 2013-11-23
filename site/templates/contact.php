<?php snippet('header') ?>

<?php snippet('menu') ?>
<?php snippet('submenu') ?>

<section>
  <article>
    <h1><?php echo html($page->title()) ?></h1>
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
    <div class="clearit"></div>
  </article>
</section>

<?php snippet('footer') ?>
