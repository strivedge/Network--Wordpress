<?php 
    $custom_class  = get_sub_field('custom_class');
    $select_heading_and_description_display_type = get_sub_field( 'select_heading_and_description_display_type' );
    $show_options_checked_values = get_sub_field( 'show_options' );
    $features_list_image = get_sub_field('features_list_image');
    $features_image_placement = get_sub_field('features_image_placement');
    $features_list_title = get_sub_field('features_list_title');
    $features_list_description = get_sub_field('features_list_description');
    $features_list_download_link = get_sub_field('features_list_download_link');
    $coming_up_features = get_sub_field('coming_up_features');
?>
<div class="scarlett-wrap <?php echo $features_image_placement; ?> <?php echo (in_array('Feature List', $show_options_checked_values)) ? "featureListbg" : "";?>">
    <div class="scarlett-containter <?php echo $custom_class; ?>">
        <div class="scarlett-containter-inner">
            <?php 
                $subTitle = get_sub_field('sub_title'); 
                $title  = get_sub_field('title'); 
                $sortDescription = get_sub_field('sort_description');
                $image = get_sub_field('image');
            ?>
            <div class="calltoAction__top">
            
                <?php if( $select_heading_and_description_display_type === 'Half Column' ): ?>
                    <div class="left_column <?= (!empty($sortDescription)) ? "" : "full" ?>">
                        <?php if($subTitle):?>
                            <small  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                                <?php echo $subTitle; ?>
                            </small>
                        <?php endif; ?>

                        <?php if($title):?>
                            <h3 class="scarlett-containter--title"  data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                                <?php echo $title; ?>
                            </h3>
                        <?php endif; ?>

                        <?php if( have_rows('links') ): ?>
                            <?php while( have_rows('links') ): the_row(); 
                                // Get sub field values.
                                $label = get_sub_field('label');
                                $url = get_sub_field('url');
								$modalEnable = get_sub_field('modal_enable');
                                ?>
								<?php if ($modalEnable == 'Yes'): ?>
									<a class="btn-link" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#downloadbrochure">
								<?php else: ?>
									<a class="btn-link" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" href="<?php echo $url; ?>" target="_blank">
								<?php endif; ?>
									<?php echo $label; ?>
								</a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <?php if($sortDescription):?>
                        <div class="right_column"  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                            <p><?php echo $sortDescription; ?></p>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="full_column">
                    <?php if($subTitle):?>
                        <small   data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                            <?php echo $subTitle; ?>
                        </small>
                    <?php endif; ?>

                    <?php if($title):?>
                        <h3 class="scarlett-containter--title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                            <?php echo $title; ?>
                        </h3>
                    <?php endif; ?>

                    <?php if($sortDescription):?>
                        <p   data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"><?php echo $sortDescription; ?></p>
                    <?php endif; ?>

                    <?php if( have_rows('links') ): ?>
                        <?php while( have_rows('links') ): the_row(); 
                            // Get sub field values.
                            $label = get_sub_field('label');
                                $url = get_sub_field('url');
								$modalEnable = get_sub_field('modal_enable');
                                ?>
								<?php if ($modalEnable == 'Yes'): ?>
									<a class="btn-link" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#downloadbrochure">
								<?php else: ?>
									<a class="btn-link" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" href="<?php echo $url; ?>" target="_blank">
								<?php endif; ?>
									<?php echo $label; ?>
								</a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if($image):?>
                <div class="calltoAction__image"  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                    <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" data-speed="-1" class="img-parallax" />
                </div>
            <?php endif; ?>
            

            <!-- List Items Options -->
            <?php  if( in_array('List Items', $show_options_checked_values) ) : ?>
                <?php if( have_rows('list_items') ): ?>
                    <div class="calltoAction__listItem">
                        <ul>
                            <?php $countAni = 1; while ( have_rows('list_items') ) : the_row(); 
                                $display_option = get_sub_field('display_option');
                                $title = get_sub_field('title');
                                $icon = get_sub_field('icon');
                                $sort_description = get_sub_field('sort_description');
                            ?>
                                <?php if($display_option === "Icon"):?>
                                    <li class="calltoAction__listItem--icon"  data-aos="fade-up" data-aos-delay="<? echo $countAni; ?>00" data-aos-duration="<? echo $countAni; ?>000">
                                        <span class="icon-wrap">
                                            <?php if($icon): ?>
                                                <img src="<?php echo $icon; ?>" />
                                            <?php endif; ?>
                                        </span>
                                        <p><?php echo $sort_description; ?></p>
                                    </li>
                                <?php elseif($display_option === "Title"):?>
                                    <li class="calltoAction__listItem--title"  data-aos="fade-up" data-aos-delay="<? echo $countAni; ?>00" data-aos-duration="<? echo $countAni; ?>000">
                                        <h3><?php echo $title; ?></h3>
                                        <p><?php echo $sort_description; ?></p>
                                    </li>
                                <?php endif; ?>
                            <?php $countAni++; endwhile; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Features List Options -->
            <div class="calltoAction__featurelist <?php echo ($features_list_image) ? "image" : "" ?>">
            <?php if( in_array('Feature List', $show_options_checked_values) ) : ?>
                
                    <div class="row">
                        <?php if($features_image_placement === 'Top' ): ?>
                            <?php if($features_list_image): ?>
                                <div class="col-sm-12">
                                    <div class="calltoAction__featureimg" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                                    <img src="<?php echo $features_list_image; ?>" data-speed="-1" class="img-parallax" />
                                </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="col-sm-4 calltoAction__featuretitle">
                            <h3  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"><?php echo $features_list_title; ?></h3>
                            <a class="btn btn-link" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#downloadbrochure">Download Brochure</a>
                        </div>
                        <div class="col-sm-8 calltoAction__featurecontent"   data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                            <?php echo $features_list_description; ?>
                        </div>
                        <?php if($features_image_placement === 'Bottom' ): ?>
                            <?php if($features_list_image): ?>
                                <div class="col-sm-12">
                                    <div class="calltoAction__featureimg" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                                    <img src="<?php echo $features_list_image; ?>" data-speed="-1" class="img-parallax" />
                                </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>    
                
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>