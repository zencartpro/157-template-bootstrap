<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: init.bc_config.php 2024-11-01 15:22:39Z webchills $
 */

// -----
// Wait until an admin is logged in before installing or updating ...
//
if (!isset($_SESSION['admin_id'])) {
    return;
}

// -----
// The ZCA Bootstrap Colors version doesn't necessarily change on each base
// Bootstrap template update, only when one or more configuration settings
// is added, removed or updated.  Initially added for Bootstrap v3.5.2, note that
// its setting might not be the same as the base template's version!
//
define('ZCA_BOOTSTRAP_COLORS_CURRENT_VERSION', '3.6.2');

// -----
// If this is an upgrade (or an initial install), load the installation/upgrade script to (at a minimum)
// get the ZCA_BOOTSTRAP_COLORS_VERSION recorded.
//
if (!defined('ZCA_BOOTSTRAP_COLORS_VERSION') || ZCA_BOOTSTRAP_COLORS_VERSION !== ZCA_BOOTSTRAP_COLORS_CURRENT_VERSION) {
    require DIR_WS_INCLUDES . 'init_includes/init_bc_config_install_or_upgrade.php';
}