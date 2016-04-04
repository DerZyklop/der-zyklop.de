<?php snippet('header'); ?>
<?php snippet('dz-banner') ?>

<div class="page-wrap">
  <div class="content">

  <section class="<?= $site->template() ?>">
  <?php
    $blog = $pages->find('blog');
    $articles = $blog->children()->filterBy('justforrss','')->visible();
  ?>


    <script type="text/javascript">
        jQuery(document).ready(function(){
          "use strict";
          $("body").addClass("blog");
        });
    </script>
    <?php
      $oldDate = $articles->first()->date('Y-m-d'); // or your date as well
      $newDate = $articles->last()->date('Y-m-d');
      $datediff = strtotime($newDate) - strtotime($oldDate);
      $days = $datediff/(60*60*24);
      (float)$articlesPerDay = (int)$articles->count() / (int)$days;
    ?>

    <h2>Das Archiv</h2>
    <table>
      <tr>
        <td width="50%">Erster Artikel</td>
        <td width="50%"><?= html($oldDate) ?></td>
      </tr>
      <tr>
        <td>Neuster Artikel</td>
        <td><?= html($newDate) ?></td>
      </tr>
      <tr>
        <td>Artikel insgesammt</td>
        <td><?= $articles->count() ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table>
      <tr>
        <td width="50%">Ø Artikel pro Monat</td>
        <td width="50%"><?= "ca. ".round($articlesPerDay * 30) ?></td>
      </tr>
      <tr>
        <td>Ø Artikel pro Jahr</td>
        <td><?= "ca. ".round($articlesPerDay * 365) ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <?php
      $datediff2013 = strtotime('2013-12-31') - strtotime('2013-01-01');
      $days2013 = $datediff2013/(60*60*24);
      $articlesIn2013 = $articles->filterBy('date', '>', strtotime('2013-01-01'))->filterBy('date', '<', strtotime('2013-12-31'));
      (float)$articlesPerDayIn2013 = (int)$articlesIn2013->count() / (int)$days2013;
    ?>
    <table>
      <tr>
        <td width="50%">Ø Artikel pro Monat in 2013</td>
        <td width="50%"><?= "ca. ".round($articlesPerDayIn2013 * 30) ?></td>
      </tr>
      <tr>
        <td>Ø Artikel pro Jahr in 2013</td>
        <td><?= "ca. ".round($articlesPerDayIn2013 * 365) ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <?php
      $datediff2014 = strtotime('2014-12-31') - strtotime('2014-01-01');
      $days2014 = $datediff2014/(60*60*24);
      $articlesIn2014 = $articles->filterBy('date', '>', strtotime('2014-01-01'))->filterBy('date', '<', strtotime('2014-12-31'));
      (float)$articlesPerDayIn2014 = (int)$articlesIn2014->count() / (int)$days2014;
    ?>
    <table>
      <tr>
        <td width="50%">Ø Artikel pro Monat in 2014</td>
        <td width="50%"><?= "ca. ".round($articlesPerDayIn2014 * 30) ?></td>
      </tr>
      <tr>
        <td>Ø Artikel pro Jahr in 2014</td>
        <td><?= "ca. ".round($articlesPerDayIn2014 * 365) ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <?php
      $datediff2015 = strtotime('2015-12-31') - strtotime('2015-01-01');
      $days2015 = $datediff2015/(60*60*24);
      $articlesIn2015 = $articles->filterBy('date', '>', strtotime('2015-01-01'))->filterBy('date', '<', strtotime('2015-12-31'));
      (float)$articlesPerDayIn2015 = (int)$articlesIn2015->count() / (int)$days2015;
    ?>
    <table>
      <tr>
        <td width="50%">Ø Artikel pro Monat in 2015</td>
        <td width="50%"><?= "ca. ".round($articlesPerDayIn2015 * 30) ?></td>
      </tr>
      <tr>
        <td>Ø Artikel pro Jahr in 2015</td>
        <td><?= "ca. ".round($articlesPerDayIn2015 * 365) ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <?php
      $datediff2016 = strtotime($articles->last()->date('Y-m-d')) - strtotime('2016-01-01');
      $days2016 = $datediff2016/(60*60*24);
      $articlesIn2016 = $articles->filterBy('date', '>', strtotime('2016-01-01'));
      (float)$articlesPerDayIn2016 = (int)$articlesIn2016->count() / (int)$days2016;
    ?>
    <table>
      <tr>
        <td width="50%">Ø Artikel pro Monat von 2016 bis heute</td>
        <td width="50%"><?= "ca. ".round($articlesPerDayIn2016 * 30) ?></td>
      </tr>
      <tr>
        <td>Ø Artikel pro Jahr von 2016 bis heute</td>
        <td><?= "ca. ".round($articlesPerDayIn2016 * 365) ?></td>
      </tr>
    </table>

  </section>

  <?php snippet('rss-button') ?>

  </section>
</div>
<?php snippet('footer') ?>
