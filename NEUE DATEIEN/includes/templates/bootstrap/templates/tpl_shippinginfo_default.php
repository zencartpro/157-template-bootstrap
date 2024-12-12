<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_shippinginfo_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="shippinginfoDefault" class="centerColumn">
    <h1 id="shippinginfoDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php
if (DEFINE_SHIPPINGINFO_STATUS === '1' || DEFINE_SHIPPINGINFO_STATUS === '2') {
?>
    <div id="shippinginfoDefault-defineContent" class="defineContent">
<?php
/**
 * require the html_define for the shippinginfo page
 */
    require $define_page;
?>
    </div>
<?php
}
?>
    <div id="shippinginfoDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
        <?php echo zca_back_link(); ?>
    </div>
</div>
