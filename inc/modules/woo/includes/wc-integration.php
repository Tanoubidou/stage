<?php
/**
 * Extends basic functionality for better WooCommerce compatibility
 *
 * @package Fashion_daily
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function fashion_daily_wc_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'fashion_daily_wc_setup' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 *
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function fashion_daily_wc_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}

add_filter( 'body_class', 'fashion_daily_wc_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 *
 * @return array $args related products args.
 */
function fashion_daily_wc_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'fashion_daily_wc_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'fashion_daily_wc_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function fashion_daily_wc_wrapper_before() {
		?>
		<div id="content" <?php echo fashion_daily_get_container_classes( 'site-content' ); ?>>

			<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
			
			<div <?php fashion_daily_get_single_product_container_classes() ?>>
				<div class="row">
					<div id="primary" <?php fashion_daily_primary_content_class(); ?>>
						<main id="main" class="site-main">
							<div class="woocommerce-products__panel_wrapper">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'fashion_daily_wc_wrapper_before' );

/**
 * Single product layout classes.
 */
if ( ! function_exists( 'fashion_daily_get_single_product_container_classes' ) ) {
	function fashion_daily_get_single_product_container_classes( $classes = null, $fullwidth = false ) {
		
		if ( $classes ) {
			$classes .= ' ';
		}
		
		$classes .= 'site-content__wrap ';
			
		echo 'class="' . apply_filters( 'fashion_daily-theme/site-content/content-classes', $classes ) . '"';
	}
}

if ( ! function_exists( 'fashion_daily_wc_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
function fashion_daily_wc_wrapper_after() {
	?>
	</main><!-- #main -->
	</div><!-- #primary -->
	<?php
}
}
add_action( 'woocommerce_after_main_content', 'fashion_daily_wc_wrapper_after' );


if ( ! function_exists( 'fashion_daily_wc_sidebar_after' ) ) {
	/**
	 * Close tags after sidebar
	 */
	function fashion_daily_wc_sidebar_after() {
		?>
			</div>
			</div>
			</div>
		<?php
	}
}
add_action( 'woocommerce_sidebar', 'fashion_daily_wc_sidebar_after', 99 );

if ( ! function_exists( 'fashion_daily_wc_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 *
	 * @return array Fragments to refresh via AJAX.
	 */
	function fashion_daily_wc_cart_link_fragment( $fragments ) {
		ob_start();
		fashion_daily_wc_cart_link();
		$fragments['a.header-cart__link'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'add_to_cart_fragments', 'fashion_daily_wc_cart_link_fragment' );

if ( ! function_exists( 'fashion_daily_wc_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function fashion_daily_wc_cart_link() {
		?>
			<a class="header-cart__link" href="#" title="<?php esc_attr_e( 'View your shopping cart', 'fashion_daily' ); ?>">
		  <?php
		  $item_count_text = sprintf(
		  /* translators: number of items in the mini cart. */
			  esc_html__( '%d', 'fashion_daily' ),
			  WC()->cart->get_cart_contents_count()
		  );

		  ?>
				<?php echo fashion_daily_get_icon_svg( 'cart' ); ?>
				<span class="header-cart__link-count"><?php echo esc_html( $item_count_text ); ?></span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'fashion_daily_wc_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function fashion_daily_wc_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
			<div class="header-cart">
				<div class="header-cart__link-wrap <?php echo esc_attr( $class ); ?>">
			<?php fashion_daily_wc_cart_link(); ?>
				</div>
				<div class="header-cart__content">
			<?php
			$instance = array( 'title' => esc_html__( 'My cart', 'fashion_daily' ) );
			the_widget( 'WC_Widget_Cart', $instance );
			?>
				</div>
			</div>
		<?php
	}
}

if ( ! function_exists( 'fashion_daily_wc_pagination' ) ) {

	/**
	 * WooCommerce pagination
	 *
	 * @param $args
	 *
	 * @return mixed
	 */
	function fashion_daily_wc_pagination( $args ) {
		$args['prev_text'] = sprintf( '
		<span class="nav-icon icon-prev"></span><span>%1$s</span>',
			esc_html__( 'Prev', 'fashion_daily' ) );

		$args['next_text'] = sprintf( '
		<span>%1$s</span><span class="nav-icon icon-next"></span>',
			esc_html__( 'Next', 'fashion_daily' ) );

		return $args;
	}

}
add_filter( 'woocommerce_pagination_args', 'fashion_daily_wc_pagination' );

if ( ! function_exists( 'fashion_daily_init_wc_properties' ) ) {

	/**
	 * Init shop properties
	 */
	function fashion_daily_init_wc_properties() {

		// Sidebar properties for archive product
		if ( ( is_shop() || is_product_taxonomy() ) && ! is_singular( 'product' ) ) {
			if ( is_active_sidebar( 'sidebar-shop' ) ) {
				fashion_daily_theme()->sidebar_position = 'one-left-sidebar';
			} else {
				fashion_daily_theme()->sidebar_position = 'none';
			}
		}

	}

}
add_action( 'wp_head', 'fashion_daily_init_wc_properties', 2 );

/*
 *
 * Removes products count after categories name
 * 
 */
add_filter( 'woocommerce_subcategory_count_html', 'fashion_daily_woo_remove_category_products_count' );

function fashion_daily_woo_remove_category_products_count() {
	return;
}

if ( ! function_exists( 'fashion_daily_woo_add_category_description' ) ) {

	/**
	 * WooCommerce Description for Categories List Page
	 */
	function fashion_daily_woo_add_category_description ($category) {
		
		$cat_id 		= $category->term_id;
		$prod_term 		= get_term( $cat_id,'product_cat' );
		$description 	= $prod_term->description;

		if ( $category->count > 0 ) {
			$category_count = sprintf(
				'%1$s %2$s',
				esc_html( $category->count ),
				esc_html__( 'Products', 'fashion_daily' )
			);

		}


		$output = sprintf(
			'<div class="woocommerce-loop-category__description">%1$s</div><div class="entry-meta">%2$s</div>',
				esc_html( $description ),
				esc_html( $category_count )
		);

		echo wp_kses_post( $output );

	}

}
add_action( 'woocommerce_after_subcategory_title', 'fashion_daily_woo_add_category_description', 12);
