<?php
/**
 * The default template for displaying content
 *
 * Used for single, index, archive, and search contents.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_single() ) : ?>

			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>

	<?php else : ?>
	
			<h1 class="post-entry-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h1>
	
	<?php endif; ?>

	<div class="before-content">
	</div><!-- .before-content -->

	<?php if ( is_single() ) : ?>

				<div class="post-content">
					<?php
						if ( has_post_thumbnail() ) :

							the_post_thumbnail();

						endif;
						
						the_content( __( 'Read More...', 'zenwater') );

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'zenwater' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						  ) );
					?>
				</div><!-- .content -->

	<?php else : ?>

				<div class="post-content">
					<?php if ( has_post_thumbnail() ) : ?>
								
								<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
								
					<?php endif;

						  the_content( __( 'Read More', 'zenwater') );
					?>
				</div><!-- .content -->

	<?php endif; ?>

	<div class="after-content">

		<span class="author-icon">
			<?php the_author_posts_link(); ?>
		</span><!-- .author-icon -->

		<?php if ( !is_single() && get_the_title() === '' ) : ?>

				<span class="clock-icon">
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
						<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(get_option('date_format')); ?></time>
					</a>
				</span><!-- .clock-icon -->
	
		<?php else : ?>

				<span class="clock-icon">
					<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time(get_option('date_format')); ?></time>
				</span><!-- .clock-icon -->
			
		<?php endif; ?>

		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

					<span class="comments-icon">
						<?php comments_popup_link(__( 'No Comments', 'zenwater' ), __( '1 Comment', 'zenwater' ), __( '% Comments', 'zenwater' ), '', __( 'Comments are closed.', 'zenwater' )); ?>
					</span><!-- .comments-icon -->
		
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'zenwater' ), '<span class="edit-icon">', '</span>' ); ?>

		<?php if ( ! post_password_required() ) : ?>

					<?php if ( has_category() ) : ?>
							<p class="categories-wrapper">
								<span class="category-icon">
									<?php esc_html_e('Categories:', 'zenwater'); ?>
								</span><!-- .category-icon -->
								<?php the_category( ' ' ) ?>
							</p><!-- .categories-wrapper -->
					<?php endif; ?>
				
					<?php if ( has_tag() ) : ?>
							<p class="tags-wrapper">				
								<span class="tags-icon">
									<?php esc_html_e('Tags:', 'zenwater'); ?>
								</span><!-- .tags-icon -->
								<?php echo get_the_tag_list( '', ' ','' ); ?>
							</p><!-- .tags-wrapper -->
					<?php endif; ?>

		<?php endif; // ! post_password_required() ?>

	</div><!-- .after-content -->
	
	<?php if ( !is_single() ) : ?>
			<div class="separator">
			</div>
	<?php endif; ?>
</article><!-- #post-## -->
