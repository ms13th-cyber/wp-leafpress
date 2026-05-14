<?php

if (!defined('ABSPATH')) exit;

function leafpress_enqueue_assets() {

	wp_enqueue_style(
		'leaflet-css',
		'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
		[],
		'1.9.4'
	);

	wp_enqueue_style(
		'leaflet-markercluster-css',
		'https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css',
		[],
		'1.5.3'
	);

	wp_enqueue_style(
		'leaflet-markercluster-default-css',
		'https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css',
		[],
		'1.5.3'
	);

	wp_enqueue_style(
		'leafpress-css',
		LEAFPRESS_URL . 'assets/css/leafpress.css',
		[],
		'0.1.0'
	);

	wp_enqueue_script(
		'leaflet-js',
		'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
		[],
		'1.9.4',
		true
	);

	wp_enqueue_script(
		'leaflet-markercluster',
		'https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js',
		['leaflet-js'],
		'1.5.3',
		true
	);

	wp_enqueue_script(
		'leafpress-js',
		LEAFPRESS_URL . 'assets/js/leafpress.js',
		['leaflet-js', 'leaflet-markercluster'],
		'0.1.0',
		true
	);

	wp_localize_script(
		'leafpress-js',
		'leafpressData',
		[
			'restUrl' => rest_url('leafpress/v1/markers'),
			'enableCluster' => (bool)get_option('leafpress_enable_cluster', true),
		]
	);

	$map_height = get_option('leafpress_map_height', 0);

	if (
		(int)$map_height < 320 &&
		(int)$map_height !== 0
	) {
		$map_height = 320;
	}

	if ((int)$map_height === 0) {

		$height_css = '100vh';

	} else {

		$height_css = absint($map_height) . 'px';

	}

	wp_register_style('leafpress-inline', false);

	wp_enqueue_style('leafpress-inline');

	wp_add_inline_style(
		'leafpress-inline',
		"
		#leafpress-map{
			height: {$height_css};
		}
		"
	);

}
add_action('wp_enqueue_scripts', 'leafpress_enqueue_assets');