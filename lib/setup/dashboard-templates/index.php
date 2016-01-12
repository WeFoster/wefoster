<div class="wf-welcome-header row">

  <div class="col-sm-8">
      <h2>Thank you for using the WeFoster Theme</h2>

      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
      </p>
  </div>

  <div class="screenshot col-sm-4">
    <img class="img-responsive" src="<?php echo get_template_directory_uri()?>/screenshot.png" alt="" />
  </div>

<div class='clearfix'></div>

  <!-- Nav tabs -->
  <ul id="wf-welcome-tabs" class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#whats-new" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-rocket"></i> What's New</a></li>
    <li role="presentation"><a href="#credits" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-heart"></i> Credits</a></li>
    <li role="presentation"><a href="#documentation" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-file-text-o"></i> Documentation</a></li>
    <li role="presentation"><a href="#community" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-leaf"></i> Community</a></li>
    <li class="pull-right wefoster-plus-tab" role="presentation"><a href="#wefoster-plus" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-leaf"></i> Update to WeFoster Plus</a></li>
  </ul>

</div>

<div class="wrap about-wrap wefoster-welcome">

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="whats-new">
			<?php get_template_part( 'lib/setup/dashboard-templates/whats-new' );?>
		</div>
    <div role="tabpanel" class="tab-pane" id="credits">
    	<?php get_template_part( 'lib/setup/dashboard-templates/credits' );?>
    </div>
    <div role="tabpanel" class="tab-pane" id="documentation">
    	<?php get_template_part( 'lib/setup/dashboard-templates/documentation' );?>
    </div>
    <div role="tabpanel" class="tab-pane" id="community">
    	<?php get_template_part( 'lib/setup/dashboard-templates/community' );?>
    </div>
    <div role="tabpanel" class="tab-pane" id="wefoster-plus">
    	<?php get_template_part( 'lib/setup/dashboard-templates/wefoster-plus' );?>
    </div>
  </div>


</div>
