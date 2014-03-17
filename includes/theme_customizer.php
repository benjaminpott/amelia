<?php

/*
 * last updated: 16/03/2014
 *
 */

// row customizers
function fx_theme_row_customizer( $wp_customize ) {

		$theme_rows = explode( ',', __( get_theme_mod( 'bb_theme_rows' ) ) );
			if ( count( $theme_rows ) != 0 && strlen( $theme_rows[0] ) != 0 ) {
				$priority = 50;
			foreach ( $theme_rows as $rowname ) {

	    // add to row options to customizer
	    $section = 'bb_theme_'.$rowname.'_section';
	    $wp_customize->add_section( 'bb_theme_'.$rowname.'_section' , array(
	      'title'    => ucfirst( $rowname ),
	      'priority' => $priority,
	    ) );
	    // inputs
	    $wp_customize->add_setting( 'bb_theme_'.$rowname.'_show', array( 'default' => '1') );
	    $wp_customize->add_control( 'bb_theme_'.$rowname.'_show', array(
	      'label'    => __( 'Show '.$rowname, 'bb_'),
	      'section'  => 'bb_theme_'.$rowname.'_section',
	      'type'     => 'checkbox',
	      'choices'  => array( '0' => 'Hidden', '1' => 'Full width', '2' => 'Within a row', ),
	      'priority' => 10,
	    ) );
	    $wp_customize->add_setting( 'bb_theme_'.$rowname.'_bg_image', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/'.$rowname.'_bg.png' ) );
	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_'.$rowname.'_bg_image', array(
	      'label'    => __( 'Background Image', 'bb_' ),
	      'section'  => 'bb_theme_'.$rowname.'_section',
	      'priority' => 20,
	    ) ) );
	    $wp_customize->add_setting( 'bb_theme_'.$rowname.'_bg_color', array( 'default' => '#cecece', 'sanitize_callback' => 'sanitize_hex_color', ) );
	    $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_'.$rowname.'_bg_color', array(
	      'label'    => __( 'Background Color', 'bb_' ),
	      'section'  => 'bb_theme_toprow_section',
	      'priority' => 30,
	    ) ) );
	    $wp_customize->add_setting( 'bb_theme_'.$rowname.'_bg_css' );
	    $wp_customize->add_control( 'bb_theme_'.$rowname.'_bg_css', array(
	      'label'    => __( 'CSS', 'bb_' ),
	      'description' => 'excludes color and background image',
	      'section'  => 'bb_theme_'.$rowname.'_section',
	      'type'     => 'text',
	      'priority' => 40,
	    ) );
	    $wp_customize->add_setting( 'bb_theme_'.$rowname.'_min_height', array( 'default' => '100px' ) );
	    $wp_customize->add_control( 'bb_theme_'.$rowname.'_min_height', array(
	      'label'    => __( 'Min Height', 'bb_' ),
	      'section'  => 'bb_theme_'.$rowname.'_section',
	      'type'     => 'text',
	      'priority' => 50,
	    ) );
	    $priority++;
			}
		}
}
add_action( 'customize_register', 'fx_theme_row_customizer'  );

function fx_theme_customizer_options( $wp_customize ) {
	$wp_customize->add_section( 'bb_theme_options_section', array(
		'title' => __( 'Customizer Options', 'bb_' ),
		'description' => '<ol><li>Select your options</li><li>Save and publish</li><li>Reload customizer</li></ol>',
		'priority'  => 30 )
	);
	// inputs
	$wp_customize->add_setting( 'bb_theme_images_section_check' );
	$wp_customize->add_control( 'bb_theme_images_section_check', array( 'type' => 'checkbox', 'label' => 'Logo Customizer', 'section' => 'bb_theme_options_section' ) );
	$wp_customize->add_setting( 'bb_theme_topbar_section_check' );
	$wp_customize->add_control( 'bb_theme_topbar_section_check', array( 'type' => 'checkbox', 'label' => 'Topbar Customizer', 'section' => 'bb_theme_options_section' ) );
	$wp_customize->add_setting( 'bb_theme_pallet_check' );
	$wp_customize->add_control( 'bb_theme_pallet_check', array( 'type' => 'checkbox', 'label' => 'Pallet Customizer', 'section' => 'bb_theme_options_section' ) );
	$wp_customize->add_setting( 'bb_theme_rows' );
	$wp_customize->add_control( 'bb_theme_rows', array(
		'label'    => __( 'fx_theme_row();', 'bb_' ),
		'section'  => 'bb_theme_options_section',
		'type'     => 'text',
		'priority' => 11,
	) );
}
add_action( 'customize_register', 'fx_theme_customizer_options'  );

