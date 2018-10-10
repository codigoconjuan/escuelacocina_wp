<?php

function edc_query_cursos($cantidad = -1) {
     $args = array(
          'post_type' => 'clases_cocina',
          'posts_per_page' => $cantidad
     );

     $clases = new WP_Query($args);

     while( $clases->have_posts() ): $clases->the_post();
     
     // printf( '<pre>%s</pre>', var_export( get_post_custom( get_the_ID() ), true ) );
     ?>


          <div class="col-md-6 col-lg-4">
               <div class="card">
                    <?php the_post_thumbnail('mediano', array('class' => 'card-img-top')) ?>

                    <div class="card-meta bg-primary p-3 text-light d-flex justify-content-between align-items-center">
                         <?php
                              $fecha = get_post_meta(get_the_ID(), 'edc_cursos_fecha_inicio_curso', true);
                              $hora = get_post_meta(get_the_ID(), 'edc_cursos_hora_inicio_clase', true);
                              $costo = get_post_meta(get_the_ID(), 'edc_cursos_costo', true);

                         ?>
                         <div>
                              <p class="m-0 font-weight-bold">Fecha Inicio: 
                                        <span class="font-weight-normal"> <?php echo $fecha; ?> </span> 
                              </p>
                              <p class="m-0 font-weight-bold">Hora: 
                                   <span class="font-weight-normal"> <?php echo $hora; ?> </span> 
                               </p>
                         </div>

                         <span class="badge badge-secondary p-2">$ <?php echo money_format('%i', $costo); ?></span>
                    </div>     <!--.card-meta-->
                    <div class="card-body">
                         <h3 class="card-title"><?php the_title(); ?></h3>
                         <p class="card-subtitle mb-2">
                              <?php echo get_post_meta(get_the_ID(), 'edc_cursos_subtitulo', true); ?>
                         </p>
                         <p class="card-text">
                              <?php echo wp_trim_words( get_the_content(), 10, '.'  ); ?>
                         </p>
                         <a href="<?php the_permalink(); ?>" class="btn btn-primary d-block d-md-inline">Más Información</a>
                    </div>
               </div><!--.card-->
          </div><!--.col-md-6-->


     <?php
     endwhile; wp_reset_postdata();
}