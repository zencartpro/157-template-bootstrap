<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_ask_a_question_default.php 2024-10-26 15:22:39Z webchills $
 */
if (!isset($heading_title)) {
    $heading_title = HEADING_TITLE;
}
if (!isset($form_title)) {
    $form_title = FORM_TITLE;
}
?>
<div class="centerColumn" id="askAQuestion">
    <?php echo zen_draw_form('ask_a_question', zen_href_link(FILENAME_ASK_A_QUESTION, 'action=send&pid=' . (int)$_GET['pid'], 'SSL')); ?>

<?php
if (CONTACT_US_STORE_NAME_ADDRESS === '1') {
?>
    <address><?php echo nl2br(STORE_NAME_ADDRESS); ?></address>
<?php
}
?>
    <h1><?php echo $heading_title . $product_details['products_name']; ?></h1>

<?php
if (isset($_GET['action']) && ($_GET['action'] === 'success')) {
?>
    <div class="content"><?php echo TEXT_SUCCESS; ?></div>

    <div class="btn-toolbar my-3" role="toolbar">
        <?php echo '<a class="p-2 btn button_back" href="' . zen_back_link(true) . '">' . BUTTON_BACK_ALT . '</a>'; ?>
    </div>

<?php
} else {
?>
    <a href="<?php echo zen_href_link(zen_get_info_page((int)$_GET['pid']), 'products_id=' . (int)$_GET['pid'], 'SSL'); ?>">
        <?php echo zen_image(DIR_WS_IMAGES . $product_details['products_image'], $product_details['products_name'], IMAGE_PRODUCT_LISTING_WIDTH, IMAGE_PRODUCT_LISTING_HEIGHT); ?>
    </a>

    <div id="contactUsNoticeContent" class="definecontent">
<?php
/**
 * require html_define for the contact_us page
 */
require $define_page;
?>
    </div>
<?php
if ($messageStack->size('contact') > 0) {
    echo $messageStack->output('contact');
}
?>
    <div id="contactUsForm" class="card">
        <h2 class="card-header"><?php echo $form_title; ?></h2>
        <div class="card-body">
            <div class="required-info text-right my-3"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<?php
// show dropdown if set
    if (CONTACT_US_LIST !== '') {
?>
            <label class="inputLabel" for="send-to"><?php echo SEND_TO_TEXT; ?></label><span class="alert"><?php echo ENTRY_REQUIRED_SYMBOL; ?></span>
            <?php echo zen_draw_pull_down_menu('send_to',  $send_to_array, 0, 'id="send-to"'); ?>
            <div class="p-2"></div>
<?php
    }

    // -----
    // zc158 adds a new definition for telephone-number labels; use that if present, otherwise
    // fall-back to the previous definition.
    //
    $telephone_label = (defined('ENTRY_TELEPHONE_NUMBER')) ? ENTRY_TELEPHONE_NUMBER : ENTRY_TELEPHONE;
?>
            <label class="inputLabel" for="contactname"><?php echo ENTRY_NAME; ?></label>
            <?php echo zen_draw_input_field('contactname', $name, ' size="40" id="contactname" placeholder="' . ENTRY_REQUIRED_SYMBOL . '" autofocus required'); ?>
            <div class="p-2"></div>

            <label class="inputLabel" for="email-address"><?php echo ENTRY_EMAIL; ?></label>
            <?php echo zen_draw_input_field('email', ($email_address), ' size="40" id="email-address" autocomplete="off" placeholder="' . ENTRY_REQUIRED_SYMBOL . '" required', 'email'); ?>
            <div class="p-2"></div>

            <label class="inputLabel" for="telephone"><?php echo $telephone_label; ?></label>
            <?php echo zen_draw_input_field('telephone', ($telephone), ' size="20" id="telephone" autocomplete="off" placeholder="' . ENTRY_REQUIRED_SYMBOL . '" required', 'tel'); ?>
            <div class="p-2"></div>

            <label for="enquiry"><?php echo ENTRY_ENQUIRY; ?></label>
            <?php echo zen_draw_textarea_field('enquiry', '30', '7', $enquiry, 'id="enquiry" placeholder="' . ENTRY_REQUIRED_SYMBOL . '" required'); ?>

            <?php echo zen_draw_input_field($antiSpamFieldName, '', ' size="40" id="CUAS" style="visibility:hidden; display:none;" autocomplete="off"'); ?>
            
            <div class="btn-toolbar justify-content-end mt-3" role="toolbar">
                <?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?>
            </div>
        </div>
    </div>

    <div class="btn-toolbar my-3" role="toolbar">
        <?php echo zca_back_link(); ?>
    </div>
<?php
}
?>
    <?php echo '</form>'; ?>
</div>
