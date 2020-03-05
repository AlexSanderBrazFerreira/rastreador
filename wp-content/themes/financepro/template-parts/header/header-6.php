<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args   = RDTheme_Helper::nav_menu_args();

// Logo
$rdtheme_dark_logo = empty( RDTheme::$options['logo']['url'] ) ? RDTHEME_IMG_URL . 'logo-dark.png' : RDTheme::$options['logo']['url'];
$rdtheme_light_logo = empty( RDTheme::$options['logo_light']['url'] ) ? RDTHEME_IMG_URL . 'logo-light.png' : RDTheme::$options['logo_light']['url'];

$rdtheme_logo_col_num = (int) RDTheme::$options['logo_width'];

$rdtheme_logo_class = "col-sm-{$rdtheme_logo_col_num} col-xs-12";
$rdtheme_header_right_class = 'col-sm-'. ( 12 - $rdtheme_logo_col_num ) . ' col-xs-12';

// Icon
$rdtheme_has_icons = false;
if (  RDTheme::$options['search_icon'] ||
	( RDTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ) ||
	( RDTheme::$options['vertical_menu_icon'] && has_nav_menu( 'topright' ) ) ) {
	$rdtheme_has_icons = true;
}
?>
<div class="container masthead-container">
	<div class="row header-firstrow">
		<div class="<?php echo esc_attr( $rdtheme_logo_class );?>">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
			</div>
		</div>
		<div class="<?php echo esc_attr( $rdtheme_header_right_class );?>">
			<?php if ( $rdtheme_has_icons ): ?>
				<?php get_template_part( 'template-parts/header/icon', 'area' );?>
			<?php endif; ?>
			<ul class="header-address">
				<?php if ( RDTheme::$options['phone'] ): ?>
					<li>
					<p style="font-size: 14px; color: #1a5c49; padding-left: 70px;"><b>Whatsapp</b></p>
                    <h2 style="color: #1a5c49; text-align: center; margin-top: -27px; line-height: 10px;"><img class="alignnone size-full wp-image-3381" src="http://rastreadoreseguros.com.br/wp-content/uploads/2019/05/iconeWhatsappSimularSeguros.png" alt="" width="51" style="margin-top:-5px;" height="50"> &nbsp;(11) 97362-2899</h2>    
					</li>
				<?php endif; ?>
				<?php if ( RDTheme::$options['address'] ): ?>
					<li>
					<p style="font-size: 14px; color: #1a5c49; padding-left: 70px;"><b>Fale Conosco</b></p>
                    <h2 style="color: #1a5c49; text-align: center; margin-top: -27px; line-height: 10px;"><img class="alignnone size-full wp-image-3381" src="http://rastreadoreseguros.com.br/wp-content/uploads/2019/05/iconeTelefoneSimularSeguros.png" alt="" width="51" style="margin-top:-5px;" height="50"> &nbsp;(11) 3972-7084</h2>
					</li>
				<?php endif; ?>
				<?php if ( RDTheme::$options['hour'] ): ?>
					<li>
					<a href="https://suhaiseguradora.com/" target="_blank">
					<img src="http://rastreadoreseguros.com.br/wp-content/uploads/2019/05/LOGO_SUHAI_CONCEITO_peq.png" />
					</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<div id="site-navigation" class="main-navigation">
		<div class="nav-area clearfix">
			<?php wp_nav_menu( $nav_menu_args );?>
			<div class="header-cta"><a href="<?php echo RDTheme::$options['header_btn_url'];?>"><?php echo RDTheme::$options['header_btn_txt'];?></a></div>
		</div>
	</div>
</div>