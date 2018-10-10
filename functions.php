<?php


/*
* Crea un Widget con los próximos Cursos
*/
require_once dirname(__FILE__) . '/inc/widgets.php';

/*
* Agrega los Post Types de Instructores y Clases
*/
require_once dirname(__FILE__) . '/inc/posttypes.php';

/**
 * Agregar CMB2
 */
require_once dirname(__FILE__) . '/cmb2.php';

/**
 * Queries reutilizables
 */
require_once dirname(__FILE__) . '/inc/queries.php';

 /*
 * Carga campos personalizados
 */
require_once dirname(__FILE__) . '/inc/custom-fields.php';
 /*
 * Opciones del Theme
 */
require_once dirname(__FILE__) . '/inc/opciones.php';



/*
*    Imagenes Destacadas Para Páginas
*/
add_action('init', 'edc_imagen_destacada' );
function edc_imagen_destacada($id){
     $imagen = get_the_post_thumbnail_url($id, 'full');

     $html = '';
     $clase = false;
     if($imagen) {
          $clase = true;
          $html .= '<div class="container">';
          $html .=       '<div class="row imagen-destacada"></div>';
          $html .= '</div>';

          // Agregar estilos linealmente
          wp_register_style('custom', false);
          wp_enqueue_style('custom');

          // creamos el css para el custom
          $imagen_destacada_css = "
               .imagen-destacada {
                    background-image: url( {$imagen});
               }
          ";
          wp_add_inline_style('custom', $imagen_destacada_css);
     }
     return array($html, $clase);
}

/**
 * Funciones que se cargan al activar el theme
 */
function edc_setup() {

     // Definir tamaños de imagenes
     add_image_size('mediano', 510, 340, true);
     add_image_size('cuadrada_mediana', 350, 350, true);

     add_theme_support('post-thumbnails');
     add_theme_support('title-tag');

     // Menu de navegación
     register_nav_menus( array(
          'menu_principal' => esc_html__('Menu Principal', 'escuelacocina')
     ) );
}
add_action('after_setup_theme', 'edc_setup');

/* 
* Agrega la clase nav-link de bootstrap al menu principal
*/
function edc_enlace_class($atts, $item, $args){
     if($args->theme_location == 'menu_principal') {
          $atts['class'] = 'nav-link';
     }
     return $atts;
}
add_filter('nav_menu_link_attributes', 'edc_enlace_class', 10, 3 );


/*
*  Carga los Scripts y CSS del theme
*/
function edc_scripts() {
     /** Styles */
     wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' , false, '4.1.3');

     wp_enqueue_style('style', get_stylesheet_uri(), array('bootstrap-css') );

     /** Scripts */
     wp_enqueue_script('jquery');
     wp_enqueue_script('popper',  get_template_directory_uri() . '/js/popper.js', array('jquery'), '1.0', true );
     wp_enqueue_script('bootstrap-js',  get_template_directory_uri() . '/js/bootstrap.js', array('popper'), '1.0', true );
} 
add_action('wp_enqueue_scripts', 'edc_scripts' );

/** Agrega un mensaje personalizado a la página en el admin */

add_filter('display_post_states', 'edc_cambiar_estado', 10, 2 );
function edc_cambiar_estado($states, $post) {
     if( ('page' === get_post_type($post->ID) ) && ('page-clases.php' == get_page_template_slug($post->ID)) ) {
          $states[] = __('Página de Clases <a href="edit.php?post_type=clases_cocina">Administrar Clases</a> ');
     }
     return $states;
}

/** Soporte a widgets */
add_action('widgets_init', 'edc_widgets_sidebar');
function edc_widgets_sidebar() {
     register_sidebar(array(
          'name'         => 'Widget Lateral',
          'id'           => 'sidebar_widget',
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h2 class="text-center text-light separador inverso">', 
          'after_title' => '</h2>'
     ));

}
