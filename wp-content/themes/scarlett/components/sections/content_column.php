<?php
    $custom_class  = get_sub_field( 'custom_class' );
?>
<div class="scarlett-containter content_columWrap">
	<div class="scarlett-containter-inner">
        <div class="content_colum">
            <?php if ( have_rows( 'columns' ) ) : ?>
            <div class="contentWrapper <?php echo $custom_class; ?>">
                <div class="row">
				<?php while ( have_rows( 'columns' ) ) : the_row(); ?>
                    <div class="col" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                        <?php if ( get_sub_field( 'image' ) ) : ?>
                            <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                                <img src="<?php the_sub_field( 'image' ); ?>" />
                            </div>
                        <?php endif ?>
                        <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">                    
					        <?php the_sub_field( 'description' ); ?>
                        </div>
                    </div>
				<?php endwhile; ?>
                </div>
            </div>
			<?php else : ?>
				<?php // No rows found ?>
			<?php endif; ?>
        </div>    
    </div>
</div>