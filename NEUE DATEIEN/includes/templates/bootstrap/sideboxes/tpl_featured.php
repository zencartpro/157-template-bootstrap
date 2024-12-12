<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_featured.php 2024-10-26 15:22:39Z webchills $
 */
$is_carousel = in_array('featured', $sidebox_carousels);

$content = '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent text-center p-3">';
if ($is_carousel === true) {
    $carousel_fade = in_array('featured', $sidebox_carousels_to_fade) ? 'carousel-fade' : '';
    $content .=
        '<div class="carousel slide ' . $carousel_fade . '" data-ride="carousel">
            <div class="carousel-inner">' .
                '<div class="card-deck h-100">';
}

$active_class = 'active';
while (!$random_featured_product->EOF) {
    $current_featured = $random_featured_product->fields;
    $featured_id = $current_featured['products_id'];
    $featured_name = $current_featured['products_name'];
    $featured_box_price = zen_get_products_display_price($featured_id);
    $featured_link = zen_href_link(zen_get_info_page($featured_id), 'cPath=' . zen_get_generated_category_path_rev($current_featured['master_categories_id']) . '&products_id=' . $featured_id);

    $carousel_start = ($is_carousel === true) ? '<div class="carousel-item h-100 ' . $active_class . '">' : '';
    $carousel_end = ($is_carousel === true) ? '</div>' : '';

    $content .=
    "\n" .
    $carousel_start .
    '<div class="card mb-3 p-3 sideBoxContentItem">' .
        '<a href="' . $featured_link . '" title="' . zen_output_string_protected($featured_name) . '">' .
            zen_image(DIR_WS_IMAGES . $current_featured['products_image'], $featured_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) .
            '<br>' .
            $featured_name .
        '</a>' .
        '<div>' .
            $featured_box_price .
        '</div>' .
    '</div>' .
    $carousel_end;

    $active_class = '';
    $random_featured_product->MoveNextRandom();
}

if ($is_carousel === true) {
    $content .=
        '       </div>
            </div>
        </div>';
}

$content .= "</div>\n";
