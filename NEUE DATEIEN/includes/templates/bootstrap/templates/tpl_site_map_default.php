<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_site_map_default.php 2024-10-26 17:22:39Z webchills $
 */
?>
<div id="siteMapDefault" class="centerColumn">
    <h1 id="siteMapDefault-pageHeading" class="pageHeading"><?= HEADING_TITLE ?></h1>
<?php
if (DEFINE_SITE_MAP_STATUS === '1' || DEFINE_SITE_MAP_STATUS === '2') {
?>
    <div id="siteMapDefault-defineContent" class="defineContent">
<?php
/**
 * require the html_define for the site_map page
 */
  require $define_page;
?>
    </div>
<?php
}

echo $zen_SiteMapTree->buildTree();
?>
    <ul class="list-group">
<?php
if (SHOW_ACCOUNT_LINKS_ON_SITE_MAP === 'Yes') {
?>
        <li class="list-group-item"><a href="<?= zen_href_link(FILENAME_ACCOUNT, '', 'SSL') ?>"><?= PAGE_ACCOUNT ?></a>
            <ul class="list-group">
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL') . '">' . PAGE_ACCOUNT_EDIT . '</a>' ?></li>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') . '">' . PAGE_ADDRESS_BOOK . '</a>' ?></li>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">' . PAGE_ACCOUNT_HISTORY . '</a>' ?></li>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL') . '">' . PAGE_ACCOUNT_NOTIFICATIONS . '</a>' ?></li>
            </ul>
        </li>
        <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_SHOPPING_CART) . '">' . PAGE_SHOPPING_CART . '</a>' ?></li>
        <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '">' . PAGE_CHECKOUT_SHIPPING . '</a>' ?></li>
<?php
}
?>
        <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_SEARCH) . '">' . PAGE_ADVANCED_SEARCH . '</a>' ?></li>
        <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_PRODUCTS_NEW) . '">' . PAGE_PRODUCTS_NEW . '</a>' ?></li>
        <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_SPECIALS) . '">' . PAGE_SPECIALS . '</a>' ?></li>
        <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_REVIEWS) . '">' . PAGE_REVIEWS . '</a>' ?></li>
        <li class="list-group-item"><?= BOX_HEADING_INFORMATION ?>
            <ul class="list-group">
<?php
if (DEFINE_SHIPPINGINFO_STATUS <= '1') {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_SHIPPING) . '">' . BOX_INFORMATION_SHIPPING . '</a>' ?></li>
<?php
}
if (DEFINE_PRIVACY_STATUS <= '1') {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_PRIVACY) . '">' . BOX_INFORMATION_PRIVACY . '</a>' ?></li>
<?php
}
if (DEFINE_CONDITIONS_STATUS <= '1') {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_CONDITIONS) . '">' . BOX_INFORMATION_CONDITIONS . '</a>' ?></li>
<?php
}
if (defined('FILENAME_ACCESSIBILITY') && (!empty($flag_show_accessibility_sidebox_link))) {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_ACCESSIBILITY) . '">' . BOX_INFORMATION_ACCESSIBILITY . '</a>' ?></li>
<?php
}
if (DEFINE_CONTACT_US_STATUS <= '1') {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">' . BOX_INFORMATION_CONTACT . '</a>' ?></li>
<?php
}
if (!empty($external_bb_url) && !empty($external_bb_text)) {
?>
                <li class="list-group-item"><?= '<a href="' . $external_bb_url . '" rel="noopener" target="_blank">' . $external_bb_text . '</a>' ?></li>
<?php
}
if (defined('MODULE_ORDER_TOTAL_GV_STATUS') && MODULE_ORDER_TOTAL_GV_STATUS === 'true') {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_GV_FAQ) . '">' . BOX_INFORMATION_GV . '</a>' ?></li>
<?php
}
if (defined('MODULE_ORDER_TOTAL_COUPON_STATUS') && MODULE_ORDER_TOTAL_COUPON_STATUS === 'true') {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_DISCOUNT_COUPON) . '">' . BOX_INFORMATION_DISCOUNT_COUPONS . '</a>' ?></li>
<?php
}
if (SHOW_NEWSLETTER_UNSUBSCRIBE_LINK === 'true') {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_UNSUBSCRIBE) . '">' . BOX_INFORMATION_UNSUBSCRIBE . '</a>' ?></li>
<?php
}
if (DEFINE_PAGE_2_STATUS <= '1') {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_PAGE_2) . '">' . BOX_INFORMATION_PAGE_2 . '</a>' ?></li>
<?php
}
if (DEFINE_PAGE_3_STATUS <= '1') {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_PAGE_3) . '">' . BOX_INFORMATION_PAGE_3 . '</a>' ?></li>
<?php
}
if (DEFINE_PAGE_4_STATUS <= '1') {
?>
                <li class="list-group-item"><?= '<a href="' . zen_href_link(FILENAME_PAGE_4) . '">' . BOX_INFORMATION_PAGE_4 . '</a>' ?></li>
<?php
}
?>
            </ul>
        </li>
