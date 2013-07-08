<?php
/**
 * Plugin Name: Random Images
 * Description: Display a set of random attached images with the [random_images] shortcode.
 * Version: 0.7
 * Author: Sheri Bigelow
 * Author URI: http://designsimply.com/
 * License: GPLv2 or later
 */

class Random_Images_Plugin {

	public $total = 0;

	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	function init() {
		add_shortcode( 'random_images', array( $this, 'random_images' ) );
	}

	function random_images( $attr ) {
		$attr = shortcode_atts( array(
			'size' => 'thumbnail',
			'total' => 6,
		), $attr );

		$attr['total'] = absint( $attr['total'] );

		$all_attached_images =& get_children( 'post_parent=&post_type=attachment&post_mime_type=image&numberposts=-1&poststatus=publish' );
		$random_image = array_rand( $all_attached_images, $attr['total']  );

		$output = '<div class="random-images">';
		if ( count( $random_image ) > 1 ) :
			while ( list( $k, $v ) = each( $random_image ) ) :
					$output .= ' <a href="' . get_permalink( $v ) . '">' . wp_get_attachment_image( $v, $attr['size'] ) . '</a>';
			endwhile;
		else :
			$output .= ' <a href="' . get_permalink( $random_image ) . '">' . wp_get_attachment_image( $random_image, $attr['size'] ) . '</a>';
		endif;
		$output .= '</div><!-- #random-images -->';

		return $output;
	}

	function enqueue_scripts() {
		wp_enqueue_style( 'random-images', plugins_url( 'random-images.css', __FILE__ ) );
	}
}
new Random_Images_Plugin;