<div class="page-header buddypress-component-title">
	<?php do_action( 'wf_open_page_header' ); ?>
	<?php do_action( 'wf_open_bp_page_header' ); ?>
	<h1>
		<?php the_title(); ?>
		<?php if ( bp_is_user() && bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
			<span class="user-nicename">@<?php bp_displayed_user_mentionname(); ?></span>
			<span class="activity"><?php bp_last_activity( bp_displayed_user_id() ); ?></span>
		<?php endif; ?>
	</h1>
	<?php do_action( 'wf_close_page_header' ); ?>
	<?php do_action( 'wf_close_bp_page_header' ); ?>
</div>
