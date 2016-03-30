<?php do_action( 'wf_before_page_header' ); ?>

<div class="page-header <?php do_action( 'wf_page_header_class' ); ?>">
	<?php do_action( 'wf_open_page_header' ); ?>
	<h1>
		<?php echo wff_title(); ?><?php edit_post_link( __( '<i class="fa fa-pencil edit-link"></i>', 'wefoster' ) ); ?>
	</h1>
	<?php do_action( 'wf_close_page_header' ); ?>
</div>

<?php do_action( 'wf_after_page_header' ); ?>
