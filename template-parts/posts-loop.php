<?php
/**
 * Posts loop template
 */

$nav_type = fashion_daily_theme()->customizer->get_value( 'blog_pagination_type' );

do_action( 'fashion_daily-theme/blog/before' );

?><div <?php fashion_daily_posts_list_class(); ?>><?php

	while ( have_posts() ) : the_post();

		/*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		
		get_template_part( fashion_daily_get_post_template_part_slug(), fashion_daily_get_post_style() );

	endwhile;

?></div><?php

do_action( 'fashion_daily-theme/blog/after' );

get_template_part( 'template-parts/content-navigation', $nav_type );
