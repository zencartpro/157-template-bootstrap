<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_product_image.php 2026-10-10 15:22:39Z webchills $
 */
require DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE);
?>
<?= zen_image(addslashes($products_image_medium), addslashes($products_name), $tplSetting->MEDIUM_IMAGE_WIDTH, $tplSetting->MEDIUM_IMAGE_HEIGHT) ?>
<div class="p-3"></div>
