=== Random Images ===
Contributors: designsimply
Tags: images, random images, shortcode
Requires at least: 2.8
Tested up to: 3.6
Stable tag: 0.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The [random_images] shortcode displays random attached images from published posts.

== Description ==

Use the `[random_images]` shortcode to display a set of random images.

You can set the number of images and the size like this: `[random_images total=4 size=medium]`

By default, 6 images will display at thumbnail size. Images attached to public posts are included.

To call this shortcode from a theme template file, you can use something like this:

`global $shortcode_tags;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Required when using is_plugin_active() outside admin pages

// Display a set of random images on the home page and attachment pages if the Random Images plugin is present and active
if ( method_exists( 'Random_Images_Plugin', 'random_images' ) && is_plugin_active( 'random-images/random-images.php' ) && ( is_home() || is_attachment() ) )
	echo call_user_func( $shortcode_tags['random_images'], array( 'size' => 'thumbnail', 'total' => 9 ) );`

== Installation ==

1. Download archive and unzip in wp-content/plugins or install via Plugins - Add New.
1. Start using the `[random_images]` shortcode in your content.

== Screenshots ==

1. Set of eight random thumbnail images.

== Changelog ==

= 0.7 =
* First version
