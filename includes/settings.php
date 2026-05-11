<?php

if (!defined('ABSPATH')) exit;

/**
 * Admin menu
 */
function leafpress_settings_menu() {

	add_options_page(
		'WP LeafPress Settings',
		'WP LeafPress',
		'manage_options',
		'leafpress-settings',
		'leafpress_settings_page'
	);

}

add_action('admin_menu', 'leafpress_settings_menu');

/**
 * Register setting
 */
function leafpress_register_settings() {

	register_setting(
		'leafpress_settings_group',
		'leafpress_map_height',
		[
			'type' => 'integer',
			'sanitize_callback' => 'absint',
			'default' => 0,
		]
	);

}

add_action('admin_init', 'leafpress_register_settings');

/**
 * Settings page
 */
function leafpress_settings_page() {

	$value = get_option('leafpress_map_height', 0);

	?>

	<div class="wrap">

		<h1>WP LeafPress Settings</h1>

		<form method="post" action="options.php">

			<?php
			settings_fields('leafpress_settings_group');
			?>

			<table class="form-table">

				<tr>

					<th scope="row">
						Map Height
					</th>

					<td>

						<input
							type="number"
							name="leafpress_map_height"
							value="<?php echo esc_attr($value); ?>"
							min="0"
							step="1"
						>

						<p class="description">
							0 = 100vh (fullscreen)<br>
							Example: 600 = 600px
						</p>

					</td>

				</tr>

			</table>

			<?php submit_button(); ?>

		</form>

	</div>

	<?php
}