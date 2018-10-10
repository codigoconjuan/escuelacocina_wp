<?php


add_action( 'cmb2_admin_init', 'edc_opciones_theme' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function edc_opciones_theme() {

	/**
	 * Registers options page menu item and form.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'           => 'edc_theme_opciones',
		'title'        => esc_html__( 'Escuela de Cocina Ajustes', 'cmb2' ),
		'object_types' => array( 'options-page' ),

		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */

		'option_key'      => 'edc_theme_options', // The option key and admin menu page slug.
		'icon_url'        => 'dashicons-edit', // Menu icon. Only applicable if
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Color del Sitio Primario', 'cmb2' ),
		'desc'    => esc_html__( 'Añada un color Primario para el sitio web (enlaces, botones, textos)', 'cmb2' ),
		'id'      => 'color_primario',
		'type'    => 'colorpicker',
		'default' => '#f46669',
     ) );
     
     $cmb_options->add_field( array(
		'name'    => esc_html__( 'Color del Sitio Secundario', 'cmb2' ),
		'desc'    => esc_html__( 'Añada un color Secundario para el sitio web (enlaces, botones, textos)', 'cmb2' ),
		'id'      => 'color_secundario',
		'type'    => 'colorpicker',
		'default' => '#c7c57d',
     ) );
     
     $cmb_options->add_field( array(
		'name'    => esc_html__( 'Logotipo', 'cmb2' ),
		'desc'    => esc_html__( 'Cargue una imagen para el logotipo', 'cmb2' ),
		'id'      => 'logotipo',
		'type'    => 'file',
     ) );
     
     $cmb_options->add_field( array(
		'name'    => esc_html__( 'Separador', 'cmb2' ),
		'desc'    => esc_html__( 'Cargue una imagen para el separador', 'cmb2' ),
		'id'      => 'separador',
		'type'    => 'file',
     ) );
     
     $cmb_options->add_field( array(
		'name'    => esc_html__( 'Clases para Mostrar en la página Principal ', 'cmb2' ),
		'desc'    => esc_html__( 'Añada una cantidad de Clases para mostrar en la página principal', 'cmb2' ),
		'id'      => 'numero_clases',
		'type'    => 'text',
	) );
}

add_action('wp_footer', 'edc_estilos_opciones');
function edc_estilos_opciones() {
     $opciones = get_option('edc_theme_options');

     $color_primario = $opciones['color_primario'];
     $color_secundario = $opciones['color_secundario'];
     $separador = $opciones['separador'];

     if(!isset($separador)) {
          $separador = get_template_directory_uri() . '/img/separador.png';
     }

     wp_register_style('custom-opciones', false);
     wp_enqueue_style('custom-opciones');

     $custom_css = "
          /** Bg color primario **/
          .btn-primary,
          .bg-primary,
          .alert-primary,
          .list-group-item-primary,
          .comment-respond .submit {
               background-color: {$color_primario}!important;
          }

          /** Color primario **/
          .card-subtitle,
          .nav-link:hover,
          .current_page_item .nav-link ,
          .contenido-entrada .meta span,
          .entrada a ,
          .instructor,
          .comment-respond a,
          .comentarios-cerrados {
               color:  {$color_primario}!important;
          }

          /** border   primario **/
          .current_page_item .nav-link,
          blockquote.subtitulo,
          .btn-primary,
          .footer  {
               border-color:  {$color_primario}!important;
          }

          aside .card-meta,
          .badge-secondary,
          .bg-secondary,
          .alert-secondary,
          .list-group-item-secondary,
          aside .card-footer,
          .comment-body,
          .page-link:hover   {
               background-color: {$color_secundario} !important;
          }

          .page-link {
               color: {$color_secundario} !important;
          }

          /*** Separador **/
          .separador::after {
               background-image: url( {$separador} )!important;
          }
     ";

     wp_add_inline_style('custom-opciones',  $custom_css);
}