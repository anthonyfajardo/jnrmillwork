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

			<header>
				<?php $image = featured_image_url($post); ?>
				image<?php dump($image); ?>
			</header>

		<div class="container">
			<div class="row">
				<div class="col-12 text-center section-title">
					<h2>Projects</h2>
				</div>
			</div>
		</div>

		<div class="portfolio-section">
			<?php get_template_part('template-parts/partial-portfolio'); ?>	
		</div>

		<?php get_template_part('template-parts/partial-contact'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
