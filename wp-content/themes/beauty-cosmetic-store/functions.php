<?php
/**
 * Beauty Cosmetic Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Beauty Cosmetic Store
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Beauty_Cosmetic_Store_Loader.php' );

$Beauty_Cosmetic_Store_Loader = new \WPTRT\Autoload\Beauty_Cosmetic_Store_Loader();

$Beauty_Cosmetic_Store_Loader->beauty_cosmetic_store_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Beauty_Cosmetic_Store_Loader->beauty_cosmetic_store_register();

if ( ! function_exists( 'beauty_cosmetic_store_setup' ) ) :

	function beauty_cosmetic_store_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'beauty-cosmetic-store', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_image_size('beauty-cosmetic-store-featured-header-image', 2000, 660, true);

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','beauty-cosmetic-store' ),
        ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'beauty_cosmetic_store_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 200,
			'width'       => 200,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_beauty_cosmetic_store_dismissable_notice', 'beauty_cosmetic_store_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'beauty_cosmetic_store_setup' );


function beauty_cosmetic_store_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'beauty_cosmetic_store_content_width', 1170 );
}
add_action( 'after_setup_theme', 'beauty_cosmetic_store_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function beauty_cosmetic_store_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'beauty-cosmetic-store' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'beauty-cosmetic-store' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'beauty-cosmetic-store' ),
		'id'            => 'beauty-cosmetic-store-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'beauty-cosmetic-store' ),
		'id'            => 'beauty-cosmetic-store-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'beauty-cosmetic-store' ),
		'id'            => 'beauty-cosmetic-store-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'beauty_cosmetic_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function beauty_cosmetic_store_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'inter',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);
	
	wp_enqueue_style(
		'elsie',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Elsie:wght@400;900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'beauty-cosmetic-store-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'beauty-cosmetic-store-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'beauty-cosmetic-store-style',$beauty_cosmetic_store_theme_css );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('beauty-cosmetic-store-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beauty_cosmetic_store_scripts' );

/**
 * Enqueue Preloader.
 */
