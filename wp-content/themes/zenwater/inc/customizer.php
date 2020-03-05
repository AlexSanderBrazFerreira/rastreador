<?php
/**
 * ZenWater: Customizer
 */
if ( ! function_exists( 'zenwater_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function zenwater_customize_register( $wp_customize ) {

		/**
	     * Add Animations Section
	     */
	    $wp_customize->add_section(
	        'zenwater_animations_display',
	        array(
	            'title'       => __( 'Animations', 'zenwater' ),
	            'capability'  => 'edit_theme_options',
	        )
	    );

	    // Add display Animations option
	    $wp_customize->add_setting(
	            'zenwater_animations_display',
	            array(
	                    'default'           => 1,
	                    'sanitize_callback' => 'zenwater_sanitize_checkbox',
	            )
	    );

	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
	                        'zenwater_animations_display',
	                            array(
	                                'label'          => __( 'Enable Animations', 'zenwater' ),
	                                'section'        => 'zenwater_animations_display',
	                                'settings'       => 'zenwater_animations_display',
	                                'type'           => 'checkbox',
	                            )
	                        )
	    );

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'zenwater_footer_section',
			array(
				'title'       => __( 'Footer', 'zenwater' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add Footer Copyright Text
		$wp_customize->add_setting(
			'zenwater_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'zenwater_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'zenwater' ),
	            'section'        => 'zenwater_footer_section',
	            'settings'       => 'zenwater_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);
	}
endif; // zenwater_customize_register
add_action( 'customize_register', 'zenwater_customize_register' );

if ( ! function_exists( 'zenwater_sanitize_checkbox' ) ) :
	/**
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function zenwater_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif; // zenwater_sanitize_checkbox