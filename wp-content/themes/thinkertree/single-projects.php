<?php
/**
 * The template for displaying CUSTOM PROJECT POST Page
 *
 *
 * @package WordPress
 * @subpackage thinkertree
 * @since thinkertree 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		<?php 
			$color = get_field('primary_color');
			$main_image = get_field('project_main_image');
			$main_image_thumb = $main_image['sizes']['bgimage-small'];
			$main_image_alt = $main_image["alt"];
			$summary = get_field('project_summary');
			$concept = get_field('project_concept');
			$services = get_field('services');
			$url = get_field('project_url');
		?>

		<div class="project">

			<section class="project__header">
				<div class="project__header--bg" style="background-color: <?php echo $color; ?>"></div>
				<div class="container">
					<div class="section-title project__header--title row">
						<div class="col-xs-12">
							<h1><?php the_title(); ?></h1>
						</div>
					</div><!-- .section-title.project__header--title -->
					<div class="project__header--image row">
						<div class="col-xs-12">
							<img src="<?php echo $main_image_thumb; ?>" alt="<?php echo $main_image_alt; ?>">
						</div>
					</div><!-- .project__header--image -->
				</div><!-- .container -->
			</section><!-- .project__header -->

			<section class="project__overview">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<a href="<?php echo $url ?>" class="btn btn-primary" style="background-color: <?php echo $color; ?>">Visit the site</a>
						</div><!-- .col-xs-12 -->
					</div><!-- .row -->
					<div class="row">
						<div class="project__overview--concept project__overview--col col-xs-12 col-sm-8">
							<h4>Concept</h4>
							<div><?php echo $concept; ?></div>
						</div>
						<div class="project__overview--services project__overview--col col-xs-12 col-sm-4">
							<h4>Service Provided:</h4>
							<?php echo $services; ?>
						</div><!-- .project__overview--tools -->
					</div>
				</div><!-- .container -->
			</section><!-- .project__overview -->

			<?php if(have_rows('project_layouts')) :
				while(have_rows('project_layouts')) : the_row();
			?>

				<?php if(get_row_layout() == 'descriptive_layout'): ?>

					<?php get_template_part( 'partials/projects/project', 'descriptivelayout' ); ?>

				<?php elseif(get_row_layout() == 'screenshots_layout'): ?>

					<?php get_template_part( 'partials/projects/project', 'screenshotslayout' ); ?>

			<?php
					endif;
				endwhile;
			else:
			endif;
			?>

		</div><!-- .project -->

	</main><!-- #main.site-main -->
</div><!-- #primary.content-area -->

<?php get_footer(); ?>