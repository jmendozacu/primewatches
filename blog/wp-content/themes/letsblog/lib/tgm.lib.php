<?php
require_once get_template_directory() . "/modules/class-tgm-plugin-activation.php";
add_action( 'tgmpa_register', 'letsblog_require_plugins' );
 
function letsblog_require_plugins() {
 
    $plugins = array(
	    array(
	        'name'               => 'Lets Blog Theme Gallery',
	        'slug'               => 'letsblog-custom-post',
	        'source'             => get_stylesheet_directory() . '/lib/plugins/letsblog-custom-post.zip',
	        'required'           => true, 
	        'version'            => '1.0',
	        'force_activation'   => true, 
	        'force_deactivation' => true,
	    ),
	    array(
	        'name'      => 'oAuth Twitter Feed for Developers',
	        'slug'      => 'oauth-twitter-feed-for-developers',
	        'required'  => true, 
	    ),
	    array(
	        'name'      => 'MailChimp for WordPress',
	        'slug'      => 'mailchimp-for-wp',
	        'required'  => true, 
	    ),
	    array(
	        'name'      => 'Facebook Widget',
	        'slug'      => 'facebook-pagelike-widget',
	        'required'  => true, 
	    ),
	);
	
	$config = array(
		'domain'	=> THEMEDOMAIN,
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php',
        'menu'         => 'install-required-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'          => array(
	        'page_title'                      => __( 'Install Required Plugins', THEMEDOMAIN ),
	        'menu_title'                      => __( 'Install Plugins', THEMEDOMAIN ),
	        'installing'                      => __( 'Installing Plugin: %s', THEMEDOMAIN ),
	        'oops'                            => __( 'Something went wrong with the plugin API.', THEMEDOMAIN ),
	        'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
	        'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
	        'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
	        'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
	        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
	        'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
	        'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
	        'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
	        'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
	        'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
	        'return'                          => __( 'Return to Required Plugins Installer', THEMEDOMAIN ),
	        'plugin_activated'                => __( 'Plugin activated successfully.', THEMEDOMAIN ),
	        'complete'                        => __( 'All plugins installed and activated successfully. %s', THEMEDOMAIN ),
	        'nag_type'                        => 'updated'
	    )
    );
 
    tgmpa( $plugins, $config );
 
}
?>