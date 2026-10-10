<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: init.bc_config.php 2026-10-10 15:22:39Z webchills $
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
define('ZCA_BOOTSTRAP_COLORS_CURRENT_VERSION', '3.8.1');

// -----
// If this is an upgrade (or an initial install), load the installation/upgrade script to (at a minimum)
// get the ZCA_BOOTSTRAP_COLORS_VERSION recorded.
//
if (zen_config('ZCA_BOOTSTRAP_COLORS_VERSION') !== ZCA_BOOTSTRAP_COLORS_CURRENT_VERSION) {
    require DIR_WS_INCLUDES . 'init_includes/init_bc_config_install_or_upgrade.php';
}