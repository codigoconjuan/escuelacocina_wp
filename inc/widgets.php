<?php

/**
 * Adds Foo_Widget widget.
 */
class Foo_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			esc_html__( 'Próximos Cursos', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Agrega los Próximos Cursos', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
          } 

          if ( ! empty( $instance['cantidad'] ) ) {
               $cantidad = $instance['cantidad'];
          }

          $args = array(
               'post_type' => 'clases_cocina',
               'posts_per_page' => $cantidad 
          );
          $cursos = new WP_Query($args);
          while($cursos->have_posts()): $cursos->the_post();
          ?>
               <div class="card mb-4">
                    <?php the_post_thumbnail('mediano', array('class' => 'img-fluid')); ?>
                    <div class="card-body">
                         <h3 class="card-title"><?php the_title(); ?></h3>
                         <p class="card-subtitle m-0">
                              <?php echo get_post_meta(get_the_ID(), 'edc_cursos_subtitulo', true); ?>
                         </p>
                    </div>
                    <div class="card-footer">
                         <a href="<?php the_permalink(); ?>">Más Información</a>
                    </div>
               </div>

          <?php
          endwhile; wp_reset_postdata();
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
          $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Titulo para Widget', 'text_domain' );
          
          $cantidad = ! empty( $instance['cantidad'] ) ? $instance['cantidad'] : 
                    esc_html__( '¿Cuántos Cursos deseas mostrar?', 'text_domain' );
		?>
		<p>
               <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                    <?php esc_attr_e( 'Title:', 'text_domain' ); ?>
               </label> 
               <input class="widefat" 
                    id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
                    name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
                    type="text" value="<?php echo esc_attr( $title ); ?>">
          </p>
          <p>
               <label for="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>">
                    <?php esc_attr_e( '¿Cuántos Cursos deseas mostrar?', 'text_domain' ); ?>
               </label> 
               <input class="widefat" 
                    id="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>" 
                    name="<?php echo esc_attr( $this->get_field_name( 'cantidad' ) ); ?>" 
                    type="number" value="<?php echo esc_attr( $cantidad ); ?>">
          </p>
          
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
          $instance['cantidad'] = ( ! empty( $new_instance['cantidad'] ) ) ? sanitize_text_field( $new_instance['cantidad'] ) : '';
		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_foo_widget() {
     register_widget( 'Foo_Widget' );
 }
 add_action( 'widgets_init', 'register_foo_widget' );