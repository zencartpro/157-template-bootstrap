<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_categories_tabs.php 2026-10-10 15:22:39Z webchills $
 */
include DIR_WS_MODULES . zen_get_module_directory(FILENAME_CATEGORIES_TABS);

if ($tplSetting->CATEGORIES_TABS_STATUS === '1' && (!empty($links_list) || !empty($links_list_by_category))) {
?>
<div id="categoriesTabs" class="d-none d-lg-block">
    <nav class="nav nav-pills nav-fill" id="navCatTabs">
<?php
    foreach (($links_list_by_category ?? $links_list) as $link_key => $link_val) {
        // Since v2.1.0, if $links_list_by_category is not empty,
        // then $link_key is the category_id prefixed by the letter 'c'.
        // So, $category_id = ltrim($link_key, 'c')
        // ... which can then be used to query alternate details about the category or its products
        // ... and therefore can be used inside this loop to do more things with this menu
        echo $link_val;
    }
?>
    </nav>
</div>
<?php
}
