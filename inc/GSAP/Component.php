<?php
/**
 * WP_Rig\WP_Rig\GSAP\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\GSAP;

use WP_Rig\WP_Rig\Component_Interface;
use function add_action;
use function wp_enqueue_script;
use function get_theme_file_uri;
use function get_theme_file_path;
use function wp_script_add_data;
use function wp_localize_script;
use function WP_Rig\WP_Rig\wp_rig;
/**
 * Class for adding custom Animation thrue GSAP.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'GSAP';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_GSAP_script' ) );

	}

	/**
	 * Enqueues a script that improves GSAP menu accessibility.
	 */
	public function action_enqueue_GSAP_script() {

		// Enqueue the GSAP script.
		wp_enqueue_script(
			'wp-rig-GSAP',
			get_theme_file_uri( '/assets/libs/gsap/minified/gsap.min.js' ),
			array(),
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/libs/gsap/minified/gsap.min.js' ) ),
			false
		);

	}

}
