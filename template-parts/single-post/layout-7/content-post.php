<?php
/**
 * Template part for displaying single posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fashion_daily
 */

$pf 				= get_post_format();
$sidebar_position 	= fashion_daily_theme()->sidebar_position;
$classes 			= $sidebar_position != 'none' ? '' : 'col-lg-8';
?>

<div class="row"><?php

	get_template_part( 'template-parts/single-post/layout-7/single-author-box' );

	?><div class="single-post-wrapper col-xs-12 <?php echo esc_attr( $classes ); ?>">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
			
			get_template_part( 'template-parts/single-post/layout-7/header', $pf );
			fashion_daily_post_thumbnail( 'full', array( 'link' => false ) );
			get_template_part( 'template-parts/single-post/content', $pf );
			get_template_part( 'template-parts/single-post/footer' );
			get_template_part( 'template-parts/single-post/post_navigation' );

		?></article><?php

		get_template_part( 'template-parts/single-post/content-author-bio' );
		fashion_daily_related_posts();
		get_template_part( 'template-parts/single-post/comments' );

	?></div>
</div>