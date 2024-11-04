<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: manufacturer_info.php 2024-10-26 15:14:16Z webchills $
 */
if (isset($_GET['products_id'])) {
    $manufacturer_info_sidebox_query =
        "SELECT m.manufacturers_id, m.manufacturers_name, m.manufacturers_image, mi.manufacturers_url
           FROM " . TABLE_MANUFACTURERS . " m
                LEFT JOIN " . TABLE_MANUFACTURERS_INFO . " mi
                    ON m.manufacturers_id = mi.manufacturers_id
                   AND mi.languages_id = " . (int)$_SESSION['languages_id'] . ", " . TABLE_PRODUCTS . " p
          WHERE p.products_id = " . (int)$_GET['products_id'] . "
            AND p.manufacturers_id = m.manufacturers_id";
    $manufacturer_info_sidebox = $db->Execute($manufacturer_info_sidebox_query);

    if ($manufacturer_info_sidebox->RecordCount() > 0) {
        require $template->get_template_dir('tpl_modules_manufacturer_info.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes'). '/tpl_modules_manufacturer_info.php';
    }
}
