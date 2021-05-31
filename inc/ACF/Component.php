<?php
/**
 * WP_Rig\WP_Rig\AMP\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\ACF;

use WP_Rig\WP_Rig\Component_Interface;
use function add_action;
use function get_theme_file_path;
use function get_theme_file_uri;
use function wp_enqueue_script;
use function wp_script_add_data;

/**
 * Class for managing Advanced Custom Fields support.
 */
class Component implements Component_Interface {



	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'acf';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		// add_action( 'acf/init', array( $this, 'action_add_option_page' ) );  crée un page d'option !
		// add_action( 'acf/init', array( $this, 'action_set_google_api_key' ) ); Ajoute la gestion de google map API!
		/**
	* Ajoute l'enregistrement des blocks
	*/
		add_action( 'acf/init', array( $this, 'action_register_acf_blocks' ) );
	}

	/**
	 * Adds an Option Page || PAs besoin si pas actif en dessus
	 */
	public function action_add_option_page() {
		\acf_add_options_page();
	}

	/**
	 * Sets the Google API Key || PAs besoin si pas actif en dessus
	 */
	public function action_set_google_api_key() {
		acf_update_setting( 'google_api_key', $_ENV['GOOGLE_MAPS_API_KEY'] ?? '' );
	}

	/**
	 * Registers custom blocks in the block editor.|| PAs besoin si pas actif en dessus
	 *
	 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
	 *
	 * @return void
	 */
	public function action_register_acf_blocks() {

		// Slider block.
		$blocks[] = array(
			'name'            => 'slider',
			'title'           => _x( 'Slider', 'Block title', 'wp-rig' ),
			'description'     => __( 'Slider avec vignettes', 'wp-rig' ),
			'category'        => 'media',
			'icon'            => 'format-gallery',
			'mode'            => 'edit',
			'supports'        => array(
				'align' => array( 'wide', 'full' ),
			),
			'render_template' => get_theme_file_path( 'template-parts/blocks/slider.php' ),
			'enqueue_assets'  => array( $this, 'action_enqueue_slider_block_assets' ),
		);

		// Investment block.
		$blocks[] = array(
			'name'            => 'investment',
			'title'           => _x( 'Investissement', 'Block title', 'wp-rig' ),
			'description'     => __( 'Descriptif succint d’un investissement', 'wp-rig' ),
			'category'        => 'text',
			'icon'            => 'money-alt',
			'mode'            => 'auto',
			'supports'        => array(
				'align' => array( 'wide', 'full' ),
			),
			'render_template' => get_theme_file_path( 'template-parts/blocks/investment.php' ),
		);

		foreach ( $blocks as $block ) {
			\acf_register_block_type( $block );
		}
	}

	/**
	 * Enqueues the block assets.
	 *
	 * These assets are only loaded when the block is used.
	 */
	public function action_enqueue_slider_block_assets() {

		$slider_styles_file_uri  = get_theme_file_uri( 'css/slider.min.css' );
		$slider_styles_file_path = get_theme_file_path( 'css/slider.min.css' );

		wp_enqueue_style(
			'decalia-block-slider-styles',
			$slider_styles_file_uri,
			array(),
			$this->get_asset_version( $slider_styles_file_path )
		);

		$slider_init_file_uri  = get_theme_file_uri( 'js/block-slider-init.js' );
		$slider_init_file_path = get_theme_file_path( 'js/block-slider-init.js' );

		wp_enqueue_script(
			'slick-slider',
			get_theme_file_uri( 'libs/sliderx§/slick.min.js' ),
			array( 'jquery' ),
			'1.8.1',
			true
		);
		wp_script_add_data( 'slick-slider', 'defer', true );

		wp_enqueue_script(
			'decalia-block-slider-init',
			$slider_init_file_uri,
			array( 'slick-slider' ),
			$this->get_asset_version( $slider_init_file_path ),
			true
		);
		wp_script_add_data( 'decalia-block-slider-init', 'defer', true );
	}
}
