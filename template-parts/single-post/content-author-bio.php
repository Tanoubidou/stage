<?php
/**
 * The template for displaying author bio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fashion_daily
 */

$is_enabled 			= fashion_daily_theme()->customizer->get_value( 'post_authorbio_block' );
$author_description 	= get_the_author_meta( 'description' );

if ( ! $is_enabled || empty( $author_description ) ) {
	return;
}

?>

<div class="post-author-bio">
	<h4 class="post-author-bio__title"><?php esc_html_e( 'Author', 'fashion_daily' ); ?></h4>
	<div class="post-author__holder clear">
		<div class="post-author__avatar"><?php
			fashion_daily_get_post_author_avatar( array(
				'size' => 140
			) );
		?></div>
		<div class="post-author__content">
			<h5 class="post-author__title"><?php the_author_posts_link(); ?></h5>
			<div class="post-author__description"><?php
				echo esc_html( $author_description );
			?></div>
		</div>
	</div>
</div>