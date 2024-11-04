<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_shopping_cart.php 2024-10-26 15:22:39Z webchills $
 */
$content = '';

$content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">';

if ($_SESSION['cart']->count_contents() > 0) {
    // -----
    // zc158 uses a renamed definition for the value, use it if present else use the legacy
    // definition.
    //
    $quantity_suffix = (defined('CART_QUANTITY_SUFFIX')) ? CART_QUANTITY_SUFFIX : BOX_SHOPPING_CART_DIVIDER;

    $content .= '<ul class="list-group list-group-flush">';
    $products = $_SESSION['cart']->get_products();
    foreach ($products as $product) {
        $content .= '<li class="list-group-item">';

        $content .= $product['quantity'] . $quantity_suffix . '<a href="' . zen_href_link(zen_get_info_page($product['id']), 'products_id=' . $product['id']) . '">';

        $content .= $product['name'] . '</a></li>';

        if (isset($_SESSION['new_products_id_in_cart']) && $_SESSION['new_products_id_in_cart'] == $product['id']) {
            $_SESSION['new_products_id_in_cart'] = '';
        }
    }
    $content .= '</ul>';
} else {
    $content .= '<div id="cartBoxEmpty">' . BOX_SHOPPING_CART_EMPTY . '</div>';
}

if ($_SESSION['cart']->count_contents() > 0) {
    $content .= '<div class="cartBoxTotal font-weight-bold text-right pr-3">' . $currencies->format($_SESSION['cart']->show_total()) . '</div>';
    $content .= '<div class="p-3"></div>';
}

if (zen_is_logged_in() && !zen_in_guest_checkout()) {
    $gv_query = "SELECT amount
                 FROM " . TABLE_COUPON_GV_CUSTOMER . "
                 WHERE customer_id = " . $_SESSION['customer_id'];
    $gv_result = $db->Execute($gv_query);

    if (!$gv_result->EOF && $gv_result->fields['amount'] > 0 ) {
        $content .= '<div id="cartBoxGVButton" class="text-center p-2">' . zca_button_link(zen_href_link(FILENAME_GV_SEND, '', 'SSL'), BUTTON_SEND_A_GIFT_CERT_ALT, 'button_send_a_gift_cert') . '</div>';
        $content .= '<div id="cartBoxVoucherBalance" class="text-center p-2">' . VOUCHER_BALANCE . $currencies->format($gv_result->fields['amount']) . '</div>';
    }
}

$content .= '</div>';
