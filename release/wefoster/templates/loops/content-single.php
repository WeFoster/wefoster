<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

    <header>
      <?php do_action('before_single_header'); ?>
      <div class="page-header <?php do_action('page_header_class'); ?>">
        <?php do_action('open_single_header'); ?>
        <h1>
          <?php echo wff_title(); ?>
        </h1>
        <?php do_action('close_single_header'); ?>
      </div>
      <?php
        // Used for the Post Meta see lib/actions.php
        do_action('after_single_header');
      ?>
    </header>

    <?php do_action('before_entry_content'); ?>
    <div class="entry-content <?php do_action('entry_content_class'); ?>">
      <?php do_action('open_entry_content'); ?>
        <?php the_content(); ?>
      <?php do_action('close_entry_content'); ?>
    </div>
    <?php do_action('after_entry_content'); ?>


    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'wefoster'), 'after' => '</p></nav>')); ?>
    </footer>

    <?php if ( comments_open() ): ?>
        <?php comments_template('/templates/parts/comments.php'); ?>
   <?php else: ?>
  	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wefoster' ); ?></p>
    <?php endif?>


  </article>
<?php endwhile; ?>
