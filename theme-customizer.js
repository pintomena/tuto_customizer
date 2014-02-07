(function( $ ) {
	"use strict";

	// Cambiamos el color de la cabecera
	wp.customize( 'tuto_custom_header_h1_color', function( value ) {
		value.bind( function( to ) {
			$( '.header h1' ).css( 'color', to );
		} );
	});

	// Cambiamos la fuente de la cabecera
	wp.customize( 'tuto_custom_header_h1_font', function( value ) {
		value.bind( function( to ) {

			var sFont;

			switch( to.toString().toLowerCase() ) {

				case 'times':
					sFont = 'Times New Roman';
					break;

				case 'arial':
					sFont = 'Arial';
					break;

				case 'courier':
					sFont = 'Courier New, Courier';
					break;

				case 'helvetica':
					sFont = 'Helvetica';
					break;

				default:
					sFont = 'Times New Roman';
					break;

			} // end switch/case

			$( '.header h1' ).css({
				fontFamily: sFont
			});

		});

	});


})( jQuery );
