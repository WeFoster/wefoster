<?php
//Are we on a category archive?
if ( is_category() ):
  $category_description = category_description();
  if ( !empty( $category_description ) ) {
    echo '<div class="box-intro tag-description">';
      print $category_description;
    echo '</div>';
  }
endif;

//Or taxonomy?
if ( is_tax() ):
  $tax_description = tag_description();
  if ( ! empty( $tax_description ) ) {
    echo '<div class="box-intro tag-description">';
        echo  $tax_description ;
    echo '</div>';
  }
endif;

//Or tag?
if ( is_tag() ):
  //Show The tag box when on a Tags Page
  $tag_description = term_description();
      if ( ! empty( $tag_description ) ) {
      echo '<div class="box-intro tag-description">';
          echo $tag_description ;
      echo '</div>';
    }
endif;

//Or is this the author archive??
if ( is_author() ):
  // queue the first post, that way we know who the author is when we
  // try to get their name, URL, description, avatar, etc.
  if ( have_posts() ):
    the_post();
    // if a user has filled out their description, show a bio on their entries.
    if ( get_the_author_meta( 'description' ) ):
      get_template_part('templates/parts/author-box');
    endif;
    // reset the loop so we don't break later queries
    rewind_posts();
  endif;
endif;
