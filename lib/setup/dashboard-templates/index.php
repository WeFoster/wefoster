<div class="wf-welcome-header row">

	<div class="col-sm-8">
		<h2>Thank you for choosing the WeFoster Theme!</h2>

		<p>
			This page serves as a getting started guide for quickly getting up and running with your community. Whether you're new to BuddyPress & WordPress or
			already an expert, we're here to help you build better communities!
		</p>
	</div>

	<div class="screenshot col-sm-4">
		<img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/screenshot.png" alt=""/>
	</div>

	<div class='clearfix'></div>

	<!-- Nav tabs -->
	<ul id="wf-welcome-tabs" class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#whats-new" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-rocket"></i> Get
				Started</a></li>
		<li role="presentation"><a href="#community" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-leaf"></i> Community</a></li>
		<!-- <li role="presentation"><a href="#credits" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-heart"></i> What's New</a></li> -->
		<li role="presentation"><a href="#wf-documentation" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-file-text-o"></i>
				Documentation</a></li>
		<li class="wefoster-plus-tab" role="presentation"><a href="https://wefoster.co/products/wefoster-plus/" aria-controls="settings" target="_blank"><i
					class="fa fa-leaf"></i> WeFoster Plus</a></li>
	</ul>

</div>

<div class="wrap about-wrap wefoster-welcome container-fluid">

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active wf-getting-started" id="whats-new">
			<?php get_template_part( 'lib/setup/dashboard-templates/get-started' ); ?>
		</div>
		<div role="tabpanel" class="tab-pane" id="credits">
			<?php get_template_part( 'lib/setup/dashboard-templates/credits' ); ?>
		</div>
		<div role="tabpanel" class="tab-pane" id="wf-documentation">
			<?php get_template_part( 'lib/setup/dashboard-templates/documentation' ); ?>
		</div>
		<div role="tabpanel" class="tab-pane" id="community">
			<?php get_template_part( 'lib/setup/dashboard-templates/community' ); ?>
		</div>
	</div>

	<hr>

	<div class="feature-section under-the-hood three-col">
		<div class="col">
			<h4><i class="fa fa-coffee"></i> Connect with us</h4>
			<p>
				Receive the latest updates about BuddyPress and the best community building tips on your social network of choice.
			</p>
			<p>
			<ul class="social-icons icon-circle icon-zoom list-unstyled list-inline">
				<li><a href="github.com/wefoster"><i class="fa fa-github"></i></a></li>
				<li><a href="https://www.youtube.com/channel/UCRO9cLXHIU1u676w0VBKLhg"><i class="fa fa-youtube"></i></a></li>
				<li><a href="https://twitter.com/wefosterwp"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://www.facebook.com/groups/507508216082619/"><i class="fa fa-facebook"></i></a></li>
			</p>
		</div>
		<div class="col">
			<h4>Are your a Developer?</h4>
			<p>
				Add yourself to the <a href="https://wefoster.co/profile/type/developers">BuddyPress Developers directory</a>! Take on custom development
				projects for our community of users, or get in touch with us via our <a href="https://wefoster.co/contact/">contact form.</a>
			</p>
		</div>
		<div class="col">
			<h4>Our Most Popular Resources</h4>
			<ul id="menu-footer-menu" class="menu">
				<li class="menu-buddypress-hosting"><a href="http://wefoster.co/buddypress-hosting/">BuddyPress Hosting Guide</a></li>
				<li class="menu-premium-buddypress-themes"><a href="http://wefoster.co/buddypress-themes/">BuddyPress Themes</a></li>
				<li class="menu-premium-buddypress-plugins"><a href="http://wefoster.co/buddypress-plugins/">BuddyPress Plugins</a></li>
				<li class="menu-buddypress-community-newsletter"><a href="http://wefoster.co/buddypress-newsletter/">BuddyPress Community Newsletter</a></li>
			</ul>
			<p></p>
		</div>
	</div>

</div>
