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
			'transport'   => 'postMessage'
		)
	);

	// Asociamos un control de selección de color al parámetro anterior
	// y lo añadimos a la seccion 'colors' ya presente por defecto en
	// WordPress
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'tuto_custom_header_h1_color',
			array(
			    'label'      => 'Color de la cabecera',
			    'section'    => 'colors',
			)
		)
	);

	// Añadimos una nueva sección "Fuentes"
	$wp_customize->add_section(
		'tuto_custom_fonts',
		array(
			'title'     => 'Fuentes',
			'priority'  => 200
		)
	);


	// Creamos un nuevo parámetro para cambiar la fuente de las cabeceras
	$wp_customize->add_setting(
		'tuto_custom_header_h1_font',
		array(
			'default'   => 'times',
			'transport'   => 'postMessage'
		)
	);

	// Asociamos al parámetro anterior un control de selección con varias
	// fuentes y lo añadimos a la seccion "Fuentes"
	$wp_customize->add_control(
		'tuto_custom_header_h1_font',
		array(
			'label'    => 'Fuente Cabecera',
			'section'  => 'tuto_custom_fonts',
			'type'     => 'select',
			'choices'  => array(
				'times'     => 'Times New Roman',
				'arial'     => 'Arial',
				'courier'   => 'Courier New'
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
			color: <?php echo get_theme_mod( 'tuto_custom_header_h1_color' ); ?>;
			font-family: <?php echo get_theme_mod( 'tuto_custom_header_h1_font' ); ?>;
		}

	</style>
<?php
}
add_action( 'wp_head', 'tuto_customizer_css' );

/**
 * Registramos nuestro script para Theme Customizer
 *
 * @since 	0.4.0
 */
function tuto_customizer_live_preview() {

	wp_enqueue_script(
		'tuto_customizer_live_preview',
		get_template_directory_uri() . '/theme-customizer.js',
		array( 'jquery', 'customize-preview' ),
		'1.0.0',
		true
	);

}
add_action( 'customize_preview_init', 'tuto_customizer_live_preview' );