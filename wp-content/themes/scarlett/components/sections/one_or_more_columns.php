<?php 

	$custom_class = get_sub_field( 'custom_class' ); 
	$section_bg_color = get_sub_field( 'bg_color' );
	$show_layout_options = get_sub_field( 'show_layout_options' );
	$show_elements_checked_values = get_sub_field( 'show_elements' );
?>
<div class="scarlett-wrap" style="background-color: <?php echo $section_bg_color ?>;" data-aos="fade-up" data-aos-duration="700">
	<div class="scarlett-containter <?php echo $custom_class; ?>">
		<div class="scarlett-containter-inner">
			<?php if($show_layout_options == "One Column Layout" ): ?>
				<div class="singleColumn">
					<div class="row">

						<!-- One Column Title and Sub Title -->
						<?php if( in_array('Sub Title', $show_elements_checked_values) || in_array('Title', $show_elements_checked_values) ) :?>
							<div class="col-sm-12">
								<?php  if( in_array('Title', $show_elements_checked_values) ) : ?>
									<h3  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"><?php the_sub_field( 'heading_title' ); ?></h3>
								<?php endif; ?>
								<?php  if( in_array('Sub Title', $show_elements_checked_values) ) : ?>
									<small  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"><?php the_sub_field( 'subtitle' ); ?></small>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<!-- One Column Content -->
						<div class="contentWrap <?php echo in_array('Media', $show_elements_checked_values) ? 'col-md-6' : 'col-md-12'; ?>">
							<div class="contentInnerWrap">
								<?php  if( in_array('Column Title', $show_elements_checked_values) ) : ?>
									<h3 data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"><?php the_sub_field( 'column_title' ); ?></h3>
								<?php endif; ?>
								<?php  if( in_array('Description', $show_elements_checked_values) ) : ?>
									<div data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
										<?php the_sub_field( 'description' ); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						
						<!-- One Column Media -->
						<?php  if( in_array('Media', $show_elements_checked_values) ) : ?>
							<div class="mediaWrap col-md-6">
								<?php //the_sub_field( 'type' ); ?>
								<?php if ( get_sub_field( 'image' ) ) : ?>
									<div class="mediaImage"  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
										<img src="<?php the_sub_field( 'image' ); ?>" />
									</div>
								<?php endif ?>
								<?php if ( get_sub_field( 'video' ) ) : ?>
									<video controls  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
										<source src="<?php the_sub_field( 'video' ); ?>" type="video/mp4">
										Your browser does not support the video tag.
									</video>
								<?php endif; ?>
							</div>
						<?php endif; ?>

					</div>
				</div>
			<?php endif; ?>
			<?php if($show_layout_options == "More Column Layout" ): ?>
				<div class="multiColumn">
					<div class="column-main-title">
						<h3  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"><?php the_sub_field( 'columns_title' ); ?></h3>
						<small data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"><?php the_sub_field( 'columns_sub_title' ); ?></small>
					</div>
					<div class="d-flex">
					
						<?php if ( have_rows( 'columns' ) ) : ?>
							<?php while ( have_rows( 'columns' ) ) : the_row(); ?>
								<div class="items">
									<?php $show_elements_checked_values = get_sub_field( 'show_elements' ); ?>

									<?php  if( in_array('Media', $show_elements_checked_values) ) : ?>
										<?php if ( get_sub_field( 'image' ) ) : ?>
											<div  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
											<img src="<?php the_sub_field( 'image' ); ?>" />
											</div>
										<?php endif ?>
										<?php if ( get_sub_field( 'video' ) ) : ?>
											<video controls  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
												<source src="<?php echo esc_url( $video['url'] ); ?>" type="video/mp4">
												Your browser does not support the video tag.
											</video>
										<?php endif; ?>
									<?php endif; ?>
									
									<?php  if( in_array('Title', $show_elements_checked_values) ) : ?>
										<h3  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"><?php the_sub_field( 'title' ); ?></h3>
									<?php endif; ?>
									<?php  if( in_array('Subtitle', $show_elements_checked_values) ) : ?>
										<small  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"><?php the_sub_field( 'subtitle' ); ?></small>
									<?php endif; ?>
									
									<?php  if( in_array('Description', $show_elements_checked_values) ) : ?>
										<div data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
											<?php the_sub_field( 'description' ); ?>
										</div>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						<?php else : ?>
							<?php // No rows found ?>
						<?php endif; ?>
						
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
			
			
			
			
			
			