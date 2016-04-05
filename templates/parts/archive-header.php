<?php do_action( 'wf_before_page_header' ); ?>

<header>
	<div class="page-header <?php do_action( 'wf_page_header_class' ); ?>">
		<?php
		do_action( 'wf_open_archive_header' );
		the_archive_title( '<h1>', '</h1>' );
		do_action( 'wf_close_archive_header' );
		?>
	</div>
</header>

<?php do_action( 'wf_after_page_header' ); ?>
