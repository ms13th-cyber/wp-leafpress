<?php

if (!defined('ABSPATH')) exit;

function leafpress_add_meta_boxes() {

	add_meta_box(
		'leafpress_marker_meta',
		'Marker Settings',
		'leafpress_marker_meta_callback',
		'leafpress_marker',
		'normal',
		'default'
	);

}

add_action('add_meta_boxes', 'leafpress_add_meta_boxes');

function leafpress_marker_meta_callback($post) {

	$lat = get_post_meta($post->ID, 'leafpress_latitude', true);
	$lng = get_post_meta($post->ID, 'leafpress_longitude', true);
	$description = get_post_meta($post->ID, 'leafpress_description', true);
	$link = get_post_meta($post->ID, 'leafpress_link', true);

	?>

	<p>
		<label>Latitude</label><br>
		<input type="text" name="leafpress_latitude" value="<?php echo esc_attr($lat); ?>" style="width:100%;">
	</p>

	<p>
		<label>Longitude</label><br>
		<input type="text" name="leafpress_longitude" value="<?php echo esc_attr($lng); ?>" style="width:100%;">
	</p>

	<p>
		<label>Description</label><br>
		<textarea name="leafpress_description" style="width:100%;height:120px;"><?php echo esc_textarea($description); ?></textarea>
	</p>

	<p>
		<label>External Link</label><br>
		<input type="url" name="leafpress_link" value="<?php echo esc_attr($link); ?>" style="width:100%;" placeholder="https://example.com">
	</p>

	<div id="leafpress-admin-map"></div>

	<?php
}

function leafpress_save_marker_meta($post_id) {

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (isset($_POST['leafpress_latitude'])) {
		update_post_meta($post_id, 'leafpress_latitude', sanitize_text_field($_POST['leafpress_latitude']));
	}

	if (isset($_POST['leafpress_longitude'])) {
		update_post_meta($post_id, 'leafpress_longitude', sanitize_text_field($_POST['leafpress_longitude']));
	}

	if (isset($_POST['leafpress_description'])) {
		update_post_meta($post_id, 'leafpress_description', sanitize_textarea_field($_POST['leafpress_description']));
	}

	if (isset($_POST['leafpress_link'])) {
		update_post_meta($post_id, 'leafpress_link', esc_url_raw($_POST['leafpress_link']));
	}

}

add_action('save_post_leafpress_marker', 'leafpress_save_marker_meta');