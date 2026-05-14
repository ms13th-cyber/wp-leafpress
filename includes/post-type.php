<?php

if (!defined('ABSPATH')) exit;

function leafpress_register_post_type() {

	register_post_type('leafpress_marker', [
		'labels' => [
			'name' => 'LeafPress Markers',
			'singular_name' => 'Marker',
		],
		'public' => true,
		'menu_icon' => 'dashicons-location',
		'supports' => ['title', 'thumbnail'],
		'show_in_rest' => true,
	]);

	register_taxonomy(
		'leafpress_category',
		'leafpress_marker',
		[
			'labels' => [
				'name' => 'Categories',
				'singular_name' => 'Category',
			],
			'public' => true,
			'hierarchical' => true,
			'show_in_rest' => true,
		]
	);

}

add_action('init', 'leafpress_register_post_type');