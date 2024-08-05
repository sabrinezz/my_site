<?php
/**
 * Displays Middle Header
 *
 * @package Beauty Cosmetic Store
 */
?>

<div class="center-header text-end">
	<div class="container">
		<div class="row top-header">
			<div class="col-lg-3 col-md-4 col-sm-12 logo-box align-self-center">
                <div class="navbar-brand ">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $beauty_cosmetic_store_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $beauty_cosmetic_store_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('beauty_cosmetic_store_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('beauty_cosmetic_store_logo_title_text',true) != ''){ ?>
                                    <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $beauty_cosmetic_store_description = get_bloginfo( 'description', 'display' );
                            if ( $beauty_cosmetic_store_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('beauty_cosmetic_store_theme_description',false) != ''){ ?>
                            <p class="site-description pb-2"><?php echo esc_html($beauty_cosmetic_store_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12 align-self-center pe-0 cat-box">
                <?php if(class_exists('woocommerce')){ ?>
                    <div class="all-categories">
                        <button class="cat-btn"><?php esc_html_e('All Categories','beauty-cosmetic-store'); ?><i class="fas fa-caret-down"></i></button>
                        <div class="home_product_cat">
                          <?php $beauty_cosmetic_store_args = array(
                              'number'     => '',
                              'orderby'    => 'title',
                              'order'      => 'ASC',
                              'hide_empty' => '',
                              'include'    => ''
                          );
                          $beauty_cosmetic_store_product_categories = get_terms( 'product_cat', $beauty_cosmetic_store_args );
                          $beauty_cosmetic_store_count = count($beauty_cosmetic_store_product_categories);
                            if ( $beauty_cosmetic_store_count > 0 ){
                              foreach ( $beauty_cosmetic_store_product_categories as $product_category ) {
                              echo '<h4><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></h4>';
                              $beauty_cosmetic_store_args = array(
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                  'relation' => 'AND',
                                  array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => $product_category->slug
                                  )
                                ),
                                'post_type' => 'product',
                                'orderby' => 'title,'
                              );
                            }
                          }?>
                        </div>
                    </div>
                <?php }?>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-6 col-12 align-self-center product-search text-end ps-0">
                <?php if(class_exists('woocommerce')){ ?>
                    <?php get_product_search_form(); ?>
                <?php }?>
            </div>
	        <div class="col-lg-2 col-md-6 col-sm-6 col-12 align-self-center">
	            <?php if(get_theme_mod('beauty_cosmetic_store_phone_number') != '' || get_theme_mod('beauty_cosmetic_store_phone_text') != '' ){ ?>
	                <div class="row m-0">
	                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 align-self-center phone-icon">
	                        <i class="fas fa-phone"></i>
	                    </div>
	                    <div class="col-lg-9 col-md-9 col-sm-9 col-9 align-self-center text-lg-start contact-box">
	                        <p class="mb-1 contact-text"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_phone_text','')); ?></p>
	                        <a href="tel:<?php echo esc_attr(get_theme_mod('beauty_cosmetic_store_phone_number','')); ?>"><p class="mb-0 text-start"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_phone_number','')); ?></p></a>
	                    </div>
	                </div>
	            <?php }?>
	        </div>
	        <div class="col-lg-2 col-md-6 col-sm-6 col-12 btn-box align-self-center text-end">
	        	<?php if(class_exists('woocommerce')){ ?>
                    <span class="user-btn">
                        <?php if ( is_user_logged_in() ) { ?>
                            <a class="account-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','beauty-cosmetic-store'); ?>"><i class="far fa-user"></i></a>
                        <?php } 
                        else { ?>
                            <a class="account-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','beauty-cosmetic-store'); ?>"></a>
                        <?php } ?>
                    </span>
                <?php }?>
                <?php if ( get_theme_mod('beauty_cosmetic_store_topbar1_wishlist_url') != "" ) {?>
                    <span class="wish-btn">
                        <a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_topbar1_wishlist_url')); ?>"><i class="far fa-heart"></i></a>
                    </span>
                <?php }?>
                <span class="cart_no">
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','beauty-cosmetic-store' ); ?>"><i class="fas fa-cart-plus"></i><span class="cart-value"><?php echo sprintf ( esc_html( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
                    <?php }?>
                </span>
            </div>
		</div>
	</div>
</div>