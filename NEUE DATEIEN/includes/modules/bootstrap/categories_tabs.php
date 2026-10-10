<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: categories_tabs.php 2026-10-10 15:14:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

$includeAllCategories = $zca_include_zero_product_categories ?? true;
$link_class_active = 'nav-item nav-link m-1 activeLink';
$link_class_inactive = 'nav-item nav-link m-1';
$span_wrapper_for_active = '';

// -----
// If running a ZC version >= 2.1.0, the above variables will be used
// by the base module to gather the information for the category tabs.
//
if (zen_get_zcversion() >= '2.1.0') {
    require DIR_WS_MODULES . 'categories_tabs.php';
    return;
}

// -----
// For ZC versions < 2.1.0, gather the information for the category tabs
// in this module.
//
$categories_tab_query =
    "SELECT c.sort_order, c.categories_id, cd.categories_name
       FROM " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd
      WHERE c.categories_id = cd.categories_id
        AND c.parent_id = " . (int)TOPMOST_CATEGORY_PARENT_ID . "
        AND cd.language_id = " . (int)$_SESSION['languages_id'] . "
        AND c.categories_status = 1
      ORDER BY c.sort_order, cd.categories_name";
$categories_tab = $db->Execute($categories_tab_query);

$links_list = [];
$current_category_tab = (int)$cPath;
foreach ($categories_tab as $category) {
    // currently selected category
    if ($current_category_tab === (int)$category['categories_id']) {
        $new_style = $link_class_active;
        $categories_tab_current = $category['categories_name'];
    } else {
        if (!$includeAllCategories) {
            $count = zen_products_in_category_count($category['categories_id']);
            if ($count === 0) {
                continue;
            }
        }
        $new_style = $link_class_inactive;
        $categories_tab_current = $category['categories_name'];
    }
    // create link to top level category
    $links_list[] =
        '<a class="' . $new_style . '" href="' . zen_href_link(FILENAME_DEFAULT, 'cPath=' . (int)$category['categories_id']) . '">' .
            $categories_tab_current .
        '</a> ';
}
