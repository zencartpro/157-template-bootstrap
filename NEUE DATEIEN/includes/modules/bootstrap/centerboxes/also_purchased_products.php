<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: also_purchased_producta.php 2026-10-10 15:14:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

$columns_also_purchased_products = (int)$tplSetting->SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS;
$min_display_also_purchased = (int)$tplSetting->MIN_DISPLAY_ALSO_PURCHASED;
if (isset($_GET['products_id']) && $columns_also_purchased_products > 0 && $min_display_also_purchased > 0) {
    $also_purchased_products = $db->ExecuteRandomMulti(sprintf(SQL_ALSO_PURCHASED, (int)$_GET['products_id'], (int)$_GET['products_id']), $min_display_also_purchased);

    $num_products_ordered = $also_purchased_products->RecordCount();

    $row = 0;
    $col = 0;
    $list_box_contents = [];
    $title = '';

    // show only when 1 or more and equal to or greater than minimum set in admin
    if ($num_products_ordered >= $min_display_also_purchased && $num_products_ordered > 0) {
        if ($num_products_ordered < $columns_also_purchased_products) {
            $col_width = floor(100 / $num_products_ordered);
        } else {
            $col_width = floor(100 / $columns_also_purchased_products);
        }

        while (!$also_purchased_products->EOF) {
            $app_products_id = $also_purchased_products->fields['products_id'];

            /** bof products price */
            $products_price = zen_get_products_display_price($app_products_id);
            $also_purchased_products_price = '<div class="centerBoxContentsItem-price text-center">' . $products_price . '</div>';
            /** eof products price */

            /** bof products name */
            $app_products_name = zen_get_products_name($app_products_id);
            $app_products_link = zen_href_link(zen_get_info_page($app_products_id), "products_id=$app_products_id");
    
            $also_purchased_products_name = '<div class="centerBoxContentsItem-name text-center"><a href="' . $app_products_link . '">' . $app_products_name . '</a></div>';
            /** eof products name */

            /** bof products image */
            if (empty($also_purchased_products->fields['products_image']) && $tplSetting->PRODUCTS_IMAGE_NO_IMAGE_STATUS === '0') {
                $also_purchased_products_image = '';
            } else {
                $also_purchased_products_image =
                    '<div class="centerBoxContentsItem-image text-center"><a href="' . $app_products_link . '" title="' . zen_output_string_protected($app_products_name) . '">' .
                        zen_image(DIR_WS_IMAGES . $also_purchased_products->fields['products_image'], $app_products_name, $tplSetting->SMALL_IMAGE_WIDTH, $tplSetting->SMALL_IMAGE_HEIGHT) .
                    '</a></div>';
            }
            /** eof products image */
      
            $list_box_contents[$row][$col] = [
                'params' => 'class="centerBoxContents card mb-3 p-3 text-center"',
                'text' => $also_purchased_products_image . $also_purchased_products_name . $also_purchased_products_price
            ];

            $col++;
            if ($col >= $columns_also_purchased_products) {
                $col = 0;
                $row++;
            }
            $also_purchased_products->MoveNextRandom();
        }
    }
    if ($also_purchased_products->RecordCount() >= $min_display_also_purchased) {
        $title = '<p id="alsoPurchasedCenterbox-card-header" class="centerBoxHeading card-header h3">' . TEXT_ALSO_PURCHASED_PRODUCTS . '</p>';
        $zc_show_also_purchased = true;
    }
}
