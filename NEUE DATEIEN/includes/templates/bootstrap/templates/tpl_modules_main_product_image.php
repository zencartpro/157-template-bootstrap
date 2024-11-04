<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_main_product_image.php 2024-10-26 15:22:39Z webchills $
 */
require DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE);

if (PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS == 'Yes') {
    require $template->get_template_dir('tpl_image.php', DIR_WS_TEMPLATE, $current_page_base, 'modalboxes'). '/tpl_image.php';
?>
<div id="productMainImage">
    <a data-toggle="modal" data-target=".image-modal-lg" href="#image-modal-lg">
        <?php echo zen_image($products_image_medium, $products_name, MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT); ?>
        <div class="p-1"></div>
        <span class="imgLink"><?php echo TEXT_CLICK_TO_ENLARGE; ?></span>
    </a>
</div>
<?php
} else {
?>
<div id="productMainImage" class="centeredContent back">
<script>
document.write('<?php echo '<a href="javascript:popupWindow(\\\'' . zen_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $_GET['products_id']) . '\\\')">' . zen_image(addslashes($products_image_medium), addslashes($products_name), MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '<br><span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>'; ?>');
</script>
<noscript>
<?php
    echo '<a href="' . zen_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $_GET['products_id']) . '" target="_blank">' . zen_image($products_image_medium, $products_name, MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '<br><span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>';
?>
</noscript>
</div>
<?php
}
