<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_account_newsletters_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="accountNewslettersDefault" class="centerColumn">
<?php echo zen_draw_form('account_newsletter', zen_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL')) . zen_draw_hidden_field('action', 'process'); ?>

    <h1 id="accountNewslettersDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if ($messageStack->size('newsletter') > 0) echo $messageStack->output('newsletter'); ?>

<!--bof general newsletter card-->
    <div id="generalNewsletter-card" class="card mb-3">
        <h4 id="generalNewsletter-card-header" class="card-header"><?php echo MY_NEWSLETTERS_GENERAL_NEWSLETTER; ?></h4>
        <div id="generalNewsletter-card-body" class="card-body p-3">
            <div class="custom-control custom-checkbox">
                <?php echo zen_draw_checkbox_field('newsletter_general', '1', ($newsletter->fields['customers_newsletter'] === '1'), 'id="newsletter"'); ?>
                <label class="custom-control-label" for="newsletter"><?php echo MY_NEWSLETTERS_GENERAL_NEWSLETTER_DESCRIPTION; ?></label>
            </div>

            <div id="generalNewsletter-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
                <?php echo zen_image_submit(BUTTON_IMAGE_UPDATE, BUTTON_UPDATE_ALT); ?>
            </div>
        </div>
    </div>
<!--eof general newsletter card-->

    <div id="accountNewslettersDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
        <?php echo zca_button_link(zen_href_link(FILENAME_ACCOUNT, '', 'SSL'), BUTTON_BACK_ALT, 'button_back'); ?>
    </div>

<?php echo '</form>'; ?>
</div>
