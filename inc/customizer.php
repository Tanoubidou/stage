<?php
/**
 * Theme Customizer.
 *
 * @package Fashion_daily
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */

function fashion_daily_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'fashion_daily-theme/customizer/options' , array(
		'prefix'        => 'fashion_daily',
		'path'          => get_theme_file_path( 'framework/modules/customizer/' ),
		'capability'    => 'edit_theme_options',
		'type'          => 'theme_mod',
		'fonts_manager' => new CX_Fonts_Manager(),
		'options'       => array(
			
			/** `Site Identity` section */
			'logo_retina' => array(
				'title' 			=> esc_html__( 'Retina Logo', 'fashion_daily' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 8,
				'field' 			=> 'image',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'logo_retina_height' => array(
				'title' 			=> esc_html__( 'Logo Height, px', 'fashion_daily' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 9,
				'default' 			=> 40,
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 20,
					'max'  => 100,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'site_tagline' => array(
				'title' 			=> esc_html__( 'Show Site Tagline', 'fashion_daily' ),
				'section' 			=> 'title_tagline',
				'priority' 			=> 10,
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			/** `General` panel */
			'general_settings' => array(
				'title'       => esc_html__( 'General Site settings', 'fashion_daily' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Favicon` section */
			'favicon' => array(
				'title'       => esc_html__( 'Favicon', 'fashion_daily' ),
				'priority'    => 25,
				'panel'       => 'general_settings',
				'type'        => 'section',
			),

			/** `Preloader` section */
			'preloader_section' => array(
				'title'    => esc_html__( 'Page Preloader', 'fashion_daily' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'fashion_daily' ),
				'section'  => 'preloader_section',
				'priority' => 30,
				'default'  => false,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			
			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'fashion_daily' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'fashion_daily' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'fashion_daily' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'fashion_daily' ),
				'section' => 'breadcrumbs',
				'default' => 'minified',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'fashion_daily' ),
					'minified' => esc_html__( 'Minified', 'fashion_daily' ),
				),
				'type'    => 'control',
			),
			'breadcrumbs_text_color' => array(
				'title'       => esc_html__( 'Text Color', 'fashion_daily' ),
				'description' => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'fashion_daily' ),
				'section'     => 'breadcrumbs',
				'default'     => 'dark',
				'field'       => 'select',
				'choices'     => fashion_daily_get_text_color(),
				'type'        => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title' 			=> esc_html__( 'Page Layout', 'fashion_daily' ),
				'priority' 			=> 55,
				'type' 				=> 'section',
				'panel' 			=> 'general_settings',
			),
			'container_type' => array(
				'title' 			=> esc_html__( 'Container Type', 'fashion_daily' ),
				'section' 			=> 'page_layout',
				'default' 			=> 'boxed',
				'field' 			=> 'select',
				'choices' 			=> array(
					'boxed'     => esc_html__( 'Boxed', 'fashion_daily' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'fashion_daily' ),
				),
				'type' 				=> 'control',
			),
			'container_width' => array(
				'title' 			=> esc_html__( 'Container Width, px', 'fashion_daily' ),
				'section' 			=> 'page_layout',
				'default' 			=> 1170,
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 700,
					'max'  => 2000,
					'step' => 1,
				),
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'sidebar_width' => array(
				'title' 			=> esc_html__( 'Sidebar width', 'fashion_daily' ),
				'section' 			=> 'page_layout',
				'default' 			=> '1/3',
				'field' 			=> 'select',
				'choices' 			=> array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type' 				=> 'control',
			),

			/* Sticky Sidebar */
			'sticky_sidebar' => array(
				'title' 			=> esc_html__( 'Sticky Sidebar', 'fashion_daily' ),
				'section' 			=> 'page_layout',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			/** `Preloader` section */
			'totop_section' => array(
				'title'    => esc_html__( 'ToTop Button', 'fashion_daily' ),
				'priority' => 60,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'totop_visibility' => array(
				'title'   => esc_html__( 'Show ToTop Button', 'fashion_daily' ),
				'section' => 'totop_section',
				'priority' => 60,
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'fashion_daily' ),
				'description' => esc_html__( 'Configure Color Scheme', 'fashion_daily' ),
				'priority'    => 40,
				'type'        => 'section',
			),

			'accent_color' => array(
				'title' 			=> esc_html__( 'Accent color', 'fashion_daily' ),
				'section' 			=> 'color_scheme',
				'default' 			=> '#de0000',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
			),
			'accent_color2' => array(
				'title' 			=> esc_html__( 'Accent color 2', 'fashion_daily' ),
				'section' 			=> 'color_scheme',
				'default' 			=> '#29293a',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
			),
			'primary_text_color' => array(
				'title' 			=> esc_html__( 'Primary Text color', 'fashion_daily' ),
				'section' 			=> 'color_scheme',
				'default' 			=> '#29293a',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
			),
			'secondary_text_color' => array(
				'title' 			=> esc_html__( 'Secondary Text color', 'fashion_daily' ),
				'section' 			=> 'color_scheme',
				'default' 			=> '#6b93a7',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
			),
			'link_color' => array(
				'title' 			=> esc_html__( 'Link color', 'fashion_daily' ),
				'section' 			=> 'color_scheme',
				'default' 			=> '#29293a',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
			),
			'link_hover_color' => array(
				'title' 			=> esc_html__( 'Link hover color', 'fashion_daily' ),
				'section' 			=> 'color_scheme',
				'default' 			=> '#de0000',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
			),
			'h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'fashion_daily' ),
				'section' => 'color_scheme',
				'default' => '#29293a',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'fashion_daily' ),
				'section' => 'color_scheme',
				'default' => '#29293a',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'fashion_daily' ),
				'section' => 'color_scheme',
				'default' => '#29293a',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'fashion_daily' ),
				'section' => 'color_scheme',
				'default' => '#29293a',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'fashion_daily' ),
				'section' => 'color_scheme',
				'default' => '#29293a',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'fashion_daily' ),
				'section' => 'color_scheme',
				'default' => '#de0000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'grey_color_1' => array(
				'title'   => esc_html__( 'Grey color (1)', 'fashion_daily' ),
				'section' => 'color_scheme',
				'default' => '#c3c3c9',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Invert Text color', 'fashion_daily' ),
				'section' => 'color_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'btn_text_color' => array(
				'title'   => esc_html__( 'Button Text Color', 'fashion_daily' ),
				'section' => 'color_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'btn_bg_color' => array(
				'title'   => esc_html__( 'Button Background Color', 'fashion_daily' ),
				'section' => 'color_scheme',
				'default' => '#de0000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'fashion_daily' ),
				'description' => esc_html__( 'Configure typography settings', 'fashion_daily' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body Text', 'fashion_daily' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'fashion_daily' ),
				'section' => 'body_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'fashion_daily' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section' => 'body_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section'     => 'body_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'fashion_daily' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'fashion_daily' ),
				'section'     => 'body_typography',
				'default'     => '1.85',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'fashion_daily' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'fashion_daily' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => fashion_daily_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'fashion_daily' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_aligns(),
				'type'    => 'control',
			),			
			'body_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'fashion_daily' ),
				'section' => 'body_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_transform(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'fashion_daily' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'fashion_daily' ),
				'section' => 'h1_typography',
				'default' => 'Playfair Display, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'fashion_daily' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section' => 'h1_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section'     => 'h1_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'fashion_daily' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'fashion_daily' ),
				'section'     => 'h1_typography',
				'default'     => '1.27',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'fashion_daily' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'fashion_daily' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => fashion_daily_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'fashion_daily' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_aligns(),
				'type'    => 'control',
			),
			'h1_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'fashion_daily' ),
				'section' => 'h1_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_transform(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'fashion_daily' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'fashion_daily' ),
				'section' => 'h2_typography',
				'default' => 'Playfair Display, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'fashion_daily' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section' => 'h2_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section'     => 'h2_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title' 			=> esc_html__( 'Line Height', 'fashion_daily' ),
				'description' 		=> esc_html__( 'Relative to the font-size of the element', 'fashion_daily' ),
				'section' 			=> 'h2_typography',
				'default' 			=> '1.27',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.01,
				),
				'type' 				=> 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'fashion_daily' ),
				'section'     => 'h2_typography',
				'default'     => '0.03',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'fashion_daily' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => fashion_daily_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'fashion_daily' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_aligns(),
				'type'    => 'control',
			),
			'h2_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'fashion_daily' ),
				'section' => 'h2_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_transform(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'fashion_daily' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'fashion_daily' ),
				'section' 			=> 'h3_typography',
				'default' 			=> 'Playfair Display, sans-serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'fashion_daily' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section' => 'h3_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section'     => 'h3_typography',
				'default'     => '22',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'fashion_daily' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'fashion_daily' ),
				'section'     => 'h3_typography',
				'default'     => '1.36',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'fashion_daily' ),
				'section'     => 'h3_typography',
				'default'     => '0.02',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'fashion_daily' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => fashion_daily_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'fashion_daily' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_aligns(),
				'type'    => 'control',
			),
			'h3_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'fashion_daily' ),
				'section' => 'h3_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_transform(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'fashion_daily' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'fashion_daily' ),
				'section' => 'h4_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'fashion_daily' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section' => 'h4_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section'     => 'h4_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'fashion_daily' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'fashion_daily' ),
				'section'     => 'h4_typography',
				'default'     => '1.86',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'fashion_daily' ),
				'section'     => 'h4_typography',
				'default'     => '0.05',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'fashion_daily' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => fashion_daily_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'fashion_daily' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_aligns(),
				'type'    => 'control',
			),
			'h4_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'fashion_daily' ),
				'section' => 'h4_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_transform(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'fashion_daily' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'fashion_daily' ),
				'section' => 'h5_typography',
				'default' => 'Playfair Display, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'fashion_daily' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section' => 'h5_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section'     => 'h5_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'fashion_daily' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'fashion_daily' ),
				'section'     => 'h5_typography',
				'default'     => '1.57',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'fashion_daily' ),
				'section'     => 'h5_typography',
				'default'     => '0.02',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'fashion_daily' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => fashion_daily_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'fashion_daily' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_aligns(),
				'type'    => 'control',
			),
			'h5_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'fashion_daily' ),
				'section' => 'h5_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_transform(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'fashion_daily' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'fashion_daily' ),
				'section' => 'h6_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'fashion_daily' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section' => 'h6_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => fashion_daily_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section'     => 'h6_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'fashion_daily' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'fashion_daily' ),
				'section'     => 'h6_typography',
				'default'     => '2.17',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'fashion_daily' ),
				'section'     => 'h6_typography',
				'default'     => '0.06',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'fashion_daily' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => fashion_daily_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'fashion_daily' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_aligns(),
				'type'    => 'control',
			),
			'h6_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'fashion_daily' ),
				'section' => 'h6_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_transform(),
				'type'    => 'control',
			),

			/** `Logo text` section */
			'logo_typography' => array(
				'title' 			=> esc_html__( 'Logo Text', 'fashion_daily' ),
				'priority' 			=> 40,
				'panel' 			=> 'typography',
				'type' 				=> 'section',
			),
			'header_logo_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'fashion_daily' ),
				'section' 			=> 'logo_typography',
				'default' 			=> 'Playfair Display, sans-serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
			),
			'header_logo_font_style' => array(
				'title' 			=> esc_html__( 'Font Style', 'fashion_daily' ),
				'section' 			=> 'logo_typography',
				'default' 			=> 'normal',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_font_styles(),
				'type' 				=> 'control',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'fashion_daily' ),
				'description'     => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section'         => 'logo_typography',
				'default'         => '700',
				'field'           => 'select',
				'choices'         => fashion_daily_get_font_weight(),
				'type'            => 'control',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section'         => 'logo_typography',
				'default'         => '30',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'fashion_daily' ),
				'section'         => 'logo_typography',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => fashion_daily_get_character_sets(),
				'type'            => 'control',
			),

			/** `Menu` section */
			'menu_typography' => array(
				'title'       => esc_html__( 'Menu', 'fashion_daily' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'menu_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'fashion_daily' ),
				'section'         => 'menu_typography',
				'default'         => 'Raleway, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'menu_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'fashion_daily' ),
				'section'         => 'menu_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => fashion_daily_get_font_styles(),
				'type'            => 'control',
			),
			'menu_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section'         => 'menu_typography',
				'default'         => '400',
				'field'           => 'select',
				'choices'         => fashion_daily_get_font_weight(),
				'type'            => 'control',
			),
			'menu_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section'         => 'menu_typography',
				'default'         => '14',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'fashion_daily' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'fashion_daily' ),
				'section'     => 'menu_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'fashion_daily' ),
				'section'     => 'menu_typography',
				'default'     => '0.03',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'menu_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'fashion_daily' ),
				'section' 			=> 'menu_typography',
				'default' 			=> 'latin',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_character_sets(),
				'type' 				=> 'control',
			),
			'menu_text_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'fashion_daily' ),
				'section' 			=> 'menu_typography',
				'default' 			=> 'uppercase',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_text_transform(),
				'type' 				=> 'control',
			),

			/** `Meta` section */
			'meta_typography' => array(
				'title'       => esc_html__( 'Meta', 'fashion_daily' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'meta_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'fashion_daily' ),
				'section' 			=> 'meta_typography',
				'default' 			=> 'Raleway, sans-serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
			),
			'meta_font_style' => array(
				'title' 			=> esc_html__( 'Font Style', 'fashion_daily' ),
				'section' 			=> 'meta_typography',
				'default' 			=> 'normal',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_font_styles(),
				'type' 				=> 'control',
			),
			'meta_font_weight' => array(
				'title' 			=> esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section' 			=> 'meta_typography',
				'default' 			=> '400',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_font_weight(),
				'type' 				=> 'control',
			),
			'meta_font_size' => array(
				'title' 			=> esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section' 			=> 'meta_typography',
				'default' 			=> '12',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' 				=> 'control',
			),
			'meta_line_height' => array(
				'title' 			=> esc_html__( 'Line Height', 'fashion_daily' ),
				'description' 		=> esc_html__( 'Relative to the font-size of the element', 'fashion_daily' ),
				'section' 			=> 'meta_typography',
				'default'     => '2.17',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'meta_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'fashion_daily' ),
				'section'     => 'meta_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'meta_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'fashion_daily' ),
				'section' => 'meta_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => fashion_daily_get_character_sets(),
				'type'    => 'control',
			),
			'meta_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'fashion_daily' ),
				'section' => 'meta_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => fashion_daily_get_text_transform(),
				'type'    => 'control',
			),
			'meta_text_color' => array(
				'title' 			=> esc_html__( 'Color', 'fashion_daily' ),
				'section' 			=> 'meta_typography',
				'default' 			=> '#939399',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			
			/** `Button` section */
			'button_typography' => array(
				'title' 			=> esc_html__( 'Button', 'fashion_daily' ),
				'priority' 			=> 55,
				'panel' 			=> 'typography',
				'type' 				=> 'section',
			),
			'button_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'fashion_daily' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'Raleway, sans-serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
			),
			'button_font_style' => array(
				'title' 			=> esc_html__( 'Font Style', 'fashion_daily' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'normal',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_font_styles(),
				'type' 				=> 'control',
			),
			'button_font_weight' => array(
				'title' 			=> esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' => esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section' 			=> 'button_typography',
				'default' 			=> '700',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_font_weight(),
				'type' 				=> 'control',
			),
			'button_text_transform' => array(
				'title' 			=> esc_html__( 'Text Transform', 'fashion_daily' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'uppercase',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_text_transform(),
				'type' 				=> 'control',
			),
			'button_font_size' => array(
				'title' 			=> esc_html__( 'Font Size, px', 'fashion_daily' ),
				'section' 			=> 'button_typography',
				'default' 			=> '14',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' 				=> 'control',
			),
			'button_line_height' => array(
				'title' 			=> esc_html__( 'Line Height', 'fashion_daily' ),
				'description' 		=> esc_html__( 'Relative to the font-size of the element', 'fashion_daily' ),
				'section' 			=> 'button_typography',
				'default' 			=> '1.85',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.01,
				),
				'type' 				=> 'control',
			),
			'button_letter_spacing' => array(
				'title' 			=> esc_html__( 'Letter Spacing, em', 'fashion_daily' ),
				'section' 			=> 'button_typography',
				'default' 			=> '0.03',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.01,
				),
				'type' 				=> 'control',
			),
			'button_character_set' => array(
				'title' 			=> esc_html__( 'Character Set', 'fashion_daily' ),
				'section' 			=> 'button_typography',
				'default' 			=> 'latin',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_character_sets(),
				'type' 				=> 'control',
			),

			/** `additional typography` section */
			'additional_typography' => array(
				'title' 			=> esc_html__( 'Additional', 'fashion_daily' ),
				'priority' 			=> 60,
				'panel' 			=> 'typography',
				'type' 				=> 'section',
			),
			'additional_font_family' => array(
				'title' 			=> esc_html__( 'Font Family', 'fashion_daily' ),
				'section' 			=> 'additional_typography',
				'default' 			=> 'Raleway, sans-serif',
				'field' 			=> 'fonts',
				'type' 				=> 'control',
			),
			'additional_font_weight' => array(
				'title' 			=> esc_html__( 'Font Weight', 'fashion_daily' ),
				'description' 		=> esc_html__( 'Important: Not all fonts support every font-weight.', 'fashion_daily' ),
				'section' 			=> 'additional_typography',
				'default' 			=> '400',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_font_weight(),
				'type' 				=> 'control',
			),

			/** `Header` panel */
			'header_panel' => array(
				'title' 			=> esc_html__( 'Header', 'fashion_daily' ),
				'priority' 			=> 105,
				'type' 				=> 'panel',
			),

			'header_styles' => array(
				'title' 			=> esc_html__( 'Style', 'fashion_daily' ),
				'panel' 			=> 'header_panel',
				'type' 				=> 'section',
			),
			'header_layout_type' => array(
				'title' 			=> esc_html__( 'Layout', 'fashion_daily' ),
				'section' 			=> 'header_styles',
				'default' 			=> 'style-3',
				'choices' 			=> array(
					'style-3' => esc_html__( 'Style 3 (Logo by Left)', 'fashion_daily' ),
				),
				'field' 			=> 'select',
				'type' 				=> 'control',
			),
			'header_container_type' => array(
				'title' 			=> esc_html__( 'Container Type', 'fashion_daily' ),
				'section' 			=> 'header_styles',
				'default' 			=> 'boxed',
				'field' 			=> 'select',
				'choices' 			=> array(
					'boxed'     => esc_html__( 'Boxed', 'fashion_daily' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'fashion_daily' ),
				),
				'type' 				=> 'control',
			),
			'header_social_links' => array(
				'title' 			=> esc_html__( 'Show Social Links', 'fashion_daily' ),
				'section' 			=> 'header_styles',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			'header_search_section' => array(
				'title' 			=> esc_html__( 'Search Popup', 'fashion_daily' ),
				'panel' 			=> 'header_panel',
				'type' 				=> 'section',
			),
			'header_search_visible' => array(
				'title' 			=> esc_html__( 'Show Search', 'fashion_daily' ),
				'section' 			=> 'header_search_section',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'header_search_label' => array(
				'title' 			=> esc_html__( 'Label Text', 'fashion_daily' ),
				'section' 			=> 'header_search_section',
				'default' 			=> esc_html__( 'What are you looking for?', 'fashion_daily' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'header_search_visible' 	=> true,
				),
			),
			'header_search_placeholder' => array(
				'title' 			=> esc_html__( 'Placeholder Text', 'fashion_daily' ),
				'section' 			=> 'header_search_section',
				'default' 			=> esc_html__( 'Enter keyword...', 'fashion_daily' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'header_search_visible' 	=> true,
				),
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title' 			=> esc_html__( 'Footer', 'fashion_daily' ),
				'priority' 			=> 110,
				'type' 				=> 'section',
			),
			'footer_bg' => array(
				'title' 			=> esc_html__( 'Background Color', 'fashion_daily' ),
				'section' 			=> 'footer_options',
				'default' 			=> '#2c2c2c',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'footer_text_color' => array(
				'title' 			=> esc_html__( 'Text Color', 'fashion_daily' ),
				'section' 			=> 'footer_options',
				'default' 			=> '#b4c9d3',
				'field' 			=> 'hex_color',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
			),
			'footer_copyright' => array(
				'title' 			=> esc_html__( 'Copyright text', 'fashion_daily' ),
				'section' 			=> 'footer_options',
				'default' 			=> fashion_daily_get_default_footer_copyright(),
				'field' 			=> 'textarea',
				'type' 				=> 'control',
			),
			'footer_menu_visible' => array(
				'title'   => esc_html__( 'Show Footer Menu', 'fashion_daily' ),
				'section' => 'footer_bar',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_logo_visible' => array(
				'title' 			=> esc_html__( 'Show Footer Logo', 'fashion_daily' ),
				'section' 			=> 'footer_options',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'footer_logo' => array(
				'title' 			=> esc_html__( 'Footer Logo', 'fashion_daily' ),
				'section' 			=> 'footer_options',
				'field' 			=> 'image',
				'type' 				=> 'control',
				'dynamic_css' 		=> true,
				'conditions'   => array(
					'footer_logo_visible' => true,
				),
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title' 			=> esc_html__( 'Blog Settings', 'fashion_daily' ),
				'priority' 			=> 115,
				'type' 				=> 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title' 			=> esc_html__( 'Blog', 'fashion_daily' ),
				'panel' 			=> 'blog_settings',
				'priority' 			=> 10,
				'type' 				=> 'section',
			),

			/* Blog Page Title */
			'blog_page_title' => array(
				'title' 			=> esc_html__( 'Show Blog Page Title', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			'blog_layout_columns' => array(
				'title' 			=> esc_html__( 'Columns', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default'			=> '3-cols',
				'field' 			=> 'select',
				'choices' 			=> array(
					'2-cols' => esc_html__( '2 columns', 'fashion_daily' ),
					'3-cols' => esc_html__( '3 columns', 'fashion_daily' ),
				),
				'type' 				=> 'control',
				'active_callback' 	=> 'fashion_daily_is_blog_columns_enabled',
			),
			'blog_sidebar_position' => array(
				'title' 			=> esc_html__( 'Sidebar', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> 'one-right-sidebar',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_sidebar_position(),
				'type' 				=> 'control',
				'active_callback' 	=> 'fashion_daily_is_blog_sidebar_enabled',
			),
			'blog_sticky_type' => array(
				'title' 			=> esc_html__( 'Sticky label type', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> 'icon',
				'field' 			=> 'select',
				'choices' 			=> array(
					'label' => esc_html__( 'Text Label', 'fashion_daily' ),
					'icon'  => esc_html__( 'Font Icon', 'fashion_daily' ),
					'both'  => esc_html__( 'Text with Icon', 'fashion_daily' ),
				),
				'type' 				=> 'control',
			),
			'blog_sticky_label' => array(
				'description' 		=> esc_html__( 'Label for sticky post', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> esc_html__( 'Featured', 'fashion_daily' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'blog_sticky_type' => array( 'label', 'both' ),
				),
			),
			'blog_post_author' => array(
				'title' 			=> esc_html__( 'Show post author', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_post_publish_date' => array(
				'title' 			=> esc_html__( 'Show publish date', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_post_categories' => array(
				'title' 			=> esc_html__( 'Show categories', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_post_tags' => array(
				'title' 			=> esc_html__( 'Show tags', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_post_comments' => array(
				'title' 			=> esc_html__( 'Show comments', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_post_excerpt' => array(
				'title' 			=> esc_html__( 'Show Excerpt', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control'
			),
			'blog_post_excerpt_words_count' => array(
				'title' 			=> esc_html__( 'Excerpt Words Count', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> '26',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type' 				=> 'control',
			),
			'blog_read_more_type' => array(
				'title' 			=> esc_html__( 'Read more button type', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'blog_read_more_text' => array(
				'title' 			=> esc_html__( 'Read more button text', 'fashion_daily' ),
				'section' 			=> 'blog',
				'default' 			=> esc_html__( 'Read more', 'fashion_daily' ),
				'field' 			=> 'text',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'blog_read_more_type' => true,
				)
			),

			/** `Post` section */
			'blog_post' => array(
				'title' 			=> esc_html__( 'Post', 'fashion_daily' ),
				'panel' 			=> 'blog_settings',
				'priority' 			=> 20,
				'type' 				=> 'section',
				'active_callback' 	=> 'callback_single',
			),
			'single_sidebar_position' => array(
				'title' 			=> esc_html__( 'Sidebar', 'fashion_daily' ),
				'section' 			=> 'blog_post',
				'default' 			=> 'one-right-sidebar',
				'field' 			=> 'select',
				'choices' 			=> fashion_daily_get_sidebar_position(),
				'type' 				=> 'control',
			),
			'single_post_author' => array(
				'title' 			=> esc_html__( 'Show post author', 'fashion_daily' ),
				'section' 			=> 'blog_post',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'single_post_publish_date' => array(
				'title' 			=> esc_html__( 'Show publish date', 'fashion_daily' ),
				'section' 			=> 'blog_post',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'single_post_comments' => array(
				'title' 			=> esc_html__( 'Show comments', 'fashion_daily' ),
				'section' 			=> 'blog_post',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'single_post_categories' => array(
				'title' 			=> esc_html__( 'Show categories', 'fashion_daily' ),
				'section' 			=> 'blog_post',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'single_post_reading_time' => array(
				'title' 			=> esc_html__( 'Show reading time', 'fashion_daily' ),
				'section' 			=> 'blog_post',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'single_post_tags' => array(
				'title' 			=> esc_html__( 'Show tags', 'fashion_daily' ),
				'section' 			=> 'blog_post',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),
			'single_post_navigation' => array(
				'title' 			=> esc_html__( 'Enable post navigation', 'fashion_daily' ),
				'section' 			=> 'blog_post',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			/** `Author Bio` section */
			'post_authorbio' => array(
				'title' 			=> esc_html__( 'Author Bio Block', 'fashion_daily' ),
				'panel' 			=> 'blog_settings',
				'priority' 			=> 25,
				'type' 				=> 'section',
				'active_callback' 	=> 'callback_single',
			),
			'post_authorbio_block' => array(
				'title' 			=> esc_html__( 'Show Author Bio Block', 'fashion_daily' ),
				'section' 			=> 'post_authorbio',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title' 			=> esc_html__( 'Related Posts Block', 'fashion_daily' ),
				'panel' 			=> 'blog_settings',
				'priority' 			=> 30,
				'type' 				=> 'section',
				'active_callback' 	=> 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'fashion_daily' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'           => esc_html__( 'Related posts block title', 'fashion_daily' ),
				'section'         => 'related_posts',
				'default'         => esc_html__( 'Other Posts', 'fashion_daily' ),
				'field'           => 'text',
				'type'            => 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_query_type' => array(
				'title'           => esc_html__( 'Related posts query type', 'fashion_daily' ),
				'section'         => 'related_posts',
				'default'         => 'post_tag',
				'field'           => 'select',
				'choices'         => array(
					'category' => esc_html__( 'Categories', 'fashion_daily' ),
					'post_tag' => esc_html__( 'Tags', 'fashion_daily' ),
				),
				'type'            => 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_count' => array(
				'title'           => esc_html__( 'Number of post', 'fashion_daily' ),
				'section'         => 'related_posts',
				'default'         => '8',
				'field'           => 'text',
				'type'            => 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_grid' => array(
				'title'           => esc_html__( 'Layout', 'fashion_daily' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'select',
				'choices'         => array(
					'2' => esc_html__( '2 columns', 'fashion_daily' ),
					'3' => esc_html__( '3 columns', 'fashion_daily' ),
				),
				'type'            => 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_image' => array(
				'title' 			=> esc_html__( 'Show post image', 'fashion_daily' ),
				'section' 			=> 'related_posts',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_title' => array(
				'title' 			=> esc_html__( 'Show post title', 'fashion_daily' ),
				'section' 			=> 'related_posts',
				'default' 			=> true,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_excerpt' => array(
				'title' 			=> esc_html__( 'Display excerpt', 'fashion_daily' ),
				'section' 			=> 'related_posts',
				'default' 			=> false,
				'field' 			=> 'checkbox',
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_excerpt_words_count' => array(
				'title' 			=> esc_html__( 'Excerpt Words Count', 'fashion_daily' ),
				'section' 			=> 'related_posts',
				'default' 			=> '10',
				'field' 			=> 'number',
				'input_attrs' 		=> array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type' 				=> 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
					'related_posts_excerpt' => true,
				),
			),
			'related_posts_author' => array(
				'title'           => esc_html__( 'Show post author', 'fashion_daily' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_publish_date' => array(
				'title'           => esc_html__( 'Show post publish date', 'fashion_daily' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
			'related_posts_comment_count' => array(
				'title'           => esc_html__( 'Show post comment count', 'fashion_daily' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'conditions' 		=> array(
					'related_posts_visible' => true,
				),
			),
	) ) );
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function fashion_daily_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;

}

/**
 * Move native `site_icon` control (based on WordPress core) into custom section.
 *
 * @since 1.0.0
 * @param  object $wp_customize
 * @return void
 */
function fashion_daily_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'fashion_daily_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'fashion_daily' );
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'fashion_daily_customizer_change_core_controls', 20 );

/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function fashion_daily_get_font_styles() {
	return apply_filters( 'fashion_daily-theme/font/styles', array(
		'normal'  => esc_html__( 'Normal', 'fashion_daily' ),
		'italic'  => esc_html__( 'Italic', 'fashion_daily' ),
		'oblique' => esc_html__( 'Oblique', 'fashion_daily' ),
		'inherit' => esc_html__( 'Inherit', 'fashion_daily' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function fashion_daily_get_character_sets() {
	return apply_filters( 'fashion_daily-theme/font/character_sets', array(
		'latin'        => esc_html__( 'Latin', 'fashion_daily' ),
		'greek'        => esc_html__( 'Greek', 'fashion_daily' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'fashion_daily' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'fashion_daily' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'fashion_daily' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'fashion_daily' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'fashion_daily' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function fashion_daily_get_text_aligns() {
	return apply_filters( 'fashion_daily-theme/font/text-aligns', array(
		'inherit' => esc_html__( 'Inherit', 'fashion_daily' ),
		'center'  => esc_html__( 'Center', 'fashion_daily' ),
		'justify' => esc_html__( 'Justify', 'fashion_daily' ),
		'left'    => esc_html__( 'Left', 'fashion_daily' ),
		'right'   => esc_html__( 'Right', 'fashion_daily' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function fashion_daily_get_font_weight() {
	return apply_filters( 'fashion_daily-theme/font/weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Get text transform.
 *
 * @since 1.0.0
 * @return array
 */
function fashion_daily_get_text_transform() {
	return apply_filters( 'fashion_daily_get_text_transform', array(
		'none'       => esc_html__( 'None ', 'fashion_daily' ),
		'uppercase'  => esc_html__( 'Uppercase ', 'fashion_daily' ),
		'lowercase'  => esc_html__( 'Lowercase', 'fashion_daily' ),
		'capitalize' => esc_html__( 'Capitalize', 'fashion_daily' ),
	) );
}

// Background utility function
/**
 * Get background position
 *
 * @since 1.0.0
 * @return array
 */
function fashion_daily_get_bg_position() {
	return apply_filters( 'fashion_daily_get_bg_position', array(
		'top-left'      => esc_html__( 'Top Left', 'fashion_daily' ),
		'top-center'    => esc_html__( 'Top Center', 'fashion_daily' ),
		'top-right'     => esc_html__( 'Top Right', 'fashion_daily' ),
		'center-left'   => esc_html__( 'Middle Left', 'fashion_daily' ),
		'center'        => esc_html__( 'Middle Center', 'fashion_daily' ),
		'center-right'  => esc_html__( 'Middle Right', 'fashion_daily' ),
		'bottom-left'   => esc_html__( 'Bottom Left', 'fashion_daily' ),
		'bottom-center' => esc_html__( 'Bottom Center', 'fashion_daily' ),
		'bottom-right'  => esc_html__( 'Bottom Right', 'fashion_daily' ),
	) );
}

/**
 * Get background size
 *
 * @since 1.0.0
 * @return array
 */
function fashion_daily_get_bg_size() {
	return apply_filters( 'fashion_daily_get_bg_size', array(
		'auto'    => esc_html__( 'Auto', 'fashion_daily' ),
		'cover'   => esc_html__( 'Cover', 'fashion_daily' ),
		'contain' => esc_html__( 'Contain', 'fashion_daily' ),
	) );
}

/**
 * Get background repeat
 *
 * @since 1.0.0
 * @return array
 */
function fashion_daily_get_bg_repeat() {
	return apply_filters( 'fashion_daily_get_bg_repeat', array(
		'no-repeat' => esc_html__( 'No Repeat', 'fashion_daily' ),
		'repeat'    => esc_html__( 'Tile', 'fashion_daily' ),
		'repeat-x'  => esc_html__( 'Tile Horizontally', 'fashion_daily' ),
		'repeat-y'  => esc_html__( 'Tile Vertically', 'fashion_daily' ),
	) );
}

/**
 * Get background attachment
 *
 * @since 1.0.0
 * @return array
 */
function fashion_daily_get_bg_attachment() {
	return apply_filters( 'fashion_daily_get_bg_attachment', array(
		'scroll' => esc_html__( 'Scroll', 'fashion_daily' ),
		'fixed'  => esc_html__( 'Fixed', 'fashion_daily' ),
	) );
}

/**
 * Get text color
 *
 * @since 1.0.0
 * @return array
 */
function fashion_daily_get_text_color() {
	return apply_filters( 'fashion_daily_get_text_color', array(
		'light' => esc_html__( 'Light', 'fashion_daily' ),
		'dark'  => esc_html__( 'Dark', 'fashion_daily' ),
	) );
}

/**
 * Get sidebar position.
 *
 * @since  1.0.0
 * @return array
 */
function fashion_daily_get_sidebar_position() {
	return apply_filters( 'fashion_daily_get_sidebar_position', array(
		'one-left-sidebar' 	=> esc_html__( 'Sidebar on left side', 'fashion_daily' ),
		'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'fashion_daily' ),
		'none' 				=> esc_html__( 'No sidebar', 'fashion_daily' ),
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */

function fashion_daily_get_dynamic_css_options() {
	return apply_filters( 'fashion_daily-theme/dynamic_css/options', array(
		'prefix'        => 'fashion_daily',
		'type'          => 'theme_mod',
		'parent_handles' => array(
			'css' => 'fashion_daily-theme-style',
			'js'  => 'fashion_daily-theme-js',
		),
		'css_files'      => array(
			get_theme_file_path( 'assets/css/dynamic.css' ),
			get_theme_file_path( 'assets/css/dynamic/header.css' ),
			get_theme_file_path( 'assets/css/dynamic/footer.css' ),
			get_theme_file_path( 'assets/css/dynamic/menus.css' ),
			get_theme_file_path( 'assets/css/dynamic/social.css' ),
			get_theme_file_path( 'assets/css/dynamic/navigation.css' ),
			get_theme_file_path( 'assets/css/dynamic/buttons.css' ),
			get_theme_file_path( 'assets/css/dynamic/forms.css' ),
			get_theme_file_path( 'assets/css/dynamic/post.css' ),
			get_theme_file_path( 'assets/css/dynamic/page.css' ),
			get_theme_file_path( 'assets/css/dynamic/post-grid.css' ),
			get_theme_file_path( 'assets/css/dynamic/widgets.css' ),
			get_theme_file_path( 'assets/css/dynamic/plugins.css' ),
		),
		'options_cb'     => 'get_theme_mods',
	) );
}

/**
 * Return true if setting is value. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function fashion_daily_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function fashion_daily_get_default_footer_copyright() {
	return esc_html__( '%%site-name%% © %%year%%. All rights reserved.', 'fashion_daily' );
}

/**
 * Return true if blog sidebar enabled.
 *
 * @return bool
 */
function fashion_daily_is_blog_sidebar_enabled() {
	return apply_filters( 'fashion_daily-theme/customizer/blog-sidebar-enabled', true );
}

/**
 * Return true if blog columns enabled.
 *
 * @return bool
 */
function fashion_daily_is_blog_columns_enabled() {
	return apply_filters( 'fashion_daily-theme/customizer/blog-columns-enabled', true );
}

/**
 * Load dynamic logic for the customizer controls area.
 *
 * @since 1.0.0
 */
function fashion_daily_customize_controls_assets() {
	wp_enqueue_script( 'fashion_daily-theme-customizer-controls', get_theme_file_uri('assets/js/customizer-controls.js' ), array( 'customize-controls' ), fashion_daily_theme()->version, true );

	wp_localize_script( 'fashion_daily-theme-customizer-controls', 'fashion_dailyControlsConditions', fashion_daily_get_customize_controls_conditions() );
}

add_action( 'customize_controls_enqueue_scripts', 'fashion_daily_customize_controls_assets' );

/**
 * Get customize controls conditions.
 *
 * @since  1.0.0
 * @return array
 */
function fashion_daily_get_customize_controls_conditions() {

	$customize_options = fashion_daily_get_customizer_options();
	$controls_args     = $customize_options['options'];

	$results = array();

	foreach ( $controls_args as $control => $args ) {
		if ( isset( $args['conditions'] ) ) {
			$results[ $control ] = $args['conditions'];
		}
	}

	return $results;
}