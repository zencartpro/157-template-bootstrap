<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_account_password_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="accountPasswordDefault" class="centerColumn">
    <?php echo zen_draw_form('account_password', zen_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL'), 'post', 'onsubmit="return check_form(account_password);"') . zen_draw_hidden_field('action', 'process'); ?>

        <div id="myPassword-card" class="card mb-3">
            <h4 id="myPassword-card-header" class="card-header"><?php echo HEADING_TITLE; ?></h4>
            <div d="myPassword-card-body" class="card-body p-3">
                <div class="required-info text-right"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<?php
if ($messageStack->size('account_password') > 0) {
    echo $messageStack->output('account_password');
}
?>
                <label class="inputLabel" for="password-current"><?php echo ENTRY_PASSWORD_CURRENT; ?></label>
                <?php echo zen_draw_password_field('password_current','','id="password-current" autocomplete="current-password" placeholder="' . ENTRY_PASSWORD_CURRENT_TEXT . '" required'); ?>
                <div class="p-2"></div>

                <label class="inputLabel" for="password-new"><?php echo ENTRY_PASSWORD_NEW; ?></label>
                <?php echo zen_draw_password_field('password_new','','id="password-new" autocomplete="new-password" placeholder="' . ENTRY_PASSWORD_NEW_TEXT . '" required'); ?>
                <div class="p-2"></div>

                <label class="inputLabel" for="password-confirm"><?php echo ENTRY_PASSWORD_CONFIRMATION; ?></label>
                <?php echo zen_draw_password_field('password_confirmation','','id="password-confirm" autocomplete="new-password" placeholder="' . ENTRY_PASSWORD_CONFIRMATION_TEXT . '" required'); ?>

                <div id="myPassword-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
                    <?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_ALT); ?>
                </div>
            </div>
        </div>

        <div id="accountPasswordDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
             <?php echo zca_button_link(zen_href_link(FILENAME_ACCOUNT, '', 'SSL'), BUTTON_BACK_ALT, 'button_back'); ?>
        </div>

    <?php echo '</form>'; ?>
</div>
