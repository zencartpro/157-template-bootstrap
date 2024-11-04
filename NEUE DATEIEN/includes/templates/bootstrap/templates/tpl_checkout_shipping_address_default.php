<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_checkout_shipping_address_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="checkoutShippingAddressDefault" class="centerColumn">
    <h1 id="checkoutShippingAddressDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <?php if ($messageStack->size('checkout_address') > 0) echo $messageStack->output('checkout_address'); ?>

<?php
if ($process == false || $error == true) {
?>
<!--bof shipping address card-->
    <div id="shippingAddress-card" class="card mb-3">
        <h2 id="shippingAddress-card-header" class="card-header"><?php echo TITLE_SHIPPING_ADDRESS; ?></h2>
        <div id="shippingAddress-card-body" class="card-body p-3">
            <div class="row">
                <div id="shippingAddress-shipToAddress" class="shipToAddress col-sm-5">
                    <address><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['sendto'], true, ' ', '<br>'); ?></address>
                </div>
                <div class="col-sm-7">
                    <div id="shippingAddress-content" class="content"><?php if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) echo TEXT_CREATE_NEW_SHIPPING_ADDRESS; ?></div>
                </div>
            </div>

        </div>
    </div>
    
    <div class="row">
<!--eof shipping address card-->
<?php
    // -----
    // Starting with the as-delivered Zen Cart 1.5.8a, styling has been removed from various checkout language
    // constants.  To keep the same 'look' regardless whether the store's value contains a <strong> tag, strip
    // that tag and its end-tag from the constant and output the tag here.
    //
    $title_continue_checkout = str_replace(['<strong>', '</strong>'], '', TITLE_CONTINUE_CHECKOUT_PROCEDURE);

    if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) {
?>
        <div class="col-lg-6">
            <div id="checkoutNewAddress-card" class="card mb-3">
                <?php echo zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'), 'post', 'class="group"'); ?>
                <h2 id="checkoutNewAddress-card-header" class="card-header"><?php echo TITLE_PLEASE_SELECT; ?></h2>
                <div id="checkoutNewAddress-card-body" class="card-body p-3">
<?php 
        require $template->get_template_dir('tpl_modules_common_address_format.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_common_address_format.php'; 
?>
                    <div class="btn-toolbar justify-content-between mt-3" role="toolbar">
                        <?php echo '<strong>' . $title_continue_checkout . '</strong><br>' . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?>
                        <?php echo zen_draw_hidden_field('action', 'submit') . zen_image_submit(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT); ?>
                    </div>
                </div>
                <?php echo '</form>'; ?>
            </div>
        </div>
<?php
    }
?>
<!--bof choose from your address book entries card-->
        <div class="col-lg-6">
            <div id="addressBookEntries-card" class="card mb-3">
                <?php echo zen_draw_form('checkout_address_book', zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'), 'post', 'class="group"'); ?>
                <h4 id="addressBookEntries-card-header" class="card-header"><?php echo TABLE_HEADING_ADDRESS_BOOK_ENTRIES; ?></h4>
                <div id="addressBookEntries-card-body" class="card-body p-3">
<?php
    require $template->get_template_dir('tpl_modules_checkout_address_book.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_checkout_address_book.php';
?>
                    <div class="btn-toolbar justify-content-between" role="toolbar">
                        <?php echo '<strong>' . $title_continue_checkout . '</strong><br>' . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?>
                        <?php echo zen_draw_hidden_field('action', 'submit') . zen_image_submit(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT); ?>
                    </div>
                </div>
<!--eof choose from your address book entries card-->
                <?php echo '</form>'; ?>
            </div>
        </div>
    </div>
<?php
}

if ($process == true) {
?>
    <div id="checkoutShippingAddressDefault-back-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
        <?php echo zca_button_link(zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'), BUTTON_BACK_ALT, 'button_back'); ?>
    </div>
<?php
}
?>
</div>
