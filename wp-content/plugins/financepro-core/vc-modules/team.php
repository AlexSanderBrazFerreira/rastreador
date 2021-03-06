<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Team' ) ) {

	class RDTheme_VC_Team extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "FinancePro: Team Slider", 'financepro-core' );
			$this->base = 'finance-vc-team';
			$this->translate = array(
				'title'    => __( "Expert Advisor", 'financepro-core' ),
				'cols'   => array( 
					__( '1 col', 'financepro-core' ) => '12',
					__( '2 col', 'financepro-core' ) => '6',
					__( '3 col', 'financepro-core' ) => '4',
					__( '4 col', 'financepro-core' ) => '3',
					__( '6 col', 'financepro-core' ) => '2',
				),
			);
			parent::__construct();
		}
		
		public function load_scripts(){
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-theme-default' );
			wp_enqueue_script( 'owl-carousel' );
		}

		public function fields(){
			$terms = get_terms( array('taxonomy' => 'fin_team_category') );
			$category_dropdown = array( 'All Categories' => '0' );
			foreach ( $terms as $category ) {
				$category_dropdown[$category->name] = $category->term_id;
			}

			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Layout", 'financepro-core' ),
					"param_name" => "layout",
					'value' => array( 
						__( 'Layout 1', 'financepro-core' ) => 'layout1',
						__( 'Layout 2', 'financepro-core' ) => 'layout2',
						__( 'Layout 3', 'financepro-core' ) => 'layout3',
						__( 'Layout 4', 'financepro-core' ) => 'layout4',
						),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Box Background Color", "financepro-core" ),
					"param_name" => "box_bgcolor",
					"value" => '#f5f5f5',
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout3' ),
						),
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Box Background Hover Color", "financepro-core" ),
					"param_name" => "box_bghovercolor",
					"value" => '',
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout3' ),
						),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Section Title Display", 'financepro-core' ),
					"param_name" => "showtitle",
					"value" => array( 
						__( "Enabled", "financepro-core" )  => 'true',
						__( "Disabled", "financepro-core" ) => 'false',
						),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Section Title", 'financepro-core' ),
					"param_name" => "title",
					"value" => $this->translate['title'],
					'dependency' => array(
						'element' => 'showtitle',
						'value'   => array( 'true' ),
						),
					),				
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Section Title Color", "financepro-core" ),
					"param_name" => "section_title_color",
					"value" => '#222222',
					'dependency' => array(
						'element' => 'showtitle',
						'value'   => array( 'true' ),
						),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Designation display", 'financepro-core' ),
					"param_name" => "designation_display",
					"value" => array( 
						'Enabled'  => 'true',
						'Disabled' => 'false',
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Categories", 'financepro-core' ),
					"param_name" => "cat",
					'value' => $category_dropdown,
					),
				array(
					"type" 		  => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __( "Word count", 'financepro-core' ),
					"param_name"  => "content_limit",
					"value" 	  => '18',
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout2' ),
						),
					'description' => __( 'Maximum number of words', 'financepro-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Total number of items", 'financepro-core' ),
					"param_name" => "slider_item_number",
					"value" => 5,
					'description' => __( 'Write -1 to show all', 'financepro-core' ),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'financepro-core' ),
					"param_name" => "col_lg",
					"value" => $this->translate['cols'],
					"std" => "3",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' , 'layout4' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'financepro-core' ),
					"param_name" => "col_md",
					"value" => $this->translate['cols'],
					"std" => "4",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' , 'layout4' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'financepro-core' ),
					"param_name" => "col_sm",
					"value" => $this->translate['cols'],
					"std" => "4",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' , 'layout4' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'financepro-core' ),
					"param_name" => "col_xs",
					"value" => $this->translate['cols'],
					"std" => "6",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' , 'layout4' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Small Phones < 480px )", 'financepro-core' ),
					"param_name" => "col_mobile",
					"value" => $this->translate['cols'],
					"std" => "12",
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout3' , 'layout4' ),
						),
					),
				// Slider options
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Dots", 'financepro-core' ),
					"param_name" => "slider_dots",
					"value" => array( 
						__( 'Disabled', 'financepro-core' ) => 'false',
						__( 'Enabled', 'financepro-core' )  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'financepro-core' ),
					"group" => __( "Slider Options", 'financepro-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'financepro-core' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( 'Enabled', 'financepro-core' )  => 'true',
						__( 'Disabled', 'financepro-core' ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'financepro-core' ),
					"group" => __( "Slider Options", 'financepro-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout2' , 'layout3' , 'layout4' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'financepro-core' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( 'Enabled', 'financepro-core' )  => 'true',
						__( 'Disabled', 'financepro-core' ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'financepro-core' ),
					"group" => __( "Slider Options", 'financepro-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout2' , 'layout3' , 'layout4' ),
						),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay Interval", 'financepro-core' ),
					"param_name" => "slider_interval",
					"value" => array( 
						__( '5 Seconds', 'financepro-core' ) => '5000',
						__( '4 Seconds', 'financepro-core' ) => '4000',
						__( '3 Seconds', 'financepro-core' ) => '3000',
						__( '2 Seconds', 'financepro-core' ) => '4000',
						__( '1 Second', 'financepro-core' )  => '1000',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'financepro-core' ),
					"group" => __( "Slider Options", 'financepro-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout2' , 'layout3' , 'layout4' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay Slide Speed", 'financepro-core' ),
					"param_name" => "slider_autoplay_speed",
					"value" => 200,
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'financepro-core' ),
					"group" => __( "Slider Options", 'financepro-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout2' , 'layout3' , 'layout4' ),
						),
					),	
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Loop", 'financepro-core' ),
					"param_name" => "slider_loop",
					"value" => array( 
						__( 'Enabled', 'financepro-core' )  => 'true',
						__( 'Disabled', 'financepro-core' ) => 'false',
						),
					"description" => __( "Loop to first item. Default: Enable", 'financepro-core' ),
					"group" => __( "Slider Options", 'financepro-core' ),
					'dependency'  => array(
						'element' => 'layout',
						'value'   => array( 'layout1' , 'layout2' , 'layout3' , 'layout4' ),
						),
					)
			);

			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'layout'                => 'layout1',
				'title'     			=> $this->translate['title'],
				'showtitle'             => 'true',
				'section_title_color'   => '#222222',
				'box_bgcolor'   		=> '#f5f5f5',
				'box_bghovercolor'   	=> '',
				'content_limit'         => '18',
				'slider_item_number'    => '5',
				'cat'                   => '',
				'designation_display'   => 'true',
				'col_lg'                => '3',
				'col_md'                => '4',
				'col_sm'                => '4',
				'col_xs'                => '6',
				'col_mobile'            => '12',
				// slider
				'slider_nav'            => 'false',
				'slider_dots'           => 'false',
				'slider_autoplay'       => 'true',
				'slider_stop_on_hover'  => 'true',
				'slider_interval'       => '5000',
				'slider_autoplay_speed' => '200',
				'slider_loop'           => 'true',
				), $atts ) );
			
			// validation
			$content_limit         = intval( $content_limit );
			$slider_item_number    = intval( $slider_item_number );
			$cat                   = empty( $cat ) ? '' : $cat;
			$designation_display   = $designation_display == 'true' ? true : false;

			$owl_data = array( 
				'nav'                => ( $slider_nav === 'true' ) ? true : false,
				'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
				'dots'               => ( $slider_dots === 'true' ) ? true : false,
				'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
				'autoplayTimeout'    => $slider_interval,
				'autoplaySpeed'      => $slider_autoplay_speed,
				'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
				'loop'               => ( $slider_loop === 'true' ) ? true : false,
				'margin'             => 20,
				'responsive'         => array(
					'0'    => array( 'items' => 12 / $col_mobile ),
					'480'  => array( 'items' => 12 / $col_xs ),
					'768'  => array( 'items' => 12 / $col_sm ),
					'992'  => array( 'items' => 12 / $col_md ),
					'1200' => array( 'items' => 12 / $col_lg ),
					)
				);
						
			switch ( $layout ) {
				case 'layout4':
					$owl_data['dots'] = true;
					$template = 'team-4';
				break;
				case 'layout3':
					$owl_data['dots'] = true;
					$template = 'team-3';
				break;
				case 'layout2':
					$owl_data['nav'] = true;
					$owl_data['dots'] = true;
					$owl_data['responsive'] = array( '0' => array( 'items' => 1 ) );
					$template = 'team-2';
				break;	
				default:
					$template = 'team-1';
				break;
			}
				$owl_data = json_encode( $owl_data );
				$this->load_scripts();
			
			
			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Team;