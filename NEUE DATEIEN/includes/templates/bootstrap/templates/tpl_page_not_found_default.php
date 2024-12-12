<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_page_not_found_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="pageNotFoundDefault" class="centerColumn">
    <h1 id="pageNotFoundDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>
<?php
if (DEFINE_PAGE_NOT_FOUND_STATUS === '1') {
?>
    <div id="pageNotFoundDefault-defineContent" class="defineContent">
        <?php require $define_page; ?>
    </div>
<?php
}

echo $zen_SiteMapTree->buildTree();
?>
    
    <ul class="list-group">
<?php
if (SHOW_ACCOUNT_LINKS_ON_SITE_MAP === 'Yes') {
?>
        <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . PAGE_ACCOUNT . '</a>'; ?>
            <ul class="list-group">
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL') . '">' . PAGE_ACCOUNT_EDIT . '</a>'; ?></li>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') . '">' . PAGE_ADDRESS_BOOK . '</a>'; ?></li>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">' . PAGE_ACCOUNT_HISTORY . '</a>'; ?></li>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL') . '">' . PAGE_ACCOUNT_NOTIFICATIONS . '</a>'; ?></li>
            </ul>
        </li>
        <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_SHOPPING_CART) . '">' . PAGE_SHOPPING_CART . '</a>'; ?></li>
        <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '">' . PAGE_CHECKOUT_SHIPPING . '</a>'; ?></li>
<?php
}

// -----
// zc158 redefines the 'advanced_search' page as simply 'search.  If that
// new page's definition is present, the search will be sent there for viewing;
// otherwise, it'll be sent to the legacy page.
//
$search_page = (defined('FILENAME_SEARCH')) ? FILENAME_SEARCH : FILENAME_ADVANCED_SEARCH;
?>
        <li class="list-group-item"><?php echo '<a href="' . zen_href_link($search_page) . '">' . PAGE_ADVANCED_SEARCH . '</a>'; ?></li>
        <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCTS_NEW) . '">' . PAGE_PRODUCTS_NEW . '</a>'; ?></li>
        <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_SPECIALS) . '">' . PAGE_SPECIALS . '</a>'; ?></li>
        <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_REVIEWS) . '">' . PAGE_REVIEWS . '</a>'; ?></li>
        <li class="list-group-item"><?php echo BOX_HEADING_INFORMATION; ?>
            <ul class="list-group">
<?php
if (DEFINE_SHIPPINGINFO_STATUS <= '1') {
?>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_SHIPPING) . '">' . BOX_INFORMATION_SHIPPING . '</a>'; ?></li>
<?php
}

if (DEFINE_PRIVACY_STATUS <= '1') {
?>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_PRIVACY) . '">' . BOX_INFORMATION_PRIVACY . '</a>'; ?></li>
<?php
}

if (DEFINE_CONDITIONS_STATUS <= '1') {
?>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_CONDITIONS) . '">' . BOX_INFORMATION_CONDITIONS . '</a>'; ?></li>
<?php
}

if (DEFINE_CONTACT_US_STATUS <= '1') {
?>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">' . BOX_INFORMATION_CONTACT . '</a>'; ?></li>
<?php
}

if (!empty($external_bb_url) && !empty($external_bb_text)) {
?>
                <li class="list-group-item"><?php echo '<a href="' . $external_bb_url . '" rel="noopener" target="_blank">' . $external_bb_text . '</a>'; ?></li>
<?php
}

if (defined('MODULE_ORDER_TOTAL_GV_STATUS') && MODULE_ORDER_TOTAL_GV_STATUS === 'true') {
?>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_GV_FAQ) . '">' . BOX_INFORMATION_GV . '</a>'; ?></li>
<?php
}

if (defined('MODULE_ORDER_TOTAL_COUPON_STATUS') && MODULE_ORDER_TOTAL_COUPON_STATUS === 'true') {
?>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_DISCOUNT_COUPON) . '">' . BOX_INFORMATION_DISCOUNT_COUPONS . '</a>'; ?></li>
<?php
}

if (SHOW_NEWSLETTER_UNSUBSCRIBE_LINK === 'true') {
?>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_UNSUBSCRIBE) . '">' . BOX_INFORMATION_UNSUBSCRIBE . '</a>'; ?></li>
<?php
}

if (DEFINE_PAGE_2_STATUS <= '1') {
?>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_PAGE_2) . '">' . BOX_INFORMATION_PAGE_2 . '</a>'; ?></li>
<?php
}

if (DEFINE_PAGE_3_STATUS <= '1') {
?>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_PAGE_3) . '">' . BOX_INFORMATION_PAGE_3 . '</a>'; ?></li>
<?php
}

if (DEFINE_PAGE_4_STATUS <= '1') {
?>
                <li class="list-group-item"><?php echo '<a href="' . zen_href_link(FILENAME_PAGE_4) . '">' . BOX_INFORMATION_PAGE_4 . '</a>'; ?></li>
<?php
}
?>
            </ul>
        </li>
    </ul>

    <div id="pageNotFoundDefault-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
        <?php echo zca_back_link(); ?>
    </div>
</div>
