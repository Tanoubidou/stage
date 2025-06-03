<?php
/**
 * Template part for displaying featured-header the single posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fashion_daily
 */
$categories_visible 	= fashion_daily_theme()->customizer->get_value( 'single_post_categories' );
$reading_time_visible 	= fashion_daily_theme()->customizer->get_value( 'single_post_reading_time' );

while ( have_posts() ) : the_post(); ?>

	<div class="single-featured-header__container">

		<div <?php echo fashion_daily_get_container_classes( 'site-content' ); ?>>
			<header class="entry-header single-featured-header textaligncenter">
				<h1 class="entry-title h2-style single-entry-title"><?php 
					fashion_daily_sticky_label();
					the_title();
				?></h1>

				<div class="entry-meta entry-meta-top"><?php
					fashion_daily_posted_in( array(
						'visible' 	=> $categories_visible
					) );

					fashion_daily_get_post_reading_time( array(
						'visible' => $reading_time_visible,
						'echo'    => true,
					) );
				?></div><!-- .entry-meta -->
			</header>
		</div>

		<?php fashion_daily_post_thumbnail( 'fashion_daily-thumb-xxl', array( 'link' => false ) ); ?>

	</div><!-- .single-featured-header -->

<?php endwhile;
