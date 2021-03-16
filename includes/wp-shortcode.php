<?php

namespace WP_Sandbox_Helper;

/**
 * Class Shortcode
 *
 * @package WP_Sandbox_Helper
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 */
final class Shortcode {
	/**
	 * Init's Class
	 */
	public static function init() {
		add_shortcode( 'wp_sandbox_helper_homepage', array( __CLASS__, 'render_homepage' ) );
	}

	/**
	 * Renders Homepage Shortcode
	 */
	public static function render_homepage() {
		$html = '[is_not_sandbox]';
		$item = Items_JSON::item();
		if ( isset( $item['name'] ) ) {
			$html .= '<h3>Launch your ' . $item['name'] . ' Demo Today</h3>';
		}
		$html .= '[try_demo title="To create your demo website provide the following data" label="Your email:" placeholder="example@mail.com" submit_btn="Submit" success="An activation email was sent to your email address." fail="An error has occurred. Please notify the website Administrator." captcha="1" source_id="1"]An activation email will be sent to this email address. After the confirmation you will be redirected to WordPress Dashboard.[/try_demo]';
		$html .= '[/is_not_sandbox]';
		$html .= '[is_sandbox]';
		$html .= '<h3>Other Login information’s</h3><p>you can also login as other user to test our plugins</p>';

		foreach ( wp_sandbox_helper_other_logins() as $role => $login ) {
			$html .= "<h4 style='margin-top:0;'>${role}</h4> <ul>";
			foreach ( $login as $username => $password ) {
				$html .= "<li> ${username} / ${password} </li>";
			}
			$html .= '</ul>';
		}
		$html .= '[/is_sandbox]';
		return do_shortcode( $html );
	}
}

Shortcode::init();
