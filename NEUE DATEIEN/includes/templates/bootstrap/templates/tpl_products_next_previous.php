<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_products_next_previous.php 2024-10-26 15:22:39Z webchills $
 */
/*
 WebMakers.com Added: Previous/Next through categories products
 Thanks to Nirvana, Yoja and Joachim de Boer
 Modifications: Linda McGrath osCommerce@WebMakers.com
*/
?>
<div id="productsNextPrevious" class="text-center">
<?php
// only display when more than 1
if ($products_found_count > 1) {
?>
    <div id="productsNextPrevious-topNumber" class="topNumber col-sm">
        <?php echo PREV_NEXT_PRODUCT . ($position + 1) . '/' . $counter; ?>
    </div>

    <div class="d-none d-sm-block" role="group">
        <a class="p-2 btn button_prev mr-2" href="<?php echo zen_href_link(zen_get_info_page($previous), "cPath=$cPath&products_id=$previous"); ?>">
            <?php echo $previous_image . ($previous_button === '' ? '' : BUTTON_PREVIOUS_ALT); ?>
        </a>
        <a class="p-2 btn button_return_to_product_list mr-2" href="<?php echo zen_href_link(FILENAME_DEFAULT, "cPath=$cPath"); ?>">
            <?php echo BUTTON_RETURN_TO_PROD_LIST_ALT; ?>
        </a>
        <a class="p-2 btn button_next" href="<?php echo zen_href_link(zen_get_info_page($next_item), "cPath=$cPath&products_id=$next_item"); ?>">
            <?php echo ($next_item_button === '' ? '' : BUTTON_NEXT_ALT) . $next_item_image; ?>
        </a>
    </div>

    <div class="btn-group d-block d-sm-none" role="group">
        <a class="p-2" href="<?php echo zen_href_link(zen_get_info_page($previous), "cPath=$cPath&products_id=$previous"); ?>">
            <span class="btn btn-primary"><i class="fas fa-angle-left" title="<?php echo BUTTON_PREVIOUS_ALT;?>"></i></span>
        </a>
        <a class="p-2 btn button_return_to_product_list" href="<?php echo zen_href_link(FILENAME_DEFAULT, "cPath=$cPath"); ?>">
            <?php echo BUTTON_RETURN_TO_PROD_LIST_ALT; ?>
        </a>
        <a class="p-2" href="<?php echo zen_href_link(zen_get_info_page($next_item), "cPath=$cPath&products_id=$next_item"); ?>">
            <span class="btn btn-primary"><i class="fas fa-angle-right" title="<?php echo BUTTON_NEXT_ALT;?>"></i></span>
        </a>
    </div>
<?php
}
?>
</div>
