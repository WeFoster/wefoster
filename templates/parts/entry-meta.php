<div class="post-meta <?php do_action( 'post_meta_class' ); ?>">
	<?php do_action( 'open_post_meta' ); ?>
	<span>
		<time class="published" datetime="<?php echo get_the_time( 'c' ); ?>"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></time>
	</span>
	<span class="byline author vcard">
		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author" class="fn"><i
				class="fa fa-user"></i> <?php echo get_the_author(); ?></a>
	</span>

	<?php if ( has_category() ): ?>
		<span class="byline category hidden-xs">
		<i class="fa fa-folder"></i>
			<?php the_category( ', ' ); ?>
		</span>
	<?php endif; ?>

	<?php if ( ! is_category() ): ?>
		<span class="pull-right comments">
		<i class="fa fa-comment"></i>
			<?php
			comments_popup_link(
				__( 'No Comments', 'wefoster' ),
				__( '1 Comment', 'wefoster' ),
				__( '% Comments', 'wefoster' )
			);
			?>
	</span>
	<?php endif; ?>
	<?php do_action( 'close_post_meta' ); ?>
</div>
