<?php
/*
Plugin Name: Healthy Site SEO 
Plugin URI: http://wordpress.org/extend/plugins/healthy-site-seo
Description: Makes sure that you install and activate certain plugins to make your site secure, optimised and improve your overall SEO score.

Installation:

1) Install WordPress 5.5 or higher

2) Download the latest from:

http://wordpress.org/extend/plugins/healthy-site-seo

3) Login to WordPress admin, click on Plugins / Add New / Upload, then upload the zip file you just downloaded.

4) Activate the plugin.

Version: 1.5.2
Author: TheOnlineHero - Tom Skroza
License: GPL2
*/

require_once 'includes/plugin-activation.php';
require_once 'admin/controllers/healthysiteseo_controller.php';
require_once 'admin/pages/healthysiteseo_page.php';

add_action( 'admin_notices', 'healthy_site_seo_notice_notice' );
function healthy_site_seo_notice_notice(){

	if (is_plugin_active("wptouch/wptouch.php") && is_plugin_active("w3-total-cache/w3-total-cache.php")) {
		$config = new W3_Config();
		if ($config->get_boolean('browsercache.enabled')) {
			?>
			<div class='updated below-h2'>
				<p><strong>Healthy Site/SEO:</strong> It's not a good idea to use Browser Cache when you have W3 Super Cache and WPTouch installed. If you do, the mobile version of the site will appear when using a Desktop/Laptop because of the way it caches pages. Make sure that you <a href="<?php echo(get_option("siteurl")); ?>/wp-admin/admin.php?page=w3tc_general&w3tc_note=config_save#browser_cache" target="_blank">turn off Browser Cache</a> and then <form id="w3tc_dashboard" action="<?php echo(get_option("siteurl")); ?>/wp-admin/admin.php?page=w3tc_dashboard" method="post"><?php wp_nonce_field('w3tc','w3tc');?><input id="flush_all" class="button" type="submit" name="w3tc_flush_all" value="empty your W3 Super Cache" /></form>. You could also not use WPTouch and use mobile css selectors in your style.css file instead.
				</p>
			</div>
			<?php
		}
		?>
		<?php		
	}

}

add_action('admin_menu', 'register_healthy_site_seo_page');
function register_healthy_site_seo_page() {
  add_menu_page('Healthy Site', 'Healthy Site', 'manage_options', 'healthy-site-seo/healthy-site-seo.php', 'initial_healthy_site_seo_page');
}

add_action("admin_init", "register_admin_healthy_site_seo_controller");

function register_admin_healthy_site_seo_controller() {
	if (isset($_POST["plugin"]) && isset($_POST["controller"]) && $_POST["plugin"] == "healthy-site-seo") {
		if ($_POST["controller"] == "HealthySiteSEO") {
			if ($_POST["action"] == "Set Defaults") {
				HealthySiteSEOController::update();
			}
		}
	}
}

function initial_healthy_site_seo_page() {
	HealthySiteSEOPage::indexPage();
}

