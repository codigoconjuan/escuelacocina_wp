<div class="row justify-content-center">
     <div class="col-md-8">
          <?php comment_form(); ?>
     </div>
     <div class="col-md-8">
          <h2 class="text-center my-4">Comentarios</h2>
          <ul class="lista-comentarios alert list-unstyled">
               <?php 
                    $comentarios = get_comments(array(
                         'post_id' => $post->ID,
                         'status' => 'approve'
                    ) );
                    wp_list_comments(array(
                         'per_page' => 10,
                         'reverse_top_level' => false
                    ), $comentarios);
               ?>
          </ul>
     </div>
</div>