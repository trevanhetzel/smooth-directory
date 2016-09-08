=== Plugin Name ===
Contributors: hetzelcreative
Donate link: http://trevan.co
Tags: business, directory
Requires at least: 4.3
Tested up to: 4.3
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple and flexible business directory plugin.

== Description ==

Smooth Directory is a simple way to add a business directory to a WordPress site. The public view of the directory is a simple, responsive two-column view, while the WP admin is extremely easy to use.

The plugin is ready to start using right out of the box by navigating to /businesses and is easily extendable by developers by overwriting the two public facing templates and styles.

The directory comes with built-in pagination, category filtering and alphabet filtering.

There are quite a few WordPress directory plugins, but if you're looking for a responsive, easy to get going (and easy for clients to manage) business directory plugin, Smooth Directory will work great for you!

== Features ==

- Responsive
- Customizable colors
- Easily extendable
- Ability to add categories
- Category filtering
- Alphabet filtering
- Pagination
- Uses custom post types and metadata, which makes creating your own theme very straightforward
- Allows the display of a business name, contact, location, address, phone, website, email, description and image

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload [`smooth-directory`](https://github.com/trevanhetzel/smooth-directory/archive/master.zip) to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How can I modify the templates? =

There are two templates that you can overwrite: `archive-businesses.php` (the main directory template) and `taxonomy-business_category.php` (the template shown when a category is selected). The best way to do this is to copy those two files from the plugin (located at `smooth-directory/public/`) to the root directory in your theme and then modifying them from there.

= Can I have multiple directories? =

No. Currently, only one directory with the slug `businesses` is supported.

== Screenshots ==

1. Desktop view

2. Mobile view

== Changelog ==

= v1.2.3 =
* Add single page template

= v1.2.2 =
* Add hyperlinks for website

= v1.2.1 =
* Use featured image instead of meta value

= v1.1 =
* Add screenshots

= v1.0 =
* Initial release
