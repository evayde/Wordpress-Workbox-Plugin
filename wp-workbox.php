<?php
/*
Plugin Name:  Simple WP Workbox
Plugin URI:   https://wordpress.org/plugins/simple-wp-workbox
Description:  Opensource Workbox implementation to cache Wordpress files. 
Version:      0.1a
Author:       Enrico Gruner
Author URI:   https://dev-creations.de
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  cdev-wp-workbox
Domain Path:  /
*/

function pluginScripts() {
  wp_enqueue_script( 'load-sw', plugins_url('/load-sw.js', __FILE__), [], '1.0' );
}
add_action( 'wp_enqueue_scripts', 'pluginScripts');

function onActivate() {
  copy( plugins_url('/sw.js', __FILE__), get_home_path() . 'sw.js' );
}
register_activation_hook( __FILE__, 'onActivate');

function onUninstall() {
  unlink(get_home_path() . 'sw.js' );
}
register_uninstall_hook( __FILE__, 'onUninstall');