<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Scarlett
 */

get_header();
?>

	<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				// the_post_navigation(
				// 	array(
				// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'scarlett' ) . '</span> <span class="nav-title">%title</span>',
				// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'scarlett' ) . '</span> <span class="nav-title">%title</span>',
				// 	)
				// );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>
		</div>

	</main><!-- #main -->

	<div class="marquee">
		<h3 class="scarlett-containter--title">More blog posts</h3>
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
// get_sidebar();
get_footer();
