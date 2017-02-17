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
     * Enable REST API
     **********************************/

    /**
     * Enable REST API for specified endpoint
     *
     * @since 1.0.0
     */
    private function ctc_enable_rest_api($endpoint_type, $rest_base, $args ) {
        if(isset($this->plugin_options[$endpoint_type]) && !empty($this->plugin_options[$endpoint_type])) {
            $args['show_in_rest'] = true;
            $args['rest_base']    = $rest_base;
        } else {
            $args['show_in_rest'] = false;
        }

        return $args;
    }

    /**********************************
     * TEST FUNCTION
     **********************************/

    /**
     * Enable REST API for a number of endpoints
     *
     * @since 1.0.0
     */
    public function ctc_enable_api( $args ) {
        //$args['show_in_rest'] = true;
        //$args['rest_base']    = $rest_base;
        error_log(print_r($args));
    }

    /**********************************
     * SERMON
     **********************************/

    /**
     * Enable REST API for sermon post type.
     *
     * @since 1.0.0
     */
    public function ctc_enable_sermon_rest_api( $args ) {
        return $this->ctc_enable_rest_api('sermon', 'ctc_sermon', $args);
    }

    /**
     * Enable REST API for sermon topic.
     *
     * @since 1.0.0
     */
    public function ctc_enable_sermon_topic_rest_api( $args ) {
        return $this->ctc_enable_rest_api('sermon_topic', 'ctc_sermon_topic', $args);
    }

    /**
     * Enable REST API for sermon book.
     *
     * @since 1.0.0
     */
    public function ctc_enable_sermon_book_rest_api( $args ) {
        return $this->ctc_enable_rest_api('sermon_book', 'ctc_sermon_book', $args);
    }

    /**
     * Enable REST API for sermon series.
     *
     * @since 1.0.0
     */
    public function ctc_enable_sermon_series_rest_api( $args ) {
        return $this->ctc_enable_rest_api('sermon_series', 'ctc_sermon_series', $args);
    }

    /**
     * Enable REST API for sermon speaker.
     *
     * @since 1.0.0
     */
    public function ctc_enable_sermon_speaker_rest_api( $args ) {
        return $this->ctc_enable_rest_api('sermon_speaker', 'ctc_sermon_speaker', $args);
    }

    /**
     * Enable REST API for sermon tag.
     *
     * @since 1.0.0
     */
    public function ctc_enable_sermon_tag_rest_api( $args ) {
        return $this->ctc_enable_rest_api('sermon_tag', 'ctc_sermon_tag', $args);
    }

    /**********************************
     * EVENT
     **********************************/

    /**
     * Enable REST API for event post type.
     *
     * @since 1.0.0
     */
    public function ctc_enable_event_rest_api( $args ) {
        return $this->ctc_enable_rest_api('event', 'ctc_event', $args);
    }

    /**
     * Enable REST API for event category.
     *
     * @since 1.0.0
     */
    public function ctc_enable_event_category_rest_api( $args ) {
        return $this->ctc_enable_rest_api('event_category', 'ctc_event_category', $args);
    }

    /**********************************
     * LOCATION
     **********************************/

    /**
     * Enable REST API for location post type.
     *
     * @since 1.0.0
     */
    public function ctc_enable_location_rest_api( $args ) {
        return $this->ctc_enable_rest_api('location', 'ctc_location', $args);
    }

    /**********************************
     * PERSON
     **********************************/

    /**
     * Enable REST API for person post type.
     *
     * @since 1.0.0
     */
    public function ctc_enable_person_rest_api( $args ) {
        return $this->ctc_enable_rest_api('person', 'ctc_person', $args);
    }

    /**
     * Enable REST API for person group.
     *
     * @since 1.0.0
     */
    public function ctc_enable_person_group_rest_api( $args ) {
        return $this->ctc_enable_rest_api('person_group', 'ctc_person_group', $args);
    }

}
