<!DOCTYPE HTML>

<html lang="de-DE">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= html($page->title()) ?> - <?= html($site->title()) ?></title>

  <meta name="description" content="<?= html($site->description()) ?>" />
  <?php if ($page->template() == 'blogarticle') : ?>
    <meta property="og:description" content="<?= excerpt($page->text(), 250) ?>"/>
  <?php endif; ?>

  <meta name="keywords" content="<?= html($site->keywords()) ?>" />
  <meta name="robots" content="index, follow" />

  <link rel="shortcut icon" href="<?= url('assets/images/favicon.png') ?>" type="image/png" />
  <link rel="icon" href="<?= url('assets/images/favicon.png') ?>" type="image/png" />
  <link rel="apple-touch-icon" href="<?= u('assets/images/apple-touch-icon.png') ?>" />

  <?= js('assets/js/script.min.js') ?>
  <?= css('assets/styles/styles.css') ?>

  <link rel="alternate" type="application/rss+xml" href="<?= url('blog/feed') ?>" title="<?= html($site->title()) ?> Blog Feed" />

  <!--[if lte IE 8]>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.header').prepend('Leider macht dein Browser meine Webseite kaputt. Das macht der auch mit anderen Webseiten, aber woher willst du das wissen.. kennst es ja nicht anders. Führ mal eine Aktualisierung durch, oder hol dir gleich einen besseren Browser, wie <a href="http://www.mozilla.org/de/firefox/new/" style="display:inline;">Firefox</a> oder <a href="https://www.google.com/chrome/" style="display:inline;">Chrome</a>.');
        });
    </script>
  <![endif]-->

</head>
<body>
<?php snippet('menu') ?>

<div class="page-wrap">
  <?php #snippet('tweets-placeholder') ?>
  <a href="#nav" class="open-menu">
    ☰
  </a>
  <div class="content">
    <div class="header">
      <h1>
        <a href="<?= url() ?>">
          <img src="<?= url('assets/images/derzyklop.png'); ?>" alt="<?= h($site->title()) ?>" width="500px" />
        </a>
      </h1>
      <div class="claim">
        <span>Code, User Experience Design und Weltretten</span>
      </div>
    </div>