function beauty_cosmetic_store_preloader() {

  $beauty_cosmetic_store_theme_color_css = '';
  $beauty_cosmetic_store_preloader_bg_color = get_theme_mod('beauty_cosmetic_store_preloader_bg_color');
  $beauty_cosmetic_store_preloader_dot_1_color = get_theme_mod('beauty_cosmetic_store_preloader_dot_1_color');
  $beauty_cosmetic_store_preloader_dot_2_color = get_theme_mod('beauty_cosmetic_store_preloader_dot_2_color');
  $beauty_cosmetic_store_logo_max_height = get_theme_mod('beauty_cosmetic_store_logo_max_height');

  	if(get_theme_mod('beauty_cosmetic_store_logo_max_height') == '') {
		$beauty_cosmetic_store_logo_max_height = '200';
	}

	if(get_theme_mod('beauty_cosmetic_store_preloader_bg_color') == '') {
		$beauty_cosmetic_store_preloader_bg_color = '#FF5894';
	}
	if(get_theme_mod('beauty_cosmetic_store_preloader_dot_1_color') == '') {
		$beauty_cosmetic_store_preloader_dot_1_color = '#ffffff';
	}
	if(get_theme_mod('beauty_cosmetic_store_preloader_dot_2_color') == '') {
		$beauty_cosmetic_store_preloader_dot_2_color = '#000000';
	}
	$beauty_cosmetic_store_theme_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($beauty_cosmetic_store_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($beauty_cosmetic_store_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($beauty_cosmetic_store_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($beauty_cosmetic_store_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'beauty-cosmetic-store-style',$beauty_cosmetic_store_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'beauty_cosmetic_store_preloader' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * TGM
 */
require get_template_directory() . '/inc/tgm.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

function beauty_cosmetic_store_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function beauty_cosmetic_store_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function beauty_cosmetic_store_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/*dropdown page sanitization*/
function beauty_cosmetic_store_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function beauty_cosmetic_store_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function beauty_cosmetic_store_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'beauty_cosmetic_store_loop_columns');
if (!function_exists('beauty_cosmetic_store_loop_columns')) {
	function beauty_cosmetic_store_loop_columns() {
		$columns = get_theme_mod( 'beauty_cosmetic_store_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

function beauty_cosmetic_store_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'pro_version_footer_setting' );
    $wp_customize->remove_control( 'pro_version_footer_setting' );

}
add_action( 'customize_register', 'beauty_cosmetic_store_remove_customize_register', 11 );

/**
 * Get CSS
 */

function beauty_cosmetic_store_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
   	wp_localize_script('admin-notice-script','beauty_cosmetic_store',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('beauty_cosmetic_store_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'beauty_cosmetic_store_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_beauty-cosmetic-store-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'beauty-cosmetic-store-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'beauty_cosmetic_store_getpage_css' );

if ( ! defined( 'BEAUTY_COSMERTIC_STORE_CONTACT_SUPPORT' ) ) {
define('BEAUTY_COSMERTIC_STORE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/beauty-cosmetic-store/','beauty-cosmetic-store'));
}
if ( ! defined( 'BEAUTY_COSMERTIC_STORE_REVIEW' ) ) {
define('BEAUTY_COSMERTIC_STORE_REVIEW',__('https://wordpress.org/support/theme/beauty-cosmetic-store/reviews/','beauty-cosmetic-store'));
}
if ( ! defined( 'BEAUTY_COSMERTIC_STORE_LIVE_DEMO' ) ) {
define('BEAUTY_COSMERTIC_STORE_LIVE_DEMO',__('https://demo.themagnifico.net/beauty-cosmetic-store/','beauty-cosmetic-store'));
}
if ( ! defined( 'BEAUTY_COSMERTIC_STORE_GET_PREMIUM_PRO' ) ) {
define('BEAUTY_COSMERTIC_STORE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/cosmetic-store-wordpress-theme','beauty-cosmetic-store'));
}
if ( ! defined( 'BEAUTY_COSMERTIC_STORE_PRO_DOC' ) ) {
define('BEAUTY_COSMERTIC_STORE_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/beauty-cosmetic-store-pro-doc/','beauty-cosmetic-store'));
}
if ( ! defined( 'BEAUTY_COSMERTIC_STORE_FREE_DOC' ) ) {
define('BEAUTY_COSMERTIC_STORE_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/beauty-cosmetic-store-free-doc/','beauty-cosmetic-store'));
}

add_action('admin_menu', 'beauty_cosmetic_store_themepage');
function beauty_cosmetic_store_themepage(){

	$beauty_cosmetic_store_theme_test = wp_get_theme();

	$beauty_cosmetic_store_theme_info = add_theme_page( __('Theme Options','beauty-cosmetic-store'), __(' Theme Options','beauty-cosmetic-store'), 'manage_options', 'beauty-cosmetic-store-info.php', 'beauty_cosmetic_store_info_page' );
}

function beauty_cosmetic_store_info_page() {
	$beauty_cosmetic_store_theme_user = wp_get_current_user();
	$beauty_cosmetic_store_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap beauty-cosmetic-store-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','beauty-cosmetic-store'); ?><?php echo esc_html( $beauty_cosmetic_store_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "beauty-cosmetic-store"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Beauty Cosmetic Store , feel free to contact us for any support regarding our theme.", "beauty-cosmetic-store"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( BEAUTY_COSMERTIC_STORE_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "beauty-cosmetic-store"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "beauty-cosmetic-store"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "beauty-cosmetic-store"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( BEAUTY_COSMERTIC_STORE_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "beauty-cosmetic-store"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "beauty-cosmetic-store"); ?></h3>
						<p><?php esc_html_e("If You love Beauty Cosmetic Store theme then we would appreciate your review about our theme.", "beauty-cosmetic-store"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( BEAUTY_COSMERTIC_STORE_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "beauty-cosmetic-store"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "beauty-cosmetic-store"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "beauty-cosmetic-store"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( BEAUTY_COSMERTIC_STORE_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Free Documentation", "beauty-cosmetic-store"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","beauty-cosmetic-store"); ?></h2>
		<div class="beauty-cosmetic-store-button-container">
			<a target="_blank" href="<?php echo esc_url( BEAUTY_COSMERTIC_STORE_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "beauty-cosmetic-store"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( BEAUTY_COSMERTIC_STORE_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "beauty-cosmetic-store"); ?>
			</a>
		</div>

		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "beauty-cosmetic-store"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "beauty-cosmetic-store"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "beauty-cosmetic-store"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "beauty-cosmetic-store"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "beauty-cosmetic-store"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "beauty-cosmetic-store"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "beauty-cosmetic-store"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="beauty-cosmetic-store-button-container">
			<a target="_blank" href="<?php echo esc_url( BEAUTY_COSMERTIC_STORE_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "beauty-cosmetic-store"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function beauty_cosmetic_store_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'beauty_cosmetic_store_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}
add_action( 'wp_ajax_beauty_cosmetic_store_dismissed_notice_handler', 'beauty_cosmetic_store_ajax_notice_handler' );

function beauty_cosmetic_store_deprecated_hook_admin_notice() {

    $beauty_cosmetic_store_dismissed = get_user_meta(get_current_user_id(), 'beauty_cosmetic_store_dismissable_notice', true);
    if ( !$beauty_cosmetic_store_dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'beauty-cosmetic-store'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'beauty-cosmetic-store'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=beauty-cosmetic-store-info.php' )); ?>"><?php esc_html_e( 'Get started', 'beauty-cosmetic-store' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( BEAUTY_COSMERTIC_STORE_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'beauty-cosmetic-store' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( BEAUTY_COSMERTIC_STORE_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'beauty-cosmetic-store' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'beauty_cosmetic_store_deprecated_hook_admin_notice' );

function beauty_cosmetic_store_switch_theme() {
    delete_user_meta(get_current_user_id(), 'beauty_cosmetic_store_dismissable_notice');
}
add_action('after_switch_theme', 'beauty_cosmetic_store_switch_theme');
function beauty_cosmetic_store_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'beauty_cosmetic_store_dismissable_notice', true);
    die();
}