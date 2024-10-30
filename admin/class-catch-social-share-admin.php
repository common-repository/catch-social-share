<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.catchthemes.com
 * @since      1.0.0
 *
 * @package    Catch_Social_Share
 * @subpackage Catch_Social_Share/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Catch_Social_Share
 * @subpackage Catch_Social_Share/admin
 * @author     Catch Plugins <www.catchthemes.com>
 */
class Catch_Social_Share_Admin {

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
		 * defined in Catch_Social_Share_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Catch_Social_Share_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if( isset( $_GET['page'] ) && 'catch-social-share' == $_GET['page'] ) {
			wp_enqueue_style( $this->plugin_name. '-dashboard', plugin_dir_url( __FILE__ ) . 'css/catch-social-share-admin.css', array(), $this->version, 'all' );
              wp_enqueue_style( 'font-awesome-catch-social-share', plugin_dir_url( __FILE__ ) . '../fonts/css/font-awesome.css', array(), $this->version, 'all' );
        }

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
		 * defined in Catch_Social_Share_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Catch_Social_Share_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( isset( $_GET['page'] ) && 'catch-social-share' == $_GET['page'] ) {
			wp_enqueue_script( 'matchHeight', plugin_dir_url( __FILE__ ) . 'js/jquery-matchHeight.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/catch-social-share-admin.js', array( 'jquery', 'matchHeight', 'jquery-ui-tooltip', 'jquery-ui-sortable' ), $this->version, false );
		}
	}
	public function add_plugin_settings_menu() {
		add_menu_page(
			esc_html__( 'Catch Social Share', 'catch-social-share' ), // $page_title.
			esc_html__( 'Catch Social Share', 'catch-social-share' ), // $menu_title.
			'manage_options', // $capability.
			'catch-social-share', // $menu_slug.
			array( $this, 'settings_page' ), // $callback_function.
			'dashicons-share', // $icon_url.
			'99.01564' // $position.
		);
		add_submenu_page(
			'catch-social-share', // $parent_slug.
			esc_html__( 'Catch Social Sharing', 'catch-social-share' ), // $page_title.
			esc_html__( 'Settings', 'catch-social-share' ), // $menu_title.
			'manage_options', // $capability.
			'catch-social-share', // $menu_slug.
			array( $this,'settings_page' ) // $callback_function.
		);
	}

	public function settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'catch-social-share' ) );
		}

		$post_types = get_post_types( array( 'public' => true ), 'objects' );
		require plugin_dir_path( __FILE__ ) . 'partials/catch-social-share-admin-display.php';

	}

	public function register_settings() {
		register_setting(
			'catch-social-share-group',
			'catch_social_share_options',
			array( $this, 'sanitize_callback' )
		);
	}

	public function sanitize_callback( $input ) {
		if ( isset( $input['reset'] ) && $input['reset'] ) {
			return catch_social_share_default_options();
		}
		$message = null;
		$type    = null;
		// Verify the nonce before proceeding.
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			|| ( ! isset( $_POST['catch_social_share_nounce'] )
    	    || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['catch_social_share_nounce'] ) ), basename( __FILE__ ) ) )
    	    || ( ! check_admin_referer( basename( __FILE__ ), 'catch_social_share_nounce' ) ) ) {
				if ( null !== $input ) {
					$input['reset'] = ( isset( $input['reset'] ) && '1' == $input['reset'] ) ? '1' : '0';
					$input['show_icon'] = ( isset( $input['show_icon'] ) && '1' == $input['show_icon'] ) ? '1' : '0';
					$social_options = isset( $input['social_options'] ) ? $input['social_options'] : array();
					if( is_array( $social_options ) ) {
						$valid_social_share_options = catch_social_share_valid_options();
						$input['social_options'] = array();
						foreach( $social_options as $social_site ) {
						    $input['social_options'][] = ( in_array( $social_site, $valid_social_share_options ) ) ? $social_site : 0;
						}
					}
				
					if ( isset( $input['social_position'] ) && $input['social_position'] ) {
						$input['social_position']    = sanitize_key( $input['social_position'] );
					}
					if ( isset( $input['text_position'] ) && $input['text_position'] ) {
						$input['text_position']      = sanitize_key( $input['text_position'] );
					}
					if ( isset( $input['before_button_text'] ) && $input['before_button_text'] ) {
						$input['before_button_text'] = sanitize_text_field( $input['before_button_text'] );
					}
					if ( isset( $input['facebook_text'] ) && $input['facebook_text'] ) {
						$input['facebook_text']      = sanitize_text_field( $input['facebook_text'] );
					}
					if ( isset( $input['twitter_text'] ) && $input['twitter_text'] ) {
						$input['twitter_text']       = sanitize_text_field( $input['twitter_text'] );
					}
					if ( isset( $input['linkedin_text'] ) && $input['linkedin_text'] ) {
						$input['linkedin_text']      = sanitize_text_field( $input['linkedin_text'] );
					}
					if ( isset( $input['pinterest_text'] ) && $input['pinterest_text'] ) {
						$input['pinterest_text']     = sanitize_text_field( $input['pinterest_text'] );
					}
					if ( isset( $input['reddit_text'] ) && $input['reddit_text'] ) {
						$input['reddit_text']        = sanitize_text_field( $input['reddit_text'] );
					}
					if ( isset( $input['xing_text'] ) && $input['xing_text'] ) {
						$input['xing_text']          = sanitize_text_field( $input['xing_text'] );
					}
					if ( isset( $input['whatsapp_text'] ) && $input['whatsapp_text'] ) {
						$input['whatsapp_text']      = sanitize_text_field( $input['whatsapp_text'] );
					}
				    if ( isset( $input['icon_order'] ) && $input['icon_order'] ) {
				    	$valid_social_share_options = catch_social_share_valid_options();
				    	sort($valid_social_share_options);

				    	$input_social_share_options = explode(',', $input['icon_order'] );
				    	sort($input_social_share_options);
				    	
				    	if( $valid_social_share_options == $input_social_share_options ) {
							$input['icon_order'] = $input['icon_order'];
						} else {
							$default = catch_social_share_default_options();
							$input['icon_order'] = $default['icon_order'];
						}
					}
	       			return $input;
        		}
    	} 
   		return 'Invalid Nonce';
	}

	public function show_settings_page() {
		$post_types = get_post_types( array( 'public' => true ), 'objects' );
	}

	public function action_links( $links, $file ) {
		if ( $file === $this->plugin_name . '/' . $this->plugin_name . '.php' ) {
			$settings_link = '<a href="' . esc_url( admin_url( 'admin.php?page=catch-social-share' ) ) . '">' . esc_html__( 'Settings', 'catch-social-share' ) . '</a>';

			array_unshift( $links, $settings_link );
		}
		return $links;
	}

	function add_plugin_meta_links( $meta_fields, $file ){
		if( CATCH_SOCIAL_SHARE_BASENAME == $file ) {
			$meta_fields[] = "<a href='https://catchplugins.com/support-forum/forum/catch-social-share/' target='_blank'>Support Forum</a>";
			$meta_fields[] = "<a href='https://wordpress.org/support/plugin/catch-social-share/reviews#new-post' target='_blank' title='Rate'>
			        <i class='ct-rate-stars'>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "</i></a>";

			$stars_color = "#ffb900";

			echo "<style>"
				. ".ct-rate-stars{display:inline-block;color:" . $stars_color . ";position:relative;top:3px;}"
				. ".ct-rate-stars svg{fill:" . $stars_color . ";}"
				. ".ct-rate-stars svg:hover{fill:" . $stars_color . "}"
				. ".ct-rate-stars svg:hover ~ svg{fill:none;}"
				. "</style>";
		}

		return $meta_fields;
	}

	function include_icon_order_action(){
		$catch_social_options               = catch_social_share_get_options();
		$catch_social_options['icon_order'] = rtrim( $_POST['new_order'], ',' );
		if( update_option( 'catch_social_share_options', $catch_social_options ) ){
			echo 'Updated';
			}else {
				echo 'Update failed';
			}
			die;
	}
}
