<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_product_free_shipping_info_display.php 2026-10-10 15:22:39Z webchills $
 */
// -----
// Starting with v3.7.0, simply use the common product_xxx_info display.
//
$html_id_prefix = 'productFreeShippingInfo';
require $template->get_template_dir('/tpl_product_info_display.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_product_info_display.php';
