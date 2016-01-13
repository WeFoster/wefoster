<div class="wf-admin-intro wf-admin-box">
	Staying up to date about community news, plugin & theme updates and articles/tutorials to improve your site is always a smart idea. There are countless blogs dedicated to writing about WordPress and BuddyPress, and as a site owner it’s important to know about what’s happening in the (developer) community.
</div>

	<h4>Recent Articles</h4>

<div class="community-news wf-grid">
	<?php
  // Grab Some Recent Posts
	$response = wp_remote_get( 'https://wefoster.co/wp-json/wp/v2/posts/?filter[orderby]=date&per_page=6' );

	if ( is_wp_error( $response ) ) {
		return;
	}
		$posts = json_decode( wp_remote_retrieve_body( $response ) );

		// echo '<pre>' . print_r($posts) . '</pre>';
	if ( empty( $posts ) ) {
		return;
	}

	if ( ! empty( $posts ) ) {

		foreach ( $posts as $post ) {
			?>
			<div class="wf-post-content wf-grid__col-4">
				<div class="wf-inner-grid wf-admin-box">
					<a target="_blank" href="<?php echo $post->link; ?>">
					<?php if ( $post->better_featured_image->media_details->sizes->medium->source_url == "" ): ?>
							<img src="https://cdn.wefoster.co/backgrounds/autumn-desk.jpeg" alt="<?php echo $post->title->rendered; ?>">
					<?php else: ?>
											<img src="<?php echo $post->better_featured_image->media_details->sizes->medium->source_url; ?>" alt="<?php echo $post->title->rendered; ?>">
					<?php endif; ?>

						<h4>
							<?php echo $post->title->rendered; ?>
						</h4>
					</a>
					<p>
						<?php echo $post->excerpt->rendered; ?>
					</p>
					<br>
					<br>
					<a target="_blank" class="btn btn-primary" href="<?php echo $post->link; ?>">Read Article</a>
				</div>
			</div>
			<?php }
	}
	?>
</div>
