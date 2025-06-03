<?php
/**
 * The template for displaying related post.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    Fashion_daily
 * @subpackage single-post
 */

?>

<article class="related-post hentry <?php echo esc_attr( $related_classes ); ?>">
	<div class="related-post__inner">
		<?php if ( has_post_thumbnail() && $this->settings['image_visible'] ) {
			fashion_daily_post_thumbnail(
				'fashion_daily-thumb-related',
				array( 'visible' => $this->settings['image_visible'] )
			);
		} ?>
		<div class="related-post__content">
			<header class="entry-header">
				<?php if ( $this->settings['title_visible'] ) { ?>
					<h3 class="entry-title h6-style"><?php 
						the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
					?></h3>
				<?php } ?>

				<div class="entry-meta"><?php
					fashion_daily_posted_by( array(
						'visible' 	=> $this->settings['author_visible'],
						'prefix' 	=> '',
					) );

					fashion_daily_posted_on( array(
						'visible' 	=> $this->settings['date_visible'],
						'prefix' 	=> '',
					) );

					fashion_daily_post_comments( array(
						'visible' 	=> $this->settings['comment_visible'],
						'prefix' 	=> '',
						'postfix' 	=> '',
					) );
					
				?></div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<?php fashion_daily_post_excerpt( array(
				'visible' 		=> $this->settings['content_type'],
				'words_count' 	=> $this->settings['content_length']
			)); ?>
		</div>
	</div>
</article><!--.related-post-->
