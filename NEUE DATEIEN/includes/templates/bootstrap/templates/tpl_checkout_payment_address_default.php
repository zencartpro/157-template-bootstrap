<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_checkout_payment_address_default.php 2026-10-10 15:22:39Z webchills $
 */
?>
<div id="checkoutPaymentAddressDefault" class="centerColumn">
    <h1 id="checkoutPaymentAddressDefault-pageHeading" class="pageHeading"><?= HEADING_TITLE ?></h1>
<?php
if ($messageStack->size('checkout_address') > 0) {
    echo $messageStack->output('checkout_address');
}

if ($process === false || $error === true) {
?>
    <div id="billingAddress-card" class="card mb-3">
        <h2 id="billingAddress-card-header" class="card-header"><?= TITLE_PAYMENT_ADDRESS ?></h2>
        <div id="billingAddress-card-body" class="card-body p-3">
            <div class="row">
                <div id="billingAddress-billToAddress" class="billToAddress col-sm-5">
                    <address><?= zen_address_label($_SESSION['customer_id'], $_SESSION['billto'], true, ' ', '<br>') ?></address>
                </div>
                <div class="col-sm-7">
                    <div id="billingAddress-content" class="content"><?= TEXT_SELECTED_PAYMENT_DESTINATION ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
<?php
    // -----
    // Starting with the as-delivered Zen Cart 1.5.8a, styling has been removed from various checkout language
    // constants.  To keep the same 'look' regardless whether the store's value contains a <strong> tag, strip
    // that tag and its end-tag from the constant and output the tag here.
    //
    $title_continue_checkout = str_replace(['<strong>', '</strong>'], '', TITLE_CONTINUE_CHECKOUT_PROCEDURE);

    if ($addresses_count < zen_config('MAX_ADDRESS_BOOK_ENTRIES')) {
?>
        <div class="col-lg-6">
            <div id="checkoutNewAddress-card" class="card mb-3">
                <?= zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL'), 'post', 'class="group"') ?>
                <h2 id="checkoutNewAddress-card-header" class="card-header"><?= TITLE_PLEASE_SELECT ?></h2>
                <div id="checkoutNewAddress-card-body" class="card-body p-3">
<?php 
        require $template->get_template_dir('tpl_modules_common_address_format.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_common_address_format.php'; 
?>
                    <div class="btn-toolbar justify-content-between mt-3" role="toolbar">
                        <?= '<strong>' . $title_continue_checkout . '</strong><br>' . TEXT_CONTINUE_CHECKOUT_PROCEDURE ?>
                        <?= zen_draw_hidden_field('action', 'submit') . zen_image_submit(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT) ?>
                    </div>
                </div>
                <?= '</form>' ?>
            </div>
        </div>
<?php
    }
?>
        <div class="col-lg-6">
            <div id="addressBookEntries-card" class="card mb-3">
                <?= zen_draw_form('checkout_address_book', zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL'), 'post', 'class="group"') ?>
                <h4 id="addressBookEntries-card-header" class="card-header"><?= TABLE_HEADING_ADDRESS_BOOK_ENTRIES ?></h4>
                <div id="addressBookEntries-card-body" class="card-body p-3">
<?php
    require $template->get_template_dir('tpl_modules_checkout_address_book.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_checkout_address_book.php';
?>
                    <div class="btn-toolbar justify-content-between" role="toolbar">
                        <?= '<strong>' . $title_continue_checkout . '</strong><br>' . TEXT_CONTINUE_CHECKOUT_PROCEDURE ?>
                        <?= zen_draw_hidden_field('action', 'submit') . zen_image_submit(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT) ?>
                    </div>
                </div>
                <?= '</form>' ?>
            </div>
        </div>
    </div>
<?php
}
if ($process === true) {
?>
    <div id="checkoutPaymentAddressDefault-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
        <?= zca_button_link(zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL'), BUTTON_BACK_ALT, 'button_back') ?>
    </div>
<?php
}
?>
</div>
