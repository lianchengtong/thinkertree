<?php
/**
 * The template for displaying pages
 *
 * @package WordPress
 * @subpackage thinkertree
 * @since thinkertree 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="projects-list">

			<section class="projects-list__header">
				<div class="container">
					<div class="section-title projects-list__header--title row">
						<div class="col-xs-12">
							<h1>Our Works</h1>
						</div>
					</div><!-- .section-title.project__header--title.row -->
					<div class="row">
						<div class="col-xs-12">
							<ul class="project-filters">
								<li><button type="button" class="control" data-filter="all">All</button></li>
								<?php 
									$terms = get_terms('projects-category');
									foreach($terms as $term) {
										echo '<li><button type="button class="control" data-toggle=".' . $term->slug . '">' . $term->name . '</button></li>';
									}
        				?>
							</ul><!-- .project-filters -->
						</div><!-- .col-xs-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- .projects-list__header -->

			<section class="projects-list__content">
				<div class="container">
					<div class="projects-container row">
						<?php if ( have_posts() ) : ?>
							<?php while( have_posts() ) : the_post();

							$terms = get_the_terms($post->ID, 'projects-category');
						?>
							
							<!-- grab every category slugs related to the post and add them into the classes list -->
							<div class="col-xs-12 col-sm-6 mix <?php foreach($terms as $term) { echo $term->slug . ' '; } ?>">
								<a href="<?php the_permalink(); ?>"><img src="#" alt="" /></a>
								<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								<p><?php foreach($terms as $term) { echo $term->name . ' / '; } ?></p>
							</div><!-- .mix -->

						<?php
							endwhile;
						else:
						endif;
						?>
					</div>
				</div>
			</section>

		</div><!-- .projects-list -->

	</main><!-- #main.site-main -->
</div><!-- #primary.content-area -->

<?php get_footer(); ?>