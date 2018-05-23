<!DOCTYPE HTML>

<html lang="de-DE">
<head>
  <meta charset="UTF-8">
  <meta name="referrer" content="no-referrer">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= html($page->title()) ?> - <?= html($site->title()) ?></title>

  <meta name="description" content="<?= html($site->description()) ?>" />
  <?php snippet('opengraph') ?>

  <meta name="keywords" content="<?= html($site->keywords()) ?>" />
  <meta name="robots" content="index, follow" />

  <link rel="shortcut icon" href="<?= url('assets/images/favicon.png') ?>" type="image/png" />
  <link rel="icon" href="<?= url('assets/images/favicon.png') ?>" type="image/png" />
  <link rel="apple-touch-icon" href="<?= u('assets/images/apple-touch-icon.png') ?>" />

  <?= css('assets/styles/styles.css') ?>

  <link rel="alternate" type="application/rss+xml" href="<?= url('blog/feed') ?>" title="<?= html($site->title()) ?> Blog Feed" />

  <!--[if lte IE 8]>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.header').prepend('Leider macht dein Browser meine Webseite kaputt. Das macht der auch mit anderen Webseiten, aber woher willst du das wissen.. kennst es ja nicht anders. Führ mal eine Aktualisierung durch, oder hol dir gleich einen besseren Browser, wie <a href="http://www.mozilla.org/de/firefox/new/" style="display:inline;">Firefox</a> oder <a href="https://www.google.com/chrome/" style="display:inline;">Chrome</a>.');
        });
    </script>
  <![endif]-->

  <meta name="google-site-verification" content="JFTin9xnictxV3Ehnii_6UPaeb_eV0zjZk3Riq6SoJQ" />

  <script type="text/javascript" src='/assets/js/libs.js'></script>
</head>
<body class="<?php if ($page->targetgroup() == 'small') { echo "invert";} ?>">
<?php #snippet('menu') ?>
