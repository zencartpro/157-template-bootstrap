<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_page_2_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="page2Default" class="centerColumn">
    <h1 id="page2Default-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php
if (DEFINE_PAGE_2_STATUS === '1' || DEFINE_PAGE_2_STATUS === '2') {
?>
    <div id="page2Default-defineContent" class="defineContent">
<?php
/**
 * load the html_define for the page_2 default
 */
    require $define_page;
?>
    </div>
<?php
}
?>
    <div id="page2Default-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
        <?php echo zca_back_link(); ?>
    </div>
</div>