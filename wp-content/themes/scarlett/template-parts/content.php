<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Scarlett
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="header-img">

		<div class="scarlett-containter">
			<div class="row align-items-center">
				<div class="col-lg-6 content-img">
					<header class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h3 class="entry-title scarlett-containter--title">', '</h3>' );
						else :
							the_title( '<h3 class="entry-title scarlett-containter--title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
						endif;

						if ( 'post' === get_post_type() ) :
							?>
							<!-- <div class="entry-meta">
								<?php
								scarlett_posted_on();
								scarlett_posted_by();
								?>
							</div> -->
							<div class="author-date">
								<?php
								$user = wp_get_current_user();

								
								?>
								<?php if ( $user ) : ?>
									<span class="author-name">
										<?php echo get_the_author();?>
									</span>
								<?php endif; ?>
								<span class="post-datetime"><span class="dot">•</span><?php the_time('Y'); ?></span>
							</div>
							<?php if ( is_single() ) { ?>
								<div class="addtoany">
									<div class="addtoany_header">Share this post:</div>
									<?php echo do_shortcode('[addtoany]'); ?>
								</div>
							<?php } ?>
							<!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->
				</div>
				<div class="col-lg-6 content">
					<?php scarlett_post_thumbnail(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="scarlett-containter">

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'scarlett' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'scarlett' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div>

	<!-- <footer class="entry-footer">
		<?php scarlett_entry_footer(); ?>
	</footer> -->
	<!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
