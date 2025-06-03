<?php
/**
 * Template part for displaying author box the single posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fashion_daily
 */

$sidebar_position = fashion_daily_theme()->sidebar_position;
$classes = $sidebar_position != 'none' ? '' : 'col-lg-4';
?>

<div class="single-author-box-wrapper col-xs-12 <?php echo esc_attr( $classes ); ?>">
	<div class="single-author-box card-wrapper textaligncenter">
		<div class="single-author-box__avatar"><?php
			fashion_daily_get_post_author_avatar( array(
				'size' => 170
			) );
		?></div>
		<h5 class="single-author-box__title"><?php the_author_posts_link(); ?></h5>
		<div class="single-author-box__bio"><?php echo esc_html( the_author_meta( 'description' ) ); ?></div>
	</div>
</div><!-- .single-author-box -->
