<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7g
 * Zen Cart German Specific
 * Copyright 2018- 2023 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: config.zca_bootstrap_admin.php 2023-12-21 15:22:39Z webchills $
 */
// -----
// Load the admin template-change "watcher" for the bootstrap template.
//
$autoLoadConfig[200][] = array(
    'autoType' => 'init_script',
    'loadFile' => 'init_zca_bootstrap_template_admin.php'
);
