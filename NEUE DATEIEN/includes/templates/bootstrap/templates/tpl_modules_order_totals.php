<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_order_totals.php 2024-10-26 15:22:39Z webchills $
 */
// -----
// If a column-span for the title is provided, use it; otherwise, no colspan.
//
$zca_bootstrap_ot_colspan = !empty($_SESSION['zca_bootstrap_ot_colspan']) ? ' colspan="' . $_SESSION['zca_bootstrap_ot_colspan'] . '"' : '';

/**
 * Displays order-totals modules' output, as called from order_total::output
 */
for ($i = 0; $i < $size; $i++) {
?>
<tr id="<?php echo str_replace('_', '', $GLOBALS[$class]->code); ?>">
    <td<?php echo $zca_bootstrap_ot_colspan; ?> class="ot-title"><?php echo $GLOBALS[$class]->output[$i]['title']; ?></td>
    <td class="ot-text"><?php echo $GLOBALS[$class]->output[$i]['text']; ?></td> 
</tr>
<?php
}
