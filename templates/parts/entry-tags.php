<div class="post-entry-bottom <?php do_action( 'entry_meta_class' ); ?>">
	<?php if ( has_tag() ): ?>
		<i class="fa fa-tags"></i>
		<?php
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', '_s' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'wefoster' ) . '</span>', $tags_list );
		}
		?>
	<?php endif; ?>

	<?php if ( ! is_single() ): ?>
		<span class="pull-right read-more">
    <i class="fa fa-arrow-circle-right"></i>
      <a class="read-more-link" href="<?php the_permalink(); ?>">Read More</a>
  </span>
	<?php endif; ?>

</div>