<?php 
$pages_query = $db->Execute(
    "SELECT e.*, ec.*
       FROM " . TABLE_EZPAGES . " e, " . TABLE_EZPAGES_CONTENT . " ec
      WHERE e.pages_id = ec.pages_id
        AND ec.languages_id = " . (int)$_SESSION['languages_id'] . "
        AND
          (
            (e.status_sidebox = 1 AND e.sidebox_sort_order > 0) OR
            (e.status_header = 1 AND e.header_sort_order > 0) OR
            (e.status_footer = 1 AND e.footer_sort_order > 0) OR
            (e.status_visible = 1)
          )
      ORDER BY e.sidebox_sort_order, ec.pages_title"
);
if (!$pages_query->EOF) {
    $rows = 0;
    $page_query_list = [];
    foreach ($pages_query as $page_query) {
        $rows++;
        $page_query_list[$rows]['id'] = $page_query['pages_id'];
        $page_query_list[$rows]['name'] = $page_query['pages_title'];
        $page_query_list[$rows]['altURL'] = '';
        $page_alt_url_http = (stripos($page_query['alt_url'], 'http') === 0);
        switch (true) {
            // external link new window or same window
            case ($page_query['alt_url_external'] !== ''):
                $page_query_list[$rows]['altURL']  = $page_query['alt_url_external'];
                break;
            // internal link new window or same window
            case ($page_query['alt_url'] !== ''):
                $page_query_list[$rows]['altURL']  = ($page_alt_url_http === true) ? $page_query['alt_url'] : zen_href_link($page_query['alt_url'], '', 'SSL', true, true, true);
                break;
            default:
                break;
        }

        // if altURL is specified, use it; otherwise, use EZPage ID to create link
        $page_query_list[$rows]['link'] = ($page_query_list[$rows]['altURL'] === '') ?
            zen_href_link(FILENAME_EZPAGES, 'id=' . $page_query['pages_id'] . ($page_query['toc_chapter'] > 0 ? '&chapter=' . $page_query['toc_chapter'] : ''), 'SSL') :
            $page_query_list[$rows]['altURL'];
        $page_query_list[$rows]['link'] .= ($page_query['page_open_new_window'] === '1' ? '" rel="noreferrer noopener" target="_blank' : '');
    }
    if (!empty($page_query_list)) {
?>
        <li class="list-group-item"><?= BOX_HEADING_MORE_INFORMATION ?>
            <ul class="list-group">
<?php
        foreach ($page_query_list as $item) {
?>
                <li class="list-group-item"><?= '<a href="' . $item['link'] . '">' . $item['name'] . '</a>' ?></li>
<?php
        }
?>
            </ul>
        </li>
<?php
    }
}
?>
    </ul>
    <div id="siteMapDefault-btn-toolbar" class="btn-toolbar mt-3" role="toolbar">
        <?= zca_back_link() ?>
    </div>
</div>
