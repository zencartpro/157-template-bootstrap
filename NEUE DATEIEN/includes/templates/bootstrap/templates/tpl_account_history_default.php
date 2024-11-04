<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_account_history_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="accountHistoryDefault" class="centerColumn">
    <h1 id="accountHistoryDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>
<?php
if ($accountHasHistory === true) {
    $page_parameter = (isset($_GET['page'])) ? ('page=' . (int)$_GET['page'] . '&') : '';
    foreach ($accountHistory as $history) {
?>
<!--bof order history card-->
    <div id="order<?php echo $history['orders_id']; ?>-card" class="card mb-3">
        <h4 id="order<?php echo $history['orders_id']; ?>-card-header" class="card-header"><?php echo TEXT_ORDER_NUMBER . $history['orders_id']; ?></h4>
        <div id="order<?php echo $history['orders_id']; ?>-card-body" class="card-body p-3">
            <div class="row">
                <div class="col-sm text-right">
                    <?php echo TEXT_ORDER_STATUS . $history['orders_status_name']; ?>    
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <?php echo '<strong>' . TEXT_ORDER_DATE . '</strong> ' . zen_date_long($history['date_purchased']); ?>
                </div>
                <div class="col-sm">
                    <?php echo '<strong>' . TEXT_ORDER_PRODUCTS . '</strong> ' . $history['product_count']; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <?php echo '<strong>' . $history['order_type'] . '</strong> ' . zen_output_string_protected($history['order_name']); ?> 
                </div>
                <div class="col-sm">
                    <?php echo '<strong>' . TEXT_ORDER_COST . '</strong> ' . strip_tags($history['order_total']); ?> 
                </div>
            </div>

            <div id="order<?php echo $history['orders_id']; ?>-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
                <?php echo zca_button_link(zen_href_link(FILENAME_ACCOUNT_HISTORY_INFO, $page_parameter . 'order_id=' . $history['orders_id'], 'SSL'), BUTTON_VIEW_SMALL_ALT, 'button_view'); ?>
            </div>
        </div>
    </div>
<!--eof order history card-->
<?php
    }
?>
    <div id="accountHistoryDefault-bottomRow" class="row">
        <div id="accountHistoryDefault-bottomNumber" class="bottomNumber col-sm">
            <?php echo $history_split->display_count(TEXT_DISPLAY_NUMBER_OF_ORDERS); ?>
        </div>
        <div id="accountHistoryDefault-bottomLinks" class="bottomLinks col-sm">
            <?php echo TEXT_RESULT_PAGE . $history_split->display_links($max_display_page_links, zen_get_all_get_params(['page', 'info', 'x', 'y', 'main_page']), $paginateAsUL); ?>
        </div>
    </div>
<?php
} else {
?>
    <div id="noAccountHistoryDefault" class="centerColumn">
        <div id="noAccountHistoryDefault-content" class="content">
            <?php echo TEXT_NO_PURCHASES; ?>
        </div>
    </div>
<?php
}
?>
    <div id="accountHistoryDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
        <?php echo zca_button_link(zen_href_link(FILENAME_ACCOUNT, '', 'SSL'), BUTTON_BACK_ALT, 'button_back'); ?>
    </div>
</div>
