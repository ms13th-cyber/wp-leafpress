<?php

if (!defined('ABSPATH')) exit;

function leafpress_shortcode() {

	ob_start();
	?>

	<div id="leafpress-map"></div>

	<?php
	return ob_get_clean();
}

add_shortcode('leafpress_map', 'leafpress_shortcode');