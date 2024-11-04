<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_image.php 2024-10-26 15:22:39Z webchills $
 */
?>
<!-- Modal -->
<div class="modal fade image-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="image-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel"><?php echo $products_name; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo TEXT_MODAL_CLOSE; ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="productLargeImageModal" class="modal-body"><?php echo zen_image($products_image_large, $products_name); ?></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo TEXT_MODAL_CLOSE; ?></button>
            </div>
        </div>
    </div>
</div>
