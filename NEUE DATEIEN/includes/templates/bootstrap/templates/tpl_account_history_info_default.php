<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_account_history_info_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="accountHistoryInfoDefault" class="centerColumn">
    <div id="orderInformation-card" class="card mb-3">
        <h4 id="orderInformation-card-header" class="card-header">
            <?= HEADING_ORDER_DATE . ' ' . zen_date_long($order->info['date_purchased']) ?>
        </h4>
        <div id="orderInformation-card-body" class="card-body p-3">
<?php
if ($current_page_base !== FILENAME_CHECKOUT_SUCCESS) {
?>
            <h4 id="orderHistoryDetailedOrder">
                <?= HEADING_TITLE . ORDER_HEADING_DIVIDER . sprintf(HEADING_ORDER_NUMBER, zen_output_string_protected($_GET['order_id'])) ?>
            </h4>
<?php
}

// -----
// Give a watching observer the ability to add table-column headings.
//
$extra_headings = [];
$zco_notifier->notify('NOTIFY_ACCOUNT_HISTORY_INFO_EXTRA_COLUMN_HEADING', $order, $extra_headings);
?>
            <div class="table-responsive">
<?php
// -----
// Determine if there are 'tax_group's associated with the order.  If not, display
// the 'Products' column in two columns to ensure alignment of the order-totals' values.
//
$tax_column_present = (!empty($order->info['tax_groups']));
$products_colspan = ($tax_column_present) ? '' : ' colspan="2"';
?>
                <table id="orderHistory-orderTableDisplay" class="orderTableDisplay table table-bordered table-striped">
                    <tr id="orderHistory-tableHeading" class="tableHeading">
                        <th scope="col" id="orderHistory-qtyHeading"><?= HEADING_QUANTITY ?></th>
                        <th scope="col" id="orderHistory-productHeading"<?= $products_colspan ?>><?= HEADING_PRODUCTS ?></th>
<?php
if ($tax_column_present) {
?>
                        <th scope="col" id="orderHistory-taxHeading"><?= HEADING_TAX ?></th>
<?php
}
?>
                        <th scope="col" id="orderHistory-totalHeading"><?= HEADING_TOTAL ?></th>
<?php
if (is_array($extra_headings)) {
    foreach ($extra_headings as $heading_info) {
        $params = empty($heading_info['params']) ? '' : " {$heading_info['params']}";
?>
        <th scope="col"<?= $params ?>><?= $heading_info['text'] ?></th>
<?php
    }
}
?>
                    </tr>
<?php
foreach ($order->products as $product) {
    // -----
    // Give a watching observer the ability to include additional data for the header-columns
    // it's defined via the 'NOTIFY_ACCOUNT_HISTORY_INFO_EXTRA_COLUMN_HEADING' notification.
    //
    $extra_data = [];
    $zco_notifier->notify('NOTIFY_ACCOUNT_HISTORY_INFO_EXTRA_COLUMN_DATA', ['order' => $order, 'orders_product' => $product], $extra_data);
?>
                    <tr>
                        <td class="qtyCell"><?= $product['qty'] . CART_QUANTITY_SUFFIX ?></td>
                        <td class="productCell"<?= $products_colspan ?>><?= $product['name'] ?>
<?php
    if (!empty($product['attributes'])) {
?>
                            <div class="productCell-attributes">
                                <ul>
<?php
        foreach ($product['attributes'] as $attribute) {
?>
                                    <li><?= $attribute['option'] . TEXT_OPTION_DIVIDER . nl2br(zen_output_string_protected($attribute['value'])) ?></li>
<?php
        }
?>
                                </ul>
                            </div>
<?php
    }
?>
                        </td>
<?php
    if ($tax_column_present) {
?>
                        <td class="taxCell"><?= zen_display_tax_value($product['tax']) . '%' ?></td>
<?php
    }
?>
                        <td class="totalCell">
<?php
    $ppe = zen_round(zen_add_tax($product['final_price'], $product['tax']), $currencies->get_decimal_places($order->info['currency']));
    $ppt = $ppe * $product['qty'];
    echo $currencies->format($ppt, true, $order->info['currency'], $order->info['currency_value']);
    if ($product['onetime_charges'] != 0) {
        echo '<br>' . $currencies->format(zen_add_tax($product['onetime_charges'], $product['tax']), true, $order->info['currency'], $order->info['currency_value']);
    }
?>
                        </td>
<?php
    if (is_array($extra_data)) {
        foreach ($extra_data as $data_info) {
            $params = empty($data_info['params']) ? '' : " {$data_info['params']}";
?>
                        <td<?= $params ?>><?= $data_info['text'] ?></td>
<?php
        }
    }
?>
                    </tr>
<?php
}

foreach ($order->totals as $total) {
?>
                    <tr>
                        <td colspan="3" class="ot-title"><?= $total['title'] ?></td>
                        <td class="ot-text"><?= $total['text'] ?></td>
                    </tr>
<?php
}
?>
                </table>
            </div>
