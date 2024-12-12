<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_categories_tabs.php 2024-10-26 15:22:39Z webchills $
 */

include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CATEGORIES_TABS));
?>
<?php if (CATEGORIES_TABS_STATUS == '1' && sizeof($links_list) >= 1) { ?>
<div id="categoriesTabs" class="d-none d-lg-block">
<nav class="nav nav-pills nav-fill" id="navCatTabs">
<?php for ($i=0, $n=sizeof($links_list); $i<$n; $i++) { ?>
  <?php echo $links_list[$i];?>
<?php } ?>
</nav>
</div>
<?php } ?>