<?php

/**
 * Template Name: Blog Layout
 */
get_header();
?>
<div class="marquee pb-0">
	<h3 class="scarlett-containter--title"><?php the_title(); ?></h3>
	<div class="latest-post-content">
		<div class="scarlett-containter">
			<div class="row align-items-center">
				<?php 
					global $wp_query; 
					$last = wp_get_recent_posts(array('numberposts'=>'1','post_status'=>'publish' )); 
					$last_id = $last['0']['ID']; 
					$wp_query = new WP_Query('p='. $last_id);

					while ($wp_query -> have_posts()) : $wp_query -> the_post();
					?>
					  
					<div class="col-lg-6">
						<div class="post-image">
							<?php if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>">
									<?php echo the_post_thumbnail('full'); ?>
								</a>
							<?php } ?>
						</div>
					</div>
					<div class="col-lg-6">
						<h4 class="post-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h4>
					
						<div class="content"><?php the_excerpt(); ?></div>
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
					 </div>
					<?php
					// Repeat the process and reset once it hits the limit
					endwhile;
					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</div>
<div class="marquee">
	<div class="blogs-list">
		<div class="scarlett-containter">

	        <?php
	        $args = array(  
	            'post_per_page' => -1,
	            'post_type' => 'post',
	            'post_status' => 'publish',
	            'order' => 'ASC',
    			'category__not_in' => array(17)
	        );

	        $loop = new WP_Query( $args ); 

	        ?>

	        <div class="filters filter-button-group">
	            <ul>
	                <li class="active" data-filter="*"><span>View All</span></li>
	                <?php
	                    $categories = get_categories();
	                    foreach($categories as $category) {
	                    	if ($category->slug != 'uncategorized') {
	                        // $replace_cat_name = str_replace(' ', '-', $category->name);
	                        $category_class = (strpos($category->name, ' ') !== false) ? str_replace(' ', '-', $category->name) : $category->name;
	                        echo "<li data-filter='.".$category_class."'><span>".$category->name."</span></li>";
	                    	}
	                    }
	                ?>
	            </ul>
	        </div>

	        <div class="content grid row">
				<?php
					if ( $loop->have_posts() ) :

					while ( $loop->have_posts() ) : $loop->the_post(); 
					$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
					$url = $src[0];
					$url_id = attachment_url_to_postid($url); 
					$url_alt = get_post_meta($url_id, '_wp_attachment_image_alt', TRUE);
					$url_title = get_the_title($url_id);

					$post_id = $post->ID; 
					// $case_study_cat_nm = strip_tags( get_the_term_list($post_id,'category','',' '));

					$terms = get_the_terms($post_id, 'category');
					$category_classes = '';
			        $categories = '';
			        if ($terms && !is_wp_error($terms)) {
			            foreach ($terms as $term) {
			            	$term_class = (strpos($term->name, ' ') !== false) ? str_replace(' ', '-', $term->name) : $term->name;
                    		$category_classes .= $term_class . ' ';
			                $categories .= '<span>' . $term->name . '</span>';
			            }
			        }
				?>
					
					<div class="our-blogs col-md-6 col-lg-4 grid-item <?php echo trim($category_classes); ?>">
						<div class="content-wrap">
							<a href="<?php the_permalink();?>"> 
								<div class="image-wrap">
									<img src="<?php echo $url; ?>" alt="<?php echo $url_alt; ?>" title="<?php echo $url_title; ?>">
								</div>
							</a>
							<div class="content-details">
								<div class="category-name">
									<!-- <?php echo $case_study_cat_nm; ?> -->
									<?php echo $categories; ?>
								</div>
								<a href="<?php the_permalink();?>"> 
									<h4><?php the_title(); ?></h4>
								</a>
								<span class="post-datetime"><?php the_time('F j, Y'); ?></span>
								<div class="content">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
					</div> 
                <?php endwhile;
                	  else: 
                ?>
                    <p class="no-blog-posts">
                        No Posts Found.
                    </p>
                <?php endif; 
                wp_reset_postdata(); 
                ?>
			</div>
		</div>
        
    </div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.grid').isotope({
		  itemSelector: '.grid-item',
		  layoutMode: 'fitRows'
		});

		// filter items on button click
		jQuery('.filter-button-group').on( 'click', 'li', function() {
		  var filterValue = jQuery(this).attr('data-filter');
		  jQuery('.grid').isotope({ filter: filterValue });
		  jQuery('.filter-button-group li').removeClass('active');
		  jQuery(this).addClass('active');
		});
	});
</script>
<?php
get_footer();