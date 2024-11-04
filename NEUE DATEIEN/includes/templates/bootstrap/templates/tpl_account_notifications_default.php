<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_account_notifications.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="accountNotificationsDefault" class="centerColumn">
<?php echo zen_draw_form('account_notifications', zen_href_link(FILENAME_ACCOUNT_NOTIFICATIONS, '', 'SSL')) . zen_draw_hidden_field('action', 'process'); ?>

    <h1 id="accountNewslettersDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <div id="accountNewslettersDefault-content" class="content"><?php echo MY_NOTIFICATIONS_DESCRIPTION; ?></div>

<!--bof global product notifications card-->
    <div id="globalNotifications-card" class="card mb-3">
        <h3 id="globalNotifications-card-header" class="card-header"><?php echo GLOBAL_NOTIFICATIONS_TITLE; ?></h3>
        <div id="globalNotifications-card-body" class="card-body p-3">
            <div class="custom-control custom-checkbox">
                <?php echo zen_draw_checkbox_field('product_global', '1', ($global->fields['global_product_notifications'] === '1'), 'id="globalnotify"'); ?>
                <label class="custom-control-label" for="globalnotify"><?php echo GLOBAL_NOTIFICATIONS_DESCRIPTION; ?></label>
            </div>

            <div id="productNotifications-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
                <?php echo zen_image_submit(BUTTON_IMAGE_UPDATE, BUTTON_UPDATE_ALT); ?>
            </div>
        </div>
    </div>
<!--eof global product notifications card-->

<?php
if ($flag_global_notifications !== '1') {
?>
<!--bof product notifications card-->
    <div id="productNotifications-card" class="card mb-3">
        <h3 id="productNotifications-card-header" class="card-header"><?php echo NOTIFICATIONS_TITLE; ?></h3>
        <div id="productNotifications-card-body" class="card-body p-3">
<?php
    if ($flag_products_check) {
?>
            <div id="productNotifications-content" class="content"><?php echo NOTIFICATIONS_DESCRIPTION; ?></div>
<?php
        /**
         * Used to loop thru and display product notifications
         */
        foreach ($notificationsArray as $notifications) {
?>
            <div class="custom-control custom-checkbox">
                <?php echo zen_draw_checkbox_field('notify[]', $notifications['products_id'], true, 'id="notify-' . $notifications['counter'] . '"')?>
                <label class="custom-control-label" for="notify-<?php echo $notifications['counter']; ?>"><?php echo $notifications['products_name']; ?></label>
            </div>
<?php
        }
?>
            <div id="productNotifications-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
                <?php echo zen_image_submit(BUTTON_IMAGE_UPDATE, BUTTON_UPDATE_ALT); ?>
            </div>
<?php
    } else {
?>
        <div id="noProductNotifications-content" class="content"><?php echo NOTIFICATIONS_NON_EXISTING; ?></div>

<?php
    }
?>
        </div>
    </div>
<!--bof product notifications card-->

    <div id="accountNewslettersDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
        <?php echo zca_button_link(zen_href_link(FILENAME_ACCOUNT, '', 'SSL'), BUTTON_BACK_ALT, 'button_back'); ?>
    </div>
<?php
}
?>
<?php echo '</form>'; ?>
</div>
