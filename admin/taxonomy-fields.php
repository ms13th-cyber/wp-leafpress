<?php

if (!defined('ABSPATH')) exit;

/**
 * Add field
 */
function leafpress_category_add_field() {
	?>

	<div class="form-field">
		<label for="leafpress_color">Color</label>

		<input
			type="color"
			name="leafpress_color"
			id="leafpress_color"
			value="#333333"
		>
	</div>

	<?php
}

add_action(
	'leafpress_category_add_form_fields',
	'leafpress_category_add_field'
);

/**
 * Edit field
 */
function leafpress_category_edit_field($term) {

	$color = get_term_meta($term->term_id, 'leafpress_color', true);

	if (!$color) {
		$color = '#333333';
	}

	?>

	<tr class="form-field">

		<th scope="row">
			<label for="leafpress_color">Color</label>
		</th>

		<td>
			<input
				type="color"
				name="leafpress_color"
				id="leafpress_color"
				value="<?php echo esc_attr($color); ?>"
			>

			<p class="description">
				Marker color used on the map.
			</p>
		</td>

	</tr>

	<?php
}

add_action(
	'leafpress_category_edit_form_fields',
	'leafpress_category_edit_field'
);

/**
 * Save
 */
function leafpress_save_category_color($term_id) {

	if (isset($_POST['leafpress_color'])) {

		update_term_meta(
			$term_id,
			'leafpress_color',
			sanitize_hex_color($_POST['leafpress_color'])
		);

	}
}

add_action(
	'created_leafpress_category',
	'leafpress_save_category_color'
);

add_action(
	'edited_leafpress_category',
	'leafpress_save_category_color'
);

/**
 * Add columns
 */
function leafpress_category_columns($columns) {

	$new_columns = [];

	foreach ($columns as $key => $value) {

		$new_columns[$key] = $value;

		if ($key === 'name') {
			$new_columns['leafpress_color'] = 'Color';
		}
	}

	return $new_columns;
}

add_filter(
	'manage_edit-leafpress_category_columns',
	'leafpress_category_columns'
);

/**
 * Column content
 */
function leafpress_category_column_content($content, $column_name, $term_id) {

	if ($column_name === 'leafpress_color') {

		$color = get_term_meta(
			$term_id,
			'leafpress_color',
			true
		);

		if (!$color) {
			$color = '#333333';
		}

		$content = '
			<div style="
				display:flex;
				align-items:center;
				gap:10px;
			">
				<div style="
					width:20px;
					height:20px;
					border-radius:50%;
					background:' . esc_attr($color) . ';
					border:1px solid #ccc;
				"></div>

				<code>' . esc_html($color) . '</code>
			</div>
		';
	}

	return $content;
}

add_filter(
	'manage_leafpress_category_custom_column',
	'leafpress_category_column_content',
	10,
	3
);