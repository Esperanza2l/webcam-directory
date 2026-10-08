=== Webcam Directory ===
Contributors: esperanza2l
Tags: webcam, directory, shortcode, grid
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.0
Stable tag: 2.0.0
License: MIT
License URI: https://opensource.org/licenses/MIT

A lightweight, responsive webcam directory displayed with a shortcode.

== Description ==

Webcam Directory adds the `[webcam_directory]` shortcode, which displays a responsive grid of demo webcams. Each card shows the webcam name, category, Online/Offline status, a short description and a "View Webcam" link.

The plugin has no settings page, uses no database tables and loads no JavaScript. Its stylesheet is only loaded on pages that use the shortcode.

= Shortcode attributes =

* `limit` - Maximum number of webcams to display. Default: 6. Use 0 to show all.
* `category` - Only show webcams from the given category (case-insensitive). Default: all categories.

= Examples =

* `[webcam_directory]`
* `[webcam_directory limit="3"]`
* `[webcam_directory category="Music"]`

== Installation ==

1. Upload the `webcam-directory` folder to `/wp-content/plugins/`.
2. Activate the plugin through the "Plugins" screen in WordPress.
3. Add `[webcam_directory]` to any page or post.

== Changelog ==

= 2.0.0 =
* Responsive card grid with separate stylesheet.
* Six demo webcams with description and status.
* New `limit` and `category` shortcode attributes.

= 1.0.0 =
* Initial release.
