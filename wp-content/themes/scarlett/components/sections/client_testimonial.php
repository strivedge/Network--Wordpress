<?php 
    $custom_class  = get_sub_field('custom_class');
    $section_bg_color  = get_sub_field('section_bg_color');
    $title  = get_sub_field('title');
?>
<div class="scarlett-wrap" style="background-color: <?php echo $section_bg_color ?>;" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
    <div class="scarlett-containter <?php echo $custom_class; ?>">
        <div class="scarlett-containter-inner testimonial-wrap">
            <small><?php echo $title; ?></small>
            <?php if( have_rows('testimonial_list') ): ?>
                <div class="testimonial">        
                    <?php while ( have_rows('testimonial_list') ) : the_row(); 
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        $client_name = get_sub_field('client_name');
                        $client_company = get_sub_field('client_company');
                        $client_photo = get_sub_field('client_photo');
                        $client_designation = get_sub_field('client_designation');
                    ?>
                    <div class="items">
                        <div class="content-wrap">
                            <h3 class="scarlett-containter--title"><?php echo $title; ?></h3>
                            <p><?php echo $description; ?></p>
                            <div class="client_review">
                                <div class="client_review--photo">
                                    <img src="<?php echo $client_photo; ?>" />
                                </div>
                                <div class="client_review--info">
                                    <h3><?php echo $client_name; ?></h3>
                                    <p><?php echo $client_designation; ?></p>
                                    <p><?php echo $client_company; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>