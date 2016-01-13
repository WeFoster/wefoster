<div class="wf-admin-intro wf-admin-box">
  Below you'll find all the available documentation for the WeFoster theme for both site owners and developers. Please let us know if you get stuck or would like to learn more about using the theme.
</div>

<h2 class="box-light padding-half margin-bottom-none">Site Owner Documentation</h2>

<ul class="wf-doc-list wf-admin-box">
<?php
// Grab Some Recent Posts
$response = wp_remote_get('https://documentation.wefoster.co/wp-json/wp/v2/wpkb-article?filter[taxonomy]=wpkb-category&filter[term]=wefoster-theme');

if ( is_wp_error( $response ) ) {
	return;
}
	$posts = json_decode( wp_remote_retrieve_body( $response ) );

if ( empty( $posts ) ) {
	return;
}

if ( ! empty( $posts ) ) {

	foreach ( $posts as $post ) {
		?>
		<li class="wf-doc">
				<a target="_blank" href="<?php echo $post->link; ?>">
						<i class="fa fa-file-text-o"></i> <?php echo $post->title->rendered; ?>
				</a>
		</li>
		<?php }
}
?>
</ul>

<h2 class="box-light padding-half margin-bottom-none">Developer Docs</h2>

<ul class="wf-doc-list wf-admin-box">
<?php
// Grab Some Recent Posts
$response = wp_remote_get('https://documentation.wefoster.co/wp-json/wp/v2/wpkb-article?filter[taxonomy]=wpkb-category&filter[term]=developers');

if ( is_wp_error( $response ) ) {
	return;
}
	$posts = json_decode( wp_remote_retrieve_body( $response ) );

if ( empty( $posts ) ) {
	return;
}

if ( ! empty( $posts ) ) {

	foreach ( $posts as $post ) {
		?>
		<li class="wf-doc">
				<a target="_blank" href="<?php echo $post->link; ?>">
						<i class="fa fa-file-text-o"></i> <?php echo $post->title->rendered; ?>
				</a>
		</li>
		<?php }
}
?>
</ul>
