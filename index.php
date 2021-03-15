<?php
/**
 * Plugin Name:       WordPress Sandbox Helper
 * Plugin URI:        https://github.com/varunsridharan/wp-sandbox-helper
 * Description:       Handle the basics with this plugin.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.0
 * Author:            Varun Sridharan
 * Author URI:        https://varunsridharan.in
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       wp-sandbox-helper
 * Domain Path:       /i18n
 */

defined( 'ABSPATH' ) || exit;

require_once 'includes/functions.php';

define( 'WP_SANDBOX_HELPER_ITEMS_JSON_URL', 'https://cdn.svarun.dev/json/envato-items.json' );
define( 'WP_SANDBOX_HELPER_DB', '_wpsandbox_helper' );
define( 'WP_SANDBOX_MAIN_DOMAIN', 'sva.one' );
define( 'WP_SANDBOX_LOCAL_DOMAIN', 'wptest.pc' );
define( 'WP_SANDBOX_LOCAL_DOMAIN_SITE', 'zip-pin-postal-code-validator-for-woocommerce' );
define( 'WP_SANDBOX_CURRENT_SITE', wp_sandbox_helper_get_current_demo_item() );

require_once 'includes/hooks.php';
require_once 'includes/items-json-cache.php';
require_once 'includes/homepage.php';
