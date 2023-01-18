<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Classic City Consulting
 * Plugin URI:        https://classiccity.com
 * Description:       All default functionality for CCC
 * Version:           1.0.0
 * Author:            Classic City Consulting
 * Author URI:        https://classiccity.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       classic-city-consulting
 * Domain Path:       /languages
 */

define("CCC_PLUGIN_PATH",plugin_dir_path(__FILE__));
define('CCC_THEME_PATH',get_stylesheet_directory());

function ccc_prefix() { return "ccc"; }

// Local ACF JSON
require('acf-json/load.php');

// Custom blocks
require('acf-blocks/load.php');

// Google Fonts Picker for ACF
require('acf-google-fonts/load.php');

// Load in license key
require('key/load.php');

// Custom field types
require('acf-custom-field-types/colors.php');
require('acf-custom-field-types/spacing.php');
require('acf-custom-field-types/width.php');

// Theming
require('theming/load.php');
require('theming/ui-elements.php');

// Components
require('testimonials/load.php');
require('team/load.php');
require('podcast/load.php');

// On activation
register_activation_hook( __FILE__, 'ccc_on_plugin_activation' );
//ccc_on_plugin_activation();