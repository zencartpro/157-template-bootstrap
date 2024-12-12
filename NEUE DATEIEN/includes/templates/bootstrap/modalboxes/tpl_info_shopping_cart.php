<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_info_shopping_cart.php 2024-10-26 15:22:39Z webchills $
 */
zca_load_language_for_modal('info_shopping_cart');
?>
<!-- Modal -->
<div class="modal fade" id="cartHelpModal" tabindex="-1" role="dialog" aria-labelledby="cartHelpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartHelpModalLabel"><?php echo HEADING_TITLE_CART_MODAL; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo TEXT_MODAL_CLOSE; ?>"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h2><?php echo SUB_HEADING_TITLE_1; ?></h2>
                <p><?php echo SUB_HEADING_TEXT_1; ?></p>
                <h2><?php echo SUB_HEADING_TITLE_2; ?></h2>
                <p><?php echo SUB_HEADING_TEXT_2; ?></p>
                <h2><?php echo SUB_HEADING_TITLE_3; ?></h2>
                <p><?php echo SUB_HEADING_TEXT_3; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo TEXT_MODAL_CLOSE; ?></button>
            </div>
        </div>
    </div>
</div>
