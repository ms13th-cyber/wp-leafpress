<?php

if (!defined('ABSPATH')) exit;

function leafpress_admin_assets($hook) {

	global $post;

	if (
		($hook === 'post.php' || $hook === 'post-new.php') &&
		isset($post->post_type) &&
		$post->post_type === 'leafpress_marker'
	) {

		wp_enqueue_style(
			'leaflet-css',
			'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
			[],
			'1.9.4'
		);

		wp_enqueue_script(
			'leaflet-js',
			'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
			[],
			'1.9.4',
			true
		);

		wp_enqueue_script(
			'leafpress-admin-map',
			LEAFPRESS_URL . 'assets/js/admin-map.js',
			['leaflet-js'],
			'0.1.0',
			true
		);

		wp_enqueue_style(
			'leafpress-css',
			LEAFPRESS_URL . 'assets/css/leafpress.css',
			[],
			'0.1.0'
		);

	}

}

add_action('admin_enqueue_scripts', 'leafpress_admin_assets');