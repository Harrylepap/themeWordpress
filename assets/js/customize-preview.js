/**
 * Live-update changed settings in real time in the Customizer preview.
 */

/*( function( $ ) {
	console.log("background image changed");
	var style = $( '#twentysixteen-color-scheme-css' ),
		api = wp.customize;

	if ( ! style.length ) {
		style = $( 'head' ).append( '<style type="text/css" id="twentysixteen-color-scheme-css" />' )
		                    .find( '#twentysixteen-color-scheme-css' );
	}

	// Site title.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site tagline.
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Add custom-background-image body class when background image is added.
	api( 'background_image', function( value ) {
		
		console.log("background image changed");
		value.bind( function( to ) {
			
			$('.page-cover').css({

				'background-image': 'url(' + to + ')',
				'background-repeat': 'no-repeat',
				'background-position': 'center center',
				'background-size': 'cover'
			});
			$( 'body' ).toggleClass( 'custom-background-image', '' !== to );
			
			
		} );
	} );

	// Color Scheme CSS.
	api.bind( 'preview-ready', function() {
		api.preview.bind( 'update-color-scheme-css', function( css ) {
			style.html( css );
		} );
	} );
} )( jQuery );*/

/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

/*( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		console.log("background image changed");
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		console.log("background image changed");
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		console.log("background image changed");
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
} )( jQuery );*/

