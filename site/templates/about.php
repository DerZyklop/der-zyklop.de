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


              <?php
                $blog = $pages->find('blog');
                $articles = $blog->children()->filterBy('justforrss','')->visible();
                $oldDate = $articles->first()->date('Y-m-d'); // or your date as well
                $newDate = $articles->last()->date('Y-m-d');
                $datediff = strtotime($newDate) - strtotime($oldDate);
                $days = $datediff/(60*60*24);
                (float)$articlesPerDay = (int)$articles->count() / (int)$days;
              ?>
              <p>Seit <code><?= $articles->first()->date('Y') ?></code> erscheinen auf meinem Blog ca. <code><?= round($articlesPerDay * 30) ?></code> Artikel pro Monat.<br>Bis heute sind das <code><?= $articles->count() ?></code> Artikel.</p>



          </div>
        </div>
      </article>
    </section>

  </div>

<!--   <div class="meta">
    <section>
      <?php #snippet('article-suggestion') ?>
      <?php #snippet('article-taglist') ?>
    </section>
  </div> -->

  </section>

  <?php #snippet('sec-author') ?>

  <?php snippet('footer') ?>

</div> <!-- .page-wrap -->

<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" === document.location.protocol) ? "https://www.der-zyklop.de/piwik/" : "http://www.der-zyklop.de/piwik/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://www.der-zyklop.de/piwik/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->

<!--   <style>
  #tags {
    display: block;
    height: 10px;
    width: 20%;
    box-sizing: border-box;
    background: red;
    position: absolute;
    right: 0
  }
</style>
<aside id="tags">foofo</aside> -->


  <script async type="text/javascript" src='/assets/js/script.js'></script>

</body>
</html>
