<?php
/**
 * Template part for breadcrumbs.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fashion_daily
 */

$breadcrumbs_visibillity = fashion_daily_theme()->customizer->get_value( 'breadcrumbs_visibillity' );

/**
 * [$breadcrumbs_visibillity description]
 * @var [type]
 */
$breadcrumbs_visibillity = apply_filters( 'fashion_daily-theme/breadcrumbs/breadcrumbs-visibillity', $breadcrumbs_visibillity );

if ( ! $breadcrumbs_visibillity ) {
	return;
}

$breadcrumbs_front_visibillity = fashion_daily_theme()->customizer->get_value( 'breadcrumbs_front_visibillity' );

if ( !$breadcrumbs_front_visibillity && is_front_page() ) {
	return;
}

do_action( 'fashion_daily-theme/breadcrumbs/breadcrumbs-before-render' );

?>
	<?php do_action( 'fashion_daily-theme/breadcrumbs/before' ); ?>
	<?php do_action( 'cx_breadcrumbs/render' ); ?>
	<?php do_action( 'fashion_daily-theme/breadcrumbs/after' ); ?>
<?php

do_action( 'fashion_daily-theme/breadcrumbs/breadcrumbs-after-render' );