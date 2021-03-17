<?php

namespace WP_Sandbox_Helper;

/**
 * Class WP_Demo_Hooks
 *
 * @package WP_Sandbox_Helper
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 */
final class WP_Demo_Hooks {
	/**
	 * Inits Class.
	 *
	 * @uses delete_custom_tables
	 * @uses delete_custom_user
	 * @uses add_custom_user
	 */
	public static function init() {
		add_filter( 'wpmu_drop_tables', array( __CLASS__, 'delete_custom_tables' ) );
		add_action( 'mp_demo_create_sandbox', array( __CLASS__, 'add_custom_user' ), 10, 2 );
		add_action( 'mp_demo_delete_sandbox', array( __CLASS__, 'delete_custom_user' ) );
	}

	/**
	 * Deletes Unwanted Tables When A Sub Site Is Deleted
	 *
	 * @param $tables
	 *
	 * @return array
	 */
	public static function delete_custom_tables( $tables ) {
		global $wpdb;
		$tables[] = $wpdb->prefix . 'blogmeta';
		$tables[] = $wpdb->prefix . 'wc_download_log';
		$tables[] = $wpdb->prefix . 'wc_product_meta_lookup';
		$tables[] = $wpdb->prefix . 'wc_webhooks';
		$tables[] = $wpdb->prefix . 'woocommerce_api_keys';
		$tables[] = $wpdb->prefix . 'woocommerce_attribute_taxonomies';
		$tables[] = $wpdb->prefix . 'woocommerce_downloadable_product_permissions';
		$tables[] = $wpdb->prefix . 'woocommerce_log';
		$tables[] = $wpdb->prefix . 'woocommerce_order_itemmeta';
		$tables[] = $wpdb->prefix . 'woocommerce_order_items';
		$tables[] = $wpdb->prefix . 'woocommerce_payment_tokenmeta';
		$tables[] = $wpdb->prefix . 'woocommerce_payment_tokens';
		$tables[] = $wpdb->prefix . 'woocommerce_sessions';
		$tables[] = $wpdb->prefix . 'woocommerce_shipping_zones';
		$tables[] = $wpdb->prefix . 'woocommerce_shipping_zone_locations';
		$tables[] = $wpdb->prefix . 'woocommerce_shipping_zone_methods';
		$tables[] = $wpdb->prefix . 'woocommerce_tax_rates';
		$tables[] = $wpdb->prefix . 'woocommerce_tax_rate_locations';
		$tables[] = $wpdb->prefix . 'blogmeta';
		$tables[] = $wpdb->prefix . 'loginizer_logs';
		$tables[] = $wpdb->prefix . 'blogmeta';
		return $tables;
	}

	/**
	 * Adds Custom Users To Demo Site.
	 *
	 * @param $blog_id
	 */
	public static function add_custom_user( $source_blog_id, $target_blog_id ) {
		add_user_to_blog( $target_blog_id, 10, 'customer' );
		add_user_to_blog( $target_blog_id, 3, 'customer' );
		add_user_to_blog( $target_blog_id, 6, 'pro-customer' );
		add_user_to_blog( $target_blog_id, 7, 'pro-customer' );
		add_user_to_blog( $target_blog_id, 4, 'wholesaler' );
		add_user_to_blog( $target_blog_id, 5, 'wholesaler' );
		add_user_to_blog( $target_blog_id, 8, 'shop_manager' );
		add_user_to_blog( $target_blog_id, 9, 'shop_manager' );
	}

	/**
	 * Deletes Custom Users.
	 *
	 * @param $blog_id
	 */
	public static function delete_custom_user( $blog_id ) {
		remove_user_from_blog( 10, $blog_id );
		remove_user_from_blog( 3, $blog_id );
		remove_user_from_blog( 6, $blog_id );
		remove_user_from_blog( 7, $blog_id );
		remove_user_from_blog( 4, $blog_id );
		remove_user_from_blog( 5, $blog_id );
		remove_user_from_blog( 8, $blog_id );
		remove_user_from_blog( 9, $blog_id );
	}
}

WP_Demo_Hooks::init();
