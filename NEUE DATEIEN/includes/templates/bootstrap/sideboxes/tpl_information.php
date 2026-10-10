<?php
/**
* Bootstrap Template for Zen Cart German 1.5.7k
* Zen Cart German Specific
* Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
* @copyright Copyright 2003-2026 Zen Cart Development Team
* Zen Cart German Version - www.zen-cart-pro.at
* @copyright Portions Copyright 2003 osCommerce
* @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
* @version $Id: tpl_information.php 2026-10-10 15:22:39Z webchills $
*/
$content = '';
$content .= '<div class="list-group-flush sideBoxContent" id="' . str_replace('_', '-', $box_id . 'Content') . '">';

for ($i=0, $j=sizeof($information); $i<$j; $i++) {
$content .= $information[$i] . "\n";
}

$content .= '</div>';