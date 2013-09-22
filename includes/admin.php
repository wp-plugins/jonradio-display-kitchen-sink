<?php

//	Exit if .php file accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

add_filter( 'tiny_mce_before_init', 'reveal_kitchen_sink' );
 
function reveal_kitchen_sink( $args ) {
	$args['wordpress_adv_hidden'] = FALSE;
	return $args;
}

//	Admin Page

add_action( 'admin_menu', 'jr_dks_admin_menu' );
//	Runs just before admin_init (below)

/**
 * Add Admin Menu item for plugin
 * 
 * Plugin needs its own Page in the Settings section of the Admin menu.
 *
 */
function jr_dks_admin_menu() {
	//  Add Settings Page for this Plugin
	global $jr_dks_plugin_data;
	add_options_page( $jr_dks_plugin_data['Name'], 'Kitchen Sink', 'switch_themes', 'jr_dks_settings', 'jr_dks_settings_page' );
	add_pages_page( $jr_dks_plugin_data['Name'], 'Kitchen Sink', 'switch_themes', 'jr_dks_settings', 'jr_dks_settings_page' );
	add_posts_page( $jr_dks_plugin_data['Name'], 'Kitchen Sink', 'switch_themes', 'jr_dks_settings', 'jr_dks_settings_page' );
	add_users_page( $jr_dks_plugin_data['Name'], 'Kitchen Sink', 'switch_themes', 'jr_dks_settings', 'jr_dks_settings_page' );	
}

/**
 * Settings page for plugin
 * 
 * Display and Process Settings page for this plugin.
 *
 */
