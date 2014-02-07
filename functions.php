<?php

/**
 * Registramos nuestros parámetros con Theme Customizer
 *
 * @since 	0.2.0
 *
 * @param 	object    $wp_customize    Theme Customizer
 */
function tuto_customizer_register_settings( $wp_customize ) {

	// Creamos un nuevo parámetro para cambiar el color de las cabeceras
	$wp_customize->add_setting(
		'tuto_custom_header_h1_color',
		array(
			'default'     => '#000000',
		)
	);

	// Asociamos un control de selección de color al parámetro anterior
	// y lo añadimos a la seccion 'colors' ya presente en una instalación
	// WordPress
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
			    'label'      => 'Color de la cabecera',
			    'section'    => 'colors',
			    'settings'   => 'tuto_custom_header_h1_color'
			)
		)
	);

}
add_action( 'customize_register', 'tuto_customizer_register_settings' );

/**
 * Genera el estilo para cambiar el aspecto de la web basado en los parámetros
 * guardados en Theme Customizer.
 *
 * @since 	0.2.0
 */
function tuto_customizer_css() {
?>
	<style type="text/css">
		
		.header h1 {
			// Color para la cabecera
			color: <?php echo get_theme_mod( 'tuto_custom_header_h1_color' ); ?>
		}
		
	</style>
<?php
}
add_action( 'wp_head', 'tuto_customizer_css' );