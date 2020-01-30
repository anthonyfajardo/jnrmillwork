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

<?php  
	$portfolioImage = new WP_Query(array(
		'pagename'	=> 'portfolio'
	));
?>

<?php if ( $portfolioImage->have_posts() ) : ?> 
	<?php while ( $portfolioImage->have_posts() ) : $portfolioImage->the_post(); ?>
		<?php $banner = featured_image_url($post); ?>
	<?php endwhile; ?>	
<?php endif; ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">


		<header class="portfolio-banner" style="background: url(<?php echo $banner; ?>); background-size: cover; background-position: center;"> 
			<?php get_template_part('template-parts/portfolio-title'); ?>
		</header>


		<div class="portfolio-section">
			<?php get_template_part('template-parts/partial-portfolio'); ?>	
		</div>

		<h4 class="text-center back-to-parent-page"><a href="<?php echo get_home_url(); ?>">Back to the Main Page</a></h4>

		<?php get_template_part('template-parts/partial-contact'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
