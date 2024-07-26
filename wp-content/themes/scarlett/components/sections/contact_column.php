<?php 
    $contact_form_title  = get_sub_field( 'contact_form_title' );; 
    $contact_detail  = get_sub_field('contact_detail');
    $contact_form  = get_sub_field('contact_form');
    
?>
<div class="scarlett-containter">
	<div class="scarlett-containter-inner">
        <div class="contact_column">
            <div class="row">  
                <div class="col-sm-6">
                    <?php echo $contact_detail; ?>
                </div>
                <div class="col-sm-6 contactFromWrap">
                    <h3><?php echo $contact_form_title; ?></h3>
                    <?php echo $contact_form; ?>
                </div>
            </div>
        </div>
    </div>
</div>