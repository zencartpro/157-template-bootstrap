<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_advanced_search_result_default.php 2024-11-04 15:22:39Z webchills $
 */
?>
<div id="advancedSearchResultDefault" class="centerColumn">
    <h1 id="advancedSearchResultDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>
<?php
if ($do_filter_list || PRODUCT_LIST_ALPHA_SORTER === 'true') {
?>
    <?php echo zen_draw_form('filter', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT), 'get') . zen_post_all_get_params('currency'); ?>
        <div id="advancedSearchResultDefault-sorterRow" class="row mb-3">
            <?php require DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING_ALPHA_SORTER); ?>
        </div>
    <?php echo '</form>'; ?>
<?php
}

/**
 * Used to collate and display products from advanced search results
 */
require $template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/' . 'tpl_modules_product_listing.php';
?>
</div>
