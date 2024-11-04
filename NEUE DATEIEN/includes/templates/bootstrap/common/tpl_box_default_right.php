<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_box_default_right.php 2024-10-26 15:22:39Z webchills $
 */

// -----
// The "core" Zen Cart sideboxes normally bracket the $title with a <label></label>;
// those tags are neither needed nor wanted for the bootstrap implementation.
//
$title = str_replace(['<label>', '</label>'], '', $title);

if (!empty($title_link)) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . BOX_HEADING_LINKS . '</a>';
}
?>
<div id="<?php echo str_replace('_', '-', $box_id ) . '-rightBoxCard'; ?>" class="rightBoxCard card mb-3">
    <h4 id="<?php echo str_replace('_', '-', $box_id) . '-rightBoxHeading'; ?>" class="rightBoxHeading card-header"><?php echo $title; ?></h4>
    <?php echo $content; ?>
</div>
