<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_footer.php 2024-10-26 15:22:39Z webchills $
 */
require DIR_WS_MODULES . zen_get_module_directory('footer.php');

if (!isset($flag_disable_footer) || !$flag_disable_footer) {
?>
<div id="footerWrapper">

<!--bof-navigation display -->
<?php
    if (EZPAGES_STATUS_FOOTER === '1' || (EZPAGES_STATUS_FOOTER === '2' && zen_is_whitelisted_admin_ip())) {
        require $template->get_template_dir('tpl_ezpages_bar_footer.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_ezpages_bar_footer.php';
    }
?>
<!--eof-navigation display -->
<?php
    // -----
    // Add notification for plugin content insertion.
    //
    $zco_notifier->notify('NOTIFY_FOOTER_AFTER_NAVSUPP', []);
?>
<!--bof-ip address display -->
<?php
    if (SHOW_FOOTER_IP === '1') {
?>
    <div id="siteinfoIP" class="text-center"><?= TEXT_YOUR_IP_ADDRESS . '  ' . $_SERVER['REMOTE_ADDR'] ?></div>
<?php
    }
?>
<!--eof-ip address display -->

<!--bof-banner #5 display -->
<?php
    if (SHOW_BANNERS_GROUP_SET5 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET5)) {
        if (!$banner->EOF) {
            $find_banners = zen_build_banners_group(SHOW_BANNERS_GROUP_SET5);
            $banner_group = 5;
?>
    <div class="zca-banner bannerFive rounded">
<?php 
            if (ZCA_ACTIVATE_BANNER_FIVE_CAROUSEL === 'true') {
                require $template->get_template_dir('tpl_zca_banner_carousel.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/tpl_zca_banner_carousel.php'; 
            } else {
                echo zen_display_banner('static', $banner);
            }
?>
    </div>
<?php
        }
    }
?>
<!--eof-banner #5 display -->

<!--bof- site copyright display -->
    <div id="siteinfoLegal" class="legalCopyright text-center"><?= FOOTER_TEXT_BODY ?></div>
<!--eof- site copyright display -->
</div>
<?php
} // flag_disable_footer

if (false || !empty($showValidatorLink)) {
?>
<a href="https://validator.w3.org/check?uri=<?= urlencode('http' . ($request_type == 'SSL' ? 's' : '') . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . (strstr($_SERVER['REQUEST_URI'], '?') ? '&' : '?') . zen_session_name() . '=' . zen_session_id()) ?>" rel="noopener" target="_blank">VALIDATOR</a>
<?php
}
