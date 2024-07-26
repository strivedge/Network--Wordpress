<?php 
    $main_title  = get_sub_field( 'main_title' );; 
    $sort_description  = get_sub_field('sort_description');
    $grid_column_class  = get_sub_field('grid_column_class');
    $grid_column_with = get_sub_field( 'grid_column_with' );

    $widthCol = '';

    if ($grid_column_with === '1/1') {
        $widthCol = "col-lg-12 d-flex";
    } elseif ($grid_column_with === '1/2') {
        $widthCol = "col-md-6 mb-3 d-flex";
    } elseif ($grid_column_with === '1/3') {
        $widthCol = "col-lg-4 mb-3 d-flex";
    } elseif ($grid_column_with === '1/4') {
        $widthCol = "col-lg-3 mb-3 d-flex";
    } else {
        $widthCol = "col-lg-12";
    }
?>
<div class="scarlett-containter grid_columnWrap">
	<div class="scarlett-containter-inner">
        <div class="grid_column">
            <div class="grid_column_top">
                <?php if ( $main_title ) : ?>
                    <h3 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300"><?php echo $main_title; ?></h3>
                <?php endif; ?>
                <?php if ( $sort_description ) : ?>
                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="500"><?php echo $sort_description; ?></div>
                <?php endif; ?>
            </div>
            
            <?php if ( have_rows( 'grid_columns' ) ) : ?>
                <div class="grid_column_columns <?php echo $grid_column_class;?>_Wrap">
                    <div class="row">
                        <?php $countAni =  1; while ( have_rows( 'grid_columns' ) ) : the_row(); ?>
                            <div class="<?php echo $widthCol; ?>">
                                <div class="grid_column_columns-inner <?php echo $grid_column_class;?>" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="<?php echo $countAni;?>00" data-aos-offset="0">
                                    <?php 
                                        $icon = get_sub_field( 'icon' );
                                        $title = get_sub_field( 'title' ); 
                                        $description = get_sub_field( 'description' ); 
                                        $add_page_link = get_sub_field( 'add_page_link' );
                                    ?>
                                    <?php if($add_page_link): ?>
                                    <a  href="<?php echo $add_page_link; ?>">
                                        <?php if ( $icon ) : ?>
                                            <div class="iconWrap">
                                                <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ( $title ) : ?>
                                            <h3><?php echo $title; ?></h3>
                                        <?php endif; ?>
                                        <?php if ( $description ) : ?>
                                            <div><p><?php echo $description; ?></p></div>
                                        <?php endif; ?>
                                    </a>    
                                    <?php else: ?>
                                        <?php if ( $icon ) : ?>
                                            <div class="iconWrap">
                                                <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ( $title ) : ?>
                                            <h3><?php echo $title; ?></h3>
                                        <?php endif; ?>
                                        <?php if ( $description ) : ?>
                                            <div><p><?php echo $description; ?></p></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php $countAni++; endwhile; ?>
                    </div>
                </div>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>
            </div>
    </div>
</div>