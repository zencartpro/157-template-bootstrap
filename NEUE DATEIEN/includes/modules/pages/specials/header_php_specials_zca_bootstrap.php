<?php
// -----
// specials: Provide updated processing **ONLY IF** the ZCA bootstrap is the active template and
// running on a Zen Cart version < 2.0.0.
//
if (!(function_exists('zca_bootstrap_active') && zca_bootstrap_active()) || PROJECT_VERSION_MAJOR > 1) {
    return;
}

// -----
// Set the maximum number of products in a page's listing to that defined for
// the 'specials' page.
//
$product_listing_max_results = MAX_DISPLAY_SPECIAL_PRODUCTS;

// ------
// Note: Once support is dropped for Zen Cart versions less than v2.0.0, all the following
// code can be removed.
//

//Removed call to define page & sorter dropdown. not included in this template
$listing_sql =
    "SELECT p.products_id, p.products_type, pd.products_name, p.products_image, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_model, 
            p.products_quantity, p.products_weight, p.product_is_call, p.product_is_always_free_shipping, p.products_qty_box_status, p.master_categories_id,
            p.manufacturers_id, m.manufacturers_name
       FROM (" . TABLE_PRODUCTS . " p
                LEFT JOIN " . TABLE_SPECIALS . " s 
                    ON p.products_id = s.products_id
                LEFT JOIN " . TABLE_MANUFACTURERS . " m
                    ON m.manufacturers_id = p.manufacturers_id
                LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd 
                    ON p.products_id = pd.products_id
                   AND pd.language_id = :languageID
            )
      WHERE p.products_status = 1
        AND s.status = 1
      ORDER BY s.specials_date_added DESC";

$listing_sql = $db->bindVars($listing_sql, ':languageID', $_SESSION['languages_id'], 'integer');

//check to see if we are in normal mode ... not showcase, not maintenance, etc
$show_submit = zen_run_normal();
$define_list = [
    'PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,
    'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME,
    'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER,
    'PRODUCT_LIST_PRICE' => PRODUCT_LIST_PRICE,
    'PRODUCT_LIST_QUANTITY' => PRODUCT_LIST_QUANTITY,
    'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT,
    'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE,
];

asort($define_list);
$column_list = array();
foreach ($define_list as $key => $value) {
    if ((int)$value > 0) {
        $column_list[] = $key;
    }
}
