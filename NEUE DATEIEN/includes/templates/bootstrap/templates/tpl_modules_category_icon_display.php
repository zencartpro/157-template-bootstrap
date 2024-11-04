<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_category_icon_display.php 2024-10-26 15:22:39Z webchills $
 */
require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CATEGORY_ICON_DISPLAY));
?>

<div id="categoryIcon" class="categoryIcon <?php echo 'text-' . $align; ?>"><?php echo '<a href="' . zen_href_link(FILENAME_DEFAULT, 'cPath=' . $_GET['cPath'], 'NONSSL') . '">' . $category_icon_display_image . $category_icon_display_name .  '</a>'; ?></div>
