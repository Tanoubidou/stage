<?php
/**
 * Template part for posts navigation.
 *
 * @package Fashion_daily
 */

do_action( 'fashion_daily-theme/blog/posts-navigation-before' );

the_posts_pagination(
	apply_filters( 'fashion_daily-theme/posts/navigation-args',
		array(
			'prev_text' => sprintf(
				'%1$s',
				fashion_daily_get_icon_svg( 'pagin-prev' ) ),
			'next_text' => sprintf(
				'%1$s',
				fashion_daily_get_icon_svg( 'pagin-next' ) ),
		)
	)
);

do_action( 'fashion_daily-theme/blog/posts-navigation-after' );
