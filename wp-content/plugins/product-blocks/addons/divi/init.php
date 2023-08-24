<?php
defined( 'ABSPATH' ) || exit;

add_filter('wopb_addons_config', 'wopb_divi_config');
function wopb_divi_config( $config ) {
	$configuration = array(
		'name' => __( 'Divi', 'product-blocks' ),
		'desc' => __( 'Use Gutenberg blocks inside Divi via ProductX Template addons.', 'product-blocks' ),
		'img' => WOPB_URL.'/assets/img/addons/divi.svg',
		'is_pro' => false,
		// 'live' => 'https://www.wpxpo.com/addons/elementor/',
		// 'docs' => 'https://docs.wpxpo.com/docs/add-on/elementor-addon/'
	);
	$config['wopb_divi'] = $configuration;
	return $config;
}


function wopb_divi_builder() {
	$settings = wopb_function()->get_setting('wopb_divi');
	if ($settings == 'true') {
		if ( class_exists( 'ET_Builder_Module' ) ) {
			require_once WOPB_PATH.'/addons/divi/divi.php';

			$action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
			$post_id = isset($_GET['post']) ? sanitize_text_field($_GET['post']) : '';
			if ($action && $post_id) {
				if (get_post_type($post_id) == 'wopb_templates') {
					add_filter( 'et_builder_enable_classic_editor', '__return_false' );
				}
			}
		}
	}
}
add_action( 'init', 'wopb_divi_builder' );