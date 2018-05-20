
( function( $ ) {

	$( '<style type="text/css">.main-c2a.c2a-no-title.c2a-no-content.c2a-no-buttontext.c2a-no-buttonlink { display: none !important; } </style>' ).appendTo( 'head' );

	wp.customize( 'u3a_modern_main_c2a_display', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.main-c2a' ).show();
			} else {
				$( '.main-c2a' ).hide();
			}
		} );
	} );

	wp.customize( 'u3a_modern_main_c2a_title', function( value ) {
		value.bind( function( to ) {
			$( '.main-c2a-title' ).text( to );

			if ( '' === to ) {
				$( '.main-c2a' ).addClass( 'c2a-no-title' );
			} else {
				$( '.main-c2a' ).removeClass( 'c2a-no-title' );
			}
		} );
	} );

	wp.customize( 'u3a_modern_main_c2a_content', function( value ) {
		value.bind( function( to ) {
			$( '.main-c2a-content' ).text( to );

			if ( '' === to ) {
				$( '.main-c2a' ).addClass( 'c2a-no-content' );
			} else {
				$( '.main-c2a' ).removeClass( 'c2a-no-content' );
			}
		} );
	} );

	wp.customize( 'u3a_modern_main_c2a_button_text', function( value ) {
		value.bind( function( to ) {
			$( '.main-c2a-button a' ).text( to );

			if ( '' === to ) {
				$( '.main-c2a' ).addClass( 'c2a-no-buttontext' );
			} else {
				$( '.main-c2a' ).removeClass( 'c2a-no-buttontext' );
			}
		} );
	} );

	wp.customize( 'u3a_modern_main_c2a_button_url', function( value ) {
		value.bind( function( to ) {
			$( '.main-c2a-button a' ).attr( 'href', to );

			if ( '' === to ) {
				$( '.main-c2a' ).addClass( 'c2a-no-buttonlink' );
			} else {
				$( '.main-c2a' ).removeClass( 'c2a-no-buttonlink' );
			}
		} );
	} );

	wp.customize( 'u3a_modern_main_c2a_background', function( value ) {
		value.bind( function( to ) {
			if ( "" === to ) {
				$( '.main-c2a' ).removeClass( 'has-post-thumbnail' ).css( 'background-image', 'none' );
			} else {
				$( '.main-c2a' ).addClass( 'has-post-thumbnail' ).css( 'background-image', 'url(' + to + ')');
			}
		} );
	} );

	$css = '';
	for ( $i = 0; $i <= 90; $i += 10 ) {
		$css += '.background-opacity-' + $i + '.main-c2a:before { opacity: ' + ( $i/100 ) + '; }';
	}
	$( '<style type="text/css">' + $css + '</style>' ).appendTo( 'head' );

	wp.customize( 'u3a_modern_c2a_overlay_opacity', function( value ) {
		value.bind( function( to ) {
			$( '.main-c2a' ).each( function() {;
				var prefix = 'background-opacity-';
				var classes = this.className.split( ' ' ).filter( function( c ) {
					return c.lastIndexOf( prefix, 0 ) !== 0;
				} );
				this.className = classes.join( ' ' ).trim();
			} );

			$( '.main-c2a' ).addClass( 'background-opacity-' + to );
		} );
	} );

} )( jQuery );
