<?php


function relative_time($date, $postfix = ' ago', $fallback = 'F Y')
{
    $diff = time() - strtotime($date);
    if($diff < 60)
        return $diff . ' second'. ($diff != 1 ? 's' : '') . $postfix;
    $diff = round($diff/60);
    if($diff < 60)
        return $diff . ' minute'. ($diff != 1 ? 's' : '') . $postfix;
    $diff = round($diff/60);
    if($diff < 24)
        return $diff . ' hour'. ($diff != 1 ? 's' : '') . $postfix;
    $diff = round($diff/24);
    if($diff < 7)
        return $diff . ' day'. ($diff != 1 ? 's' : '') . $postfix;
    $diff = round($diff/7);
    if($diff < 4)
        return $diff . ' week'. ($diff != 1 ? 's' : '') . $postfix;
    $diff = round($diff/4);
    if($diff < 12)
        return $diff . ' month'. ($diff != 1 ? 's' : '') . $postfix;

    return date($fallback, strtotime($date));
};



require 'comments.read.php';
?>
<div class="comments-list">
  <?php if (count($comments['data']) != 0) : ?>
    <h6><span><?php
      echo count($comments['data']).' ';
      if (count($comments['data']) == 0) {
        echo l::get('comments.title') ?: 'Kommentare';
      } elseif (count($comments['data']) == 1) {
        echo 'Kommentar';
      } else {
        echo l::get('comments.title') ?: 'Kommentare';
      }

    ?></span></h6>
  <?php endif; ?>
<?php
if (count($comments['data'])):
?>
  <ul id="comments">
    <?php $index = 0; ?>
    <?php foreach ($comments['data'] as $comment):
      $index = $index+1;
      echo '<li class="'.(( $index % 2 == 0 ) ? 'odd' : 'even').'">';
    ?>
      <?php $anchor = date("Ymd_his",strtotime($comment['date'])) ?>
      <a class="comment-anchor" href="#<?= $anchor ?>" id="<?= $anchor ?>">
        <div class="comment-name"><?= $comment['name'] ?></div>
        <div class="comment-date"><?= relative_time($comment['date']) ?></div>
        <div class="clearit"></div>
      </a>
    <?php
        echo (c::get('comments.gravatar') ? '<div class="comment-gravatar"><div><a href="https://de.gravatar.com/">'.$comment['gravatar'].'</a></div></div>' : '');
        #echo '<div class="comment-date">'.date('H:m d.m.Y', strtotime($comment['date'])).'</div>';

        echo '<div class="clearit"></div>';
        echo '<div class="comment-text">'.kirbytext($comment['text']).'</div>
      </li>';
    endforeach; ?>
  </ul>
<?php
endif;
?>
</div>
<?php