// http://themefoundation.com/wordpress-theme-customizer/
function fx_theme_customizer( $wp_customize ) {
	if ( __( get_theme_mod( 'bb_theme_images_section_check' ) ) == 1 ) {
		// Key Images (Desktop Logo, Mobile Logo and Favicon)
		$wp_customize->add_section( 'bb_theme_images_section', array(
			'title'     => __( 'Logos', 'bb_' ),
			'priority'  => 30,
		) );
		// inputs
		// large screen
		$wp_customize->add_setting( 'bb_theme_image_logo_large', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/logo_large.png' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_image_logo_large', array(
			'label'    => __( 'Large Screen Logo', 'bb_' ),
			'section'  => 'bb_theme_images_section',
			'priority' => 10,
		) ) );
		$wp_customize->add_setting( 'bb_theme_image_logo_large_width', array( 'default' => '500px' ) );
		$wp_customize->add_control( 'bb_theme_image_logo_large_width', array(
			'label'    => __( 'Logo on large screen width', 'bb_' ),
			'section'  => 'bb_theme_images_section',
			'type'     => 'text',
			'priority' => 11,
		) );
		$wp_customize->add_setting( 'bb_theme_image_logo_large_padding', array( 'default' => '3px' ) );
		$wp_customize->add_control( 'bb_theme_image_logo_large_padding', array(
			'label'    => __( 'Logo on large screen padding', 'bb_' ),
			'section'  => 'bb_theme_images_section',
			'type'     => 'text',
			'priority' => 12,
		) );
		// medium screen
		$wp_customize->add_setting( 'bb_theme_image_logo_medium', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/logo_medium.png' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_image_logo_medium', array(
			'label'    => __( 'Medium Screen Logo', 'bb_' ),
			'section'  => 'bb_theme_images_section',
			'priority' => 20,
		) ) );
		$wp_customize->add_setting( 'bb_theme_image_logo_medium_width', array( 'default' => '400px' ) );
		$wp_customize->add_control( 'bb_theme_image_logo_medium_width', array(
			'label'    => __( 'Logo on medium screen width', 'bb_' ),
			'section'  => 'bb_theme_images_section',
			'type'     => 'text',
			'priority' => 21,
		) );
		$wp_customize->add_setting( 'bb_theme_image_logo_medium_padding', array( 'default' => '3px' ) );
		$wp_customize->add_control( 'bb_theme_image_logo_medium_padding', array(
			'label'    => __( 'Logo on medium screen padding', 'bb_' ),
			'section'  => 'bb_theme_images_section',
			'type'     => 'text',
			'priority' => 22,
		) );
		// small screen
		$wp_customize->add_setting( 'bb_theme_image_logo_small', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/logo_small.png' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_image_logo_small', array(
			'label'    => __( 'Small Screen Logo', 'bb_' ),
			'section'  => 'bb_theme_images_section',
			'priority' => 30,
		) ) );
		$wp_customize->add_setting( 'bb_theme_image_logo_small_width', array( 'default' => '900px' ) );
		$wp_customize->add_control( 'bb_theme_image_logo_small_width', array(
			'label'    => __( 'Logo on small screen width', 'bb_' ),
			'section'  => 'bb_theme_images_section',
			'type'     => 'text',
			'priority' => 31,
		) );
		$wp_customize->add_setting( 'bb_theme_image_logo_small_padding', array( 'default' => '3px' ) );
		$wp_customize->add_control( 'bb_theme_image_logo_small_padding', array(
			'label'    => __( 'Logo on small screen padding', 'bb_' ),
			'section'  => 'bb_theme_images_section',
			'type'     => 'text',
			'priority' => 32,
		) );
		// favicon
		$wp_customize->add_setting( 'bb_theme_image_favicon', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/favicon.png' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_image_favicon', array(
			'label'   	=> __( 'Favicon', 'bb_' ),
			'section'  => 'bb_theme_images_section',
			'priority' => 40,
		) ) );
	}

	// Topbar
	if ( __( get_theme_mod( 'bb_theme_topbar_section_check' ) ) == 1 ) {
		$wp_customize->add_section( 'bb_theme_topbar_section', array(
			'title'    => 'Topbar',
			'priority' => 42,
		) );
		// inputs
		$wp_customize->add_setting( 'bb_theme_topbar_show', array( 'default' => '1') );
		$wp_customize->add_control( 'bb_theme_topbar_show', array(
			'label'    => 'Show Topbar',
			'section'  => 'bb_theme_topbar_section',
			'type'     => 'radio',
			'choices'  => array( '0' => 'Hidden', '1' => 'Full width', '2' => 'Within a row', ),
			'priority' => 10,
		) );
		$wp_customize->add_setting( 'bb_theme_topbar_title', array( 'default' => 'Menu' ) );
		$wp_customize->add_control( 'bb_theme_topbar_title', array(
			'label'    => __( 'Mobile Menu Title', 'bb_' ),
			'section'  => 'bb_theme_topbar_section',
			'type'     => 'text',
			'priority' => 20,
		) );
		$wp_customize->add_setting( 'bb_theme_topbar_bg_color', array( 'default' => '#000000', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_topbar_bg_color', array(
			'label'    => __( 'Topbar Color', 'bb_' ),
			'section'  => 'bb_theme_topbar_section',
			'priority' => 30,
		) ) );
		$wp_customize->add_setting( 'bb_theme_topbar_bg_color_hover', array( 'default' => '#111111', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_topbar_bg_color_hover', array(
			'label'    => __( 'Topbar Hover Color', 'bb_' ),
			'section'  => 'bb_theme_topbar_section',
			'priority' => 40,
		) ) );
		$wp_customize->add_setting( 'bb_theme_topbar_font_color', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_topbar_font_color', array(
			'label'    => __( 'Topbar Font Color', 'bb_' ),
			'section'  => 'bb_theme_topbar_section',
			'priority' => 50,
		) ) );
		$wp_customize->add_setting( 'bb_theme_topbar_font_color_hover', array( 'default' => '#EEEEEE', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_topbar_font_color_hover', array(
			'label'    => __( 'Topbar Font Hover Color', 'bb_' ),
			'section'  => 'bb_theme_topbar_section',
			'priority' => 60,
		) ) );
		$wp_customize->add_setting( 'bb_theme_topbar_divide_color', array( 'default' => '#EEEEEE', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_topbar_divide_color', array(
			'label'    => __( 'Topbar Divider Color', 'bb_' ),
			'section'  => 'bb_theme_topbar_section',
			'priority' => 70,
		) ) );
			$wp_customize->add_setting( 'bb_theme_topbar_pages', array( 'default' => '1') );
		$wp_customize->add_control( 'bb_theme_topbar_pages', array(
			'label'    => 'Page Menu',
			'section'  => 'bb_theme_topbar_section',
			'type'     => 'radio',
			'choices'  => array( '1' => 'Left', '0' => 'Hidden' ),
			'priority' => 10,
		) );
	}

	// color pallert
	if ( __( get_theme_mod( 'bb_theme_pallet_check' ) ) == 1 ) {
		// Pallet Primary
		$wp_customize->add_section( 'bb_theme_pallet1', array(
			'title'    => 'Primary Colors',
			'priority' => 50,
		) );
		// inputs
		$wp_customize->add_setting( 'bb_theme_color1', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color1', array(
			'label'    => __( 'Primary Color', 'bb_' ),
			'section'  => 'bb_theme_pallet1',
			'priority' => 10,
		) ) );
		$wp_customize->add_setting( 'bb_theme_color1_highlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color1_highlight', array(
			'label'    => __( 'Primary Color (highlight)', 'bb_' ),
			'section'  => 'bb_theme_pallet1',
			'priority' => 20,
		) ) );
		$wp_customize->add_setting( 'bb_theme_color1_lowlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color1_lowlight', array(
			'label'    => __( 'Primary Color (lowlight)', 'bb_' ),
			'section'  => 'bb_theme_pallet1',
			'priority' => 30,
		) ) );

	// Pallet Secondary
		$wp_customize->add_section( 'bb_theme_pallet2', array(
			'title'    => 'Secondary Colors',
			'priority' => 51,
		) );
		// inputs
		$wp_customize->add_setting( 'bb_theme_color2', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color2', array(
			'label'    => __( 'Secondary Color', 'bb_' ),
			'section'  => 'bb_theme_pallet2',
			'priority' => 10,
		) ) );
		$wp_customize->add_setting( 'bb_theme_color2_highlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color2_highlight', array(
			'label'    => __( 'Secondary Color (highlight)', 'bb_' ),
			'section'  => 'bb_theme_pallet2',
			'priority' => 20,
		) ) );
		$wp_customize->add_setting( 'bb_theme_color2_lowlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color2_lowlight', array(
			'label'    => __( 'Secondary Color (lowlight)', 'bb_' ),
			'section'  => 'bb_theme_pallet2',
			'priority' => 30,
		) ) );

	// Pallet Teritary
		$wp_customize->add_section( 'bb_theme_pallet3', array(
			'title'    => 'Tertiary  Colors',
			'priority' => 52,
		) );
		// inputs
		$wp_customize->add_setting( 'bb_theme_color3', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color3', array(
			'label'    => __( 'Tertiary Color', 'bb_' ),
			'section'  => 'bb_theme_pallet3',
			'priority' => 10,
		) ) );
		$wp_customize->add_setting( 'bb_theme_color3_highlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color3_highlight', array(
			'label'    => __( 'Tertiary Color (highlight)', 'bb_' ),
			'section'  => 'bb_theme_pallet3',
			'priority' => 20,
		) ) );
		$wp_customize->add_setting( 'bb_theme_color3_lowlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color3_lowlight', array(
			'label'    => __( 'Tertiary Color (lowlight)', 'bb_' ),
			'section'  => 'bb_theme_pallet3',
			'priority' => 30,
		) ) );
	}

