<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Scarlett
 */
$logo = get_field('field_name', 'option');
$newsletter = get_field( 'select_form', 'option' );
?>
	</div>
	<div class="placeholder"></div>
	<footer id="colophon" class="site-footer">
		<div class="scarlett-containter <?php echo $custom_class; ?>">
			<div class="scarlett-containter-inner">
				<div class="row">
					<div class="col-md-12 col-lg-3 footerlogoWrap">
					<?php $logo = get_field( 'logo', 'option' ); ?>
						<?php if ( $logo ) : ?>
							<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
						<?php endif; ?>
						<div class="contactDetail">
							<?php the_field( 'contact_detail', 'option' ); ?>
						</div>
					</div>
					<div class="col-md-12 col-lg-9">
						<?php if ( have_rows( 'add_menu', 'option' ) ) : ?>
							<div class="footer-menu-wrap">
							<?php while ( have_rows( 'add_menu', 'option' ) ) : the_row(); 
									$add_page_link = get_sub_field( 'add_page_link');
							?>
								<div class="footer-menu">
										<h3>
											<?php if($add_page_link) : ?>
												<a href="<?php echo $add_page_link;?>">
													<?php the_sub_field( 'title' ); ?>
												</a>
											<?php else: ?>
												<?php the_sub_field( 'title' ); ?>
											<?php endif; ?>
											<i class='bx bx-chevron-down'></i></h3>
									
										<?php the_sub_field( 'select_menu' ); ?>
								</div>
							<?php endwhile; ?>
							</div>
						<?php endif; ?>				
					</div>
				</div>

				<div class="row">
					<?php if($newsletter): ?>
					<div class="col-md-6 col-lg-6">
						<div class="newsletter">
							<h3><?php the_field( 'newsletter_title', 'option' ); ?></h3>
							<?php the_field( 'select_form', 'option' ); ?>
						</div>
					</div>
					<?php endif; ?>
					<div class="<?php echo ($newsletter) ? 'col-md-6 col-lg-6' : 'col-md-12 col-lg-12' ?>">
						<?php if ( have_rows( 'add_links', 'option' ) ) : ?>
							<div class="socialMenuWrap">
								<div class="<?php echo ($newsletter) ? '' : 'me-auto' ?>">
									<h3><?php the_field( 'social_media_title', 'option' ); ?></h3>
									<ul class="socialMenu">
										<?php while ( have_rows( 'add_links', 'option' ) ) : the_row(); ?>
											<li>
												<a href="<?php the_sub_field( 'menu_link' ); ?>" title="<?php the_sub_field( 'menu_label' ); ?>">
													<?php $menu_icon = get_sub_field( 'menu_icon' ); ?>
													<?php if ( $menu_icon ) : ?>
														<img src="<?php echo esc_url( $menu_icon['url'] ); ?>" alt="<?php echo esc_attr( $menu_icon['alt'] ); ?>" />
													<?php endif; ?>
												</a>
											</li>
										<?php endwhile; ?>
									</ul>
								</div>
								<?php if(get_field('footer_logo', 'option')): ?>
								<div class="footer_logo">
									
										<img src="<?php the_field('footer_logo', 'option'); ?>"/>
									
								</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<div class="modal fade downloadbrochureModal" id="downloadbrochure" tabindex="-1" aria-labelledby="downloadbrochureLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		<div class="modal-body">
        <?php echo do_shortcode( '[contact-form-7 id="158506d" title="Download Brochure Form"]' ); ?>
		</div>
    </div>
  </div>
</div>
<div class="modal fade downloadbrochureModal" id="bookademo" tabindex="-1" aria-labelledby="bookademoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		<div class="modal-body">
        <?php echo do_shortcode( '[contact-form-7 id="a78f204" title="Book A Demo"]' ); ?>
		</div>
    </div>
  </div>
</div>

<!-- Your chat script snippet -->
<script src='https://chat-assets.frontapp.com/v1/chat.bundle.js'></script>

<script>

  window.FrontChat('init', {chatId: '4442c73ed03d3a55e9a3a264cc86abac', useDefaultLauncher: true});
 // Function to open the chat widget
  function openChatWidget(event) {
    event.preventDefault(); // Prevent the default action of the link
    if (window.FrontChat) {
      window.FrontChat('show'); // Open the chat widget
    }
  }

  // Add event listener to the div with the target class
  document.addEventListener('DOMContentLoaded', function() {
    const chatDiv = document.querySelector('.widget-open');
    if (chatDiv) {
      chatDiv.addEventListener('click', function(event) {
        const link = event.target.closest('a#no2');
        if (link) {
          openChatWidget(event);
        }
      });
    }
  });

</script>
</body>
</html>
