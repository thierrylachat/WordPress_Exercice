<?php
/**
 * @package           WP_CGV
 *
 * @wordpress-plugin
 * Plugin Name:       WP-CGV
 * Plugin URI:        http://www.donneespersonnelles.fr/wp-cgv
 * Description:       Generateur de CGV
 * Author:            T. Devergranne - DonneesPersonnelles.fr
 * Author URI:        http://www.donneespersonnelles.fr
 * Version:           1.0.7
 * Text Domain:       wp-cgv
 * Domain Path:       /lang
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WP_CGV_VERSION', '1.0.7' );

define( 'WP_CGW_URL', plugin_dir_url( __FILE__ ) );

define( 'WP_CGW_DIR', plugin_dir_path( __FILE__ ) );

require_once( WP_CGW_DIR . 'includes/plugin-update-checker/plugin-update-checker.php' );

require_once( WP_CGW_DIR . 'classes/class.wp-cgv.php' );

register_activation_hook( __FILE__, array( 'WP_CGV', 'activate' ) );

register_deactivation_hook( __FILE__, array( 'WP_CGV', 'deactivate' ) );

register_uninstall_hook( __FILE__, array( 'WP_CGV', 'uninstall' ) );

Puc_v4_Factory::buildUpdateChecker(
	'https://www.donneespersonnelles.fr/cgv.json',
	__FILE__,
	'wp-cgv'
);

WP_CGV::app();
?>