// Contact Details
	$wp_customize->add_section( 'bb_theme_contacts_section', array(
		'title'    => 'Contact Details',
		'priority' => 60,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_contact_email' );
	$wp_customize->add_control( 'bb_theme_contact_email', array(
		'label'    => __( 'Email Address', 'bb_' ),
		'section'  => 'bb_theme_contacts_section',
		'type'     => 'text',
		'priority' => 10,
	) );
	$wp_customize->add_setting( 'bb_theme_contact_phone' );
	$wp_customize->add_control( 'bb_theme_contact_phone', array(
		'label'    => __( 'Phone Number', 'bb_' ),
		'section'  => 'bb_theme_contacts_section',
		'type'     => 'text',
		'priority' => 20,
	) );
	$wp_customize->add_setting( 'bb_theme_contact_position', array( 'default' => 'right') );
	$wp_customize->add_control( 'bb_theme_contact_position', array(
		'label'    => 'Contact Menu',
		'section'  => 'bb_theme_contacts_section',
		'type'     => 'radio',
		'choices'  => array( 'left' => 'Left', 'right' => 'Right', 'hidden' => 'Hidden', ),
		'priority' => 10,
	) );

// Copyright
	$wp_customize->add_section( 'bb_theme_copyright_section', array(
		'title'    => 'Copyright Statement',
		'priority' => 61,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_copyright', array( 'default' => 'Default copyright text' ) );
	$wp_customize->add_control( 'bb_theme_copyright', array(
		'label'    => __( 'Copyright text', 'bb_' ),
		'section'  => 'bb_theme_copyright_section',
		'type'     => 'text',
		'priority' => 30,
	) );

}
add_action( 'customize_register', 'fx_theme_customizer' );

?>