<?php
/**
 * Theme hooks.
 *
 * @package Fashion_daily
 */

// Adds the meta viewport to the header.
add_action( 'wp_head', 'fashion_daily_meta_viewport', 0 );

// Additional body classes.
add_filter( 'body_class', 'fashion_daily_extra_body_classes' );

// Enqueue sticky menu if required.
add_filter( 'fashion_daily-theme/assets-depends/script', 'fashion_daily_enqueue_misc' );

// Additional image sizes for media gallery.
add_filter( 'image_size_names_choose', 'fashion_daily_image_size_names_choose' );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'fashion_daily_modify_comment_form' );


// Modify background-image dynamic css variables.
add_filter( 'cherry_css_variables', 'fashion_daily_modify_bg_img_variables', 10, 2 );


// Add invert classes if breadcrumbs sections is darken.
add_filter( 'cx_breadcrumbs/wrapper_classes', 'fashion_daily_breadcrumbs_wrapper_classes' );

// Add dynamic css function.
add_filter( 'cx_dynamic_css/func_list', 'fashion_daily_add_dynamic_css_function' );

// Add has/no thumbnail classes for posts.
add_filter( 'post_class', 'fashion_daily_post_thumb_classes' );

//	Callback function for additional fonts in Elementor.
// add_filter( 'elementor/fonts/additional_fonts', 'fashion_daily_add_additional_fonts' );

//	Remove the parentheses from the category/archive/tag widget.
add_filter( 'wp_tag_cloud', 'fashion_daily_tagcloud_postcount_filter');

/**
 * Add has/no thumbnail classes for posts
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function fashion_daily_post_thumb_classes( $classes ) {
	$thumb = 'no-thumb';

	if ( has_post_thumbnail() ) {
		$thumb = 'has-thumb';
	}

	$classes[] = $thumb;

	return $classes;
}

/**
 *  Add invert classes if breadcrumbs sections is darken.
 *
 * @param array $wrapper_classes Classes array.
 *
 * @return array
 */
function fashion_daily_breadcrumbs_wrapper_classes( $wrapper_classes = array() ) {
	$breadcrumbs_color = get_theme_mod( 'breadcrumbs_text_color', fashion_daily_theme()->customizer->get_default( 'breadcrumbs_text_color' ) );

	if ( 'light' === $breadcrumbs_color ) {
		$wrapper_classes[] = 'invert';
	}

	return $wrapper_classes;
}

/**
 * Modify background-image dynamic css variables.
 *
 * @param array $variables CSS variables.
 * @param array $args      Module arguments.
 *
 * @return array
 */
function fashion_daily_modify_bg_img_variables( $variables = array(), $args = array() ) {

	$bg_img_variables = array(
		'header_bg_image',
		'page_404_bg_image',
	);

	foreach ( $bg_img_variables as $var ) {
		$variables[ $var ] = esc_url( fashion_daily_render_theme_url( $variables[ $var ] ) );
	}

	return $variables;
}


/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.0
 * @return string `<meta>` tag for viewport.
 */
function fashion_daily_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function fashion_daily_extra_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a options-based classes.
	$options_based_classes = array();

	$layout      = fashion_daily_theme()->customizer->get_value( 'container_type' );
	$blog_layout = fashion_daily_theme()->customizer->get_value( 'blog_layout_type' );
	$sb_position = fashion_daily_theme()->sidebar_position;
	$sidebar     = fashion_daily_theme()->customizer->get_value( 'sidebar_width' );

	array_push( $options_based_classes, 'layout-' . $layout, 'blog-' . $blog_layout );
	if( 'none' !== $sb_position ) {
		array_push( $options_based_classes, 'sidebar_enabled', 'position-' . $sb_position, 'sidebar-' . str_replace( '/', '-', $sidebar ) );
	}

	// Single Post Layout 9
	if ( is_singular( 'post' ) ) {
		$post_author_visible 	= fashion_daily_theme()->customizer->get_value( 'single_post_author' );
		if( $post_author_visible ) {
			array_push( $options_based_classes, 'post_author_visible' );
		}
	}

	return array_merge( $classes, $options_based_classes );
}

/**
 * Add misc to theme script dependencies if required.
 *
 * @param  array $depends Default dependencies.
 * @return array
 */
function fashion_daily_enqueue_misc( $depends ) {
	$totop_visibility = fashion_daily_theme()->customizer->get_value( 'totop_visibility' );

	if ( $totop_visibility ) {
		$depends[] = 'jquery-totop';
	}

	return $depends;
}

/**
 * Add image sizes for media gallery
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function fashion_daily_image_size_names_choose( $image_sizes ) {
	$image_sizes['post-thumbnail'] = __( 'Post Thumbnail', 'fashion_daily' );

	return $image_sizes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Argumnts for comment form.
 * @return array
 */
function fashion_daily_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Send', 'fashion_daily' );

	$args['fields']['author'] = '<div class="row"><div class="col-xs-12 col-md-6"><p class="comment-form-author"><label class="control-label">' . esc_html__( 'Name', 'fashion_daily' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="author" class="comment-form__field" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p></div>';

	$args['fields']['email'] = '<div class="col-xs-12 col-md-6"><p class="comment-form-email"><label class="control-label">' . esc_html__( 'E-mail', 'fashion_daily' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p></div></div>';

	$args['fields']['url'] = '<p class="comment-form-url"><label class="control-label">' . esc_html__( 'Website', 'fashion_daily' ) . '</label><input id="url" class="comment-form__field" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p><div class="clear"></div>';

	$args['comment_field'] = '<p class="comment-form-comment"><label class="control-label">' . esc_html__( 'Comment', 'fashion_daily' ) . '</label><textarea id="comment" class="comment-form__field" name="comment" cols="45" rows="8" ></textarea></p>';

	return $args;
}


/**
 * Add dynamic css function.
 *
 * @param array $func_list Function list.
 *
 * @return array
 */
function fashion_daily_add_dynamic_css_function( $func_list = array() ) {

	$func_list['background_position'] = 'fashion_daily_dynamic_css_background_position';

	return $func_list;
}

/**
 * Callback function for dynamic css function `background_position`.
 *
 * @param string $position Background position.
 *
 * @return bool|string
 */
function fashion_daily_dynamic_css_background_position( $position = '' ) {

	if ( empty( $position ) ) {
		return;
	}

	$result = 'background-position: ' . str_replace( '-', ' ', $position );

	return $result;
}

/**
 * Callback function for additional fonts in Elementor.
 */
function fashion_daily_add_additional_fonts( $additional_fonts ) {
	
	$additional_fonts[ 'DM Sans' ] = 'googlefonts';

	return $additional_fonts;
}

/**
 * Remove parentheses from tag cloud count
 */
function fashion_daily_tagcloud_postcount_filter ($variable) {
	$variable = str_replace('(', '', $variable);
	$variable = str_replace(')', '', $variable);
	
	return $variable;
}