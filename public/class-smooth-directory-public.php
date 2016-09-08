<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://trevan.co
 * @since      1.0.0
 *
 * @package    Smooth_Directory
 * @subpackage Smooth_Directory/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Smooth_Directory
 * @subpackage Smooth_Directory/public
 * @author     Trevan Hetzel <trevan@hetzelcreative.com>
 */
class Smooth_Directory_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Smooth_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Smooth_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/smooth-directory-public.css', array(), $this->version, 'all' );

		$header_bg = get_option('business_setting_header_bg');

		if ($header_bg) {
			$inline_css = "
				.smooth-filter-row {
					background: {$header_bg};
				}
			";

			wp_add_inline_style( $this->plugin_name, $inline_css );
		}

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Smooth_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Smooth_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/smooth-directory-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Registers archive directory template
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	public function directory_get_archive_template($archive_template) {
		global $post;

		if (is_post_type_archive('businesses')) {
			$archive_template = dirname( __FILE__ ) . '/archive-businesses.php';
		}

    return $archive_template;
	} // directory_get_archive_template()

	/**
	 * Registers single directory template
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	public function directory_get_single_template($single_template) {
		global $post;

		if (is_singular('businesses')) {
			$single_template = dirname( __FILE__ ) . '/single-businesses.php';
		}

    return $single_template;
	} // directory_get_single_template()

	/**
	 * Registers taxonomy directory template
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	public function directory_get_taxonomy_template($taxonomy_template) {
		global $post;

		if ($post->post_type == 'businesses') {
			$taxonomy_template = dirname( __FILE__ ) . '/taxonomy-business_category.php';
		}

    return $taxonomy_template;
	} // directory_get_taxonomy_template()

	/**
	 * Registers custom query variables
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	public function directory_add_query_vars_filter($vars) {
		$vars[] = 'letter';
		return $vars;
	} // directory_add_query_vars_filter()

}
