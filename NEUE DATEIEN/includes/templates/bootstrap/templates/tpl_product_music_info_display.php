<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_product_music_info_display.php 2023-12-22 15:22:39Z webchills $
 */
// -----
// Starting with v3.7.0, simply use the common product_xxx_info display.
//
$html_id_prefix = 'productMusicInfo';
$product_info_display_extra = '/tpl_product_music_info_display_extra.php';  //- Note, leading '/' required!
require $template->get_template_dir('/tpl_product_info_display.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_product_info_display.php';
