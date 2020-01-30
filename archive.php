<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jnrmillwork
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="portfolio-banner" style="background: url(<?php echo featured_image_url($post); ?>); background-size: cover; background-position: center;"> 
				<div class="container portfolio-title">
					<div class="row">
						<div class="col-12 text-center">
							<h3 class="section-title"><?php echo jnrmillwork_archive_title($post); ?></h3>
						</div>
					</div>
				</div>
			</header>


			<div class="container">
				<div class="row">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */

						
						get_template_part( 'template-parts/content', get_post_type() );
						

					endwhile;

					the_posts_navigation();

					

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div> <!-- /.row -->
		</div> <!-- /.container -->

		<?php echo '<h4 class="text-center back-to-parent-page"><a href="'.get_parent_permalink().'">Back to Portfolio Page</a></h4>'; ?>


		<?php get_template_part('template-parts/partial-contact'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
