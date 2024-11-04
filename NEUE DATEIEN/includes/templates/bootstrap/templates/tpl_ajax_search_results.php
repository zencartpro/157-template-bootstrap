<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_ajax_search_results.php 2024-10-26 15:22:39Z webchills $
 */
$search_result_page = (defined('FILENAME_SEARCH_RESULT')) ? FILENAME_SEARCH_RESULT : FILENAME_ADVANCED_SEARCH_RESULT;

foreach ($products_search as $next) {
?>
<div class="sugg col-md-6">
    <div class="sugg-content">
        <a href="<?= $next['link'] ?>">
            <div class="sugg-img"><?= $next['image'] ?></div>
            <div class="sugg-name"><?= $next['name'] ?></div>
            <div class="sugg-model"><?= $next['model'] ?></div>
            <div class="sugg-brand"><?= $next['brand'] ?></div>
            <div class="sugg-price"><?= $next['price'] ?></div>
        </a>
    </div>
</div>
<?php
}
?>
<div class="row col-12">
    <div class="col-12 d-flex justify-content-center">
        <?= sprintf(TEXT_AJAX_SEARCH_RESULTS, $search_results_count) ?>&nbsp;
        <a class="btn btn-default sugg-button" role="button" href="<?= zen_href_link(FILENAME_SEARCH_RESULT) ?>">
            <?= TEXT_AJAX_SEARCH_VIEW_ALL; ?>
        </a>
    </div>
</div>
