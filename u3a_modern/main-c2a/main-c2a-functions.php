<?php
if ( ! function_exists( 'u3a_modern_main_c2a' ) ) :
/**
 *  Prints HTML with contact information.
 */
function u3a_modern_main_c2a() {
	$display = get_theme_mod( 'u3a_modern_main_c2a_display',     '' );
	$title   = get_theme_mod( 'u3a_modern_main_c2a_title',       '' );
	$content = get_theme_mod( 'u3a_modern_main_c2a_content',     '' );
	$button  = get_theme_mod( 'u3a_modern_main_c2a_button_text', '' );
	$url     = get_theme_mod( 'u3a_modern_main_c2a_button_url',  '' );
	$image   = get_theme_mod( 'u3a_modern_main_c2a_background',  '' );
	$class   = 'main-c2a';

	// If we are not on the front page, return.
	if ( ! is_front_page() ) {
		return;
	}

	// If the display option is unchecked, return.
	if ( ! $display && ! is_customize_preview() ) {
		return;
	}

	// If all the options are empty, return.
	if ( ( ! $title && ! $content && ! $button && ! $url ) && ! is_customize_preview() ) {
		return;
	}

	// If we are in the Customize preview and stuff's empty, add classes
	if ( is_customize_preview() ) {
		if ( ! $title ) {
			$class .= ' c2a-no-title';
		}
		if ( ! $content ) {
			$class .= ' c2a-no-content';
		}
		if ( ! $button ) {
			$class .= ' c2a-no-buttontext';
		}
		if ( ! $url ) {
			$class .= ' c2a-no-buttonlink';
		}
	}

	// Add extra class if there's an image background.
	if ( $image ) {
		$class .= ' has-post-thumbnail';
	} ?>

	<div class="<?php echo $class; ?>" <?php u3a_modern_main_c2a_background_image(); ?>>
			<div class="main-c2a-wrapper">
			<?php if ( $title || is_customize_preview() ) : ?>
				<h2 class="main-c2a-title"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>

			<?php if ( $content || is_customize_preview() ) : ?>
				<div class="main-c2a-content"><?php echo wp_kses_post( $content ); ?></div>
			<?php endif; ?>

			<?php if ( ( $url && $button ) || is_customize_preview() ) : ?>
				<div class="main-c2a-button">
					<a class="button" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $button ); ?></a>
				</div>
			<?php endif; ?>
		</div><!-- .hero-area-wrapper -->
	</div><!-- .hero-area -->

	<?php
}
endif;

/**
 * Add uploaded image as background image.
 */
function u3a_modern_main_c2a_background_image() {
	$image = get_theme_mod( 'u3a_modern_main_c2a_background', '' );

	if ( ! $image ) {
		return;
	}

	printf( 'style="background-image: url(\'%s\');"', esc_url( $image ) );
}

/**
 * Add inline CSS needed for overlay opacity
 *
 * @see wp_add_inline_style()
 */
function u3a_modern_c2a_opacity_css() {
	$opacity = get_theme_mod( 'u3a_modern_c2a_overlay_opacity', '40' );
	$css = '.main-c2a:before { opacity: ' . $opacity/100 . '; }';

	wp_add_inline_style( 'radcliffe-2-style', $css ); /*NEED TO CHANGE THE INLINE STYLE HERE DONT FORGET*/
}
add_filter( 'wp_enqueue_scripts', 'u3a_modern_main_c2a_opacity_css' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/main-c2a/main-c2a-customizer.php';
