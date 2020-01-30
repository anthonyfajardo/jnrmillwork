<?php 
	$social = new WP_Query(array(
		'pagename'	=> 'social-media'
	));
?>

<?php if ( $social->have_posts() ) : ?> 
	<?php while ( $social->have_posts() ) : $social->the_post(); ?>
		
		<?php if(have_rows('social_media_details')): ?>
			<?php while(have_rows('social_media_details')): the_row(); ?>

				<?php 
					$socName = get_sub_field('social_media_name'); 
					$socName = strtolower($socName);
				?>
				<a href="<?php the_sub_field('social_media_link'); ?>" class="social-media <?php echo $socName; ?>">
					<i class="fa <?php the_sub_field('social_media_icon'); ?> fa-2x"></i>
				</a>

			<?php endwhile; ?>
		<?php endif; ?>


	<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php else: ?>		
<?php endif; ?>