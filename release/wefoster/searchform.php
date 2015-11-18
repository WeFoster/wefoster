<?php
/**
* A custom search form template
*
* @since 1.0
* @package WeFoster Framework
*/
?>
<?php do_action('before_search_form'); ?>
<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url('/'); ?>">

	<?php do_action('open_search_form'); ?>

	<div class="input-group">

		<input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search', 'wefoster'); ?> <?php bloginfo('name'); ?>">

		<label class="hide">
			<?php _e('Search for:', 'wefoster'); ?>
		</label>

		<span class="input-group-btn">
				<button type="submit" class="search-submit btn btn-default">

					<div class="text-hide">Search</div>
					<i class="fa fa-search
					"></i>

				</button>
		</span>

	</div>

		<?php do_action('close_search_form'); ?>
</form>
	<?php do_action('after_search_form'); ?>
