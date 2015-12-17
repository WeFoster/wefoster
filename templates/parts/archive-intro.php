<?php

// show the category box when on a category page
    if ( is_category() ):
?>
        <div class="box-intro category-description">
            <?php
                // get cat desc
                $category_description = category_description();
                // print it?
                if ( !empty( $category_description ) ) {
                    print $category_description;
                }
            ?>
        </div>
<?php
    endif;
?>

<!-- Show The tag box when on a Tags Page -->
<?php
    if ( is_tax() ):
?>
        <div class="box-intro tag-description">
            <?php
                    $tag_description = tag_description();
                    if ( ! empty( $tag_description ) )
                        echo  $tag_description ;
                ?>
            </div>
<?php
    endif;
?>

<!-- Show The tag box when on a Tags Page -->
<?php
    if ( is_tag() ):
?>
        <div class="box-intro taxonomy-description">
            <?php
                    $tag_description = term_description();
                    if ( ! empty( $tag_description ) )
                        echo  $tag_description ;
                ?>
            </div>
<?php
    endif;
?>

<?php
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
?>
