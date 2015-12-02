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
