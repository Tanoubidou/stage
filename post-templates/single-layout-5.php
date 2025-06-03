<?php
/**
 * Template Name: Post Layout 05
 * Template Post Type: post
 *
 * The template for displaying layout 5 single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fashion_daily
 */

$pf = get_post_format();

get_header(); ?>

<div <?php echo fashion_daily_get_container_classes( 'breadcrumbs__container' ); ?>>
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
</div>

<?php get_template_part( 'template-parts/single-post/layout-5/single-feature-header', $pf ) ?>

<div id="content" <?php echo fashion_daily_get_container_classes( 'site-content' ); ?>>

	<?php do_action( 'fashion_daily-theme/site/site-content-before', 'single' ); ?>

	<div <?php fashion_daily_content_class() ?>>
		
		<div class="row">

			<?php do_action( 'fashion_daily-theme/site/primary-before', 'single' ); ?>

			<div id="primary" <?php fashion_daily_primary_content_class(); ?>>

				<?php do_action( 'fashion_daily-theme/site/main-before', 'single' ); ?>

				<main id="main" class="site-main"><?php
					while ( have_posts() ) : the_post();
							
						get_template_part( 'template-parts/single-post/layout-5/content', 'post' );

					endwhile; // End of the loop.
				?></main><!-- #main -->

				<?php do_action( 'fashion_daily-theme/site/main-after', 'single' ); ?>

			</div><!-- #primary -->

			<?php do_action( 'fashion_daily-theme/site/primary-after', 'single' ); ?>

			<?php get_sidebar(); // Loads the sidebar.php template.  ?>

		</div><!-- .row -->

	</div><!-- .site-content__wrap -->

	<?php do_action( 'fashion_daily-theme/site/site-content-after', 'single' ); ?>

</div><!-- #content -->

<?php get_footer();