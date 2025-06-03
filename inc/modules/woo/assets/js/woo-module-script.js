;var Fashion_daily_Woo_Module;


(function ($) {
	"use strict";


	Fashion_daily_Woo_Module = {

		init: function () {
			this.wooHeaderCart();
			this.wooCategoriesLast();
			this.wooCartPageEmpty();
			this.wooProductsCart();
			this.wooProductElementsPos();
		},

		wooHeaderCart: function () {
			var headerCartButton = $('.header-cart__link-wrap'),

			toggleButton = function (e){
				e.preventDefault();
				$('.header-cart__content').toggleClass('show');

				jQuery(window).on('scroll', function(e) {
					$('.header-cart__content').removeClass('show');
				});
			};

			headerCartButton.on('click', toggleButton );

		},

		wooCategoriesLast: function () {
			$('.woocommerce #main .products .product-category').last().after('<li class="product-category product category-last"></li>');
		},

		wooCartPageEmpty: function () {
			if ( $('body.woocommerce-cart .woocommerce-info').hasClass( 'cart-empty' ) ) {
				$('body').addClass('body-cart-empty');
			}
		},

		wooProductsCart: function () {
			$( '<div class="empty"></div>' ).insertAfter( '.woocommerce-cart td.product-name dd' );
		},

		wooProductElementsPos: function () {
			if (jQuery('.single-product .product.sale').size() > 0) {
				$('.single-product .product > .row').each(function() {
					var onsale = $(this).find('.onsale'),
						summary = $(this).find('.summary');

					onsale.prependTo(summary);
				});
			}
		},
		
	};

	Fashion_daily_Woo_Module.init();

}(jQuery));