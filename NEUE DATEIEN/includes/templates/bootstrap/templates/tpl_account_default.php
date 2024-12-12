<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_account_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="accountDefault" class="centerColumn">
    <h1 id="accountDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if ($messageStack->size('account') > 0) echo $messageStack->output('account'); ?>

    <div class="card-deck mb-3">
<!--bof my account card links-->
        <div id="myAccount-card" class="card">
            <h4 id="myAccount-card-header" class="card-header"><?php echo MY_ACCOUNT_TITLE; ?></h4>
            <div id="myAccount-card-body" class="card-body p-3">
                <ul id="myAccount-list-group" class="list-group list-group-flush">
                    <li class="list-group-item">
                        <?php echo zca_button_link(zen_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL'), MY_ACCOUNT_INFORMATION); ?>
                    </li>
                    <li class="list-group-item">
                       <?php echo zca_button_link(zen_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'), MY_ACCOUNT_ADDRESS_BOOK); ?>
                    </li>
                    <li class="list-group-item">
                        <?php echo zca_button_link(zen_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL'), MY_ACCOUNT_PASSWORD); ?>
                    </li>
                </ul>
            </div>
        </div>
<!--eof my account card links-->  
<?php
if ((int)ACCOUNT_NEWSLETTER_STATUS > 0 || CUSTOMERS_PRODUCTS_NOTIFICATION_STATUS !== '0') {
?>
<!--bof email notifications card links-->
        <div id="emailNotifications-card" class="card">
            <h4 id="emailNotifications-card-header" class="card-header"><?php echo EMAIL_NOTIFICATIONS_TITLE; ?></h4>
            <div id="emailNotifications-card-body" class="card-body p-3">
                <ul id="emailNotifications-list-group" class="list-group list-group-flush">
<?php
    if ((int)ACCOUNT_NEWSLETTER_STATUS > 0) {
?>
                    <li class="list-group-item">
                        <?php echo zca_button_link(zen_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL'), EMAIL_NOTIFICATIONS_NEWSLETTERS); ?>
                    </li>
<?php 
    } //endif newsletter unsubscribe

    if (CUSTOMERS_PRODUCTS_NOTIFICATION_STATUS == '1') {
?>
                    <li class="list-group-item">
                        <?php echo zca_button_link(zen_href_link(FILENAME_ACCOUNT_NOTIFICATIONS, '', 'SSL'), EMAIL_NOTIFICATIONS_PRODUCTS); ?>
                    </li>
<?php 
    } //endif product notification 
?>
                </ul>
            </div>
        </div>
<!--bof email notifications card links-->
<?php 
} // endif don't show unsubscribe or notification 
?>
    </div>
<?php
// only show when there is a GV balance
if ($customer_has_gv_balance ) {
    require $template->get_template_dir('tpl_modules_send_or_spend.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_send_or_spend.php';
}

if (zen_count_customer_orders() > 0) {
?>
<!--bof previous orders card -->
    <div id="previousOrders-card" class="card mb-3">
        <h4 id="previousOrders-card-header" class="card-header"><?php echo OVERVIEW_PREVIOUS_ORDERS; ?></h4>
        <div id="previousOrders-card-body" class="card-body p-3">
            <div id="previousOrders-helpLink" class="helpLink text-right p-3">
                <a href="<?php echo zen_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL'); ?>"><?php echo OVERVIEW_SHOW_ALL_ORDERS; ?></a>
            </div>
            <div class="card-deck">
<?php
    foreach ($ordersArray as $orders) {
        $order_link = zen_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id=' . $orders['orders_id'], 'SSL');
?>
                <div class="card">
                    <div class="card-header text-center">
                        <a class="orderIdCell" href="<?php echo $order_link; ?>"><?php echo TEXT_NUMBER_SYMBOL . $orders['orders_id']; ?></a>
                    </div>
                    <div class="card-body text-center">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item dateCell border-0 p-1"><?php echo zen_date_short($orders['date_purchased']); ?></li>
                            <li class="list-group-item shipToCell border-0 p-1"><?php echo zen_output_string_protected($orders['order_name']) . '<br>' . $orders['order_country']; ?></li>
                            <li class="list-group-item statusCell border-0 p-1"><?php echo $orders['orders_status_name']; ?></li>
                            <li class="list-group-item border-0 p-1"><?php echo $orders['order_total']; ?></li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <?php echo zca_button_link($order_link, BUTTON_VIEW_SMALL_ALT, 'button_view'); ?>
                    </div>
                </div>
<?php
    }
?>
            </div>
        </div>
    </div>
<!--eof previous orders card -->
<?php
  }
?>
</div>
