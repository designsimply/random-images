=== Random Images ===
Contributors: designsimply
Tags: images, random images, shortcode
Requires at least: 2.8
Tested up to: 3.6
Stable tag: 0.7.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The [random_images] shortcode displays random attached images from published posts.

== Description ==

The `[random_images]` shortcode will display a simple set of random images. It uses any attached image in the blog for the source images. It was originally designed to be used by theme developers, so the styling is very simple. It was also released as a shortcode so people could use it in content areas if they'd like. You can enable your theme to display the `[random_images]` shortcode in a text widget by adding a snippet of code to the `functions.php` file in your theme or child theme. See the [FAQ](http://wordpress.org/plugins/random-images/faq/ "Random Images FAQ") for more info.

Using `[random_images]` will display 6 images at thumbnail size linked to attachment pages by default.

To change the number of images and the size:

`[random_images total=4 size=medium]`

To make the links point to image files instead of attachment pages:

`[random_images link=file]`

If you have any questions, please ask in the [support forum](http://wordpress.org/support/plugin/random-images "Random Images Support Forum").

== Installation ==

1. Download archive and unzip in wp-content/plugins or install via Plugins - Add New.
1. Start using the `[random_images]` shortcode in your content.

== Frequently Asked Questions ==

= How can I use the random_images shortcode text widgets? =

To enable the random_images shortcode in text widgets, add this to the `functions.php` file in your theme or child theme.

`/**
 * If the Random Images plugin is active, allow the random_images shortcode to work in text widgets
 **/
if ( method_exists( 'Random_Images_Plugin', 'random_images' ) )
	add_filter('widget_text', 'Random_Images_Plugin::random_images');`

= How can I use random images in a WordPress theme? =

This example will display a set of random images from a theme file:

`if ( method_exists( 'Random_Images_Plugin', 'random_images' ) )
   echo Random_Images_Plugin::random_images( array( 'size' => 'thumbnail', 'total' => 9 ) );`

== Screenshots ==

1. Set of eight random thumbnail images.

== Changelog ==

= 0.7.1 =
* Switch to using the class as a namespace so it can be called directly in theme files.
* Update code example in readme.txt, move to FAQ.
* Add an option to link directly to files instead of attachment pages.

= 0.7 =
* First version
