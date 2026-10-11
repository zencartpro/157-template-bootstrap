<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_advanced_search_result_default.php 2026-10-11 17:22:39Z webchills $
 */
?>
<div id="advancedSearchResultDefault" class="centerColumn">
    <h1 id="advancedSearchResultDefault-pageHeading" class="pageHeading"><?= HEADING_TITLE ?></h1>
<?php
if ($messageStack->size('search') > 0) {
    echo $messageStack->output('search');
}
?>
    <div id="search-result-forms" class="row">
<?php
if ($do_filter_list || $tplSetting->PRODUCT_LIST_ALPHA_SORTER === 'true') {
?>
        <div id="search-result-filter-form" class="col-md-6">
            <?= zen_draw_form('filter', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT), 'get') ?>
<?php
   // -----
    // Don't include 'disp_order' and 'sort' if defaulted.
    //
    if (empty($_GET['disp_order'])) {
        unset($_GET['disp_order']);
    }
    if (!empty($_GET['sort']) && $_GET['sort'] === '20a') {
        unset($_GET['sort']);
    }

    /* Redisplay all $_GET variables, except currency and page */
    echo zen_post_all_get_params(['currency', 'page']);
?>
            <div id="advancedSearchResultDefault-sorterRow" class="row mb-3">
                <?php require DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING_ALPHA_SORTER); ?>
            </div>
            <?= '</form>' ?>
        </div>
<?php
}

// -----
// Zen Cart versions prior to 2.2.0 don't include the display-order sort, so neither
// does this template when run on an earlier version.
//
if (version_compare(zen_get_zcversion(), '1.5.6', '>')) {
?>
        <div id="search-result-disp-order" class="col-md-6">
<?php
    require $template->get_template_dir('/tpl_modules_listing_display_order.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_listing_display_order.php';
?>
        </div>
<?php
}
?>
    </div>
<?php
/**
 * Used to collate and display products from advanced search results
 */
require $template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_product_listing.php';
?>
</div>
