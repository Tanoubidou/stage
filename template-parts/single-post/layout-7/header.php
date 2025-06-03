<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fashion_daily
 */

$categories_visible 	= fashion_daily_theme()->customizer->get_value( 'single_post_categories' );
$reading_time_visible 	= fashion_daily_theme()->customizer->get_value( 'single_post_reading_time' );
?>

<header class="entry-header">
	<div class="entry-meta entry-meta-top"><?php
		fashion_daily_posted_in( array(
			'visible' 	=> $categories_visible
		) );

		fashion_daily_get_post_reading_time( array(
			'visible' => $reading_time_visible,
			'echo'    => true,
		) );
	?></div><!-- .entry-meta -->
	<h1 class="entry-title single-entry-title"><?php 
		fashion_daily_sticky_label();
		the_title();
	?></h1>
	<div class="entry-meta entry-meta-footer"><?php
		fashion_daily_posted_on( array(
			'prefix' 	=> '',
			'format' 	=> 'F j, Y \A\T g:i a'
		) );

		fashion_daily_post_comments( array(
			'prefix' 	=> ''
		) );
	?></div><!-- .entry-meta -->
</header><!-- .entry-header -->
