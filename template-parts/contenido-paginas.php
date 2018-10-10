<?php $html = edc_imagen_destacada( get_the_ID() );  
     // $html[0] retorna el HTML
     // $html[1] retornar si la imagen existe

     echo $html[0];
?>

<main class="container">
     <div class="row justify-content-center">
          <div class="py-3 px-5 contenedor-principal bg-light <?php echo $html[1] ? 'col-md-8 destacada' : 'col-md-12 no-destacada';  ?>">

          
               <h1 class="text-center my-5 separador"><?php the_title(); ?></h1>
               <?php the_content(); ?>
          </div>
     </div><!--.row-->
</main>