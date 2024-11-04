<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_conditions_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="conditionsDefault" class="centerColumn">
<?php if (IT_RECHT_KANZLEI_STATUS == 'ja') { ?>
    <h1 id="conditionsDefault-pageHeading" class="pageHeading"><?php echo $var_pageDetails->fields['pages_title']; ?></h1>
   <?php } else { ?>
<h1 id="conditionsDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>
<?php } ?> 
    
<?php
if (DEFINE_CONDITIONS_STATUS === '1' || DEFINE_CONDITIONS_STATUS === '2') {
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
        <?php echo zca_back_link(); ?>
    </div>
</div>
