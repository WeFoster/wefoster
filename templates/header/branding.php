<?php
/**
 * This is the template that controls the header branding
 *
 * @since 1.0
 * @package WeFoster Framework
 */
?>


<div class="visible-md-block visible-lg-block">
	<a class="navbar-brand" title="<?php echo get_bloginfo( 'name' ); ?> | <?php echo get_bloginfo( 'description' ); ?> "
	   href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php do_action( 'wf_inside_branding' ); ?>
	</a>
</div>
