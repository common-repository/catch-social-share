<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link      https://catchplugins.com/plugins
 * @since      1.0.0
 *
 * @package    Catch_Social_Sharing
 * @subpackage Catch_Social_Sharing/admin/partials
 */
?>
<div id="catch-social-sharing">
	<div class="content-wrapper">
		<div class="header">
			<h2><?php esc_html_e( 'Settings', 'catch-social-share' ); ?></h2>
		</div> <!-- .Header -->
		<div class="content">
			<?php if( isset( $_GET['settings-updated'] ) ) { ?>
			<div id="message" class="notice updated fade">
		  		<p><strong><?php esc_html_e( 'Plugin Options Saved.', 'catch-social-share' ) ?></strong></p>
		  	</div>
			<?php } ?>
			<?php // Use nonce for verification.
				wp_nonce_field( basename( __FILE__ ), 'catch_social_share_nounce' );
			?>
			<div id="social_main">
				<form method="post" action="options.php">
					<?php settings_fields( 'catch-social-share-group' ); ?>
					<?php
					$defaults =catch_social_share_default_options();
					$settings = catch_social_share_get_options();
					?>
					<div class="option-container">
			  			<table class="form-table" bgcolor="white">
							<tbody>
								
								<tr>
                                    <th scope="row"><?php esc_html_e( 'Social Share Buttons', 'catch-social-share' ); ?></th>
                                    <td>
                                        <input type="checkbox" id="facebook_share" name="catch_social_share_options[social_options][]" value="facebook" <?php checked( in_array( 'facebook', $settings['social_options'] ), true ); ?> /><label for="facebook_share"><?php echo _e( 'Facebook','catch-social-share' )?></label>
                                        &nbsp;&nbsp;<input type="checkbox" id="twitter_share" name="catch_social_share_options[social_options][]" value="twitter" <?php checked( in_array( 'twitter', $settings['social_options'] ), true ); ?> /><label for="twitter_share"><?php echo _e( 'Twitter','catch-social-share' )?></label>
                                        &nbsp;&nbsp;<input type="checkbox" id="linkedin_share" name="catch_social_share_options[social_options][]" value="linkedin" <?php checked( in_array( 'linkedin', $settings['social_options'] ), true ); ?> /><label for="linkedin_share"><?php echo _e( 'Linkedin','catch-social-share' )?></label>
                                        <br /><br /><input type="checkbox" id="pinterest_share" name="catch_social_share_options[social_options][]" value="pinterest" <?php checked( in_array( 'pinterest', $settings['social_options'] ), true ); ?> /><label for="pinterest_share"><?php echo _e( 'Pinterest','catch-social-share' )?></label>
                                        &nbsp;&nbsp;<input type="checkbox" id="xing_share" name="catch_social_share_options[social_options][]" value="xing" <?php checked( in_array( 'xing', $settings['social_options'] ), true ); ?> /><label for="xing_share"><?php echo _e( 'Xing','catch-social-share' )?></label>
                                         &nbsp;&nbsp;<input type="checkbox" id="reddit_share" name="catch_social_share_options[social_options][]" value="reddit" <?php checked( in_array( 'reddit', $settings['social_options'] ), true ); ?> /><label for="reddit_share"><?php echo _e( 'Reddit','catch-social-share' )?></label>
                                         &nbsp;&nbsp;<input type="checkbox" id="whatsapp_share" name="catch_social_share_options[social_options][]" value="whatsapp" <?php checked( in_array( 'whatsapp', $settings['social_options'] ), true ); ?> /><label for="whatsapp_share"><?php echo _e( 'Whatsapp','catch-social-share' )?></label>
                                         
                                    </td>
                                </tr>

                                <tr> 
									<th scope="row"><?php _e( 'Show Icons', 'catch-social-share' ); ?></th>
									<td>
										<?php $text   =   ( ! empty ( $settings['show_icon'] ) && $settings['show_icon'] ) ? 'checked' : '';
										echo '<input type="checkbox" ' .$text. ' name="catch_social_share_options[show_icon]" value="1"/>&nbsp;&nbsp;'. __( ' Check to show social icon', 'catch-social-share' );
										?>
					  					<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Checking this option will enable social share links.', 'catch-social-share' ); ?>"></span>
									</td>
								</tr>

                                <tr>
                                	<th>Social Icon order</th>
                                	<td>
                                		<div class="dndicon">
                                			<?php $icon_order=$settings['icon_order'];
                                			$io=explode( ',',rtrim( $icon_order,',') );
                                			foreach ($io as $i){
                                			
                                				switch($i){
                                					case 'facebook':
                                					echo '<i id="facebook" class="fa fa-facebook" aria-hidden="true"></i>';
                                					break;
                                					case 'twitter':
										            echo '<i id="twitter" class="fa fa-twitter" aria-hidden="true"></i>';
										            break;
									                case 'linkedin':
										            echo '<i id="linkedin" class="fa fa-linkedin" aria-hidden="true"></i>';	
										            break;
									                case 'pinterest':
										            echo '<i id="pinterest" class="fa fa-pinterest" aria-hidden="true"></i>';
										            break;
                                                    case 'xing':
                                                    echo '<i id="xing" class="fa fa-xing" 
                                                          aria-hidden="true"></i>';
										            break;
                                                    case 'reddit':
                                    	            echo '<i id="reddit"  class="fa fa-reddit" aria-hidden="true"></i>';
                                    	            break;
                                   
                                    	            case 'whatsapp':
                                    	            echo '<i id="whatsapp"  class="fa fa-whatsapp" aria-hidden="true"></i>';
                                    	            break;
                                    	        }
                                    	    }?>
                                    	    	
                                    	    </div>
                                    	    <input type="hidden" class="widefat" name="catch_social_share_options[icon_order]" id="icon_order" value="<?php echo esc_attr( $settings['icon_order'] ); ?>" />
                                    	    <br />
                                    	    <small><?php _e( 'Drag the social icon to change the order. No need to save.', 'catch-social-share' ); ?></small>
                                    	</td>
                                    </tr>

                                    <tr>
									<th>
										<label><?php echo esc_html__( 'Social Icon Position', 'catch-social-share' ); ?></label>
									</th>
									<td><select name="catch_social_share_options[social_position]" id="catch_social_share_options[social_position]">
							                	<?php
													$position = catch_social_share_position();
													foreach ( $position as $k => $value ) {
														echo '<option value="' . $k . '"' . selected( $settings['social_position'], $k, false ) . '>' . $value . '</option>';
													}
													?>
														
										</select>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Set your desire position for social Icon.', 'catch-social-share' ); ?>"></span>
									</td>
								</tr>
								
								<tr>
									<th><label for="before_button_text"><?php _e( 'Text before Sharing buttons','catch-social-share' );?></label></th>
									<td>
										<input type="text" class="widefat" name="catch_social_share_options[before_button_text]" id="before_button_text" value="<?php echo esc_attr( $settings['before_button_text'] ); ?>" />
									</td>
								</tr>

								<tr>
									<th>
										<label><?php echo esc_html__( 'Text Position', 'catch-social-share' ); ?></label>
									</th>
									<td><select name="catch_social_share_options[text_position]" id="catch_social_share_options[text_position]">
							                	<?php
													$text = catch_social_share_text_position();
													foreach ( $text as $k => $value ) {
														echo '<option value="' . $k . '"' . selected( $settings['text_position'], $k, false ) . '>' . $value . '</option>';
													}
													?>
														
										</select>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Set your desire text position for social Icon.', 'catch-social-share' ); ?>"></span>
									</td>
								</tr>

								<tr>
									<th><label for="facebook_text"><?php _e( 'Facebook Share button text','catch-social-share' );?></label></th>
									<td>
										<input type="text" class="widefat" name="catch_social_share_options[facebook_text]" id="facebook_text" value="<?php echo esc_attr( $settings['facebook_text'] ); ?>" /> 
									</td>
								</tr>

								<tr>
									<th><label for="twitter_text"><?php _e( 'Twitter Share button text','catch-social-share' );?></label></th>
									<td>
										<input type="text" class="widefat" name="catch_social_share_options[twitter_text]" id="twitter_text" value="<?php echo esc_attr( $settings['twitter_text'] ); ?>" />
									</td>
								</tr>

								<tr>
									<th><label for="linkedin_text"><?php _e( 'Linkedin share button text','catch-social-sharing' );?></label></th>
									<td>
										<input type="text" name="catch_social_share_options[linkedin_text]" id="linkedin_text" class="widefat" value="<?php echo esc_attr( $settings['linkedin_text'] ); ?>" /> 
									</td>
								</tr>

								<tr>
									<th><label for="pinterest_text"><?php _e( 'Pinterest share button text','catch-social-sharing' );?></label></th>
									<td>
										<input type="text" name="catch_social_share_options[pinterest_text]" id="pinterest_text" class="widefat" value="<?php echo esc_attr( $settings['pinterest_text'] ); ?>" />
									</td>
								</tr>

								<tr>
									<th><label for="xing_text"><?php _e( 'Xing share button text','catch-social-sharing' );?></label></th>
									<td>
										<input type="text" name="catch_social_share_options[xing_text]" id="xing_text" class="widefat" value="<?php echo esc_attr( $settings['xing_text'] ); ?>" />
									</td>
								</tr>

								<tr>
									<th><label for="reddit_text"><?php _e( 'Reddit share button text','catch-social-sharing' );?></label></th>
									<td>
										<input type="text" name="catch_social_share_options[reddit_text]" id="reddit_text" class="widefat" value="<?php echo esc_attr( $settings['reddit_text'] ); ?>" />
									</td>
								</tr>

								
								<tr>
									<th><label for="whatsapp_text"><?php _e( 'Whatsapp share button text','catch-social-sharing' );?></label></th>
									<td>
										<input type="text" name="catch_social_share_options[whatsapp_text]" id="whatsapp_text" class="widefat" value="<?php echo esc_attr( $settings['whatsapp_text'] ); ?>" />
									</td>
								</tr>
				
				
				
								<tr>
									<th>
										<label><?php echo esc_html__( 'Add Sharing Links', 'catch-social-share' ); ?></label>
									</th>
									<td>
										<ul>
											<?php foreach( $post_types as $post_type_id => $post_type ) { ?>
												<li>
													<label>
														<input type="checkbox" name="catch_social_share_options[add_post_types][]" value="<?php echo esc_attr( $post_type_id ); ?>" <?php checked( in_array( $post_type_id, $settings['add_post_types'] ), true ); ?>> <?php printf( __(' Auto display to %s', 'catch-social-share' ), $post_type->labels->name ); 
														?>
													</label>
												</li>
											<?php } ?>
										</ul>
										<small><?php _e( 'Automatically adds the sharing links to the end of the selected post types.', 'catch-social-share' ); ?></small>
									</td>
								</tr>

								<tr>
                                    <th scope="row"><?php esc_html_e( 'Reset Options', 'catch-social-share' ); ?></th>
                                    <td>
                                        <?php
                                            echo '<input name="catch_social_share_options[reset]" id="catch_social_share_options[reset]" type="checkbox" value="1" class="catch_social_share_options[reset]" />' . esc_html__( 'Check to reset', 'catch-social-share' );
                                        ?>
                                        <span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Caution: Reset all settings to default.', 'catch-social-share' ); ?>"></span>
                                    </td>
                                </tr>
							</tbody>
						</table>
						<?php submit_button( esc_html__( 'Save Changes', 'catch-social-share' ) ); ?>
					</div><!-- .option-container -->
				</form>
			</div><!-- #social_main -->
		</div><!-- .content -->
	</div><!-- .content-wrapper -->
</div><!---catch-social-sharing-->
