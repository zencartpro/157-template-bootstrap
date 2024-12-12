<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_product_reviews_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="productReviewsDefault" class="centerColumn">
<?php if ($messageStack->size('product_info') > 0) echo $messageStack->output('product_info'); ?>

<!--bof Product Name-->
    <h1 id="productReviewsDefault-productName" class="productName"><?php echo $products_name; ?></h1>
<!--eof Product Name-->

    <div class="row">
        <div class="col-sm">
        
<!--bof Main Product Image -->
<?php
if (!empty($products_image)) {
   	/**
     * require the image display code
     */
?>  
            <div id="productReviewsDefault-productMainImage" class="productMainImage text-center">
                <?php require $template->get_template_dir('/tpl_modules_main_product_image.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_main_product_image.php'; ?>
            </div>
<?php
}
?>
<!--eof Main Product Image-->

<!--bof Product details list  -->
            <ul id="productReviewsDefault-productDetailsList" class="productDetailsList list-group mb-3">
                <li class="list-group-item"><?php echo TEXT_PRODUCT_MODEL . $products_model; ?></li>
            </ul>
<!--eof Product details list -->
        </div>
        <div class="col-sm">
<!--bof products price card-->
            <div id="productsPriceTop-card" class="card mb-3">
                <div id="productsPriceTop-card-body" class="card-body p-3">
                    <h2 id="productsPriceTop-productPriceTopPrice" class="productPriceTopPrice"><?php echo $products_price; ?></h2>
                </div>
            </div>
<!--eof products price card-->

<!--bof product links card-->      
            <div id="productLinks-card" class="productLinksCard card mb-3">
                <div id="productLinks-card-body" class="card-body">
<?php
$products_id = $review->fields['products_id'];
$get_params = zen_get_all_get_params(['action', 'reviews_id']);
if (!zen_has_product_attributes($products_id)) {
    $the_button = '<a class="p-2 btn button_in_cart" href="' . zen_href_link($_GET['main_page'], $get_params . 'action=buy_now') . '">' . BUTTON_IN_CART_ALT . '</a>';
    echo zen_get_buy_now_button($products_id, $the_button, '') . '<br>' . zen_get_products_quantity_min_units_display($products_id);
}
?>
                    <div class="p-1"></div>
                    <?php echo zca_button_link(zen_href_link(zen_get_info_page($_GET['products_id']), $get_params), BUTTON_GOTO_PROD_DETAILS_ALT, 'button_return_to_product_list'); ?>

                    <div class="p-1"></div>
                    <?php echo zca_button_link(zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, $get_params), BUTTON_WRITE_REVIEW_ALT, 'button_write_review'); ?>
                </div>
            </div>
<!--eof product links card--> 
        </div>
    </div>
<?php
if ($reviews_split->number_of_rows > 0) {
    if (PREV_NEXT_BAR_LOCATION === '1' || PREV_NEXT_BAR_LOCATION === '3') {
?>
    <div id="productReviewsDefault-topRow" class="row mb-3">
        <div id="productReviewsDefault-topNumber" class="topNumber col-sm"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></div>

        <div id="productReviewsDefault-topLinks" class="topLinks col-sm"><?php echo TEXT_RESULT_PAGE . $reviews_split->display_links($max_display_page_links, zen_get_all_get_params(['page', 'info', 'main_page']), $paginateAsUL); ?></div>
    </div>
<?php
    }
    foreach ($reviewsArray as $reviews) {
?>
<!--bof products review card-->
    <div id="productsReview<?php echo $reviews['id']; ?>-card" class="productReviewCard card mb-3">
        <div id="productsReview<?php echo $reviews['id']; ?>-card-header" class="card-header">
            <?php echo sprintf(TEXT_REVIEW_DATE_ADDED, zen_date_short($reviews['dateAdded'])); ?>
        </div>
        <div id="productsReview<?php echo $reviews['id']; ?>-card-body" class="card-body">
            <div id="productsReview<?php echo $reviews['id']; ?>-rating" class="rating text-center"> 
                <h3 class="rating"><?php echo zca_get_rating_stars($reviews['reviewsRating'], 'xs'); ?></h3>
            </div>      
            <blockquote class="blockquote mb-3">
                <div id="productsReview<?php echo $reviews['id']; ?>-content" class="content"><?php echo zen_trunc_string(zen_output_string_protected(stripslashes($reviews['reviewsText'])), MAX_PREVIEW); ?></div>
                <footer class="blockquote-footer"><cite title="Source Title"><?php echo sprintf(TEXT_REVIEW_BY, zen_output_string_protected($reviews['customersName'])); ?></cite></footer>
            </blockquote>

            <div id="productsReview<?php echo $reviews['id']; ?>-readReviews" class="float-right">
                <?php echo zca_button_link(zen_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . (int)$_GET['products_id'] . '&reviews_id=' . $reviews['id']), BUTTON_READ_REVIEWS_ALT, 'button_read_reviews'); ?>
            </div>
        </div>
    </div>
<!--eof products review card-->
<?php
    }
?>
<?php
} else {
?>
    <div id="productReviewsDefault-content" class="content"><?php echo TEXT_NO_REVIEWS . (REVIEWS_APPROVAL == '1' ? '<br>' . TEXT_APPROVAL_REQUIRED: ''); ?></div>
<?php
}

if (($reviews_split->number_of_rows > 0) && (PREV_NEXT_BAR_LOCATION === '2' || PREV_NEXT_BAR_LOCATION === '3')) {
?>
    <div id="productReviewsDefault-bottomRow" class="row">
        <div id="productReviewsDefault-bottomNumber" class="bottomNumber col-sm"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></div>
        <div id="productReviewsDefault-bottomLinks" class="bottomLinks col-sm"><?php echo TEXT_RESULT_PAGE . $reviews_split->display_links($max_display_page_links, zen_get_all_get_params(array('page', 'info', 'main_page')), $paginateAsUL); ?></div>
    </div>
<?php
}
?>
</div>
