<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size6';
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
	'post_type'      => 'fin_service',
	'posts_per_page' => $grid_item_number,
	'paged'          => $paged,
);

if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'fin_service_category',
			'field'    => 'term_id',
			'terms'    => $cat,
		)
	);
}
$query = new WP_Query( $args );
$col_class = "col-lg-$col_lg col-md-$col_md col-sm-$col_sm col-xs-$col_xs";

// Pagination fix
global $wp_query;
$wp_query   = NULL;
$wp_query   = $query;
?>
<div class="rt-service-layout-1">
	<div class="row auto-clear">
	<?php if ( $query->have_posts() ) { ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( $content, 10 );
		?>
		<div class="<?php echo esc_attr( $col_class );?>">
			<div class="rtin-single-item">
				<div class="rtin-item-image">
					<a href="<?php the_permalink();?>"><?php the_post_thumbnail( $thumb_size , ['class' => 'img-responsive'] );?></a>
				</div>
				<div class="rtin-item-content">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<p><?php echo esc_html($content); ?></p>
				</div>
			</div>
		</div>
		<?php endwhile;?>
		<div class="mt20 col-sm-12 col-xs-12 pagination-wrapper"><?php RDTheme_Helper::pagination();?></div>
	<?php wp_reset_query();?>
	<?php } else { ?>
		<div class="<?php echo esc_attr( $col_class ); ?>">
			<?php esc_html_e( 'No Service Found' , 'financepro-core' ); ?>
		</div>	
	<?php } ?>
	</div>
</div>