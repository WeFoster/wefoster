<?php if ( is_active_sidebar( 'footer_widget_one' ) ) : ?>
	<!-- footer widgets -->
	<div class="col-sm-6 <?php do_action( 'wf_footer_widget_class' ); ?>" id="footer-widget-one">
		<?php
		dynamic_sidebar( 'footer_widget_one' );
		?>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer_widget_two' ) ) : ?>
	<!-- footer widgets -->
	<div class="col-sm-6 <?php do_action( 'wf_footer_widget_class' ); ?>" id="footer-widget-two">
		<?php
		dynamic_sidebar( 'footer_widget_two' );
		?>
	</div>
<?php endif; ?>
