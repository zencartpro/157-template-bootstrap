<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_password_forgotten_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="passwordForgottenDefault" class="centerColumn">
    <?php echo zen_draw_form('password_forgotten', zen_href_link(FILENAME_PASSWORD_FORGOTTEN, 'action=process', 'SSL')); ?>
<?php
if ($messageStack->size('password_forgotten') > 0) {
    echo $messageStack->output('password_forgotten');
}
?>
        <div id="passwordForgottenDefault-content" class="content mb-3"><?php echo TEXT_MAIN; ?></div>

        <div id="passwordForgottenDefault-card" class="card mb-3">
            <h4 id="passwordForgottenDefault-card-header" class="card-header"><?php echo HEADING_TITLE; ?></h4>
            <div id="passwordForgottenDefault-card-body" class="card-body p-3">
                <div id="passwordForgottenDefault-required-info" class="required-info text-right"><?php echo FORM_REQUIRED_INFORMATION; ?></div>

                <label for="email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
                <?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' id="email-address" autocomplete="username" placeholder="' . ENTRY_EMAIL_ADDRESS_TEXT . '" required', 'email'); ?>
            </div>
        </div>

        <div id="passwordForgottenDefault-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
            <?php echo zca_back_link() . zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_ALT); ?>
        </div>

    <?php echo '</form>'; ?>
</div>
