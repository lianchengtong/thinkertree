<?php

	/* ------ ENQUEUE STYLESHEETS AND SCRIPTS ------ */
	function thinkertree_scripts_styles_setup() {
		global $wp_styles;

		//CSS QUEUES
		wp_enqueue_style('font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), '4.6.3');
		wp_enqueue_style('main_css', get_template_directory_uri() . '/stylesheets/styles.css', array(), '1.0.0' );

		//JS QUEUES
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');  
		wp_enqueue_script('jquery');

		wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/javascripts/bootstrap.min.js', 'jquery', '3.3.6', true);
		wp_enqueue_script('matchHeight_js', get_template_directory_uri() . '/javascripts/jquery.matchHeight.js', 'jquery', '1.0.0', true);
		wp_enqueue_script('main_js', get_template_directory_uri() . '/javascripts/main.js', 'jquery', '1.0.0', true);

	}
	add_action('wp_enqueue_scripts', 'thinkertree_scripts_styles_setup');

	/* ------ MENUS ------ */
	function thinkertree_register_menus() {
		register_nav_menus(
			array(
				'main_menu'	=> __('Main Menu')
			)
		);
	}
	add_action('init', 'thinkertree_register_menus');

	/* ------ CUSTOM POST TYPE ------ */
	function thinkertree_custom_posttype() {
		
		// Set UI labels for CPT
		$labels = array(
			'name'	=>	_x('Projects', 'Post Type General Name', 'thinkertree'),
			'singular_name'	=>	_x('Project', 'Post Type Singular Name', 'thinkertree'),
			'menu_name'	=>	__('Projects', 'thinkertree'),
			'parent_item_colon'	=>	__('Parent Project', 'thinkertree'),
			'all_items'	=>	__('All Projects', 'thinkertree'),
			'view_item'	=>	__('View Project', 'thinkertree'),
			'add_new_item'	=>	__('Add New Project', 'thinkertree'),
			'add_new'	=>	__('Add New', 'thinkertree'),
			'edit_item'	=>	__('Edit Project', 'thinkertree'),
			'update_item'	=>	__('Update Project', 'thinkertree'),
			'search_items'	=>	__('Search Project', 'thinkertree'),
			'not_found'	=>	__('Not Found', 'thinkertree'),
			'not_found_in_trash'	=>	__('Not found in Trash', 'thinkertree'),
		);

		// Set other options for CPT
		$args = array(
			'label'	=>	__('projects', 'thinkertree'),
			'description'	=>	__('Thinker Tree projects', 'thinkertree'),
			'labels'	=> $labels,
			'supports'	=>	array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
			// 'taxonomies'	=>	array('IF ANY'),
			'hierarchical'	=>	false,
			'public'	=> true,
			'show_ui'	=> true,
			'show_in_menu'	=>	true,
			'show_in_nav_menus'	=>	true,
			'show_in_admin_bar'	=>	true,
			// 'menu_position'	=>	5,
			'can_export'	=> true,
			'has_archive'	=>	true,
			'exclude_from_search'	=>	false,
			'publicly_queryable'	=>	true,
			'capability_type'	=>	'page',
		);

		//Registering CPT
		register_post_type('projects', $args);

	}
	add_action('init', 'thinkertree_custom_posttype', 0);

	/* ------ CUSTOM IMAGE SIZES ------ */
	function thinkertree_custom_image_sizes() {
		add_theme_support('post-thumbnails');
	}
	add_action('after_setup_theme', 'thinkertree_custom_image_sizes');

	/* ------ THUMBNAIL UPSCALE ------ */
	function thinkertree_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
		if ( !$crop ) return null; // let the wordpress default function handle this
	 
	  $aspect_ratio = $orig_w / $orig_h;
	  $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
	 
	  $crop_w = round($new_w / $size_ratio);
	  $crop_h = round($new_h / $size_ratio);
	 
	  $s_x = floor( ($orig_w - $crop_w) / 2 );
	  $s_y = floor( ($orig_h - $crop_h) / 2 );
	 
	  return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
	}
	add_filter( 'image_resize_dimensions', 'thinkertree_thumbnail_upscale', 10, 6 );

	/* ------ PAGE SLUG BODY CLASS ------ */
	function add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;
		}
		return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );

	/* ------ EXCERPT ------ */
	function custom_excerpt_length( $length ) {
		return 40;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	/* ------ TINYMCE ADVANCE ------ */

?>