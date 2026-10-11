<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7k
 * Zen Cart German Specific
 * Copyright 2018-2026 rbarbour/lat9/drbyte/webchills 
 * Zen Cart German Specific (158 code in 157 / zencartpro adaptations)
 * Common Template
 *
 * outputs the html header. i,e, everything that comes before the \</head\> tag
 * 
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: html_header.php for Bootstrap Template 2026-10-11 08:47:39Z webchills $
 */

if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

$zco_notifier->notify('NOTIFY_HTML_HEAD_START', $current_page_base, $template_dir);

// Prevent clickjacking risks by setting X-Frame-Options:SAMEORIGIN
header('X-Frame-Options:SAMEORIGIN');
header('X-Content-Type-Options: nosniff');

/**
 * load the module for generating page meta-tags
 */
require DIR_WS_MODULES . zen_get_module_directory('meta_tags.php');

// -----
// Define a set of preloaded css/js files.  Done here in array since it's
// important that the preload matches the actual <link>/<script> parameters.
//
$preloads = [
    'jquery' => [
        'link' => 'https://code.jquery.com/jquery-3.7.1.min.js',
        'integrity' => 'sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=',
        'type' => 'script',
    ],
    'bscss' => [
        'link' => 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css',
        'integrity' => 'sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N',
        'type' => 'style',
    ],
    'bsjs' => [
        'link' => 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js',
        'integrity' => 'sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct',
        'type' => 'script',
    ],    
];

?>
<?php

if (!class_exists('MobileDetect')) {
  include_once(DIR_WS_CLASSES . 'vendors/MobileDetect/MobileDetect.php');
}
  $detect = new \Detection\MobileDetect;
  $isMobile = $detect->isMobile();
  $isTablet = $detect->isTablet();
  if (!isset($layoutType)) $layoutType = ($isMobile ? ($isTablet ? 'tablet' : 'mobile') : 'default');
  $paginateAsUL = true;


?>

<!DOCTYPE html>
<html <?= HTML_PARAMS ?>>
  <head>
    <meta charset="<?= CHARSET ?>">
<?php
// -----
// Provide a notification that the <head> tag has been rendered for the current page.
//
$zco_notifier->notify('NOTIFY_HTML_HEAD_TAG_START', $current_page_base);
?>
    <title><?= META_TAG_TITLE ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="<?= META_TAG_KEYWORDS ?>">
    <meta name="description" content="<?= META_TAG_DESCRIPTION ?>">
    <meta name="author" content="<?= zen_config('STORE_NAME') ?>">
    <meta name="generator" content="Zen-Cart - deutsche Version, https://www.zen-cart-pro.at">
<?php
if (defined('ROBOTS_PAGES_TO_SKIP') && in_array($current_page_base, explode(',', constant('ROBOTS_PAGES_TO_SKIP'))) || $current_page_base === 'down_for_maintenance' || $robotsNoIndex === true) {
?>
    <meta name="robots" content="noindex, nofollow">
<?php
}
?>
    <base href="<?= (($request_type === 'SSL') ? HTTPS_SERVER . DIR_WS_HTTPS_CATALOG : HTTP_SERVER . DIR_WS_CATALOG ) ?>">
<?php
if (defined('FAVICON')) {
?>
    <link href="<?= FAVICON ?>" type="image/x-icon" rel="icon">
    <link href="<?= FAVICON ?>" type="image/x-icon" rel="shortcut icon">
<?php
} //endif FAVICON

// -----
// Provide an easy way for a site to disable the preload, if they want to ensure
// that it's working properly.  If  includes/extra_datafiles/site-specific-bootstrap-settings.php does not exist 
// copy dist.site-specific-bootstrap-settings.php to site-specific-bootstrap-settings.php 
// and uncomment "// $zca_no_preloading = false;" and change that variable's value to (bool)true.
//
if (empty($zca_no_preloading)) {
    foreach ($preloads as $load) {
?>
    <link rel="preload" href="<?= $load['link'] ?>" integrity="<?= $load['integrity'] ?>" crossorigin="anonymous" as="<?= $load['type'] ?>">
<?php
    }
}

if (isset($canonicalLink) && $canonicalLink != '') {
?>
    <link href="<?= $canonicalLink ?>" rel="canonical">
<?php
}

// BOF hreflang for multilingual sites
if (!isset($lng) || !is_object($lng)) {
    $lng = new language();
}

if (count($lng->catalog_languages) > 1) {
    foreach ($lng->catalog_languages as $key => $value) {
        if ($this_is_home_page) {
            $hreflang_link = zen_href_link(FILENAME_DEFAULT, 'language=' . $key, $request_type, false);
        } else {
            $hreflang_link = $canonicalLink . (strpos($canonicalLink, '?') !== false ? '&amp;' : '?') . 'language=' . $key;
        }
        echo '<link href="' . $hreflang_link . '" hreflang="' . $key . '" rel="alternate">' . "\n";
    }
}
// EOF hreflang for multilingual sites

// Important to load Bootstrap CSS First...
foreach ($preloads as $load) {
    if ($load['type'] === 'style') {
?>
    <link rel="stylesheet" href="<?= $load['link'] ?>" integrity="<?= $load['integrity'] ?>" crossorigin="anonymous">
<?php
    }
}

$zco_notifier->notify('NOTIFY_HTML_HEAD_CSS_BEGIN', $current_page_base);

/**
 * Load all template-specific stylesheets, via the common CSS loader.
 */
require $template->get_template_dir('html_header_css_loader.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/html_header_css_loader.php';
/** CDN for jQuery core * */
foreach ($preloads as $load) {
    if ($load['type'] === 'script') {
?>
    <script src="<?= $load['link'] ?>" integrity="<?= $load['integrity'] ?>" crossorigin="anonymous"></script>
    
    
  <?php
    }
}

$zco_notifier->notify('NOTIFY_HTML_HEAD_JS_BEGIN', $current_page_base);
?>
    

<?php if (RSS_FEED_ENABLED == 'true'){ ?>
<?php echo rss_feed_link_alternate();?>
<?php } ?>
<?php
/**
 * Load all template-specific jscript files, via the common jscript loader.
 */
require $template->get_template_dir('html_header_js_loader.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/html_header_js_loader.php';
?>

  <?php require($template->get_template_dir('super_data_head.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/super_data_head.php'); ?>
  <link rel="stylesheet" href="extras/fontawesome/7.2.0/css/all.css" />
  <?php
  $zco_notifier->notify('NOTIFY_HTML_HEAD_END', $current_page_base);
  ?>
  </head>

<?php // NOTE: Blank line following is intended:   ?>
