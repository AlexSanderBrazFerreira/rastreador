<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1 class="post-entry-title">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	</h1>

	<?php if ( 'post' === get_post_type() ) : ?>

			<div class="post-before-content">

				<?php
					$postDate = strtotime( get_the_time( get_option( 'date_format' ) ) );
				?>

				<?php if ( !is_single() && get_the_title() === '' ) : ?>

					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
						<div class="postdate">
							<div class="day">
								<?php echo esc_textarea( date( 'd', $postDate ) ); ?>
							</div>
							<div class="month">
								<?php echo esc_textarea( date( 'M', $postDate) ); ?>
							</div>
							<div class="year">
								<?php echo esc_textarea( date( 'Y', $postDate) ); ?>
							</div>
						</div>
					</a>
			
				<?php else : ?>

						<div class="postdate">
							<div class="day">
								<?php echo esc_textarea( date( 'd', $postDate ) ); ?>
							</div>
							<div class="month">
								<?php echo esc_textarea( date( 'M', $postDate) ); ?>
							</div>
							<div class="year">
								<?php echo esc_textarea( date( 'Y', $postDate) ); ?>
							</div>
						</div>
					
				<?php endif; ?>
		
			</div><!-- .post-before-content -->

	<?php endif; ?>

	<div class="post-content">
		<?php the_excerpt(); ?>
	</div><!-- .content -->

	<div class="post-after-content">

		<?php if ( 'post' === get_post_type() ) : ?>

				<span class="author-icon">
					<?php the_author_posts_link(); ?>
				</span><!-- .author-icon -->

		<?php endif; ?>

		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

					<span class="comments-icon">
						<?php comments_popup_link(__( 'No Comments', 'zenwater' ), __( '1 Comment', 'zenwater' ), __( '% Comments', 'zenwater' ), '', __( 'Comments are closed.', 'zenwater' )); ?>
					</span><!-- .comments-icon -->
		
		<?php endif; ?>

		<?php if ( ! post_password_required() ) : ?>

					<?php if ( has_category() ) : ?>
							<span class="category-icon"><?php the_category( '</span><span class="category-icon">' ) ?></span>
					<?php endif; ?>
					
					<?php if ( has_tag() ) : ?>
								
								<?php the_tags( '<span class="tags-icon">', '</span><span class="tags-icon">', '</span>' ); ?>
								
					<?php endif; ?>

		<?php endif; // ! post_password_required() ?>

		<?php edit_post_link( __( 'Edit', 'zenwater' ), '<span class="edit-icon">', '</span>' ); ?>

	</div><!-- .after-content -->
	
	<div class="separator">
	</div>

</article><!-- #post-## -->
