<?php snippet('header') ?>
<?php snippet('submenu') ?>

<section>

<?php
// Load a Dribbble object for the user 's_albrecht'
// containing 3 shots and 3 likes.
$dribbble   = dribbble('derzyklop', 8);
$shots      = $dribbble->shots();
$player     = $dribbble->player();
$likes      = $dribbble->likes();

//echo '<h1>'.$page->text.'</h1>';

foreach ($shots as $shot): ?>

  <div class="dribbble-shot">
    <div class="img-outer-wrap">
        <a class="img-inner-wrap img-link" href="<?php echo $shot->url ?>">
          <img class="addshadow" src="<?php echo $shot->image ?>" title="<?php echo html($shot->title) ?>" />
          <div class="image-likes">
            <span style="float:left;">
              <?php echo date('d. M Y', strtotime($shot->created)) ?> | <?php echo date('h:i', strtotime($shot->created)) ?> Uhr
            </span>
            <span style="float:right;">
              <?php echo($shot->likes.' ♥') ?>
            </span>
            <?php //echo '<span class="views">'.$shot->views.' View(s)</span>' ?>
          </div>
          <div class="description">
            <span>
              <?php echo html($shot->title) ?>
            </span>
          </div>
        </a>
    </div>
  </div>


<?php endforeach ?>

<!--
  <ul>
      <?php foreach ($likes as $like): ?>
      <li>
          <a href="<?php echo $like->url ?>" title="<?php echo $like->title ?>">
              &hearts; <?php echo $like->title ?> by <?php echo $like->player->name ?>
          </a>
      </li>
      <?php endforeach ?>
  </ul>
-->
  <div class="clearit"></div>
</section>

<a class="button" href="http://www.dribbble.com/<?php echo $dribbble->username; ?>/">Mehr Grafiken auf dribbble</a>

<?php snippet('piwik') ?>
</section>

<?php snippet('sec-author') ?>
<?php snippet('footer') ?>
