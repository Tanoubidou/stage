<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fashion_daily
 */

if ( ! has_tag() ) {
	return;
}

?>

<footer class="entry-footer">
	<div class="entry-footer-container">
		<div class="entry-meta">
			<?php
				fashion_daily_post_tags ( array(
					'prefix' 	=> '<b>' . esc_html__( 'Tags', 'fashion_daily' ) . '</b>',
					'delimiter' => '',
				) );
			?>
		</div>
	</div>
</footer><!-- .entry-footer -->
