<?php do_action( 'wf_before_bp_page_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<?php do_action( 'wf_after_bp_page_content' ); ?>
