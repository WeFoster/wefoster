<?php do_action( 'before_full_header' ); ?>

<div class="full-header-wrap container-fluid">

	<?php do_action( 'open_full_header' ); ?>

	<?php
	//Load site description. Note: can be hidden with a constant or theme option.
	get_template_part( 'templates/header/' . wff_get_site_description() );
	?>

	<?php do_action( 'close_full_header' ); ?>
</div>
<?php do_action( 'after_full_header' ); ?>
