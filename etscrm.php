<?php
/**
 * etscrm - Elegant Themes Shortcode Remover
 *
 * @link              https://etscrmhealth.com
 * @since             0.0.1
 * @package           etscrm_shortcode_remover
 *
 * @wordpress-plugin
 * Plugin Name:       etscrm - Elegant Themes Shortcode Remover
 * Plugin URI:        https://www.caughtmyeye.cc
 * Description:       Removes Elegant Themes shortcodes on export.
 * Version:           0.0.1
 * Author:            caught my eye
 * Author URI:        https://www.caughtmyeye.cc
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       etscrm
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Remove shortcodes
 *
 * @param string $content Post content.
 * @return string (Maybe) modified post content.
 */
function etscrm_remove_shortcode( $content ) {
	// DEBUG: https://github.com/marklchaves/log-lover
	//logit_lover('stripping out shortcodes ...');

	// For displaying on specific pages.
    //if ( is_home() ) {
	//if ( is_page( 'Our Providers' ) ) {

		// Registered shortcodes
		$content = strip_shortcodes( $content );

		// Visual Composer Shortcodes
		$content = preg_replace('/\[\/?et_pb.*?\]/', '', $content);
		//$content = preg_replace('/\[\/?vc_empty_space.*?\]/', '', $content);
		//$content = preg_replace('/\[\/?vc_row.*?\]/', '', $content);
		//$content = preg_replace('/\[\/?vc_column.*?\]/', '', $content);		
		//$content = preg_replace('/\[\/?vc_single_image.*?\]/', '', $content);


    //}
    return $content;
}
// For displaying
//add_filter( 'the_content', 'etscrm_remove_shortcode' );
// For exporting
add_filter( 'the_content_export', 'etscrm_remove_shortcode' );
