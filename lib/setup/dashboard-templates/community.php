<div class="wf-admin-intro wf-admin-box">
	Staying up to date about community news, plugin & theme updates and articles/tutorials to improve your site is always a smart idea. There are countless blogs dedicated to writing about WordPress and BuddyPress, and as a site owner it’s important to know about what’s happening in the (developer) community.
</div>

<h2 class="box-light padding-half margin-bottom-none">WeFoster Community Newsletter</h2>
<div class="wf-admin-box">
<p>
	Want to stay up to date about everything that is happening in the world of BuddyPress? Our community newsletter is sent out bi-weekly and contains a carefully curated collection of news, articles and resources that are useful for those who are building their communities using WordPress and BuddyPress.
</p>
	<div id="mc_embed_signup">
			<form action="//wefoster.us11.list-manage.com/subscribe/post?u=5eae74b046d61832422e97744&amp;id=ed2ab6113d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div class="form-group">
							<label for="mce-EMAIL">Subscribe to the BuddyPress Newsletter</label>
							<input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="email address" required style="width: 300px;">
					</div>
					<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary">
			</form>
	</div>
</div>

<h2 class="padding-half margin-bottom-none">From our community..</h2>

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
