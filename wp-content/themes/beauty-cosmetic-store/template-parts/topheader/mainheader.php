<?php
/**
 * Displays main header
 *
 * @package Beauty Cosmetic Store
 */
?>

<div class="main-header text-center text-md-start">
    <div class="container">
    	<div class="row">
    		<div class="col-lg-6 col-md-2 col-sm-12 align-self-center">
    			<div class=" nav-box">
		            <div class="header-box">
		                <?php get_template_part('template-parts/navigation/nav'); ?>
		            </div>
		        </div>
    		</div>
    		<div class="col-lg-6 col-md-10 col-sm-12 align-self-center head-button">
                <?php if ( get_theme_mod('beauty_cosmetic_store_header_sell_button') != "" || get_theme_mod('beauty_cosmetic_store_header_sell_button_url') != ""  ) {?>
                   <span class="main-header-btn me-3"><i class="fas fa-store me-2"></i><a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_header_sell_button_url')); ?>"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_header_sell_button')); ?></a></span>
                <?php }?>
                <?php if ( get_theme_mod('beauty_cosmetic_store_header_tracking_button') != "" || get_theme_mod('beauty_cosmetic_store_header_tracking_button_url') != ""  ) {?>
                	<span class="main-header-btn me-3"><i class="fas fa-shopping-bag me-2"></i><a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_header_tracking_button_url')); ?>"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_header_tracking_button')); ?></a></span>
                <?php }?>
                <?php if ( get_theme_mod('beauty_cosmetic_store_header_recent_view_button') != "" || get_theme_mod('beauty_cosmetic_store_header_recent_view_url') != ""  ) {?>
                	<span class="main-header-btn me-3"><a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_header_recent_view_url')); ?>"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_header_recent_view_button')); ?></a></span>
                <?php }?>
                <span class="text-center translate-btn">
                    <?php if(class_exists('GTranslate')){ ?>
                        <?php echo do_shortcode('[gtranslate]', 'beauty-cosmetic-store');?>
                    <?php }?>
                </span>
                <?php if(class_exists('WOOCS')){ ?>
                    <span class="currency">
                        <?php echo do_shortcode('[woocs]');?>
                    </span>
                <?php }?>
    		</div>
 	   	</div>
    </div>
</div>
