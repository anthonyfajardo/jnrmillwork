<?php  
	$contact = new WP_Query(array(
		'pagename'	=> 'contact'
	));
?>

<?php if ( $contact->have_posts() ) : ?> 
	<?php while ( $contact->have_posts() ) : $contact->the_post(); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-12">
					<h1 class="text-center section-title"><?php the_title(); ?></h1>
				</div>
			</div>			
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12">
					<div class="google-maps section">
						<?php the_field('google_maps_embed_link'); ?>
					</div>					
				</div>
			</div>
		</div>

		<?php  
			$leftSection = get_field('left_section'); 
			$rightSection = get_field('right_section');
		?>


		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6 left-contact-section">
					<?php if($leftSection['section_content'] == 'Contact Form'): ?>
						<?php $form = $leftSection['contact_form']; ?>
						<?php echo do_shortcode($form); ?>
					<?php elseif($leftSection['section_content'] == 'Contact Info'): ?>
						
						<div class="address"> <h3>Address: </h3><?php echo $leftSection['address']; ?> </div>
						<div class="email"> <h3>E-mail: </h3><?php echo $leftSection['email']; ?> </div>
						<div class="phone"> <h3>Phone Number: </h3><?php echo $leftSection['phone_number']; ?> </div>
						<div class="fax"> <h3>Fax Number: </h3><?php echo $leftSection['fax_number']; ?> </div>
						<h2><?php echo $leftSection['contact_page_tagline']; ?></h2>

					<?php endif; ?>
				</div> <!-- /.left-contact-section -->

				<div class="col-12 col-sm-12 col-md-6 right-contact-section">
					<?php if($rightSection['section_content'] == 'Contact Form'): ?>
						<?php $form = $rightSection['contact_form']; ?>
						<?php echo do_shortcode($form); ?>
					<?php elseif($rightSection['section_content'] == 'Contact Info'): ?>
						<div class="address"> <h3>Address: </h3><?php echo $rightSection['address']; ?> </div>
						<div class="email"> <h3>E-mail: </h3><?php echo $rightSection['email']; ?> </div>
						<div class="phone"> <h3>Phone Number: </h3><?php echo $rightSection['phone_number']; ?> </div>
						<div class="fax"> <h3>Fax Number: </h3><?php echo $rightSection['fax_number']; ?> </div>
						<h2><?php echo $leftSection['contact_page_tagline']; ?></h2>
					<?php endif; ?>					
				</div> <!-- /.right-contact-section -->
			</div>
			
				
			</div>
		</div>
	<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php else: ?>		
<?php endif; ?>