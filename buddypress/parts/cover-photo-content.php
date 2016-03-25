<?php
if ( $option == 'custom' ) {
	$settings['width']  = get_theme_mod( 'wf_plus_bp_cover_photo_width' ) - 40;
	$settings['height'] = get_theme_mod( 'wf_plus_bp_cover_photo_height' ) - 40;
} else {
	$settings['width']  = WEFOSTER_DEFAULT_BP_COVER_WIDTH - 40;
	$settings['height'] = WEFOSTER_DEFAULT_BP_COVER_HEIGHT - 40;
};
?>

<div class="<?php do_action( 'wf_class_content_wrapper' ); ?> bp-cover-photo-content">

	<?php do_action( 'wf_open_bp_cover_photo_content' ); ?>

	<div class="inner-cover-photo <?php do_action( 'wf_class_main' ); ?>">
		<?php get_template_part( 'buddypress/page-header' ); ?>
	</div>

	<div class="sidebar <?php do_action( 'wf_class_sidebar' ); ?>">
		<div class="avatar-height-wrapper" style="height:<?php echo $settings['height'] ?>px;">
			<?php if ( bp_is_user() ) {
				get_template_part( 'buddypress/members/profile-photo' );
			} else {
				get_template_part( 'buddypress/groups/group-photo' );
			}
			?>
		</div>
	</div>

	<?php do_action( 'wf_close_bp_cover_photo_content' ); ?>

</div>
