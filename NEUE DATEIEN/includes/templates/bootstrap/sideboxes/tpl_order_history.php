<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_order_history.php 2024-10-26 15:22:39Z webchills $
 */
$content = "";
$content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">' . "\n";


$content .= '<ul class="list-group list-group-flush">';
foreach ($customer_orders as $row) {
    $content .= '<li class="list-group-item d-flex justify-content-between align-items-center">';
    $content .= '<a href="' . zen_href_link(zen_get_info_page($row['id']), 'products_id=' . $row['id']) . '">' . $row['name'] . '</a>';
    $content .= '&nbsp;&nbsp;';
    $content .= '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(['action']) . 'action=cust_order&pid=' . $row['id']) . '"><i class="fas fa-cart-plus" aria-label="' . PAGE_ACCOUNT_HISTORY . '"></i></a>';
    $content .= '</li>' . "\n" ;
}
$content .= '</ul>' . "\n" ;
$content .= '</div>';