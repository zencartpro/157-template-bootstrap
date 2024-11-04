<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_address_book_details.php 2024-10-26 15:22:39Z webchills $
 */
?>
<!--bof address details card-->
<div id="addressDetails-card" class="card mb-3">
    <h4 id="addressDetails-card-header" class="card-header"><?php echo HEADING_TITLE; ?></h4>
    <div id="addressDetails-card-body" class="card-body p-3">
    <?php require $template->get_template_dir('tpl_modules_common_address_format.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_common_address_format.php'; ?>
    </div>
</div>
<!--eof address details card-->
