Smooth Directory
==========

### A simple and flexible WordPress business directory plugin

Smooth Directory is a simple way to add a business directory to a WordPress site. The public view of the directory is a simple, responsive two-column view, while the WP admin is extremely easy to use.

The plugin is ready to start using right out of the box by navigating to /businesses and is easily extendable by developers by overwriting the two public facing templates and styles.

The directory comes with built-in pagination, category filtering and alphabet filtering.

There are quite a few WordPress directory plugins, but if you're looking for a responsive, easy to get going (and easy for clients to manage) business directory plugin, Smooth Directory will work great for you!

### Features

- Responsive
- Customizable colors
- Easily extendable
- Ability to add categories
- Category filtering
- Alphabet filtering
- Pagination
- Uses custom post types and metadata, which makes creating your own theme very straightforward
- Allows the display of a business name, contact, location, address, phone, website, email, description and image

### Installation

1. Upload [`smooth-directory`](https://github.com/trevanhetzel/smooth-directory/archive/master.zip) to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

### FAQ

**How can I modify the templates?**

There are two templates that you can overwrite: `archive-businesses.php` (the main directory template) and `taxonomy-business_category.php` (the template shown when a category is selected). The best way to do this is to copy those two files from the plugin (located at `smooth-directory/public/`) to the root directory in your theme and then modifying them from there.

**Can I have multiple directories?**

No. Currently, only one directory with the slug `businesses` is supported.

### Screenshots

![Desktop view](/assets/screenshot-1.png?raw=true "Desktop view")

![Mobile view](/assets/screenshot-2.png?raw=true "Mobile view")
