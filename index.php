<?php
/**
 * Plugin Name: Jetpack Carousel Enhancements
 * Description: Hides the comment form and moves the close icon to the top-right part of the screen inside the Jetpack Carousel screen.
 * Version: 0.1.0
 * Author: Dmitry Mayorov
 * Author URI: https://dmtrmrv.com
 *
 * @package Jetpack Carousel Enhancements
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Removes comment form from all attachment pages.
 *
 * @param bool        $open    Whether the current post is open for comments.
 * @param int|WP_Post $post_id The post ID or WP_Post object.
 */
function jce_remove_attachment_comments( $open, $post_id ) {
	$post = get_post( $post_id );
	if ( 'attachment' == $post->post_type ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'jce_remove_attachment_comments', 10 , 2 );

/**
 * Add enhancement styles.
 */
function jce_styles() {
	wp_enqueue_style(
		'jce_style',
		plugin_dir_url( __FILE__ ) . '/style.css',
		array()
	);
}
add_action( 'wp_enqueue_scripts', 'jce_styles' );
