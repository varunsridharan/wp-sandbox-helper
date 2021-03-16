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
	 */
	public static function init() {
		add_filter( 'wpmu_drop_tables', array( __CLASS__, 'delete_custom_tables' ) );
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
		return $tables;
	}
}

