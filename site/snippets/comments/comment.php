<article class="comment comment--<?php echo $comment->id(); ?>">
  <div class="comment-meta">

    <time datetime="<?php echo $comment->date('c'); ?>">
      <h6 style="text-align: right" class="entry-date">
        <span>
          <?php echo $comment->date('d.m.Y H:i'); ?>
        </span>
      </h6>
    </time>

    <div class="comment-author vcard">
      <?php echo $comment->gravatar(); ?>
      <h5>

        <?php if ($comment->authorUrl()): ?>
          <a href="<?php echo $comment->authorUrl()->obfuscate(); ?>" class="fn">
        <?php endif ?>
<!--         <a href="mailto:<?php echo $comment->authorEmail()->obfuscate(); ?>" class="fn"> -->
          <?php echo $comment->author(); ?>
<!--         </a> -->
        <?php if ($comment->authorUrl()): ?>
          </a>
        <?php endif ?>
      </h5>
    </div>

  </div>

  <div class="comment-content">
    <?php echo $comment->text()->safeMarkdown( c::get('comments.markdown') ); ?>
  </div>
  <p>
    <?php echo $comment->editLink(); ?>
    <?php echo $comment->deleteLink(); ?>
  </p>
</article>
