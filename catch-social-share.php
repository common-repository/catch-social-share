<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.catchplugins.com
 * @since             1.0.0
 * @package           Catch_Social_Share
 *
 * @wordpress-plugin
 * Plugin Name:       Catch Social Share
 * Plugin URI:        http://www.catchplugins.com/plugins/catch-social-share
 * Description:       Catch Social Share is a simple yet feature-rich social sharing WordPress plugin that adds social share buttons on your site. Provide your visitors an easier gateway to share your content in various social media platforms.
 * Version:           1.2.4
 * Author:            Catch Plugins
 * Author URI:        http://www.catchplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       catch-social-share
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CATCH_SOCIAL_SHARE_VERSION', '1.2.4' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-catch-breadcrumb-activator.php
 */
// The URL of the directory that contains the plugin
if ( ! defined( 'CATCH_SOCIAL_SHARE_URL' ) ) {
	define( 'CATCH_SOCIAL_SHARE_URL', plugin_dir_url( __FILE__ ) );
}


// The absolute path of the directory that contains the file
if ( ! defined( 'CATCH_SOCIAL_SHARE_PATH' ) ) {
	define( 'CATCH_SOCIAL_SHARE_PATH', plugin_dir_path( __FILE__ ) );
}


// Gets the path to a plugin file or directory, relative to the plugins directory, without the leading and trailing slashes.
if ( ! defined( 'CATCH_SOCIAL_SHARE_BASENAME' ) ) {
	define( 'CATCH_SOCIAL_SHARE_BASENAME', plugin_basename( __FILE__ ) );
}

function activate_catch_social_share() {
	/* Check if Catch social Share Pro is installed and active, abort plugin activation and return with message */
	$required = 'catch-social-share-pro/catch-social-share-pro.php';
	if ( is_plugin_active( $required ) ) {
		$message = esc_html__( 'Sorry, Pro plugin is already active. No need to activate Free version. %1$s&laquo; Return to Plugins%2$s.', 'catch-social-share' );
		$message = sprintf( $message, '<br><a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">', '</a>' );
		wp_die( $message );
	}
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-catch-social-share-activator.php';
	Catch_Social_Share_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-catch-social-share-deactivator.php
 */
function deactivate_catch_social_share() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-catch-social-share-deactivator.php';
	Catch_Social_Share_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_catch_social_share' );
register_deactivation_hook( __FILE__, 'deactivate_catch_social_share' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-catch-social-share.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function catch_social_share_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

if ( ! function_exists( 'catch_social_share_get_options' ) ) :
	function catch_social_share_get_options() {
		$defaults = catch_social_share_default_options();
		$options  = get_option( 'catch_social_share_options', $defaults );
		return wp_parse_args( $options, $defaults );
	}
endif;

function catch_social_share_valid_options() {
	$options = array(
		'facebook',
		'twitter',
		'linkedin',
		'pinterest',
		'xing',
		'reddit',
		'whatsapp',
	);
	return $options;
}


if ( ! function_exists( 'catch_social_share_default_options' ) ) :
	/**
	 * Return array of default options
	 *
	 * @since     1.0
	 * @return    array    default options.
	 */

	function catch_social_share_default_options( $option = null ) {
		$default_options = array(
			'social_options'     => array( 'facebook', 'twitter', 'linkedin' ),
			'social_position'    => 'before',
			'before_button_text' => '',
			'text_position'      => 'left',
			'show_icon'          => 1,
			'add_post_types'     => array( 'post' ),
			'facebook_text'      => 'Facebook',
			'twitter_text'       => 'Twitter',
			'linkedin_text'      => 'Linked',
			'pinterest_text'     => 'Pinterest',
			'xing_text'          => 'Xing',
			'reddit_text'        => 'Reddit',
			'whatsapp_text'      => 'Whatsapp',
			'icon_order'         => 'facebook,twitter,linkedin,pinterest,xing,reddit,whatsapp',
		);

		if ( null == $option ) {
			return apply_filters( 'catch_social_share_options', $default_options );
		} else {
			return $default_options[ $option ];
		}
	}
endif;

function run_catch_social_share() {

	$plugin = new Catch_Social_Share();
	$plugin->run();

}
run_catch_social_share();
require plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php';

function catch_social_share_position() {
	$options = array(
		'before' => esc_html__( 'Before Content', 'catch-social-share' ),
		'after'  => esc_html__( 'After Content', 'catch-social-share' ),
	);

	return $options;
}
function catch_social_share_text_position() {
	$opt = array(
		'left'   => esc_html__( 'Left', 'catch-social-share' ),
		'right'  => esc_html__( 'Right', 'catch-social-share' ),
		'top'    => esc_html__( 'Top', 'catch-social-share' ),
		'bottom' => esc_html__( 'Bottom', 'catch-social-share' ),
	);

	return $opt;
}
