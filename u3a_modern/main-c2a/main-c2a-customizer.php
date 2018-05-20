<?php

function u3a_modern_main_c2a_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'u3a_modern_main_c2a', array(
		'title'             => esc_html__( 'Featured Prompt', 'u3a-modern' ),
		'description'       => esc_html__( 'Use this area to promote your most important message to site visitors. You can use a headline, a brief description and prominent link to help drive visitors where you’d like them to go.', 'u3a-modern' ),
		'priority'          => 127,
		'active_callback'   => 'is_front_page',
	) );

	$wp_customize->add_setting( 'u3a_modern_main_c2a_display', array(
		'sanitize_callback' => 'u3a_modern_main_c2a_sanitize_checkbox',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'u3a_modern_main_c2a_display', array(
		'label'             => esc_html__( 'Display on the Front Page', 'u3a-modern' ),
		'section'           => 'u3a_modern_main_c2a',
		'type'              => 'checkbox',
	) );

	$wp_customize->add_setting( 'u3a_modern_main_c2a_title', array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'u3a_modern_main_c2a_title', array(
		'label'             => esc_html__( 'Title', 'u3a-modern' ),
		'section'           => 'u3a_modern_main_c2a',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'u3a_modern_main_c2a_content', array(
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'u3a_modern_main_c2a_content', array(
		'label'             => esc_html__( 'Description', 'u3a-modern' ),
		'section'           => 'u3a_modern_main_c2a',
		'type'              => 'textarea',
	) );

	$wp_customize->add_setting( 'u3a_modern_main_c2a_button_text', array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'u3a_modern_main_c2a_button_text', array(
		'label'             => esc_html__( 'Button Text', 'u3a-modern' ),
		'section'           => 'u3a_modern_main_c2a',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'u3a_modern_main_c2a_button_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'u3a_modern_main_c2a_button_url', array(
		'label'             => esc_html__( 'Button URL Link', 'u3a-modern' ),
		'section'           => 'u3a_modern_main_c2a',
		'type'              => 'url',
	) );

	$wp_customize->add_setting( 'u3a_modern_main_c2a_background', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'u3a_modern_main_c2a_background', array(
		'label'             => esc_html__( 'Background Image', 'u3a-modern' ),
		'section'           => 'u3a_modern_main_c2a',
	) ) );

	$wp_customize->add_setting( 'u3a_modern_main_c2a_overlay_opacity', array(
		'default'              => 40,
		'type'                 => 'theme_mod',
		'transport'            => 'postMessage',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );

	$wp_customize->add_control( 'u3a_modern_main_c2a_overlay_opacity', array(
		'label'       => esc_html__( 'Background Overlay', 'u3a-modern' ),
		'description' => esc_html__( 'Adjust the darkness of the overlay over the background image.', 'u3a-modern' ),
		'section'     => 'u3a_modern_main_c2a',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 10,
			'min'              => 0,
			'max'              => 90,
			'aria-valuemin'    => 0,
			'aria-valuemax'    => 90,
			'aria-valuenow'    => 40,
			'aria-orientation' => 'horizontal',
		),
	) );
}
add_action( 'customize_register', 'u3a_modern_main_c2a_customize_register' );

function u3a_modern_main_c2a_sanitize_checkbox( $input ) {
	return ( 1 == $input ? true : false );
}

function u3a_modern_main_c2a_customize_preview_js() {
	wp_enqueue_script( 'u3a-modern_main_c2a-customizer', get_template_directory_uri() . '/main-c2a/main-c2a-customize-preview.js', array( 'jquery', 'customize-preview' ), '20170823', true );
}
add_action( 'customize_preview_init', 'u3a_modern_main_c2a_customize_preview_js' );

