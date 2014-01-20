<?php

require 'comments.read.php';

if (count($comments['data'])):
?>
	<h6><span><?= l::get('comments.title') ?: 'Kommentare' ?></span></h6>
	<ul id="comments">
		<?php $index = 0; ?>
		<?php foreach ($comments['data'] as $comment):
			if ( $index != 0) {
				echo '<hr>';
			};
			$index = $index+1;
			echo '<li class="'.(( $index % 2 == 0 ) ? 'odd' : 'even').'">';
			echo (c::get('comments.gravatar') ? '<div class="comment-gravatar">'.$comment['gravatar'].'</div>' : '').
			'
			<div class="comment-name">'.$comment['name'].'</div>
			<div class="comment-date">'.date('d.m.Y', strtotime($comment['date'])).'</div>
			<div class="clearit"></div>';
			echo '<div class="comment-text">'.kirbytext($comment['text']).'</div>
			</li>';
		endforeach; ?>
	</ul>
	<?php
endif;

