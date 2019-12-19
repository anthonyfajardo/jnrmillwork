<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jnrmillwork
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(have_rows('section')): ?>
		<?php while(have_rows('section')): the_row(); ?>

			<?php $section_id = get_sub_field('section_id'); ?>

			<?php if($section_id): ?>
				<div id="<?php echo $section_id; ?>" class="<?php echo get_row_layout().'-section'; ?> section" style="border: 5px solid red;">
					<h1>the section id is <?php echo $section_id; ?></h1>
			<?php else: ?>
				<div class="<?php echo get_row_layout().'-section'; ?> section" style="border: 5px solid red;">
			<?php endif; ?>


				<?php if(get_row_layout() == 'content_editor'): ?>
					<h1>This is the <strong><?php echo get_row_layout(); ?></strong></h1>
					<div class="content-wysiwyg">
						<?php the_sub_field('content_wysiwyg'); ?>
					</div>
				<?php elseif(get_row_layout() == 'banner'): ?>
					<?php $banner = get_sub_field('banner_sections'); ?>
					<?php foreach($banner as $banner): ?>
						<?php if($banner == 'background_image'): ?>
							<?php if(have_rows('banner_background')): ?>
								<?php while(have_rows('banner_background')): the_row(); ?>


									<?php $image = get_sub_field('banner_image'); ?> 
									<div class="banner-section" style="background: url(<?php echo $image; ?>); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100vw; height: 100vh; display: flex; justify-content: center; align-items: center; ?>">
										<div class="tagline">
											<h1 style="color: white; text-align: center; text-shadow: 2px 2px 1px black; font-size: 70px;">
												A Fully Integrated<br>
												Custom Millwork <br>
												Provider
											</h1>
										</div>
									</div>

									
									<?php if(get_sub_field('banner_width') == 'full'): ?>
										<h3>banner width is full</h3>
									<?php elseif(get_sub_field('banner_width') == 'contained'): ?>
										<h3>banner width is contained</h3>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						<?php elseif($banner == 'tagline'): ?>
							<h3>tagline found!</h3>
						<?php elseif($banner == 'call_to_action'): ?>
							<h3>CTA found!</h3>
						<?php endif; ?>
					<?php endforeach; ?>

				<?php elseif(get_row_layout() == 'instagram_section'): ?>
					<h1>This is the <strong><?php echo get_row_layout(); ?></strong></h1>
				<?php elseif(get_row_layout() == 'clients'): ?>
					<h1>This is the <strong><?php echo get_row_layout(); ?></strong></h1>
				<?php elseif(get_row_layout() == 'services'): ?>
					<h1>This is the <strong><?php echo get_row_layout(); ?></strong></h1>
				<?php elseif(get_row_layout() == 'portfolio'): ?>
					<h1>This is the <strong><?php echo get_row_layout(); ?></strong></h1>
				<?php elseif(get_row_layout() == '2_column_section'): ?>
					<h1>This is the <strong><?php echo get_row_layout(); ?></strong></h1>
				<?php elseif(get_row_layout() == 'profile_section'): ?>
					<h1>This is the <strong><?php echo get_row_layout(); ?></strong></h1>
				<?php endif; ?>

				
			</div> <!-- /.section -->


		<?php endwhile; ?>
	<?php endif; ?>


	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'jnrmillwork' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
