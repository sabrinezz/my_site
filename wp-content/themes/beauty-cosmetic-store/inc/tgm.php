<?php

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function beauty_cosmetic_store_register_recommended_plugins() {
	$plugins = array(		
		array(
			'name'             => __( 'FOX - Currency Switcher Professional for WooCommerce', 'beauty-cosmetic-store' ),
			'slug'             => 'woocommerce-currency-switcher',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'GTranslate', 'beauty-cosmetic-store' ),
			'slug'             => 'gtranslate',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'beauty_cosmetic_store_register_recommended_plugins' );