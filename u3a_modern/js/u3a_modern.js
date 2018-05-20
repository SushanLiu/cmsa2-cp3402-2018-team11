// JavaScript Document

( function( $ ) {

	var $window = $( window );

	// Manage full-screen featured images.
	function fullScreenImages() {
		var $entryBackground = $( '.entry-thumbnail' ),
			$mainC2a = $( '.main-c2a' );

		if ( $entryBackground ) {
			$entryBackground.height( Math.round( $window.width() / 1.33 ) + 'px' );
		}

		if ( $mainC2a ) {
			$mainC2a.height( Math.round( $window.width() / 1.33 ) + 'px' );
		}

		$entryBackground.height( Math.round( $window.width() / 1.33 ) + 'px' );
	}
} )( jQuery );