<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_cookie_usage_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="cookieUsageDefault" class="centerColumn">
    <h1 id="cookieUsageDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

    <div id="cookieUsageDefault-content" class="content my-3"><?php echo TEXT_INFORMATION; ?></div>

<!--bof cookie privacy and security card-->
    <div id="cookiePrivacy-card" class="card mb-3">
        <h4 id="cookiePrivacy-card-header" class="card-header"><?php echo BOX_INFORMATION_HEADING; ?></h4>
        <div id="cookiePrivacy-card-body" class="card-body p-3">
            <p id="paragraph-one" class="content my-3"><?php echo BOX_INFORMATION; ?></p>
            <p id="paragraph-two" class="content my-3"><?php echo TEXT_INFORMATION_2; ?></p>
            <p id="paragraph-three" class="content my-3"><?php echo TEXT_INFORMATION_3; ?></p>
            <p id="paragraph-four" class="content my-3"><?php echo TEXT_INFORMATION_4; ?></p>
            <p id="paragraph-five" class="content my-3"><?php echo TEXT_INFORMATION_5; ?></p>
            <div id="cookiePrivacy-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
                <?php echo zca_button_link(zen_back_link(true), BUTTON_CONTINUE_ALT, 'button_continue'); ?>
            </div>
        </div>
    </div>
<!--eof cookie privacy and security card-->
</div>
