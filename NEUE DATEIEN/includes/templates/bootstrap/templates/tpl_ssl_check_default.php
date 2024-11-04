<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_ssl_check_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="sslCheckDefault" class="centerColumn">
    <h1 id="sslCheckDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <div id="sslCheckDefault-content" class="content"><?php echo TEXT_INFORMATION; ?></div>

    <h2 id="sslCheckDefault-pageSubHeading" class="pageSubHeading"><?php echo BOX_INFORMATION_HEADING; ?></h2>

    <div id="sslCheckDefault-content-one" class="content"><?php echo BOX_INFORMATION; ?></div>

    <p id="paragraph-one" class="content"><?php echo TEXT_INFORMATION_2; ?></p>
    <p id="paragraph-two" class="content"><?php echo TEXT_INFORMATION_3; ?></p>
    <p id="paragraph-three" class="content"><?php echo TEXT_INFORMATION_4; ?></p>
    <p id="paragraph-four" class="content"><?php echo TEXT_INFORMATION_5; ?></p>

    <div id="sslCheckDefault-btn-toolbar" class="btn-toolbar justify-content-end my-3" role="toolbar">
        <?php echo zca_button_link(zen_href_link(FILENAME_LOGIN, '', 'SSL'), BUTTON_CONTINUE_ALT, 'button_continue'); ?>
    </div>
</div>
