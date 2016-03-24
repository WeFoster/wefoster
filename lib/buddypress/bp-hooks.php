<?php
/**
 * Modifies BuddyPress templates via hooks.
 */

/**
 * Show a message when an activity stream filter is active
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wff_activity_filter_warning' ) ) {
	function wff_activity_filter_warning() {
		?>
		<div id="activity-filter-notice">
			<i class="fa fa-lightbulb-o"></i> <?php _e( 'You are filtering your newsfeed to only see <span></span>. <a href="#" id="reset">Click here to reset</a>', 'wefoster' ); ?>
		</div>
		<?php
	}

	add_action( 'bp_after_activity_post_form', 'wff_activity_filter_warning' );
}
?>
