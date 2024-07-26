<?php
    $title  = get_sub_field('title');
    $button_label  = get_sub_field('button_label');
    $custom_class  = get_sub_field('custom_class');
?>
<div class="our_members_list_column_Wrap <?php echo $custom_class; ?>_Wrap">
	<div class="scarlett-containter">
        <div class="our_members_list_column <?php echo $custom_class; ?>">
          	<h3 class="scarlett-containter--title mb-5" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" ><?php echo $title; ?></h3>
	           	<?php if (have_rows('members')): 
	                $counter = 1;
	            ?>
			        <div class="our_members row">
		           		<?php while (have_rows('members')):  the_row(); 
			                $image = get_sub_field('image');
			                $name = get_sub_field('name');
			                $designation = get_sub_field('designation');
			                $description = get_sub_field('description');
			            ?>
			            	<div class="col-md-4 col-xl-3">
								<div class="members">
									<div class="content-wrap">
										<div class="imgs">
											<img src="<?php echo $image; ?>" alt="<?php echo $name; ?>"/>
										</div>
										<h3><?php echo $name; ?>
											<span><?php echo $designation; ?></span>
										</h3>
										<div class="content text-center"><?php echo $description; ?></div>

										<!-- Button trigger modal -->
										<button type="button" class="btn btn-readmore" data-bs-toggle="modal" data-bs-target="#membersPopup<?php echo $counter; ?>">
										  <?php echo $button_label; ?>
										</button>

										<?php if (have_rows('social_icons')): ?>
                                            <ul class="social-links">
			           							<?php while (have_rows('social_icons')):  the_row(); 
				                					$name = get_sub_field('icons');
				                					$url = get_sub_field('link');
			           							?>
			           								<?php if ($name =="Facebook") : ?>
	                                                    <li class="icons">
	                                                        <a href="<?php echo $url; ?>" target="_blank"><span class="icon facebook"><img src="<?php echo get_template_directory_uri();?>/imgs/icon-facebook.svg" alt=""></span>
	                                                        </a>
	                                                    </li>
	                                                <?php endif; ?>	
	                                                <?php if ($name =="Instagram") : ?>
	                                                    <li class="icons">
	                                                        <a href="<?php echo $url; ?>" target="_blank"><span class="icon instagram"><img src="<?php echo get_template_directory_uri();?>/imgs/icon-instagram.svg" alt=""></span>
	                                                        </a>
	                                                    </li>
	                                                <?php endif; ?>	
	                                                <?php if ($name =="Twitter (X)") : ?>
	                                                    <li class="icons">
	                                                        <a href="<?php echo $url; ?>" target="_blank"><span class="icon twitter"><img src="<?php echo get_template_directory_uri();?>/imgs/icon-twitter.svg" alt=""></span>
	                                                        </a>
	                                                    </li>
	                                                <?php endif; ?>	
	                                                <?php if ($name =="Linkedin") : ?>
	                                                    <li class="icons">
	                                                        <a href="<?php echo $url; ?>" target="_blank"><span class="icon linkdin"><img src="<?php echo get_template_directory_uri();?>/imgs/icon-linkedin.png" alt=""></span>
	                                                        </a>
	                                                    </li>
	                                                <?php endif; ?>	
												<?php endwhile; ?>
											</ul>
						                <?php endif; ?>


										<!-- Modal -->
										<div class="modal fade" id="membersPopup<?php echo $counter; ?>" tabindex="-1" role="dialog" aria-labelledby="membersPopupLabel<?php echo $counter; ?>" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered modal-xl">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      </div>
										      <div class="modal-body">
										        <div class="imgs">
													<img src="<?php echo $image; ?>" alt="<?php echo $name; ?>"/>
												</div>
												<div class="content-title">
													<h3><?php echo $name; ?>
														<span><?php echo $designation; ?></span>
													</h3>
													<div class="inner-content"><?php echo $description; ?></div>

													<?php if (have_rows('social_icons')): ?>
			                                            <ul class="social-links">
						           							<?php while (have_rows('social_icons')):  the_row(); 
							                					$name = get_sub_field('icons');
						           							?>
						           								<?php if ($name =="Facebook") : ?>
				                                                    <li class="icons">
				                                                        <a href="<?php echo $url; ?>" target="_blank"><span class="icon facebook"><img src="<?php echo get_template_directory_uri();?>/imgs/icon-facebook.svg" alt=""></span>
				                                                        </a>
				                                                    </li>
				                                                <?php endif; ?>	
				                                                <?php if ($name =="Instagram") : ?>
				                                                    <li class="icons">
				                                                        <a href="<?php echo $url; ?>" target="_blank"><span class="icon instagram"><img src="<?php echo get_template_directory_uri();?>/imgs/icon-instagram.svg" alt=""></span>
				                                                        </a>
				                                                    </li>
				                                                <?php endif; ?>	
				                                                <?php if ($name =="Twitter (X)") : ?>
				                                                    <li class="icons">
				                                                        <a href="<?php echo $url; ?>" target="_blank"><span class="icon twitter"><img src="<?php echo get_template_directory_uri();?>/imgs/icon-twitter.svg" alt=""></span>
				                                                        </a>
				                                                    </li>
				                                                <?php endif; ?>	
				                                                <?php if ($name =="Linkedin") : ?>
				                                                    <li class="icons">
				                                                        <a href="<?php echo $url; ?>" target="_blank"><span class="icon linkdin"><img src="<?php echo get_template_directory_uri();?>/imgs/icon-linkedin.png" alt=""></span>
				                                                        </a>
				                                                    </li>
				                                                <?php endif; ?>	
															<?php endwhile; ?>
														</ul>
									                <?php endif; ?>
												</div>
										      </div>
										    </div>
										  </div>
										</div>
									</div>
								</div>
							</div>
						<?php $counter++; 
	                    endwhile; ?>
					</div>
                <?php endif; ?>
	    </div>
    </div>
</div>