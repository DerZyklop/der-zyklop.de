<?php snippet('header'); ?>

<?php snippet('menu') ?>

<section class="blogarticle">
  <article>
    <div class="img-border">
      <h2><?php echo html($page->title()) ?>
          <span class="entry-date">
              <span class="day"><?php echo html($page->date('d')) ?></span>
              <span class="month"><?php echo html($page->date('m')) ?></span>
              <span class="year"><?php echo html($page->date('Y')) ?></span>
          </span>
          <div class="clearit"></div>
      </h2>

      <?php
          if ( $page->intro() ) {
              echo '<div class="intro">'.kirbytext($page->intro()).'</div>';
          }
      ?>
      <div data-post="<?php echo html($page->uid()); ?>" data-likes="<?php echo html($page->likes()); ?>" class="article-text">
        <?php echo kirbytext($page->text()); ?>
      </div>
    </div>
    <div class="options-bar">
      <div class="autorinfo">
        <?php echo $page->parent()->author() ?>
      </div>
      <div class="right">
          <a class="supporters-btn twitter" href="https://twitter.com/intent/tweet?text=<?php echo( urlencode( excerpt($page->title(), 100).' ' ) ) ?><?php echo($page->url()) ?><?php echo(urlencode(' (via @derzyklop)')) ?>">Twitter</a>
          <a class="supporters-btn facebook" href="http://www.facebook.com/share.php?u=<?php echo($page->url()) ?>&t=<?php echo( urlencode( $page->title() ) ) ?>">Facebook</a>
          <a class="supporters-btn flattr" href="https://flattr.com/submit/auto?user_id=DerZyklop&url=<?php echo($page->url()) ?>&title=<?php echo(urlencode($page->title())) ?>&description=<?php echo( urlencode(excerpt($page->text(), 260)) ) ?>&language=de_DE&<?php if ($page->tags()) : ?>tags=<?php echo( $page->tags() ) ?>&<?php endif; ?>category=text">Flattr</a>
          <!-- <a class="supporters-btn pinterest" href="javascript:void((function()%7Bvar%20e%3Ddocument.createElement(%27script%27)%3Be.setAttribute(%27type%27,%27text/javascript%27)%3Be.setAttribute(%27charset%27,%27UTF-8%27)%3Be.setAttribute(%27src%27,%27http://assets.pinterest.com/js/pinmarklet.js%3Fr%3D%27%2BMath.random()*99999999)%3Bdocument.body.appendChild(e)%7D)())%3B" >Pinterest</a> -->
          <!--<a class="supporters-btn readability" href="javascript:(%28function%28%29%7Bwindow.baseUrl%3D%27http%3A//www.readability.com%27%3Bwindow.readabilityToken%3D%277uLMQtgWs3kDkApYZwwTbytFFRFru9z4cmyB4B59%27%3Bvar%20s%3Ddocument.createElement%28%27script%27%29%3Bs.setAttribute%28%27type%27%2C%27text/javascript%27%29%3Bs.setAttribute%28%27charset%27%2C%27UTF-8%27%29%3Bs.setAttribute%28%27src%27%2CbaseUrl%2B%27/bookmarklet/read.js%27%29%3Bdocument.documentElement.appendChild%28s%29%3B%7D%29%28%29)" >Readability</a>-->
          <div class="clearit"></div>
      </div>
      <div class="clearit"></div>
    </div>

    <?php //snippet('taglist') ?>
  </article>

  <?php snippet('article-suggestion'); ?>
  <?php //snippet('article-nav'); ?>

  <div>
    <?php snippet('disqus', array('disqus_shortname' => 'derzyklop', 'disqus_developer' => true)) ?>
  </div>

</section>

<?php snippet('rss-button') ?>

<?php snippet('footer') ?>
<div id="reading-progress"></div>
