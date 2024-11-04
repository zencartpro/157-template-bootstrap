<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_shipping_estimator.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div class="modal fade" id="shippingEstimatorModal" tabindex="-1" role="dialog" aria-labelledby="shippingEstimatorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title mx-auto" id="shippingEstimatorModalLabel"><?= CART_SHIPPING_OPTIONS ?></h3>
                <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="<?= TEXT_MODAL_CLOSE ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
      
            <div class="modal-body">
                <?php require DIR_WS_MODULES . zen_get_module_directory('shipping_estimator.php'); ?>
            </div>
      
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= TEXT_MODAL_CLOSE ?></button>
            </div>
        </div>
    </div>
</div>