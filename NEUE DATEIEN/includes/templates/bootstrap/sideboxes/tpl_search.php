<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_search.php 2026-10-10 15:22:39Z webchills $
 */
$content =
    '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent text-center p-3">' .
        zen_draw_form('quick_find', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', $request_type, false), 'get') .
            zen_draw_hidden_field('main_page', FILENAME_ADVANCED_EARCH_RESULT) .
            zen_draw_hidden_field('search_in_description', '1') .
            zen_hide_session_id() .
            zen_draw_input_field('keyword', '', 'placeholder="' . SEARCH_DEFAULT_TEXT . '" aria-label="' . SEARCH_DEFAULT_TEXT . '"') .
            '<br>' .
            zen_image_submit(BUTTON_IMAGE_SEARCH, HEADER_SEARCH_BUTTON) .
            '<br>' .
            '<a href="' . zen_href_link(FILENAME_ADVANCED_SEARCH) . '">' . BOX_SEARCH_ADVANCED_SEARCH . '</a>' .
        '</form>' .
    '</div>';
