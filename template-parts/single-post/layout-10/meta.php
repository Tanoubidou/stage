<?php
/**
 * Post single meta
 *
 * @package Gutenix
 */

$categories_visible = fashion_daily_theme()->customizer->get_value( 'single_post_categories' );

if ( 'post' === get_post_type() ) : ?>
	
	<div class="entry-meta entry-meta-header textaligncenter">
		
		<div class="posted-by vcard posted-by--avatar"><?php
			fashion_daily_get_post_author_avatar( array(
				'size' => 110,
			) );

			fashion_daily_posted_by( array(
				'prefix' 	=> esc_html__( 'By', 'fashion_daily' )
			) );
		?></div><?php

		fashion_daily_posted_on( array(
			'prefix' 	=> '',
			'format' 	=> 'F j, Y \A\T g:i a'
		) );

		fashion_daily_post_comments( array(
			'prefix' 	=> ''
		) );
	?></div><!-- .entry-meta --><?php

endif;
