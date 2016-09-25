<?php

add_action( 'admin_menu', 'ngotheme_theme_admin_setup' );

function ngotheme_theme_admin_setup() {

	/* Get the theme prefix. */
	$prefix = hybrid_get_prefix();

	/* Create a settings meta box only on the theme settings page. */
	add_action( 'load-appearance_page_theme-settings', 'ngotheme_theme_settings_meta_boxes' );

	/* Add a filter to validate/sanitize your settings. */
	add_filter( "sanitize_option_{$prefix}_theme_settings", 'ngotheme_theme_validate_settings' );
}

/* Adds custom meta boxes to the theme settings page. */
function ngotheme_theme_settings_meta_boxes() {

	/* Add a custom meta box. */
	add_meta_box(
		'ngotheme-social-meta-box',			// Custom meta box ID
		__( 'Social Settings', 'ngotheme' ),	// Custom label
		'ngotheme_social_meta_box',			// Custom callback function
		'appearance_page_theme-settings',		// Page to load on, leave as is
		'normal',					// normal / advanced / side
		'high'					// high / low
	);
	
	add_meta_box(
		'ngotheme-contact-meta-box',			// Custom meta box ID
		__( 'Contact Settings', 'ngotheme' ),	// Custom label
		'ngotheme_contact_meta_box',			// Custom callback function
		'appearance_page_theme-settings',		// Page to load on, leave as is
		'normal',					// normal / advanced / side
		'high'					// high / low
	);

	/* Add additional add_meta_box() calls here. */
}


/* Validates theme settings. */
function ngotheme_theme_validate_settings( $input ) {

	$socials = ngotheme_get_social_lists();
	$contacts = ngotheme_get_contact_lists();

	foreach($socials as $key => $val ) {
		$input[$val] = wp_filter_nohtml_kses( $input[$val] );
	}
	foreach($contacts as $key => $val ) {
		$input[$val] = wp_filter_nohtml_kses( $input[$val] );
	}

	/* Return the array of theme settings. */
	return $input;
}

/* Function for displaying the social meta box. */
function ngotheme_social_meta_box() { ?>


	<table class="form-table">
		<!-- Add custom form elements below here. -->

		<!-- Text input box -->
		<?php $socials = ngotheme_get_social_lists(); ?>

		<?php foreach( $socials as $key => $val ) { ?>

			<tr>
				<th>
					<label for="<?php echo hybrid_settings_field_id( 'ngotheme_social_'.$key ); ?>">
						<?php printf( __('%1$s URL' ,'ngotheme'), ucwords(str_replace('-', ' ', $key)) ); ?>
					</label>
				</th>
				<td>
					<p>
						<input type="text" id="<?php echo hybrid_settings_field_id( 'ngotheme_social_'.$key ); ?>" name="<?php echo hybrid_settings_field_name( 'ngotheme_social_'.$key ); ?>" size="80" value="<?php echo $val; ?>" />
					</p>
				</td>
			</tr>

		<?php } ?>
		

		<!-- End custom form elements. -->
	</table><!-- .form-table -->


	<?php
}

/* Function for contact displaying the meta box. */
function ngotheme_contact_meta_box() { ?>


	<table class="form-table">
		<!-- Add custom form elements below here. -->
		<?php $contact = ngotheme_get_contact_lists(); ?>
		<!-- Text input box -->
		
		<?php foreach( $contact as $key => $val ) { ?>

			<tr>
				<th>
					<label for="<?php echo hybrid_settings_field_id( 'ngotheme_contact_'.$key ); ?>">
						<?php printf( __('%1$s ' ,'ngotheme'), 
									 ucwords(str_replace('-', ' ', str_replace('contact_', '', $key)) )); ?>
					</label>
				</th>
				<td>
					<p>
						<input type="text" id="<?php echo hybrid_settings_field_id( 'ngotheme_contact_'.$key ); ?>" name="<?php echo hybrid_settings_field_name( 'ngotheme_contact_'.$key ); ?>" size="80" value="<?php echo $val; ?>" />
					</p>
				</td>
			</tr>

		<?php } ?>

		

		<!-- End custom form elements. -->
	</table><!-- .form-table -->


	<?php
}


function ngotheme_theme_customizer( $wp_customize ) {

    $wp_customize->add_section( 'ngotheme_logo_section' , array(
	    'title'       => __( 'Logo', 'ngotheme' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to replace the default site name and description in the header',
	) );

	$wp_customize->add_setting( 'ngotheme_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ngotheme_logo', array(
	    'label'    => __( 'Logo', 'ngotheme' ),
	    'section'  => 'ngotheme_logo_section',
	    'settings' => 'ngotheme_logo',
	) ) );

}

add_action('customize_register', 'ngotheme_theme_customizer');

function ngotheme_get_social_lists( ) {
	return array();
}
function ngotheme_get_contact_lists( ) {
	$contact_list = array(
		'contact_phone' => esc_url( hybrid_get_setting('ngotheme_contact_phone') ),
		'contact_email' => esc_url( hybrid_get_setting('ngotheme_contact_email') ),
		'contact_address' => esc_url( hybrid_get_setting('ngotheme_contact_address') ),
	);
	return $contact_list;
}
?>