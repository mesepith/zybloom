<?php
/**
 * Feminine Clothing Fashion: Customizer
 *
 * @subpackage Feminine Clothing Fashion
 * @since 1.0
 */

use WPTRT\Customize\Section\Feminine_Clothing_Fashion_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Feminine_Clothing_Fashion_Button::class );

	$manager->add_section(
		new Feminine_Clothing_Fashion_Button( $manager, 'feminine_clothing_fashion_pro', [
			'title' => __( 'Feminine Clothing Pro', 'feminine-clothing-fashion' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'feminine-clothing-fashion' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/wordpress-clothing-store-theme/', 'feminine-clothing-fashion')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'feminine-clothing-fashion-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'feminine-clothing-fashion-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function feminine_clothing_fashion_customize_register( $wp_customize ) {

	$wp_customize->add_setting('feminine_clothing_fashion_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('feminine_clothing_fashion_logo_padding',array(
		'label' => __('Logo Margin','feminine-clothing-fashion'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('feminine_clothing_fashion_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'feminine_clothing_fashion_sanitize_float'
	));
	$wp_customize->add_control('feminine_clothing_fashion_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','feminine-clothing-fashion'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('feminine_clothing_fashion_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'feminine_clothing_fashion_sanitize_float'
	));
	$wp_customize->add_control('feminine_clothing_fashion_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','feminine-clothing-fashion'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('feminine_clothing_fashion_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'feminine_clothing_fashion_sanitize_float'
	));
	$wp_customize->add_control('feminine_clothing_fashion_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','feminine-clothing-fashion'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('feminine_clothing_fashion_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'feminine_clothing_fashion_sanitize_float'
 	));
 	$wp_customize->add_control('feminine_clothing_fashion_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','feminine-clothing-fashion'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('feminine_clothing_fashion_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'feminine_clothing_fashion_sanitize_checkbox'
	));
	$wp_customize->add_control('feminine_clothing_fashion_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','feminine-clothing-fashion'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'feminine_clothing_fashion_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'feminine_clothing_fashion_site_title_color', array(
		'label' => 'Title Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_setting('feminine_clothing_fashion_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'feminine_clothing_fashion_sanitize_checkbox'
	));
	$wp_customize->add_control('feminine_clothing_fashion_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','feminine-clothing-fashion'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'feminine_clothing_fashion_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'feminine_clothing_fashion_site_tagline_color', array(
		'label' => 'Tagline Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_panel( 'feminine_clothing_fashion_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'feminine-clothing-fashion' ),
		'description' => __( 'Description of what this panel does.', 'feminine-clothing-fashion' ),
	) );

	$wp_customize->add_section( 'feminine_clothing_fashion_theme_options_section', array(
    	'title'      => __( 'General Settings', 'feminine-clothing-fashion' ),
		'priority'   => 30,
		'panel' => 'feminine_clothing_fashion_panel_id'
	) );

	$wp_customize->add_setting('feminine_clothing_fashion_theme_options',array(
		'default' => 'One Column',
		'sanitize_callback' => 'feminine_clothing_fashion_sanitize_choices'
	));
	$wp_customize->add_control('feminine_clothing_fashion_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','feminine-clothing-fashion'),
		   'Right Sidebar' => __('Right Sidebar','feminine-clothing-fashion'),
		   'One Column' => __('One Column','feminine-clothing-fashion'),
		   'Grid Layout' => __('Grid Layout','feminine-clothing-fashion')
		),
	));

	$wp_customize->add_setting('feminine_clothing_fashion_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'feminine_clothing_fashion_sanitize_choices'
	));
	$wp_customize->add_control('feminine_clothing_fashion_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','feminine-clothing-fashion'),
        'section' => 'feminine_clothing_fashion_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','feminine-clothing-fashion'),
            'Right Sidebar' => __('Right Sidebar','feminine-clothing-fashion'),
            'One Column' => __('One Column','feminine-clothing-fashion')
        ),
	));

	$wp_customize->add_setting('feminine_clothing_fashion_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'feminine_clothing_fashion_sanitize_choices'
	));
	$wp_customize->add_control('feminine_clothing_fashion_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','feminine-clothing-fashion'),
        'section' => 'feminine_clothing_fashion_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','feminine-clothing-fashion'),
            'Right Sidebar' => __('Right Sidebar','feminine-clothing-fashion'),
            'One Column' => __('One Column','feminine-clothing-fashion')
        ),
	));

	$wp_customize->add_setting('feminine_clothing_fashion_archive_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'feminine_clothing_fashion_sanitize_choices'
	));
	$wp_customize->add_control('feminine_clothing_fashion_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','feminine-clothing-fashion'),
        'section' => 'feminine_clothing_fashion_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','feminine-clothing-fashion'),
            'Right Sidebar' => __('Right Sidebar','feminine-clothing-fashion'),
            'One Column' => __('One Column','feminine-clothing-fashion'),
            'Grid Layout' => __('Grid Layout','feminine-clothing-fashion')
        ),
	));

	//home page header
	$wp_customize->add_section( 'feminine_clothing_fashion_header_section' , array(
    	'title'    => __( 'Header Settings', 'feminine-clothing-fashion' ),
		'priority' => null,
		'panel' => 'feminine_clothing_fashion_panel_id'
	) );

    $wp_customize->add_setting('feminine_clothing_fashion_contact_btn_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_clothing_fashion_contact_btn_text',array(
		'label'	=> __('Phone Number','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_header_section',
		'type' => 'text'
	));

	$wp_customize->add_setting('feminine_clothing_fashion_trackorder_link',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_clothing_fashion_trackorder_link',array(
		'label'	=> __('Track Order Link','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_header_section',
		'type' => 'text'
	));
	
	$wp_customize->add_setting( 'feminine_clothing_fashion_header_noicon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'feminine_clothing_fashion_header_noicon_color', array(
		'label' => 'Phone Icon Color',
		'section' => 'feminine_clothing_fashion_header_section',
	)));

	$wp_customize->add_setting( 'feminine_clothing_fashion_header_noiconbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'feminine_clothing_fashion_header_noiconbg_color', array(
		'label' => 'Phone Icon Bg Color',
		'section' => 'feminine_clothing_fashion_header_section',
	)));

	$wp_customize->add_setting( 'feminine_clothing_fashion_header_notext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'feminine_clothing_fashion_header_notext_color', array(
		'label' => 'Phone Text Color',
		'section' => 'feminine_clothing_fashion_header_section',
	)));

	//home page slider
	$wp_customize->add_section( 'feminine_clothing_fashion_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'feminine-clothing-fashion' ),
		'priority' => null,
		'panel' => 'feminine_clothing_fashion_panel_id'
	) );

	$wp_customize->add_setting('feminine_clothing_fashion_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'feminine_clothing_fashion_sanitize_checkbox'
	));
	$wp_customize->add_control('feminine_clothing_fashion_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','feminine-clothing-fashion'),
	   	'section' => 'feminine_clothing_fashion_slider_section',
	));

	
	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'feminine_clothing_fashion_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'feminine_clothing_fashion_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'feminine_clothing_fashion_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'feminine-clothing-fashion' ),
			'description' => __('Image Size ( 600 x 650 )', 'feminine-clothing-fashion' ),
			'section' => 'feminine_clothing_fashion_slider_section',
			'type' => 'dropdown-pages'
		));
	}


	$wp_customize->add_setting('feminine_clothing_fashion_slider_offerhead1',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_clothing_fashion_slider_offerhead1',array(
		'label'	=> __('Offer Heading 1','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_slider_section',
		'type' => 'text'
	));

	$wp_customize->add_setting('feminine_clothing_fashion_slider_offerhead2',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_clothing_fashion_slider_offerhead2',array(
		'label'	=> __('Offer Heading 2','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_slider_section',
		'type' => 'text'
	));

	$wp_customize->add_setting('feminine_clothing_fashion_slider_offerpercent',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_clothing_fashion_slider_offerpercent',array(
		'label'	=> __('Offer Percent','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_slider_section',
		'type' => 'text'
	));

	$wp_customize->add_setting('feminine_clothing_fashion_slider_offerbtnlink',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_clothing_fashion_slider_offerbtnlink',array(
		'label'	=> __('Offer Button Link','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_slider_section',
		'type' => 'text'
	));




	//productcategory Section
	$wp_customize->add_section('feminine_clothing_fashion_productcategory_section',array(
		'title'	=> __('Product Category Section','feminine-clothing-fashion'),
		'description'=> __('<b>Note :</b> This section will appear below the Slider Section.','feminine-clothing-fashion'),
		'panel' => 'feminine_clothing_fashion_panel_id',
	));
 
    $wp_customize->add_setting('feminine_clothing_fashion_productcategorysection_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_clothing_fashion_productcategorysection_title',array(
		'label'	=> __('Section Title','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_productcategory_section',
		'type' => 'text'
	));


	// Featureproduct Section
	$wp_customize->add_section('feminine_clothing_fashion_featureproduct_section',array(
		'title'	=> __('Feature Product Section','feminine-clothing-fashion'),
		'description'=> __('<b>Note :</b> This section will appear below the Category Section.','feminine-clothing-fashion'),
		'panel' => 'feminine_clothing_fashion_panel_id',
	));

 
    $wp_customize->add_setting('feminine_clothing_fashion_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_clothing_fashion_section_title',array(
		'label'	=> __('Section Title','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_featureproduct_section',
		'type' => 'text'
	));


	//Footer
    $wp_customize->add_section( 'feminine_clothing_fashion_footer', array(
    	'title'  => __( 'Footer Text', 'feminine-clothing-fashion' ),
		'priority' => null,
		'panel' => 'feminine_clothing_fashion_panel_id'
	) );

	$wp_customize->add_setting('feminine_clothing_fashion_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'feminine_clothing_fashion_sanitize_checkbox'
    ));
    $wp_customize->add_control('feminine_clothing_fashion_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','feminine-clothing-fashion'),
       'section' => 'feminine_clothing_fashion_footer'
    ));

    $wp_customize->add_setting('feminine_clothing_fashion_footer_copy',array(
		'default' => 'Feminine Clothing Fashion WordPress Theme By Luzuk',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_clothing_fashion_footer_copy',array(
		'label'	=> __('Footer Text','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_footer',
		'setting' => 'feminine_clothing_fashion_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting('feminine_clothing_fashion_footer_copylink',array(
		'default' => 'https://www.luzuk.com/themes/feminine-clothing-fashion-wordpress-theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('feminine_clothing_fashion_footer_copylink',array(
		'label'	=> __('Footer Link','feminine-clothing-fashion'),
		'section' => 'feminine_clothing_fashion_footer',
		'setting' => 'feminine_clothing_fashion_footer_copylink',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'feminine_clothing_fashion_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'feminine_clothing_fashion_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'feminine_clothing_fashion_customize_register' );

function feminine_clothing_fashion_customize_partial_blogname() {
	bloginfo( 'name' );
}

function feminine_clothing_fashion_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if (class_exists('WP_Customize_Control')) {

   	class feminine_clothing_fashion_Fontawesome_Icon_Chooser extends WP_Customize_Control {

      	public $type = 'icon';

      	public function render_content() { ?>
	     	<label>
	            <span class="customize-control-title">
	               <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) { ?>
	                <span class="description customize-control-description">
	                   <?php echo wp_kses_post($this->description); ?>
	                </span>
	            <?php } ?>

	            <div class="feminine-clothing-fashion-selected-icon">
	                <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	                <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="feminine-clothing-fashion-icon-list clearfix">
	                <?php
	                $feminine_clothing_fashion_font_awesome_icon_array = feminine_clothing_fashion_font_awesome_icon_array();
	                foreach ($feminine_clothing_fashion_font_awesome_icon_array as $feminine_clothing_fashion_font_awesome_icon) {
	                   $icon_class = $this->value() == $feminine_clothing_fashion_font_awesome_icon ? 'icon-active' : '';
	                   echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($feminine_clothing_fashion_font_awesome_icon) . '"></i></li>';
	                }
	                ?>
	            </ul>
	            <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	        </label>
	        <?php
      	}
  	}
}
function feminine_clothing_fashion_customizer_script() {
   wp_enqueue_style( 'font-awesome-1', get_template_directory_uri().'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'feminine_clothing_fashion_customizer_script' );