<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/joe--cool
 * @since      1.0.0
 *
 * @package    Church_Theme_Content_Rest_Api
 * @subpackage Church_Theme_Content_Rest_Api/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Church_Theme_Content_Rest_Api
 * @subpackage Church_Theme_Content_Rest_Api/public
 * @author     joe--cool <aarond@cpcissaquah.org>
 */
class Church_Theme_Content_Rest_Api_Public {

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
        $this->plugin_options = get_option($this->plugin_name);
        error_log(print_r($this->plugin_options, true));

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
         * defined in Church_Theme_Content_Rest_Api_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Church_Theme_Content_Rest_Api_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/church-theme-content-rest-api-public.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Church_Theme_Content_Rest_Api_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Church_Theme_Content_Rest_Api_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/church-theme-content-rest-api-public.js', array( 'jquery' ), $this->version, false );

    }

    /**********************************
     * SERMON
     **********************************/

    /**
     * Enable REST API for sermon post type.
     *
     * @since 0.1
     */
    function ctc_enable_sermon_rest_api( $args ) {
        error_log('starting ctc_enable_sermon_rest_api');
        $post_type = 'sermon';
        
        if(isset($this->plugin_options[$post_type]) && !empty($this->plugin_options[$post_type])) {
            error_log('    enabled');
            $args['show_in_rest'] = true;
            $args['rest_base']    = "ctc_sermon";
        } else {
            error_log('    disabled');
            $args['show_in_rest'] = false;
        }

        return $args;
    }

    /**********************************
     * EVENT
     **********************************/

    /**
     * Enable REST API for event post type.
     *
     * @since 0.1
     */
    function ctc_enable_event_rest_api( $args ) {
        error_log('starting ctc_enable_event_rest_api');
        $post_type = 'event';
        
        if(isset($this->plugin_options[$post_type]) && !empty($this->plugin_options[$post_type])) {
            error_log('    enabled');
            $args['show_in_rest'] = true;
            $args['rest_base']    = "ctc_event";
        } else {
            error_log('    disabled');
            $args['show_in_rest'] = false;
        }

        return $args;
    }

    /**********************************
     * LOCATION
     **********************************/

    /**
     * Enable REST API for location post type.
     *
     * @since 0.1
     */
    function ctc_enable_location_rest_api( $args ) {
        error_log('starting ctc_enable_location_rest_api');
        $post_type = 'location';
        
        if(isset($this->plugin_options[$post_type]) && !empty($this->plugin_options[$post_type])) {
            error_log('    enabled');
            $args['show_in_rest'] = true;
            $args['rest_base']    = "ctc_location";
        } else {
            error_log('    disabled');
            $args['show_in_rest'] = false;
        }

        return $args;
    }

    /**********************************
     * PERSON
     **********************************/

    /**
     * Enable REST API for person post type.
     *
     * @since 0.1
     */
    function ctc_enable_person_rest_api( $args ) {
        error_log('starting ctc_enable_person_rest_api');
        $post_type = 'person';
        
        if(isset($this->plugin_options[$post_type]) && !empty($this->plugin_options[$post_type])) {
            error_log('    enabled');
            $args['show_in_rest'] = true;
            $args['rest_base']    = "ctc_person";
        } else {
            error_log('    disabled');
            $args['show_in_rest'] = false;
        }

        return $args;
    }

}
