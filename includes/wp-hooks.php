<?php

namespace WP_Sandbox_Helper;

/**
 * Class WP_Hooks
 *
 * @package WP_Sandbox_Helper
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 */
final class WP_Hooks {
	/**
	 * Inits Class
	 */
	public static function init() {
		add_action( 'phpmailer_init', array( __CLASS__, 'smtp' ) );
		add_action( 'mp_demo_create_sandbox', array( __CLASS__, 'add_custom_user' ) );
		add_action( 'mp_demo_delete_sandbox', array( __CLASS__, 'delete_custom_user' ) );
	}

	/**
	 * Adds Custom Users To Demo Site.
	 *
	 * @param $blog_id
	 */
	public static function add_custom_user( $blog_id ) {
		add_user_to_blog( $blog_id, 10, 'customer1' );
		add_user_to_blog( $blog_id, 3, 'customer2' );
		add_user_to_blog( $blog_id, 6, 'procustomer1' );
		add_user_to_blog( $blog_id, 7, 'procustomer2' );
		add_user_to_blog( $blog_id, 4, 'seller1' );
		add_user_to_blog( $blog_id, 5, 'seller2' );
		add_user_to_blog( $blog_id, 8, 'manager1' );
		add_user_to_blog( $blog_id, 9, 'manager2' );
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

	/**
	 * Updates PHPMailer Info
	 *
	 * @param $phpmailer
	 */
	public static function smtp( $phpmailer ) {
		if ( defined( 'WP_SANDBOX_HELPER_SMTP_HOST' ) ) {
			$phpmailer->Host = WP_SANDBOX_HELPER_SMTP_HOST; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( defined( 'WP_SANDBOX_HELPER_SMTP_PORT' ) ) {
			$phpmailer->Port = WP_SANDBOX_HELPER_SMTP_PORT; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( defined( 'WP_SANDBOX_HELPER_SMTP_AUTH' ) ) {
			$phpmailer->SMTPAuth = WP_SANDBOX_HELPER_SMTP_AUTH; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( defined( 'WP_SANDBOX_HELPER_SMTP_UERNAME' ) ) {
			$phpmailer->Username = WP_SANDBOX_HELPER_SMTP_UERNAME; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( defined( 'WP_SANDBOX_HELPER_SMTP_PASSWORD' ) ) {
			$phpmailer->Password = WP_SANDBOX_HELPER_SMTP_PASSWORD; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( defined( 'WP_SANDBOX_HELPER_SMTP_FROM_EMAIL' ) ) {
			$phpmailer->From = WP_SANDBOX_HELPER_SMTP_FROM_EMAIL; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( defined( 'WP_SANDBOX_HELPER_SMTP_FROM_NAME' ) ) {
			$phpmailer->FromName = WP_SANDBOX_HELPER_SMTP_FROM_NAME; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( defined( 'WP_SANDBOX_HELPER_SMTP_FROM_NAME' ) && defined( 'WP_SANDBOX_HELPER_SMTP_FROM_EMAIL' ) ) {
			$phpmailer->SetFrom( $phpmailer->From, $phpmailer->FromName ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( defined( 'WP_SANDBOX_HELPER_SMTP_HOST' ) && defined( 'WP_SANDBOX_HELPER_SMTP_PORT' ) ) {
			$phpmailer->isSMTP();
		}
	}
}

WP_Hooks::init();