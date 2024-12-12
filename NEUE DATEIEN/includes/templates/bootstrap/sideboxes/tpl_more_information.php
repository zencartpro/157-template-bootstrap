<?php
/**
* Bootstrap Template for Zen Cart German 1.5.7i
* Zen Cart German Specific
* Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
* @copyright Copyright 2003-2024 Zen Cart Development Team
* Zen Cart German Version - www.zen-cart-pro.at
* @copyright Portions Copyright 2003 osCommerce
* @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
* @version $Id: tpl_more_information.php 2024-10-26 15:22:39Z webchills $
*/
$content = '';
$content .= '<div class="list-group-flush sideBoxContent" id="' . str_replace('_', '-', $box_id . 'Content') . '">';

for ($i=0, $j=sizeof($more_information); $i<$j; $i++) {
$content .= $more_information[$i] . "\n" ;
}

$content .= '</div>';