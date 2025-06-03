<?php
/**
 * Template part for displaying single posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fashion_daily
 */
$pf = get_post_format();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php 

	get_template_part( 'template-parts/single-post/content', $pf );
	get_template_part( 'template-parts/single-post/footer' );
	get_template_part( 'template-parts/single-post/post_navigation' );

?></article><!-- #post-## --><?php

get_template_part( 'template-parts/single-post/content-author-bio' );
fashion_daily_related_posts();
get_template_part( 'template-parts/single-post/comments' );