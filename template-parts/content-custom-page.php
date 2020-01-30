<?php
/**
	* Template part for displaying page content in page.php
	*
	* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	*
	* @package jnrmillwork
	*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if(have_rows('section')): ?>
		<?php while(have_rows('section')): the_row(); ?>
		
			<?php 
				$sectionId = get_sub_field('section_id'); 
				// $sectionId = str_replace('_', '', $sectionId);
				$sectionId = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $sectionId));
				
			?>
			


			<?php if($sectionId): ?>
				<div id="<?php echo $sectionId; ?>">
			<?php endif; ?>


			<?php
				/* Content Editor / Wysiwyg Section */ 
				if(get_row_layout() == 'content_editor'): 
			?>
			
				<div class="section">
					<div class="container">
						<div class="row">
							<?php the_sub_field('content_wysiwyg'); ?>
						</div>
					</div>								
				</div>

			<?php /* Banner Section */
				elseif(get_row_layout() == 'banner'): ?>
				
				<?php $bannerSections = get_sub_field('banner_sections');?>

				<?php foreach($bannerSections as $bannerSection): ?>

					<?php  
						if($bannerSection == 'background_image'){
							$bannerBg = get_sub_field('banner_background');
							if($bannerBg){
								$bannerImage = $bannerBg['banner_image'];
								$bannerWidth = $bannerBg['banner_width'];
							}
						}elseif($bannerSection == 'tagline'){
							$bannerTagline = get_sub_field('banner_tagline');
							if($bannerTagline){
								$bannerTag = $bannerTagline['tagline'];
								$bannerJust = $bannerTagline['tagline_justification'];
								$bannerColor = $bannerTagline['font_color'];
								$taglineWidth = $bannerTagline['tagline_width'];
							}
						}elseif($bannerSection == 'call_to_action'){
							$ctaParts = get_sub_field('call_to_action');
							if($ctaParts){
								$buttonText = $ctaParts['button_text'];
								$buttonLink = $ctaParts['link'];
								$buttonPosition = $ctaParts['call_to_action_position'];
								$buttonBg = $ctaParts['button_background'];
								$buttonTextColor = $ctaParts['button_text_color'];
							}
						}
					?>
						
				<?php endforeach; ?>



				<header class="<?php echo $bannerWidth; ?> banner" style="background: url(<?php echo $bannerImage; ?>); background-size: cover; background-position: center;">
					
					<div class="<?php echo $taglineWidth; ?> tagline-container" >

						<?php if($bannerTagline): ?>
							<h1 class="tagline animated fadeInUp" style="color: <?php echo $bannerColor; ?>; text-align: <?php echo $bannerJust; ?>"><?php echo $bannerTag; ?></h1>
						<?php endif; ?>

						<?php if($ctaParts): ?>

							<div class="banner-button" style="width: 100%; text-align: <?php echo $buttonPosition; ?> ">
								<a href="<?php echo $buttonLink; ?>" style="padding: 0.5em 1em; background: <?php echo $buttonBg; ?>; color: <?php echo $buttonTextColor; ?>; "><?php echo $buttonText; ?></a>	
							</div>
						<?php endif; ?>

					</div> <!-- /.tagline-container -->
				</header>


			<?php /* Services Section */
				elseif(get_row_layout() == 'services'): ?>
				<?php  
					$title = get_sub_field('service_section_title');

				?>

				<div class="container section">
					<div class="row">
						<div class="col-12 text-center">
							<h2 class="section-title"><?php echo $title ?></h2>
						</div>
					</div>
					
					
					<?php if(have_rows('service')): ?>
						<div class="row">
							<?php while(have_rows('service')): the_row(); ?>
								
								<?php  
									$serviceTitle = get_sub_field('title');
									$image = get_sub_field('image');
									$serviceContent = get_sub_field('description');
								?>								

								
								
								<div class="col-12 col-md-6 col-lg-4 service">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="image-fluid service-image">
									<h3 class="service-title"><?php echo $serviceTitle; ?></h3>
									<div class="service-content">
										<?php echo $serviceContent; ?>
									</div>
								</div>

						

							<?php endwhile; ?>
						</div>
					<?php endif; ?>
					
				</div>


			<?php /*  TWO COLUMN SECTION  */
				elseif(get_row_layout() == 'two_column_section'): ?>
				<?php  
					$leftSection = get_sub_field('left_section');
					$rightSection = get_sub_field('right_section');
					$sectionWidth = get_sub_field('section_width');
				?>
				
				
				<div class="container section">

					<div class="row two-column-section">
							
							<?php /*LEFT SECTION*/  ?>
							<div class="left-section col-12 col-sm-12 col-lg-6 order-last order-lg-first">

								<!-- Text Section -->
								<?php if($leftSection['section_content'] == 'text'): ?>
							
									<div class="text-section">

										<div class="text-wrapper">
											<h2 class="underline-left"><?php echo $leftSection['title']; ?></h2>

											<div class="content">
												<p><?php echo $leftSection['content']; ?></p>
												<?php if($leftSection['call_to_action']['call_to_action_link'] && $leftSection['call_to_action']['button_text']): ?>
													<a class="btn" href="<?php echo $rightSection['call_to_action']['call_to_action_link']; ?>"><?php echo $leftSection['call_to_action']['button_text']; ?></a>
												<?php endif; ?>
											</div>
										</div>

									</div>
								
								<!-- Image Section -->
								<?php elseif($leftSection['section_content'] == 'image'): ?>

									<div class="image-wrapper" style="position: relative;">
										<div class="image-section"  style="background: url(<?php echo $leftSection['background_image']; ?>); background-size: cover; background-position: center; background-attachment: <?php echo $leftSection['background_property']; ?>; position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></div>
									</div> <!-- /.image-wrapper -->


								<?php endif; ?>
							</div>

							
							<?php /*RIGHT SECTION*/  ?>
							<div class="right-section col-12 col-sm-12 col-lg-6"> 

								<!-- Text Section -->
								<?php if($rightSection['section_content'] == 'text'): ?>

									<div class="text-section">
										
										<div class="text-wrapper">
											<h2 class="underline-left"><?php echo $rightSection['title']; ?></h2>

											<div class="content">
												<p><?php echo $rightSection['content']; ?></p>	
												<?php if($rightSection['call_to_action']['call_to_action_link'] && $rightSection['call_to_action']['button_text']): ?>
													<a class="btn btn-primary" href="<?php echo $rightSection['call_to_action']['call_to_action_link']; ?>"><?php echo $rightSection['call_to_action']['button_text']; ?></a>
												<?php endif; ?>
											</div>
										</div>

									</div>

								<!-- Image Section -->
								<?php elseif($rightSection['section_content'] == 'image'): ?>
									
									<div class="image-wrapper" style="position: relative;">
										<div class="image-section"  style="background: url(<?php echo $rightSection['background_image']; ?>); background-size: cover; background-position: center; background-attachment: <?php echo $rightSection['background_property']; ?>; position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></div>
									</div> <!-- /.image-wrapper -->

								<?php endif; ?>					
							</div>
					</div>
				</div>


			<?php /* PORTFOLIO SECTION */
				elseif(get_row_layout() == 'portfolio'): ?>
				<div class="portfolio-section section">

					<div class="container portfolio-title">
						<div class="row">
							<div class="col-12 text-center">
								<h2 class="section-title"><?php the_sub_field('portfolio_title'); ?></h2>
								<?php 
									if(get_sub_field('portfolio_description')){
										echo '<p>'.get_sub_field('portfolio_description').'</p>';
									}
								?>
							</div>
						</div>
					</div>

					
					<?php get_template_part('template-parts/partial-portfolio'); ?>

					<div class="container">
						<div class="portfolio-button">
							<a href="<?php the_sub_field('portfolio_link'); ?>" class="btn btn-primary portfolio-page-button"><?php the_sub_field('button_text'); ?></a>
						</div>						
					</div>					
				</div>


			<?php /* CLIENTS SECTION */
				elseif(get_row_layout() == 'clients'): ?>
	
				<div class="clients-section section">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-5 col-lg-4" style="display: flex; justify-content: center; align-items: flex-start; flex-direction: column;">
								<h2 class="underline-left"><?php the_sub_field('clients_title'); ?></h2>
								<p><?php the_sub_field('clients_description'); ?></p>
							</div>
							<div class="col-12 col-sm-12 col-md-7 col-lg-8">
								<div class="row">
									
										<?php $images = get_sub_field('client_logo_gallery'); ?>
										<?php if($images): ?>

											<?php foreach($images as $image): ?>
												<div class="col-6 col-sm-6 col-md-3 client" >
													<div class="image" style="background: url(<?php echo $image; ?>); background-size: contain; background-position: center; width: 75%; height: 0; padding-top: 100%; background-repeat: no-repeat;">
														
													</div>
												</div>
											<?php endforeach; ?>

										<?php endif; ?>

								</div>
							</div>
							
						</div>
					</div>

				</div>


			<?php /* PROFILE SECTION */
				elseif(get_row_layout() == 'profile_section'): ?>

				<?php  
					$leftSection = get_sub_field('left_section');
					$rightSection = get_sub_field('right_section');				
				?>

				<div class="container section">
					<div class="row">
						<?php if($leftSection['section_content'] == 'image'): ?>
							<div class="col-12 col-sm-12 col-md-6 col-lg-5 profile-image left-image">
								<?php if($leftSection['image']): ?>
									<div class="image" style="background: url(<?php echo $leftSection['image']; ?>); background-size: cover; background-position: center;"></div>
								<?php else: ?>
									<div class="image" style="width: 100%; height: 0; padding-top: 120%; background: #cccccc;"></div>
								<?php endif; ?>
							</div>
						<?php elseif($leftSection['section_content'] == 'text'): ?>
							<div class="col-12 col-sm-12 col-md-6 text-right profile-content left-text">
								<h1><?php echo $leftSection['name']; ?></h1>
								<h3><?php echo $leftSection['position']; ?></h3>
								<p><?php echo $leftSection['description']; ?></p>
							</div>
						<?php endif; ?>

						<?php if($rightSection['section_content'] == 'image'): ?>
							<div class="col-12 col-sm-12 col-md-6 col-lg-5 profile-image right-image">
								<div class="image" style="background: url(<?php echo $rightSection['image']; ?>); background-size: cover; background-position: center;"></div>
							</div>
						<?php elseif($rightSection['section_content'] == 'text'): ?>
							<div class="col-12 col-sm-12 col-md-6 profile-content right-text">
									<h1><?php echo $rightSection['name']; ?></h1>
									<h3><?php echo $rightSection['position']; ?></h3>
									<p><?php echo $rightSection['description']; ?></p>
							</div>
						<?php endif; ?>
					</div>
				</div>

			<?php /* INSTAGRAM SECTION */
				elseif(get_row_layout() == 'instagram_section'): ?>
				<div class="container">	
					<div class="instagram-section">
						<?php $instagram = get_sub_field('instagram_shortcode'); ?>
						<?php echo do_shortcode($instagram); ?>
					</div>
				</div>


			<?php endif; ?>

		</div> <?php /* /.section ID */ ?>



		<?php endwhile; ?>
	<?php endif; ?>



	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'jnrmillwork' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
