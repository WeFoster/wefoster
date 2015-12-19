<?php
/**
 * Register our Customizer Panels.
 *
 * @since 1.0.0
 */
function wff_register_sections( $wp_customize ) {
	$wp_customize->add_section( 'wf_plus_stylekit_section', array(
		'title'       => __( 'Choose Stylekits', 'wefoster' ),
		'priority'    => 1,
		'description' => __( 'Change the way your site header looks', 'wefoster' ),
	) );

	$wp_customize->add_section( 'wf_plus_body_section', array(
		'title'       => __( 'Body', 'wefoster' ),
		'priority'    => 10,
		'panel'       => 'wf_plus_appearance_panel',
		'description' => __( 'This section allows you to quickly change the layout of your community.', 'wefoster' ),
	) );

	$wp_customize->add_section( 'wf_plus_logo_section', array(
		'title'       => __( 'Logo', 'wefoster' ),
		'priority'    => 10,
		'panel'       => 'wf_plus_appearance_panel',
		'description' => __( 'Choose or upload a custom logo', 'wefoster' ),
	) );

	$wp_customize->add_section( 'wf_plus_header_section', array(
		'title'       => __( 'Header', 'wefoster' ),
		'priority'    => 10,
		'panel'       => 'wf_plus_appearance_panel',
		'description' => __( 'Change the way your site header looks', 'wefoster' ),
	) );

	$wp_customize->add_section( 'wf_plus_content_section', array(
		'title'       => __( 'Content Area', 'wefoster' ),
		'panel'       => 'wf_plus_appearance_panel',
		'priority'    => 10,
		'description' => __( 'Change the way your content area looks', 'wefoster' ),
	) );

	$wp_customize->add_section( 'wf_plus_sidebar_section', array(
		'title'       => __( 'Sidebar', 'wefoster' ),
		'panel'       => 'wf_plus_appearance_panel',
		'priority'    => 10,
		'panel'       => 'wf_plus_appearance_panel',
		'description' => __( 'Change the way your site header looks', 'wefoster' ),
	) );

	$wp_customize->add_section( 'wf_plus_footer_section', array(
		'title'       => __( 'Footer', 'wefoster' ),
		'priority'    => 10,
		'panel'       => 'wf_plus_appearance_panel',
		'description' => __( 'Change the way your site footer looks', 'wefoster' ),
	) );

	$wp_customize->add_section( 'wf_plus_admin_bar_section', array(
		'title'       => __( 'Admin Bar', 'wefoster' ),
		'priority'    => 10,
		'panel'       => 'wf_plus_appearance_panel',
		'description' => __( 'Show or Hide the Admin Bar', 'wefoster' ),
	) );

	if ( function_exists( 'bp_is_member' ) ) {

		// buddypress
		$wp_customize->add_section( 'wf_plus_bp_general_section', array(
			'title'       => __( 'General', 'wefoster' ),
			'priority'    => 10,
			'panel'       => 'wf_plus_buddypress_panel',
			'description' => __( 'General BuddyPress Settings', 'wefoster' ),
		) );

		$wp_customize->add_section( 'wf_plus_members_section', array(
			'title'       => __( 'Members Directory', 'wefoster' ),
			'priority'    => 10,
			'panel'       => 'wf_plus_buddypress_panel',
			'description' => __( 'Change the Members Directory', 'wefoster' ),
		) );

		$wp_customize->add_section( 'wf_plus_member_profiles_section', array(
			'title'       => __( 'Member Profiles', 'wefoster' ),
			'priority'    => 10,
			'panel'       => 'wf_plus_buddypress_panel',
			'description' => __( 'Change Member Profiles', 'wefoster' ),
		) );

		$wp_customize->add_section( 'wf_plus_groups_section', array(
			'title'       => __( 'Groups Directory', 'wefoster' ),
			'priority'    => 10,
			'panel'       => 'wf_plus_buddypress_panel',
			'description' => __( 'Change the Groups Directory', 'wefoster' ),
		) );

		$wp_customize->add_section( 'wf_plus_single_groups_section', array(
			'title'       => __( 'Single Groups', 'wefoster' ),
			'priority'    => 10,
			'panel'       => 'wf_plus_buddypress_panel',
			'description' => __( 'Single Groups', 'wefoster' ),
		) );

		$wp_customize->add_section( 'wf_plus_activity_section', array(
			'title'       => __( 'Activity', 'wefoster' ),
			'priority'    => 10,
			'panel'       => 'wf_plus_buddypress_panel',
			'description' => __( 'Change the Activity Directory', 'wefoster' ),
		) );
	}

	$wp_customize->add_section( 'wf_plus_featured_images_section', array(
		'title'       => __( 'Featured Images', 'wefoster' ),
		'priority'    => 10,
		'panel'       => 'wf_plus_wordpress_panel',
		'description' => __( 'Change the Featured Image Dimensions', 'wefoster' ),
	) );

	// Typography
	$wp_customize->add_section( 'wf_plus_typography_body_section', array(
		'title'       => __( 'Global', 'wefoster' ),
		'priority'    => 10,
		'panel'       => 'wf_plus_typography_panel',
		'description' => __( 'Change the Global Font Settings', 'wefoster' ),
	) );

}
add_action( 'customize_register', 'wff_register_sections', 1000 );
