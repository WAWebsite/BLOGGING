<?php
/**
 * Plugin Name: ConeBlog Widgets
 * Description: Beautiful Blog widgets for WordPress, Elementor, and Page Builders.
 * Plugin URI:  https://wpcone.com/plugins/coneblog-widgets/
 * Version:     1.4.8
 * Author:      WPCone.com
 * Author URI:  https://wpcone.com
 * Text Domain: coneblog-widgets
 */
if ( ! function_exists( 'cbw_fs' ) ) {
    // Create a helper function for easy SDK access.
    function cbw_fs() {
        global $cbw_fs;

        if ( ! isset( $cbw_fs ) ) {
            // Include Freemius SDK.
            require_once plugin_dir_path(__FILE__) . 'inc/frameworks/freemius/start.php';

            $cbw_fs = fs_dynamic_init( array(
                'id'                  => '8082',
                'slug'                => 'coneblog-widgets',
                'type'                => 'plugin',
                'public_key'          => 'pk_a793ab2f341762f3dbfc6741bc771',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'coneblog',
                    'contact'        => false,
                    'support'        => false,
                ),
            ) );
        }

        return $cbw_fs;
    }

    // Init Freemius.
    cbw_fs();
    // Signal that SDK was initiated.
    do_action( 'cbw_fs_loaded' );
}
if(!defined('CONEBLOG_WIDGETS')) {
    define( 'CONEBLOG_WIDGETS', __FILE__ );
}
if(!defined('CONEBLOG_PLUGIN_PATH')) {
    define( "CONEBLOG_PLUGIN_PATH", plugin_dir_path(__FILE__) );
}
if(!defined('CONEBLOG_ASSETS_PATH')) {
    define( "CONEBLOG_ASSETS_PATH", plugins_url( 'assets/', __FILE__ ) );
}
if(!defined('CONEBLOG_WIDGET_ASSETS_PATH')) {
    define( "CONEBLOG_WIDGET_ASSETS_PATH", plugins_url( 'widgets/', __FILE__ ) );
}

/**
 * Include helper functions class.
 */
require CONEBLOG_PLUGIN_PATH . 'inc/Helper.php';

/**
 * Include the plugin loader class.
 */
require CONEBLOG_PLUGIN_PATH . 'plugin-loader.php';

/**
 * Include the plugin settings page.
 */
require CONEBLOG_PLUGIN_PATH . 'plugin-settings.php';

/**
 * Register default settings
 */
require CONEBLOG_PLUGIN_PATH . 'inc/default-settings.php';
register_activation_hook( CONEBLOG_WIDGETS, 'coneblod_set_default_settings' );