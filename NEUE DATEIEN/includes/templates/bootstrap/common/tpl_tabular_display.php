<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_tabular_display.php 2024-10-26 15:22:39Z webchills $
 */
$zco_notifier->notify('NOTIFY_TPL_TABULAR_DISPLAY_START', $current_page_base, $list_box_contents);

$cell_scope = (empty($cell_scope)) ? 'col' : $cell_scope;
$cell_title = (empty($cell_title)) ? 'list' : $cell_title;
?>
<table id="<?php echo 'cat' . $cPath . 'Table'; ?>" class="tabTable table-bordered table-striped table-hover">
<?php
foreach ($list_box_contents as $row => $cols) {
    $r_params = '';
    if (isset($list_box_contents[$row]['params'])) {
        $r_params .= ' ' . $list_box_contents[$row]['params'];
    }
?>
    <tr<?php echo $r_params; ?>>
<?php
    foreach ($cols as $col) {
        $c_params = '';
        $cell_type = ($row == 0) ? 'th' : 'td';
        if (isset($col['params'])) {
            $c_params .= ' ' . $col['params'];
        }
        if (!empty($col['align'])) {
            $c_params .= ' align="' . $col['align'] . '"';
        }

        if ($cell_type == 'th') {
            $c_params .= ' scope="' . $cell_scope . '"';
        }
        if (isset($col['text'])) {
            echo '<' . $cell_type . $c_params . '>' . $col['text'] . '</' . $cell_type . '>'  . "\n";
        }
    }
?>
    </tr>
<?php
}
?>
</table>
<?php
$zco_notifier->notify('NOTIFY_TPL_TABULAR_DISPLAY_END', $current_page_base, $list_box_contents);

