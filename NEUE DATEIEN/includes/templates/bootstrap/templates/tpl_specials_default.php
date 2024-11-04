<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_specials_default.php 2024-10-26 17:22:39Z webchills $
 */
?>
<div id="specialsDefault" class="centerColumn">
    <h1 id="specialsDefault-pageHeading" class="pageHeading">
        <?= HEADING_TITLE ?>
<?php
if (!empty($_GET['sale_category'])) {
    echo ' : ' . zen_get_category_name((int)$_GET['sale_category']);
}
?>
    </h1>
<?php
/**
 * Display the product sort dropdown, for Zen Cart versions 2.0.0 and later *only*.
 * Earlier Zen Cart versions do not recognize the display-order variable when performing
 * the page's query for the products' listing.
 */
if (PROJECT_VERSION_MAJOR > 1) {
    require $template->get_template_dir('/tpl_modules_listing_display_order.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_listing_display_order.php';
}

/**
 * require the list_box_content template to display the products
 */
require $template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_product_listing.php';
?>
</div>
