<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_search_header.php 2024-10-26 15:22:39Z webchills $
 */
// -----
// zc158 redefines the 'advanced_search_result' page as simply 'search_result.  If that
// new page's definition is present, the search result will be sent there for viewing;
// otherwise, it'll be sent to the legacy page.
//
$search_result_page = (defined('FILENAME_SEARCH_RESULT')) ? FILENAME_SEARCH_RESULT : FILENAME_ADVANCED_SEARCH_RESULT;

$content = '';
$content .= zen_draw_form('quick_find_header', zen_href_link($search_result_page, '', $request_type, false), 'get', 'class="form-inline"');
$content .= zen_draw_hidden_field('main_page', $search_result_page);
$content .= zen_draw_hidden_field('search_in_description', '1') . zen_hide_session_id();

$content .= '<div class="input-group">';
$content .= zen_draw_input_field('keyword', '', 'placeholder="' . HEADER_SEARCH_DEFAULT_TEXT . '" aria-label="' . HEADER_SEARCH_DEFAULT_TEXT . '" ');

$content .= '<div class="input-group-append">';

    $content .= zen_image_submit(BUTTON_IMAGE_SEARCH, HEADER_SEARCH_BUTTON);

$content .= '</div>';
$content .= '</div>';
$content .= '</form>';
