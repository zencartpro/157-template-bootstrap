<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_best_sellers.php 2024-10-26 15:22:39Z webchills $
 */
$is_carousel = in_array('best_sellers', $sidebox_carousels);

// -----
// Non-carousel rendering ...
//
if ($is_carousel === false) {
    $content = '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="list-group-flush sideBoxContent">' . "\n";

    for ($i = 1, $j = count($bestsellers_list); $i <= $j; $i++) {
        $content .=
            '<a class="list-group-item list-group-item-action" href="' . zen_href_link(zen_get_info_page($bestsellers_list[$i]['id']), 'products_id=' . $bestsellers_list[$i]['id']) . '">' .
                $i . '. ' .
                zen_trunc_string($bestsellers_list[$i]['name'], BEST_SELLERS_TRUNCATE, BEST_SELLERS_TRUNCATE_MORE) .
            '</a>';
    }

    $content .= "</div>\n";
    return;
}

// -----
// Carousel rendering ...
//
$carousel_fade = in_array('best_sellers', $sidebox_carousels_to_fade) ? 'carousel-fade' : '';
$content =
    '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent text-center p-3">' .
        '<div class="carousel slide ' . $carousel_fade . '" data-ride="carousel"> .
            <div class="carousel-inner">' .
                '<div class="card-deck h-100">';

$active_class = 'active';
$bestseller_count = 1;
foreach ($bestsellers_list as $bestseller) {
    $content .=
        "\n" .
        '<div class="carousel-item h-100 ' . $active_class . '">' .
            '<div class="card mb-3 p-3 sideBoxContentItem">' .
                '#' . $bestseller_count .
                '<br>' .
                '<a href="' . $bestseller['href'] . '" title="' . zen_output_string_protected($bestseller['name']) . '">' .
                    $bestseller['image'] .
                    '<br>' .
                    $bestseller['name'] .
                '</a>' .
                '<div>' .
                    $bestseller['price'] .
                '</div>' .
            '</div>' .
        '</div>';

    $active_class = '';
    $bestseller_count++;
}

$content .=
    "           </div>
            </div>
        </div>
    </div>\n";
