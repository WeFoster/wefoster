<div class="post-loop <?php do_action( 'wf_post_loop_class' ); ?>">
	<article <?php post_class(); ?>>

		<header>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<a href="<?php the_permalink(); ?>">
				<?php
				get_template_part( 'templates/parts/post-thumbnail' );
				?>
			</a>
			<?php get_template_part( 'templates/parts/entry-meta' ); ?>
		</header>


		<div class="entry-summary intro-paragraph">
			<?php wff_smart_excerpt(); ?>
		</div>

		<?php get_template_part( 'templates/parts/entry-tags' ); ?>
	</article>
</div>
