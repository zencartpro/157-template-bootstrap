<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_conditions_default.php 2026-10-10 15:22:39Z webchills $
 */
?>
<div id="conditionsDefault" class="centerColumn">
<?php if (IT_RECHT_KANZLEI_STATUS == 'ja') { ?>
    <h1 id="conditionsDefault-pageHeading" class="pageHeading"><?php echo $var_pageDetails->fields['pages_title']; ?></h1>
   <?php } else { ?>
    <h1 id="conditionsDefault-pageHeading" class="pageHeading"><?= HEADING_TITLE ?></h1>
<?php } ?> 
    
<?php
if (in_array($tplSetting->DEFINE_CONDITIONS_STATUS, ['1', '2'], true)) {
?>
    <div id="conditionsDefault-defineContent" class="defineContent">
<?php if (IT_RECHT_KANZLEI_STATUS == 'ja') { ?>
<?php echo $var_pageDetails->fields['pages_html_text']; ?>
<?php } else { ?>
<?php
    /**
     * require the html_define for the conditions page
     */
    require $define_page;
?>
<?php } ?>
    </div>
<?php
}
?>
    <div id="conditionsDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
        <?= zca_back_link() ?>
    </div>
</div>
