<?php
defined( 'ABSPATH' ) || exit;

add_filter('wopb_addons_config', 'wopb_oxygen_config');
function wopb_oxygen_config( $config ) {
	$configuration = array(
		'name' => __( 'Oxygen Builder', 'product-blocks' ),
		'desc' => __( 'Use Gutenberg blocks inside Oxygen via Saved Template addons.', 'product-blocks' ),
		'img' => WOPB_URL.'/assets/img/addons/oxygen.svg',
		'is_pro' => false,
	);
	$config['wopb_oxygen'] = $configuration;
	return  $config;
}


function wopb_oxygen_builder() {
	$settings = wopb_function()->get_setting('wopb_oxygen');
	if ($settings == 'true') {
		if ( class_exists( 'OxygenElement' ) ) {
			require_once WOPB_PATH.'/addons/oxygen/oxygen.php';
		}
	}
}
add_action( 'wp_loaded', 'wopb_oxygen_builder' );