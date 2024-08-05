(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-beauty_cosmetic_store_options-';
		
		// Label
		function beauty_cosmetic_store_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-beauty_cosmetic_store_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'beauty_cosmetic_store_scroll_hide' || id === 'beauty_cosmetic_store_preloader_hide' || id === 'beauty_cosmetic_store_sticky_header' || id === 'beauty_cosmetic_store_products_per_row' || id === 'beauty_cosmetic_store_scroll_top_position' || id === 'beauty_cosmetic_store_products_per_row')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-beauty_cosmetic_store_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'beauty_cosmetic_store_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-beauty_cosmetic_store_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-beauty_cosmetic_store_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'beauty_cosmetic_store_facebook_icon' || id === 'beauty_cosmetic_store_twitter_icon' || id === 'beauty_cosmetic_store_intagram_icon'|| id === 'beauty_cosmetic_store_linkedin_icon'|| id === 'beauty_cosmetic_store_pintrest_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-beauty_cosmetic_store_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'beauty_cosmetic_store_topbar_text' || id === 'beauty_cosmetic_store_phone_text' || id === 'beauty_cosmetic_store_header_sell_button' || id === 'beauty_cosmetic_store_header_tracking_button' || id === 'beauty_cosmetic_store_header_recent_view_button' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-beauty_cosmetic_store_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Slider

			if ( id === 'beauty_cosmetic_store_top_slider_page1' || id === 'beauty_cosmetic_store_image_box_1_image' || id === 'beauty_cosmetic_store_image_box_2_image' || id === 'beauty_cosmetic_store_image_box_3_image' || id === 'beauty_cosmetic_store_image_box_4_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-beauty_cosmetic_store_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Popular Categories

			if ( id === 'beauty_cosmetic_store_activities_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-beauty_cosmetic_store_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'beauty_cosmetic_store_footer_text_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-beauty_cosmetic_store_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		beauty_cosmetic_store_customizer_label( 'custom_logo', 'Logo Setup' );
		beauty_cosmetic_store_customizer_label( 'site_icon', 'Favicon' );

		// General Setting
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_preloader_hide', 'Preloader' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_scroll_hide', 'Scroll To Top' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_scroll_top_position', 'Scroll to top Position' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_products_per_row', 'woocommerce Setting' );

		// Colors
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_theme_color', 'Theme Color' );
		beauty_cosmetic_store_customizer_label( 'background_color', 'Colors' );
		beauty_cosmetic_store_customizer_label( 'background_image', 'Image' );

		//Header Image
		beauty_cosmetic_store_customizer_label( 'header_image', 'Header Image' );

		// Social Icon
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_facebook_icon', 'Facebook' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_twitter_icon', 'Twitter' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_intagram_icon', 'Intagram' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_linkedin_icon', 'Linkedin' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_pintrest_icon', 'Pintrest' );

		// Header
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_topbar_text', 'Topbar Text' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_phone_text', 'Phone' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_header_sell_button', 'Sell Button' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_header_tracking_button', 'Tracking Button' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_header_recent_view_button', 'Viewed Button' );

		//Slider
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_top_slider_page1', 'Slider' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_image_box_1_image', 'Slider Box 1' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_image_box_2_image', 'Slider Box 2' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_image_box_3_image', 'Slider Box 3' );
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_image_box_4_image', 'Slider Box 4' );
		

		//Popular Categories
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_activities_section_setting', 'Popular Categories' );

		//Footer
		beauty_cosmetic_store_customizer_label( 'beauty_cosmetic_store_footer_text_setting', 'Footer' );
	

	});

})( jQuery );
