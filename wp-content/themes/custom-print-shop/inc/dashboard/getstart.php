<?php
//about theme info
add_action( 'admin_menu', 'custom_print_shop_gettingstarted' );
function custom_print_shop_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'custom-print-shop'), esc_html__('Get Started', 'custom-print-shop'), 'edit_theme_options', 'custom_print_shop_guide', 'custom_print_shop_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function custom_print_shop_admin_theme_style() {
   wp_enqueue_style('custom-print-shop-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'custom_print_shop_admin_theme_style');

//guidline for about theme
function custom_print_shop_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$custom_print_shop_theme = wp_get_theme( 'custom-print-shop' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button role="tab" class="tablinks home" onclick="custom_print_shop_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'custom-print-shop' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="custom_print_shop_openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'custom-print-shop' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="custom_print_shop_openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'custom-print-shop' ); ?></button>				
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to Custom Print Shop Theme', 'custom-print-shop' ); ?> <span class="version"><?php esc_html_e( 'Version:', 'custom-print-shop' ); ?> <?php echo esc_html($custom_print_shop_theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( CUSTOM_PRINT_SHOP_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'custom-print-shop' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'custom-print-shop'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( CUSTOM_PRINT_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'custom-print-shop'); ?></a>
			</div>
			<div class="col-tc-6">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'Custom Print Shop emerges as a versatile and dynamic solution for individuals and businesses venturing into the world of personalized printing. Crafted with precision, this theme caters to the unique needs of print shops, offering a user-friendly and visually engaging platform for showcasing and selling custom print products. Designed with flexibility in mind, the Custom Print Shop theme provides an intuitive interface that simplifies the process of creating and customizing various print items. From personalized apparel to custom stationery, the theme accommodates a diverse range of printing needs. Its adaptability makes it suitable for both novice users looking to explore personalized printing and seasoned print shop owners seeking a robust digital presence. The visual appeal of the theme plays a crucial role in capturing the essence of custom printing. Aesthetically pleasing layouts and vibrant design elements create an engaging showcase for custom products. The theme ensures that each product is presented in a way that resonates with the customers desire for uniqueness and personalization. Navigating the website is seamless, allowing users to effortlessly browse through the available print options, customize their selections, and proceed with secure and convenient transactions. The incorporation of e-commerce functionalities ensures a smooth and efficient purchasing process, making it convenient for customers to order their personalized print products.', 'custom-print-shop' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'Custom Print Shop Theme Information', 'custom-print-shop' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( CUSTOM_PRINT_SHOP_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'custom-print-shop' ); ?></a></p>
				<p><a href="<?php echo esc_url( CUSTOM_PRINT_SHOP_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'custom-print-shop' ); ?></a></p>
				<p><a href="<?php echo esc_url( CUSTOM_PRINT_SHOP_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'custom-print-shop' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Custom Print Shop emerges as a versatile and dynamic solution for individuals and businesses venturing into the world of personalized printing. Crafted with precision, this theme caters to the unique needs of print shops, offering a user-friendly and visually engaging platform for showcasing and selling custom print products. Designed with flexibility in mind, the Custom Print Shop theme provides an intuitive interface that simplifies the process of creating and customizing various print items. From personalized apparel to custom stationery, the theme accommodates a diverse range of printing needs. Its adaptability makes it suitable for both novice users looking to explore personalized printing and seasoned print shop owners seeking a robust digital presence. The visual appeal of the theme plays a crucial role in capturing the essence of custom printing. Aesthetically pleasing layouts and vibrant design elements create an engaging showcase for custom products. The theme ensures that each product is presented in a way that resonates with the customers desire for uniqueness and personalization. Navigating the website is seamless, allowing users to effortlessly browse through the available print options, customize their selections, and proceed with secure and convenient transactions. The incorporation of e-commerce functionalities ensures a smooth and efficient purchasing process, making it convenient for customers to order their personalized print products.', 'custom-print-shop' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'custom-print-shop' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title, and tagline customization', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Separate Newsletter Section', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slide', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Post type', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'custom-print-shop' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'custom-print-shop' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'custom-print-shop' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'custom-print-shop' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'custom-print-shop' ); ?></P>
					<a href="<?php echo esc_url( CUSTOM_PRINT_SHOP_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'custom-print-shop' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'custom-print-shop'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'custom-print-shop' ); ?></P>
					<a href="<?php echo esc_url( CUSTOM_PRINT_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'custom-print-shop'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>