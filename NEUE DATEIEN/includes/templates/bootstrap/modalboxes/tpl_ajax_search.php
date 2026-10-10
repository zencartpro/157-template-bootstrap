<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_ajax_search.php 2026-10-10 19:22:39Z webchills $
 */
// -----
// Part of the Bootstrap template for Zen Cart.  Included by /includes/templates/bootstrap/common/tpl_main_page.php.
//
// Bootstrap v3.8.0
//
if ($tplSetting->BS4_AJAX_SEARCH_ENABLE === 'true') {
    $ajax_search_parameter = ($tplSetting->BS4_AJAX_SEARCH_INC_DESC === 'true') ? 'search_in_description=1' : '';
?>
    <div id="search-wrapper" class="modal fade" role="dialog" aria-labelledby="search-modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body container-fluid">
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?= TEXT_MODAL_CLOSE ?>"><i class="fas fa-times"></i></button>
                    <h5 class="modal-title mb-1" id="search-modal-title"><?= TEXT_AJAX_SEARCH_TITLE ?></h5>
                    <div class="form-group">
                        <form class="search-form">
                            <label for="search-input"><?= BUTTON_SEARCH_ALT ?>:</label>
                            <input type="text" id="search-input" class="form-control" placeholder="<?= TEXT_AJAX_SEARCH_PLACEHOLDER ?>">
                            <input id="search-page" type="hidden" value="<?= zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, $ajax_search_parameter) ?>">
                        </form>
                    </div>
                    <div id="search-content" class="row"></div>
                </div>
            </div>
        </div>
    </div>
<?php
}
