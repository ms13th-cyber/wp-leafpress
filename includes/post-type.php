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


/**
 * 管理一覧にカテゴリ列追加
 */
function leafpress_marker_columns($columns) {

	$new_columns = [];

	foreach ($columns as $key => $value) {

		$new_columns[$key] = $value;

		if ($key === 'title') {

			$new_columns['leafpress_category'] = 'Category';

		}

	}

	return $new_columns;

}

add_filter(
	'manage_leafpress_marker_posts_columns',
	'leafpress_marker_columns'
);

/**
 * カテゴリ列表示
 */
function leafpress_marker_column_content($column, $post_id) {

	if ($column !== 'leafpress_category') {
		return;
	}

	$terms = get_the_terms(
		$post_id,
		'leafpress_category'
	);

	if (!$terms || is_wp_error($terms)) {

		echo '—';
		return;

	}

	$items = [];

	foreach ($terms as $term) {

		$color = get_term_meta(
			$term->term_id,
			'leafpress_color',
			true
		);

		$items[] = '
			<span style="
				display:inline-flex;
				align-items:center;
				gap:6px;
				margin-right:10px;
			">
				<span style="
					width:12px;
					height:12px;
					border-radius:50%;
					background:' . esc_attr($color ?: '#333') . ';
					display:inline-block;
				"></span>
				' . esc_html($term->name) . '
			</span>
		';

	}

	echo implode('', $items);

}

add_action(
	'manage_leafpress_marker_posts_custom_column',
	'leafpress_marker_column_content',
	10,
	2
);


/**
 * 管理一覧カテゴリフィルター
 */
function leafpress_category_filter() {

	global $typenow;

	if ($typenow !== 'leafpress_marker') {
		return;
	}

	$taxonomy = 'leafpress_category';

	$selected = $_GET[$taxonomy] ?? '';

	$terms = get_terms([
		'taxonomy' => $taxonomy,
		'hide_empty' => false,
	]);

	if (!$terms || is_wp_error($terms)) {
		return;
	}

	echo '<select name="' . esc_attr($taxonomy) . '">';

	echo '<option value="">All Categories</option>';

	foreach ($terms as $term) {

		printf(
			'<option value="%s" %s>%s</option>',
			esc_attr($term->slug),
			selected($selected, $term->slug, false),
			esc_html($term->name)
		);

	}

	echo '</select>';

}

add_action(
	'restrict_manage_posts',
	'leafpress_category_filter'
);