<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage thinkertree
 * @since thinkertree 1.0
 */

?>
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-7">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-thinkertree-black.png" alt="Thinker Tree Studio logo" />
					<div class="footer-copy">
						<?php the_field('footer_copy', 'option') ?>
					</div><!-- .footer-copy -->
				</div>
				<div class="col-xs-12 col-sm-5">
					<h4><?php the_field('social_title', 'option'); ?></h4>
					<?php if( have_rows('social_media', 'option') ) : ?>
						<ul class="social-list">
						<?php while( have_rows('social_media', 'option') ) : the_row(); 
							$media = get_sub_field('social_media_list');
							$url = get_sub_field('social_media_url');
							$title = get_sub_field('social_media_title');
						?>
							<li>
								<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
									<i class="fa <?php echo $media; ?>" aria-hidden="true"></i>
								</a>
							</li>
						<?php endwhile; ?>
						</ul><!-- .social-list -->
					<?php endif; ?>
					<p class="copyrights-copy"><?php the_field('copyrights_copy', 'option') ?></p>
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</footer>

	<?php wp_footer(); ?>

</body>
</html>