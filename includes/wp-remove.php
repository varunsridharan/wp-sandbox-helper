<?php

namespace WP_Sandbox_Helper;

/**
 * Class WP_Remove
 *
 * @package WP_Sandbox_Helper
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 */
final class WP_Remove {
	/**
	 * @uses replace_site_favicon
	 * @uses remove_dashboard_widgets
	 * @uses replace_menu_links
	 */
	public static function init() {
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		add_action( 'widgets_init', array( __CLASS__, 'remove_site_widgets' ), 9999 );
		add_action( 'wp_dashboard_setup', array( __CLASS__, 'remove_dashboard_widgets' ), 9999 );
		add_action( 'admin_bar_menu', array( __CLASS__, 'remove_toolbar_items' ), 9999 );
	}

	/**
	 * Removes Default Unwanted Admin Bar Menus
	 *
	 * @param $wp_adminbar
	 *
	 * @static
	 * @since {NEWVERSION}
	 */
	public static function remove_toolbar_items( $wp_adminbar ) {
		$wp_adminbar->remove_node( 'wp-logo' );
		$wp_adminbar->remove_node( 'search' );
		$wp_adminbar->remove_node( 'customize' );
		$wp_adminbar->remove_node( 'updates' );
		$wp_adminbar->remove_node( 'comments' );
		$wp_adminbar->remove_node( 'new-content' );
		$wp_adminbar->remove_node( 'edit' );
	}

	/**
	 * Removes Default Site Widgets.
	 */
	public static function remove_site_widgets() {
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

	/**
	 * Removes Default Dashboard Widgets
	 */
	public static function remove_dashboard_widgets() {
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

WP_Remove::init();
