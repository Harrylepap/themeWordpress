<?php
/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @see ngotheme_header_style()
 */
function ngotheme_custom_header_and_background() {
		//$color_scheme             = ngotheme_get_color_scheme();
	//$default_background_color = trim( $color_scheme[0], '#' );
	$default_background_color = "#343434";
	//$default_text_color       = trim( $color_scheme[3], '#' );
	$default_text_color = "#1a1a1a";

	/**
	 * Filter the arguments used when adding 'custom-background' support in this theme
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'ngotheme_custom_background_args', array(
		'default-color' => $default_background_color,
		'width'                  => 1200,
		'height'                 => 280,
		'flex-height'            => true,
		'wp-head-callback'       => 'ngotheme_header_style_cb',
	) ) );
	

}

 add_action( 'after_setup_theme', 'ngotheme_custom_header_and_background' );

function ngotheme_header_style_cb( ){
	return ;
}
/**
 * Siteweb information customizer init
 */

function ngotheme_customize_register( $wp_customize ) {
	
	
	/* Site decription input */
	$wp_customize->add_setting( 'site_description', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'theme_supports' => '', // Rarely needed.
	  'default' => '',
	  'transport' => 'refresh', // or postMessage
	  'sanitize_callback' => '',
	  'sanitize_js_callback' => '', // Basically to_json.
	) );
	$wp_customize->add_control( 'site_description', array(
	  'label' => __( 'Site description' ),
	  'type' => 'textarea',
	  'section' => 'title_tagline', // default site identity
	) );
	
	/* Site footer legal notice description input */
	$wp_customize->add_setting( 'site_footer_note', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'theme_supports' => '', // Rarely needed.
	  'default' => '',
	  'transport' => 'refresh', // or postMessage
	  'sanitize_callback' => '',
	  'sanitize_js_callback' => '', // Basically to_json.
	) );
	$wp_customize->add_control( 'site_footer_note', array(
	  'label' => __( 'Site Footer' ),
	  'description' => __('Text at footer (you can use tags)'),
	  'type' => 'textarea',
	  'section' => 'title_tagline', // default site identity
	) );
	
  
    /* Site LOGO */
 /* $wp_customize->add_setting( 'site_logo_image', array(
    //'default' => '#f72525',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'site_logo_image', array(
    'label' => __( 'Featured Home Page Image', 'theme_textdomain' ),
    'section' => 'title_tagline',
    'mime_type' => 'image',
  ) ) );*/
	
  
	/**
	* Site Contact information section : 
    * NAME
    * EMAIL
    * PHONE
    * ADDRESS
	*/
	$wp_customize->add_section( 'contact_information', array(
	  'title' => __( 'Contact Information' ),
	  'description' => __( 'Write contact information here' ),
	  'panel' => '', // Not typically needed.
	  'priority' => 21,
	  'capability' => 'edit_theme_options',
	  'theme_supports' => '', // Rarely needed.
	) );
  
	/* Contact name input */
	$wp_customize->add_setting( 'contact_name', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '',
	  'transport' => 'refresh', // or postMessage
	  'sanitize_callback' => 'ngo_xss_clean_all',
	  'sanitize_js_callback' => '', // Basically to_json.
	) );
	$wp_customize->add_control( 'contact_name', array(
	  'label' => __( 'Name' ),
	  'type' => 'text',
	  'section' => 'contact_information', // default site identity
	) );
  
	/* Contact email input */
	$wp_customize->add_setting( 'contact_email', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => 'tfmteachformada@gmail.com',
	  'transport' => 'refresh', // or postMessage
	  'sanitize_callback' => 'ngo_xss_clean_all',
	  'sanitize_js_callback' => '', // Basically to_json.
	) );
	$wp_customize->add_control( 'contact_email', array(
	  'label' => __( 'Email' ),
	  'type' => 'email',
	  'section' => 'contact_information', // default site identity
	) );
  
	/* Contact phone input */
	$wp_customize->add_setting( 'contact_phone', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '+261 ',
	  'transport' => 'refresh', // or postMessage
	  'sanitize_callback' => 'ngo_xss_clean_all',
	  'sanitize_js_callback' => '', // Basically to_json.
	) );
	$wp_customize->add_control( 'contact_phone', array(
	  'label' => __( 'Phone' ),
	  'type' => 'text',
	  'section' => 'contact_information', // default site identity
	) );
  
	/* Contact Address input */
	$wp_customize->add_setting( 'contact_address', array(
	  'type' => 'theme_mod', // or 'option'
	  'capability' => 'edit_theme_options',
	  'default' => '+261 ',
	  'transport' => 'refresh', // or postMessage
	  'sanitize_callback' => 'ngo_xss_clean',
	  'sanitize_js_callback' => '', // Basically to_json.
	) );
	$wp_customize->add_control( 'contact_address', array(
	  'label' => __( 'Address' ),
	  'type' => 'textarea',
	  'section' => 'contact_information', // default site identity
	) );
  
	//
	// Add page background color setting and control.
	
	/** Contact form 
	 *
	 */
	
}
	
add_action('customize_register', 'ngotheme_customize_register' , 11);