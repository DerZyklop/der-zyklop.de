<!DOCTYPE HTML>

<html lang="de-DE">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo html($page->title()) ?> - <?php echo html($site->title()) ?></title>

  <meta name="description" content="<?php echo html($site->description()) ?>" />
  <?php if ($page->template() == 'blogarticle') : ?>
    <meta property="og:description" content="<?= excerpt($page->text(), 250) ?>"/>
  <?php endif; ?>
  <meta name="keywords" content="<?php echo html($site->keywords()) ?>" />
  <meta name="robots" content="index, follow" />

  <link rel="shortcut icon" href="<?php echo url('assets/images/favicon.png') ?>" type="image/png" />
  <link rel="icon" href="<?php echo url('assets/images/favicon.png') ?>" type="image/png" />
  <link rel="apple-touch-icon" href="<?php echo u('assets/images/apple-touch-icon.png') ?>" />

	<?php echo js('assets/js/script.min.js') ?>
  <?php echo css('assets/styles/styles.css') ?>

  <?php echo css('assets/fancybox/jquery.fancybox.css') ?>

  <link rel="alternate" type="application/rss+xml" href="<?php echo url('pxwrk/feed') ?>" title="<?php echo html($site->title()) ?> Blog Feed" />

  <!--[if lte IE 8]>
  	<script type="text/javascript">
  	    jQuery(document).ready(function(){
  	        jQuery('.header').prepend('Leider macht dein Browser meine Webseite kaputt. Das macht der auch mit anderen Webseiten, aber woher willst du das wissen.. kennst es ja nicht anders. Führ mal eine Aktualisierung durch, oder hol dir gleich einen besseren Browser, wie <a href="http://www.mozilla.org/de/firefox/new/" style="display:inline;">Firefox</a> oder <a href="https://www.google.com/chrome/" style="display:inline;">Chrome</a>.');
  	    });
  	</script>
  <![endif]-->

</head>
<body>
<div class="width-wrap">
  <div class="inner-width-wrap">
    <div class="header clearfix">
      <h1>
          <a href="<?php echo url() ?>">
              <img src="<?php echo url('assets/images/derzyklop.png'); ?>" alt="<?php echo h($site->title()) ?>" width="" />
          </a>
      </h1>
    </div>
