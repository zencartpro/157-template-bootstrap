<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_send_or_spend.php 2024-10-26 15:22:39Z webchills $
 */
require DIR_WS_MODULES . zen_get_module_directory('send_or_spend.php');
?>
<!--bof send or spend card-->
<div id="sendOrSpend-card" class="card mb-3">
    <h4 id="sendOrSpend-card-header" class="card-header">
        <?php echo BOX_HEADING_GIFT_VOUCHER; ?>
    </h4>
    <div id="sendOrSpend-card-body" class="card-body p-3">
        <p id="paragraph" class="content">
            <?php echo TEXT_SEND_OR_SPEND; ?>
        </p>
        <p id="paragraph-one" class="content">
            <?php echo  TEXT_BALANCE_IS . $customer_gv_balance; ?>
        </p>

        <div id="sendOrSpend-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
            <?php echo zca_button_link(zen_href_link(FILENAME_GV_SEND, '', 'SSL'), BUTTON_SEND_A_GIFT_CERT_ALT, 'button_send_a_gift_cert'); ?>
        </div>
    </div>
</div>
<!--eof send or spend card-->
