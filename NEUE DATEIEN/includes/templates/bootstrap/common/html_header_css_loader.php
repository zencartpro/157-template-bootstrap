<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * Zen Cart German Specific (158 code in 157 / zencartpro adaptations)
 * Common Template
 *
 * outputs the html header's css file
 * 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: html_header_css_loader.php 2026-10-10 08:47:39Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// -----
// First, load the template's CSS variables formatter.
//
require $template->get_template_dir('^bootstrap_color_vars.php', DIR_WS_TEMPLATE, $current_page_base, 'css') . '/bootstrap_color_vars.php';


/**
 * load all template-specific stylesheets, named like "style*.css", alphabetically
 */
$directory_array = $template->get_template_part($template->get_template_dir('^style.*\.css', DIR_WS_TEMPLATE, $current_page_base, 'css'), '/^style/', '.css');
foreach ($directory_array as $value) {
    echo '<link rel="stylesheet" href="' . zen_add_filemtime($template->get_template_dir('^' . $value, DIR_WS_TEMPLATE, $current_page_base, 'css') . '/' . $value) . '">' . "\n";
}

/**
 * load stylesheets on a per-page/per-language/per-product/per-manufacturer/per-category basis. Concept by Juxi Zoza.
 */
$manufacturers_id = $_GET['manufacturers_id'] ?? '';
$tmp_products_id = (int)($_GET['products_id'] ?? 0);
$tmp_pagename = ($this_is_home_page) ? 'index_home' : $current_page_base;
if ($current_page_base === 'page' && isset($ezpage_id)) {
    $tmp_pagename = $current_page_base . (int)$ezpage_id;
}
$sheets_array = [
    '/' . $_SESSION['language'] . '_stylesheet',
    '/' . $tmp_pagename,
    '/' . $_SESSION['language'] . '_' . $tmp_pagename,
    '/c_' . $cPath,
    '/' . $_SESSION['language'] . '_c_' . $cPath,
    '/m_' . $manufacturers_id,
    '/' . $_SESSION['language'] . '_m_' . (int)$manufacturers_id,
    '/p_' . $tmp_products_id,
    '/' . $_SESSION['language'] . '_p_' . $tmp_products_id,
];
foreach ($sheets_array as $value) {
    $perpagefile = $template->get_template_dir('^' . $value . '.css', DIR_WS_TEMPLATE, $current_page_base, 'css') . $value . '.css';
    if (file_exists($perpagefile)) {
        echo '<link rel="stylesheet" href="' . zen_add_filemtime($perpagefile) . '">' . "\n";
    }
}

/**
 *  custom category handling for a parent and all its children ... works for any c_XX_XX_children.css  where XX_XX is any parent category
 */
$tmp_cats = explode('_', $cPath);
$value = '';
foreach ($tmp_cats as $val) {
    $value .= $val;
    $ppfile = 'c_' . $value . '_children.css';
    $perpagefile = $template->get_template_dir('^' . $ppfile, DIR_WS_TEMPLATE, $current_page_base, 'css') . '/' . $ppfile;
    if (file_exists($perpagefile)) {
        echo '<link rel="stylesheet" href="' . zen_add_filemtime($perpagefile) . '">' . "\n";
    }
    $ppfile = $_SESSION['language'] . '_c_' . $value . '_children.css';
    $perpagefile = $template->get_template_dir('^' . $ppfile, DIR_WS_TEMPLATE, $current_page_base, 'css') . '/' . $ppfile;
    if (file_exists($perpagefile)) {
        echo '<link rel="stylesheet" href="' . zen_add_filemtime($perpagefile) . '">' . "\n";
    }
    $value .= '_';
}

/**
 * load printer-friendly stylesheets -- named like "print*.css", alphabetically
 */
$directory_array = $template->get_template_part($template->get_template_dir('^print.*\.css', DIR_WS_TEMPLATE, $current_page_base, 'css'), '/^print/', '.css');
foreach ($directory_array as $value) {
    echo '<link rel="stylesheet" media="print" href="' . zen_add_filemtime($template->get_template_dir('^' . $value, DIR_WS_TEMPLATE, $current_page_base, 'css') . '/' . $value) . '">' . "\n";
}

/**
 * load all DYNAMIC template-specific stylesheets, named like "style*.php", alphabetically
 */
$directory_array = $template->get_template_part($template->get_template_dir('^style.*\.php', DIR_WS_TEMPLATE, $current_page_base, 'css'), '/^style/', '.php');
foreach ($directory_array as $value) {
    require $template->get_template_dir('^' . $value, DIR_WS_TEMPLATE, $current_page_base, 'css') . '/' . $value;
}

// -----
// Site-specific styles come last. For Zen Cart versions *prior to* v2.0.1, continue
// to look *specifically* in the current template; for v2.0.1 and later, use the $template
// class to locate that file.
//
$zca_zcversion = zen_get_zcversion();
if (substr($zca_zcversion, 0, 1) === '1' || version_compare($zca_zcversion, '2.0.1', '<')) {
    $user_styles = DIR_WS_TEMPLATE . 'css/site_specific_styles.php';
    if (file_exists($user_styles)) {
        require $user_styles;
    }
} else {
    $user_styles = $template->get_template_dir('^site_specific_styles.php', DIR_WS_TEMPLATE, $current_page_base, 'css') . '/site_specific_styles.php';
    if (file_exists($user_styles)) {
        require $user_styles;
    }
}
