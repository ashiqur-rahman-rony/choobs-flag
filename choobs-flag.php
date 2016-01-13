<?php
/*
 * Plugin Name:       Choobs Flag
 * Plugin URI:        https://www.choobs.com
 * Description:       Show the flags using shortcode using the flag-webicon library
 * Version:           1.0
 * Author:            Ashiqur Rahman
 * Author URI:        https://www.choobs.com
 * Text Domain:       choobs
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

function choobs_flag_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
			array(
				'country' => 'switzerland',
				'size' => ''
			), $atts )
	);

	wp_register_style( 'flag-webicons', plugin_dir_url( __FILE__ ) . 'includes/flag-webicons/flag-webicons.css' );
	wp_register_script( 'flag-modernizr', plugin_dir_url( __FILE__ ) . 'includes/flag-webicons/modernizr-svg-detection.js' );
	wp_enqueue_style( 'flag-webicons' );
	wp_enqueue_script( 'flag-modernizr' );

	$html = '<div class="flag-webicon ' . strtolower( $country ) . ' ' . $size . '">' . ucfirst( $country ) . '</div>';
	return $html;
}
add_shortcode( 'choobs-flag', 'choobs_flag_shortcode' );