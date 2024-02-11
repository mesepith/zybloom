<?php
/**
 * The header for our theme
 *
 * @subpackage Feminine Clothing Fashion
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'feminine-clothing-fashion' ); ?></a>

<div id="header">
	<!--  -->
	<div class="head-top ">
		<div class="container pd-0">
			<div class=" row mr-0">
				<div class="col-lg-3 col-md-12 col-sm-12 align-self-center pd-0">
					<div class="logo text-md-left text-center">
						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
						<?php endif; ?>
						<?php if (get_theme_mod('feminine_clothing_fashion_show_site_title',true)) {?>
							<?php $feminine_clothing_fashion_blog_info = get_bloginfo( 'name' ); ?>
							<?php if ( ! empty( $feminine_clothing_fashion_blog_info ) ) : ?>
								<?php if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php endif; ?>
							<?php endif; ?>
						<?php }?>
						<?php if (get_theme_mod('feminine_clothing_fashion_show_tagline',true)) {?>
							<?php $feminine_clothing_fashion_description = get_bloginfo( 'description', 'display' );
							if ( $feminine_clothing_fashion_description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html($feminine_clothing_fashion_description); ?></p>
							<?php endif; ?>
						<?php }?>
					</div>
				</div>
				<div class="col-lg-9 col-md-12 col-sm-12 pd-0">
					<div class="row mr-0">
						<div class="col-xl-5 col-lg-5 col-md-5">	
							<?php if(class_exists('woocommerce')){ ?>
								<div class="search-box">
									<?php if(class_exists('woocommerce')){ ?>
										<?php get_search_form() ?>
									<?php }?> 
								</div>
							<?php }?>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-3 hbtn Nmob">
							<?php if(class_exists('woocommerce')){ ?>
								<div class="head-cart">
									<div class="row mr-0">
										<div class="col-md-3 col-3 pd-0">
											<a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>">
												<div class="icon">
													<i class="fas fa-shopping-cart"></i>
												</div>
											</a>
										</div>
										<div class="col-md-9 col-9">
											<div class="text">
												<span><?php esc_html_e('Your cart','feminine-clothing-fashion'); ?></span>
												<div class="clearfix"></div>
												<span class="cart-subtotal"> 
													<?php
														global $woocommerce;
														$subtotal = $woocommerce->cart->get_subtotal();
														$currency_symbol = get_woocommerce_currency_symbol();
														echo esc_html($currency_symbol . $subtotal);
													?>
												</span>
											</div>
										</div>
									</div>
								</div>
								
							<?php }?>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 pd-0">
							<div class="head-phn">
								<div class="row mr-0">
									<div class="col-md-3">
										<div class="phn-icon">
											<i class="fa fa-phone" aria-hidden="true"></i>
										</div>
									</div>
									<div class="col-md-9">
										<div class="phn-text">
											<?php esc_html_e('CALL US','feminine-clothing-fashion'); ?>
											<div class="clearfix"></div>
											<span><a href="<?php echo esc_html(get_theme_mod('feminine_clothing_fashion_contact_btn_text')); ?>" ><?php echo esc_html(get_theme_mod('feminine_clothing_fashion_contact_btn_text')); ?></a></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="head-bottom ">
			<div class="container pd-0">
				<div class=" row mr-0">
					<div class="col-lg-8 col-md-12 col-sm-12 main-bx">
						<!-- <div class="row mrg-0"> -->
						<div class="menu-bar row mrg-0 ">
							<div class="toggle-menu responsive-menu text-right">
								<?php if(has_nav_menu('primary')){ ?>
									<button onclick="feminine_clothing_fashion_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','feminine-clothing-fashion'); ?></span></button>
								<?php }?>
							</div>
							<div id="sidelong-menu" class="nav sidenav">
								<nav id="primary-site-navigation" class="nav-menu " role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'feminine-clothing-fashion' ); ?>">
									<?php if(has_nav_menu('primary')){
										wp_nav_menu( array( 
											'theme_location' => 'primary',
											'container_class' => 'main-menu-navigation clearfix' ,
											'menu_class' => 'clearfix',
											'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
											'fallback_cb' => 'wp_page_menu',
										) ); 
									} ?>
									<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="feminine_clothing_fashion_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','feminine-clothing-fashion'); ?></span></a>
								</nav>
							</div>
						</div>
						<!-- </div> -->
						<div class="clearfix"></div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
					<?php
						if ( class_exists( 'WooCommerce' ) ) { ?>
						<div class="head-buttons">
							<div class="row mr-0">
								
								<li>
									<a href="<?php echo esc_html(get_theme_mod('feminine_clothing_fashion_trackorder_link')); ?>">
										<div class="track-order">
											<i class="fa fa-car" ></i><p><?php esc_html_e('Track Your Order','feminine-clothing-fashion'); ?></p>
										</div>
									</a>
								</li>
								
								<li>
									<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
										<div class="signin">
											<i class="fa fa-user"></i><p><?php esc_html_e('Sign In','feminine-clothing-fashion'); ?></p>
										</div>
									</a>
								</li>
								
							</div>
						</div>
						<?php	
					} ?>
					</div>
				</div>
			</div>
		</div>
	<!-- </div> -->
</div>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content">
		    <div class="container"> 
		      	<h1><?php single_post_title(); ?></h1>
		      	<div class="innheader-border"></div>
		      	<div class="theme-breadcrumb mt-2">
					<?php feminine_clothing_fashion_breadcrumb();?>
				</div>
		    </div>
		</div>
	</div>
<?php } ?>