<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_listing_dispaly_order.php 2024-10-26 17:22:39Z webchills $
 */
$disp_order = (int)($disp_order ?? 0);
if ($disp_order <= 0 || $disp_order > 8) {
    $disp_order = 8;
}

// -----
// Language constant, added in v200, define here if not previously defined; can be
// removed once support for ZC versions < 2.0.0 is dropped.
//
if (!defined('TEXT_INFO_SORT_BY_RECOMMENDED')) {
    define('TEXT_INFO_SORT_BY_RECOMMENDED', 'Recommended');
}
// NOTE: to remove a sort order option add a PHP comment around the option to be removed
$display_order_options = [
    ['id' => '8', 'text' => TEXT_INFO_SORT_BY_RECOMMENDED],
    ['id' => '1', 'text' => TEXT_INFO_SORT_BY_PRODUCTS_NAME],
    ['id' => '2', 'text' => TEXT_INFO_SORT_BY_PRODUCTS_NAME_DESC],
    ['id' => '3', 'text' => TEXT_INFO_SORT_BY_PRODUCTS_PRICE],
    ['id' => '4', 'text' => TEXT_INFO_SORT_BY_PRODUCTS_PRICE_DESC],
    ['id' => '5', 'text' => TEXT_INFO_SORT_BY_PRODUCTS_MODEL],
    ['id' => '6', 'text' => TEXT_INFO_SORT_BY_PRODUCTS_DATE_DESC],
    ['id' => '7', 'text' => TEXT_INFO_SORT_BY_PRODUCTS_DATE],
];
?>
<div id="listingDisplayOrderSorter" class="row">
    <label for="disp-order-sorter" class="mb-0 mt-1 mx-2"><?= TEXT_INFO_SORT_BY ?></label>
<?php
$excluded_get_params = [
    'disp_order',
];
if (!isset($_GET['cPath'], $cPath)) {
    $excluded_get_params[] = 'cPath';
}
echo
    zen_draw_form('sorter_form', zen_href_link($_GET['main_page']), 'get', 'class="form-inline"') .
        zen_post_all_get_params($excluded_get_params) .
        zen_hide_session_id() .
        zen_draw_pull_down_menu('disp_order', $display_order_options, $disp_order, 'id="disp-order-sorter" onchange="this.form.submit();"') .
    '</form>';
?>
</div>
