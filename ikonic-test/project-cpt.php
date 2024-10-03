<?php

/** Create Projects CPT **/

function mjb_projects_cpt() {

	/**
	 * Post Type: Projects.
	 */

	$labels = [
		"name" => esc_html__( "Projects", "ikonic-test" ),
		"singular_name" => esc_html__( "Project", "ikonic-test" ),
	];

	$args = [
		"label" => esc_html__( "Projects", "ikonic-test" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => [ "slug" => "projects", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"taxonomies" => [ "category", "post_tag" ],
		"show_in_graphql" => false,
	];

	register_post_type( "projects", $args );
}

add_action( 'init', 'mjb_projects_cpt' );