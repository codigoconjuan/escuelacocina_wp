<?php



/*
* Metaboxes para el Homepage
*/

add_action( 'cmb2_admin_init', 'edc_campos_homepage' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function edc_campos_homepage() {
     $prefix = 'edc_homepage_';
     
     $id_home = get_option('page_on_front');

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$edc_campos_homepage = new_cmb2_box( array(
		'id'           => $prefix . 'homepage',
		'title'        => esc_html__( 'Campos Homepage', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_home ),
		), // Specific post IDs to display this metabox
     ) );

     $edc_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Superior 1', 'cmb2' ),
		'desc'    => esc_html__( 'texto para la parte superior del sitio web', 'cmb2' ),
		'id'      => $prefix . 'texto_superior_1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
     ) );
     
     $edc_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Hero 1', 'cmb2' ),
		'desc' => esc_html__( 'Primera imagen para la parte superir', 'cmb2' ),
		'id'   => $prefix . 'imagen_superior_1',
		'type' => 'file',
	) );
     
     $edc_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Superior 2', 'cmb2' ),
		'desc'    => esc_html__( 'texto para la parte superior del sitio web', 'cmb2' ),
		'id'      => $prefix . 'texto_superior_2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
     ) );
     
     $edc_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Hero 2', 'cmb2' ),
		'desc' => esc_html__( 'Segunda imagen para la parte superir', 'cmb2' ),
		'id'   => $prefix . 'imagen_superior_2',
		'type' => 'file',
	) );
	
	// Campos de licenciatura
	$edc_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Licenciatura', 'cmb2' ),
		'desc'    => esc_html__( 'Añada el texto para la licenciatura', 'cmb2' ),
		'id'      => $prefix . 'texto_licenciatura',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
     ) );
     
     $edc_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Fondo Licenciatura', 'cmb2' ),
		'desc' => esc_html__( 'Imagen de fondo para la sección licenciatura', 'cmb2' ),
		'id'   => $prefix . 'imagen_licenciatura',
		'type' => 'file',
	) );
}



