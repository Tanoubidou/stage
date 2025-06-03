<?php

/**
 * Template part for displaying post publish date.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fashion_daily
 */

if ('post' === get_post_type()) :

	$next_post = get_next_post();

	if (!$next_post || get_the_date('m Y', $next_post->ID) !== get_the_date('m Y')) {
		printf('<h4 class="posts-list__new-date"><time datetime="%1$s">%2$s</time></h4>', get_the_date('Y-m'), get_the_date('F, Y'));
	}

	$permalink 		= get_permalink();
	$date 			= get_the_date('c');
	$day 			= get_the_date('d');
	$month 			= get_the_date('F');
	$time 			= get_the_time('g:i a');

	$format = apply_filters(
		'fashion_daily-theme/post/timeline-date-output',
		'<div class="post-timeline-date">
			<a class="post-timeline-date__link" href="%1$s">
				<time datetime="%5$s">
					<span class="post-timeline-date__date heading-font-family"><span class="post-timeline-date__day">%2$s</span></span>
					<span class="post-timeline-date__time">%3$s</span>
				</time>
			</a>
		</div><!-- .post-timeline-date -->'
	);

	printf($format, $permalink, $day, $month, $time, $date);

endif;
