<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: config.zca_bootstrap.php 2024-10-26 15:14:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// -----
// Loading at CP#132 to enable the template's messageStack override to
// have effect on the use in init_customer_auth.php.  For Zen Cart
// versions zc157c and earlier, this requires a core-file edit to
// /includes/auto_loaders/config.core.php.  See GitHub issue#69 for
// additional information.
//
$autoLoadConfig[132][] = array(
    'autoType' => 'init_script',
    'loadFile' => 'init_zca_bootstrap.php'
);

// -----
// Load, and instantiate, the template's observer-class.
//
$autoLoadConfig[200][] = array(
    'autoType' => 'class',
    'loadFile' => 'observers/ZcaBootstrapObserver.php'
);
$autoLoadConfig[200][] = array(
    'autoType' => 'classInstantiate',
    'className' => 'ZcaBootstrapObserver',
    'objectName' => 'zcaBootstrap'
);