<div class="wf-admin-intro wf-admin-box">
	Below you'll find all the available documentation for the WeFoster theme, for both site owners and developers. Please let us know if you get stuck or would
	like to learn more about using the theme.
</div>

<h2 class="box-light padding-half margin-bottom-none">Site Owner Documentation</h2>

<ul class="wf-doc-list wf-admin-box">
	<?php
	// Grab Some Recent Posts
	$posts = wff_get_theme_docs();

	if ( empty( $posts ) ) {?>
		<div class="wf-post-content">
				We were unable to retrieve the documentation articles.... Please try again later!
		</div>
		<?php return;
	}
	foreach ( $posts as $post ) {
		?>
		<li class="wf-doc">
			<a target="_blank" href="<?php echo $post->link; ?>">
				<i class="fa fa-file-text-o"></i> <?php echo $post->title->rendered; ?>
			</a>
		</li>
	<?php }
	?>
</ul>

<h2 class="box-light padding-half margin-bottom-none">Developer Documentation</h2>

<ul class="wf-doc-list wf-admin-box">
	<?php
	// Grab Some Recent Posts
	$posts = wff_get_developer_docs();

	if ( empty( $posts ) ) {
		return;
	}
	foreach ( $posts as $post ) {
		?>
		<li class="wf-doc">
			<a target="_blank" href="<?php echo $post->link; ?>">
				<i class="fa fa-file-text-o"></i> <?php echo $post->title->rendered; ?>
			</a>
		</li>
	<?php }
	?>
</ul>
