<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: search_header.php 2024-10-26 15:14:16Z webchills $
 */
$search_header_status = $db->Execute(
    "SELECT layout_box_name
       FROM " . TABLE_LAYOUT_BOXES . "
      WHERE layout_box_status_single = 1
        AND layout_template = '" . $template_dir . "'
        AND layout_box_name = 'search_header.php'
      LIMIT 1"
);

if (!$search_header_status->EOF) {
    if (defined('BS4_AJAX_SEARCH_ENABLE') && BS4_AJAX_SEARCH_ENABLE === 'true') {
        require $template->get_template_dir('tpl_ajax_search_header.php', DIR_WS_TEMPLATE, $current_page_base, 'sideboxes') . '/tpl_ajax_search_header.php';
    } else {
        require $template->get_template_dir('tpl_search_header.php', DIR_WS_TEMPLATE, $current_page_base, 'sideboxes') . '/tpl_search_header.php';
    }
    require $template->get_template_dir('tpl_box_header.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/tpl_box_header.php';
}
