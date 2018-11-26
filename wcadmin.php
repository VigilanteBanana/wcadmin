<?php
/*
 *
 * @package 	Wcadmin
 * Plugin Name: WooCommerce Custom Admin
 * Plugin URI:  https://katethedev.com
 * Description: Adds a store admin end point, content can be added
 * Author: 		Kate Shaw
 * Author URI:  https://katethedev.com
 * Version: 	1.0.0
 *
 */

defined( 'ABSPATH' ) or exit;

use Wcadmin\Classes;

// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Make sure WooCommerce is active
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	return;
}


// Include the autoloader so we can dynamically include the rest of the classes.
require_once( trailingslashit( dirname( __FILE__ ) ) . 'inc/autoloader.php' );

	   
function wca_init() {

	$wca = new Classes\Wcadmin_Tabs();

}
add_action( 'plugins_loaded', 'wca_init', 11 );
