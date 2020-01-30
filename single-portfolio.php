<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jnrmillwork
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?> 
				<?php while ( have_posts() ) : the_post(); ?> 
					<header class="portfolio-banner" style="background: url(<?php echo featured_image_url($post); ?>); background-size: cover; background-position: center;"> 

						<div class="container">
							<div class="row">
								<div class="col-12">
									<h2 class="section-title text-center"><?php the_title(); ?></h2>
								</div>
							</div>
						</div>
						
							<!-- display custom taxonomy -->
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

							
					</header>
					<div class="content">
						
					<?php  
						$images = get_field('gallery');
					?>

				
					<div class="container">
						<div class="row">
							<?php foreach($images as $image): ?>
								<div class="col-6 col-sm-6 col-md-4 col-lg-3 gallery-image-wrapper">
									<a href="<?php echo $image['url']; ?>" data-toggle="lightbox" data-gallery="example-gallery">
										<div class="gallery-image" style="background: url(<?php echo $image['url']; ?>); background-size: cover; background-position: center;"></div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					

						
					</div> <!-- /.content -->

				<?php endwhile; ?>	
			<?php endif; ?>

			
			<h4 class="text-center back-to-parent-page"><a href="<?php echo get_parent_permalink(); ?>">Back to Portfolio Page</a></h4>

			<?php get_template_part('template-parts/related-posts'); ?>


		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_template_part('template-parts/partial-contact'); ?>

<?php get_footer();
