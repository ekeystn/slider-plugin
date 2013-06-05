<?php

add_theme_support('post-thumbnails', array('slider_image'));

function slider_register() {
	register_post_type( 'slider_image',
		array(
			'labels' => array(
				'name' => 'Slider Images',
    			'singular_name' => 'Slider Image',
    			'add_new' => 'Add New',
    			'add_new_items' => 'Add New Image',
    			'edit' => 'Edit',
    			'edit_item' => 'Edit Slider Image',
    			'new_item' => 'New Slider Image',
    			'view' => 'View',
    			'view_item' => 'View Slider Image',
    			'search_items' => 'Search Slider Images',
    			'not_found' => 'No Slider Images Found',
    			'not_found_in_trash' => 'No Slider Images Found in Trash'
				),
			'public' => true,
			'menu_position' => 14,
			'supports' => array('title', 'editor', 'thumbnail' ),
			'taxonomies' => array(''),
			'menu_icon' => plugins_url('new-slide.png', __File__ ),
			'has_archive' => true
			)
		);
}
add_action( 'init', 'slider_register' );