<?php
/**
 *
 *
 * @link        https://catchplugins.com/plugins
 * @since      1.0.0
 *
 * @package    catch-social-share
 * @subpackage catch-social-share/includes
 */

/**
 *
 *
 * @package    Catch Social Share
 * @subpackage Catch Social Share/includes
 * @author     Catch Plugins <info@catchplugins.com
 */


class Catch_Social_Share_Shortcode {

	public function __construct() {

		add_shortcode( 'catch-social-share',array( $this,'catch_social_sharing' ) );
	}

	function catch_social_sharing( $atts=array() ){
		$social_options= catch_social_share_get_options( 'social_options' );

		if( !is_array( $social_options ) )
			$social_options = array_filter( array_map( 'trim', explode( ',',$social_options ) ) );
		
		remove_filter( 'the_title','wptexturize' );
		
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
			$catch_social_sharing   =	'catch-social-sharing-round';
			$catch_button_facebook  =	'fa fa-facebook';
			$catch_button_twitter   =	'fa fa-twitter';
			$catch_button_linkedin  =	'fa fa-linkedin';	
			$catch_button_pinterest =	'fa fa-pinterest';
			$catch_button_xing      =	'fa fa-xing';
			$catch_button_reddit    =	'fa fa-reddit';
			$catch_button_whatsapp  =	'fa fa-whatsapp';
			}
		
		$icon_order=explode( ',',$opts['icon_order'] );
		
		ob_start();
		?>
		<div class="catch-social-sharing <?php echo $catch_social_sharing;?>">
			
			<?php if( !empty($opts['before_button_text']) && ( $opts['text_position'] == 'left' ||$opts['text_position'] == 'top') ):?>
			<span class="<?php echo $opts['text_position'];?> before-sharebutton-text"><?php echo $opts['before_button_text']; ?></span>
	        <?php endif;?>
	        <?php 
	        foreach($icon_order as $o) {
	        	switch($o) {
	        		case 'facebook':
	        			if( in_array( 'facebook', $opts['social_options'] ) ){
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
new Catch_Social_Share_Shortcode();




