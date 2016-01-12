<h2>Community</h2>

<?php
  //Grab Some Recent Posts
	$response = wp_remote_get( 'https://wefoster.co/wp-json/wp/v2/posts/' );

	if( is_wp_error( $response ) ) {
		return;
	}

	$posts = json_decode( wp_remote_retrieve_body( $response ) );

	if( empty( $posts ) ) {
		return;
	}

	if( !empty( $posts ) ) {
		echo '<ul>';
		foreach( $posts as $post ) {
			echo '<li><a href="' . $post->link. '">' . $post->title->rendered . '</a>
      </li>';
		}
		echo '</ul>';
	}
?>
