<?php

get_header('blantt');

while (have_posts()) {
  the_post();

?>
 
  <div class="container container--narrow page-section">
     

    <div ><?php the_content(); ?></div>

  </div>



<?php }

  get_footer('blantt');

?>