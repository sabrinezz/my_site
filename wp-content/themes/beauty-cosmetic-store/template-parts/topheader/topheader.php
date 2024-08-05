<?php
/**
 * Displays top header
 *
 * @package Beauty Cosmetic Store
 */
?>

<div class="top-info text-end">
	<div class="container">
		<div class="row top-header">
    		<div class="col-lg-6 col-sm-6 col-12 align-self-center">
    			<?php if ( get_theme_mod('beauty_cosmetic_store_topbar_text') != "" ) {?>
			        <div class="text-start">
			        	<?php if(get_theme_mod('beauty_cosmetic_store_topbar_text_button_url') != ''){ ?>
			            <p class="topbar-text m-0"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_topbar_text')); ?><a href="<?php echo esc_html(get_theme_mod('beauty_cosmetic_store_topbar_text_button_url')); ?>"><?php echo esc_html(' Shop Now','beauty-cosmetic-store'); ?></a></p>
			           		
			        	<?php }?>
			        </div>
		        <?php }?>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-12 align-self-center text-lg-end">
                <div class="social-link">
	                <?php if(get_theme_mod('beauty_cosmetic_store_facebook_url') != ''){ ?>
	                    <a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_facebook_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('beauty_cosmetic_store_facebook_icon') ); ?>"></i></a>
	                <?php }?>
	                <?php if(get_theme_mod('beauty_cosmetic_store_twitter_url') != ''){ ?>
	                    <a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_twitter_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('beauty_cosmetic_store_twitter_icon') ); ?>"></i></a>
	                <?php }?>
	                <?php if(get_theme_mod('beauty_cosmetic_store_intagram_url') != ''){ ?>
	                    <a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_intagram_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('beauty_cosmetic_store_intagram_icon') ); ?>"></i></a>
	                <?php }?>
	                <?php if(get_theme_mod('beauty_cosmetic_store_linkedin_url') != ''){ ?>
	                    <a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_linkedin_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('beauty_cosmetic_store_linkedin_icon') ); ?>"></i></a>
	                <?php }?>
	                <?php if(get_theme_mod('beauty_cosmetic_store_pintrest_url') != ''){ ?>
	                    <a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_pintrest_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('beauty_cosmetic_store_pintrest_icon') ); ?>"></i></a>
	                <?php }?>
                </div>
    		</div>
		</div>
	</div>
</div>