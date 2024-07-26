<?php
    $title  = get_sub_field('title');
    $custom_class  = get_sub_field('custom_class');
?>
<div class="scarlett-wrap <?php echo $custom_class; ?>_Wrap">
    <div class="scarlett-containter">
        <div class="pricing-tables">
            <h3 class="text-center"><?php echo $title; ?></h3>
            <?php if (have_rows('pricing_column')): ?>
                    <?php while (have_rows('pricing_column')):  the_row(); 
                        $column_class  = get_sub_field('column_class');
                    ?>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="pricing-tables-content col-12 <?php echo $column_class; ?> mx-auto">
                <div class="table-container table-responsive">
                    <table class="w-100">
                        <thead>
                                <?php if (have_rows('pricing_column')): ?>
                                    <th class="table-title">
                                        <?php while (have_rows('pricing_column')):  the_row(); 
                                            $table_title  = get_sub_field('title');
                                        ?>
                                        <?php echo $table_title; ?>
                                    <?php endwhile; ?>
                            </th>
                                <?php endif; ?>
                                <?php if (have_rows('title_price')): ?>
                                    <?php while (have_rows('title_price')):  the_row(); 
                                        $title  = get_sub_field('title');
                                        $price  = get_sub_field('price');
                                    ?>
                                    <th class="text-center">
                                        <span class="price-title"><?php echo $title; ?></span>
                                        <span class="price"><?php echo $price; ?></span>
                                    </th>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                        </thead>
                        <tbody>
                                    <?php if (have_rows('pricing_column')): ?>
                                        <?php while (have_rows('pricing_column')):  the_row(); 
                                            $display_options_checked_values = get_sub_field( 'display_options' );
                                        ?>
                                            <?php if (have_rows('pricing_label')): ?>
                                                <?php while (have_rows('pricing_label')):  the_row(); 
                                                    $label  = get_sub_field('label');
                                                    $essentials  = get_sub_field('essentials');
                                                    $convenience  = get_sub_field('convenience');
                                                    $crm_and_website  = get_sub_field('crm_and_website');
                                                    $payroll_and_compliance  = get_sub_field('payroll_and_compliance');
                                                ?>
                                                <tr>

                                                    <th class="label">
                                                        <?php echo $label; ?>
                                                    </th>
                                                    <?php  if( in_array('Essentials', $display_options_checked_values) ) : ?>
                                                        <td class="text-center">

                                                            <?php if ($essentials =="Yes") : ?>
                                                                <span class="imgs"><img src="<?php echo get_template_directory_uri();?>/imgs/ul-li-checkmark.png" alt=""></span>
                                                                
                                                            <?php elseif ($essentials =="No"): ?> 
                                                                
                                                            <?php  elseif ($essentials =="Unlimited"): ?> 
                                                                <span>Unlimited</span>

                                                            <?php elseif ($essentials =="Up to 6") : ?>
                                                                <span>Up to 6</span>
                                                            <?php endif; ?> 
                                                        </td>
                                                    <?php endif; ?> 

                                                    <?php  if( in_array('Convenience', $display_options_checked_values) ) : ?>
                                                        <td class="text-center">
                                                           <?php if ($convenience =="Yes") : ?>
                                                                <span class="imgs"><img src="<?php echo get_template_directory_uri();?>/imgs/ul-li-checkmark.png" alt=""></span>
                                                                
                                                            <?php elseif ($convenience =="No"): ?> 
                                                                    
                                                            <?php  elseif ($convenience =="Unlimited"): ?> 
                                                                <span>Unlimited</span>

                                                            <?php elseif ($convenience =="Up to 6") : ?>
                                                                <span>Up to 6</span>
                                                            <?php endif; ?> 
                                                        </td>
                                                    <?php endif; ?> 

                                                    <?php  if( in_array('CRM And Website', $display_options_checked_values) ) : ?>
                                                        <td class="text-center">
                                                           <?php if ($crm_and_website =="Yes") : ?>
                                                                <span class="imgs"><img src="<?php echo get_template_directory_uri();?>/imgs/ul-li-checkmark.png" alt=""></span>
                                                                
                                                            <?php elseif ($crm_and_website =="No"): ?> 
                                                                    
                                                            <?php  elseif ($crm_and_website =="Unlimited"): ?> 
                                                                    <span>Unlimited</span>

                                                            <?php elseif ($crm_and_website =="Up to 6") : ?>
                                                                <span>Up to 6</span>
                                                            <?php endif; ?> 
                                                        </td>
                                                    <?php endif; ?> 


                                                    <?php  if( in_array('Payroll and Compliance', $display_options_checked_values) ) : ?>
                                                        <td class="text-center">
                                                           <?php if ($payroll_and_compliance =="Yes") : ?>
                                                                <span class="imgs"><img src="<?php echo get_template_directory_uri();?>/imgs/ul-li-checkmark.png" alt=""></span>
                                                                
                                                            <?php elseif ($payroll_and_compliance =="No"): ?> 
                                                                    
                                                            <?php  elseif ($payroll_and_compliance =="Unlimited"): ?> 
                                                                    <span>Unlimited</span>

                                                            <?php elseif ($payroll_and_compliance =="Up to 6") : ?>
                                                                <span>Up to 6</span>
                                                            <?php endif; ?> 
                                                        </td>
                                                    <?php endif; ?> 




                                                </tr>

                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>



                                    <tr>
                                        <td></td>
                                        <?php if (have_rows('title_price')): ?>
                                            <?php while (have_rows('title_price')):  the_row(); 
                                                $button_link  = get_sub_field('button_link');
                                            ?>
                                                <td class="text-center">
                                                    <a href="<?php echo $button_link; ?>" class="btn btn-primary">Contact Sales</a>
                                                </td>
                                            <?php  endwhile; ?>
                                        <?php endif; ?> 
                                    </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>