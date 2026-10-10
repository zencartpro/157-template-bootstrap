<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_whats_new.php 2026-10-10 15:14:16Z webchills $
 */
$zc_show_new_products = false;
require DIR_WS_MODULES . zen_get_module_directory('centerboxes/' . FILENAME_NEW_PRODUCTS);

if ($zc_show_new_products === false) {
    return;
}

$card_main_id = 'whatsNew';
$card_main_class = 'centerBoxWrapper';
$card_body_id = 'newCenterbox-card-body';
?>
<!-- bof: whats_new -->
<?php
if ($tplSetting->BS4_NEW_CENTERBOX_CAROUSEL === '') {
    // -----
    // If not rendering as a carousel, output the columnar display.
    //
    require $template->get_template_dir('tpl_columnar_display.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/tpl_columnar_display.php';
} else {
    // -----
    // Otherwise, rendering as a carousel.
    //
    $carousel_config = $tplSetting->BS4_NEW_CENTERBOX_CAROUSEL;
    require $template->get_template_dir('tpl_columnar_display_carousel.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/tpl_columnar_display_carousel.php';
}
?>
<!-- eof: whats_new -->
