<?php
// This template adds the BuddyPress Cover Photos into Member and Group headers.
// The size is based on the Default Post Thumb sizes OR the customizer settings.
// If no image is found a default fallback is used based on the constants you've set.
//
$option = get_theme_mod( 'wf_plus_featured_image_default_sizes' );

if ( $option == 'custom' ) {
  $settings['width']  = get_theme_mod ('wf_plus_featured_image_width');
  $settings['height'] = get_theme_mod ('wf_plus_featured_image_height');
} else {
  $settings['width']  = WEFOSTER_POST_THUMBNAIL_WIDTH;
  $settings['height'] = WEFOSTER_POST_THUMBNAIL_HEIGHT;
};

if ( bp_is_user() ) {
$cover_image_url = bp_attachments_get_attachment( 'url', array(
  'object_dir' => 'members',
  'item_id'    => bp_displayed_user_id(),
  ) );
} else {
  $cover_image_url = bp_attachments_get_attachment( 'url', array(
    'object_dir' => 'groups',
    'item_id'    => bp_get_current_group_id(),
    ) );
}

$src = wpthumb( $cover_image_url, 'width=' . $settings['width'] .'&height=' . $settings['height'] . '&crop=true');

?>

<div class="negative-row no-padding postthumb <?php do_action('postthumb_class'); ?>"
    style="height:<?php echo $settings['height'] ?>px; background-image: url(<?php echo $src; ?> );"
  >
    <?php do_action('open_post_thumbnail'); ?>

</div>
