<?php 
	$bgImage = get_sub_field('bg_image'); 
	$bgColor = get_sub_field('bg_color'); 
	$heroTitle = get_sub_field('title');
	$heroDesp = get_sub_field('description');
    $custom_class  = get_sub_field('custom_class');
?>
<div class="heroBanner_wrap <?php echo $custom_class; ?>"  style="<?php echo ($bgImage ? 'background-image: url('. $bgImage .');' : ''); ?>">
	<div class="heroBanner">
		<div class="heroBanner__innrer">
			<!-- Hero Banner Image And Video -->
			<?php if( have_rows('image_and_video') ): ?>
				<?php while( have_rows('image_and_video') ): the_row(); 
					// Get sub field values.
					$option = get_sub_field('select_option'); 
					$image = get_sub_field('image');
					$video = get_sub_field('video');
					?>
					<?php if($option === 'Image'):?>
						<?php if($image): ?>
							<?php if( $custom_class == "fullColumnBanner" || $custom_class == "fullColumnBanner withGradient" || $custom_class == "fullColumnBanner withGradient col-title-expand" || $custom_class == "fullColumnBanner withGradient col-title-expand imageheight"): ?>
							<div class="heroBanner__image parallaxBanner"  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
								<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" data-speed="-1" class="img-parallax" />
							</div>
							<?php else: ?>
							<div class="heroBanner__image"  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
								<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
							</div>
							<?php endif; ?>
						<?php endif; ?>
					<?php elseif($option === 'Video'): ?>
						<?php if($video): ?>
							<div class="heroBanner__video">
								<!-- <video src="<?php echo $video['url']; ?>"></video> -->
								<!-- controls -->
								<video autoplay loop muted playsinline>
									<source src="<?php echo $video['url']; ?>"  type="video/mp4">
								</video>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>	
			<!-- Hero Banner Content Section -->
			<div class="heroBanner__content">
				<?php if($heroTitle):?>
					<h3 class="heroBanner__content-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
						<?php echo $heroTitle; ?>
					</h3>
				<?php endif; ?>
				<?php if($heroDesp):?>
					<div class="heroBanner__content-description" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
						<?php echo $heroDesp; ?>
					</div>
				<?php endif; ?>
				<?php if( have_rows('buttons') ): ?>
					<div class="heroBanner__links"  data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
						<?php while ( have_rows('buttons') ) : the_row(); 
						$link = get_sub_field('url');
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						$modalEnable = get_sub_field('modal_enable');
						?>
							<!-- <a href="<?php echo $link_url; ?>" class="btn <?php the_sub_field('custom_class'); ?>">
								<?php the_sub_field('label'); ?>
							</a> -->

							<?php if ($modalEnable == 'Yes'): ?>
									<a href="<?php echo $link_url; ?>" data-bs-toggle="modal" data-bs-target="#bookademo" class="btn <?php the_sub_field('custom_class'); ?>">
										<?php the_sub_field('label'); ?>
									</a>
								<?php else: ?>
									<a href="<?php echo $link_url; ?>" class="btn <?php the_sub_field('custom_class'); ?>">
										<?php the_sub_field('label'); ?>
									</a>
								<?php endif; ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>