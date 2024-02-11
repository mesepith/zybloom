<?php 

	$feminine_clothing_fashion_custom_style = '';

	// Logo Size
	$feminine_clothing_fashion_logo_top_padding = get_theme_mod('feminine_clothing_fashion_logo_top_padding');
	$feminine_clothing_fashion_logo_bottom_padding = get_theme_mod('feminine_clothing_fashion_logo_bottom_padding');
	$feminine_clothing_fashion_logo_left_padding = get_theme_mod('feminine_clothing_fashion_logo_left_padding');
	$feminine_clothing_fashion_logo_right_padding = get_theme_mod('feminine_clothing_fashion_logo_right_padding');

	if( $feminine_clothing_fashion_logo_top_padding != '' || $feminine_clothing_fashion_logo_bottom_padding != '' || $feminine_clothing_fashion_logo_left_padding != '' || $feminine_clothing_fashion_logo_right_padding != ''){
		$feminine_clothing_fashion_custom_style .=' .logo {';
			$feminine_clothing_fashion_custom_style .=' padding-top: '.esc_attr($feminine_clothing_fashion_logo_top_padding).'px; padding-bottom: '.esc_attr($feminine_clothing_fashion_logo_bottom_padding).'px; padding-left: '.esc_attr($feminine_clothing_fashion_logo_left_padding).'px; padding-right: '.esc_attr($feminine_clothing_fashion_logo_right_padding).'px;';
		$feminine_clothing_fashion_custom_style .=' }';
	}


	//site title tagline
	$feminine_clothing_fashion_site_title_color = get_theme_mod('feminine_clothing_fashion_site_title_color');
if ( $feminine_clothing_fashion_site_title_color != '') {
	$feminine_clothing_fashion_custom_style .=' h1.site-title a, p.site-title a {';
		$feminine_clothing_fashion_custom_style .=' color:'.esc_attr($feminine_clothing_fashion_site_title_color).';';
	$feminine_clothing_fashion_custom_style .=' }';
}

$feminine_clothing_fashion_site_tagline_color = get_theme_mod('feminine_clothing_fashion_site_tagline_color');
if ( $feminine_clothing_fashion_site_tagline_color != '') {
	$feminine_clothing_fashion_custom_style .=' p.site-description {';
		$feminine_clothing_fashion_custom_style .=' color:'.esc_attr($feminine_clothing_fashion_site_tagline_color).';';
	$feminine_clothing_fashion_custom_style .=' }';
}

//Header color
$feminine_clothing_fashion_header_noicon_color = get_theme_mod('feminine_clothing_fashion_header_noicon_color');
if ( $feminine_clothing_fashion_header_noicon_color != '') {
	$feminine_clothing_fashion_custom_style .=' #header .phn-icon i {';
		$feminine_clothing_fashion_custom_style .=' color:'.esc_attr($feminine_clothing_fashion_header_noicon_color).';';
	$feminine_clothing_fashion_custom_style .=' }';
}

$feminine_clothing_fashion_header_noiconbg_color = get_theme_mod('feminine_clothing_fashion_header_noiconbg_color');
if ( $feminine_clothing_fashion_header_noiconbg_color != '') {
	$feminine_clothing_fashion_custom_style .=' #header .phn-icon {';
		$feminine_clothing_fashion_custom_style .=' background-color:'.esc_attr($feminine_clothing_fashion_header_noiconbg_color).';';
	$feminine_clothing_fashion_custom_style .=' }';
}

$feminine_clothing_fashion_header_notext_color = get_theme_mod('feminine_clothing_fashion_header_notext_color');
if ( $feminine_clothing_fashion_header_notext_color != '') {
	$feminine_clothing_fashion_custom_style .=' #header .phn-text {';
		$feminine_clothing_fashion_custom_style .=' color:'.esc_attr($feminine_clothing_fashion_header_notext_color).';';
	$feminine_clothing_fashion_custom_style .=' }';
}