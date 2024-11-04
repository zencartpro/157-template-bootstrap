<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_down_for_maintenance_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<!-- body_text //-->
<div id="downForMaintenanceDefault" class="centerColumn">
    <h1 id="downForMaintenanceDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <?php echo zen_image(DIR_WS_TEMPLATE_IMAGES . OTHER_IMAGE_DOWN_FOR_MAINTENANCE, OTHER_DOWN_FOR_MAINTENANCE_ALT); ?>

    <div id="downForMaintenanceDefault-content" class="content">
        <h2><?php echo DOWN_FOR_MAINTENANCE_TEXT_INFORMATION; ?></h2>
    </div>
<?php
if (DISPLAY_MAINTENANCE_TIME === 'true') {
?>
    <div id="downForMaintenanceDefault-content-one" class="content">
        <h3><?php echo TEXT_MAINTENANCE_ON_AT_TIME . '<br>' . TEXT_DATE_TIME; ?></h3>
    </div>
<?php
}

if (DISPLAY_MAINTENANCE_PERIOD === 'true') {
?>
    <div id="downForMaintenanceDefault-content-two" class="content">
        <h3><?php echo TEXT_MAINTENANCE_PERIOD . TEXT_MAINTENANCE_PERIOD_TIME; ?></h3>
    </div>
<?php
}
?>
    <div class="p-3"></div>

    <div id="downForMaintenanceDefault-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
        <?php echo DOWN_FOR_MAINTENANCE_STATUS_TEXT; ?>
        <?php echo zca_button_link(zen_href_link(FILENAME_DEFAULT), BUTTON_CONTINUE_ALT, 'button_continue'); ?>
    </div>
<!-- body_text_eof //-->
</div>
