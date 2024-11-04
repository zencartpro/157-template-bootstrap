<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: information.php 2024-10-26 15:14:16Z webchills $
 */
 
$information = [];

// -----
// Enabling this sidebox's information to also be used by the mobile-menu.  If the variable
// $information_sidebox_class is 'not empty', then it contains the classes to apply to the
// various links and the default sidebox display is to be bypassed.
//
// Note that it's the responsibility of the calling module (e.g. /common/tpl_offcanvas_menu.php) to see if the
// "Information" sidebox elements are currently enabled via the admin's Layout Boxes Controller.
//
$information_classes = (!empty($information_sidebox_class)) ? $information_sidebox_class : 'list-group-item list-group-item-action';


if (DEFINE_SHIPPINGINFO_STATUS <= 1) {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_SHIPPING) . '">' . BOX_INFORMATION_SHIPPING . '</a>';
}
if (DEFINE_PRIVACY_STATUS <= 1) {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_PRIVACY) . '">' . BOX_INFORMATION_PRIVACY . '</a>';
}
if (DEFINE_CONDITIONS_STATUS <= 1) {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_CONDITIONS) . '">' . BOX_INFORMATION_CONDITIONS . '</a>';
}

  if (DEFINE_WIDERRUFSRECHT_STATUS <= 1) {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_WIDERRUFSRECHT) . '">' . BOX_INFORMATION_WIDERRUFSRECHT . '</a>';
  }
  if (DEFINE_ZAHLUNGSARTEN_STATUS <= 1) {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_ZAHLUNGSARTEN) . '">' . BOX_INFORMATION_ZAHLUNGSARTEN . '</a>';
  }
  
  if (DEFINE_IMPRESSUM_STATUS <= 1) {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_IMPRESSUM) . '">' . BOX_INFORMATION_IMPRESSUM . '</a>';
  }

if (DEFINE_CONTACT_US_STATUS <= 1) {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">' . BOX_INFORMATION_CONTACT . '</a>';
}

if (defined('FILENAME_ORDER_STATUS') && defined('BOX_INFORMATION_ORDER_STATUS')) {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_ORDER_STATUS, '', 'SSL') . '">' . BOX_INFORMATION_ORDER_STATUS . '</a>';
}

// forum/bb link:
if (!empty($external_bb_url) && !empty($external_bb_text)) {
    $information[] = '<a class="' . $information_classes . '" href="' . $external_bb_url . '" rel="noopener" target="_blank">' . $external_bb_text . '</a>';
}

if (DEFINE_SITE_MAP_STATUS <= 1) {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_SITE_MAP) . '">' . BOX_INFORMATION_SITE_MAP . '</a>';
}

// only show GV FAQ when installed
if (defined('MODULE_ORDER_TOTAL_GV_STATUS') && MODULE_ORDER_TOTAL_GV_STATUS === 'true') {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_GV_FAQ) . '">' . BOX_INFORMATION_GV . '</a>';
}
// only show Discount Coupon FAQ when installed
if (DEFINE_DISCOUNT_COUPON_STATUS <= 1 && defined('MODULE_ORDER_TOTAL_COUPON_STATUS') && MODULE_ORDER_TOTAL_COUPON_STATUS === 'true') {      
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_DISCOUNT_COUPON) . '">' . BOX_INFORMATION_DISCOUNT_COUPONS . '</a>';
}

if (SHOW_NEWSLETTER_UNSUBSCRIBE_LINK === 'true') {
    $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_UNSUBSCRIBE) . '">' . BOX_INFORMATION_UNSUBSCRIBE . '</a>';
}
$zco_notifier->notify('NOTIFY_INFORMATION_SIDEBOX_ADDITIONS', [], $information);

// -----
// If the information sidebox's class name hasn't been overridden, then the display is for the non-mobile
// version of the sidebox.
//
if (empty($information_sidebox_class)) {
    require $template->get_template_dir('tpl_information.php', DIR_WS_TEMPLATE, $current_page_base, 'sideboxes') . '/tpl_information.php';

    $title =  BOX_HEADING_INFORMATION;
    $title_link = false;

    require $template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base, 'common') . '/' . $column_box_default;
}
