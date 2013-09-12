=== jonradio Display Kitchen Sink ===
Contributors: jonradio
Donate link: http://jonradio.com/plugins
Tags: editor, TinyMCE, edit, page, post, plugin, posting, kitchen sink
Requires at least: 3.0
Tested up to: 3.6
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

All users will have the Kitchen Sink -- the second row of icons displayed in Visual mode -- for both the Page and Post Editors.

== Description ==

When this plugin is activated, all users will see the second row of icons ("The Kitchen Sink") displayed in the Admin panel's Page Edit and Post Edit Visual tab. Clicking the first row's Kitchen Sink icon will only momentarily hide the second row of icons.

The Troubleshooting, Installation and FAQ tabs provide helpful information, both to get started, and to address concerns you might have about the plugin not working as you were expecting it would.

== Installation ==

This section describes how to install the *jonradio Display Kitchen Sink* plugin and get it working.

1. Use **Add Plugin** within the WordPress Admin panel to download and install this *jonradio Display Kitchen Sink* plugin from the WordPress.org plugin repository (preferred method).  Or download and unzip this plugin, then upload the `/jonradio-display-kitchen-sink/` directory to your WordPress web site's `/wp-content/plugins/` directory.
1. Activate the *jonradio Display Kitchen Sink* plugin through the **Installed Plugins** Admin panel in WordPress.  If you have a WordPress Network ("Multisite"), you can either **Network Activate** this plugin through the **Installed Plugins** Network Admin panel, or Activate it individually on the sites where you wish to use it.  Activating on individual sites within a Network avoids some of the confusion created by WordPress' hiding of Network Activated plugins on the Plugin menu of individual sites.  Alternatively, to avoid this confusion, you can install the *jonradio Reveal Network Activated Plugins* plugin.
1. If things are not working as you expect, please look at the Troubleshooting and FAQ tabs.

== Frequently Asked Questions ==

= Where is the third row of Icons? =

The Kitchen Sink is the second row of Icons in the Visual Editor on the Add New and Edit panels for Posts and Pages.  If you are looking for additional rows of Icons, you will need to install and activate additional plugins.  I don't personally have experience with them and therefore cannot recommend or support them, but popular editor plugins include Ultimate TinyMCE and WP Super Edit.

= In a WordPress Network (Multisite) installation, how do I force Kitchen Sink on only some sites? =

Do not Network Activate this plugin.  Instead, Activate it on each site individually, using the Admin panel for each site, not the Network Admin panel.

= How can I limit this plugin behaviour (Display Kitchen Sink) to everyone except Administrators? =

You could alter the php code in this plugin. You could also contact the Plugin author, explaining how you would like this to work, and it will be added to a future version if there is enough interest.

== Screenshots ==

1. Edit Page shown with Kitchen Sink (second row of icons) displayed

== Changelog ==

= 1.1 =
* Verify compatiblity with Version 3.4 of WordPress, via RC2
* Correct name of plugin's main php file and web site page URL to both match folder name

= 1.0 =
* Eliminate Activation "excess characters" error by removing BOM from UTF-8 file encoding
* Switch to UNIX End of Line sequences, from Windows

= 0.9 =
* Clean up php to meet WordPress coding standards

== Upgrade Notice ==

= 1.1 =
Production version 1.0 incorrectly named the main php file.  WordPress may (i.e. - sometimes) generate a fatal error on activation when updating to Version 1.1.  A second (manual) Activation will complete correctly, and is the recommended solution.  The error is being reported as a bug in Version 3.4 of WordPress.

= 1.0 =
Beta version 0.9 generated excess characters at Activation

== Troubleshooting ==

Here are some ideas that might help you figure out what things are not working as you expect them to, when you use this plugin with WordPress.

= First Place to Check =

Be sure that the Visual Editor is not disabled for the User experiencing the problem of not seeing the "Kitchen Sink".

If it is you, in the WordPress Admin panels, go to Users then Your Profile in the Users submenu.  The first setting is "Disable the visual editor when writing".  The Checkbox must be **Empty** (no checkmark), then hit the Update Profile button at the very bottom of the panel.

= Check the Basics =

In the WordPress Admin panels, you should be in Posts or Pages submenu, on an Add New or Edit Page/Post panel.  Please verify that:

1. You see the Visual and Text tabs 
1. That the word “Visual” is black and “Text” is grey 
1. If the Kitchen Sink plugin is working, you should see two rows of icons:  Row 1 begins with a “B”, Row 2 begins with a drop-down box with Paragraph, Heading or something similar. 
1. If Kitchen Sink is turned off, you will only see one row.

If the last point (see only one row) is your situation, then go to the Installed Plugins page of WordPress Admin panels.  *jonradio Display Kitchen Sink* should have a white background, not a grey background.  Grey indicates that it is Not Activated.  In which case, you could click on Activate.

See the FAQ tab for additional information.
