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

  <div class="meta">
    <section class="width-wrap">
      <?php snippet('article-suggestion') ?>
      <?php snippet('article-taglist') ?>
    </section>
  </div>

  </section>

  <section class="width-wrap">
    <div class="right">
      <?php echo kirbytext($site->copyright()) ?>
    </div>
    <div class="clearit"></div>
  </section>

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

  <script async type="text/javascript" src='assets/js/script.min.js'></script>

  <?= css('assets/styles/styles.css') ?>

</body>
</html>
