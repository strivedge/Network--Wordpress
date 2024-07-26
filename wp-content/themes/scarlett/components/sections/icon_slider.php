<?php 
    $custom_class  = get_sub_field('custom_class');
?>
<?/*
<div class="scarlett-wrap">
	<div class="<?php echo $custom_class; ?>">
		<div class="scarlett-containter-inner <?php echo ( the_sub_field('title') ) ? '' : 'p-0' ?>">
			<div class="icon-slider-wrap">
				<h3 class="scarlett-containter--title"><?php the_sub_field('title'); ?></h3>
				<div  class="icon-slider-innerWrap">
				<?php if( have_rows('items') ): ?>
					<div class="icon-slider" id="marquee">
						<?php while ( have_rows('items') ) : the_row(); ?>	
						<div class="icon-item">
							<a href="<?php the_sub_field('link'); ?>">
								<img src="<?php the_sub_field('image'); ?>">
							</a>
						</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div> */?>

<div class="marquee">
<h3 class="scarlett-containter--title"><?php the_sub_field('title'); ?></h3>
<?php if( have_rows('items') ): ?>
    <ul class="marquee-content <?php echo $custom_class; ?>">
	<?php
		$iterations = 4; // Number of times to run the loop

		for ($i = 0; $i < $iterations; $i++) {
			while (have_rows('items')) : the_row(); ?>
				<li>
					<a href="<?php the_sub_field('link'); ?>">
						<img src="<?php the_sub_field('image'); ?>">
					</a>
				</li>
			<?php endwhile;
		}
	?>
    </ul>
<?php endif; ?>
</div>