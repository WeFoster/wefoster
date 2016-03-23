<?php
//Assign our Fields
$title = get_the_title();
$effect = get_theme_mod('wf_hero_background_image_color');
$opacity = get_theme_mod('wf_hero_background_image_opacity', '0.5');
$style = get_theme_mod('wf_hero_header_style', 'box-brand-primary');

$post = $wp_query->post;
$post_id = $post->ID;
$post_object = get_post( $post_id );

//Images
if (get_theme_mod('wf_hero_background_type', 'picture' ) == 'upload') {
  $image_url = get_theme_mod('wf_hero_background_image');
  $image = wpthumb( $image_url, 'width=1600&crop=0');
} elseif ( get_theme_mod('wf_hero_background_type', 'picture') == 'picture' ) {
  $image_url = get_theme_mod('wf_hero_background_picture', WEFOSTER_HERO_BACKGROUND );
  $image = wpthumb( $image_url, 'width=1600&crop=0');
}
?>

<div class="wf-hero box-vertical-full margin-bottom-full <?php echo $style; ?> darken" style="min-height: <?php echo $height;?>vh;">
  <div class="wf-hero-background <?php echo $effect;?>" style="background-image: url(<?php echo $image; ?>); opacity: <?php echo $opacity;?>;">
  </div>
  <div class="wf-hero-content wf-grid wf-grid--align-center padding-full">
    <div class="padding-left-none <?php do_action('class_content_wrapper');?>">

            <h1 class="wf-hero-title margin-top-none padding-top-none">
              <?php echo $title; ?>
            </h1>

            <div class="padding-left-none wf-hero-excerpt margin-top-half col-sm-7">
                <?php
                  //Does the homepage have content?
                  if( empty( $post_object->post_content ) ) {
                    //if not show default welcome
                    wff_homepage_welcome_text();
                  } else {
                    echo do_shortcode( $post_object->post_content );
                  }
                ?>
            </div>

            <div class="wf-hero-widgets col-sm-5">
              <?php
              dynamic_sidebar( 'Hero Header Right' );
              ?>
            </div>

    </div>
  </div>
</div>
