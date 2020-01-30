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
	<div class="container portfolio-wrapper">


		<!-- CATEGORY SELECTOR -->
		<?php if(!is_front_page()): ?>
			<div class="row"> 
				<?php 
					$selectors = array(); 
				?>

				<?php while($portfolio->have_posts()): $portfolio-> the_post(); ?>

					<div>
						<?php 
							// FETCH ALL TAXONOMY FOR THE CUSTOM POST TYPE 
							$terms = get_the_terms($post->ID, 'portfolio_category'); 
							if($terms){
								foreach($terms as $term){
									$name = $term->name;
									$selectors[] = $name;
								}								
							}
						?>
					</div>			
				<?php endwhile; ?>

				<?php $selectors = array_unique($selectors); ?>

				<?php if($selectors): ?>
					<div class="button-group filter-button-group">
						<!-- ADD A BUTTON FOR SHOWING ALL PROJECTS -->
						<button data-filter="*">All Projects</button>
					
						<?php foreach($selectors as $selector): ?>
							<?php 
								$selectorUrl = preg_replace('/\s/', '', $selector); 
								$selectorUrl = strtolower($selectorUrl);
							?>
							<button data-filter="<?php echo ' .'.$selectorUrl; ?>"><?php echo $selector; ?></button>
						<?php endforeach; ?>	
						
					</div>		
				<?php endif; ?>

			</div> <!-- /.row -->
		<?php endif; ?>

		<!-- SET CONTAINER WITH CLASS OF 'GRID'  -->
		<div class="row grid">

			<?php while ( $portfolio -> have_posts() ) : $portfolio -> the_post(); ?> 

				<?php  
					// FETCH ALL TAXONOMY TERMS AGAIN TO DISPLAY SPECIFIC TAXONOMY FOR EACH CUSTOM POST
					$portfolioTerms = get_the_terms($post->ID, 'portfolio_category'); 
				?>
				
					<?php  
						// DISPLAY PARTIAL DIV WITH CLASS 'portfolio-item' BUT DO NOT CLOSE THE DIV
						echo '<div class="portfolio-item col-6 col-md-4 col-lg-3 ';

						if($portfolioTerms){
						// LOOP TO DISPLAY THE CUSTOM POST TAXONOMY AS CLASS, ALL SPACES ARE REMOVED AND SET TO LOWER CASE TO ENSURE NO ISSUES WITH SPACES
							foreach($portfolioTerms as $term){
								$name = $term->name;
								$catName = strtolower($name);
								$catName = preg_replace('/\s/', '', $catName);
								$catName = $catName;
								// echo '.'.$name.' ';
								echo $catName.' ';
							}
						}

						// CLOSE THE DIV
						echo '">';
					?>

					<a href="<?php the_permalink(); ?>" class="portfolio-link">
						<div class="portfolio-container">
						<div class="project-image" style="background: url(<?php echo featured_image_url($post); ?>); background-size: cover; background-position: center; ">	

						</div> <!-- /.project-image -->

						<div class="portfolio-meta">

							<h4><?php the_title(); ?></h4>

							<?php //THIS IS TO DISPLAY THE CUSTOM TAXONOMY WITH LINKS ON EACH CUSTOM POST ?>
							<div class="portfolio-category">

								<?php
								$taxonomy = 'portfolio_category';

								// get the term IDs assigned to post.
								$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
								// separator between links
								$separator = ', ';

								if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

								   $term_ids = implode( ', ' , $post_terms );
								   $terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
								   $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

								    // display post categories
								 echo  $terms;
								}
								?>
								
							</div> <!-- /.portfolio-category -->

						
							<!-- <div class="right-chevron">
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
							</div> --> <!-- /.right-chevron -->

						</div> <!-- /.portfolio-meta -->	
						</div>						

					</a>

				</div>	<!-- /.portfolio-item -->
			<?php endwhile; ?>
		</div> <!-- /.row -->
	</div>	 <!-- /.container -->			
	<?php wp_reset_postdata(); ?>
<?php endif; ?>