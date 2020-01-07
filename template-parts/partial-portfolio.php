<?php $count = 3; ?>
<?php  

	if(is_front_page()){
		$count = 8;
	}else{
		$count = -1;
	}
?>

<?php  
	$portfolio = new WP_Query(array(
		'post_type'	=> 'portfolio',
		'posts_per_page'=> $count
	));

?>

<?php if ( $portfolio -> have_posts() ) : ?> 
	<div class="container">
		<div class="row">
			<?php while ( $portfolio -> have_posts() ) : $portfolio -> the_post(); ?> 
				<div class="portfolio-item col-12 col-sm-6 col-md-4 col-lg-3">
					<div class="project-image" style="background: url(<?php the_field('banner_image'); ?>); background-size: cover; background-position: center; ">
						
						<div class="portfolio-meta">
							<h4><?php the_title(); ?></h4>
							<?php the_category(); ?>
							
							<div class="right-chevron">
								<a href="<?php the_permalink(); ?>">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="51.75px" height="51.75px" viewBox="0 0 51.75 51.75" enable-background="new 0 0 51.75 51.75" xml:space="preserve">
									<g>
										<circle fill="#ffffff" cx="26" cy="25.875" r="25"/>
										<g>
											<polygon fill="#333333" points="26.562,35.369 26.509,12.895 45.998,24.084 		"/>
											<path fill="#333333" d="M31,19.534v8.557c0,0-14.708-2.317-21.929,8.558C9.071,36.648,7,18.553,31,19.534z"/>
										</g>
									</g>
									</svg>
								</a>							
							</div>
													



						</div>
												
					</div>

				</div>				
			<?php endwhile; ?>
		</div> <!-- /.row -->
	</div>	 <!-- /.container -->			
	<?php wp_reset_postdata(); ?>
<?php endif; ?>