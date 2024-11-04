<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_customers_authorization_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="customersAuthorizationDefault" class="centerColumn">
    <h1 id="customersAuthorizationDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <div id="customersAuthorizationDefault-image"><?php echo zen_image(DIR_WS_TEMPLATE_IMAGES . OTHER_IMAGE_CUSTOMERS_AUTHORIZATION, OTHER_IMAGE_CUSTOMERS_AUTHORIZATION_ALT); ?></div>

    <div id="customersAuthorizationDefault-content" class="content"><?php echo CUSTOMERS_AUTHORIZATION_TEXT_INFORMATION; ?></div>

    <div id="customersAuthorizationDefault-content1" class="content"><?php echo CUSTOMERS_AUTHORIZATION_STATUS_TEXT; ?></div>

    <div id="customersAuthorizationDefault-btn-toolbar1" class="btn-toolbar my-3" role="toolbar">
        <?php echo zca_button_link(zen_href_link(CUSTOMERS_AUTHORIZATION_FILENAME), BUTTON_CONTINUE_ALT, 'button_continue'); ?>
    </div>
</div>
