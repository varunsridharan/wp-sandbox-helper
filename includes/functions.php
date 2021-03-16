<?php
if ( ! function_exists( 'wp_sandbox_helper_get_current_demo_item' ) ) {
	/**
	 * Fetchs Current Network Site's slug.
	 *
	 * @return string|string[]
	 */
	function wp_sandbox_helper_get_current_demo_item() {
		$site = get_current_site();
		return ( WP_SANDBOX_LOCAL_DOMAIN === $site->domain ) ? WP_SANDBOX_LOCAL_DOMAIN_SITE : str_replace( WP_SANDBOX_MAIN_DOMAIN, '', $site->domain );
	}
}

if ( ! function_exists( 'wp_sandbox_helper_other_logins' ) ) {
	/**
	 * Returns A List of other logins.
	 *
	 * @return \string[][]
	 */
	function wp_sandbox_helper_other_logins() {
		return array(
			'Customer'     => array(
				'customer1' => 'demo',
				'customer2' => 'demo',
			),
			'Pro Customer' => array(
				'procustomer1' => 'demo',
				'procustomer2' => 'demo',
			),
			'Wholesaler'   => array(
				'seller1' => 'demo',
				'seller2' => 'demo',
			),
			'Shop manager' => array(
				'manager1' => 'demo',
				'manager2' => 'demo',
			),
		);
	}
}