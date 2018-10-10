<aside  class="col-lg-3 col-md-4 bg-primary p-4">
            <?php
               if( !is_active_sidebar('sidebar_widget')) {
                    return;
               }
               dynamic_sidebar('sidebar_widget');
            ?>
</aside>