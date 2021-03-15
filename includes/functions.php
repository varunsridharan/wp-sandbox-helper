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