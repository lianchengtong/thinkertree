<?php
/**
*
* @package Wordpress
* @subpackage thinkertree
* @since thinkertree 1.0
*/

	$title = get_sub_field('section_title');
?>

<section class="project__screenshots">
	<div class="container">
		<div class="section-title row">
			<div class="col-xs-12">
				<h2><?php echo $title; ?></h2>
			</div><!-- .col-xs-12 -->
		</div><!-- .section-title.row -->

		<?php if( have_rows('section_content') ) :
			while( have_rows('section_content') ) : the_row();
		?>

			<?php if(get_row_layout() == 'testimonial'): ?>
				
				<div class="testimonial row">
					<div class="col-xs-12">
						<p class="testimonial__quote"><?php echo get_sub_field('testimonial_content'); ?></p>
						<p class="testimonial__name"><?php echo get_sub_field('testimonial_name'); ?></p>
						<p class="testimonial__pos"><?php echo get_sub_field('testimonial_position'); ?></p>
					</div><!-- .col-xs-12 -->
				</div><!-- .testimonial.row -->

			<?php elseif(get_row_layout() == 'images'): ?>

				<div class="screenshot row">
					<div class="col-xs-12">
						<img src="<?php echo get_sub_field('image')['sizes']['fullwidth']; ?>" alt="<?php echo get_sub_field('image')['alt'] ?>">
					</div><!-- .col-xs-12 -->
				</div><!-- .screenshot.row -->

		<?php
				endif;
			endwhile;
		else:
		endif; ?>

	</div><!-- .container -->
</section><!-- .project__screenshots -->