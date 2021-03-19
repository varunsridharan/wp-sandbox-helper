<?php

namespace WP_Sandbox_Helper;

/**
 * Class Items_JSON
 *
 * @package WP_Sandbox_Helper
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 */
class Items_JSON {
	/**
	 * Stores Item Data.
	 *
	 * @var array
	 */
	protected static $data = array();


	/**
	 * Fetch
	 *
	 * @static
	 */
	public static function init() {
		global $envato_items;
		self::$data = $envato_items;
		#self::update_demo_toolbar();
	}
	/**
	 * Updates Custom Data to showcase other demo sites
	 */
	public static function update_demo_toolbar() {
		$toolbar           = get_option( 'mp_demo_toolbar', true );
		$toolbar           = ( ! is_array( $toolbar ) ) ? array(
			'show_toolbar' => 1,
			'unpermitted'  => array(),
			'logo'         => '',
			'btn_text'     => '',
			'btn_url'      => '',
			'btn_class'    => '',
			'background'   => '',
		) : $toolbar;
		$toolbar['select'] = array();
		foreach ( self::$data as $slug => $item ) {
			$toolbar['select'][ $item['id'] ] = array(
				'link_id'   => $item['id'],
				'text'      => $item['name'],
				'link'      => $item['demo_site'],
				'img'       => '',
				'btn_text'  => 'Buy Now',
				'btn_url'   => $item['ref_url'],
				'btn_class' => '',
			);
		}

		update_option( 'mp_demo_toolbar', $toolbar );
	}


	/**
	 * Returns Item's Data.
	 *
	 * @return array
	 */
	public static function items() {
		return self::$data;
	}

	/**
	 * Returns A Single Item
	 *
	 * @param $slug
	 *
	 * @static
	 * @return array|mixed
	 * @since {NEWVERSION}
	 */
	public static function item( $slug = WP_SANDBOX_CURRENT_SITE ) {
		return ( isset( self::$data[ $slug ] ) ) ? self::$data[ $slug ] : array();
	}

	/**
	 * Returns DB Key.
	 *
	 * @return string
	 */
	protected static function db_key() {
		return WP_SANDBOX_HELPER_DB . '_items_json';
	}
}

Items_JSON::init();
