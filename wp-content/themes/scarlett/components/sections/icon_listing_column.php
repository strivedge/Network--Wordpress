<?php
    $custom_class  = get_sub_field('custom_class');
?>
<div class="scarlett-containter icon_and_images_list_column_Wrap <?php echo $custom_class; ?>_Wrap">
	<div class="scarlett-containter-inner">
        <div class="icon_and_images_list_column <?php echo $custom_class; ?>">
            <?php if ( have_rows( 'list' ) ) : ?>
                <div class="row">
                    <?php $countAni = 1; while ( have_rows( 'list' ) ) : the_row(); ?>
                        <div class="col" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="<?php echo $countAni;?>00" data-aos-offset="0">
                            <div class="inner-col">
                                <?php 
                                    $icon_and_image = get_sub_field( 'icon_and_image' ); 
                                    $title = get_sub_field( 'title' ); 
                                    $link_text = get_sub_field( 'link_text' ); 
                                    $link = get_sub_field( 'link' ); 
                                ?>
                                <?php if ( $icon_and_image ) : ?>
                                    <img src="<?php echo esc_url( $icon_and_image['url'] ); ?>" alt="<?php echo esc_attr( $icon_and_image['alt'] ); ?>" />
                                <?php endif; ?>
                                <?php if ( $title ) : ?>
                                    <h3><?php echo $title; ?></h3>
                                <?php endif; ?>
                                <?php if ( $link ) : ?>
                                    <a href="<?php echo $link; ?>" class="btn btn-link" id="no<?php echo $countAni;?>"><?php echo $link_text; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php $countAni++; endwhile; ?>
                </div>
			<?php else : ?>
				<?php // No rows found ?>
			<?php endif; ?>
        </div>
    </div>
</div>