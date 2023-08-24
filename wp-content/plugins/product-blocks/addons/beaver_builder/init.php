<?php
defined( 'ABSPATH' ) || exit;

add_filter('wopb_addons_config', 'wopb_beaver_builder_config');
function wopb_beaver_builder_config( $config ) {
	$configuration = array(
		'name' => __( 'Beaver Builder', 'product-blocks' ),
		'desc' => __( 'Use Gutenberg blocks inside Beaver Builder via Saved Template addons.', 'product-blocks' ),
		'img' => WOPB_URL.'/assets/img/addons/beaver.svg',
		'is_pro' => false
	);
	$config['wopb_beaver_builder'] = $configuration;
	return $config;
}


function wopb_productx_beaver_builder() {
	$settings = wopb_function()->get_setting('wopb_beaver_builder');
	if ($settings == 'true') {
		if ( class_exists( 'FLBuilder' ) ) {
			require_once WOPB_PATH.'/addons/beaver_builder/beaverbuilder.php';
		}
	}
}
add_action( 'init', 'wopb_productx_beaver_builder' );