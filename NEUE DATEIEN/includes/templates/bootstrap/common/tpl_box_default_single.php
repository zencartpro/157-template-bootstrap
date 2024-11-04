<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_box_default_single.php 2024-10-26 15:22:39Z webchills $
 */

// choose box images based on box position
  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . BOX_HEADING_LINKS . '</a>';
  }
//
?>
<!--// bof: <?php echo $box_id; ?> //-->
<div id="<?php echo str_replace('_', '-', $box_id ) . '-singleBoxCard'; ?>" class="singleBoxCard card mb-3">
    

<h4 id="<?php echo str_replace('_', '-', $box_id) . '-singleBoxHeading'; ?>" class="singleBoxHeading card-header"><?php echo $title; ?></h4>

<?php echo $content; ?>

</div>
<!--// eof: <?php echo $box_id; ?> //-->

