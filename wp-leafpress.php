<?php
/*
Plugin Name: WP LeafPress
Description: Leaflet.js と OpenStreetMap を利用した、軽量かつ拡張性の高い WordPress 地図プラグインです。
Version: 0.2.0
Tested up to: 6.9.4
Requires PHP: 8.3.23
Author: masato shibuya(Image-box Co., Ltd.)
*/

if (!defined('ABSPATH')) exit;

define('LEAFPRESS_URL', plugin_dir_url(__FILE__));
define('LEAFPRESS_PATH', plugin_dir_path(__FILE__));

require_once LEAFPRESS_PATH . 'includes/shortcode.php';
require_once LEAFPRESS_PATH . 'includes/post-type.php';
require_once LEAFPRESS_PATH . 'includes/rest-api.php';
require_once LEAFPRESS_PATH . 'includes/admin-assets.php';
require_once LEAFPRESS_PATH . 'includes/assets.php';
require_once LEAFPRESS_PATH . 'includes/settings.php';
require_once LEAFPRESS_PATH . 'admin/meta-box.php';
require_once LEAFPRESS_PATH . 'admin/taxonomy-fields.php';


require_once __DIR__ . '/plugin-update-checker/plugin-update-checker.php';

$updateChecker = \YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
    'https://github.com/ms13th-cyber/wp-leafpress/',
    __FILE__,
    'wp-leafpress'
);

$updateChecker->setBranch('main');