<?php
/**
 * Radcliffe 2 Theme Customizer - Contact Info
 *
 * @package Radcliffe 2
 */

function u3a_modern_contact_info_customize_register( $wp_customize ) {
	/* Add Section for Contact Info */
	$wp_customize->add_section( 'u3a_modern_contact_info', array(
		'title'             => esc_html__( 'Contact Info', 'u3a-modern' ),
		'description'       => esc_html__( 'Display your location, hours, and contact information.', 'u3a-modern' ),
		'priority'          => 128,
	) );

	/* Display in Header */
	$wp_customize->add_setting( 'u3a_modern_contact_info_location', array(
		'default' 			=> 'header',
		'sanitize_callback' => 'u3a_modern_contact_info_sanitize_location',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'u3a_modern_contact_info_location', array(
		'label'             => esc_html__( 'Where would you like to display your contact information?', 'u3a-modern' ),
		'section'           => 'u3a_modern_contact_info',
		'type'              => 'radio',
		'choices'			=> array(
									'header' => esc_html__( 'In the header', 'u3a-modern' ),
									'footer' => esc_html__( 'In the footer', 'u3a-modern' ),
								),
	) );

	/* Address */
	$wp_customize->add_setting( 'u3a_modern_contact_info_address', array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'u3a_modern_contact_info_address', array(
		'label'             => esc_html__( 'Address', 'u3a-modern' ),
		'section'           => 'u3a_modern_contact_info',
		'type'              => 'textarea',
	) );

	/* Phone */
	$wp_customize->add_setting( 'u3a_modern_contact_info_phone', array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'u3a_modern_contact_info_phone', array(
		'label'             => esc_html__( 'Phone', 'u3a-modern' ),
		'section'           => 'u3a_modern_contact_info',
		'type'              => 'text',
	) );

	/* Email */
	$wp_customize->add_setting( 'u3a_modern_contact_info_email', array(
		'sanitize_callback' => 'sanitize_email',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'u3a_modern_contact_info_email', array(
		'label'             => esc_html__( 'Email', 'u3a-modern' ),
		'section'           => 'u3a_modern_contact_info',
		'type'              => 'email',
	) );

	/* Hours */
	$wp_customize->add_setting( 'u3a_modern_contact_info_hours', array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'u3a_modern_contact_info_hours', array(
		'label'             => esc_html__( 'Hours', 'u3a-modern' ),
		'section'           => 'u3a_modern_contact_info',
		'type'              => 'textarea',
	) );
}
add_action( 'customize_register', 'u3a_modern_contact_info_customize_register' );

/**
 * Sanitize the checkbox.
 *
 * @param boolean $input.
 * @return boolean
 */
function u3a_modern_contact_info_sanitize_checkbox( $input ) {
	return ( 1 == $input ? true : false );
}

/**
 * Sanitize the Contact Info location value.
 *
 * @param string $display.
 * @return string.
 */
function u3a_modern_contact_info_sanitize_location( $display ) {
	if ( ! in_array( $display, array( 'header', 'footer' ) ) ) {
		$display = 'header';
	}
	return $display;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function u3a_modern_contact_info_customize_preview_js() {
	wp_enqueue_script( 'u3a-modern-contact-info-customizer', get_template_directory_uri() . '/contact-info/contact-info-customize-preview.js', array( 'jquery', 'customize-preview' ), '20170907', true );
}
add_action( 'customize_preview_init', 'u3a_modern_contact_info_customize_preview_js' );

