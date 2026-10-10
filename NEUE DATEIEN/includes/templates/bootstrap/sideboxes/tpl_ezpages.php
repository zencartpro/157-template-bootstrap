<?php
/**
* Bootstrap Template for Zen Cart German 1.5.7k
* Zen Cart German Specific
* Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
* @copyright Copyright 2003-2026 Zen Cart Development Team
* Zen Cart German Version - www.zen-cart-pro.at
* @copyright Portions Copyright 2003 osCommerce
* @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
* @version $Id: tpl_ezpages.php 2026-10-10 15:22:39Z webchills $
*/
$content = "";
$content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="list-group-flush sideBoxContent">';

for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) { 
$content .= '<a class="list-group-item list-group-item-action" href="' . $var_linksList[$i]['link'] . '">' . $var_linksList[$i]['name'] . '</a>' . "\n" ;
} // end FOR loop

$content .= '</div>';