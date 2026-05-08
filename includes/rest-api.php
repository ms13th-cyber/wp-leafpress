<?php

if (!defined('ABSPATH')) exit;

function leafpress_register_rest_routes() {

	register_rest_route('leafpress/v1', '/markers', [
		'methods'  => 'GET',
		'callback' => 'leafpress_get_markers',
		'permission_callback' => '__return_true',
	]);

}

add_action('rest_api_init', 'leafpress_register_rest_routes');

function leafpress_get_markers() {

	$query = new WP_Query([
		'post_type'      => 'leafpress_marker',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
	]);

	$markers = [];

	if ($query->have_posts()) {

		while ($query->have_posts()) {

			$query->the_post();

			$terms = get_the_terms(get_the_ID(), 'leafpress_category');

			$categories = [];

			if ($terms && !is_wp_error($terms)) {

				foreach ($terms as $term) {
					$categories[] = [
						'slug'  => $term->slug,
						'name'  => $term->name,
						'color' => get_term_meta(
							$term->term_id,
							'leafpress_color',
							true
						) ?: '#333333'
					];
				}
			}

			$markers[] = [
				'title' => get_the_title(),

				'lat' => get_post_meta(
					get_the_ID(),
					'leafpress_latitude',
					true
				),

				'lng' => get_post_meta(
					get_the_ID(),
					'leafpress_longitude',
					true
				),

				'categories' => $categories,

				'description' => get_post_meta(
					get_the_ID(),
					'leafpress_description',
					true
				),

				'link' => get_post_meta(
					get_the_ID(),
					'leafpress_link',
					true
				),

				'image' => get_the_post_thumbnail_url(
					get_the_ID(),
					'medium'
				),
			];
		}

		wp_reset_postdata();
	}

	return rest_ensure_response($markers);
}