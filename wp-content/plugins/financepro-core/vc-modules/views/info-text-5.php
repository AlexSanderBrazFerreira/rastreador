<?php
$heading = $wrapper_css = $icon_css = $title_css = $icon_box_css = $content_css = $icon_holder_style = '';

$class = vc_shortcode_custom_css_class( $css );
$class .= " {$layout}";

if ( $icon_border === 'true' ) {
    $class .= ' icon-bordered';
}
if ( $bgcolor != '' ) {
     $class       .= ' has-bg';
     $wrapper_css .= 'background-color: '. $bgcolor . ';';
}

$heading   .= !empty( $url ) ? '<a href="' . $url . '">' : '';
$heading   .= $title;
$heading   .= !empty( $url ) ? '</a>' : '';

if ( $size != '' ) {
    $size       = (int) $size;
    $icon_css  .= "font-size: {$size}px;";
}
if ( $title_size != '' ) {
    $title_size   = (int) $title_size;
    $title_css   .= "font-size: {$title_size}px;";
}
if ( $content_size != '' ) {
    $content_size = (int) $content_size;
    $content_css .= "font-size: {$content_size}px;";
}
if ( $width != '' ) {
    $width        = (int) $width;
    $wrapper_css .= 'max-width: '. $width . 'px;';
}
?>
<div class="rt-infobox-5 <?php echo esc_attr( $class );?>" style="<?php echo esc_attr( $wrapper_css );?>" data-color="<?php echo esc_attr( $color );?>" data-hover="<?php echo esc_attr( $hovercolor );?>">
	<div class="rtin-single-info" style="background-color:<?php echo esc_attr( $icon_bgcolor ); ?>">
		<div class="rtin-info-item-icon <?php echo ( $icon_style == 'squire' ) ? '' : ' rounded' ;?>" style="margin-bottom:<?php echo esc_attr( $spacing_bottom ); ?>px">
		<?php if ( $icontype == 'image' ): ?>
			<?php echo wp_get_attachment_image( $image, array( $size, $size ), true ); ?>
		<?php else: ?>
			<i class="<?php echo esc_attr( $icon );?>" aria-hidden="true" style="<?php echo esc_attr( $icon_css ); ?>"></i>
		<?php endif; ?>
			<h3 style="<?php echo esc_attr( $title_css );?>"><?php echo wp_kses_post( $heading ); ?></h3>
		</div>
		<div class="rtin-info-content">
			<p style="<?php echo esc_attr( $content_css );?>"><?php echo wp_kses_post( $content ); ?></p>
		</div>
	</div>
	<div class="clear"></div>
</div>