=== Text Toggle ===

Contributors: Terry O'Brien (HoosierDragon)
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=s-xclick&hosted_button_id=THLBLFT4BV7E2
Tags: text, toggle, jQuery
Requires at least: 2.9.2
Tested up to: 4.3
Stable tag: 1.2
Version: 1.2
Author: Terry O'Brien
Author link: http://www.terryobrien.com
License: GPL v2.0

== Description ==

A very simple shortcode series to create a text area which can be hidden or displayed based on a click on the title. Text areas by default are hidden.

This shortcode series uses jQuery functionality to a) determine which text areas are to be toggled and b) toggle them. 

= Use =

Basic use is to surround a block of text with the "[tt]" shortcode and specify a title parameter within the shortcode. The title will be shown on the page, preceeded by an indicator whether the associated text area is hidden (►) or shown (▼). Clicking the title link will toggle the display of the dependant text area, as well as toggle the indicator.

Groups of text areas can be shown or hidden at once through the "[tt_part]" and "[tt_all]" shortcodes. 

The "[tt_part]" shortcode uses a required parameter named "class" that links it to all "[tt]" shortcodes and their associated text areas with the same class parameter. Clicking the "[tt_part]" title link will toggle all associated text areas and any "[tt_part]" shortcode links with the same class according to the status of the parent shortcode. Text areas of this section that are already displayed when the parent link is clicked will remain displayed, and vice versa with hidden text areas.

The "[tt_all]" shortcode will toggle all "[tt]" shortcode text areas, any intermediate "[tt_part]" links and any mirrored "[tt_all]" links, according to the status of the particular title link. Text areas that are already displayed when the overall link is clicked to display all the text areas will remain displayed, and vice versa with hidden text areas.

Both the "[tt_part]" and "[tt_all]" shortcodes may be placed anywhere on the web page and can be used multiple times on the same web page. 

= Parameters =

The "[tt]" shortcode has one required parameter and two optional parameters, plus the required content of the shortcode.

* The "class" parameter is optional: this links the particular text area with the "[tt_part]" shortcode, which can display or hide groups of text areas. This parameter must consist of only letters and numbers.
* The "style" parameter is optional: this allows the author to apply CSS style components to the given shortcode content, which will only be visible when the content is made visible. Style components are limited to anything that applies to the area surrounding and including the area to be displayed and are limited to the following: background-color, border, border-color, border-radius, border-size, border-style, and color. Any other style components or any other text will be ignored. 
* The "title" parameter is required: this what is displayed as the title of the text area and is used as the control link. 

The "[tt_part]" short code has two required parameters; it does not use any content.

* The "class" parameter is required: this is the link to all associated "[tt]" text areas. This parameter must consist of only letters and numbers.
* The "title" parameter is required: this what is displayed as the title of the control link, preceded by "Show / Hide All".

The "[tt_all]" short code has no parameters and it does not use any content.

== Installation ==

1. Unzip 'avp-texttoggle.zip' inside the '/wp-content/plugins/' directory or install the plugin via the built-in WordPress plugin installer.
2. Activate the plugin through the WordPress 'Plugins' admin page.

== Frequently Asked Questions ==

= What can be included in the text area? =

In addition to straight text, the text area can include images.

== Screenshots ==

All of the screen shots are taken a condensed version of my resume page.

1. Default display, all text areas are hidden. 
2. One text area ("Shipping Clerk") selected / shown
3. One text section ("Miscellaneous") selected / shown
4. All text area selected / shown

== Changelog ==

= 1.2 =

* Add optional styling parameters to the [tt] shortcode.

= 1.1 =

* Re-cast code as class
* Re-arrange script and stylesheet registration and queuing functions to reduce function calls
* Prep for release to WordPress repository

= 1.0 =

* Initial (internal) Release

== Upgrade Notice ==

= 1.2 =

Added "style" parameter to the [tt] shortcode. A short set of CSS style codes may be applied to individual text segments.

= 1.1 =

No functional change from the previous version.
