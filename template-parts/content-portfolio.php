<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jnrmillwork
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-6 col-sm-6 col-md-4 col-lg-3 archive-content'); ?>>

	<div class="portfolio-container">
		<a href="<?php the_permalink(); ?>">
			<div class="project-image" style="background: url(<?php echo featured_image_url($post); ?>); background-size: cover; background-position: center; ">	
			</div> <!-- /.project-image -->
			<div class="portfolio-meta">

				<h4><?php the_title(); ?></h4>

			</div> <!-- /.portfolio-meta -->	
		</a>	
	</div>
	
	<footer class="entry-footer">
		<?php jnrmillwork_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
