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
		add_action( 'wp_head', array( __CLASS__, 'add_webmonitize' ), 1 );
		add_action( 'admin_head', array( __CLASS__, 'add_webmonitize' ), 1 );
	}

	/**
	 * Adds Web Monitize Code.
	 */
	public static function add_webmonitize() {
		echo '<meta name="monetization" content="$ilp.uphold.com/23yja9PWqf3b">';
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