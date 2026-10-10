<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_document_categories.php 2026-10-10 15:22:39Z webchills $
 */
$content = '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="list-group-flush sideBoxContent">';
foreach ($box_categories_array as $next_category) {
    switch(true) {
        case ($next_category['top'] == 'true'):
            $new_style = 'sideboxCategory-top';
            break;
        case ($next_category['has_sub_cat']):
            $new_style = 'sideboxCategory-subs';
            break;
      default:
            $new_style = 'sideboxCategory-products';
            break;
    }

    $content .= '<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center ' . $new_style . '" href="' . zen_href_link(FILENAME_DEFAULT, $next_category['path']) . '">';

    if ($next_category['current']) {
        if ($next_category['has_sub_cat']) {
            $content .= '<span class="sideboxCategory-subs-parent">' . $next_category['name'] . '</span>';
        } else {
            $content .= '<span class="sideboxCategory-subs-selected">' . $next_category['name'] . '</span>';
        }
    } else {
        $content .= $next_category['name'];
    }

    if ($next_category['has_sub_cat']) {
        $content .= $tplSetting->CATEGORIES_SEPARATOR;
    }

    if (zen_config('SHOW_COUNTS') === 'true') {
        if (($tplSetting->CATEGORIES_COUNT_ZERO === '1' && $next_category['count'] == 0) || $next_category['count'] >= 1) {
            $content .= '<span class="badge badge-pill">' . $tplSetting->CATEGORIES_COUNT_PREFIX . $next_category['count'] . $tplSetting->CATEGORIES_COUNT_SUFFIX . '</span>';
        }
    }

    $content .= '</a>';
}
$content .= '</div>';
