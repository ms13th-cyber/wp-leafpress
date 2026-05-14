<?php

if (!defined('ABSPATH')) exit;

function leafpress_shortcode($atts = []) {

	$atts = shortcode_atts(
		[
			'category' => '',
			'height' => '',
			'cluster' => '',
			'zoom' => '',
			'lat' => '',
			'lng' => '',
			'tiles' => '',
		],
		$atts,
		'leafpress'
	);

	leafpress_enqueue_assets();

	$settings = [
		'category' => sanitize_text_field($atts['category']),
		'height' => sanitize_text_field($atts['height']),
		'cluster' => sanitize_text_field($atts['cluster']),
		'zoom' => absint($atts['zoom']),
		'lat' => sanitize_text_field($atts['lat']),
		'lng' => sanitize_text_field($atts['lng']),
		'tiles' => sanitize_text_field($atts['tiles']),
	];

	$style = '';
	if (!empty($settings['height'])) {
		$height = absint($settings['height']);
		if ($height > 0) {
			$style = 'height:' . $height . 'px;';
		}
	}

	ob_start();
	?>

	<div
		id="leafpress-map"
		style="<?php echo esc_attr($style); ?>"
		data-settings='<?php echo wp_json_encode($settings); ?>'
	></div>

	<?php

	return ob_get_clean();

}

add_shortcode('leafpress_map', 'leafpress_shortcode');