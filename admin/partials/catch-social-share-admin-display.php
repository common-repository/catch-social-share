<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.catchthemes.com
 * @since      1.0.0
 *
 * @package    Catch_Social_Share
 * @subpackage Catch_Social_Share/admin/partials
 */
?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e( 'Catch Social Share', 'catch-social-share' );?></h1>
    <div id="plugin-description">
        <p><?php esc_html_e( 'Catch Social Share - Catch Social Share is a simple yet feature-rich social sharing WordPress plugin that adds social share buttons on your site. Provide your visitors an easier gateway to share your content in various social media platforms.', 'catch-social-share' ); ?></p>
    </div>
    <div class="catchp-content-wrapper">
        <div class="catchp_widget_settings">
             
            <form id="social-page" method="post" action="options.php">
                
                    <h2 class="nav-tab-wrapper">
                    <a class="nav-tab nav-tab-active" id="dashboard-tab" href="#dashboard"><?php esc_html_e( 'Dashboard', 'catch-social-share' ); ?></a>
                    <a class="nav-tab" id="features-tab" href="#features"><?php esc_html_e( 'Features', 'catch-social-share' ); ?></a>
                     <a class="nav-tab" id="premium-extensions-tab" href="#premium-extensions"><?php esc_html_e( 'Compare Table', 'catch-social-share' ); ?></a>
                    </h2>
                <div id="dashboard" class="wpcatchtab nosave active">
                    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/dashboard.php';?>
                </div><!---dashboard---->

                <div id="features" class="wpcatchtab save">
                    <div class="content-wrapper col-3">
                        <div class="header">
                            <h3><?php esc_html_e( 'Features', 'catch-social-share' );?></h3>
                        </div><!-- .header -->
                        <div class="content">
                            <ul class="catchp-lists">
                               <li>
                                    <strong><?php esc_html_e( 'Social Share Buttons', 'catch-social-share' ); ?></strong>
                                    <p><?php esc_html_e( 'There are seven different social media platforms you can choose from - Facebook, Twitter, Pinterest, LinkedIn, Xing, Reddit, and Whatsapp. All of these social media platforms are on top when it comes to popularity and audience computation. Give your visitors an easy way to share your content in the most popular social media platforms.','catch-social-share' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Social Icon Order and Position', 'catch-social-share' ); ?></strong>
                                    <p><?php esc_html_e( 'You can reorder and display social media icons the way you prefer. Also, you can choose where you want your social sharing buttons to be displayed. Display them elegantly either before or after the content. ','catch-social-share' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Text before Sharing Buttons', 'catch-social-share' ); ?></strong>
                                    <p><?php esc_html_e( 'If you want to make your social sharing more informative, you can add texts as well. You can include the additional text either on right, left, top, or bottom of the social share buttons. ','catch-social-share' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Editable Social Sharing Button Texts', 'catch-social-share' ); ?></strong>
                                    <p><?php esc_html_e( 'If you’ve chosen not to display the social icons, then Catch Social Share empowers you with the editable share button text. You can individually customize the names for each of your social media streams. ','catch-social-share' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Sharing Links ', 'catch-social-share' ); ?></strong>
                                    <p><?php esc_html_e( 'There are various sections on your website where you might want to display the social share buttons. Therefore, sharing links will let you choose the website sections where you can display the social sharing buttons. Enable the buttons on posts, pages, media, products, projects, testimonials, featured contents, services, and more. ','catch-social-share' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Shortcode', 'catch-social-share' ); ?></strong>
                                    <p><?php esc_html_e( 'Catch Social Share, the new social sharing WordPress plugin supports shortcode as well. With the plugin activated, you will be provided with the shortcode option. Simply copy and paste the shortcode [catch-social-share] directly into any post or page and enjoy displaying the social share buttons.','catch-social-share' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Lightweight', 'catch-social-share' ); ?></strong>
                                    <p><?php esc_html_e( 'Catch Social Share is an expedient WordPress plugin to display social sharing buttons that is extremely lightweight. It means you will not have to worry about your website getting slower because of the plugin.','catch-social-share' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Responsive Design', 'catch-social-share' ); ?></strong>
                                    <p><?php esc_html_e( 'Our new social sharing WordPress plugin comes with a responsive design, therefore, there is no need to strain about the plugin breaking your website.','catch-social-share' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Compatible with all WordPress Themes', 'catch-social-share' ); ?></strong>
                                    <p><?php esc_html_e( 'Gutenberg Compatibility is one of the major concerns nowadays for every plugin developer. Our new Catch Social Share plugin has been crafted in a way that supports all the WordPress themes. The plugin functions smoothly on any WordPress theme.','catch-social-share' ); ?></p>
                                </li>
                                <li>
                                    <strong><?php esc_html_e( 'Incredible Support', 'catch-social-share' ); ?></strong>
                                    <p><?php esc_html_e( 'Catch Social Share comes with Incredible Support. Our plugin documentation answers most questions about using the plugin. If you’re still having difficulties, you can post it in our Support Forum.','catch-social-share' ); ?></p>
                                </li>
                            </ul>
                        </div><!-- .content -->
                    </div><!-- content-wrapper -->
                </div> <!-- Featured -->

                <div id="premium-extensions" class="wpcatchtab  save">
                    <div class="about-text">
                    <h2><?php esc_html_e( 'Get Catch Social Share Pro -', 'catch-social-share' ); ?> <a href="https://catchplugins.com/plugins/catch-social-share-pro/" target="_blank"><?php esc_html_e( 'Get It Here!', 'catch-social-share' ); ?></a></h2>
                        <p><?php esc_html_e( 'You are currently using the free version of Catch Social Share.', 'catch-social-share' ); ?><br />
                        <a href="https://catchplugins.com/plugins/" target="_blank"><?php esc_html_e( 'If you have purchased from catchplugins.com, then follow this link to the installation instructions (particularly step 1).', 'catch-social-share' ); ?></a></p>
                </div>

                <div class="content-wrapper">
                    <div class="header">
                        <h3><?php esc_html_e( 'Compare Table', 'catch-social-share' ); ?></h3>
                    </div><!-- .header -->
                        <div class="content">

                            <table class="widefat fixed striped posts">
                                <thead>
                                    <tr>
                                        <th id="title" class="manage-column column-title column-primary"><?php esc_html_e( 'Features', 'catch-social-share' ); ?></th>
                                        <th id="free" class="manage-column column-free"><?php esc_html_e( 'Free', 'catch-social-share' ); ?></th>
                                        <th id="pro" class="manage-column column-pro"><?php esc_html_e( 'Pro', 'catch-social-share' ); ?></th>
                                    </tr>
                                </thead>

                                <tbody id="the-list" class="ui-sortable">
                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Social  Share Buttons', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Social Icon Order and Position ', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Text Before Sharing Buttons', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Editable Social Sharing Button Texts', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Sharing Links ', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Shortcode', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Enable on Home Page', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Lightweight', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Responsive Design', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Social Icon Customization Options', 'catch-social-share' ); ?></strong>
                                        </td>
                                       <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Social Icon Style', 'catch-social-share' ); ?></strong>
                                        </td>
                                       <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>


                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Padding Options', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Font Size', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Facebook App ID', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>


                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Social Count', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'HTTP Enable Count', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Total Count', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>

                                    <tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
                                        <td>
                                            <strong><?php esc_html_e( 'Cache Setting', 'catch-social-share' ); ?></strong>
                                        </td>
                                        <td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
                                        <td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--content---->
                    </div><!---content-wrapper--->
                </div>
            </form><!-- social-page -->
        </div><!-- .catchp_widget_settings -->
        <?php require_once plugin_dir_path(dirname(__FILE__) ) .'/partials/sidebar.php';?>
    </div><!---catch-content-wrapper---->
<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/footer.php'; ?>
</div><!-- .wrap -->




