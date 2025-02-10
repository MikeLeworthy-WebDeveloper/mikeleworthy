<?php

// ________________________________________
// -- flex content layout blocks

	function flex_content_layout_blocks($page_id){
	$rows = get_post_meta( $page_id, 'layouts', true );
	$flex_counter = '1';
		foreach( (array) $rows as $count => $row ) {
			switch( $row ) {			
			/*---------------------------------------------------------------------------*/
			/* CONTENT BLOCK
			/*---------------------------------------------------------------------------*/
			case 'content_block';
			// content
			$heading_content = wpautop(get_post_meta( $page_id, 'layouts_' . $count . '_heading_content', true));
			?>
			<div class="section-<?php echo $count ?>">
				<div class="grid-container">
					<div class="grid-x">
						<div class="cell small-12 medium-10 medium-offset-1 xlarge-offset-2 xxlarge-6 xxlarge-offset-3">
							<div class="heading-content">
								<?php echo $heading_content; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			break;
			/*---------------------------------------------------------------------------*/
			/* PROJECT SLIDER FOR PROJECTS PAGE
			/*---------------------------------------------------------------------------*/
			case 'project_slider_block';
			// content
			$project_name = get_post_meta( $page_id, 'layouts_' . $count . '_project_name', true);
			// link
			$link_to_project = get_post_meta( $page_id, 'layouts_' . $count . '_link_to_project', true);
			$link_to_project_url = get_permalink($link_to_project);
			?>
			<div class="slider-container section-<?php echo $count ?>">
				<div class="grid-container">
					<div class="grid-x">
						<div class="cell small-12">
							<div class="swiper-container-project">
								<div class="swiper-wrapper">
									<?php
									  	$project_slider = get_post_meta( $page_id, 'layouts_' . $count . '_project_slider', true);
									    if($project_slider){
									      	for( $i = 0; $i < $project_slider; $i++ ){
										      	$_image = get_post_meta($page_id,'layouts_'.$count.'_project_slider_'.$i.'_image',true);
											?>
											<div class="swiper-slide">
												<?php srcset_image($_image); ?>
											</div>
											<?php
											}
										}
									?>
								</div>
							</div>
							<?php if(!empty($link_to_project)){ ?>
								<div class="project-attributes-container">
									<div class="project-title">
										<?php echo $project_name; ?>
									</div>
									<div class="project-link">
										<a class="cta-button" href="<?php echo $link_to_project_url; ?>">
											View Project
										</a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php
			break;
			/*---------------------------------------------------------------------------*/
			/* PROJECTS SLIDER FOR HOME PAGE
			/*---------------------------------------------------------------------------*/
			case 'project_slider_block_home';
			?>
			<div class="slider-container-home section-<?php echo $count ?>">
				<div class="grid-container">
					<div class="grid-x">
						<div class="cell small-12">
							<div class="swiper-container-project-home">
								<div class="swiper-wrapper">
									<?php
									  	$project = get_post_meta( $page_id, 'layouts_' . $count . '_project', true);
									    if($project){
									      	for( $i = 0; $i < $project; $i++ ){
										      	$_image = get_post_meta($page_id,'layouts_'.$count.'_project_'.$i.'_image',true);
										      	$_project_title = get_post_meta( $page_id, 'layouts_'.$count.'_project_'.$i.'_project_title', true);
										      	$_link_to_project = get_post_meta( $page_id, 'layouts_'.$count.'_project_'.$i.'_link_to_project', true);
												$_link_to_project_url = get_permalink($_link_to_project);
											?>
											<div class="swiper-slide">
												<?php srcset_image($_image); ?>
											<div class="project-attributes-container">
												<div class="project-title">
													<?php echo $_project_title; ?>
												</div>
												<div class="project-link">
													<a class="cta-button cta-button-alt" href="<?php echo $_link_to_project_url; ?>">
														View Project
													</a>
												</div>
											</div>
											</div>
											<?php
											}
										}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			break;
			/*---------------------------------------------------------------------------*/
			/* PROJECT SLUDER BLOCK INDIVIDUAL
			/*---------------------------------------------------------------------------*/
			case 'project_slider_block_home_individual';
			?>
			<div class="slider-container-home-individual section-<?php echo $count ?>">
				<div class="grid-container">
					<div class="grid-x">
						<div class="cell small-12">
							<div class="swiper-container-project-home-individual">
								<div class="swiper-wrapper">
									<?php
									  	$project = get_post_meta( $page_id, 'layouts_' . $count . '_project', true);
									    if($project){
									      	for( $i = 0; $i < $project; $i++ ){
										      	$_image = get_post_meta($page_id,'layouts_'.$count.'_project_'.$i.'_image',true);
										      	$_project_title = get_post_meta( $page_id, 'layouts_'.$count.'_project_'.$i.'_project_title', true);
										      	$_link_to_project = get_post_meta( $page_id, 'layouts_'.$count.'_project_'.$i.'_link_to_project', true);
												$_link_to_project_url = get_permalink($_link_to_project);
											?>
											<div class="swiper-slide">
												<?php srcset_image($_image); ?>
												<div class="project-attributes-container">
													<div class="project-title">
														<?php echo $_project_title; ?>
													</div>
													<div class="project-link">
														<a class="cta-button" href="<?php echo $_link_to_project_url; ?>">
															View Project
														</a>
													</div>
												</div>
											</div>
											<?php
											}
										}
									?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			break;
			/*---------------------------------------------------------------------------*/
			/* FULL WIDTH IMAGE
			/*---------------------------------------------------------------------------*/
			case 'full_width_image';
			// image
			$image = get_post_meta( $page_id, 'layouts_' . $count . '_image', true);
			?>
			<div class="full-width-image section-<?php echo $count ?>">
				<div class="grid-container">
					<div class="grid-x">
						<div class="cell small-12">
							<?php srcset_image($image); ?>
						</div>
					</div>
				</div>
			</div>
			<?php
			break;
			/*---------------------------------------------------------------------------*/
			/* TEXT CONTENT
			/*---------------------------------------------------------------------------*/
			case 'text_content';
			// text content
			$header = get_post_meta( $page_id, 'layouts_' . $count . '_header', true);
			$content = wpautop(get_post_meta( $page_id, 'layouts_' . $count . '_content', true));
			// link
			$link_text = get_post_meta( $page_id, 'layouts_' . $count . '_link_text', true);
			$link = get_post_meta( $page_id, 'layouts_' . $count . '_link', true);
			$link_url = get_permalink($link);
			?>
			<div class="text-content section-<?php echo $count ?>">
				<div class="grid-container">
					<div class="grid-x align-middle">
						<div class="cell small-12 large-6 large-offset-1 xlarge-5 xlarge-offset-2">
							<h2><?php echo $header; ?></h2>
							<?php echo $content; ?>
						</div>
						<div class="cell small-12 large-4 large-offset-1">
							<div class="tag-area">
								<div class="tags">
									<?php
										$posttags = get_the_tags();
											if ($posttags) {
											echo '<ul>';
											foreach($posttags as $tag) {
											echo '<li>' .$tag->name. '</li>'; 
										}
											echo '</ul>';
										}
									?>
								</div>
								<?php if(!empty($link)){ ?>
									<a class="cta-button cta-button-all" href="<?php echo $link; ?>">
										<?php echo $link_text; ?>
									</a>
									<a class="cta-button cta-button-alt cta-button-project" href="<?php echo $link; ?>" target="_blank">
										<?php the_title(); ?>
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			break;
			/*---------------------------------------------------------------------------*/
			/* NEW
			/*---------------------------------------------------------------------------*/
			case '';
			?>
			<?php
			break;
			/*---------------------------------------------------------------------------*/
			/* NEW
			/*---------------------------------------------------------------------------*/
			case '';
			?>
			<?php
			break;

			}

		}

	}

?>