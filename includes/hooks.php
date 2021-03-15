<?php

use WP_Sandbox_Helper\Items_JSON;

if ( ! is_admin() ) {
	add_action( 'option_blogname', 'wp_sandbox_helper_replace_site_title' );
}

add_action( 'nav_menu_link_attributes', 'wp_sandbox_helper_replace_menu_links', 10, 2 );
add_action( 'get_site_icon_url', 'wp_sandbox_helper_replace_get_site_icon_url' );
remove_action( 'welcome_panel', 'wp_sandbox_helper_remove_wp_welcome_panel' );
add_action( 'wp_dashboard_setup', 'wp_sandbox_helper_remove_dashboard_widgets', 9999 );
add_action( 'widgets_init', 'wp_sandbox_helper_unregister_default_widgets', 11 );

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

if ( ! function_exists( 'wp_sandbox_helper_unregister_default_widgets' ) ) {
	/**
	 * Removes Default Site Widgets.
	 */
	function wp_sandbox_helper_unregister_default_widgets() {
		unregister_widget( 'WP_Widget_Pages' );
		unregister_widget( 'WP_Widget_Calendar' );
		unregister_widget( 'WP_Widget_Archives' );
		unregister_widget( 'WP_Widget_Links' );
		unregister_widget( 'WP_Widget_Meta' );
		unregister_widget( 'WP_Widget_Search' );
		unregister_widget( 'WP_Widget_Text' );
		unregister_widget( 'WP_Widget_Categories' );
		unregister_widget( 'WP_Widget_Recent_Posts' );
		unregister_widget( 'WP_Widget_Recent_Comments' );
		unregister_widget( 'WP_Widget_RSS' );
		unregister_widget( 'WP_Widget_Tag_Cloud' );
		unregister_widget( 'WP_Nav_Menu_Widget' );
		unregister_widget( 'Twenty_Eleven_Ephemera_Widget' );
		unregister_widget( 'motopress_demo\classes\widgets\Try_Demo_Widget' );
		unregister_widget( 'motopress_demo\classes\widgets\Try_Demo_Popup_Widget' );
		unregister_widget( 'WP_Widget_Media_Audio' );
		unregister_widget( 'WP_Widget_Media_Image' );
		unregister_widget( 'WP_Widget_Media_Gallery' );
		unregister_widget( 'WP_Widget_Media_Video' );
		unregister_widget( 'WP_Widget_Custom_HTML' );
	}
}

if ( ! function_exists( 'wp_sandbox_helper_remove_wp_welcome_panel' ) ) {
	/**
	 * Removes Global Dashboard Widgets.
	 */
	function wp_sandbox_helper_remove_wp_welcome_panel() {
		// Get global obj.
		global $wp_meta_boxes;

		// Left side metaboxes.
		$wp_meta_boxes['dashboard']['normal']['core'] = array();

		// Right side metaboxes.
		$wp_meta_boxes['dashboard']['side']['core'] = array();

	}
}

if ( ! function_exists( 'wp_sandbox_helper_remove_dashboard_widgets' ) ) {
	/**
	 * Removes Default Dashboard Widget
	 */
	function wp_sandbox_helper_remove_dashboard_widgets() {
		global $wp_meta_boxes;
		if ( isset( $wp_meta_boxes['dashboard'] ) ) {
			unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );
			unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
			unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
			unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
			unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
		}
	}
}