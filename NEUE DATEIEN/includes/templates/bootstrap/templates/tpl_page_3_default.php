<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_page_3_default.php 2026-10-10 15:22:39Z webchills $
 */
?>
<div id="page3Default" class="centerColumn">
    <h1 id="page3Default-pageHeading" class="pageHeading"><?= HEADING_TITLE ?></h1>

<?php
if (in_array($tplSetting->DEFINE_PAGE_3_STATUS, ['1', '2'], true)) {
?>
    <div id="page3Default-defineContent" class="defineContent">
<?php
/**
 * load the html_define for the page_3 default
 */
    require $define_page;
?>
    </div>
<?php
}
?>
    <div id="page3Default-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
        <?= zca_back_link() ?>
    </div>
</div>
