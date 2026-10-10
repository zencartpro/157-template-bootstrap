<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018 - 2026 rbarbour/lat9/drbyte/webchills 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_page_default.php 2026-10-10 15:22:39Z webchills $
 */
?>
<div id="pageDefault" class="centerColumn">
    <h1 id="pageDefault-pageHeading" class="pageHeading"><?= $var_pageDetails->fields['pages_title'] ?></h1>
<?php
if ($tplSetting->EZPAGES_SHOW_PREV_NEXT_BUTTONS === '2' && $counter > 1) {
?>
    <div id="pageDefault-btn-group" class="btn-group my-3 text-center d-none d-sm-block" role="group">
        <a href="<?= $prev_link ?>"><?= $previous_button ?></a>
        <?= zen_back_link() . $home_button ?></a>
        <a href="<?= $next_link ?>"><?= $next_item_button ?></a>
    </div>

    <div id="pageDefault-btn-group2" class="btn-group my-3 text-center d-block d-sm-none" role="group">
        <a href="<?= $prev_link ?>"><span class="btn btn-primary"><?= '<i class="fas fa-angle-left" title="' . BUTTON_PREVIOUS_ALT . '"></i>' ?></span></a>
        <?= zen_back_link() . $home_button ?></a>
        <a href="<?= $next_link ?>"><span class="btn btn-primary"><?= '<i class="fas fa-angle-right" title="' . BUTTON_NEXT_ALT . '"></i>' ?></span></a>
    </div>
<?php
} elseif ($tplSetting->EZPAGES_SHOW_PREV_NEXT_BUTTONS === '1') {
?>
    <div id="pageDefault-btn-toolbar" class="btn-toolbar justify-content-center my-3" role="toolbar">
        <?= zen_back_link() . $home_button . '</a>' ?>
    </div>
<?php
}
?>
    <br>
<?php
// vertical TOC listing
// create a table of contents for chapter when more than 1 page in the TOC
if (count($toc_links) > 1 && $tplSetting->EZPAGES_SHOW_TABLE_CONTENTS === '1') {
?>
    <ul id="pageDefault-list-group" class="list-group mb-3">
        <li class="list-group-item list-group-item-secondary"><?= TEXT_EZ_PAGES_TABLE_CONTEXT ?></li>
<?php
    foreach($toc_links as $link) {
        // could be used to change classes on current link and toc (table of contents) links
        if ($link['pages_id'] === $_GET['id']) {
            $current_page_indicator = CURRENT_PAGE_INDICATOR;
            $page_link_params = ' class="activeLink"';
        } else {
            $current_page_indicator = NOT_CURRENT_PAGE_INDICATOR;
            $page_link_params = '';
        }
?>
        <li class="list-group-item">
            <?= $current_page_indicator ?><a href="<?= zen_ez_pages_link($link['pages_id']);?>"<?= $page_link_params ?>><?= $link['pages_title'] ?></a>
        </li>
<?php
    }
?>
    </ul>
<?php
}
?>
    <div id="pageDefault-content" class="content">
        <?= $var_pageDetails->fields['pages_html_text'] ?>
    </div>
</div>
