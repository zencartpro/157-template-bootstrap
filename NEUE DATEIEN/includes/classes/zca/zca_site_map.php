<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: zca_site_map.php 2026-10-10 15:14:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
/**
 * site_map.php
 *
 * @package general
 */
// -----
// Extend the base Zen Cart class, adding methods to allow the bootstrap styling
// to be added.
//
class zca_SiteMapTree extends zen_SiteMapTree 
{
    public function setParentStartEndStrings($start, $end = "</ul>\n")
    {
        $this->parent_group_start_string = $start;
        $this->parent_group_end_string = $end;
    }
    public function setChildStartString($start, $end = "</li>\n")
    {
        $this->child_start_string = $start;
        $this->child_end_string = $end;
    }
}
