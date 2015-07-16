  <!-- Beginn der OpenGraph Tags für Facebook & Co. -->
  <meta name="DC.Title" content="<?php echo html($page->title()) ?>" />
  <meta name="DC.Creator" content="<?php echo html($site->author()) ?>" />
  <meta name="DC.Rights" content="<?php echo html($site->author()) ?>" />
  <meta name="DC.Publisher" content="<?php echo html($site->author()) ?>" />
  <meta name="DC.Description" content="<?php echo html($site->description()) ?>"/ >
  <meta name="DC.Language" content="de_DE" />
  <meta property="og:title" content="<?php echo html($page->title()) ?> | <?php echo html($site->title()) ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo html($site->url()) ?>" />
  <?php $image = $page->images()->first() ?>
  <?php if(isset($image)) { ?>
    <meta property="og:image" content="<?php echo $image->url() ?>" />
  <?php } ?>
  <?php if ($page->template() == 'blogarticle') : ?>
    <meta property="og:description" content="<?= excerpt($page->text(), 250) ?>"/>
  <?php else : ?>
    <meta property="og:description" content="<?php echo html($site->description()) ?>" />
  <?php endif; ?>
