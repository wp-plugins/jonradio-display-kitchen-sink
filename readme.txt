=== jonradio Display Kitchen Sink ===
Contributors: dgewirtz
Donate link: http://zatzlabs.com/plugins/
Tags: editor, TinyMCE, edit, page, post
Requires at least: 3.0
Tested up to: 3.3.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

All users will have the Kitchen Sink -- the second row of icons displayed in Visual mode -- for both the Page and Post Editors.

== Description ==

When this plugin is activated, all users will see the second row of icons ("The Kitchen Sink") displayed in the Admin panel's Page Edit and Post Edit Visual tab. Clicking the first row's Kitchen Sink icon will only momentarily hide the second row of icons.

== Installation ==

This section describes how to install the plugin and get it working.

1. Use "Add Plugin" within the WordPress Admin panel to download and install this plugin from the WordPress.org plugin repository (preferred method).  Or download and unzip this plugin, then upload the `/jonradio-display-kitchen-sink/` directory to your WordPress web site's `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= In a WordPress Network (Multisite) installation, how do I force Kitchen Sink on only some sites? =

Do not Network Activate this plugin.  Instead, Activate it on each site individually, using the Admin panel for each site, not the Network Admin panel.

= How can I limit this plugin behaviour (Display Kitchen Sink) to everyone except Administrators? =

You could alter the php code in this plugin. You could also contact the Plugin author, explaining how you would like this to work, and it will be added to a future version if there is enough interest.

== Screenshots ==

1. Edit Page shown with Kitchen Sink (second row of icons) displayed

== Changelog ==

= 1.0 =
* Eliminate Activation "excess characters" error by removing BOM from UTF-8 file encoding
* Switch to UNIX End of Line sequences, from Windows

= 0.9 =
* Clean up php to meet WordPress coding standards

== Upgrade Notice ==

= 1.0 =
Beta version 0.9 generated excess characters at Activation