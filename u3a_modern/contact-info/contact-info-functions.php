<?php
if ( ! function_exists( 'u3a_modern_contact_info' ) ) :

function u3a_modern_contact_info( $section ) {
	$location = get_theme_mod( 'u3a_modern_contact_info_location',  'header' );
	$address  = get_theme_mod( 'u3a_modern_contact_info_address', '' );
	$phone    = get_theme_mod( 'u3a_modern_contact_info_phone',   '' );
	$email    = get_theme_mod( 'u3a_modern_contact_info_email',   '' );
	$hours    = get_theme_mod( 'u3a_modern_contact_info_hours',   '' );

	if ( ( ! $address && ! is_customize_preview() ) &&
		 ( ! $phone && ! is_customize_preview() ) &&
		 ( ! $email && ! is_customize_preview() ) &&
		 ( ! $hours && ! is_customize_preview() ) ) {
		return;
	}

	// If we are in the Header Section and the option is disabled, return.
	if ( 'header' === $section && 'header' !== $location && ! is_customize_preview() ) {
		return;
	}

	// If we are in the Footer Section and the option is disabled, return.
	if ( 'footer' === $section && 'footer' !== $location && ! is_customize_preview() ) {
		return;
	}


	// Let's set up some stuff for the Customizer preview
	$class = '';
	if ( is_customize_preview() ) {
		if ( ! $address ) {
			$class .= ' contact-info-no-address';
		}
		if ( ! $phone ) {
			$class .= ' contact-info-no-phone';
		}
		if ( ! $email ) {
			$class .= ' contact-info-no-email';
		}
		if ( ! $hours ) {
			$class .= ' contact-info-no-hours';
		}
		if ( 'footer' === $location ) {
			$class .= ' contact-info-header-no-display';
		} else if ( 'header' === $location ) {
			$class .= ' contact-info-footer-no-display';
		}
	}

	?>

	<div class="contact-info-area <?php echo $class; ?>">
		<div class="contact-info-wrapper">
			<?php if ( $address || is_customize_preview() ) : ?>
			<span class="contact-info-address">
				<a href="<?php echo esc_url( u3a_modern_map_link( $address ) ); ?>" target="_blank">
					<?php echo u3a_modern_get_svg( array( 'icon' => 'location' ) ); ?>
					<span class="contact-info-label"><?php echo esc_html( $address ); ?></span>
				</a>
			</span>
			<?php endif; ?>

			<?php if ( $phone || is_customize_preview() ) : ?>
			<span class="contact-info-phone">
				<a href="tel:<?php echo esc_html( $phone ); ?>">
					<?php echo u3a_modern_get_svg( array( 'icon' => 'phone' ) ); ?>
					<span class="contact-info-label"><?php echo esc_html( $phone ); ?></span>
				</a>
			</span>
			<?php endif; ?>

			<?php if ( $email || is_customize_preview() ) : ?>
			<span class="contact-info-email">
				<a href="mailto:<?php echo sanitize_email( $email ); ?>">
					<?php echo u3a_modern_get_svg( array( 'icon' => 'mail' ) ); ?>
					<span class="contact-info-label"><?php echo sanitize_email( $email ); ?></span>
				</a>
			</span>
			<?php endif; ?>

			<?php if ( $hours || is_customize_preview() ) : ?>
			<span class="contact-info-hours">
				<?php echo u3a_modern_get_svg( array( 'icon' => 'time' ) ); ?>
				<span class="contact-info-hours-text"><?php echo esc_html( $hours ); ?></span>
			</span>
			<?php endif; ?>
		</div><!-- .contact-info-wrapper -->
	</div><!-- .contact-info-area -->

	<?php
}
endif;

/**
 *  Encode an address for a Google Maps link.
 */
function u3a_modern_urlencode_address( $address ) {
	$address = strtolower( $address );
	$address = preg_replace( "/\s+/", " ", trim( $address ) ); // Get rid of any unwanted whitespace.
	$address = str_ireplace( " ", "+", $address ); // Use + not %20.
	urlencode( $address );

	return $address;
}

/**
 *  Return a link with a specific address to Google Maps.
 */
function u3a_modern_map_link( $address ) {
	return esc_url( 'http://maps.google.com/maps?q=' . u3a_modern_urlencode_address( $address ) );
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/contact-info/contact-info-customizer.php';
