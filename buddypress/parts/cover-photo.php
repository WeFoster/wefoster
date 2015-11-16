<?php
// This template adds the BuddyPress Cover Photos into Member and Group headers.
// The size is based on the Default Post Thumb sizes OR the customizer settings.
// If no image is found a default fallback is used based on the constants you've set.
//
$member_cover_image_url = bp_attachments_get_attachment( 'url', array(
  'object_dir' => 'members',
  'item_id'    => bp_displayed_user_id(),
  ) );
$src = wpthumb( $member_cover_image_url);
?>

<div class="negative-row no-padding postthumb <?php do_action('postthumb_class'); ?>"
    style="height:<?php echo $height ?>px; background-image: url(<?php echo $src; ?> );"
  >

    <?php do_action('open_post_thumbnail'); ?>

</div>
