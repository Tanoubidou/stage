<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fashion_daily
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-item'); ?>>
	<div class="posts-list__item-content">
		<header class="entry-header">
			<h3 class="entry-title h4-style"><?php 
				fashion_daily_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h3>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->
	</div><!-- .posts-list__item-content -->

	<footer class="entry-footer">
		<div class="entry-footer-container">
			<div class="post__button-wrap"><?php
				fashion_daily_post_link( array(
					'class' 	=> 'btn-primary'
				) );
			?></div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
