<?php

use WP_Sandbox_Helper\Items_JSON;

if ( ! is_admin() ) {
	add_action( 'option_blogname', 'wp_sandbox_helper_replace_site_title' );
}
add_action( 'nav_menu_link_attributes', 'wp_sandbox_helper_replace_menu_links', 10, 2 );
add_action( 'get_site_icon_url', 'wp_sandbox_helper_replace_get_site_icon_url' );

if ( ! function_exists( 'wp_sandbox_helper_replace_site_title' ) ) {
	/**
	 * Force Replaces Custom Title.
	 *
	 * @param $title
	 *
	 * @return mixed
	 * @since {NEWVERSION}
	 */
	function wp_sandbox_helper_replace_site_title( $title ) {
		$items = Items_JSON::item();
		return ( isset( $items['name'] ) ) ? $items['name'] : $title;
	}
}

if ( ! function_exists( 'wp_sandbox_helper_replace_menu_links' ) ) {
	/**
	 * Modify Links
	 *
	 * @param $attr
	 * @param $menu
	 *
	 * @return mixed
	 * @since {NEWVERSION}
	 */
	function wp_sandbox_helper_replace_menu_links( $attr, $menu ) {
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
}

if ( ! function_exists( 'wp_sandbox_helper_replace_get_site_icon_url' ) ) {
	/**
	 * Updates Site's FAVICON
	 *
	 * @return mixed|string
	 */
	function wp_sandbox_helper_replace_get_site_icon_url() {
		$items = Items_JSON::item();
		return ( isset( $items['icon'] ) ) ? $items['icon'] : '';
	}
}