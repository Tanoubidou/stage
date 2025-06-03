<?php
/**
 * Theme Breadcrumbs.
 *
 * @package Fashion_daily
 */

/**
 * Retrieve a holder for breadcrumbs options.
 *
 * @since  1.0.0
 * @return array
 */

function fashion_daily_get_breadcrumbs_options() {
	/**
	 * Filter a holder for breadcrumbs options.
	 *
	 * @since 1.0.0
	 */

	return apply_filters( 'fashion_daily-theme/breadcrumbs/options' , array(
		'wrapper_format'    => '<div class="breadcrumbs_items">%1$s%2$s</div>',
		'separator'         => fashion_daily_get_icon_svg( 'breadcrumbs_sep' ),
		'show_browse'       => false,
		'show_on_front'     => fashion_daily_theme()->customizer->get_value( 'breadcrumbs_front_visibillity' ),
		'show_title'        => false,
		'page_title_format' => '<h4 class="breadcrumbs__title">%s</h4>',
		'path_type'         => fashion_daily_theme()->customizer->get_value( 'breadcrumbs_path_type' ),
		'css_namespace'     => array(
			'module'    => 'breadcrumbs',
			'content'   => 'breadcrumbs_content',
			'wrap'      => 'breadcrumbs_wrap',
			'browse'    => 'breadcrumbs_browse',
			'item'      => 'breadcrumbs_item',
			'separator' => 'breadcrumbs_item_sep',
			'link'      => 'breadcrumbs_item_link',
			'target'    => 'breadcrumbs_item_target',
		),
	) );
}

