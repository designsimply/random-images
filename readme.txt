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

Use the `[random_images]` shortcode to display a set of random images.

You can set the number of images and the size like this: 

`[random_images total=4 size=medium]`

By default, 6 images will display at thumbnail size. Images attached to public posts are included.

== Installation ==

1. Download archive and unzip in wp-content/plugins or install via Plugins - Add New.
1. Start using the `[random_images]` shortcode in your content.

== Frequently Asked Questions ==

= How can I use random images in a WordPress theme? =

`if ( method_exists( 'Random_Images_Plugin', 'random_images' ) && ( is_home() || is_attachment() ) )
   echo Random_Images_Plugin::random_images( array( 'size' => 'thumbnail', 'total' => 9 ) );`

== Screenshots ==

1. Set of eight random thumbnail images.

== Changelog ==

= 0.7.1 =
* Switch to using the class as a namespace so it can be called directly in theme files.
* Update code example in readme.txt, move to FAQ.

= 0.7 =
* First version
