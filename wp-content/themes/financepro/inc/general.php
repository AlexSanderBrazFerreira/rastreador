<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

add_action('after_setup_theme', 'rdtheme_setup');
if ( !function_exists( 'rdtheme_setup' ) ) {
	function rdtheme_setup() {
		// Language
		load_theme_textdomain( 'financepro', RDTHEME_BASE_DIR . 'languages' );

		// Theme supports
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'woocommerce' );
		add_editor_style();

		// Image sizes
		add_image_size( 'rdtheme-size1', 1200, 600, true ); // Post large
		add_image_size( 'rdtheme-size2', 370, 270, true ); // Service slider 1
		add_image_size( 'rdtheme-size3', 490, 340, true ); // Service slider 2
		add_image_size( 'rdtheme-size4', 400, 400, true ); // Team 1
		add_image_size( 'rdtheme-size5', 418, 433, true ); // Team 2
		add_image_size( 'rdtheme-size6', 400, 265, true ); // Service Grid
		add_image_size( 'rdtheme-size7', 570, 355, true ); // Case Studies Grid
		add_image_size( 'rdtheme-size8', 92, 92, true ); // Testimonial (Small)
		add_image_size( 'rdtheme-size9', 600, 800, true ); // Single Team (Big)

		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'financepro' ),
			'topright' => esc_html__( 'Header Right', 'financepro' ),
			) );
	}	
}

// Register Sidebars
add_action( 'widgets_init', 'rdtheme_widgets_register' );
if ( !function_exists( 'rdtheme_widgets_register' ) ) {
	function rdtheme_widgets_register() {
		
		$footer_widget_titles = array(
			'1' => __( 'Footer 1', 'financepro' ),
			'2' => __( 'Footer 2', 'financepro' ),
			'3' => __( 'Footer 3', 'financepro' ),
			'4' => __( 'Footer 4', 'financepro' ),
		);

		// Register Widget Areas ( Common )
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'financepro' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
			) );

		// Register Widget Areas ( for Single Case Study Post )
		register_sidebar( array(
			'name'          => __( 'Case Study Sidebar', 'financepro' ),
			'id'            => 'sidebar-case-study',
			'before_widget' => '<div id="%1$s" class="widget %2$s custom-widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
			) );

		// Register Widget Areas ( for Single Service Post )
		register_sidebar( array(
			'name'          => __( 'Service Sidebar', 'financepro' ),
			'id'            => 'sidebar-service',
			'before_widget' => '<div id="%1$s" class="widget %2$s custom-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
			) );

		for ( $i = 1; $i <= RDTheme::$options['footer_column']; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles[$i],
				'id'            => 'footer-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle">',
				'after_title'   => '</h3>',
				) );		
		}
	}
}

// Register Custom Widgets
add_action( 'widgets_init', 'rdtheme_register_widgets' );
function rdtheme_register_widgets() {
	if( class_exists( 'RT_Widget_Fields' ) ){
		register_widget( 'RDTheme_Address_Widget' );
		register_widget( 'RDTheme_Social_Widget' );
		register_widget( 'RDTheme_Slide_Widget' );
	}
}

// Head Script
add_action( 'wp_head', 'rdtheme_head', 1 );
if( !function_exists( 'rdtheme_head' ) ) {
	function rdtheme_head(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}	
}

// Footer Html
add_action( 'wp_footer', 'rdtheme_footer_html', 1 );
if( !function_exists( 'rdtheme_footer_html' ) ) {
	function rdtheme_footer_html(){
		// Back-to-top link
		if ( RDTheme::$options['back_to_top'] ){
			echo '<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>';
		}
		// Preloader
		if ( RDTheme::$options['preloader'] ){
			if ( !empty( RDTheme::$options['preloader_image']['url'] ) ) {
				$preloader_img = RDTheme::$options['preloader_image']['url'];
			}
			else {
				$preloader_img = RDTHEME_IMG_URL . 'preloder.gif';
			}
			echo '<div id="preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>';
		}
	}	
}