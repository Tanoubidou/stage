<?php do_action( 'fashion_daily-theme/comments/comment-before' ); ?>

<div class="comment-body__holder">
	<?php if ( ! empty( fashion_daily_comment_author_avatar() ) ) : ?>
		<div class="comment-author vcard">
			<?php echo fashion_daily_comment_author_avatar( array(
				'size' => 56
			) ); ?>
		</div>
	<?php endif; ?>
	<div class="comment-content-wrap">
		<div class="comment-meta">
			<div class="comment-metadata">
				<?php echo fashion_daily_get_comment_author_link(); ?>
				<?php echo fashion_daily_get_comment_date( array(
					'human_time' => true,
				) ); ?>
			</div>
		</div>
		<div class="comment-content">
			<?php echo fashion_daily_get_comment_text(); ?>
		</div>
		<div class="reply"><?php
			echo fashion_daily_get_comment_reply_link( array(
				'reply_text' => fashion_daily_get_icon_svg( 'reply' ) . esc_html__( 'Reply', 'fashion_daily' ),
			) );
		?></div>
	</div>
</div>

<?php do_action( 'fashion_daily-theme/comments/comment-after' ); ?>