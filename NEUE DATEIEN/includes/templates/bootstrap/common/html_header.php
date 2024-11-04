<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills
 * Zen Cart German Specific (158 code in 157 / zencartpro adaptations)
 * Common Template
 *
 * outputs the html header. i,e, everything that comes before the \</head\> tag
 * 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: html_header.php for Bootstrap Template 2024-11-04 17:22:39Z webchills $
 */

if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

$zco_notifier->notify('NOTIFY_HTML_HEAD_START', $current_page_base, $template_dir);

// Prevent clickjacking risks by setting X-Frame-Options:SAMEORIGIN
header('X-Frame-Options:SAMEORIGIN');

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
    'fa' => [
        'link' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css',
        'integrity' => 'sha512-UuQ/zJlbMVAw/UU8vVBhnI4op+/tFOpQZVT+FormmIEhRSCnJWyHiBbEVgM4Uztsht41f3FzVWgLuwzUqOObKw==',
        'type' => 'style',
    ],
    'fa-solid' => [
        'link' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/solid.min.css',
        'integrity' => 'sha512-Hp+WwK4QdKZk9/W0ViDvLunYjFrGJmNDt6sCflZNkjgvNq9mY+0tMbd6tWMiAlcf1OQyqL4gn2rYp7UsfssZPA==',
        'type' => 'style',
    ],
];
if (!empty($zca_load_fa_brands)) {
    $preloads['fa-brands'] = [
        'link' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/brands.min.css',
        'integrity' => 'sha512-DJLNx+VLY4aEiEQFjiawXaiceujj5GA7lIY8CHCIGQCBPfsEG0nGz1edb4Jvw1LR7q031zS5PpPqFuPA8ihlRA==',
        'type' => 'style',
    ];
 }
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
<html <?php echo HTML_PARAMS; ?>>
  <head>
    <meta charset="<?php echo CHARSET; ?>">
<?php
// -----
// Provide a notification that the <head> tag has been rendered for the current page.
//
$zco_notifier->notify('NOTIFY_HTML_HEAD_TAG_START', $current_page_base);

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
?>
    <title><?php echo META_TAG_TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="<?php echo META_TAG_KEYWORDS; ?>">
    <meta name="description" content="<?php echo META_TAG_DESCRIPTION; ?>">
    <meta name="language" content="<?php echo META_TAG_LANGUAGE; ?>" />
    <meta name="author" content="<?php echo STORE_NAME ?>">
    <meta name="generator" content="Zen-Cart - deutsche Version, https://www.zen-cart-pro.at">
    <?php if (defined('ROBOTS_PAGES_TO_SKIP') && in_array($current_page_base, explode(",", constant('ROBOTS_PAGES_TO_SKIP'))) || $current_page_base == 'down_for_maintenance' || $robotsNoIndex === true) { ?>
      <meta name="robots" content="noindex, nofollow">
    <?php } ?>
    <?php if (defined('FAVICON')) { ?>
      <link href="<?php echo FAVICON; ?>" type="image/x-icon" rel="icon">
      <link href="<?php echo FAVICON; ?>" type="image/x-icon" rel="shortcut icon">
    <?php } //endif FAVICON  ?>

    <base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER . DIR_WS_HTTPS_CATALOG : HTTP_SERVER . DIR_WS_CATALOG ); ?>">
    <?php if (isset($canonicalLink) && $canonicalLink != '') { ?>
      <link href="<?php echo $canonicalLink; ?>" rel="canonical">
    <?php } ?>
    <?php
    // BOF hreflang for multilingual sites
if (!isset($lng) || !is_object($lng)) {
    $lng = new language;
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
    
<?php
$manufacturers_id = (isset($_GET['manufacturers_id'])) ? $_GET['manufacturers_id'] : '';
?>
<?php if (RSS_FEED_ENABLED == 'true'){ ?>
<?php echo rss_feed_link_alternate();?>
<?php } ?>

<?php
/**
* load the loader files
*/
$RC_loader_files = array();
if($RI_CJLoader->get('status') && (!isset($Ajax) || !$Ajax->status())){
    $RI_CJLoader->autoloadLoaders();
    $RI_CJLoader->loadCssJsFiles();
    $RC_loader_files = $RI_CJLoader->header();

    if (!empty($RC_loader_files['meta']))
    foreach($RC_loader_files['meta'] as $file) {
        include($file['src']);
        echo "\n";
    }

    foreach($RC_loader_files['css'] as $file){
        if (!$file['defer']) {
          if($file['include']) {
              include($file['src']);
          } else if (!$RI_CJLoader->get('minify_css')) {
              
              echo '<link rel="stylesheet" type="text/css" href="'.$file['src'] .'" />'."\n";
          } else {
             
              echo '<link rel="stylesheet" type="text/css" href="extras/min/?f='.$file['src'].'&'.$RI_CJLoader->get('minify_time').'" />'."\n";
          }
        }
        else {
          if (!$RI_CJLoader->get('minify_css') || $file['external']) {
            echo '<noscript><link rel="stylesheet" type="text/css" href="'.$file['src'] .'" /></noscript>'."\n";
          } else {
            echo '<noscript><link rel="stylesheet" type="text/css" href="extras/min/?f='.$file['src'].'&'.$RI_CJLoader->get('minify_time').'" /></noscript>'."\n";
          }
        }
    }
}
?>

  <?php require($template->get_template_dir('super_data_head.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/super_data_head.php'); ?>
  <?php
  $zco_notifier->notify('NOTIFY_HTML_HEAD_END', $current_page_base);
  ?>
  </head>

<?php // NOTE: Blank line following is intended:   ?>
