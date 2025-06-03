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

		<div class="single-featured-overlay"></div>

		<div <?php echo fashion_daily_get_container_classes( 'site-content' ); ?>>
			<div class="row">
				<div class="col-xs-12 col-xl-10 col-xl-push-1">
					<header class="entry-header single-featured-header invert textaligncenter">
						<div class="posted-by vcard posted-by--avatar"><?php
							fashion_daily_get_post_author_avatar( array(
								'size' => 140,
							) );

							fashion_daily_posted_by( array(
								'prefix' 	=> esc_html__( 'By', 'fashion_daily' )
							) );
						?></div>

						<div class="entry-meta entry-meta-top"><?php
							fashion_daily_posted_in( array(
								'visible' 	=> $categories_visible
							) );

							fashion_daily_get_post_reading_time( array(
								'visible' => $reading_time_visible,
								'echo'    => true,
							) );
						?></div><!-- .entry-meta -->

						<h1 class="entry-title h2-style single-entry-title"><?php 
							fashion_daily_sticky_label();
							the_title();
						?></h1>

						<div class="entry-meta entry-meta-footer"><?php
							fashion_daily_posted_on( array(
								'prefix' 	=> '',
								'format' 	=> 'F j, Y \A\T g:i a'
							) );

							fashion_daily_post_comments( array(
								'prefix' 	=> ''
							) );
						?></div><!-- .entry-meta -->
					</header>
				</div>
			</div>
		</div>

	</div><!-- .single-featured-header -->

<?php endwhile;
