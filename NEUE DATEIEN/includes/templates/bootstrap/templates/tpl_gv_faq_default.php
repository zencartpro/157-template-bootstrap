<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_gv_faq_default.php 2024-10-26 17:22:39Z webchills $
 */
?>
<div id="gvFaqDefault" class="centerColumn">
<?php
// only show when there is a GV balance
if (!empty($customer_has_gv_balance)) {
    require $template->get_template_dir('tpl_modules_send_or_spend.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_send_or_spend.php';
}
?>
    <div id="giftCertificateFaq-card" class="card mb-3">
        <h4 id="giftCertificateFaq-card-header" class="card-header"><?= HEADING_TITLE ?></h4>
        <div id="giftCertificateFaq-card-body" class="card-body p-3"> 
            <div id="giftCertificateFaq-content" class="content"><?= TEXT_INFORMATION ?></div>
            <h2 id="giftCertificateFaq-subHeading" class="pageSubHeading"><?= $subHeadingTitle ?></h2>
            <div id="giftCertificateFaq-content-two" class="content"><?= $subHeadingText ?></div>
            <div id="giftCertificateFaq-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
                <?= zca_back_link() ?>
            </div>
        </div>
    </div>

    <div id="giftCertificateRedemption-card" class="card">
        <h4 id="giftCertificateRedemption-card-header" class="card-header"><?= TEXT_GV_REDEEM_INFO ?></h4>
        <div id="giftCertificateRedemption-card-body" class="card-body">
            <form action="<?= zen_href_link(FILENAME_GV_REDEEM, '', 'NONSSL', false) ?>" method="get">
                <?= zen_draw_hidden_field('main_page', FILENAME_GV_REDEEM) . zen_draw_hidden_field('goback', 'true') . zen_hide_session_id() ?>

                <label class="inputLabel" for="lookup-gv-redeem"><?= TEXT_GV_REDEEM_ID ?></label>
                <?= zen_draw_input_field('gv_no', '', 'size="18" id="lookup-gv-redeem"') ?>

                <div id="giftCertificateRedemption-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
                    <?= zen_image_submit(BUTTON_IMAGE_REDEEM, BUTTON_REDEEM_ALT) ?>
                </div>
            </form>
        </div>
    </div>
</div>
