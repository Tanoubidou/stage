<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fashion_daily
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-default'); ?>>

	<header class="entry-header">
		<h3 class="entry-title"><?php 
			fashion_daily_sticky_label();
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		?></h3>
		<div class="entry-meta">
			<?php
				fashion_daily_posted_by();
				fashion_daily_posted_in( array(
					'prefix' => __( 'In', 'fashion_daily' ),
				) );
				fashion_daily_posted_on( array(
					'prefix' => __( 'Posted', 'fashion_daily' )
				) );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php fashion_daily_post_thumbnail( 'fashion_daily-thumb-listing' ); ?>

	<?php fashion_daily_post_excerpt(); ?>

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
				fashion_daily_post_tags( array(
					'prefix' => __( 'Tags:', 'fashion_daily' )
				) );
			?>
			<div><?php
				fashion_daily_post_comments( array(
					'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
					'class'  => 'comments-button'
				) );
				fashion_daily_post_link();
			?></div>
		</div>
		<?php fashion_daily_edit_link(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