if ( !function_exists('hsc_register_required_plugins') ) {

	function hsc_register_required_plugins() {

		$plugins = array(
			array(
				'name'     => 'Jet Pack',
				'slug'     => 'jetpack',
				'required' => true
			),
			array(
				'name'		 => 'WP Smush.it',
				'slug'		 => 'wp-smushit',
				'required' => true
			),
			array(
				'name'     => 'W3 Total Cache',
				'slug'     => 'w3-total-cache',
				'required' => true
			),
			array(
				'name'     => 'Hummingbird',
				'slug'     => 'hummingbird-performance',
				'required' => true
			),
			array(
				'name'		 => 'WP-Optimize',
				'slug'		 => 'wp-optimize',
				'required' => true
			),
			array(
				'name'     => 'WordPress SEO by Yoast',
				'slug'     => 'wordpress-seo',
				'required' => true
			),
			array(
				'name'     => 'Advanced Custom Fields',
				'slug'     => 'advanced-custom-fields',
				'required' => false
			),
			array(
				'name'     => 'Disable Comments',
				'slug'     => 'disable-comments',
				'required' => false
			),
			array(
				'name'     => 'User Switching',
				'slug'     => 'user-switching',
				'required' => false
			),
			array(
				'name'     => 'Custom Sidebars',
				'slug'     => 'custom-sidebars',
				'required' => true
			),
			array(
				'name'     => 'iThemes Security',
				'slug'     => 'better-wp-security',
				'required' => true
			),
			array(
				'name'     => 'Wordfence Security',
				'slug'     => 'wordfence',
				'required' => true
			),
			array(
				'name'     => 'AntiVirus',
				'slug'     => 'antivirus',
				'required' => false
			),
			array(
				'name'     => 'Stop Write',
				'slug'     => 'stop-write',
				'required' => true
			),
			array(
				'name'     => 'Login No Captcha reCAPTCHA',
				'slug'     => 'login-recaptcha',
				'required' => true
			),
			array(
				'name'     => 'Admin Block Country',
				'slug'     => 'admin-block-country',
				'required' => true
			),
			array(
				'name'     => 'SEO Redirect 301s',
				'slug'     => 'wp-seo-redirect-301',
				'required' => true
			),
			array(
				'name'     => 'Forminator',
				'slug'     => 'forminator',
				'required' => false
			),
			array(
				'name'     => 'Search My Theme',
				'slug'     => 'search-my-theme',
				'required' => false
			),
			array(
				'name'     => 'Which Template',
				'slug'     => 'which-template',
				'required' => false
			),
			array(
				'name'		 => 'Revision Control',
				'slug'		 => 'revision-control',
				'required' => true
			),
			array(
				'name'		 => 'PixPie',
				'slug'		 => 'wp-pixpie',
				'required' => true
			),
			array(
				'name'		 => 'WooCommerce',
				'slug'		 => 'woocommerce',
				'required' => false
			),
			array(
				'name'     => 'jQuery Colorbox',
				'slug'     => 'jquery-colorbox',
				'required' => false
			),
			array(
				'name'     => 'JQuery UI Theme',
				'slug'     => 'jquery-ui-theme',
				'required' => false
			) 
			
		);

		$config = array(
			'domain'       		=> 'hsc_framework',         		// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       	=> __( 'Install Required Plugins', 'hsc_framework' ),
				'menu_title'                       	=> __( 'Install Plugins', 'hsc_framework' ),
				'installing'                       	=> __( 'Installing Plugin: %s', 'hsc_framework' ), // %1$s = plugin name
				'oops'                             	=> __( 'Something went wrong with the plugin API.', 'hsc_framework' ),
				'notice_can_install_required'     	=> _n_noop( 'Healthy Site/SEO requires the following plugin: %1$s.', 'Healthy Site/SEO requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'	=> _n_noop( 'Healthy Site/SEO recommends the following plugin: %1$s.', 'Healthy Site/SEO  recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  			=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    	=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'	=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 			=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 				=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with Healthy Site/SEO: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with Healthy Site/SEO: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 				=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  	=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  	=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           	=> __( 'Return to Required Plugins Installer', 'hsc_framework' ),
				'plugin_activated'                 	=> __( 'Plugin activated successfully.', 'hsc_framework' ),
				'complete' 							=> __( 'All plugins installed and activated successfully. %s', 'hsc_framework' ), // %1$s = dashboard link
				'nag_type'							=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);

		tgmpa( $plugins, $config );

	}
	add_action('tgmpa_register', 'hsc_register_required_plugins');
	
}



class HealthySiteMenu {
  
  function HealthySiteMenu()
  {
      add_action( 'admin_bar_menu', array( $this, "hsc_links" ) );
  }

  /**
   * Add's new global menu, if $href is false menu is added but registred as submenuable
   *
   * $name String
   * $id String
   * $href Bool/String
   *
   * @return void
   * @author Janez Troha
   * @author Aaron Ware
   **/

  function add_root_menu($name, $id, $href = FALSE)
  {
    global $wp_admin_bar;
    if ( !is_super_admin() || !is_admin_bar_showing() )
        return;

    $wp_admin_bar->add_menu( array(
        'id'   => $id,
        'meta' => array('target' => '_blank'),
        'title' => $name,
        'href' => $href ) );
  }

  /**
   * Add's new submenu where additinal $meta specifies class, id, target or onclick parameters
   *
   * $name String
   * $link String
   * $root_menu String
   * $id String
   * $meta Array
   *
   * @return void
   * @author Janez Troha
   **/
  function add_sub_menu($name, $link, $root_menu, $id, $meta = FALSE)
  {
      global $wp_admin_bar;
      if ( ! is_super_admin() || ! is_admin_bar_showing() )
          return;
    
      $wp_admin_bar->add_menu( array(
          'parent' => $root_menu,
          'id' => $id,
          'title' => $name,
          'href' => $link,
          'meta' => $meta
      ) );
  }

  function hsc_links() {
      $this->add_root_menu("Healthy Site Links", "hscl" );

      $this->add_sub_menu("Submit Site To Google", "https://www.google.com/webmasters/tools/home?hl=en", "hscl", "hsclgss", array('target' => '_blank'));
      $this->add_sub_menu("Submit Site To Bing", "http://www.bing.com/webmaster/WebmasterManageSitesPage.aspx", "hscl", "hsclbss", array('target' => '_blank'));

      $this->add_sub_menu("Google Tag Manager", "https://www.google.com/tagmanager/web/#management/Accounts/", "hscl", "hsclgt", array('target' => '_blank'));
      $this->add_sub_menu("Google Structured Data", "http://www.google.com/webmasters/tools/richsnippets?q=", "hscl", "hsclgsd", array('target' => '_blank'));
      $this->add_sub_menu("Page Speed Insights", "http://developers.google.com/speed/pagespeed/insights/", "hscl", "hsclgsi", array('target' => '_blank'));
      $this->add_sub_menu("Schema", "http://schema.org/docs/gs.html", "hscl", "hscls", array('target' => '_blank'));
      $this->add_sub_menu("Speed Up", "http://www.sparringmind.com/speed-up-wordpress/", "hscl", "hsclsu", array('target' => '_blank'));
      $this->add_sub_menu("Feed The Bot", "http://www.feedthebot.com/", "hscl", "hsclftb", array('target' => '_blank'));
  }

}
add_action( "init", "HealthySiteMenuInit" );
function HealthySiteMenuInit() {
    global $HealthySiteMenu;
    $HealthySiteMenu = new HealthySiteMenu();
}

?>