<div class="scarlett-wrap productGridWrap">
    <div class="scarlett-containter">
        <div class="scarlett-containter-inner">
            <?php if (have_rows('product_rows')) : ?>
                <div class="productGrid">
                    <?php $counter = 0; ?>
                    <?php while (have_rows('product_rows')) : the_row();
                        $product_image = get_sub_field('product_image');
                        $product_icon = get_sub_field('product_icon');
                        $product_name = get_sub_field('product_name');
                        $product_page_link = get_sub_field('product_page_link');
                    ?>
                        <a href="<?php echo $product_page_link; ?>" class="productGridTtems productGridTtems_<?php echo $counter; ?>" style="background-image: url('<?php echo $product_image; ?>');">
                            <div class="content-wrap">
                                <img src="<?php echo $product_icon; ?>" />
                                <span class="title-wrap"><?php echo $product_name; ?></span>
                            </div>
                        </a>
                        <?php
                            $counter++;
                            if ($counter % 3 == 0 || $counter == count(get_field('product_rows'))) {
                                echo '</div>'; // Close the current grid
                                if ($counter != count(get_field('product_rows'))) {
                                    echo '<div class="productGrid">'; // Start a new grid if it's not the last item
                                }
                                $counter = 0; // Reset the counter
                            }
                        ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<style>
.productGridWrap .scarlett-containter-inner{ padding-bottom: 0px; }
.productGrid { display: flex; justify-content: space-between; margin-bottom: 20px;}
.productGrid + .productGrid{ flex-direction: row-reverse; }

.productGridTtems {  width: 26%; padding: 35px; transition: width 0.5s ease; overflow: hidden; position: relative; border-radius: 10px; min-height: 700px; background-repeat: no-repeat; background-position: center; background-size: cover; color: #fff;}
.productGridTtems .content-wrap{ position: absolute; left:20px; bottom:20px; display: flex; align-items:center; }
.productGridTtems .content-wrap img{ /*max-width: 35%;*/max-width: 45%; height: auto; }
.productGridTtems.productGridTtems_0 {width: 46%;}

.heroBanner__innrer{ display: flex; min-height: 655px; }
.productGridWrap{ margin-top: -327px; }

.productGridTtems .content-wrap .title-wrap { font-size: 20px;line-height: normal;}

@media (max-width: 1680px) { 
	.heroBanner__innrer{ min-height: 490px; }
    .productGridWrap{ margin-top: -245px; }
    .productGridTtems { min-height: 600px; }
}
@media (max-width: 1440px) { 
    .heroBanner__innrer{ min-height: 490px; }
    .productGridWrap{ margin-top: -245px; }
    .productGridTtems { min-height: 500px; }
}
@media (max-width: 1280px) {
	.heroBanner__innrer { min-height: 376px; }
    .productGridWrap{ margin-top: -188px; }
    .productGridTtems { min-height: 400px; }
}
@media (max-width: 1199.98px) {
    .productGridTtems { padding: 22px; }
    .productGridTtems .content-wrap img { max-width: 30%; }
    .productGridTtems .content-wrap .title-wrap { font-size: 16px;line-height: normal;}
}
@media (max-width: 991.98px) {
	.heroBanner__innrer { min-height: 270px; }
    .productGridWrap{ margin-top: -135px; }
    .productGridTtems { min-height: 300px; }
}
@media (max-width: 767.98px) {
    .productGridWrap{ margin-top: 0; }
    .productGrid{ flex-wrap: wrap; margin-bottom: 0; }
    .productGridTtems{ margin-bottom: 15px; width: 100% !important; }
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var containers = document.querySelectorAll(".productGrid");

    containers.forEach(function(container) {
        var columns = container.querySelectorAll(".productGridTtems");
        var originalWidths = [];

        columns.forEach(function(column) {
            originalWidths.push(column.style.width);
            
            column.addEventListener("mouseover", function() {
                var hoveredColumnIndex = Array.from(columns).indexOf(column);
                columns.forEach(function(col, index) {
                    if (index !== hoveredColumnIndex) {
                        col.style.width = "26%";
                    } else {
                        col.style.width = "46%";
                    }
                });
            });
        });
    });
});


</script>