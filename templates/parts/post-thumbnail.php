<?php
if ( has_post_thumbnail() ) {
// First we're going to register our default sizes.
// You can easily overwrite the thumbnail sizes in your theme or plugin.
// See: https://github.com/WeFoster/developer-library/blob/master/filters/change-post-thumbnail-sizes.php
$sizes = apply_filters( 'wff_post_thumbnail_sizes', array(
    'width' => WEFOSTER_POST_THUMBNAIL_WIDTH,
    'height' => WEFOSTER_POST_THUMBNAIL_HEIGHT,
    'width_full' => WEFOSTER_POST_THUMBNAIL_WIDTH_FULL,
    'height_full' => WEFOSTER_POST_THUMBNAIL_HEIGHT_FULL
   )
);

// Let's assign the right thumbnail sizes based on the template being used
if ( is_page_template( 'templates/template-full-width.php' ) ):
  $height = $sizes['height_full'];
  $width = $sizes['width_full'];
else:
  $height = $sizes['height'];
  $width = $sizes['width'];
endif;

//Finally output the image as an URL so we can set it as the background. This is the most flexible
// solution that ensure that the image is shown and cropped properly on all devices.
$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'width=' . $width .'&height=' . $height . '&crop=true')
?>

  <div class="negative-row no-padding postthumb <?php do_action('postthumb_class'); ?>"
    style="height:<?php echo $height ?>px; background-image: url(<?php echo $src[0]; ?> );"
  >

    <?php
      //Used to show the Post Author Avatar
      do_action('open_post_thumbnail');
    ?>

  </div>

<?php } ?>
