<?php do_action('before_bp_page_content'); ?>
<?php while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php do_action('after_bp_page_content'); ?>
