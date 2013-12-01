<?php
/*
Template Name: gallery
*/
?>

<?php get_header(); ?>

<div class="content gallery">
  <div class="p-grid p-grid-row">
    <div class="p-1">
      <h1 class="title">Gallery</h1>
      <?php
        // get all the categories from the database
        $cats = get_categories(); 
 
        // loop through the categries
        foreach ($cats as $cat) {
          // setup the cateogory ID
          $cat_id= $cat->term_id;
          $count = 1;
          query_posts("cat=$cat_id");
          
          echo "<h3>".$cat->name."</h3>";

          if (have_posts()) : while (have_posts()) : the_post();
             
            if ($count == 1) {
              echo "<div class='p-grid-row'>";
            }

            get_template_part( 'templates/piece', 'tmpl' );

            if ($count == 3) {
              echo "</div>";
              $count = 0;
            }
            $count++;

          endwhile; endif; 
          
          if ($count <= 3 && $count > 1) {
            echo "</div>";
          }
          
          ?>
        <?php } // done foreach ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>