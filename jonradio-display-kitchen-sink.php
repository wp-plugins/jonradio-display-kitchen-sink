<?php
/*
Plugin Name: jonradio Display Kitchen Sink
Plugin URI: http://jonradio.com/plugins/jonradio-display-kitchen-sink/
Description: All users will have the Kitchen Sink displayed in Visual mode for both the Page and Post Editors.
Version: 1.1
Author: jonradio
Author URI: http://jonradio.com/plugins
License: GPLv2
*/

/*  Copyright 2012  jonradio  (email : info@jonradio.com)

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

add_filter( 'tiny_mce_before_init', 'reveal_kitchen_sink' );
 
function reveal_kitchen_sink( $args ) {
	$args['wordpress_adv_hidden'] = FALSE;
	return $args;
}

?>