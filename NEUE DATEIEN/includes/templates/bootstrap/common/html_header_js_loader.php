<?php
/**
 * Common Template
*
 * BOOTSTRAP 3.7.3
 *
 * NOTE: This module can be removed from the template once support for Zen Cart
 * versions less than v2.1.0 is dropped! Unless, of course, there are site-specific
 * changes made!
 *
 * Outputs the html header's jscript files.
 *
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2024 Feb 11 Modified in v2.0.0-beta1 $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// -----
// If the site's Zen Cart version provides the 'common' JS loader is present(i.e. zc210+), use that.
//
if (file_exists(DIR_WS_TEMPLATES . 'template_default/common/html_header_js_loader.php')) {
    require DIR_WS_TEMPLATES . 'template_default/common/html_header_js_loader.php';
    return;
}

/**
 * load all site-wide jscript_*.js files from includes/templates/YOURTEMPLATE/jscript, alphabetically
 */
$directory_array = $template->get_template_part($template->get_template_dir('.js',DIR_WS_TEMPLATE, $current_page_base,'jscript'), '/^jscript_/', '.js');
foreach ($directory_array as $value) {
    echo '<script src="' .  $template->get_template_dir('.js', DIR_WS_TEMPLATE, $current_page_base, 'jscript') . '/' . $value . '"></script>' . "\n";
}

/**
 * load all page-specific jscript_*.js files from includes/modules/pages/PAGENAME, alphabetically
 */
$directory_array = $template->get_template_part($page_directory, '/^jscript_/', '.js');
foreach ($directory_array as $value) {
    echo '<script src="' . $page_directory . '/' . $value . '"></script>' . "\n";
}

/**
 * load all site-wide jscript_*.php files from includes/templates/YOURTEMPLATE/jscript, alphabetically
 */
$directory_array = $template->get_template_part($template->get_template_dir('.php', DIR_WS_TEMPLATE, $current_page_base, 'jscript'), '/^jscript_/', '.php');
foreach ($directory_array as $value) {
    /**
     * include content from all site-wide jscript_*.php files from includes/templates/YOURTEMPLATE/jscript, alphabetically.
     * These .PHP files can be manipulated by PHP when they're called, and are copied in-full to the browser page
     */
    require $template->get_template_dir('.php', DIR_WS_TEMPLATE, $current_page_base, 'jscript') . '/' . $value;
    echo "\n";
}

/**
 * include content from all page-specific jscript_*.php files from includes/modules/pages/PAGENAME, alphabetically.
 */
$directory_array = $template->get_template_part($page_directory, '/^jscript_/');
foreach ($directory_array as $value) {
    /**
     * include content from all page-specific jscript_*.php files from includes/modules/pages/PAGENAME, alphabetically.
     * These .PHP files can be manipulated by PHP when they're called, and are copied in-full to the browser page
     */
    require $page_directory . '/' . $value;
    echo "\n";
}
