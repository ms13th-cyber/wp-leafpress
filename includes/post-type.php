<?php

if (!defined('ABSPATH')) exit;

function leafpress_register_post_type() {

	register_post_type('leafpress_marker', [
		'labels' => [
			'name' => 'LeafPressマーカー',
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
				'name' => 'カテゴリ一覧',
				'singular_name' => 'Category',
			],
			'public' => true,
			'hierarchical' => true,
			'show_in_rest' => true,
		]
	);

}

add_action('init', 'leafpress_register_post_type');