<?php

namespace WP_Sandbox_Helper;

/**
 * Class WP_Overrides
 *
 * @package WP_Sandbox_Helper
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 */
final class WP_Overrides {
	/**
	 * @uses replace_site_favicon
	 * @uses remove_dashboard_widgets
	 * @uses replace_menu_links
	 */
	public static function init() {
		if ( ! is_admin() ) {
			add_action( 'option_blogname', array( __CLASS__, 'replace_site_title' ) );
		}

		add_action( 'nav_menu_link_attributes', array( __CLASS__, 'replace_menu_links' ), 10, 2 );
		add_action( 'get_site_icon_url', array( __CLASS__, 'replace_site_favicon' ) );
	}

	/**
	 * Replaces Front Menu Panel Links
	 *
	 * @param $attr
	 * @param $menu
	 *
	 * @return mixed
	 */
	public static function replace_menu_links( $attr, $menu ) {
		$items = Items_JSON::item();

		switch ( strtolower( $menu->post_title ) ) {
			case 'buynow':
			case 'buy-now':
			case 'buy now':
				$attr['href'] = ( isset( $items['ref_url'] ) ) ? $items['ref_url'] : $attr['href'];
				break;

			case 'documentation':
			case 'documentations':
			case 'docs':
			case 'doc':
				$attr['href'] = ( isset( $items['docs'] ) ) ? $items['docs'] : $attr['href'];
				break;

			case 'changelog':
			case 'change log':
			case 'change-log':
				$attr['href'] = ( isset( $items['changelog'] ) ) ? $items['changelog'] : $attr['href'];
				break;

			case 'support':
				$attr['href'] = ( isset( $items['support'] ) ) ? $items['support'] : $attr['href'];
				break;
		}

		return $attr;
	}

	/**
	 * Force Replaces site's icon with item's logo
	 *
	 * @return mixed|string
	 */
	public static function replace_site_favicon() {
		$items = Items_JSON::item();
		return ( isset( $items['icon'] ) ) ? $items['icon'] : '';
	}

	/**
	 * Replaces Site's Title.
	 *
	 * @param $title
	 *
	 * @return mixed
	 */
	public static function replace_site_title( $title ) {
		$items = Items_JSON::item();
		return ( isset( $items['name'] ) ) ? $items['name'] : $title;
	}
}

WP_Overrides::init();
