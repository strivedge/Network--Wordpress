<?php 
    $title  = get_sub_field('tab_title'); 
    $tab_bg_color  = get_sub_field('tab_bg_color');
    $tab_custom_class  = get_sub_field('tab_custom_class');
?>
<div class="scarlett-wrap" style="background-color: <?php echo $tab_bg_color ?>;" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
    <div class="scarlett-containter tab <?php echo $tab_custom_class ?>">
        <div class="scarlett-containter-inner">
            <div class="tab-Subtitle"><?php echo $title; ?></div>
            <?php if( have_rows('tabs') ): $tabCount = 1; ?>
                <div class="tab-content" id="myTabContent">        
                    <?php while ( have_rows('tabs') ) : the_row(); 
                        $tab_content = get_sub_field('tab_content');
                        $tab_content_image = get_sub_field('tab_content_image');
                        $tag_line = get_sub_field('tag_line');
                        $nav_icon = get_sub_field('nav_icon');
                        $tab_content_image_link = get_sub_field('tab_content_image_link');
                    ?>
                        <div class="tab-pane fade <?= ($tabCount === 1) ? "active show" : ""; ?>" 
                        id="tab-<?php echo $tabCount?>" role="tabpanel" aria-labelledby="nav-tab-<?php echo $tabCount?>">
                            <div class="row">
                                <div class="contentWrap <?= ($tab_content_image) ? "col-lg-4" : "col-lg-12"; ?>">
                                    <?php echo $tab_content; ?>
                                </div>
                                <?php if($tab_content_image): ?>
                                    <div class="imageWrap col-lg-8">
                                        <div class="imageWrap_inner">
                                            <a href="<?php echo $tab_content_image_link; ?>">
                                                <img src="<?php echo $tab_content_image; ?>" alt="" srcset="">
                                            </a>
                                            <div class="tag_line_wrap">
                                                <h3 class="title"><?php echo $tag_line ?></h3>
                                            </div>
                                            
                                            <span class="icon">
                                                <img src="<?php echo $nav_icon; ?>" alt="" />
                                            </span>
                                        </div>
                                    </div>
                                    
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php $tabCount++; endwhile; ?>
                </div>
            <?php endif; ?>
            <?php if( have_rows('tabs') ): $tabCount = 1; ?>
                <ul class="nav nav-tabs" id="myTab" role="tablist">        
                    <?php while ( have_rows('tabs') ) : the_row(); 
                        $tab_nav = get_sub_field('tab_nav');
                        $nav_icon = get_sub_field('nav_icon');
                        $nav_title = get_sub_field('nav_title');
                        
                    ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= ($tabCount === 1) ? "active" : ""; ?>" 
                        id="nav-tab-<?php echo $tabCount?>" 
                        data-bs-toggle="tab" 
                        data-bs-target="#tab-<?php echo $tabCount?>" type="button" role="tab" 
                        aria-controls="tab-<?php echo $tabCount?>" 
                        aria-selected="<?= ($tabCount === 1) ? "true" : "false"; ?>">
                            <?php if($tab_nav === "Icon"): ?>
                                <span class="icon">
                                    <img src="<?php echo $nav_icon; ?>" alt="" />
                                </span>
                            <?php elseif($tab_nav === "Title"): ?>
                                <?php echo $nav_title; ?>
                            <?php endif; ?>
                        </button>
                    </li>
                    <?php $tabCount++; endwhile; ?>
                </ul>
            <?php endif; ?>
            
        </div>
    </div>
</div>