<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.catchthemes.com
 * @since      1.0.0
 *
 * @package    Catch_Social_Share
 * @subpackage Catch_Social_Share/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Catch_Social_Share
 * @subpackage Catch_Social_Share/public
 * @author     Catch Plugins <www.catchthemes.com>
 */
class Catch_Social_Share_Public {


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
		 * defined in Catch_Breadcrumb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Catch_Breadcrumb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/catch-social-share-public.css', array(), $this->version, 'all' );
		 wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . '../fonts/css/font-awesome.css', array(), $this->version, 'all' );

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
		 * defined in Catch_Breadcrumb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Catch_Breadcrumb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/catch-social-share-public.js', array( 'jquery' ), $this->version, false );
		
	}
	
	public function add_links_after_content( $content ){

		$opts = catch_social_share_get_options();

		$show_buttons = false;

		
		if( ! empty( $opts['add_post_types'] ) && in_array( get_post_type(), $opts['add_post_types'] ) && is_singular( $opts['add_post_types'] ) ) {
			$show_buttons = true;
		}
			
		$show_buttons = apply_filters( 'catch_display', $show_buttons );
		if( ! $show_buttons ) {
			return $content;
		}
		
		
		if( $opts['social_position'] == 'before' ){
			return $this->social_sharing($opts).$content;
		}
		else{
			return $content . $this->social_sharing($opts);			
		}
	}

	function social_sharing( $atts=array() ) {
		$social_options= catch_social_share_get_options( 'social_options' );

		if( !is_array( $social_options ) )
			$social_options = array_filter( array_map( 'trim', explode( ',',$social_options ) ) );
		
		remove_filter('the_title','wptexturize');
		
		$title = urlencode( html_entity_decode( get_the_title() ) );
		add_filter( 'the_title','wptexturize' );
		
		$url = urlencode( get_permalink() );
		$opts=catch_social_share_get_options();

		$catch_button_facebook		=	'fa fa-facebook';
		$catch_button_twitter		=	'fa fa-twitter';
		$catch_button_linkedin		=	'fa fa-linkedin';
		$catch_button_pinterest		=	'fa fa-pinterest';
		$catch_button_xing			=	'fa fa-xing';
		$catch_button_reddit		=	'fa fa-reddit';
		$catch_button_whatsapp		=	'fa fa-whatsapp';		
		$catch_social_sharing       ='';
		if( $opts['show_icon'] ){
			$catch_social_sharing	=	'catch-social-sharing-round';
			$catch_button_facebook	=	'fa fa-facebook';
			$catch_button_twitter	=	'fa fa-twitter';
			$catch_button_linkedin	=	'fa fa-linkedin';	
			$catch_button_pinterest	=	'fa fa-pinterest';
			$catch_button_xing		=	'fa fa-xing';
			$catch_button_reddit	=	'fa fa-reddit';
			$catch_button_whatsapp	=	'fa fa-whatsapp';
		}
		
		$icon_order=explode( ',',$opts['icon_order'] );
		
		ob_start();
		?>
		<div class="catch-social-sharing <?php echo $catch_social_sharing;?>">
			
			<?php if( !empty( $opts['before_button_text'] ) && ( $opts['text_position'] == 'left' ||$opts['text_position'] == 'top') ):?>
			<span class="<?php echo $opts['text_position'];?> before-sharebutton-text"><?php echo $opts['before_button_text']; ?></span>
	        <?php endif;?>
	        <?php 
	        foreach($icon_order as $o) {
	        	switch($o) {
	        		case 'facebook':
	        			if( in_array('facebook', $opts['social_options'] ) ){
	        			?><a rel="external nofollow" class="<?php echo $catch_button_facebook;?>" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank" ><?php if( 0 == $opts['show_icon'] ) echo $opts['facebook_text']; ?></a><?php
	        			}
	        		break;
	        		case 'twitter':
	        			if( in_array( 'twitter', $opts['social_options'] ) ){
	        			?><a rel="external nofollow" class="<?php echo $catch_button_twitter;?>" href="http://twitter.com/intent/tweet/?text=<?php echo $title; ?>&url=<?php echo $url; ?>" target="_blank"><?php if( 0 == $opts['show_icon'] ) echo $opts['twitter_text']; ?></a><?php
	        			}
	        		break;
					case 'linkedin':
						if( in_array( 'linkedin', $opts['social_options'] ) ){
							?><a rel="external nofollow" class="<?php echo $catch_button_linkedin;?>" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo substr($url,0,1024);?>&title=<?php echo substr($title,0,200);?>" target="_blank" ><?php if( 0 == $opts['show_icon'] ) echo $opts['linkedin_text']; ?></a><?php
						}
	        		break;
	        		case 'pinterest':
	        			if( in_array( 'pinterest', $opts['social_options'] ) ){
	        				?><a rel=' external nofollow' class="<?php echo $catch_button_pinterest;?>" href='javascript:pinItt();' ><?php if( 0 == $opts['show_icon'] ) echo $opts['pinterest_text']; ?></a><?php
                        
	        			}
	        			
					break;
                    case 'xing':
                        if( in_array( 'xing', $opts['social_options'] ) ){
                    	    ?><a rel="external nofollow" class="<?php echo $catch_button_xing;?>" href="https://www.xing.com/spi/shares/new?url=<?php echo $url;?>" target="_blank" ><?php if( 0 == $opts['show_icon'] ) echo $opts['xing_text']; ?></a><?php
                        }
	        		break;
					case 'reddit':
						if( in_array( 'reddit', $opts['social_options'] ) ){
							?><a  rel="external nofollow"  class="<?php echo $catch_button_reddit;?>" href="http://reddit.com/submit?url=<?php echo $url;?>&amp;title=<?php echo $title?>" target="_blank"><?php if( 0 == $opts['show_icon'] ) echo $opts['reddit_text'];?></a><?php
                        }
                    
                    break;
                     case 'whatsapp':
						if( in_array( 'whatsapp', $opts['social_options'] ) ){
							?><a  rel="external nofollow"  class="<?php echo $catch_button_whatsapp;?>" href="https://api.whatsapp.com/send?text=<?php echo $url;?>&amp;title=<?php echo $title?>" target="_blank"><?php if( 0 == $opts['show_icon'] ) echo $opts['whatsapp_text'];?></a><?php
                        }
                    break;
          		}
	        } ?>
	        <?php if( !empty( $opts['before_button_text'] ) && ( $opts['text_position'] == 'bottom' || $opts['text_position'] == 'right') ):?>
			<span class="<?php echo $opts['text_position'];?>  before-sharebutton-text"><?php echo $opts['before_button_text']; ?></span>
	        <?php endif;?>
	    </div>
	    <?php
	  	$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}

