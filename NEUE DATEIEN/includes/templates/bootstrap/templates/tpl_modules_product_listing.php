<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_product_listing.php 2024-10-26 17:22:39Z webchills $
 */
require DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING);
// -----
// v3.6.4 adds a configuration setting to override the "Add Selected to Cart"
// button's default positioning.  The default, if not yet configured, is 'Always'.
//
if (!defined('BS4_FLOAT_ADD_SELECTED')) {
    define('BS4_FLOAT_ADD_SELECTED', 'Always');
}
switch (BS4_FLOAT_ADD_SELECTED) {
    case 'Never':
        $top_button_extra_class = '';
        $bottom_button_extra_class = '';
        break;
    case 'Small Devices Only':
        $top_button_extra_class = 'bs4-button-float sm-only';
        $bottom_button_extra_class = 'bs4-button-hide-sm';
        break;
    default:
        $top_button_extra_class = 'bs4-button-float always';
        $bottom_button_extra_class = 'd-none';
        break;
}
?>
<div id="productsListing" class="listingCenterColumn">
<?php
if ($show_top_submit_button === true) {
?>
    <div id="productsListing-btn-toolbarTop" class="btn-toolbar justify-content-end my-3" role="toolbar">
        <?= zen_image_submit(BUTTON_IMAGE_ADD_PRODUCTS_TO_CART, BUTTON_ADD_PRODUCTS_TO_CART_ALT, 'id="submit1" name="submit1"', $top_button_extra_class) ?>
    </div>
<?php
} // show top submit
?>
<?php 
if ($listing_split->number_of_rows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
?>
    <div id="productsListing-topRow" class="d-flex align-items-center justify-content-between flex-column flex-md-row">
        <div id="productsListing-topNumber" class="topNumber"><?= $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS) ?></div>
        <div id="productsListing-topLinks" class="topLinks">
            <?= TEXT_RESULT_PAGE . $listing_split->display_links($max_display_page_links, zen_get_all_get_params(['page', 'info', 'x', 'y', 'main_page']), $paginateAsUL) ?>
        </div>
    </div>
<?php
}
?>
<?php
/**
 * load the list_box_content template to display the products
 */
if (in_array($product_listing_layout_style, ['columns', 'fluid'])) {
    require $template->get_template_dir('tpl_columnar_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_columnar_display.php';
} else {
    require $template->get_template_dir('tpl_tabular_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_tabular_display.php';
}
?>
<?php 
if ($listing_split->number_of_rows && (PREV_NEXT_BAR_LOCATION == '2' || PREV_NEXT_BAR_LOCATION == '3')) {
?>
    <div id="productsListing-bottomRow" class="d-flex align-items-center justify-content-between flex-column flex-md-row">
        <div id="productsListing-bottomNumber" class="bottomNumber"><?= $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS) ?></div>
        <div id="productsListing-bottomLinks" class="bottomLinks">
            <?= TEXT_RESULT_PAGE . $listing_split->display_links($max_display_page_links, zen_get_all_get_params(['page', 'info', 'x', 'y']), $paginateAsUL) ?>
        </div>
    </div>
<?php
}
?>
<?php
if ($show_bottom_submit_button == true) {
?>
    <div id="productsListing-btn-toolbarBottom" class="btn-toolbar justify-content-end my-3" role="toolbar">
        <?= zen_image_submit(BUTTON_IMAGE_ADD_PRODUCTS_TO_CART, BUTTON_ADD_PRODUCTS_TO_CART_ALT, 'id="submit2" name="submit1"', $bottom_button_extra_class) ?>
    </div>
<?php
} // show_bottom_submit_button
?>
</div>
<?php
// if ($show_top_submit_button == true or $show_bottom_submit_button == true or (PRODUCT_LISTING_MULTIPLE_ADD_TO_CART != 0 and $show_submit == true and $listing_split->number_of_rows > 0)) {
if ($show_top_submit_button == true || $show_bottom_submit_button == true) {
    echo '</form>';
}
