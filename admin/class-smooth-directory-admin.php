<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://trevan.co
 * @since      1.0.0
 *
 * @package    Smooth_Directory
 * @subpackage Smooth_Directory/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Smooth_Directory
 * @subpackage Smooth_Directory/admin
 * @author     Trevan Hetzel <trevan@hetzelcreative.com>
 */
class Smooth_Directory_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/smooth-directory-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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
		wp_enqueue_media();
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/smooth-directory-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Creates a new custom post type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_post_type()
	 */
	public function new_cpt_business() {
		$cap_type 	= 'post';
		$plural 	= 'Businesses';
		$single 	= 'Business';
		$cpt_name 	= 'businesses';

		$opts['can_export']								= true;
		$opts['capability_type']						= $cap_type;
		$opts['description']							= '';
		$opts['exclude_from_search']					= false;
		$opts['has_archive']							= true;
		$opts['hierarchical']							= false;
		$opts['map_meta_cap']							= true;
		$opts['menu_icon']								= 'dashicons-admin-post';
		$opts['menu_position']							= 25;
		$opts['public']									= true;
		$opts['publicly_querable']						= true;
		$opts['query_var']								= true;
		$opts['register_meta_box_cb']					= '';
		$opts['rewrite']								= false;
		$opts['show_in_admin_bar']						= true;
		$opts['show_in_menu']							= true;
		$opts['show_in_nav_menu']						= true;
		$opts['show_ui']								= true;
		$opts['supports']								= array( 'title', 'thumbnail' );
		$opts['taxonomies']								= array();
		$opts['capabilities']['delete_others_posts']	= "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post']			= "delete_{$cap_type}";
		$opts['capabilities']['delete_posts']			= "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts']	= "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts']	= "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts']		= "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post']				= "edit_{$cap_type}";
		$opts['capabilities']['edit_posts']				= "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts']		= "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts']	= "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts']			= "publish_{$cap_type}s";
		$opts['capabilities']['read_post']				= "read_{$cap_type}";
		$opts['capabilities']['read_private_posts']		= "read_private_{$cap_type}s";
		$opts['labels']['add_new']						= __( "Add New {$single}", 'business-directory' );
		$opts['labels']['add_new_item']					= __( "Add New {$single}", 'business-directory' );
		$opts['labels']['all_items']					= __( $plural, 'business-directory' );
		$opts['labels']['edit_item']					= __( "Edit {$single}" , 'business-directory' );
		$opts['labels']['menu_name']					= __( $plural, 'business-directory' );
		$opts['labels']['name']							= __( $plural, 'business-directory' );
		$opts['labels']['name_admin_bar']				= __( $single, 'business-directory' );
		$opts['labels']['new_item']						= __( "New {$single}", 'business-directory' );
		$opts['labels']['not_found']					= __( "No {$plural} Found", 'business-directory' );
		$opts['labels']['not_found_in_trash']			= __( "No {$plural} Found in Trash", 'business-directory' );
		$opts['labels']['parent_item_colon']			= __( "Parent {$plural} :", 'business-directory' );
		$opts['labels']['search_items']					= __( "Search {$plural}", 'business-directory' );
		$opts['labels']['singular_name']				= __( $single, 'business-directory' );
		$opts['labels']['view_item']					= __( "View {$single}", 'business-directory' );
		$opts['rewrite']['ep_mask']						= EP_PERMALINK;
		$opts['rewrite']['feeds']						= false;
		$opts['rewrite']['pages']						= true;
		$opts['rewrite']['slug']						= __( strtolower( $plural ), 'business-directory' );
		$opts['rewrite']['with_front']					= false;
		$opts = apply_filters( 'business-directory-cpt-options', $opts );
		register_post_type( strtolower( $cpt_name ), $opts );
	} // new_cpt_business()

	/**
	 * Creates a new taxonomy for a custom post type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public function new_taxonomy_cat() {
		$plural 	= 'Categories';
		$single 	= 'Category';
		$tax_name 	= 'business_category';
		$opts['hierarchical']							= true;
		//$opts['meta_box_cb'] 							= '';
		$opts['public']									= true;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= false;
		$opts['show_in_nav_menus']						= true;
		$opts['show_tag_cloud'] 						= true;
		$opts['show_ui']								= true;
		$opts['sort'] 									= '';
		//$opts['update_count_callback'] 					= '';
		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';
		$opts['labels']['add_new_item'] 				= __( "Add New {$single}", 'business-directory' );
		$opts['labels']['add_or_remove_items'] 			= __( "Add or remove {$plural}", 'business-directory' );
		$opts['labels']['all_items'] 					= __( $plural, 'business-directory' );
		$opts['labels']['choose_from_most_used'] 		= __( "Choose from most used {$plural}", 'business-directory' );
		$opts['labels']['edit_item'] 					= __( "Edit {$single}" , 'business-directory');
		$opts['labels']['menu_name'] 					= __( $plural, 'business-directory' );
		$opts['labels']['name'] 						= __( $plural, 'business-directory' );
		$opts['labels']['new_item_name'] 				= __( "New {$single} Name", 'business-directory' );
		$opts['labels']['not_found'] 					= __( "No {$plural} Found", 'business-directory' );
		$opts['labels']['parent_item'] 					= __( "Parent {$single}", 'business-directory' );
		$opts['labels']['parent_item_colon'] 			= __( "Parent {$single}:", 'business-directory' );
		$opts['labels']['popular_items'] 				= __( "Popular {$plural}", 'business-directory' );
		$opts['labels']['search_items'] 				= __( "Search {$plural}", 'business-directory' );
		$opts['labels']['separate_items_with_commas'] 	= __( "Separate {$plural} with commas", 'business-directory' );
		$opts['labels']['singular_name'] 				= __( $single, 'business-directory' );
		$opts['labels']['update_item'] 					= __( "Update {$single}", 'business-directory' );
		$opts['labels']['view_item'] 					= __( "View {$single}", 'business-directory' );
		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= false;
		$opts['rewrite']['slug']						= __( strtolower( $tax_name ), 'business-directory' );
		$opts['rewrite']['with_front']					= false;
		$opts = apply_filters( 'business-directory-taxonomy-options', $opts );
		register_taxonomy( $tax_name, 'businesses', $opts );
	} // new_taxonomy_cat()

	/**
	 * [business_add_metabox description]
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	public function business_add_metabox() {
		add_meta_box(
			'business_sectionid',
			__( 'Business details', 'business_textdomain' ),
			array( $this, 'business_meta_box_callback' ),
			'businesses',
			'normal',
			'default'
		);
	} // business_add_metabox()

	/**
	 * [business_meta_box_callback description]
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @return [type] [description]
	 */
	public function business_meta_box_callback( $post ) {
		include( plugin_dir_path( __FILE__ ) . 'partials/smooth-directory-admin-display-metabox.php' );
	} // business_meta_box_callback()

	/**
	 * Saves metabox data
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @param 	int 		$post_id 		The post ID
	 * @param 	object 		$object 		The post object
	 * @return 	void
	 */
	public function business_save_meta_box_data( $post_id ) {

		if ( ! isset( $_POST['business_meta_box_nonce'] ) ) { return; }
		if ( ! wp_verify_nonce( $_POST['business_meta_box_nonce'], $this->plugin_name ) ) { return; }
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
		if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
		if ( ! current_user_can( 'edit_page', $post_id ) ) { return $post_id; }

		// Sanitize user input.
		$contact_data = sanitize_text_field( $_POST['business_contact'] );
		$email_data = sanitize_text_field( $_POST['business_email'] );
		$description_data = sanitize_text_field( $_POST['business_description'] );
		$website_data = sanitize_text_field( $_POST['business_website'] );
		$phone_data = sanitize_text_field( $_POST['business_phone'] );
		$address_data = sanitize_text_field( $_POST['business_address'] );
		$address2_data = sanitize_text_field( $_POST['business_address2'] );
		$city_data = sanitize_text_field( $_POST['business_city'] );
		$state_data = sanitize_text_field( $_POST['business_state'] );
		$zip_data = sanitize_text_field( $_POST['business_zip'] );

		// Update the meta field in the database.
		update_post_meta( $post_id, 'meta_business_contact', $contact_data );
		update_post_meta( $post_id, 'meta_business_email', $email_data );
		update_post_meta( $post_id, 'meta_business_description', $description_data );
		update_post_meta( $post_id, 'meta_business_website', $website_data );
		update_post_meta( $post_id, 'meta_business_phone', $phone_data );
		update_post_meta( $post_id, 'meta_business_address', $address_data );
		update_post_meta( $post_id, 'meta_business_address2', $address2_data );
		update_post_meta( $post_id, 'meta_business_city', $city_data );
		update_post_meta( $post_id, 'meta_business_state', $state_data );
		update_post_meta( $post_id, 'meta_business_zip', $zip_data );
	} // business_save_meta_box_data()

	/**
	 * Creates menu page
	 *
	 * @since 	1.0.0
	 * @return 	void
	 */
	function business_menu() {
		add_submenu_page( 'edit.php?post_type=businesses', 'Smooth Directory Settigns', 'Settings', 'publish_posts', 'smooth-directory-settings', 'business_options');

		function business_options() {
			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}

			include( plugin_dir_path( __FILE__ ) . 'partials/smooth-directory-admin-options.php' );
		} // business_options()
	} // business_menu()

	/**
	 * Inits settings fields
	 *
	 * @since 	1.0.0
	 * @return 	void
	 */
	function business_settings_init() {
		register_setting('business_group','business_setting_header_bg');
	} // business_settings_init()

}
