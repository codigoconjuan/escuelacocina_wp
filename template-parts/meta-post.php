<div class="meta pt-2 pt-md-0">
     <p class="m-0">
          Escrito el: <span>
                         <?php the_time( get_option('date_format') ); ?>
                    </span> 
          por 
          <a href="<?php 
                         echo get_author_posts_url(get_the_author_meta('ID'),
                         get_the_author_meta('user_nicename') ); ?>"><?php the_author();
                    ?>
          </a>
     </p>
</div>