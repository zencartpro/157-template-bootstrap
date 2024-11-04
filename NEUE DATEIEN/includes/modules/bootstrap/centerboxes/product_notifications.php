<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2023 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: product_notificationa.php 2024-10-26 15:14:16Z webchills $
 */

// test if box should show
$show_product_notifications = false;
if (isset($_GET['products_id']) && zen_products_id_valid($_GET['products_id'])) {
    if (zen_is_logged_in() && !zen_in_guest_checkout()) {
        $check_query = 
            "SELECT customers_info_id
               FROM " . TABLE_CUSTOMERS_INFO . "
              WHERE customers_info_id = " . (int)$_SESSION['customer_id'] . "
                AND global_product_notifications = 1
              LIMIT 1";
        $check = $db->Execute($check_query);

        if (!$check->EOF) {
            $show_product_notifications = true;
        }
    } else {
        $show_product_notifications = true;
    }
}

if ($show_product_notifications) {
    if (isset($_GET['products_id'])) {
        $notification_exists = false;
        if (zen_is_logged_in() && !zen_in_guest_checkout()) {
            $check_query = 
                "SELECT customers_id
                   FROM " . TABLE_PRODUCTS_NOTIFICATIONS . "
                  WHERE products_id = " . (int)$_GET['products_id'] . "
                    AND customers_id = " . (int)$_SESSION['customer_id'] . "
                  LIMIT 1";
            $check = $db->Execute($check_query);

            $notification_exists = !$check->EOF;
        }

        if ($notification_exists) {
            require $template->get_template_dir('tpl_modules_yes_notifications.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_yes_notifications.php';
        } else {
            require $template->get_template_dir('tpl_modules_no_notifications.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_no_notifications.php';
        }
    }
}
