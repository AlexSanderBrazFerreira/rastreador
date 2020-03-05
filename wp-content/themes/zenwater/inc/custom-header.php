<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 */

if ( ! function_exists( 'zenwater_custom_header_setup' ) ) :
  /**
   * Set up the WordPress core custom header feature.
   */
  function zenwater_custom_header_setup() {

  	add_theme_support( 'custom-header', array (
                         'default-image'          => '',
                         'flex-height'            => true,
                         'flex-width'             => true,
                         'uploads'                => true,
                         'width'                  => 900,
                         'height'                 => 100,
                         'default-text-color'     => '#434343',
                         'wp-head-callback'       => 'zenwater_header_style',
                      ) );
  }
endif; // zenwater_custom_header_setup
add_action( 'after_setup_theme', 'zenwater_custom_header_setup' );

if ( ! function_exists( 'zenwater_header_style' ) ) :
  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see zenwater_custom_header_setup().
   */
  function zenwater_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( ! has_header_image()
          && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) ) {

          return;
      }

      $headerImage = get_header_image();
  ?>
      <style id="zenwater-custom-header-styles" type="text/css">

          <?php if ( has_header_image() ) : ?>

                  #hdr-main {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

          <?php endif; ?>

          <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                      && 'blank' !== $header_text_color ) : ?>

                  #hdr-main {color: #<?php echo esc_attr( $header_text_color ); ?>;}

          <?php endif; ?>
      </style>
  <?php
  }
endif; // End of zenwater_header_style.

