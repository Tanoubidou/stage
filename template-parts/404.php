<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Fashion_daily
 */
?>

<section class="error-404 not-found">
	<div class="error-numbers"><?php echo esc_html__( '404', 'fashion_daily' ); ?></div>
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'The page you’re looking for doesn’t exist', 'fashion_daily' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'fashion_daily' ); ?></p>

		<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Back to Home', 'fashion_daily' ); ?></a>
	</div><!-- .page-content -->
</section><!-- .error-404 -->