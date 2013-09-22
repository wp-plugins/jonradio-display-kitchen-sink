<?php
/*
Plugin Name: jonradio Display Kitchen Sink
Plugin URI: http://jonradio.com/plugins/jonradio-display-kitchen-sink/
Description: All users will have the Kitchen Sink displayed in Visual mode for both the Page and Post Editors.
Version: 2.0.1
Author: jonradio
Author URI: http://jonradio.com/plugins
License: GPLv2
*/

/*  Copyright 2013  jonradio  (email : info@jonradio.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*	Acknowledgements:
	The approach used in this plugin was found on several different web sites,
	so there is no way to know where it originally came from.
	My thanks to the original coder, whoever he or she may be.
*/

if ( is_admin() ) {
	if ( !function_exists( 'get_plugin_data' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	global $jr_dks_plugin_data;
	$jr_dks_plugin_data = get_plugin_data( __FILE__ );
	$jr_dks_plugin_data['slug'] = basename( dirname( __FILE__ ) );
	
	global $jr_dks_path;
	$jr_dks_path = plugin_dir_path( __FILE__ );
	/**
	* Return Plugin's full directory path with trailing slash
	* 
	* Local XAMPP install might return:
	*	C:\xampp\htdocs\wpbeta\wp-content\plugins\jonradio-multiple-themes/
	*
	*/
	function jr_dks_path() {
		global $jr_dks_path;
		return $jr_dks_path;
	}
	
	global $jr_dks_plugin_basename;
	$jr_dks_plugin_basename = plugin_basename( __FILE__ );
	/**
	* Return Plugin's Basename
	* 
	* For this plugin, it would be:
	*	jonradio-display-kitchen-sink/jonradio-display-kitchen-sink.php
	*
	*/
	function jr_dks_plugin_basename() {
		global $jr_dks_plugin_basename;
		return $jr_dks_plugin_basename;
	}
	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/admin.php' );
}

?>