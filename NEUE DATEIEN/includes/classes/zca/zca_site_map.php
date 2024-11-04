<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: zca_site_map.php 2024-10-26 15:14:16Z webchills $
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
