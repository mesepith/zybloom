<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'feminine_clothing_fashion_above_slider' ); ?>

	<?php if( get_theme_mod('feminine_clothing_fashion_slider_hide_show') != ''){ ?>
		<div id="slider">
			<div class="container">
				<div class="slider-content row row-eq-height  mr-0">
					<div class="col-lg-4 col-md-4 col-sm-12 pd-0">
						<?php if(class_exists('woocommerce')){ ?>
							<div class="sidebar-category ">
								<div class="categry-header"><span><?php echo esc_html_e('CATEGORY','feminine-clothing-fashion'); ?></span><i class="fa fa-bars" aria-hidden="true"></i></div>
								<div class="cat-drop">
									<?php
										$args = array(
											'orderby'    => 'title',
											'order'      => 'ASC',
											'hide_empty' => 0,
											'parent'  => 0
										);
										$feminine_clothing_fashion_product_categories = get_terms( 'product_cat', $args );
										$count = count($feminine_clothing_fashion_product_categories);
										if ( $count > 0 ){
											foreach ( $feminine_clothing_fashion_product_categories as $feminine_clothing_fashion_product_category ) {
												$ecommerce_cat_id   = $feminine_clothing_fashion_product_category->term_id;
												$cat_link = get_category_link( $ecommerce_cat_id );
												$thumbnail_id = get_term_meta( $feminine_clothing_fashion_product_category->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
												$image = wp_get_attachment_url( $thumbnail_id );
												if ($feminine_clothing_fashion_product_category->category_parent == 0) {
													?>
													<li class="drp_dwn_menu">
														<div class="ficn">
															<?php if ( $image ) {
													 			echo '<img class="thumd_img" src="' . esc_url( $image ) . '" alt="" />';
													 		} ?>
														</div>
														<a href="<?php echo esc_url(get_term_link( $feminine_clothing_fashion_product_category ) ); ?>">
													<?php
													// if ( $image ) {
													// 	echo '<img class="thumd_img" src="' . esc_url( $image ) . '" alt="" />';
													// }
													echo esc_html( $feminine_clothing_fashion_product_category->name ); ?></a><div class="lasticn"><i class="fa fa-angle-right"></i></div></li>
												<?php }
												$feminine_clothing_fashion_child_args = array(
													'taxonomy' => 'product_cat',
													'hide_empty' => false,
													'parent'   => $feminine_clothing_fashion_product_category->term_id
												);
												$feminine_clothing_fashion_child_product_cats = get_terms( $feminine_clothing_fashion_child_args );
												foreach ($feminine_clothing_fashion_child_product_cats as $feminine_clothing_fashion_child_product_cat){
													echo '<li><a href="'.esc_url(get_term_link($feminine_clothing_fashion_child_product_cat->term_id)).'">'. esc_html( $feminine_clothing_fashion_child_product_cat->name ).'</a><i class="fas fa-caret-down"></i></li>';
												}
											}
										}
									?>
								</div>
							</div>
						<?php }?>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 pd-0">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<?php $feminine_clothing_fashion_slider_pages = array();
							for ( $count = 1; $count <= 4; $count++ ) {
								$mod = intval( get_theme_mod( 'feminine_clothing_fashion_slider'. $count ));
								if ( 'page-none-selected' != $mod ) {
								$feminine_clothing_fashion_slider_pages[] = $mod;
								}
							}
							if( !empty($feminine_clothing_fashion_slider_pages) ) :
								$args = array(
									'post_type' => 'page',
									'post__in' => $feminine_clothing_fashion_slider_pages,
									'orderby' => 'post__in'
								);
								$query = new WP_Query( $args );
							if ( $query->have_posts() ) :
								$i = 1;
							?>     
								<div class="carousel-inner" role="listbox">
									<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
									<div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>	
										<div class="sliderimg">
											<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
										</div>
										<div class="carousel-bx">
											<div class="offer-txt">
												<h3 class="offer-head1"><?php echo esc_html(get_theme_mod('feminine_clothing_fashion_slider_offerhead1')); ?></h3>
												<h3 class="offer-head2"><?php echo esc_html(get_theme_mod('feminine_clothing_fashion_slider_offerhead2')); ?></h3>					
												<div class="clearfix"></div>
												<h2 class="offer-head3">
													<?php esc_html_e('UP TO','feminine-clothing-fashion'); ?>
													<span><?php echo esc_html(get_theme_mod('feminine_clothing_fashion_slider_offerpercent')); ?></span>
													<?php esc_html_e('OFF','feminine-clothing-fashion'); ?>
												</h2>
											</div>
											<div class="btn">
												<a href="<?php echo esc_html(get_theme_mod('feminine_clothing_fashion_slider_offerbtnlink')); ?>" class="read-btn"><span><?php esc_html_e('SHOP NOW','feminine-clothing-fashion'); ?></span></a>
											</div>
										</div> 		
									</div>
									<?php $i++; endwhile; 
									wp_reset_postdata();?>
								</div>
							<?php else : ?>
								<div class="no-postfound"></div>
							<?php endif;
							endif;?>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
								<span class="screen-reader-text"><?php esc_html_e( 'Prev','feminine-clothing-fashion' );?></span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
								<span class="screen-reader-text"><?php esc_html_e( 'Next','feminine-clothing-fashion' );?></span>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					
				</div>
			</div>
		</div>
	<?php }?>
	
	<?php do_action('feminine_clothing_fashion_below_slider'); ?>


	<section id="productcategory-section">
		<div class="container"> 
			<div class="productcategory-head text-center ">
				
				<?php if(get_theme_mod('feminine_clothing_fashion_productcategorysection_title') != ''){?>
					<h3><?php echo esc_html(get_theme_mod('feminine_clothing_fashion_productcategorysection_title')); ?>
						<div class="head-brd"></div>
					</h3>
				<?php }?>

			</div>
			<div class="category">
				<div class="pcbox">
					<div class="row mr-0">  
					<?php
					$args = array(
						'number'     => 0,
						'orderby'    => 'title',
						'order'      => 'ASC',
						'hide_empty' => false
					);
					$product_categories = get_terms( 'product_cat', $args );

					$count = count($product_categories);
					if ( $count > 0 ){
						foreach ( $product_categories as $product_category ) {

						if(function_exists('get_term_meta')){
							if( isset( $product_category->term_id ) ){
								//show parent categories
									$thumbnail_id = get_term_meta($product_category->term_id, 'thumbnail_id', true);
									}
								// get the image URL for parent category
									$image = wp_get_attachment_url($thumbnail_id);
								}else{
									$image = esc_html(get_template_directory_uri()).'/images/default.png';
								}
							if( isset( $product_category->name ) ){
							echo '<div class="col-lg-3 col-md-3 col-sm-12 item cat-product hvr-float-shadow"> ';

								echo' <div class="pro-cat-img">   
								<a href="' . get_term_link( $product_category ) . '" data-hover="' . $product_category->name . '" ><img src="'.$image.'" alt="" width="270" height="377" />
									<div class="p-olay"></div></a>
								</div>  ';

								echo ' <div class="pro-cat-content"> ';
								echo '<div class="pro-cat-oly"></div>';
							echo '<h5><a href="' . get_term_link( $product_category ) . '" data-hover="' . $product_category->name . '" >
								<span> ' . $product_category->name . '</span>
								</a>
							</h5>';
							echo ' <div class="pro-cat-btn"> ';
							echo '<a href="' . get_term_link( $product_category ) . '" data-hover="' . $product_category->count . '" >
									<span> ' . $product_category->count . '</span>
									<span>Products</span>
								  </a>';
							echo'</div>';

								echo'
								</div>
							</div>';		

						}
						}
					}?>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>


	<?php do_action('feminine_clothing_fashion_below_productcategory_section'); ?>

	<section id="featureproduct-section">
		

		<div class="container"> 
			<div class="featureproduct-head ">
				<?php if(get_theme_mod('feminine_clothing_fashion_section_title') != ''){?>
					<h3><?php echo esc_html(get_theme_mod('feminine_clothing_fashion_section_title')); ?></h3>
					<div class="heading-brd"></div>
				<?php }?>
			</div>
			<div class="featuresus-post-wrap">
				<div class="featuresus-post-boxes row">
					<div class="owl-carousel owl-theme"> 
						<?php
							if(function_exists('woocommerce_template_loop_add_to_cart') && function_exists('WC')){
				    			$args = array( 'post_type' => 'product', /*'stock' => 1,*/ 'posts_per_page' => 9, 'orderby' =>'date','order' => 'DESC' );
				    			$meta_query   = WC()->query->get_meta_query();
				    			$tax_query   = WC()->query->get_tax_query();
				    			$tax_query[] = array(
				    				'taxonomy' => 'product_visibility',
				    				'field'    => 'name',
				    				'terms'    => 'featured',
				    				'operator' => 'IN',
				    			);
				    			$args = array(
				    				'post_type'   =>  'product',
				    				'stock'       =>  1,
				    				'posts_per_page' => -1, 
				    				'orderby'     =>  'date',
				    				'order'       =>  'DESC',
				    				'meta_query'  =>  $meta_query,
				    				'tax_query'   => $tax_query,
				    			);
				    			$loop = new WP_Query( $args );
				    			if($loop->post_count > 0){
				    				while ( $loop->have_posts() ) : $loop->the_post(); global $product;
						?>
						<!-- <div class="<?php //echo $colCls;?> featuresbx wow zoomIn" data-wow-duration="1s"> -->
						<div class="item featuresbx wow zoomIn" data-wow-duration="1s">
							<div class="featuresus-single" >
								<div class="features-box"> 
									<div class="hi-icon">
										<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php if (has_post_thumbnail( $loop->post->ID )) 
			    								echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
			    								else
			    									echo '<img src="'.get_template_directory_uri().'/images/default.png" alt="featured products" />'; 
			    							?>
			    							<!-- <div class="skewd"></div>	 -->
			    							<?php if( get_theme_mod('product_button_display','show' ) == 'show') :
										?>	
										<div class="add-to-cart">
											<!-- <li><a href="<//?php echo esc_url(get_permalink()); ?>" class="see-more"><i class="fa fa-eye" ></i></a><li>

											<li><a href="<//?php echo esc_url(get_permalink()); ?>" class="wish"><i class="fa fa-heart" ></i></a><li> -->

											<li><a href="<?php echo esc_url(get_permalink()); ?>" class="more-button"><span></span><i class="fa fa-shopping-bag"></i><?php echo esc_html_e('Add to Cart','feminine-clothing-fashion'); ?></a><li>
											<div class="clearfix"></div>
										</div>
									<?php endif ?>
										</a>
									</div>
								</div> 
								<div class="pcontent">
									
									<a class="add-to-cart" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">	
										<h3><?php the_title(); ?></h3>
									</a>
									<span class="price"><?php echo $product->get_price_html(); ?></span>
									
								</div>			 
							</div>
						</div>
						<?php					
						endwhile; 
							}else{
						?>
						
						<?php }
							//wp_reset_query(); 
						}
							?>
						</div>	
				</div>
			</div>
		</div>
	</section>
	

	<!-- <div class="container">
	  	<//?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content py-5">
	        	<//?php the_content(); ?>
	        </div>
	    <//?php endwhile; // end of the loop. ?>
	</div> -->
</main>

<?php get_footer(); ?>