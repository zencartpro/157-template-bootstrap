<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_discount_coupon_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="discountCouponDefault" class="centerColumn">
    <h1 id="discountCouponDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <div id="discountCouponDefault-defineContent" class="defineContent mb-3">
<?php
if ((DEFINE_DISCOUNT_COUPON_STATUS === '1' || DEFINE_DISCOUNT_COUPON_STATUS === '2') && $text_coupon_help === '') {
    require $define_page;
 } else {
    echo $text_coupon_help;
}
?>
    </div>

    <?php echo zen_draw_form('discount_coupon', zen_href_link(FILENAME_DISCOUNT_COUPON, 'action=lookup', 'SSL', false)); ?>

        <div id="lookupDiscountCoupon-card" class="card">
            <h4 id="lookupDiscountCoupon-card-header" class="card-header"><?php echo TEXT_DISCOUNT_COUPON_ID_INFO; ?></h4>
            <div id="lookupDiscountCoupon-card-body" class="card-body">
                <label class="inputLabel" for="lookup-discount-coupon"><?php echo TEXT_DISCOUNT_COUPON_ID; ?></label>
                <?php echo zen_draw_input_field('lookup_discount_coupon', isset($_POST['lookup_discount_coupon']) ? $_POST['lookup_discount_coupon'] : '', 'size="40" id="lookup-discount-coupon" autofocus', 'search'); ?>

                <div id="lookupDiscountCoupon-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
<?php
if ($text_coupon_help === '') {
    echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_LOOKUP_ALT);
} else {
    echo '<a href="' . zen_href_link(FILENAME_DISCOUNT_COUPON) . '">' . zen_image_button(BUTTON_IMAGE_CANCEL, BUTTON_CANCEL_ALT) . '</a>&nbsp;&nbsp;';
    echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_LOOKUP_ALT);
}
?>
                </div>
            </div>
        </div>

        <div id="discountCouponDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
            <?php echo zca_back_link(); ?>
        </div>

    <?php echo '</form>'; ?>
</div>
