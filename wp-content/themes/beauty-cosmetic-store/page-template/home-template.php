<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
<?php if (get_theme_mod('beauty_cosmetic_store_activities_section_setting', false) != '') { ?>
  <section class="featured pb-5 pt-4">
    <div class="container">
      <div class="heading text-center mb-4">
        <?php if(get_theme_mod('beauty_cosmetic_store_services_heading') != ''){ ?>
          <h4 class="main-heading mb-3 mt-3"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_services_heading')); ?></h4>
        <?php }?>
        <?php if(get_theme_mod('beauty_cosmetic_store_services_content') != ''){ ?>
          <h3 class="main-heading"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_services_content')); ?></h3>
        <?php }?>
      </div>
      <div class="owl-carousel m-0 ser-box">
        <?php if (class_exists('woocommerce')) { ?>
          <?php
            $beauty_cosmetic_store_prod_categories = get_terms('product_cat', array(
              'orderby'    => 'name',
              'order'      => 'ASC',
              'hide_empty' => 0
            ));
            foreach ($beauty_cosmetic_store_prod_categories as $beauty_cosmetic_store_prod_cat) :
            $beauty_cosmetic_store_cat_thumb_id = get_term_meta($beauty_cosmetic_store_prod_cat->term_id, 'thumbnail_id', true);
            $beauty_cosmetic_store_cat_thumb_url = $beauty_cosmetic_store_cat_thumb_id ? wp_get_attachment_thumb_url($beauty_cosmetic_store_cat_thumb_id) : ''; 
            $beauty_cosmetic_store_term_link = get_term_link($beauty_cosmetic_store_prod_cat, 'product_cat');
          ?>
          <div class="service-box">
              <div class="feature-box m-0">
                <div class="ser-content">
                  <div class="service-icon">
                    <?php if ($beauty_cosmetic_store_cat_thumb_url) : ?>
                      <img src="<?php echo esc_url($beauty_cosmetic_store_cat_thumb_url); ?>" alt="<?php echo esc_html($beauty_cosmetic_store_prod_cat->name); ?>" />
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slider.png" alt="" />
                    <?php endif; ?>
                  </div>
                  <h4 class="mb-0 mt-3"><a href="<?php echo esc_url($beauty_cosmetic_store_term_link); ?>"><?php echo esc_html($beauty_cosmetic_store_prod_cat->name); ?></a></h4>
                </div>
              </div>
            </div>
          <?php endforeach; wp_reset_query(); ?>
        <?php } ?>  
      </div>
    </div>
  </section>
<?php }?>
<?php if (get_theme_mod('beauty_cosmetic_store_slider_section_setting', false) != '') { ?>
<section id="top-slider" class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
          <?php $beauty_cosmetic_store_slide_pages = array();
            for ( $beauty_cosmetic_store_count = 1; $beauty_cosmetic_store_count <= 3; $beauty_cosmetic_store_count++ ) {
              $beauty_cosmetic_store_mod = intval( get_theme_mod( 'beauty_cosmetic_store_top_slider_page' . $beauty_cosmetic_store_count ));
              if ( 'page-none-selected' != $beauty_cosmetic_store_mod ) {
                $beauty_cosmetic_store_slide_pages[] = $beauty_cosmetic_store_mod;
              }
            }
            if( !empty($beauty_cosmetic_store_slide_pages) ) :
              $beauty_cosmetic_store_args = array(
                'post_type' => 'page',
                'post__in' => $beauty_cosmetic_store_slide_pages,
                'orderby' => 'post__in'
              );
              $beauty_cosmetic_store_query = new WP_Query( $beauty_cosmetic_store_args );
              if ( $beauty_cosmetic_store_query->have_posts() ) :
                $i = 1;
          ?>
          <div class="owl-carousel" role="listbox">
            <?php  while ( $beauty_cosmetic_store_query->have_posts() ) : $beauty_cosmetic_store_query->the_post(); ?>
              <div class="slider-box">
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                  } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slider.png" alt="" />
                <?php } ?>
                <div class="slider-inner-box">
                  <h2 class="mb-3"><?php the_title(); ?></h2>
                  <p><?php echo wp_trim_words( get_the_content(), 15 ); ?></p>
                  <div class="slide-btn mt-4"><a href="<?php the_permalink(); ?>"><?php esc_html_e('SHOP NOW','beauty-cosmetic-store'); ?></a></div>
                </div>
              </div>
            <?php $i++; endwhile;
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 right-image-box mb-4">
          <?php if(get_theme_mod('beauty_cosmetic_store_contact_image_box_1_heading') != '' || get_theme_mod('beauty_cosmetic_store_image_box_1_content') != ''){ ?>
            <?php if(get_theme_mod('beauty_cosmetic_store_image_box_1_image') != ''){ ?>
                <img src="<?php echo esc_url( get_theme_mod( 'beauty_cosmetic_store_image_box_1_image' )); ?>" alt="Slider Left Image">
            <?php }?>
            <div class="left-text-box">
              <?php if(get_theme_mod('beauty_cosmetic_store_contact_image_box_1_heading') != ''){ ?>
              <h5 class="left-text-heading "><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_contact_image_box_1_heading')); ?></h5>
              <?php }?>
              <?php if(get_theme_mod('beauty_cosmetic_store_image_box_1_content') != ''){ ?>
              <p class="left-text-content m-0"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_image_box_1_content')); ?></p>
              <?php }?>
            </div>
            <?php if(get_theme_mod('beauty_cosmetic_store_image_box_1_button_url') != ''){ ?>
              <div class="box-btn-1 mt-4">
                <a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_image_box_1_button_url')); ?>"><?php esc_html_e('Discover Now','beauty-cosmetic-store'); ?></a>
              </div>
            <?php }?>
          <?php }?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 right-image-box-2">
          <?php if(get_theme_mod('beauty_cosmetic_store_image_box_2_heading') != '' || get_theme_mod('beauty_cosmetic_store_image_box_2_content') != ''){ ?>
            <?php if(get_theme_mod('beauty_cosmetic_store_image_box_2_image') != ''){ ?>
                <img src="<?php echo esc_url( get_theme_mod( 'beauty_cosmetic_store_image_box_2_image' )); ?>" alt="Slider Left Image">
            <?php }?>
            <div class="left-text-box-2">
              <?php if(get_theme_mod('beauty_cosmetic_store_image_box_2_heading') != ''){ ?>
              <h5 class="left-text-heading "><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_image_box_2_heading')); ?></h5>
              <?php }?>
              <?php if(get_theme_mod('beauty_cosmetic_store_image_box_2_content') != ''){ ?>
              <p class="left-text-content m-0"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_image_box_2_content')); ?></p>
              <?php }?>
              <?php if(get_theme_mod('beauty_cosmetic_store_image_box_2_button_url') != ''){ ?>
                <div class="box-btn-2 mt-4">
                  <a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_image_box_2_button_url')); ?>"><?php esc_html_e('Shop Now','beauty-cosmetic-store'); ?></a>
                </div>
              <?php }?>
            </div>
          <?php }?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 right-image-box-3">
              <?php if(get_theme_mod('beauty_cosmetic_store_image_box_3_heading') != '' || get_theme_mod('beauty_cosmetic_store_image_box_3_content') != ''){ ?>
                <?php if(get_theme_mod('beauty_cosmetic_store_image_box_3_image') != ''){ ?>
                    <img src="<?php echo esc_url( get_theme_mod( 'beauty_cosmetic_store_image_box_3_image' )); ?>" alt="Slider Left Image">
                <?php }?>
                <div class="left-text-box-3">
                  <?php if(get_theme_mod('beauty_cosmetic_store_image_box_3_heading') != ''){ ?>
                  <h5 class="left-text-heading "><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_image_box_3_heading')); ?></h5>
                  <?php }?>
                  <p class="mb-2 static-text"><?php echo esc_html('From','beauty-cosmetic-store'); ?></p>
                  <?php if(get_theme_mod('beauty_cosmetic_store_image_box_3_content') != ''){ ?>
                  <p class="left-text-content m-0"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_image_box_3_content')); ?></p>
                  <?php }?>
                </div>
              <?php }?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 right-image-box-4">
              <?php if(get_theme_mod('beauty_cosmetic_store_image_box_4_heading') != '' || get_theme_mod('beauty_cosmetic_store_image_box_4_content') != ''){ ?>
                <?php if(get_theme_mod('beauty_cosmetic_store_image_box_4_image') != ''){ ?>
                    <img src="<?php echo esc_url( get_theme_mod( 'beauty_cosmetic_store_image_box_4_image' )); ?>" alt="Slider Left Image">
                <?php }?>
                <div class="left-text-box-4">
                  <?php if(get_theme_mod('beauty_cosmetic_store_image_box_4_heading') != ''){ ?>
                  <h5 class="left-text-heading "><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_image_box_4_heading')); ?></h5>
                  <?php }?>
                  <p class="mb-2 static-text"><?php echo esc_html('From','beauty-cosmetic-store'); ?></p>
                  <?php if(get_theme_mod('beauty_cosmetic_store_image_box_4_content') != ''){ ?>
                  <p class="left-text-content m-0"><?php echo esc_html(get_theme_mod('beauty_cosmetic_store_image_box_4_content')); ?></p>
                  <?php }?>
                  <?php if(get_theme_mod('beauty_cosmetic_store_image_box_4_button_url') != ''){ ?>
                    <div class="box-btn-4 mt-4 pt-2">
                      <a href="<?php echo esc_url(get_theme_mod('beauty_cosmetic_store_image_box_4_button_url')); ?>"><?php esc_html_e('Shop Now','beauty-cosmetic-store'); ?></a>
                    </div>
                  <?php }?>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
<?php }?>
</main>

<?php get_footer(); ?>