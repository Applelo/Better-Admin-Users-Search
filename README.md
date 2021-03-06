![WordPress Plugin: Required WP Version](https://img.shields.io/wordpress/plugin/wp-version/better-admin-users-search) ![WordPress Plugin Required PHP Version](https://img.shields.io/wordpress/plugin/required-php/better-admin-users-search) ![WordPress Plugin Active Installs](https://img.shields.io/wordpress/plugin/installs/better-admin-users-search) ![WordPress Plugin Rating](https://img.shields.io/wordpress/plugin/rating/better-admin-users-search)

# Better Admin Users Search

WordPress Plugin to improve users admin search

## Description

This plugin improves the admin users search. Just configure what datas you need to search (or not) and that all :)

You can choose to configure what default wordpress search (login, url, email, nicename, display_name) and extends search with user metas (last_name, first_name...).

<p align="center">
  <img src="https://github.com/Applelo/Better-Admin-Users-Search/blob/master/.wordpress-org/screenshot-1.png?raw=true" width="750" title="The Better Admin Users Search settings screen">
  <img src="https://github.com/Applelo/Better-Admin-Users-Search/blob/master/.wordpress-org/screenshot-2.png?raw=true" width="750" alt="The result with Better Admin Users Search activated">
</p>

Free tip: this plugin do more sense with [Admin Columns](https://wordpress.org/plugins/codepress-admin-columns/) ;)

## Installation

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->Better Admin Users Search screen to configure the plugin

## Frequently Asked Questions

### Where to find help?

-   Search the [community support forum](https://wordpress.org/search/). You will probably find your answer here.
-   If you still have a problem, open a new thread in the [community support forum](http://wordpress.org/support/plugin/better-admin-users-search).

### What language are supported by the plugin?

The plugin supports english and french languages. If you want to add your language, go to the [official repository](https://github.com/Applelo/Better-Admin-Users-Search) on GitHub and pull request your translation!

### Can I contribute to this project?

Sure, just go to the [official repository](https://github.com/Applelo/Better-Admin-Users-Search) on GitHub and pull request your improvements :)

## Build

You need to have already install `npm` and `composer`.I recommend to use VSCode with Intelephense plugin.

Clone the repository in the plugins wordpress folder.
Run `composer install` and `npm i` to have everything ready to work.

The plugin should work now.

To update `.pot` files, `npm run pot`.

## Credits

-   CMB2 Team
-   pokbot for the cmb-field-select2 add-on for CMB2
-   WP Pot Team
-   10up for the Wordpress Github Actions
-   Font awesome icons for the logo
