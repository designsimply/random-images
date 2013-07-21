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

	static function load() {
		add_action( 'init', array( 'Random_Images_Plugin', 'init' ) );
		add_action( 'wp_enqueue_scripts', array( 'Random_Images_Plugin', 'enqueue_scripts' ) );
	}

	static function init() {
		add_shortcode( 'random_images', array( 'Random_Images_Plugin', 'random_images' ) );
	}

	static function random_images( $attr ) {
		$attr = shortcode_atts( array(
			'size' => 'thumbnail',
			'link' => '',
			'total' => 6,
		), $attr );

		$attr['total'] = absint( $attr['total'] );
		if ( ! in_array( $attr['total'] , range( 1, 100 ) ) )
			$attr['total'] = 6;

		if ( ! in_array( $attr['size'], array( 'thumbnail', 'medium', 'large', 'full' ) ) )
			$attr['size'] = 'thumbnail';

		// In this context, posts_per_page is a max number of results to randomize,
		// not the number of results that will be displayed. It's a way of randomizing
		// results via PHP while still taking advantage of caching the query first.
		$all_attached_images = get_children( 'post_parent=&post_type=attachment&post_mime_type=image&posts_per_page=800&poststatus=publish' );
		$random_images = array_rand( $all_attached_images, $attr['total']  );
		$c = count( $random_images );

		if ( 1 == $c )
			$random_images = array ( $random_images );

		if ( 0 < $c ) :
		$output = '<div class="random-images">';

			while ( list( $k, $v ) = each( $random_images ) ) :

				if ('file' == $attr['link'] ) :
					$link = wp_get_attachment_url( $v );
				else :
					$link = get_permalink( $v );
				endif;

				$output .= ' <a href="' . $link . '" title="' . get_the_title( $v ) . '">' . wp_get_attachment_image( $v, $attr['size'] ) . '</a>';

			endwhile;
		$output .= '</div><!-- #random-images -->';
		endif;

		return $output;
	}

	static function enqueue_scripts() {
		wp_enqueue_style(  'random-images', plugins_url( 'random-images.css', __FILE__ ) );
	}
}
Random_Images_Plugin::load();
