<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Scarlett
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="scarlett-wrap">
    		<div class="scarlett-containter">
    			<div class="scarlett-containter-inner">

					<section class="error-404 not-found">
						<header class="page-header">
							<!-- <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'scarlett' ); ?></h1> -->
							<h2 class="page-title text-center"><strong>404</strong> - page not found!</h2>
						</header><!-- .page-header -->

						<div class="page-content">
							<!-- <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'scarlett' ); ?></p> -->
							<p class="text-center"><?php esc_html_e( 'Sorry but something you are looking for is not here :(', 'scarlett' ); ?></p>

								<!-- <?php
								get_search_form();

								the_widget( 'WP_Widget_Recent_Posts' );
								?> -->

								<!-- <div class="widget widget_categories">
									<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'scarlett' ); ?></h2>
									<ul>
										<?php
										wp_list_categories(
											array(
												'orderby'    => 'count',
												'order'      => 'DESC',
												'show_count' => 1,
												'title_li'   => '',
												'number'     => 10,
											)
										);
										?>
									</ul>
								</div> -->
								<!-- .widget -->

								<!-- <?php
								$scarlett_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'scarlett' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$scarlett_archive_content" );

								the_widget( 'WP_Widget_Tag_Cloud' );
								?> -->

						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
