<?php
/**
 * Template Name: Homepage Template
 *
 * @author Bowe Frankema <bowe@wefoster.co>
 * @link http://wefoster.co
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @since 1.0
 */
?>

<?php get_template_part( 'header' ); ?>

<?php do_action( 'before_homepage' ); ?>

<div id="main-content" class="main col-sm-12" role="main">

	<?php do_action( 'open_homepage' ); ?>

	<div id="top-homepage">

		<?php if ( is_active_sidebar( 'homepage-top-center' ) ) { ?>
			<div class="column col-sm-12">
				<?php
				dynamic_sidebar( 'Homepage Top Center' );
				?>
			</div>
		<?php } ?>

		<div class="clearfix"></div>

		<?php if ( is_active_sidebar( 'homepage-top-left' ) ) { ?>
			<div class="column col-sm-7">
				<?php
				dynamic_sidebar( 'Homepage Top Left' );
				?>
			</div>

			<div id="homepage-sidebar-right" class="col-sm-5">
				<div id="homepage-sidebar">
					<?php
					dynamic_sidebar( 'Homepage Top Right' );
					?>
				</div>
			</div>
		<?php } ?>

	</div>

	<div class="clearfix"></div>

	<?php do_action( 'before_homepage_middle' ); ?>

	<?php if ( is_active_sidebar( 'homepage-center-widget' ) ) { ?>
		<div id="center-homepage-widget" class="col-sm-12">
			<?php
			dynamic_sidebar( 'Homepage Center Widget' );
			?>
		</div>
		<div class="clearfix"></div>
	<?php } ?>

	<?php do_action( 'after_homepage_middle' ); ?>

	<div class="homepage-center-widgets">
		<div id="homepage-widget-left" class="col-sm-4">
			<?php
			dynamic_sidebar( 'Homepage Left' );
			?>
		</div>

		<div id="homepage-widget-middle" class="col-sm-4">
			<?php
			dynamic_sidebar( 'Homepage Middle' );
			?>
		</div>

		<div id="homepage-widget-right" class="col-sm-4">
			<?php
			dynamic_sidebar( 'Homepage Right' );
			?>
		</div>
	</div>

	<?php do_action( 'close_homepage' ); ?>

</div><!-- /.main -->

<?php
do_action( 'after_homepage' );
?>

<?php get_template_part( 'footer' ); ?>
