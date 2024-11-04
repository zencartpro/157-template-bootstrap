<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_products_all_default.php 2024-11-04 17:22:39Z webchills $
 */
?>
<div id="productsAllDefault" class="centerColumn">
    <h1 id="productsAllDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>
    <div class="row">
<?php
if (PRODUCT_LIST_ALPHA_SORTER === 'true') {
?>
        <div class="col">
<?php
    echo zen_draw_form('filter', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT), 'get', 'class="form-inline"');
    echo '<label class="inputLabel mx-2">' . TEXT_SHOW . '</label>';

    /* Redisplay all $_GET variables, except currency */
    echo zen_post_all_get_params('currency');

    require DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING_ALPHA_SORTER);

    echo '</form>';
?>
        </div>
<?php
}
?>
        <div class="col">
<?php
require $template->get_template_dir('/tpl_modules_listing_display_order.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_listing_display_order.php';
?>
        </div>
    </div>
<?php
require $template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_product_listing.php';
?>
</div>
