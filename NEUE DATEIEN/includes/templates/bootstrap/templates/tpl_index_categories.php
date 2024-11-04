<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_index_categories.php 2024-10-26 17:22:39Z webchills $
 */
?>
<div id="indexCategories" class="centerColumn">
<?php
if ($show_welcome === true) {
    $heading_title = HEADING_TITLE_NESTED;

    // -----
    // For accessibility, an <h1> tag can't contain an empty string.  If that's the case, use
    // generic wording for the title and render the <h1> tag for screen-readers only.
    //
    $screen_reader_only = '';
    if ($heading_title === '') {
        $heading_title = HEADING_TITLE_SCREENREADER;
        $screen_reader_only = ' sr-only';
    }
?>
    <h1 id="indexCategories-pageHeading" class="pageHeading<?php echo $screen_reader_only; ?>"><?php echo $heading_title; ?></h1>
<?php
    if (SHOW_CUSTOMER_GREETING === '1') {
?>
    <h2 id="indexCategories-greeting" class="greeting"><?php echo zen_customer_greeting(); ?></h2>
<?php
    }

// -----
// Load the home-page slider.
//
?>
    <div id="home-slider">
        <?php require $template->get_template_dir('tpl_index_slider.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_index_slider.php'; ?>
    </div>
<?php
    if (DEFINE_MAIN_PAGE_STATUS === '1' || DEFINE_MAIN_PAGE_STATUS === '2') {
?>
    <div id="indexCategories-defineContent" class="defineContent">
<?php
        /**
         * require the html_define for the index/categories page
         */
        require $define_page;
?>
    </div>
<?php
    }
} else {
?>
    <h1 id="indexCategories-pageHeading" class="pageHeading"><?php echo $current_categories_name; ?></h1>
<?php
}

if (PRODUCT_LIST_CATEGORIES_IMAGE_STATUS_TOP === 'true') {
    // categories_image
    if ($categories_image = zen_get_categories_image($current_category_id)) {
?>
    <div id="indexCategories-categoryImage" class="categoryImage">
        <?php echo zen_image(DIR_WS_IMAGES . $categories_image, '', SUBCATEGORY_IMAGE_TOP_WIDTH, SUBCATEGORY_IMAGE_TOP_HEIGHT); ?>
    </div>
<?php
    }
} // categories_image

// categories_description
if ($current_categories_description !== '') {
?>
    <div id="indexCategories-categoryDescription" class="categoryDescription content">
        <?php echo $current_categories_description;  ?>
    </div>
<?php
} // categories_description

if (PRODUCT_LIST_CATEGORY_ROW_STATUS !== '0') {
   /**
    * require the code to display the sub-categories-grid, if any exist
    */
    require $template->get_template_dir('tpl_modules_category_row.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_category_row.php';
}

$show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_CATEGORY);
foreach ($show_display_category as $next_display_category) {
    switch ($next_display_category['configuration_key']) {
        case 'SHOW_PRODUCT_INFO_CATEGORY_FEATURED_PRODUCTS':
            require $template->get_template_dir('tpl_modules_featured_products.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_featured_products.php';
            break;
        case 'SHOW_PRODUCT_INFO_CATEGORY_SPECIALS_PRODUCTS':
            require $template->get_template_dir('tpl_modules_specials_default.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_specials_default.php';
            break;
        case 'SHOW_PRODUCT_INFO_CATEGORY_NEW_PRODUCTS':
            require $template->get_template_dir('tpl_modules_whats_new.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_whats_new.php';
            break;
        case 'SHOW_PRODUCT_INFO_CATEGORY_UPCOMING':
            require DIR_WS_MODULES . zen_get_module_directory('centerboxes/' . FILENAME_UPCOMING_PRODUCTS);
            break;
        default:
            break;
    }
}
?>
</div>
