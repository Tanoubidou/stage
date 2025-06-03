<?php
/**
 * Post single meta
 *
 * @package Gutenix
 */

$categories_visible = fashion_daily_theme()->customizer->get_value( 'single_post_categories' );

if ( 'post' === get_post_type() ) :
	
	echo '<div class="entry-meta">';
		
		fashion_daily_posted_on( array(
			'prefix' 	=> esc_html__( 'Published on', 'fashion_daily' )
		) );

		fashion_daily_posted_by( array(
			'prefix' 	=> esc_html__( 'by', 'fashion_daily' ),
		) );
		
		fashion_daily_post_comments( array(
			'prefix' 	=> fashion_daily_get_icon_svg( 'comment' ),
			'postfix' 	=> ''
		) );

		fashion_daily_posted_in( array(
			'visible' 	=> $categories_visible,
			'prefix' 	=> esc_html__( 'Posted in', 'fashion_daily' ) . ':',
		) );

	echo '</div>';

endif;
