<?php

/*
  Plugin Name: Text Toggle
  Plugin URI: http://www.terryobrien.me/programming/wordpress/plugins/text-toggle/
  Description: Toggle text areas using jQuery functionality
  Version: 1.2
  Author: Terry O'Brien (HoosierDragon)
  Author URI: http://www.terryobrien.me/
  License: GPLv2
 */

/*
  Copyright (C) 2014-2015 Terry O'Brien

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

class avpTextToggle
{
    public function __construct()
    {
        add_action( 'admin_init', array( $this, 'avp_texttoggle_admin_init' ) );

        add_shortcode( 'tt', array( $this, 'avp_texttoggle_shortcode' ) );
        add_shortcode( 'tt_all', array( $this, 'avp_texttoggle_all_shortcode' ) );
        add_shortcode( 'tt_part', array( $this, 'avp_texttoggle_part_shortcode' ) );

        wp_register_script( 'avp-texttoggle-js', ( plugins_url( 'js/avp-texttoggle-min.js', __FILE__ ) ), array( 'jquery' ) );
        wp_register_script( 'avp-texttoggle-js-all', ( plugins_url( 'js/avp-texttoggle-all-min.js', __FILE__ ) ), array( 'jquery' ) );
        wp_register_script( 'avp-texttoggle-js-part', ( plugins_url( 'js/avp-texttoggle-part-min.js', __FILE__ ) ), array( 'jquery' ) );

        wp_register_style( 'avp-texttoggle-css', ( plugins_url( 'css/avp-texttoggle-min.css', __FILE__ ) ) );
    }

    function avp_texttoggle_shortcode( $attributes, $content = null )
    {
        $return = '';

        extract( shortcode_atts( array( 'class' => null, 'style' => null, 'title' => null ), $attributes ) );

        if ( ( ! is_null( $title ) ) && ( ! is_null( $content ) ) )
        {
            wp_enqueue_script( 'avp-texttoggle-js' );
            wp_enqueue_style( 'avp-texttoggle-css' );

            $return .= '<a href="javascript:void(0);" title="Click here to show or hide text." class="tt-link">';

            if ( ( ! is_null( $class ) ) && ctype_alnum( $class ) )
            {
                $return .= '<span class="tt-span tt-span-show tt-span-show-' . $class . '">&#x25BA;</span>';
                $return .= '<span class="tt-span tt-span-hide tt-span-hide-' . $class . '">&#x25BC;</span>';
            }
            else
            {
                $return .= '<span class="tt-span tt-span-show">&#x25BA;</span>';
                $return .= '<span class="tt-span tt-span-hide">&#x25BC;</span>';
            }

            $return .= '&nbsp;' . $title . '</a>';

            /*
             *  Create <div> statement, including class and style optional parameters
             */
            $return .= '<div ';

            if ( ( ! is_null( $class ) ) && ctype_alnum( $class ) )
            {
                $return .= 'class="tt-div tt-div-' . $class . '" ';
            }
            else
            {
                $return .= 'class="tt-div" ';
            }

            if ( ! is_null( $style ) )
            {
                $valid = array( 'background-color', 'border', 'border-color', 'border-radius', 'border-size', 'border-style', 'color', );

                $return .= 'style="';
                foreach ( $valid as $entry )
                {
                    if ( preg_match( "/(^|;\s*)($entry)\s*:\s*([0-9a-z!# ]+)\s*;?/i", $style, $matches ) )
                    {
                        $return .= $matches[ 2 ] . ':' . $matches[ 3 ] . ';';
                    }
                }
                $return .= '" ';
            }

            $return .= '>' . $content . '</div>';
        }

        return( $return );
    }

    function avp_texttoggle_all_shortcode()
    {
        $return = '';

        wp_enqueue_script( 'avp-texttoggle-js-all' );
        wp_enqueue_style( 'avp-texttoggle-css' );

        $return .= '<div>';
        $return .= '<a href="javascript:void(0);" title="Click here to show or hide all text." class="tt-link-all" >';
        $return .= '<span class="tt-span tt-span-all-show">&#x25BA;</span>';
        $return .= '<span class="tt-span tt-span-all-hide">&#x25BC;</span>';
        $return .= '&nbsp;Show / Hide All</a>';
        $return .= '</div>';

        return( $return );
    }

    function avp_texttoggle_part_shortcode( $attributes )
    {
        $return = '';

        extract( shortcode_atts( array( 'title' => null, 'class' => null ), $attributes ) );

        if ( ( ! is_null( $title ) ) && ( ! is_null( $class ) ) && ( ctype_alnum( $class ) ) )
        {
            wp_enqueue_script( 'avp-texttoggle-js-part' );
            wp_enqueue_style( 'avp-texttoggle-css' );

            $return .= '<div>';
            $return .= '<a href="javascript:void(0);" title="Click here to show or hide all ' . $title . ' section text." class="tt-link-part" id="' . $class . '" >';
            $return .= '<span class="tt-span tt-span-part-show tt-span-part-show-' . $class . '">&#x25BA;</span>';
            $return .= '<span class="tt-span tt-span-part-hide tt-span-part-hide-' . $class . '">&#x25BC;</span>';
            $return .= '&nbsp;Show / Hide All ' . $title . '</a>';
            $return .= '</div>';
        }

        return( $return );
    }

    /*
     *  Add functionality to put the links in the plugin listing entry
     */
    function avp_texttoggle_admin_init()
    {
        global $pagenow;

        /*
         *  Add details to the plugin description
         *  Details only appear when plugin is activated
         */
        if ( in_array( $pagenow, array( 'plugins.php', ) ) )
        {
            add_filter( 'plugin_row_meta', array( $this, 'avp_texttoggle_admin_init_meta_links' ), 10, 2 );
        }
    }

    /*
     *  Add links to plugin description section
     */
    function avp_texttoggle_admin_init_meta_links( $links, $file )
    {
        /*
         *  Use basename for parent sub-directory name and file name, must be same
         */
        if ( basename( __FILE__ ) == basename( $file ) )
        {
            /*
             *  Using array_push puts the Download and Donate link at the end of the sequence
             */
            array_push( $links, '<a href="http://wordpress.org/extend/plugins/text-toggle/">Download</a>' );
            array_push( $links, '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=s-xclick&hosted_button_id=THLBLFT4BV7E2">Donate</a>' );
        }

        return $links;
    }

}

$avpTextToggle = new avpTextToggle();
?>