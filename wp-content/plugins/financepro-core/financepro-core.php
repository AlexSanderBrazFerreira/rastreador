<?php
/*
Plugin Name: FinancePro Core
Plugin URI: http://radiustheme.com
Description: FinancePro Core Plugin for Finance Theme
Version: 1.1
Author: RadiusTheme
Author URI: http://radiustheme.com
*/

define( 'FINANCEPRO_CORE', ( WP_DEBUG ) ? time() : '1.1' );
define( 'FINANCEPRO_CORE_BASE_URL', plugin_dir_url( __FILE__ ) );

// Text Domain
add_action( 'init', 'financepro_core_load_textdomain' );
if ( !function_exists( 'financepro_core_load_textdomain' ) ) {
	function financepro_core_load_textdomain() {
		load_plugin_textdomain( 'financepro-core' , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}
}

// Post types
add_action( 'after_setup_theme', 'financepro_core_post_types', 15 );
if ( !function_exists( 'financepro_core_post_types' ) ) {
	function financepro_core_post_types(){
		if ( !defined( 'FINANCEPRO_VERSION' ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'post-types.php';
		require_once 'post-meta.php';
	}
}

// Visual composer
add_action( 'after_setup_theme', 'financepro_core_vc_modules', 20 );
if ( !function_exists( 'financepro_core_vc_modules' ) ) {
	function financepro_core_vc_modules(){
		if ( !defined( 'FINANCEPRO_VERSION' ) || ! defined( 'WPB_VC_VERSION' ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}

		require_once 'vc-flaticon/vc-flaticon.php';
		
		$modules = array( 'inc/abstruct', 'title', 'info-text', 'post', 'case-studies', 'service', 'service-grid', 'service-single', 'team', 'team-grid', 'testimonial', 'portfolio-grid', 'fin-cta', 'tab', 'counter', 'pricing-box', 'text-with-image', 'text-with-button', 'text-with-video', 'about', 'contact-info' );
		foreach ( $modules as $module ) {
			require_once 'vc-modules/' . $module. '.php';
		}
	}
}

// Demo Importer settings
require_once 'demo-importer.php';