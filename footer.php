<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jnrmillwork
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="footer-left footer">
				<p>Copyright &copy <?php echo get_the_date('Y'); ?> by JNR Millwork</p>
			</div>
			<div class="footer-center footer">
				<?php get_template_part('template-parts/partial-social-media'); ?>
			</div>
			<div class="footer-right footer">
				<p>Website Developed by <a href="https://anthonyfajardo.com">Anthony Fajardo</a></p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
