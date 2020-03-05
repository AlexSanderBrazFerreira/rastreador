<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'wp_enqueue_scripts', 'rdtheme_register_scripts', 12 );
if ( !function_exists( 'rdtheme_register_scripts' ) ) {
	function rdtheme_register_scripts(){
		/*CSS*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel',       RDTHEME_CSS_URL . 'owl.carousel.min.css', array(), FINANCEPRO_VERSION );
		wp_register_style( 'owl-theme-default',  RDTHEME_CSS_URL . 'owl.theme.default.min.css', array(), FINANCEPRO_VERSION );

		/*JS*/
		// owl.carousel.min js
		wp_register_script( 'owl-carousel-js',      RDTHEME_JS_URL . 'owl.carousel.min.js', array( 'jquery' ), FINANCEPRO_VERSION, true );
		// counter js
		wp_register_script( 'rt-waypoints',      RDTHEME_JS_URL . 'waypoints.min.js', array( 'jquery' ), FINANCEPRO_VERSION, true );
		wp_register_script( 'counterup',         RDTHEME_JS_URL . 'jquery.counterup.min.js', array( 'jquery' ), FINANCEPRO_VERSION, true );
	}
}

add_action( 'wp_enqueue_scripts', 'rdtheme_enqueue_scripts', 15 );
if ( !function_exists( 'rdtheme_enqueue_scripts' ) ) {
	function rdtheme_enqueue_scripts() {
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'financepro-gfonts',     RDTheme_Helper::fonts_url(), array(), FINANCEPRO_VERSION );
		// Bootstrap CSS
		wp_enqueue_style( 'bootstrap',          RDTHEME_CSS_URL . 'bootstrap.min.css', array(), FINANCEPRO_VERSION );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       RDTHEME_CSS_URL . 'font-awesome.min.css', array(), FINANCEPRO_VERSION );
		// Meanmenu CSS
		wp_enqueue_style( 'meanmenu',           RDTHEME_CSS_URL . 'meanmenu.css', array(), FINANCEPRO_VERSION );
		// main CSS
		wp_enqueue_style( 'financepro-default',    RDTHEME_CSS_URL . 'default.css', array(), FINANCEPRO_VERSION );
		// vc modules css  
		wp_enqueue_style( 'financepro-vc',         RDTHEME_CSS_URL . 'vc.css', array(), FINANCEPRO_VERSION );
		// Style CSS       
		wp_enqueue_style( 'financepro-style',      RDTHEME_CSS_URL . 'style.css', array(), FINANCEPRO_VERSION );
		// Template Style
		wp_add_inline_style( 'financepro-style',   rdtheme_template_style() );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'bootstrap',            RDTHEME_JS_URL . 'bootstrap.min.js', array( 'jquery' ), FINANCEPRO_VERSION, true );		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// Meanmenu js
		wp_enqueue_script( 'jquery-meanmenu', RDTHEME_JS_URL . 'jquery.meanmenu.min.js', array( 'jquery' ), FINANCEPRO_VERSION, true );
		// Nav smooth scroll
		wp_enqueue_script( 'jquery-nav',      RDTHEME_JS_URL . 'jquery.nav.min.js', array( 'jquery' ), FINANCEPRO_VERSION, true );
		// Cookie js
		wp_enqueue_script( 'js-cookie',       RDTHEME_JS_URL . 'js.cookie.min.js', array( 'jquery' ), FINANCEPRO_VERSION, true );
		// main js
		do_action('unique_action_tag');
		wp_enqueue_script( 'financepro-main',    RDTHEME_JS_URL . 'main.js', array( 'jquery' ), FINANCEPRO_VERSION, true );
		
		// localize script
		$rdtheme_localize_data = array(
			'stickyMenu' 	=> RDTheme::$options['sticky_menu'],
			'meanWidth'  	=> RDTheme::$options['resmenu_width'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '"><img class="logo-small" src="'. esc_url( RDTheme::$options['logo']['url'] ).'" /></a>',
			'extraOffset' => RDTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => RDTheme::$options['sticky_menu'] ? 52 : 0,
		);
		wp_localize_script( 'financepro-main', 'FinanceObj', $rdtheme_localize_data );
	}
}

add_action( 'wp_enqueue_scripts', 'rdtheme_high_priority_scripts', 1500 );
if ( !function_exists( 'rdtheme_high_priority_scripts' ) ) {
	function rdtheme_high_priority_scripts() {
		// Dynamic style
		if ( apply_filters( 'rdtheme_force_internnal_dynamic_style', false ) ) {
			RDTheme_Helper::dynamic_internal_style();
			return;
		}

		$file = RDTHEME_CSS_DIR . 'generated-style.css';
		if ( wp_is_writable( $file ) && file_exists( $file ) && !is_customize_preview() ) {
			wp_enqueue_style( 'generated-style', RDTHEME_CSS_URL . 'generated-style.css', array(), FINANCEPRO_VERSION );
		}
		else {
			RDTheme_Helper::dynamic_internal_style();
		}
	}
}

function rdtheme_template_style(){
	ob_start();
	?>
	.entry-banner {
		<?php if ( RDTheme::$bgtype == 'bgcolor' ): ?>
			background-color: <?php echo esc_html( RDTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( RDTheme::$bgimg );?>) no-repeat scroll center center / cover;
		<?php endif; ?>
	}
	.content-area {
		padding-top: <?php echo esc_html( RDTheme::$padding_top );?>px;
		padding-bottom: <?php echo esc_html( RDTheme::$padding_bottom );?>px;
	}
	<?php
	return ob_get_clean();
}