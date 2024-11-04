<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_downloads.php 2024-10-26 15:22:39Z webchills $
 */
/**
 * require the downloads module
 */
require DIR_WS_MODULES . zen_get_module_directory('downloads.php');
// if download is not available yet
if ($downloadsNotAvailableYet) {
?>
<!--bof downloads hold card-->
<div id="downloadsHold-card" class="card mb-3">
    <div id="downloadsHold-card-body" class="card-body p-3">
        <?php echo DOWNLOADS_CONTROLLER_ON_HOLD_MSG ?>
    </div>
</div>
<!--eof downloads hold card-->
<?php
    return;
}

if ($numberOfDownloads < 1) {
  return;
}
// download is available
?>
<!--bof downloads card-->
<div id="downloads-card" class="card mb-3">
    <h4 id="downloads-card-header" class="card-header">
        <?php echo HEADING_DOWNLOAD; ?>
    </h4>
    <div id="downloads-card-body" class="card-body p-3">
        <div class="table-responsive">
            <table id="downloads-downloadTableDisplay" class="table table-bordered table-striped">
                <tr>
                    <th scope="col" id="downloadTableDisplay-productsHeading"><?php echo TABLE_HEADING_PRODUCT_NAME; ?></th>
                    <th scope="col" id="downloadTableDisplay-byteSizeHeading"><?php echo TABLE_HEADING_BYTE_SIZE; ?></th>
                    <th scope="col" id="downloadTableDisplay-filenameHeading"><?php echo TABLE_HEADING_DOWNLOAD_FILENAME; ?></th>
                    <th scope="col" id="downloadTableDisplay-dateHeading"><?php echo TABLE_HEADING_DOWNLOAD_DATE; ?></th>
                    <th scope="col" id="downloadTableDisplay-countHeading"><?php echo TABLE_HEADING_DOWNLOAD_COUNT; ?></th>
                    <th scope="col" id="downloadTableDisplay-buttonHeading">&nbsp;</th>
                </tr>
<?php
foreach($downloads as $file) {
?>
                <tr>
<?php
    if ($file['is_downloadable']) {
?>
                    <td class="downloadProductNameLink">
                        <?php echo '<a href="' . $file['link_url'] . '" download="' . $file['filename'] . '">' . $file['products_name'] . '</a>'; ?>
                    </td>
<?php
    } else {
?>
                    <td class="downloadProductName"><?php echo $file['products_name']; ?></td>
<?php
    }
?>
                    <td class="downloadFilesize"><?php echo $file['filesize'] . $file['filesize_units']; ?></td>
                    <td class="downloadFilename"><?php echo $file['filename']; ?></td>
                    <td class="downloadExpiry">
                        <?php echo ($file['unlimited_downloads']) ? TEXT_DOWNLOADS_UNLIMITED : zen_date_short($file['expiry']); ?>
                    </td>
                    <td class="downloadCounts centeredContent">
                        <?php echo ($file['unlimited_downloads']) ? TEXT_DOWNLOADS_UNLIMITED_COUNT : $file['download_count']; ?>
                    </td>
                    <td class="downloadButton centeredContent">
<?php
    if (!$file['is_downloadable']) {
        echo '&nbsp;';
    } else {
        echo '<a class="p-2 btn button_download" href="' . $file['link_url'] . '" download="' . $file['filename'] . '">' . BUTTON_DOWNLOAD_ALT . '</a>';
    }
?>
                    </td>
                </tr>
<?php
} // end foreach
?>
            </table>
        </div>
    </div>
</div>
<!--eof downloads card-->

<?php
if ($show_footer_link_to_my_account) {
?>
<p><?php printf(FOOTER_DOWNLOAD, '<a href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . HEADER_TITLE_MY_ACCOUNT . '</a>'); ?></p>
<?php } else { ?>
<?php
// other pages if needed
      }
?>
