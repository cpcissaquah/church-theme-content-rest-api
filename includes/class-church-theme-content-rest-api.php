<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/joe--cool
 * @since      1.0.0
 *
 * @package    Church_Theme_Content_Rest_Api
 * @subpackage Church_Theme_Content_Rest_Api/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Church_Theme_Content_Rest_Api
 * @subpackage Church_Theme_Content_Rest_Api/includes
 * @author     joe--cool <aarond@cpcissaquah.org>
 */
class Church_Theme_Content_Rest_Api {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Church_Theme_Content_Rest_Api_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct() {

        $this->plugin_name = 'church-theme-content-rest-api';
        $this->version = '1.0.0';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();

    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Church_Theme_Content_Rest_Api_Loader. Orchestrates the hooks of the plugin.
     * - Church_Theme_Content_Rest_Api_i18n. Defines internationalization functionality.
     * - Church_Theme_Content_Rest_Api_Admin. Defines all hooks for the admin area.
     * - Church_Theme_Content_Rest_Api_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-church-theme-content-rest-api-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-church-theme-content-rest-api-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-church-theme-content-rest-api-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-church-theme-content-rest-api-public.php';

        $this->loader = new Church_Theme_Content_Rest_Api_Loader();

    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Church_Theme_Content_Rest_Api_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        $plugin_i18n = new Church_Theme_Content_Rest_Api_i18n();

        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks() {

        $plugin_admin = new Church_Theme_Content_Rest_Api_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

        // Add menu item
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );

        // Add Settings link to the plugin
        $plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' );
        $this->loader->add_filter( 'plugin_action_links_' . $plugin_basename, $plugin_admin, 'add_action_links' );
        $this->loader->add_action('admin_init', $plugin_admin, 'options_update');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {

        $plugin_public = new Church_Theme_Content_Rest_Api_Public( $this->get_plugin_name(), $this->get_version() );

        // $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
        // $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

        // Adding filters for Sermon
        $this->loader->add_filter( 'ctc_post_type_sermon_args', $plugin_public, 'ctc_enable_sermon_rest_api' );
        $this->loader->add_filter( 'ctc_taxonomy_sermon_topic_args', $plugin_public, 'ctc_enable_sermon_topic_rest_api' );
        $this->loader->add_filter( 'ctc_taxonomy_sermon_book_args', $plugin_public, 'ctc_enable_sermon_book_rest_api' );
        $this->loader->add_filter( 'ctc_taxonomy_sermon_series_args', $plugin_public, 'ctc_enable_sermon_series_rest_api' );
        $this->loader->add_filter( 'ctc_taxonomy_sermon_speaker_args', $plugin_public, 'ctc_enable_sermon_speaker_rest_api' );
        $this->loader->add_filter( 'ctc_taxonomy_sermon_tag_args', $plugin_public, 'ctc_enable_sermon_tag_rest_api' );

        // Adding filters for Event
        $this->loader->add_filter( 'ctc_post_type_event_args', $plugin_public, 'ctc_enable_event_rest_api' );
        $this->loader->add_filter( 'ctc_taxonomy_event_category_args', $plugin_public, 'ctc_enable_event_category_rest_api' );

        // Adding filters for Location
        $this->loader->add_filter( 'ctc_post_type_location_args', $plugin_public, 'ctc_enable_location_rest_api' );

        // Adding filters for Person
        $this->loader->add_filter( 'ctc_post_type_person_args', $plugin_public, 'ctc_enable_person_rest_api' );
        $this->loader->add_filter( 'ctc_taxonomy_person_group_args', $plugin_public, 'ctc_enable_person_group_rest_api' );

        // Adding test filters
        $this->loader->add_filter( 'ctc_get_feature_data', $plugin_public, 'ctc_enable_api' );
        $this->loader->add_filter( 'ctc_get_feature_data_by_post_type', $plugin_public, 'ctc_enable_api' );
        $this->loader->add_filter( 'ctc_get_theme_support', $plugin_public, 'ctc_enable_api' );
        $this->loader->add_filter( 'ctc_get_theme_support_by_post_type', $plugin_public, 'ctc_enable_api' );
        $this->loader->add_filter( 'ctc_feature_supported', $plugin_public, 'ctc_enable_api' );
        $this->loader->add_filter( 'ctc_taxonomy_supported', $plugin_public, 'ctc_enable_api' );
        $this->loader->add_filter( 'ctc_field_supported', $plugin_public, 'ctc_enable_api' );

//        $this->loader->add_filter( 'ctc_get_feature_data', $plugin_public, 'ctc_enable_sermon_rest_api' );
//        $this->loader->add_filter( 'ctc_get_feature_data_by_post_type', $plugin_public, 'ctc_enable_sermon_rest_api' );
//        $this->loader->add_filter( 'ctc_get_theme_support', $plugin_public, 'ctc_enable_sermon_rest_api' );
//        $this->loader->add_filter( 'ctc_get_theme_support_by_post_type', $plugin_public, 'ctc_enable_sermon_rest_api' );
//        $this->loader->add_filter( 'ctc_feature_supported', $plugin_public, 'ctc_enable_sermon_rest_api' );
//        $this->loader->add_filter( 'ctc_taxonomy_supported', $plugin_public, 'ctc_enable_sermon_rest_api' );
//        $this->loader->add_filter( 'ctc_field_supported', $plugin_public, 'ctc_enable_sermon_rest_api' );
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    Church_Theme_Content_Rest_Api_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

}
