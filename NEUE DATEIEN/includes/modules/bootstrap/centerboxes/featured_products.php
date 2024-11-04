<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2023 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: featured_products.php 2024-10-26 15:14:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// initialize vars
$categories_products_id_list = [];
$list_of_products = '';
$featured_products_query = '';
$display_limit = '';

if ((($manufacturers_id > 0 && empty($_GET['filter_id'])) || !empty($_GET['music_genre_id']) || !empty($_GET['record_company_id'])) || empty($new_products_category_id)) {
    $featured_products_query =
        "SELECT p.products_id, p.products_image, pd.products_name, p.master_categories_id
           FROM " . TABLE_PRODUCTS . " p
                LEFT JOIN " . TABLE_FEATURED . " f
                    ON p.products_id = f.products_id
                LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd
                    ON p.products_id = pd.products_id
                   AND pd.language_id = " . (int)$_SESSION['languages_id'] . "
          WHERE p.products_status = 1
            AND f.status = 1";
} else {
    // get all products and cPaths in this subcat tree
    $productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && !empty($_GET['filter_id'])) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);

    if (is_array($productsInCategory) && count($productsInCategory) > 0) {
        // build products-list string to insert into SQL query
        $list_of_products = implode(',', array_keys($productsInCategory));
        $featured_products_query =
            "SELECT p.products_id, p.products_image, pd.products_name, p.master_categories_id
               FROM " . TABLE_PRODUCTS . " p
                    LEFT JOIN " . TABLE_FEATURED . " f
                        ON p.products_id = f.products_id
                    LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd
                        ON p.products_id = pd.products_id
                       AND pd.language_id = " . (int)$_SESSION['languages_id'] . "
              WHERE p.products_status = 1
                AND f.status = 1
                AND p.products_id IN (" . $list_of_products . ")";
    }
}

$num_products_count = 0;
if ($featured_products_query !== '') {
    $featured_products = $db->ExecuteRandomMulti($featured_products_query, MAX_DISPLAY_SEARCH_RESULTS_FEATURED);
    $num_products_count = $featured_products->RecordCount();
}

$row = 0;
$col = 0;
$list_box_contents = [];
$title = '';

// show only when 1 or more
if ($num_products_count > 0) {
    while (!$featured_products->EOF) {
        $featured_products_id = $featured_products->fields['products_id'];
        $products_price = zen_get_products_display_price($featured_products_id);
        if (!isset($productsInCategory[$featured_products_id])) {
            $productsInCategory[$featured_products_id] = zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']);
        }

        $zco_notifier->notify('NOTIFY_MODULES_FEATURED_PRODUCTS_B4_LIST_BOX', [], $featured_products->fields, $products_price);

        $featured_products_name = $featured_products->fields['products_name'];
        $featured_products_link = zen_href_link(zen_get_info_page($featured_products_id), 'cPath=' . $productsInCategory[$featured_products_id] . '&products_id=' . $featured_products_id);

        $featured_products_image = '';
        if (!($featured_products->fields['products_image'] === '' && PRODUCTS_IMAGE_NO_IMAGE_STATUS === '0')) {
            $featured_products_image =
                '<a href="' . $featured_products_link . '" title="' . zen_output_string_protected($featured_products_name) . '">' .
                    zen_image(DIR_WS_IMAGES . $featured_products->fields['products_image'], $featured_products_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) .
                '</a><br>';
        }
        $list_box_contents[$row][$col] = [
            'params' => ' class="centerBoxContentsFeatured centerBoxContents card mb-3 p-3 text-center"',
            'text' => $featured_products_image . '<a href="' . $featured_products_link . '">' . $featured_products_name . '</a><br>' . $products_price
        ];

        $col++;
        if ($col >= SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS) {
            $col = 0;
            $row++;
        }
        $featured_products->MoveNextRandom();
    }

    if (isset($new_products_category_id) && $new_products_category_id != 0) {
        $category_title = zen_get_category_name((int)$new_products_category_id, $_SESSION['languages_id']);
        $title = '<p id="featuredCenterbox-card-header" class="centerBoxHeading card-header h3">' . TABLE_HEADING_FEATURED_PRODUCTS . ($category_title != '' ? ' - ' . $category_title : '') . '</p>';
    } else {
        $title = '<p id="featuredCenterbox-card-header" class="centerBoxHeading card-header h3">' . TABLE_HEADING_FEATURED_PRODUCTS . '</p>';
    }
    $zc_show_featured = true;
}