add_action( 'cmb2_admin_init', 'edc_seccion_nosotros' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function edc_seccion_nosotros() {
	$prefix = 'edc_group_';

	/**
	 * Repeatable Field Groups
	 */
	$edc_iconos = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Iconos con Descripción', 'cmb2' ),
		'object_types' => array( 'page' ),
		'context' 	=> 'normal',
		'priority'	=> 'high',
		'show_names'   => 'true',
		'show_on'		=> array(
			'key'	=> 'page-template',
			'value'   => 'page-iconos.php'
		)
	) );

	$edc_iconos->add_field( array(
		'name' => esc_html__( 'Titulo Sección', 'cmb2' ),
		'desc' => esc_html__( 'Añada un titulo para la sección', 'cmb2' ),
		'id'   => $prefix . 'titulo_iconos',
		'type' => 'text',
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $edc_iconos->add_field( array(
		'id'          => $prefix . 'nosotros',
		'type'        => 'group',
		'description' => esc_html__( 'Agregue opciones según sea necesario', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Característica {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Agregar Otro Grupo', 'cmb2' ),
			'remove_button' => esc_html__( 'Eliminar', 'cmb2' ),
			'sortable'      => true,
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	$edc_iconos->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Titulo', 'cmb2' ),
		'id'         => 'titulo_icono',
		'type'       => 'text',
	) );

	$edc_iconos->add_group_field( $group_field_id, array(
		'name'        => esc_html__( 'Description', 'cmb2' ),
		'description' => esc_html__( 'Agregue una descripción a esta caracteristica', 'cmb2' ),
		'id'          => 'desc_icono',
		'type'        => 'textarea_small',
	) );

	$edc_iconos->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Icono', 'cmb2' ),
		'id'   => 'imagen_icono',
		'type' => 'file',
	) );

}

/*
* Blog
*/
add_action( 'cmb2_admin_init', 'edc_campos_blog' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function edc_campos_blog() {
     $prefix = 'edc_blog_';
     
	$id_blog = get_option('page_for_posts');
	
	$edc_campos_blog = new_cmb2_box( array(
		'id'           => $prefix . 'blog',
		'title'        => esc_html__( 'Campos Blog', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_blog ),
		), // Specific post IDs to display this metabox
	) );
	
	$edc_campos_blog->add_field( array(
		'name' => esc_html__( 'Slogan Blog', 'cmb2' ),
		'desc' => esc_html__( 'Añada una descripción a la página web', 'cmb2' ),
		'id'   => $prefix . 'slogan_blog',
		'type' => 'text',
	) );
}

// Añade campos al post type de Clases
add_action( 'cmb2_admin_init', 'edc_campos_clases' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function edc_campos_clases() {
	$prefix = 'edc_cursos_';

	/**
	 * Repeatable Field Groups
	 */
	$edc_campos_cursos = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Información de Clases y Cursos', 'cmb2' ),
		'object_types' => array( 'clases_cocina' ),
		'context' 	=> 'normal',
		'priority'	=> 'high',
		'show_names'   => 'true',
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Subtitulo del Curso', 'cmb2' ),
		'desc' => esc_html__( 'Añada un subtitulo para el curso', 'cmb2' ),
		'id'   => $prefix . 'subtitulo',
		'type' => 'text',
	) );

	// Horas y Días

	$edc_campos_cursos->add_field( array(
		'name'     => esc_html__( 'Información sobre la fecha y Horarios del curso', 'cmb2' ),
		'desc'     => esc_html__( 'Añada información relacionada a fechas, días y horas para el curso', 'cmb2' ),
		'id'       => $prefix . 'info',
		'type'     => 'title'
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Indicaciones de los días', 'cmb2' ),
		'desc' => esc_html__( 'Añada lasa indicaciones de los días ej: Todos los sábados', 'cmb2' ),
		'id'   => $prefix . 'indicaciones',
		'type' => 'text',
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Fecha de Inicio de Curso', 'cmb2' ),
		'desc' => esc_html__( 'Añada la fecha de Inicio de Curso', 'cmb2' ),
		'id'   => $prefix . 'fecha_inicio_curso',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
		'column' => true
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Fecha de Fin de Curso', 'cmb2' ),
		'desc' => esc_html__( 'Añada la fecha de Fin de Curso', 'cmb2' ),
		'id'   => $prefix . 'fecha_fin_curso',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
		'column' => true
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Hora de Inicio de Clase', 'cmb2' ),
		'desc' => esc_html__( 'Añada la hora', 'cmb2' ),
		'id'   => $prefix . 'hora_inicio_clase',
		'type' => 'text_time',
		// 'time_format' => 'H:i', // Set to 24hr format
		'column' => true
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Hora de Fin de Clase', 'cmb2' ),
		'desc' => esc_html__( 'Añada la hora', 'cmb2' ),
		'id'   => $prefix . 'hora_fin_clase',
		'type' => 'text_time',
		// 'time_format' => 'H:i', // Set to 24hr format

	) );

	// Añada información sobre cupos, precio, etc
	$edc_campos_cursos->add_field( array(
		'name'     => esc_html__( 'Información Extra del curso', 'cmb2' ),
		'desc'     => esc_html__( 'Añada cupo, precio, instructor en esta sección', 'cmb2' ),
		'id'       => $prefix . 'bloque',
		'type'     => 'title'
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Precio del Curso', 'cmb2' ),
		'desc' => esc_html__( 'Añada el costo del curso', 'cmb2' ),
		'id'   => $prefix . 'costo',
		'type' => 'text_money',
		// 'before_field' => '£', // override '$' symbol if needed
		// 'repeatable' => true,
		'column' => true
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Cupo', 'cmb2' ),
		'desc' => esc_html__( 'Cupo para el curso', 'cmb2' ),
		'id'   => $prefix . 'cupo',
		'type' => 'text',
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Que Incluye El Curso', 'cmb2' ),
		'desc' => esc_html__( 'Añada lo que incluye el curso (1 por línea)', 'cmb2' ),
		'id'   => $prefix . 'incluye',
		'type' => 'text',
		'repeatable' => true
	) );

	$edc_campos_cursos->add_field( array(
		'name' => esc_html__( 'Chef Instructor del Curso', 'cmb2' ),
		'desc' => esc_html__( 'Seleccione el chef que impartirá el curso', 'cmb2' ),
		'id'   => $prefix . 'chef',
		'limit' => 10,
		'type' => 'post_search_ajax',
		'query_args'	=> array(
			'post_type'			=> array( 'chefs' ),
			'post_status'		=> array( 'publish' ),
			'posts_per_page'	=> -1
		)
	) );

}


// Añade campos al post type de Clases
add_action( 'cmb2_admin_init', 'edc_campos_galeria' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function edc_campos_galeria() {
	$prefix = 'edc_galeria_';

	/**
	 * Repeatable Field Groups
	 */
	$edc_galeria = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Galería de Imágenes', 'cmb2' ),
		'object_types' => array( 'page' ),
		'context' 	=> 'normal',
		'priority'	=> 'high',
		'show_names'   => 'true',
		'show_on'		=> array(
			'key'	=> 'page-template',
			'value'   => 'page-galeria.php'
		)
	) );

	$edc_galeria->add_field( array(
		'name'         => esc_html__( 'Imágenes', 'cmb2' ),
		'desc'         => esc_html__( 'Cargue las imágenes de la galería aquí', 'cmb2' ),
		'id'           => $prefix . 'imagenes',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
}


