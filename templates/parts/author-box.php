<?php if ( get_the_author_meta( 'description' ) ): ?>
	<div class="author-bio wf-grid wf-grid--align-center <?php do_action( 'wf_author_bio_class' ); ?>">
		<?php
		do_action( 'wf_open_author_box' );
		?>
			<?php if ( ! is_archive() ): ?>
				<h3>
					Who is <?php the_author_link(); ?>
					<a class="all-author-posts" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<i class="fa fa-arrow-circle-right"></i> <?php printf( __( 'View all posts by %s', 'wefoster' ), get_the_author() ); ?>
					</a>
				</h3>
			<?php endif ?>
			<div class="avatar wf-grid__col-2 padding-none">
				<?php
				print get_avatar( get_the_author_meta( 'user_email' ), '100' );
				?>
			</div>
			<div class="author-text wf-grid__col-10">
					<?php the_author_meta( 'description' ); ?>
			</div>

		<?php
		do_action( 'wf_close_author_box' );
		?>
	</div>
<?php endif ?>
