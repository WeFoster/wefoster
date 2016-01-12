<h2>Documentation</h2>

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.

<?php
  //Grab the latest KB Articles
	$response = wp_remote_get( 'https://documentation.wefoster.co/wp-json/wp/v2/wpkb-article?taxonomy=wpkb-category&term=wefoster-theme' );

	if( is_wp_error( $response ) ) {
		return;
	}

	$posts = json_decode( wp_remote_retrieve_body( $response ) );

	if( empty( $posts ) ) {
		return;
	}

  echo '<h4>Latest Knowledge Base Articles</h4>';

	if( !empty( $posts ) ) {
		echo '<ul>';
		foreach( $posts as $post ) {
			echo '<li><a href="' . $post->link. '">' . $post->title->rendered . '</a></li>';
		}
		echo '</ul>';
	}
?>
