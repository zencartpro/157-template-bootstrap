<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_unsubsribe_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="unsubscribeDefault" class="centerColumn">
<?php
if (!isset($_GET['action']) || ($_GET['action'] !== 'unsubscribe')) {
?>
    <h1 id="unsubscribeDefault-pageheading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <?php echo ($unsubscribe_address === '') ? UNSUBSCRIBE_TEXT_NO_ADDRESS_GIVEN : UNSUBSCRIBE_TEXT_INFORMATION; ?>

    <div id="unsubscribeDefault-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
        <?php echo zca_button_link(zen_href_link(FILENAME_UNSUBSCRIBE, 'addr=' . $unsubscribe_address . '&action=unsubscribe', 'SSL'), BUTTON_UNSUBSCRIBE, 'button_unsubscribe'); ?>
    </div>
<?php
} else {
?>
    <h1 id="unsubscribeDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <?php echo $status_display; ?>

    <div id="unsubscribeDefault-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
        <?php echo zca_button_link(zen_href_link(FILENAME_DEFAULT, '', 'SSL'), BUTTON_CONTINUE_SHOPPING_ALT, 'button_continue_shopping'); ?>
    </div>
<?php
}
?>
</div>