<?php
/**
* Bootstrap Template for Zen Cart German 1.5.7i
* Zen Cart German Specific
* Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
* @copyright Copyright 2003-2024 Zen Cart Development Team
* Zen Cart German Version - www.zen-cart-pro.at
* @copyright Portions Copyright 2003 osCommerce
* @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
* @version $Id: tpl_ezpages_bar_header_default.php 2024-10-26 15:22:39Z webchills $
*/
/**
* require code to show EZ-Pages list
*/
include(DIR_WS_MODULES . zen_get_module_directory('ezpages_bar_header.php'));
?>
<?php if (!empty($var_linksList)) { ?>
<div id="ezpagesBarHeader" class="ezpagesBar rounded">
<ul class="nav nav-pills">
<?php for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) {  ?>
<li class="nav-item"><a class="nav-link" href="<?php echo $var_linksList[$i]['link']; ?>"><?php echo $var_linksList[$i]['name']; ?></a></li>
<?php } // end FOR loop ?>
</ul>
</div>
<?php } ?>