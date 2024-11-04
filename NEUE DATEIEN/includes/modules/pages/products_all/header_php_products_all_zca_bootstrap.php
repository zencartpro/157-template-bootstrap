<?php
// -----
// all_products: Provide updated processing **ONLY IF** the ZCA bootstrap is the active template.
//
if (!(function_exists('zca_bootstrap_active') && zca_bootstrap_active() === true)) {
    return;
}

// -----
// Set the maximum number of products in a page's listing to that defined for
// the 'products_all' page.
//
$product_listing_max_results = MAX_DISPLAY_PRODUCTS_ALL;

// -----
// Nothing further to do if the all-products' raw SQL query is present (it no longer is in zc200).
//
if (!isset($products_all_query_raw)) {
    return;
}

$listing_sql = $products_all_query_raw;

$define_list = [
    'PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,
    'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME,
    'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER,
    'PRODUCT_LIST_PRICE' => PRODUCT_LIST_PRICE,
    'PRODUCT_LIST_QUANTITY' => PRODUCT_LIST_QUANTITY,
    'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT,
    'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE
];
asort($define_list);

$column_list = [];
foreach ($define_list as $key => $value) {
    if ((int)$value > 0) {
        $column_list[] = $key;
    }
}
