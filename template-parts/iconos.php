<section class="nosotros mt-5 container">
     <?php $titulo = get_post_meta( get_the_ID(), 'edc_group_titulo_iconos' , true); ?>
     <h2 class="text-center mb-5 separador"><?php echo $titulo; ?></h2>

     <div class="row justify-content-center">
          <?php 
               $iconos = get_post_meta( get_the_ID(), 'edc_group_nosotros' , true); 
               foreach($iconos as $icono) {
          ?>
               <div class="col-md-4 text-center informacion">
                    <img src="<?php echo $icono['imagen_icono']; ?>" alt="icono" class="img-fluid mb-3">
                    <h3><?php echo $icono['titulo_icono']; ?></h3>
                    <p><?php echo $icono['desc_icono']; ?></p>
               </div> <!--col-md-4-->
          <?php } ?>
     </div>
</section>