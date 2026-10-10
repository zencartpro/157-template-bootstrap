<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: config.zca_bootstrap_admin.php 2026-10-10 15:22:39Z webchills $
 */
// -----
// Load the admin template-change "watcher" for the bootstrap template.
//
$autoLoadConfig[200][] = array(
    'autoType' => 'init_script',
    'loadFile' => 'init_zca_bootstrap_template_admin.php'
);
