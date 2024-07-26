<?php

/**
 * Template Name: Page Layout
 */
get_header();
if (have_posts()) :
	while (have_posts()) :
		the_post();
		if (have_rows('sections')) :
			while (have_rows('sections')) : 
				the_row();
				get_template_part('components/sections/' . get_row_layout());
			endwhile; 
		else : 
		?>
		<div class="scarlett-containter">
			<div class="scarlett-containter-inner">
				<h3 class="scarlett-containter--title">
					<?php the_title(); ?>
				</h3>
				<p class="comming-soon-text">Comming Soon</p>
			</div>
		</div>
		<?php
		 endif;
	endwhile;
endif;
//get_sidebar();
get_footer();