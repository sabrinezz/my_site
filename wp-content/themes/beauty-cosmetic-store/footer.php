<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Beauty Cosmetic Store
 */
?>

<footer id="colophon" class="site-footer border-top">
    <div class="container">
    	<div class="footer-column">
    		<?php
		        $beauty_cosmetic_store_count = 0;
		        
		        if ( is_active_sidebar( 'beauty-cosmetic-store-footer1' ) ) {
		            $beauty_cosmetic_store_count++;
		        }
		        if ( is_active_sidebar( 'beauty-cosmetic-store-footer2' ) ) {
		            $beauty_cosmetic_store_count++;
		        }
		        if ( is_active_sidebar( 'beauty-cosmetic-store-footer3' ) ) {
		            $beauty_cosmetic_store_count++;
		        }
		        // $beauty_cosmetic_store_count == 0 none
		        if ( $beauty_cosmetic_store_count == 1 ) {
		            $beauty_cosmetic_store_colmd = 'col-md-12 col-sm-12';
		        } elseif ( $beauty_cosmetic_store_count == 2 ) {
		            $beauty_cosmetic_store_colmd = 'col-md-6 col-sm-6';
		        } else {
		            $beauty_cosmetic_store_colmd = 'col-md-4 col-sm-4';
		        }
      		?>
	      	<div class="row">
		        <div class="<?php if ( !is_active_sidebar( 'beauty-cosmetic-store-footer1' ) ){ echo "footer_hide"; }else{ echo "$beauty_cosmetic_store_colmd"; } ?> col-xs-12 footer-block">
		          <?php dynamic_sidebar('beauty-cosmetic-store-footer1'); ?>
		        </div>
		        <div class="<?php if ( is_active_sidebar( 'beauty-cosmetic-store-footer2' ) ){ echo "$beauty_cosmetic_store_colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 footer-block">
		            <?php dynamic_sidebar('beauty-cosmetic-store-footer2'); ?>
		        </div>
		        <div class="<?php if ( is_active_sidebar( 'beauty-cosmetic-store-footer3' ) ){ echo "$beauty_cosmetic_store_colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 col-xs-12 footer-block">
		            <?php dynamic_sidebar('beauty-cosmetic-store-footer3'); ?>
		        </div>
	      	</div>
		</div>
    	<?php if (get_theme_mod('beauty_cosmetic_store_show_hide_copyright', true)) {?>
	        <div class="site-info">
	            <div class="footer-menu-left text-center">
	            	<?php  if( ! get_theme_mod('beauty_cosmetic_store_footer_text_setting') ){ ?>
					    <a target="_blank" href="<?php echo esc_url('https://wordpress.org/', 'beauty-cosmetic-store' ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'beauty-cosmetic-store' ), 'WordPress' );
							?>
					    </a>
					    <span class="sep mr-1"> | </span>

					    <span>
			              	<?php
			                /* translators: 1: Theme name,  */
			                printf( esc_html__( ' %1$s ', 'beauty-cosmetic-store' ),'Cosmetic Store WordPress Theme' );
			              	?>
				          	<?php
				              /* translators: 1: Theme author. */
				              printf( esc_html__( 'by %1$s.', 'beauty-cosmetic-store' ),'TheMagnifico'  );
				            ?>
	        			</span>
					<?php }?>
					<?php echo esc_html(get_theme_mod('beauty_cosmetic_store_footer_text_setting')); ?>
	            </div>
	        </div>
		<?php } ?>
	    <?php if(get_theme_mod('beauty_cosmetic_store_scroll_hide','')){ ?>
	    	<a id="button"><?php esc_html_e('TOP','beauty-cosmetic-store'); ?></a>
	    <?php } ?>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>