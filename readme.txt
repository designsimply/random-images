=== Random Images ===
Contributors: designsimply
Tags: images, random images, shortcode
Requires at least: 2.8
Tested up to: 3.6
Stable tag: 0.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This WordPress plugin allows you to call random_images() in your theme to get a random set of attached images.

== Description ==

Use the `[random_images]` in content areas to display a set of random images.

You can also set the number of images and the size like this: `[random_images total=4 size=medium]`

It shows 6 images at thumbnail size by default. It will pull any image that is attached to any published post.

To call this shortcode from a theme template file, you can use something like this:

`global $shortcode_tags;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'random-images/random-images.php' ) ) :
	echo call_user_func( $shortcode_tags['random_images'], array( 'size' => 'thumbnail', 'total' => 9 ) );
endif;`

== Installation ==

1. Download archive and unzip in wp-content/plugins or install via Plugins - Add New.
1. Start using the `[random_images]` shortcode in your content.

== Screenshots ==

1. Set of eight random thumbnail images.

== Changelog ==

= 0.7 =
* First version