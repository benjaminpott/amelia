<?php

/*
 * last updated: 30/03/2014
 *
 */

// Theme Elements
require_once('includes/theme_globals.php'); // <-- gloabl variables
require_once('includes/theme_scripts.php'); // <-- enques scripts to header
require_once('includes/theme_menus.php'); // <-- menus
require_once('includes/theme_google_fonts.php'); // <-- theme options to reference upto three google fonts
require_once('includes/theme_customizer.php'); // <-- theme customizer
require_once('includes/theme_style.php'); // <-- dynamic stylesheets
require_once('includes/theme_parts.php'); // <-- theme customizer rows use fx_theme_row, fx_theme_section or fx_theme_part

// Common Functions (fx_...php) <-- from out functions libary
require_once('includes/fx_convert_color.php');
require_once('includes/fx_onclick.php');
require_once('includes/fx_encrypt.php');
require_once('includes/fx_orbit.php');

// Custom Functions (fx_...php) <-- developed just for this variation

// Navicagation (nav_...php)

// Custom Post Types (cpt_...php)

// Custom Taxonomies (tax_...php)
require_once('includes/tax_img_cat.php');

// Custom Meta (meta_...php)

?>