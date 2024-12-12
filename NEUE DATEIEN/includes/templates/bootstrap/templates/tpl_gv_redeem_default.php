<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_gv_redeem_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="gvRedeemDefault" class="centerColumn">
    <h1 id="gvRedeemDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <div id="gvRedeemDefault-content" class="content"><?php echo sprintf($message, $_GET['gv_no']); ?></div>

    <div id="gvRedeemDefault-content-one" class="content"><?php echo TEXT_INFORMATION; ?></div>
<?php
$link = zen_href_link(FILENAME_DEFAULT);
if (isset($_GET['goback']) && $_GET['goback'] === 'true') {
    $link = zen_href_link(FILENAME_GV_FAQ);
}
?>
    <div id="gvFaqDefault-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
        <?php echo zca_button_link($link, BUTTON_CONTINUE_ALT, 'button_continue'); ?>
    </div>
</div>
