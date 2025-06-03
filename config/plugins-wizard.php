<?php
/**
 * Jet Plugins Wizard configuration.
 *
 * @package Fashion_daily
 */
$license = array(
	'enabled' => false,
);

/**
 * Plugins configuration
 *
 * @var array
 */
$plugins = array(
	'jet-data-importer' => array(
		'name'   => esc_html__( 'Jet Data Importer', 'fashion_daily' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/ZemezLab/jet-data-importer/archive/master.zip',
		'access' => 'base',
	),
	'jet-theme-core' => array(
		'name'   => esc_html__( 'Jet Theme Core', 'fashion_daily' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-theme-core.zip',
		'access' => 'base',
	),
	'elementor' => array(
		'name'   => esc_html__( 'Elementor', 'fashion_daily' ),
		'access' => 'base',
	),
	'zemez-core' => array(
		'name'   => esc_html__( 'Zemez Core', 'fashion_daily' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/zemez-core.zip',
		'access' => 'base',
	),
	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'fashion_daily' ),
		'access' => 'skins',
	),
	'jet-elements' => array(
		'name'   => esc_html__( 'Jet Elements For Elementor', 'fashion_daily' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-elements.zip',
		'access' => 'skins',
	),	
	'jet-blocks' => array(
		'name'   => esc_html__( 'Jet Blocks For Elementor', 'fashion_daily' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-blocks.zip',
		'access' => 'skins',
	),
	'jet-blog' => array(
		'name'   => esc_html__( 'Jet Blog For Elementor', 'fashion_daily' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-blog.zip',
		'access' => 'skins',
	),
	'jet-tabs' => array(
		'name'   => esc_html__( 'Jet Tabs', 'fashion_daily' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-tabs.zip',
		'access' => 'skins',
	),
	'jet-menu' => array(
		'name'   => esc_html__( 'Jet Menu', 'fashion_daily' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-menu.zip',
		'access' => 'skins',
	),
	'jet-popup' => array(
		'name'   => esc_html__( 'Jet Popup', 'fashion_daily' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-popup.zip',
		'access' => 'skins',
	),
	'jet-tricks' => array(
		'name'   => esc_html__( 'Jet Tricks', 'fashion_daily' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-tricks.zip',
		'access' => 'skins',
	),
	'cherry-ld-mods-switcher' => array(
		'name' => esc_html__( 'Cherry Ld Mods Switcher', 'fashion_daily' ),
		'source' => 'remote',
		'path' => 'https://monstroid.zemez.io/download/cherry-ld-mods-switcher.zip',
		'access' => 'skins',
	),
);

/**
 * Skins configuration
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'jet-data-importer',
		'elementor',
		'jet-theme-core',
		'zemez-core',
	),
	'advanced' => array(
		'fashion_daily' => array(
			'full'  => array(
				'jet-blocks',
				'jet-blog',
				'jet-elements',
				'jet-tabs',
				'jet-menu',
				'contact-form-7',
				'jet-popup',
				'jet-tricks',
				'cherry-ld-mods-switcher',
			),
			'lite'  => false,
			'demo'  => 'https://ld-wp73.template-help.com/wordpress/prod_18247/v1/',
			'thumb' => get_stylesheet_directory_uri() . '/screenshot.png',
			'name'  => esc_html__( 'Fashion Daily Installation', 'fashion_daily' ),
		),
	),
);

$texts = array(
	'theme-name' => esc_html__( 'Fashion_daily', 'fashion_daily' ),
);

$config = array(
	'license' => $license,
	'plugins' => $plugins,
	'skins'   => $skins,
	'texts'   => $texts,
);
