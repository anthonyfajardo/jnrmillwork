<?php  

	$customTaxonomyTerms = wp_get_object_terms( $post->ID, 'portfolio_category', array('fields' => 'ids'));

	$args = array(
		'post_type'	=> 'portfolio',
		'post_status'	=> 'publish', 
		'posts_per_page'	=> 5,
		'orderby'	=> 'rand',
		'tax_query'	=> array(
			array(
				'taxonomy'	=> 'portfolio_category',
				'field'	=> 'id',
				'terms'	=> $customTaxonomyTerms
			)
		),
		'post__not_in'	=> array($post->ID),
	);

?>

<?php  
	$relatedPosts = new WP_Query($args);
?>

<?php if ( $relatedPosts->have_posts() ) : ?> 
	<div class="container related-wrapper">
		<h2 class="related-title">Related Portfolios</h2>
		<div class="row">
		<?php while ( $relatedPosts->have_posts() ) : $relatedPosts->the_post(); ?>

			<div class="col-6 col-sm-6 col-md-4 col-lg-3 related-post">
	
				<a href="<?php the_permalink(); ?>" class="related-category-link">
						<div class="related-post-image" style="background: url(<?php echo featured_image_url($post); ?>); background-size: cover; background-position: center; ">
							<div class="related-post-meta">
								<h3 class="text-center"><?php the_title(); ?></h3>

							</div> <!-- /.related-post-meta -->							
						</div> <!-- /.related-post-image -->
				</a>

			</div>
			
		<?php endwhile; ?>
		</div>
	</div>
		<?php wp_reset_postdata(); ?>
	<?php else: ?>		
<?php endif; ?>