<?php
/**
 * Used to display any downloads associated with the cutomers account
 */
if (DOWNLOAD_ENABLED === 'true') {
    require $template->get_template_dir('tpl_modules_downloads.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_downloads.php';
}

/**
 * Enable an observer to add content to the bottom of the order's data.
 */
$additional_content = false;
$zco_notifier->notify('NOTIFY_INVOICE_ADDITIONAL_DATA_MIDDLE', $order, $additional_content);
if ($additional_content !== false) {
?>
            <table class="table">
                <tr>
                    <td class="main additional_data" colspan="2"><?= $additional_content ?></td>
                </tr>
            </table>
<?php
}

/**
 * Used to loop thru and display order status information
 */
if (!empty($statusArray)) {
?>
            <div id="orderHistoryStatus-card" class="card mb-3">
                <h4 id="orderHistoryStatus-card-header" class="card-header"><?= HEADING_ORDER_HISTORY ?></h4>
                <div id="orderHistoryStatus-card-body" class="card-body p-3">
                    <div class="table-responsive">
                        <table id="orderHistory-orderHistoryStatusTableDisplay" class="orderHistoryStatusTableDisplay table table-bordered table-striped">
                            <tr id="orderHistoryStatusTableDisplay-tableHeading" class="tableHeading">
                                <th scope="col" id="orderHistoryStatusTableDisplay-dateHeading"><?= TABLE_HEADING_STATUS_DATE ?></th>
                                <th scope="col" id="orderHistoryStatusTableDisplay-statusHeading"><?= TABLE_HEADING_STATUS_ORDER_STATUS ?></th>
<?php
    $extra_headings = [];
    $zco_notifier->notify('NOTIFY_ACCOUNT_HISTORY_INFO_OSH_HEADINGS', $order, $extra_headings);
    foreach ($extra_headings as $next_heading) {
?>
                                <th scope="col"><?= $next_heading ?></th>
<?php
    }
?>
                                <th scope="col" id="orderHistoryStatusTableDisplay-commentsHeading"><?= TABLE_HEADING_STATUS_COMMENTS ?></th>
                            </tr>
<?php
    $protected = true; 
    foreach ($statusArray as $statuses) {
?>
                            <tr>
                                <td class="dateCell"><?= zen_date_short($statuses['date_added']) ?></td>
                                <td class="statusCell"><?= $statuses['orders_status_name'] ?></td>
<?php
        $extra_data = [];
        $zco_notifier->notify('NOTIFY_ACCOUNT_HISTORY_INFO_OSH_DATA', $statuses, $extra_data);
        foreach ($extra_data as $next_data) {
            if ($protected === true) {
                $next_data = zen_output_string_protected($next_data);
            }
?>
                                <td><?= $next_data ?></td>
<?php
        }
?>
                                <td class="commentsCell">
<?php 
        if (!empty($statuses['comments'])) {
            echo nl2br(zen_output_string($statuses['comments'], false, $protected));
        }
?>
                                </td> 
                            </tr>
<?php
        $protected = false;
    }
?>
                        </table>
                    </div>
                </div>
            </div>
<?php
}
?>
            <div id="deliveryAddress-card" class="card mb-3">
                <h4 id="deliveryAddress-card-header" class="card-header"><?= HEADING_DELIVERY_ADDRESS ?></h4>
                <div id="deliveryAddress-card-body" class="card-body p-3">
                    <div class="card-deck">
<?php
if (!empty($order->delivery['format_id'])) {
?>
                        <div id="shipToAddress-card" class="card">
                            <div id="shipToAddress-card-body" class="card-body">
                                <address><?= zen_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br>') ?></address>
                            </div>
                        </div>
<?php
}

if (!empty($order->info['shipping_method'])) {
?>
                        <div id="shippingMethod-card" class="card">
                            <h4 id="shippingMethod-card-header" class="card-header"><?= HEADING_SHIPPING_METHOD ?></h4>
                            <div id="shippingMethod-card-body" class="card-body">
                                <div><?= $order->info['shipping_method'] ?></div>
                            </div>
                        </div>
<?php
} else {
?>
                        <div><?= TEXT_MISSING_SHIPPING_INFO ?></div>
<?php
}
?>
                    </div>
                </div>
            </div>

            <div id="billingAddress-card" class="card mb-3">
                <h4 id="billingAddress-card-header" class="card-header"><?= HEADING_BILLING_ADDRESS ?></h4>
                <div id="billingAddress-card-body" class="card-body p-3">
                    <div class="card-deck">
                        <div id="billToAddress-card" class="card">
                            <div id="billToAddress-card-body" class="card-body">
                                <address><?= zen_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br>') ?></address>
                            </div>
                        </div>
                        <div id="paymentMethod-card" class="card">
                            <h4 id="paymentMethod-card-header" class="card-header"><?= HEADING_PAYMENT_METHOD ?></h4>
                            <div id="paymentMethod-card-body" class="card-body">
                                <div><?= $order->info['payment_method'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
