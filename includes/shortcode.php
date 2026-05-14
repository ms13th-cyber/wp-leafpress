<?php

if (!defined('ABSPATH')) exit;

function leafpress_shortcode() {

	leafpress_enqueue_assets();

	ob_start();
	?>

	<div id="leafpress-map"></div>

	<?php
	return ob_get_clean();
}

add_shortcode('leafpress', 'leafpress_shortcode');