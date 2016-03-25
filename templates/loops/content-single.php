<article <?php post_class(); ?>>

	<?php
	//This action is used to insert the Post Title/Post Meta & Post Thumbnail
	do_action( 'wf_before_entry_content' );
	?>

	<div class="entry-content <?php do_action( 'wf_entry_content_class' ); ?>">
		<?php do_action( 'wf_open_entry_content' ); ?>
		<?php the_content(); ?>
		<?php do_action( 'wf_close_entry_content' ); ?>
	</div>
	<?php do_action( 'wf_after_entry_content' ); ?>


	<footer>
		<?php wp_link_pages( array( 'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'wefoster' ), 'after' => '</p></nav>' ) ); ?>
	</footer>

	<?php if ( comments_open() ): ?>
		<?php comments_template( '/templates/parts/comments.php' ); ?>
	<?php else: ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wefoster' ); ?></p>
	<?php endif ?>


</article>
