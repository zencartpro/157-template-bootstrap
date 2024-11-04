<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_manufacturer_info.php 2024-10-26 15:14:16Z webchills $
 */
$mi_id = $manufacturer_info_sidebox->fields['manufacturers_id'];
$mi_name = $manufacturer_info_sidebox->fields['manufacturers_name'];
?>
<div id="manufacturerInfo-centerBoxContents" class="card mb-3 text-center">
    <div id="manufacturerInfo-centerBoxHeading" class="centerBoxHeading card-header h4">
        <?= BOX_HEADING_MANUFACTURER_INFO ?>
    </div>
    <div id="manufacturerInfo-card-body" class="card-body p-3 text-center">
        <div class="text-center mb-3">
            <?= zen_image(DIR_WS_IMAGES . $manufacturer_info_sidebox->fields['manufacturers_image'], $mi_name) ?>
        </div>
        <ul class="list-group">
<?php
if (!empty($manufacturer_info_sidebox->fields['manufacturers_url'])) {
?>
            <li class="list-group-item">
                <a href="<?= zen_href_link(FILENAME_REDIRECT, 'action=manufacturer&manufacturers_id=' . $mi_id) ?>" target="_blank">
                    <?= sprintf(BOX_MANUFACTURER_INFO_HOMEPAGE, $mi_name) ?>
                </a>
            </li>
<?php
}
?>
            <li class="list-group-item">
                <a href="<?= zen_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $mi_id) ?>">
                    <?= BOX_MANUFACTURER_INFO_OTHER_PRODUCTS ?>
                </a>
            </li>
        </ul>
    </div>
</div>
