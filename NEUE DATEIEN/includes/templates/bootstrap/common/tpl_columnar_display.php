<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_columnar_display.php 2024-10-26 15:22:39Z webchills $
 */
$title = $title ?? '';
$zco_notifier->notify('NOTIFY_TPL_COLUMNAR_DISPLAY_START', $current_page_base, $list_box_contents, $title);

$card_main_id = $card_main_id ?? '';
if ($card_main_id !== '') {
    $card_main_id = ' id="' . trim($card_main_id) . '"';
}
$card_main_class = $card_main_class ?? '';
if ($card_main_class !== '') {
    $card_main_class = ' ' . trim($card_main_class);
}
$card_body_id = $card_body_id ?? '';
if ($card_body_id !== '') {
    $card_body_id = ' id="' . $card_body_id . '"';
}
?>
<div class="card mb-3<?= $card_main_class ?>"<?= $card_main_id ?>>
<?php
echo $title;
?>
    <div class="card-body text-center"<?= $card_body_id ?>>
<?php
if (is_array($list_box_contents)) {
    foreach ($list_box_contents as $row => $cols) {
        $r_params = $list_box_contents[$row]['params'] ?? 'class="card-deck text-center"';
?>
        <div <?= $r_params ?>>
<?php
        foreach ($cols as $col) {
            if ($cols === 'params') {
                continue; // a $cols index named 'params' is only display-instructions ($r_params above) for the row, no data, so skip this iteration
            }

            if (!empty($col['wrap_with_classes'])) {
?>
            <div class="<?= $col['wrap_with_classes'] ?>">
<?php
            }

            $c_params = '';
            if (isset($col['params'])) {
                $c_params .= ' ' . (string)$col['params'];
            }
            if (isset($col['text'])) {
?>
                <div<?= $c_params ?>><?= $col['text'] ?></div>
<?php
            }

            if (!empty($col['wrap_with_classes'])) {
?>
            </div>
<?php
            }
        }
?>
        </div>
<?php
    }
}
?>
    </div>
</div>
<?php
$zco_notifier->notify('NOTIFY_TPL_COLUMNAR_DISPLAY_END', $current_page_base, $list_box_contents, $title);
