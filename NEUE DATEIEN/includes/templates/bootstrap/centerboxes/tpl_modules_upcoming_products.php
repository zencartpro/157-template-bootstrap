<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_upcoming_products.php 2024-10-26 15:14:16Z webchills $
 */
?>
<!-- bof: upcoming_products -->
<div id="upcomingProducts-centerBoxContents" class="card mb-3 text-center">
<h4 id="upcomingProducts-centerBoxHeading" class="centerBoxHeading card-header"><?php echo TABLE_HEADING_UPCOMING_PRODUCTS; ?></h4>
<div id="upcomingProducts-card-body" class="card-body p-3 text-center">

   <div class="table-responsive">
<table id="upcomingProducts-table" class="table table-striped table-hover">
<caption><?php echo CAPTION_UPCOMING_PRODUCTS; ?></caption>
  <tr>
    <th scope="col" id="upcomingProducts-tableProductHeading"><?php echo TABLE_HEADING_PRODUCTS; ?></th>
    <th scope="col" id="upcomingProducts-tableDateHeading"><?php echo TABLE_HEADING_DATE_EXPECTED; ?></th>
  </tr>
<?php
    for($i=0, $row=0, $n=sizeof($expectedItems); $i<$n; $i++, $row++) {
      $rowClass = (($row / 2) == floor($row / 2)) ? "rowEven" : "rowOdd";
      echo '  <tr class="' . $rowClass . '">' . "\n";
      echo '    <td><a href="' . zen_href_link(zen_get_info_page($expectedItems[$i]['products_id']), 'cPath=' . $productsInCategory[$expectedItems[$i]['products_id']] . '&products_id=' . $expectedItems[$i]['products_id']) . '">' . $expectedItems[$i]['products_name'] . '</a></td>' . "\n";
      echo '    <td class="text-right" >' . zen_date_short($expectedItems[$i]['date_expected']) . '</td>' . "\n";
      echo '  </tr>' . "\n";
    }
?>
</table>
   </div>
  </div>
</div>
<!-- eof: upcoming_products -->
