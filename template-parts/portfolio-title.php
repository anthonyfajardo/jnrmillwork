<?php  
	
	$portfolio = new WP_Query(array(
		'pagename'	=> 'home'
	));

?>

<?php if ( $portfolio->have_posts() ) : ?> 
	<?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>

		<?php if(have_rows('section')): ?>
			<?php while(have_rows('section')): the_row();?>

				<?php if(get_row_layout() == 'portfolio'): ?>
					<div class="container portfolio-title">
						<div class="row">
							<div class="col-12 text-center">
								<h1 class="section-title">
									<?php the_sub_field('portfolio_title'); ?>
								</h1>
							</div>
						</div>
					</div>
				<?php endif; ?>


			<?php endwhile; ?>
		<?php endif; ?>



	<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php else: ?>		
<?php endif; ?>