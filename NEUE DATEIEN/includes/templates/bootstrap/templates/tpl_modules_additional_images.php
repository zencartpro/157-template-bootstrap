<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_additional_images_default.php 2026-10-10 15:22:39Z webchills $
 */
require DIR_WS_MODULES . zen_get_module_directory('additional_images.php');

if ($flag_show_product_info_additional_images != 0 && $num_images > 0) {
    if (zen_config('PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS') === 'Yes') {
        require $template->get_template_dir('tpl_image_additional.php', DIR_WS_TEMPLATE, $current_page_base, 'modalboxes') . '/tpl_image_additional.php';
        require $template->get_template_dir('tpl_columnar_display.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/tpl_columnar_display.php';
    } else {
?>
<div id="productAdditionalImages">
<?php
        require $template->get_template_dir('tpl_columnar_display.php', DIR_WS_TEMPLATE, $current_page_base,'common') . '/tpl_columnar_display.php';
?>
</div>
<?php
    }
}
