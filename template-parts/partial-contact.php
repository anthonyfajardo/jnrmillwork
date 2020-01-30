<?php  
	$contact = new WP_Query(array(
		'pagename'	=> 'contact'
	));
?>

<?php if(is_page('contact')): ?>
	<!-- <?php $pageMargin = 'contact-margin-top'; ?> -->
<?php endif; ?>

<?php if ( $contact->have_posts() ) : ?> 
	<?php while ( $contact->have_posts() ) : $contact->the_post(); ?>
		<div class="container contact-section-wrapper <?php echo $pageMargin; ?>">
				<div class="section-title">
					<h2 class="text-center"><?php the_title(); ?></h2>
				</div>				
			<div class="row section">
				<div class="col-12 col-sm-12 col-md-12 google-maps">		
					<?php the_field('google_maps_embed_link'); ?>
				</div>
			</div>
		</div>

		<?php  
			$leftSection = get_field('left_section'); 
			$rightSection = get_field('right_section');
		?>


		<div class="container">
			<div class="row contact-wrapper">
				<div class="col-12 col-sm-12 col-md-6 left-contact-section">
					<?php if($leftSection['section_content'] == 'Contact Form'): ?>
						<?php $form = $leftSection['contact_form']; ?>
						<?php echo do_shortcode($form); ?>
					<?php elseif($leftSection['section_content'] == 'Contact Info'): ?>
						<div class="contact-container">
							<div class="address contact-line"> <h2>Address: </h2><?php echo $leftSection['address']; ?> </div>
							<div class="email contact-line"> <span>E-mail: </span><?php echo $leftSection['email']; ?> </div>
							<div class="phone contact-line"> <span>Phone Number: </span><?php echo $leftSection['phone_number']; ?> </div>
							<div class="fax contact-line"> <span>Fax Number: </span><?php echo $leftSection['fax_number']; ?> </div>
						</div> <!-- /.contact-container -->

						<h4 class="contact-tagline"><?php echo $leftSection['contact_page_tagline']; ?></h4>
						<?php get_template_part('template-parts/partial-social-media'); ?>

					<?php endif; ?>
				</div> <!-- /.left-contact-section -->

				<div class="col-12 col-sm-12 col-md-6 right-contact-section">
					<?php if($rightSection['section_content'] == 'Contact Form'): ?>
						<?php $form = $rightSection['contact_form']; ?>
						<?php echo do_shortcode($form); ?>
					<?php elseif($rightSection['section_content'] == 'Contact Info'): ?>
						<div class="contact-container">
							<div class="address contact-line"> <h2>Address: </h2><?php echo $rightSection['address']; ?> </div>
							<div class="email contact-line"> <span>E-mail: </span><?php echo $rightSection['email']; ?> </div>
							<div class="phone contact-line"> <span>Phone Number: </span><?php echo $rightSection['phone_number']; ?> </div>
							<div class="fax contact-line"> <span>Fax Number: </span><?php echo $rightSection['fax_number']; ?> </div>
						</div> <!-- /.contact-container -->

						<h4 class="contact-tagline"><?php echo $leftSection['contact_page_tagline']; ?></h4>
						<?php get_template_part('template-parts/partial-social-media'); ?>

					<?php endif; ?>					
				</div> <!-- /.right-contact-section -->
			</div>
			
				
			</div>
		</div>
	<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php else: ?>		
<?php endif; ?>