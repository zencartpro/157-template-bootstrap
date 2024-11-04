<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_also_purchased.php 2024-10-26 16:14:16Z webchills $
 */
  $zc_show_also_purchased = false;
require DIR_WS_MODULES . zen_get_module_directory('centerboxes/' . FILENAME_ALSO_PURCHASED_PRODUCTS);

if ($zc_show_also_purchased === false) {
    return;
}

$card_main_id = 'also-purchased';
$card_main_class = 'centerBoxWrapper';
$card_body_id = 'also-purchased-card-body';

require $template->get_template_dir('tpl_columnar_display.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/tpl_columnar_display.php';
