<?php
/*
* Plugin Name:       PDK Online Succes Theme options
* Plugin URI:        https://pdk.nl
* Version:           1.0.0
* Author:            PDK Online Success
* Author URI:        https://pdk.nl
*/

/* Start Adding Functions Below this Line */
if (!function_exists('untrailingslashit') || !defined('WP_PLUGIN_DIR')) {
    // WordPress is probably not bootstrapped.
    exit;
}
require WPMU_PLUGIN_DIR.'/mu-pdk-theme-options/pdk-theme-options.php';
require WPMU_PLUGIN_DIR.'/mu-pdk-theme-options/pdk-theme-functions.php';
require WPMU_PLUGIN_DIR.'/mu-pdk-theme-options/includes/pdk-online-succes-login-page.php';