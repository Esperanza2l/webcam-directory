<?php
/**
 * Plugin Name: Webcam Directory
 * Description: Minimal demo directory of webcams via the [webcam_directory] shortcode.
 * Version: 1.0.0
 * Author: Esperanza2l
 * License: MIT
 * Text Domain: webcam-directory
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function webcam_directory_shortcode() {
	$webcams = array(
		array( 'name' => 'Demo Webcam 1', 'category' => 'City', 'status' => 'Online', 'url' => 'https://example.com/webcam-1' ),
		array( 'name' => 'Demo Webcam 2', 'category' => 'Beach', 'status' => 'Offline', 'url' => 'https://example.com/webcam-2' ),
		array( 'name' => 'Demo Webcam 3', 'category' => 'Mountain', 'status' => 'Online', 'url' => 'https://example.com/webcam-3' ),
	);

	$html  = '<style>.webcam-directory{list-style:none;padding:0}.webcam-directory li{border:1px solid #ddd;padding:8px;margin-bottom:8px}</style>';
	$html .= '<ul class="webcam-directory">';
	foreach ( $webcams as $cam ) {
		$html .= sprintf(
			'<li><strong>%s</strong> &middot; %s &middot; %s &middot; <a href="%s">View</a></li>',
			esc_html( $cam['name'] ),
			esc_html( $cam['category'] ),
			esc_html( $cam['status'] ),
			esc_url( $cam['url'] )
		);
	}
	$html .= '</ul>';

	return $html;
}
add_shortcode( 'webcam_directory', 'webcam_directory_shortcode' );
