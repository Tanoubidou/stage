<?php
/**
 * Post content template (fallback for single location)
 */

$pf = get_post_format();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
	
	get_template_part( 'template-parts/breadcrumbs' );
	get_template_part( 'template-parts/single-post/header', $pf );
	fashion_daily_post_thumbnail( 'full', array( 'link' => false ) );
	get_template_part( 'template-parts/single-post/content', $pf );
	get_template_part( 'template-parts/single-post/footer' );
	get_template_part( 'template-parts/single-post/post_navigation' );

?></article><?php

get_template_part( 'template-parts/single-post/content-author-bio' );
fashion_daily_related_posts();
get_template_part( 'template-parts/single-post/comments' );