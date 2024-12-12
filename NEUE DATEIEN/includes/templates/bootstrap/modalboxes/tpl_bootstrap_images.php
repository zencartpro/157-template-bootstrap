<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_bootstrap_images.php 2024-10-26 15:22:39Z webchills $
 */
if (!defined('IMAGE_ADDITIONAL_DISPLAY_LINK_EVEN_WHEN_NO_LARGE')) {
    define('IMAGE_ADDITIONAL_DISPLAY_LINK_EVEN_WHEN_NO_LARGE', 'Yes');
}
?>
<!-- Modal -->
<!-- BOOTSTRAP -->
<div class="modal fade bootstrap-slide-modal-lg" tabindex="-1" role="dialog" aria-labelledby="bootStrapImagesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bootStrapImagesModalLabel"><?php echo $products_name; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo TEXT_MODAL_CLOSE; ?>"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- main slider carousel -->
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2" id="slider">
                            <div id="productImagesCarousel" class="carousel slide">
                                <!-- main slider carousel items -->
                                <div class="carousel-inner text-center">
<?php
require DIR_WS_MODULES . zen_get_module_directory('main_product_image.php');
?>
                                    <div class="active item carousel-item" data-slide-number="0"><?php echo zen_image($products_image_large); ?></div>
<?php
require DIR_WS_MODULES . zen_get_module_directory('bootstrap_slide_additional_images.php');

if ($flag_show_product_info_additional_images !== '0' && $num_images > 0) {
    if (is_array($list_box_contents)) {
        for ($row = 0, $rn = count($list_box_contents); $row < $rn; $row++) {
            $params = '';

            for ($col = 0, $cn = count($list_box_contents[$row]); $col < $cn; $col++) {
                $r_params = '';
                if (isset($list_box_contents[$row][$col]['params'])) {
                    $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
                }
                if (isset($list_box_contents[$row][$col]['text'])) {
                    echo '<div' . $r_params . '>' . $list_box_contents[$row][$col]['text'] . '</div>';
                }
            }
        }
    }
}
?>
                                    <div id="carousel-btn-toolbar" class="btn-toolbar justify-content-between p-3" role="toolbar">
                                        <a class="carousel-control-prev left pt-3" href="#productImagesCarousel" data-slide="prev"><i class="fas fa-chevron-left" title="<?php echo BUTTON_PREVIOUS_ALT;?>"></i></a>
                                        <a class="carousel-control-next right pt-3" href="#productImagesCarousel" data-slide="next"><i class="fas fa-chevron-right" title="<?php echo BUTTON_NEXT_ALT;?>"></i></a>
                                    </div>
                                </div>
                                <!-- main slider carousel nav controls -->

                                <ul class="carousel-indicators list-inline mx-auto justify-content-center py-3">
                                    <li class="list-inline-item active">
                                        <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#productImagesCarousel">
<?php
require DIR_WS_MODULES . zen_get_module_directory('main_product_image.php');
?>
                                            <?php echo zen_image($products_image_large, $products_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT); ?>
                                        </a>
                                    </li>
<?php
require DIR_WS_MODULES . zen_get_module_directory('bootstrap_additional_images.php');

if ($flag_show_product_info_additional_images !== '0' && $num_images > 0) {
    if (is_array($list_box_contents) > 0 ) {
        for ($row = 0, $rn = count($list_box_contents); $row < $rn; $row++) {
            $params = '';

            for ($col = 0, $cn = count($list_box_contents[$row]); $col < $cn; $col++) {
                $r_params = '';
                if (isset($list_box_contents[$row][$col]['params'])) {
                    $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
                }
                if (isset($list_box_contents[$row][$col]['text'])) {
                    echo '<li' . $r_params . '>' . $list_box_contents[$row][$col]['text'] .  '</li>';
                }
            }
        }
    }
}
?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/main slider carousel-->
                </div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo TEXT_MODAL_CLOSE; ?></button></div>
        </div>
    </div>
</div>
