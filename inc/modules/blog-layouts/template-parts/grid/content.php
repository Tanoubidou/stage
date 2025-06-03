<?php
/**
 * Template part for displaying grid style of posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fashion_daily
 */

$sidebar 			= fashion_daily_theme()->customizer->get_value( 'blog_sidebar_position' );
$categories_visible = fashion_daily_theme()->customizer->get_value( 'blog_post_categories' );
$columns 			= fashion_daily_theme()->customizer->get_value( 'blog_layout_columns' );

$thumbnail 			= 'fashion_daily-thumb-grid-2cols-nosidebar';
if( ( 'none' == $sidebar ) && ( '2-cols' == $columns ) ) {
	$thumbnail 		= 'fashion_daily-thumb-grid-2cols-nosidebar';
} elseif( ( 'none' == $sidebar ) && ( '3-cols' == $columns ) ) {
	$thumbnail 		= 'fashion_daily-thumb-grid-3cols-nosidebar';
} elseif( ( 'none' != $sidebar ) && ( '2-cols' == $columns ) ) {
	$thumbnail 		= 'fashion_daily-thumb-m';
}
?>

<article id="post-<?php echo esc_attr( the_ID() ); ?>" <?php post_class( 'posts-list__item grid-item' ); ?>>
	
	<?php fashion_daily_post_thumbnail( $thumbnail ); ?>

	<div class="posts-list__item-content textaligncenter">
		<div class="entry-meta entry-meta-top"><?php
			fashion_daily_posted_in( array(
				'visible' 	=> $categories_visible,
			) );

			fashion_daily_post_comments( array(
				'prefix' 	=> ''
			) );
		?></div><!-- .entry-meta -->

		<header class="entry-header">
			<h3 class="entry-title"><?php 
				fashion_daily_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h3>
		</header><!-- .entry-header -->

		<div class="entry-meta entry-meta-main"><?php
			fashion_daily_posted_on( array(
				'prefix' 	=> '',
				'time_ago' 	=> true
			) );

			fashion_daily_posted_by( array(
				'prefix' 	=> ''
			) );
		?></div><!-- .entry-meta -->

		<?php fashion_daily_post_excerpt(); ?>

		<footer class="entry-footer">
			<div class="entry-footer-container">
				<div class="entry-meta"><?php
					fashion_daily_post_tags( array(
						'prefix' 	=> '',
						'delimiter' => '',
					) );
				?></div>
				<div class="post__button-wrap"><?php
					fashion_daily_post_link( array(
						'class' => 'btn-primary'
					) );
				?></div>
			</div>
		</footer><!-- .entry-footer -->
	</div><!-- .posts-list__item-content -->
</article><!-- #post-<?php the_ID(); ?> -->
