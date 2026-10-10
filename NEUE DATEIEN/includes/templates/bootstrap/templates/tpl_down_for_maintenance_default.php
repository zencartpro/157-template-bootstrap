<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_down_for_maintenance_default.php 2026-10-10 15:22:39Z webchills $
 */
?>
<!-- body_text //-->
<div id="downForMaintenanceDefault" class="centerColumn">
    <h1 id="downForMaintenanceDefault-pageHeading" class="pageHeading"><?= HEADING_TITLE ?></h1>

    <?= zen_image(DIR_WS_TEMPLATE_IMAGES . OTHER_IMAGE_DOWN_FOR_MAINTENANCE, OTHER_DOWN_FOR_MAINTENANCE_ALT) ?>

    <div id="downForMaintenanceDefault-content" class="content">
        <h2><?= DOWN_FOR_MAINTENANCE_TEXT_INFORMATION ?></h2>
    </div>
<?php
if (zen_config('DISPLAY_MAINTENANCE_TIME') === 'true') {
?>
    <div id="downForMaintenanceDefault-content-one" class="content">
        <h3><?= TEXT_MAINTENANCE_ON_AT_TIME . '<br>' . TEXT_DATE_TIME ?></h3>
    </div>
<?php
}

if (zen_config('DISPLAY_MAINTENANCE_PERIOD') === 'true') {
?>
    <div id="downForMaintenanceDefault-content-two" class="content">
        <h3><?= TEXT_MAINTENANCE_PERIOD . TEXT_MAINTENANCE_PERIOD_TIME ?></h3>
    </div>
<?php
}
?>
    <div class="p-3"></div>

    <div id="downForMaintenanceDefault-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
        <?= DOWN_FOR_MAINTENANCE_STATUS_TEXT ?>
        <?= zca_button_link(zen_href_link(FILENAME_DEFAULT), BUTTON_CONTINUE_ALT, 'button_continue') ?>
    </div>
<!-- body_text_eof //-->
</div>