function jr_dks_settings_page() {
	global $jr_dks_plugin_data, $jr_dks_plugin_basename;
	$current_wp_version = get_bloginfo( 'version' );
	
	add_thickbox();
	echo '<div class="wrap">';
	screen_icon( 'plugins' );
	echo '<h2>' . $jr_dks_plugin_data['Name'] . '</h2>';
	
	//	Required because it is only called automatically for Admin Pages in the Settings section
	settings_errors( 'jr_dks_settings' );
	
	?>
	<h3>
	Overview
	</h3>
	<p>
	This plugin displays the <b>Kitchen Sink</b>:
	the second row of icons above the Editing Area
	in the Visual Editor for Pages and Posts.
	The Visual Editor is shown on the <b>Visual</b> tab of the Add New Post, Edit Post, Add New Page and Edit Page panels,
	accessible through the Page and Post submenus on the left sidebar of this and every other WordPress Admin panel.
	</p>

	<h3>
	Users
	</h3>
	<p>
	<?php
	
	$editor_disabled = array();
	foreach ( $users = get_users( array( 'fields' => 'all_with_meta' ) ) as $obj ) {
		/*	get_users() returns array[integer user ID] containing an object
			with elements like:  'user_email'=>'e-mailname@domain.com'
			rich_editing is a string with values of "true" or "false"
		*/
		if ( 'false' === $obj->rich_editing ) {
			$editor_disabled[] = $obj->ID;
		}
	}
	echo 'There ' .  sprintf( _n( 'is only one User', 'are %s Users', count( $users ) ), count( $users ) ) . ' registered to access this WordPress site';
	
	if ( 0 === count( $editor_disabled ) ) {
		echo _n( ' and that User has', '. All of them have', count( $users ) );
		echo ' the Visual Editor enabled in their User Profile for this Site, allowing them to see the Kitchen Sink whenever the Visual tab is selected.</p>';
	} else {
		if ( count( $users ) === count( $editor_disabled ) ) {
			echo _n( ', but that one, shown below, has', '. All of them, shown below, have', count( $editor_disabled ) );
		} else {
			printf( _n( '. One of them, shown below, has', '; %s of them, shown below, have', count( $editor_disabled ) ), count( $editor_disabled ) );
		}
		echo ' the Visual Editor disabled in their User Profile for this Site, making it impossible for them to view the Kitchen Sink.</p><table class="widefat"><tbody>';
		$td_style = 'style="text-align: center; vertical-align: middle"';
		$td = "<td $td_style>";
		$head_foot = array( 'head' );
		if ( count( $editor_disabled ) > 9 ) {
			/*	Table is large enough to justify a Footer of Column titles.
			*/
			$head_foot[] = 'foot';
		}
		foreach ( $head_foot as $where ) {
			echo "<t$where><tr>";
			foreach ( array( 'User ID', 'Username', 'Role', 'Display Name', 'User e-mail', 'Edit User' ) as $title ) {
				echo "<th $td_style>$title</th>";
			}
			echo "</tr></t$where>";
		}
		sort( $editor_disabled );
		foreach ( $editor_disabled as $id ) {
			echo '<tr>';
			echo $td;
			echo $id;
			echo '</td>';
			echo $td;
			echo $users[$id]->user_login;
			echo '</td>';
			echo $td;
			$user = new WP_User( $id );
			if ( isset( $user->roles[0] ) ) {
				echo $user->roles[0];
			} else {
				echo 'No Role on this Site';
			}
			echo '</td>';
			echo $td;
			echo $users[$id]->display_name;
			if ( '' != trim( $name = $users[$id]->user_firstname . ' ' . $users[$id]->user_lastname ) ) {
				echo " ($name)";
			}
			echo '</td>';
			echo $td;
			echo $users[$id]->user_email;
			echo '</td>';
			echo $td;
			echo '<a class="button-secondary" href="' . admin_url( "user-edit.php?user_id=$id&wp_http_referer=%2Fwp-admin%2Fusers.php%3Fpage%3Djr_dks_settings" ) . '">Profile</a>';  // &wp_http_referer=%2Fwp-admin%2Fusers.php
			echo '</td></tr>';
		}
		echo '</tbody></table>';
	}
	?>
	<h3>
	Details
	</h3>
	<p>
	When this plugin is activated, all users will see the second row of icons ("The Kitchen Sink") displayed in the Admin panel's Page Edit and Post Edit Visual tab.
	Clicking the first row's Kitchen Sink icon will only momentarily hide the second row of icons.
	</p>
	<h4>
	Where is the third row of Icons?
	</h4>
	<p>
	The Kitchen Sink is the second row of Icons in the Visual Editor on the Add New and Edit panels for Posts and Pages. 
	If you are looking for additional rows of Icons, you will need to install and activate additional plugins. 
	I don't personally have experience with them and therefore cannot recommend or support them, 
	but the <a href="http://wordpress.org/plugins/">WordPress Plugin Directory</a> includes (free of charge) popular editor plugins such as Ultimate TinyMCE and WP Super Edit.
	</p>
	<?php
	if ( is_multisite() ) {
	?>
		<h4>
		In a WordPress Network (Multisite) installation, 
		how do I force Kitchen Sink on only some sites?
		</h4>
		<p>
		Do not Network Activate this plugin. Instead, Activate it on each site individually, using the Admin panel for each site, not the Network Admin panel.
		</p>
	<?php
	}
	?>
	<h3>
	Troubleshooting
	</h3>
	<p>
	Here are some ideas that might help you figure out what things are not working as you expect them to, 
	when you use this plugin with WordPress.
	</p>
	<h4>
	First Place to Check
	</h4>
	<p>
	Be sure that the Visual Editor is not disabled for the User experiencing the problem of not seeing the "Kitchen Sink".
	</p>
	<p>
	If it is you, in the WordPress Admin panels, go to Users then Your Profile in the Users submenu. 
	The first setting is "Disable the visual editor when writing". 
	The Checkbox must be Empty (no checkmark), then hit the Update Profile button at the very bottom of the panel.
	</p>
	<h4>
	Check the Basics
	</h4>
	<p>
	In the WordPress Admin panels, you should be in Posts or Pages submenu, on an Add New or Edit Page/Post panel. Please verify that:
	<ol>
	<li>
    You see the Visual and Text tabs
	</li>
	<li>
    That the word "Visual" is black and "Text" is grey
	</li>
	<li>
    If the Kitchen Sink plugin is working, you should see two rows of icons: 
	Row 1 begins with a "B", 
	Row 2 begins with a drop-down box with Paragraph, Heading or something similar.
	</li>
	<li>
    If Kitchen Sink is turned off, you will only see one row.
	</li>
	</ol>
	If the last point (see only one row) is your situation, 
	then go to the Installed Plugins page of WordPress Admin panels. 
	jonradio Display Kitchen Sink should have a white background, not a grey background. 
	Grey indicates that it is Not Activated. 
	In which case, you could click on Activate.
	</p>
	<?php
	echo '<hr /><h3>System Information</h3><p>You are currently running:<ul>';
	echo "<li> &raquo; The {$jr_dks_plugin_data['Name']} plugin Version {$jr_dks_plugin_data['Version']}</li>";
	if ( is_multisite() ) {
		if ( is_plugin_active_for_network( $jr_dks_plugin_basename ) ) {
			echo '<li> &nbsp; &raquo;&raquo; The Plugin is Network Activated, meaning that it is available (activated) on all Sites within this WordPress Network';
		} else {
			$current_blog_id = get_current_blog_id();
			global $wpdb, $site_id;
			$blogs = $wpdb->get_results( "SELECT blog_id FROM {$wpdb->blogs} WHERE site_id = $site_id" );
			$sites = array();
			foreach ( $blogs as $blog_obj ) {
				if ( ( $blog_obj->blog_id != $current_blog_id ) && switch_to_blog( $blog_obj->blog_id ) ) {
					/*	We know the Site actually exists, and is not the current Site
					*/
					if ( is_plugin_active( $jr_dks_plugin_basename ) ) {
						$sites[$blog_obj->blog_id] = get_bloginfo() . ' (' . home_url() . ')';
					}
				}
			}
			switch_to_blog( $current_blog_id );
			if ( empty( $sites ) ) {
				echo '<li> &nbsp; &raquo;&raquo; The Plugin is not available (activated) on other Sites on this WordPress Network</li>';
			} else {
				echo '<li> &nbsp; &raquo;&raquo; The Plugin is also available (activated) on other Sites on this WordPress Network:</li>';
				foreach ( $sites as $blog_id => $blog_info ) {
					echo "<li> &nbsp; &nbsp; &raquo;&raquo;&raquo; $blog_info</li>";
				}
			}
		}
	}
	echo "<li> &nbsp; &raquo;&raquo; The Path to the plugin's directory is " . rtrim( jr_dks_path(), '/' ) . '</li>';
	echo "<li> &nbsp; &raquo;&raquo; The URL to the plugin's directory is " . plugins_url() . "/{$jr_dks_plugin_data['slug']}</li>";
	echo "<li> &raquo; WordPress Version $current_wp_version</li>";
	if ( is_multisite() ) {
		echo '<li> &nbsp; &raquo;&raquo; WordPress is being run as a Network, i.e. - a single installation of WordPress capable of providing multiple individual WordPress Sites (Multisite)</li>';
	} else {
		echo '<li> &nbsp; &raquo;&raquo; WordPress is being run as a Single Site, i.e. - not a Network/Multisite</li>';
	}
	echo '<li> &nbsp; &raquo;&raquo; WordPress language is set to ' , get_bloginfo( 'language' ) . '</li>';
	echo '<li> &raquo; ' . php_uname( 's' ) . ' operating system, Release/Version ' . php_uname( 'r' ) . ' / ' . php_uname( 'v' ) . '</li>';
	echo '<li> &raquo; ' . php_uname( 'm' ) . ' computer hardware</li>';
	echo '<li> &raquo; Host name ' . php_uname( 'n' ) . '</li>';
	echo '<li> &raquo; php Version ' . phpversion() . '</li>';
	echo '<li> &nbsp; &raquo;&raquo; php memory_limit ' . ini_get('memory_limit') . '</li>';
	echo '<li> &raquo; Zend engine Version ' . zend_version() . '</li>';
	echo '<li> &raquo; Web Server software is ' . getenv( 'SERVER_SOFTWARE' ) . '</li>';
	if ( function_exists( 'apache_get_version' ) && ( FALSE !== $apache = apache_get_version() ) ) {
		echo "<li> &nbsp; &raquo;&raquo; Apache Version $apache</li>";
	}
	global $wpdb;
	echo '<li> &raquo; MySQL Version ' . $wpdb->get_var( 'SELECT VERSION();', 0, 0 ) . '</li>';
}

// Add Link to the plugin's entry on the Admin "Plugins" Page, for easy access
add_filter( 'plugin_action_links_' . jr_dks_plugin_basename(), 'jr_dks_plugin_action_links', 10, 1 );

/**
 * Creates Settings entry right on the Plugins Page entry.
 *
 * Helps the user understand where to go immediately upon Activation of the Plugin
 * by creating entries on the Plugins page, right beside Deactivate and Edit.
 *
 * @param	array	$links	Existing links for our Plugin, supplied by WordPress
 * @param	string	$file	Name of Plugin currently being processed
 * @return	string	$links	Updated set of links for our Plugin
 */
function jr_dks_plugin_action_links( $links ) {
	// The "page=" query string value must be equal to the slug
	// of the Settings admin page.
	array_push( $links, '<a href="' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=jr_dks_settings' . '">Settings</a>' );
	return $links;
}

?>