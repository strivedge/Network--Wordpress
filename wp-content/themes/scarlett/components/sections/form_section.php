<?php 
    $custom_class  = get_sub_field('custom_class');
    $title  = get_sub_field('title');
    $short_description  = get_sub_field('short_description');
    $form_list  = get_sub_field('form_list');
?>
<div class="scarlett-wrap">
    <div class="scarlett-containter <?php echo $custom_class; ?>">
        <div class="scarlett-containter-inner">
            <h3 class="scarlett-containter--title"><?php echo $title ?></h3>
            <?php if(!empty($short_description)):?>
                <p class="sort-description"><?php echo $short_description ?></p>
            <?php endif; ?>
            <div class="mt-4">
                <?php echo $form_list; ?>
            </div>
        </div>
    </div>
</div>