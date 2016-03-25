<ul id="dropdown-filter" class="js-flash">

	<?php do_action( 'wf_bp_activity_syndication_options' ); ?>

	<li id="activity-filter-select" class="last">

		<label for="activity-filter-by"><?php _e( 'Show:', 'buddypress' ); ?></label>

		<select id="activity-filter-by">
			<option value="-1"><?php _e( '&mdash; Everything &mdash;', 'buddypress' ); ?></option>

			<?php bp_activity_show_filters(); ?>

			<?php do_action( 'wf_bp_activity_filter_options' ); ?>

		</select>
		
	</li>
</ul>
