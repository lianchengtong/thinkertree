<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage thinkertree
 * @since thinkertree 1.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title><?php wp_title('|', true, 'right'); ?></title>

	<!-- FAVIVONS -->

	<!-- END FAVICONS -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	    	<!-- <label>MENU</label> -->
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">
	      	<img src="<?php echo get_template_directory_uri(); ?>/images/logo-thinkertree.png" alt="Thinker Tree Studio Logo" />
	      </a>
	    </div><!-- .navbar-header -->

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse navbar-right" id="main-menu">
	      <?php
	      	$nav_args = array(
	      		'theme_location' => 'main_menu',
		    		'container' => 'div',
		    		'container_class' => 'navbar-nav-container',
		    		'menu_class' => 'nav navbar-nav'
	      	);
	      	wp_nav_menu($nav_args);
	      ?>
	    </div><!-- /.navbar-collapse -->
		</div><!-- .container -->
	</nav>