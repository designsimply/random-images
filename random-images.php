<?php
/**
 * Plugin Name: Random Images
 * Description: Display a set of random attached images with the [random_images] shortcode.
 * Version: 1.0.1
 * Author: Sheri Grey
 * Author URI: http://designsimply.com/
 * License: GPLv2 or later
 */

class Random_Images_Plugin {

        static function load() {
                add_shortcode( 'random_images', array( 'Random_Images_Plugin', 'random_images' ) );
        }

        static function random_image_url() {
			global $wpdb;
			
			// Add cache-busting seed to prevent query result caching
			$random_seed = time() . mt_rand();
			
			$sql = $wpdb->prepare( "
			SELECT
					ID
			FROM
					$wpdb->posts
			WHERE
					post_type='attachment'
					AND post_mime_type LIKE %s
					AND post_status='inherit'
			ORDER BY RAND(%d) 
			LIMIT 100", 'image%', $random_seed );

			$image_ids = $wpdb->get_results( $sql );
			if ( empty( $image_ids ) || ! isset( $image_ids[0]->ID ) ) {
				return null;
			}
			$image_url = wp_get_attachment_image_url( $image_ids[0]->ID );

			return $image_url;
		}

        static function random_image_permalink() {
			global $wpdb;
			
			// Add cache-busting seed to prevent query result caching
			$random_seed = time() . mt_rand();
			
			$sql = $wpdb->prepare( "
			SELECT
					ID
			FROM
					$wpdb->posts
			WHERE
					post_type='attachment'
					AND post_mime_type LIKE %s
					AND post_status='inherit'
			ORDER BY RAND(%d) 
			LIMIT 250", 'image%', $random_seed );

			$image_ids = $wpdb->get_results( $sql );
			if ( empty( $image_ids ) || ! isset( $image_ids[0] ) ) {
				if ( is_user_logged_in() ) {
					return "Error: no images found. Add some images to posts.";
				}
				return null;
			}
			$attachment_url = get_post_permalink( $image_ids[0] );

			if ( ! empty( $attachment_url ) ) {
				return $attachment_url;
			} else {
				if ( is_user_logged_in() ) {
						return "Error: no images found. Add some images to posts.";
				}
			}
		}

        static function random_images( $attr ) {
                $attr = shortcode_atts( array(
                        'size' => 'thumbnail',
                        'link' => '',
                        'total' => 6,
                ), $attr );

	        // Query the database for just the image ids.
	        // TODO add escaped limit input
	        global $wpdb;

	        $total = absint( $attr['total'] );
	        
	        // Add cache-busting seed to prevent query result caching
	        $random_seed = time() . mt_rand();
	        
	        $sql = $wpdb->prepare( "
	        SELECT
	                ID
	        FROM
	                $wpdb->posts
	        WHERE
	                post_type='attachment'
	                AND post_mime_type LIKE %s
	                AND post_status='inherit'
	        ORDER BY RAND(%d) LIMIT %d", 'image%', $random_seed, $total );

	        $image_ids = $wpdb->get_results( $sql );

	        $my_images = array();
	        foreach ( $image_ids as $image ) {
	                $my_images[] = array(
	                        'title' => get_the_title( $image->ID ),
	                        'url' => wp_get_attachment_url( $image->ID ),
	                        'image' => wp_get_attachment_image( $image->ID, $attr['size'] ),
							'permalink' => get_post_permalink( $image->ID )
	                );
	        }

	        if ( ! empty( $my_images ) ) {
	                $output = '<div class="random-images">';
	                foreach ($my_images as $my_image) {
	                        $output .= ' <a href="' . esc_url( $my_image['permalink'] ) . '" title="' . esc_attr( $my_image['title'] ) . '">' . $my_image['image'] . '</a>';
	                }
	                $output .= '</div><!-- #random-images -->';
					return $output;
	        } else {
	                if ( is_user_logged_in() ) {
	                        return "Error: no images found. Add some images to posts.";
	                }
	        }
        }
}
Random_Images_Plugin::load();
