<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_main_product_image.php 2026-10-10 15:22:39Z webchills $
 */
require DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE);

if (zen_config('PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS') === 'Yes') {
    require $template->get_template_dir('tpl_image.php', DIR_WS_TEMPLATE, $current_page_base, 'modalboxes'). '/tpl_image.php';
?>
<div id="productMainImage">
    <a data-toggle="modal" data-target=".image-modal-lg" href="#image-modal-lg">
        <?= zen_image($products_image_medium, $products_name, $tplSetting->MEDIUM_IMAGE_WIDTH, $tplSetting->MEDIUM_IMAGE_HEIGHT) ?>
        <div class="p-1"></div>
        <span class="imgLink"><?= TEXT_CLICK_TO_ENLARGE ?></span>
    </a>
</div>
<?php
} else {
?>
<div id="productMainImage" class="centeredContent back">
<script>
document.write('<?= '<a href="javascript:popupWindow(\\\'' . zen_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $_GET['products_id']) . '\\\')">' . zen_image(addslashes($products_image_medium), addslashes($products_name), $tplSetting->MEDIUM_IMAGE_WIDTH, $tplSetting->MEDIUM_IMAGE_HEIGHT) . '<br><span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>'; ?>');
</script>
<noscript>
<?php
    echo '<a href="' . zen_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $_GET['products_id']) . '" target="_blank">' . zen_image($products_image_medium, $products_name, $tplSetting->MEDIUM_IMAGE_WIDTH, $tplSetting->MEDIUM_IMAGE_HEIGHT) . '<br><span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>';
?>
</noscript>
</div>
<?php
}
