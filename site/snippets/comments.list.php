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

if (count($comments['data'])):
?>
	<h6><span><?= count($comments['data']) ?> <?= l::get('comments.title') ?: 'Kommentare' ?></span></h6>
	<ul id="comments">
		<?php $index = 0; ?>
		<?php foreach ($comments['data'] as $comment):
			if ( $index != 0) {
				echo '<hr>';
			};
			$index = $index+1;
			echo '<li class="'.(( $index % 2 == 0 ) ? 'odd' : 'even').'">';
				echo (c::get('comments.gravatar') ? '<div class="comment-gravatar">'.$comment['gravatar'].'</div>' : '');
				echo '<div class="comment-name">'.$comment['name'].'</div>';
				echo '<div class="comment-date">'.relative_time($comment['date']).'</div>';
				#echo '<div class="comment-date">'.date('H:m d.m.Y', strtotime($comment['date'])).'</div>';

				echo '<div class="clearit"></div>';
				echo '<div class="comment-text">'.kirbytext($comment['text']).'</div>
			</li>';
		endforeach; ?>
	</ul>
	<?php
endif;

