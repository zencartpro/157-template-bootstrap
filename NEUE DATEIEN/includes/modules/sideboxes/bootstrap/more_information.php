<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2023 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: more_information.php 2024-10-26 15:14:16Z webchills $
 */
// -----
// Enabling this sidebox's information to also be used by the mobile-menu.  If the variable
// $more_information_sidebox_class is 'not empty', then it contains the classes to apply to the
// various links and the default sidebox display is to be bypassed.
//
// Note that it's the responsibility of the calling module (e.g. /common/tpl_offcanvas_menu.php) to see if the
// "More Information" sidebox elements are currently enabled via the admin's Layout Boxes Controller.
//
$more_information_classes = (!empty($more_information_sidebox_class)) ? $more_information_sidebox_class : 'list-group-item list-group-item-action';

// initialize
$more_information = [];

// test if links should display
if (DEFINE_PAGE_2_STATUS <= 1) {
    $more_information[] = '<a class="' . $more_information_classes . '" href="' . zen_href_link(FILENAME_PAGE_2) . '">' . BOX_INFORMATION_PAGE_2 . '</a>';
}
if (DEFINE_PAGE_3_STATUS <= 1) {
    $more_information[] = '<a class="' . $more_information_classes . '" href="' . zen_href_link(FILENAME_PAGE_3) . '">' . BOX_INFORMATION_PAGE_3 . '</a>';
}
if (DEFINE_PAGE_4_STATUS <= 1) {
    $more_information[] = '<a class="' . $more_information_classes . '" href="' . zen_href_link(FILENAME_PAGE_4) . '">' . BOX_INFORMATION_PAGE_4 . '</a>';
}

// insert additional links below to add to the more_information box
// Example:
//    $more_information[] = '<a href="' . zen_href_link(FILENAME_DEFAULT) . '">' . 'TESTING' . '</a>';

// -----
// ... or create an observer-class file that monitors the following notification.
//
$zco_notifier->notify('NOTIFY_MORE_INFORMATION_SIDEBOX_ADDITIONS', [], $more_information);
// only show if links are active
if (count($more_information) > 0 && empty($more_information_sidebox_class)) {
    require $template->get_template_dir('tpl_more_information.php', DIR_WS_TEMPLATE, $current_page_base, 'sideboxes') . '/tpl_more_information.php';

    $title =  BOX_HEADING_MORE_INFORMATION;
    $title_link = false;
    require $template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base, 'common') . '/' . $column_box_default;
}
