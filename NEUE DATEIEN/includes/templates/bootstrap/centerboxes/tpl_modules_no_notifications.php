<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_no_notifications.php 2024-10-26 16:14:16Z webchills $
 */
?>
<div id="ProductNotifications-centerBoxContents" class="card mb-3 text-center">
    <div id="ProductNotifications-centerBoxHeading" class="centerBoxHeading card-header h4">
        <?= BOX_HEADING_NOTIFICATIONS ?>
    </div>
    <div id="ProductNotifications-card-body" class="card-body p-3 text-center">
        <a href="<?= zen_href_link($_GET['main_page'], zen_get_all_get_params(['action']) . 'action=notify', $request_type) ?>" title="<?= OTHER_BOX_NOTIFY_YES_ALT ?>">
            <?= zen_image(DIR_WS_TEMPLATE_IMAGES . OTHER_IMAGE_BOX_NOTIFY_YES, OTHER_BOX_NOTIFY_YES_ALT) ?>
            <br>
            <?= sprintf(BOX_NOTIFICATIONS_NOTIFY, zen_get_products_name($_GET['products_id'])) ?>
        </a>
    </div>
</div>
