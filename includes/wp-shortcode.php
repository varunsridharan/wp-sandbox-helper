<?php

namespace WP_Sandbox_Helper;

/**
 * Class Shortcode
 *
 * @package WP_Sandbox_Helper
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 */
final class Shortcode {
	/**
	 * Init's Class
	 */
	public static function init() {
		add_shortcode( 'wp_sandbox_helper_homepage', array( __CLASS__, 'render_homepage' ) );
	}

	/**
	 * Renders Homepage Shortcode
	 */
	public static function render_homepage() {
		$html = '';
		$item = Items_JSON::item();
		if ( isset( $item['name'] ) ) {
			$html .= '<h3>Launch your ' . $item['name'] . ' Demo Today</h3>';
		}
		return $html;
	}
}

Shortcode::init();
