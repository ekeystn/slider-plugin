<?php
/**
* Plugin Name: Flexslider
* Description: Flexslider Slideshow (http://www.woothemes.com/flexslider/)
* Author: Green Orb, Inc.
* Version 1.1
*/
require_once('slider-img-type.php');

function slider_register_scripts() {
	wp_register_script( 'flexslider', plugins_url( '/js/jquery.flexslider.min.js', __FILE__), array('jquery'), true );
}
add_action('wp_enqueue_scripts', 'slider_register_scripts' );

function slider_get_slider() {
	if( post_type_exists('slider_image')) {
		$hasposts = get_posts('post_type=slider_image');
		if($hasposts) {
			wp_enqueue_script('flexslider');
		}
	}

	$slider = '<div class="flexslider"><ul class="slides">';
	$slider_query = "post_type=slider_image";
	query_posts($slider_query);

	if (have_posts() ) : while (have_posts() ) : the_post();
	$thumbnail_id = get_post_thumbnail_id();
	$img_src = wp_get_attachment_image_src( $thumbnail_id, 'large' );
	$slider.= '<li style="background-image: url(' . $img_src[0] . ');"></li>';
	endwhile;
	endif;
	wp_reset_query();
	$slider.= '</ul></div>';
	return $slider;
}

//shortcode for use in editor
function slider_insert_slider ( $atts, $content=null ) {
	$slider = slider_get_slider();
	return $slider;
}
add_shortcode( 'slider_slider', 'slider_insert_slider');

//add template tag for theme
function slider_slider() {
	print slider_get_slider();
}