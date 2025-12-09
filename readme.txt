=== Random Images ===
Contributors: designsimply
Tags: images, random images, shortcode
Requires at least: 3.6
Tested up to: 6.9
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The [random_images] shortcode displays random attached images.

== Description ==

The `[random_images]` shortcode will display an unstyled set of random images.

Six images will display at thumbnail size linked to attachment pages by default.

To change the number of images and the size:

`[random_images total=4 size=medium]`

To make the links point to image files instead of attachment pages:

`[random_images link=file]`

If you have any questions, please ask in the [support forum](http://wordpress.org/support/plugin/random-images "Random Images Support Forum").

== Installation ==

1. Download archive and unzip in wp-content/plugins or install via Plugins - Add New.
1. Start using the `[random_images]` shortcode in your content.

== Screenshots ==

1. Set of eight random thumbnail images.

== Changelog ==

= 1.0 =
* Vastly improve performance by querying for image IDs before running more complex queries.

= 0.7.1 =
* Switch to using the class as a namespace so it can be called directly in theme files.
* Update code example in readme.txt, move to FAQ.
* Add an option to link directly to files instead of attachment pages.

= 0.7 =
* First version
