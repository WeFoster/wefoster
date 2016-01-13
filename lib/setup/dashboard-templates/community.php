<div class="wf-admin-intro wf-admin-box">
	Staying up to date about community news, plugin & theme updates and articles/tutorials to improve your site is always a smart idea. There are countless blogs dedicated to writing about WordPress and BuddyPress, and as a site owner it’s important to know about what’s happening in the (developer) community.
</div>

	<h4>Recent Articles</h4>

<div class="community-news wf-grid">
	<?php
  // Grab Some Recent Posts
	$posts = wff_get_community_posts();

	if( empty( $posts ) ) {
			return;
	}
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
	?>
</div>
