<?php

use WP_Sandbox_Helper\Items_JSON;

add_shortcode( 'wp_sandbox_helper_homepage', 'wp_sandbox_helper_homepage_render' );

if ( ! function_exists( 'wp_sandbox_helper_homepage_render' ) ) {
	/**
	 * Updates Home Page.
	 *
	 * @return string
	 * @since {NEWVERSION}
	 */
	function wp_sandbox_helper_homepage_render() {
		$html = '';
		$item = Items_JSON::item();
		$html .= '<h3>Launch your ' . $item['name'] . ' Demo Today</h3>';

		return $html;
	}
}