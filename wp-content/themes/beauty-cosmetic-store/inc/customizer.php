<?php
/**
 * Beauty Cosmetic Store Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Beauty Cosmetic Store
 */

if ( ! defined( 'BEAUTY_COSMERTIC_STORE_URL' ) ) {
    define( 'BEAUTY_COSMERTIC_STORE_URL', esc_url( 'https://www.themagnifico.net/products/cosmetic-store-wordpress-theme', 'beauty-cosmetic-store') );
}
if ( ! defined( 'BEAUTY_COSMERTIC_STORE_TEXT' ) ) {
    define( 'BEAUTY_COSMERTIC_STORE_TEXT', __( 'Beauty Cosmetic Store Pro','beauty-cosmetic-store' ));
}
if ( ! defined( 'BEAUTY_COSMERTIC_STORE_BUY_TEXT' ) ) {
    define( 'BEAUTY_COSMERTIC_STORE_BUY_TEXT', __( 'Buy Beauty Cosmetic Store Pro','beauty-cosmetic-store' ));
}

use WPTRT\Customize\Section\Beauty_Cosmetic_Store_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Beauty_Cosmetic_Store_Button::class );

    $manager->add_section(
        new Beauty_Cosmetic_Store_Button( $manager, 'beauty_cosmetic_store_pro', [
            'title'       => esc_html( BEAUTY_COSMERTIC_STORE_TEXT,'beauty-cosmetic-store' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'beauty-cosmetic-store' ),
            'button_url'  => esc_url( BEAUTY_COSMERTIC_STORE_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'beauty-cosmetic-store-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'beauty-cosmetic-store-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function beauty_cosmetic_store_customize_register($wp_customize){

    // Pro Version
    class Beauty_Cosmetic_Store_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( BEAUTY_COSMERTIC_STORE_BUY_TEXT,'beauty-cosmetic-store' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Beauty_Cosmetic_Store_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('beauty_cosmetic_store_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'beauty_cosmetic_store_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'beauty-cosmetic-store' ),
        'section'        => 'title_tagline',
        'settings'       => 'beauty_cosmetic_store_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('beauty_cosmetic_store_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'beauty_cosmetic_store_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'beauty-cosmetic-store' ),
        'section'        => 'title_tagline',
        'settings'       => 'beauty_cosmetic_store_theme_description',
        'type'           => 'checkbox',
    )));

    //Logo
    $wp_customize->add_setting('beauty_cosmetic_store_logo_max_height',array(
        'default'   => '200',
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_number_absint'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_logo_max_height',array(
        'label' => esc_html__('Logo Width','beauty-cosmetic-store'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // General Settings
     $wp_customize->add_section('beauty_cosmetic_store_general_settings',array(
        'title' => esc_html__('General Settings','beauty-cosmetic-store'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'beauty_cosmetic_store_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'beauty-cosmetic-store' ),
        'section'        => 'beauty_cosmetic_store_general_settings',
        'settings'       => 'beauty_cosmetic_store_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'beauty_cosmetic_store_preloader_bg_color', array(
        'default' => '#FF5894',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'beauty_cosmetic_store_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_general_settings',
        'settings' => 'beauty_cosmetic_store_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'beauty_cosmetic_store_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'beauty_cosmetic_store_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_general_settings',
        'settings' => 'beauty_cosmetic_store_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'beauty_cosmetic_store_preloader_dot_2_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'beauty_cosmetic_store_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_general_settings',
        'settings' => 'beauty_cosmetic_store_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('beauty_cosmetic_store_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'beauty_cosmetic_store_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'beauty-cosmetic-store' ),
        'section'        => 'beauty_cosmetic_store_general_settings',
        'settings'       => 'beauty_cosmetic_store_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('beauty_cosmetic_store_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_choices'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'beauty_cosmetic_store_general_settings',
        'choices' => array(
            'Right' => __('Right','beauty-cosmetic-store'),
            'Left' => __('Left','beauty-cosmetic-store'),
            'Center' => __('Center','beauty-cosmetic-store')
        ),
    ) );

    // Product Columns
    $wp_customize->add_setting( 'beauty_cosmetic_store_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'beauty_cosmetic_store_sanitize_select',
    ) );

    $wp_customize->add_control('beauty_cosmetic_store_products_per_row', array(
       'label' => __( 'Product per row', 'beauty-cosmetic-store' ),
       'section'  => 'beauty_cosmetic_store_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    //Social Icon Section
    $wp_customize->add_section('beauty_cosmetic_store_social_icons',array(
        'title' => esc_html__('Social Icons','beauty-cosmetic-store')
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_facebook_icon',array(
        'label' => esc_html__('Facebook Icon ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_social_icons',
        'setting' => 'beauty_cosmetic_store_facebook_icon',
        'type'  => 'text',
        'default' => 'fab fa-facebook-f',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','beauty-cosmetic-store')
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_facebook_url' ,array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_facebook_url' ,array(
        'label' => esc_html__('Facebook Link ','beauty-cosmetic-store') ,
        'section' => 'beauty_cosmetic_store_social_icons',
        'setting' => 'beauty_cosmetic_store_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_twitter_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_twitter_icon' ,array(
        'label' => esc_html__('Twitter Icon ','beauty-cosmetic-store') ,
        'section' => 'beauty_cosmetic_store_social_icons',
        'setting' => 'beauty_cosmetic_store_twitter_icon',
        'type'  => 'text',
        'default' => 'fab fa-twitter',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-twitter','beauty-cosmetic-store')
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_twitter_url',array(
        'label' => esc_html__('Twitter Link ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_social_icons',
        'setting' => 'beauty_cosmetic_store_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_intagram_icon' ,array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_intagram_icon',array(
        'label' => esc_html__('Intagram Icon ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_social_icons',
        'setting' => 'beauty_cosmetic_store_intagram_icon',
        'type'  => 'text',
        'default' => 'fab fa-instagram',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','beauty-cosmetic-store')
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_intagram_url' ,array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_intagram_url' ,array(
        'label' => esc_html__('Intagram Link ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_social_icons',
        'setting' => 'beauty_cosmetic_store_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_linkedin_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_linkedin_icon',array(
        'label' => esc_html__('Linkedin Icon ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_social_icons',
        'setting' => 'beauty_cosmetic_store_linkedin_icon',
        'type'  => 'text',
        'default' => 'fab fa-linkedin-in',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-linkedin-in','beauty-cosmetic-store')
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_linkedin_url',array(
        'label' => esc_html__('Linkedin Link ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_social_icons',
        'setting' => 'beauty_cosmetic_store_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_pintrest_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_pintrest_icon',array(
        'label' => esc_html__('Pinterest Icon ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_social_icons',
        'setting' => 'beauty_cosmetic_store_pintrest_icon',
        'type'  => 'text',
        'default' => 'fab fa-pinterest-p',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-pinterest-p','beauty-cosmetic-store')
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_pintrest_url',array(
        'label' => esc_html__('Pinterest Link ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_social_icons',
        'setting' => 'beauty_cosmetic_store_pintrest_url',
        'type'  => 'url'
    ));  

    //Top Header
    $wp_customize->add_section('beauty_cosmetic_store_top_header',array(
        'title' => esc_html__('Top Header Option','beauty-cosmetic-store')
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_topbar_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_topbar_text',array(
        'label' => esc_html__('Topbar Text','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_header',
        'setting' => 'beauty_cosmetic_store_topbar_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_topbar_text_button_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_topbar_text_button_url',array(
        'label' => esc_html__('Topbar Button Url ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_header',
        'setting' => 'beauty_cosmetic_store_topbar_text_button_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_phone_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_phone_text',array(
        'label' => esc_html__('Phone Text','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_header',
        'setting' => 'beauty_cosmetic_store_phone_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_phone_number',array(
        'default' => '',
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_phone_number'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_phone_number',array(
        'label' => esc_html__('Phone Number','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_header',
        'setting' => 'beauty_cosmetic_store_phone_number',
        'type'  => 'text'
    ));

    // Header
    $wp_customize->add_section('beauty_cosmetic_store_header',array(
        'title' => esc_html__('Header Option','beauty-cosmetic-store')
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_header_sell_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_header_sell_button',array(
        'label' => esc_html__('Sell Button Text','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_header',
        'setting' => 'beauty_cosmetic_store_header_sell_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_header_sell_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_header_sell_button_url',array(
        'label' => esc_html__('Sell Button url','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_header',
        'setting' => 'beauty_cosmetic_store_header_sell_button_url',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_header_tracking_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_header_tracking_button',array(
        'label' => esc_html__('Tracking Button Text','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_header',
        'setting' => 'beauty_cosmetic_store_header_tracking_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_header_tracking_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_header_tracking_button_url',array(
        'label' => esc_html__('Tracking Button url','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_header',
        'setting' => 'beauty_cosmetic_store_header_tracking_button_url',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_header_recent_view_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_header_recent_view_button',array(
        'label' => esc_html__('Viewed Button Text','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_header',
        'setting' => 'beauty_cosmetic_store_header_recent_view_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_header_recent_view_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_header_recent_view_url',array(
        'label' => esc_html__('Viewed Button url','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_header',
        'setting' => 'beauty_cosmetic_store_header_recent_view_url',
        'type'  => 'text'
    ));

    // Popular Categories
    $wp_customize->add_section('beauty_cosmetic_store_services_section',array(
        'title' => esc_html__('Popular Categories Option','beauty-cosmetic-store'),
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_activities_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'beauty_cosmetic_store_activities_section_setting',array(
        'label'          => __( 'Show Popular Categories', 'beauty-cosmetic-store' ),
        'section'        => 'beauty_cosmetic_store_services_section',
        'settings'       => 'beauty_cosmetic_store_activities_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('beauty_cosmetic_store_services_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_services_heading',array(
        'label' => esc_html__('Short Heading','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_services_section',
        'setting' => 'beauty_cosmetic_store_services_heading',
        'type'  => 'text'
    ));

    //Slider
    $wp_customize->add_section('beauty_cosmetic_store_top_slider',array(
        'title' => esc_html__('Slider Settings','beauty-cosmetic-store'),
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_slider_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'beauty_cosmetic_store_slider_section_setting',array(
        'label'          => __( 'Show Slider', 'beauty-cosmetic-store' ),
        'section'        => 'beauty_cosmetic_store_top_slider',
        'settings'       => 'beauty_cosmetic_store_slider_section_setting',
        'type'           => 'checkbox',
    )));

    for ( $beauty_cosmetic_store_count = 1; $beauty_cosmetic_store_count <= 3; $beauty_cosmetic_store_count++ ) {

        $wp_customize->add_setting( 'beauty_cosmetic_store_top_slider_page' . $beauty_cosmetic_store_count, array(
            'default'           => '',
            'sanitize_callback' => 'beauty_cosmetic_store_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'beauty_cosmetic_store_top_slider_page' . $beauty_cosmetic_store_count, array(
            'label'    => __( 'Select Slide Page', 'beauty-cosmetic-store' ),
            'section'  => 'beauty_cosmetic_store_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_1_image',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( 
    $wp_customize,'beauty_cosmetic_store_image_box_1_image',array(
        'label' => __('Box 1 Image ','beauty-cosmetic-store'),
        'description' => __('Dimension 500 x 350 ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'settings' => 'beauty_cosmetic_store_image_box_1_image',
    )));

    $wp_customize->add_setting('beauty_cosmetic_store_contact_image_box_1_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_contact_image_box_1_heading',array(
        'label' => __('Box 1 Heading','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_contact_image_box_1_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_1_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_image_box_1_content',array(
        'label' => __('Box 1 Text','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_image_box_1_content',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_1_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_image_box_1_button_url',array(
        'label' => __('Box 1 Button Url','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_image_box_1_button_url',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_2_image',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( 
    $wp_customize,'beauty_cosmetic_store_image_box_2_image',array(
        'label' => __('Box 2 Image ','beauty-cosmetic-store'),
        'description' => __('Dimension 500 x 350 ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'settings' => 'beauty_cosmetic_store_image_box_2_image',
    )));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_2_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_image_box_2_heading',array(
        'label' => __('Box 2 Heading','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_image_box_2_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_2_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_image_box_2_content',array(
        'label' => __('Box 2 Text','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_image_box_2_content',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_2_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_image_box_2_button_url',array(
        'label' => __('Box 1 Button Url','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_image_box_2_button_url',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_3_image',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( 
    $wp_customize,'beauty_cosmetic_store_image_box_3_image',array(
        'label' => __('Box 3 Image ','beauty-cosmetic-store'),
        'description' => __('Dimension 500 x 350 ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'settings' => 'beauty_cosmetic_store_image_box_3_image',
    )));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_3_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_image_box_3_heading',array(
        'label' => __('Box 3 Heading','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_image_box_3_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_3_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_image_box_3_content',array(
        'label' => __('Box 3 Text','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_image_box_3_content',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_4_image',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( 
    $wp_customize,'beauty_cosmetic_store_image_box_4_image',array(
        'label' => __('Box 4 Image ','beauty-cosmetic-store'),
        'description' => __('Dimension 500 x 350 ','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'settings' => 'beauty_cosmetic_store_image_box_4_image',
    )));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_4_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_image_box_4_heading',array(
        'label' => __('Box 4 Heading','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_image_box_4_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_4_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_image_box_4_content',array(
        'label' => __('Box 4 Text','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_image_box_4_content',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_image_box_4_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_image_box_4_button_url',array(
        'label' => __('Box 4 Button Url','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_top_slider',
        'setting' => 'beauty_cosmetic_store_image_box_4_button_url',
        'type'  => 'text'
    ));

    // Post Settings
     $wp_customize->add_section('beauty_cosmetic_store_post_settings',array(
        'title' => esc_html__('Post Settings','beauty-cosmetic-store'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_post_page_title',array(
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('beauty_cosmetic_store_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'beauty-cosmetic-store'),
        'section'     => 'beauty_cosmetic_store_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'beauty-cosmetic-store'),
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_post_page_meta',array(
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('beauty_cosmetic_store_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'beauty-cosmetic-store'),
        'section'     => 'beauty_cosmetic_store_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'beauty-cosmetic-store'),
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_post_page_thumb',array(
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('beauty_cosmetic_store_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'beauty-cosmetic-store'),
        'section'     => 'beauty_cosmetic_store_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'beauty-cosmetic-store'),
    ));
    
    // Footer
    $wp_customize->add_section('beauty_cosmetic_store_site_footer_section', array(
        'title' => esc_html__('Footer', 'beauty-cosmetic-store'),
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('beauty_cosmetic_store_footer_text_setting', array(
        'label' => __('Replace the footer text', 'beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('beauty_cosmetic_store_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'beauty_cosmetic_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('beauty_cosmetic_store_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','beauty-cosmetic-store'),
        'section' => 'beauty_cosmetic_store_site_footer_section',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Beauty_Cosmetic_Store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Beauty_Cosmetic_Store_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'beauty_cosmetic_store_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'beauty-cosmetic-store' ),
        'description' => esc_url( BEAUTY_COSMERTIC_STORE_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'beauty_cosmetic_store_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function beauty_cosmetic_store_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function beauty_cosmetic_store_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function beauty_cosmetic_store_customize_preview_js(){
    wp_enqueue_script('beauty-cosmetic-store-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'beauty_cosmetic_store_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function beauty_cosmetic_store_panels_js() {
    wp_enqueue_style( 'beauty-cosmetic-store-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'beauty-cosmetic-store-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'beauty_cosmetic_store_panels_js' );