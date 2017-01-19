<?php
/**
*
* @package Wordpress
* @subpackage thinkertree
* @since thinkertree 1.0
*/

	$title = get_sub_field('section_title');
?>

<section class="project__descriptive">
	<div class="container">
		<div class="section-title row">
			<div class="col-xs-12">
				<h2><?php echo $title; ?></h2>
			</div><!-- .col-xs-12 -->
		</div><!-- .section-title.row -->
		
		<?php if( have_rows('section_content') ) :
			while( have_rows('section_content') ) : the_row();

			$image = get_sub_field('content_image');
			$image_thumb = $image['sizes']['fullwidth'];
			$image_alt = $image["alt"];
			$title = get_sub_field('content_title');
			$text = get_sub_field('content_text');
		?>

		<div class="row">
			<div class="col-xs-12">
				<img src="<?php echo $image_thumb; ?>" alt="<?php echo $image_alt; ?>">
			</div><!-- .col-xs-12 -->
			<div class="col-xs-12 col-sm-4">
				<h4><?php echo $title; ?></h4>
			</div><!-- .col-xs-12.col-sm-4 -->
			<div class="col-xs-12 col-sm-8">
				<?php echo $text; ?>
			</div><!-- .col-xs-12.col-sm-8 -->
		</div><!-- .row -->

		<?php
			endwhile;
		else:
		endif; ?>

	</div><!-- .container -->
</section><!-- .project__descriptive -->