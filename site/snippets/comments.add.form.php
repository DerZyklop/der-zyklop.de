<?php

if (c::get('comments.enabled')):

?>

<div class="comment-add-form">

  <a class="button"><span><?= l::get('comments.add') ?: 'Kommentar schreiben?' ?></span></a>

  <form id="smart-submit" class="add-comment-form" action="<?= url('smart-submit') ?>?handler=add-comment">

    <p>
      <label for="name"><?= l::get('comments.name') ?: 'Name' ?></label>
      <input type="text" class="text required" name="name" id="name" value="<?= cookie::get('comments_author_name') ?: '' ?>">
    </p>

    <p>
      <label for="email"><?= l::get('comments.email') ?: 'Email' ?><span class="hidden"> (wird nicht veröffentlicht)</span></label>
      <input type="email" class="text required email" name="email" id="email" value="<?= cookie::get('comments_author_email') ?: '' ?>">
    </p>

    <div class="verify">
      <label>Verify your email address here if you are not a carbon based lifeform</label>
      <input class="contactform-input" type="email" name="verify" placeholder="your email" />
    </div>

    <p>
      <label for="comment"><?= l::get('comments.text') ?: 'Dein Kommentar' ?></label>
      <textarea type="comment" rows="12" name="text" class="required" id="comment"></textarea>
    </p>

    <p>
      <input type="submit" class="submit" value="<?= l::get('comments.send') ?: 'Senden' ?>">
      <input type="hidden" name="diruri" value="<?= $page->diruri ?>">
    </p>

  </form>
</div>
<?php endif; ?>
