<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: bootstrap_additional_images.php 2024-10-26 15:14:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

$images_array = [];

// do not check for additional images when turned off
if ($products_image !== '' && $flag_show_product_info_additional_images !== '0') {
    $products_image_info = pathinfo($products_image);

    $products_image_extension = $products_image_info['extension'];  //-Note, does not include the leading '.'!
    $products_image_base = $products_image_info['filename'];
    $products_image_directory = $products_image_info['dirname'];

    // -----
    // Additional images in subdirectories *always" require an intervening '_' to match.
    // So do those in the /images root if we're running on zc210 or later and the
    // additional images' "mode" setting indicates that we're running in 'strict' mode,
    // in which case the intervening '_' is also needed.
    //
    zen_define_default('ADDITIONAL_IMAGES_MODE', 'legacy');
    if (ADDITIONAL_IMAGES_MODE === 'legacy' && $products_image_directory === '.') {
        $products_image_base .= '?';
        $products_image_directory = '';
    } else {
        $products_image_base .= '_';
        $products_image_directory .= '/';
    }

    $products_image_directory = DIR_WS_IMAGES . $products_image_directory;

    // Check for additional matching images
    foreach (glob($products_image_directory . $products_image_base . '*.' . $products_image_extension) as $file) {
        $images_array[] = $file;
    }
}

$zco_notifier->notify('NOTIFY_MODULES_ADDITIONAL_PRODUCT_IMAGES_LIST', NULL, $images_array);

// Build output based on images found
$num_images = count($images_array);
$list_box_contents = [];
$title = '';

if ($num_images !== 0) {
    $row = 0;
    $col = 0;
    $slideNumber = 1;
    foreach ($images_array as $base_image) {
        $thumb = '<a id="carousel-selector-' . $slideNumber . '" data-slide-to="' . $slideNumber . '" data-target="#productImagesCarousel">';
        $thumb .= zen_image($base_image, $products_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);
        $thumb .= '</a>';
        $slideNumber++;

        // List Box array generation:
        $list_box_contents[$row][$col] = [
            'params' => 'class="list-inline-item"',
            'text' => $thumb
        ];
        $col++;
    } // end for loop
} // endif
