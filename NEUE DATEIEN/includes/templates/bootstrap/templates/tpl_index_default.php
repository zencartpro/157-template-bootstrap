<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_index_default.php 2024-10-26 17:22:39Z webchills $
 */
?>
<div id="indexDefault" class="centerColumn">
<?php
// -----
// For accessibility, an <h1> tag can't contain an empty string.  If that's the case, use
// generic wording for the title and render the <h1> tag for screen-readers only.
//
$screen_reader_only = '';
$heading_title = HEADING_TITLE;
if ($heading_title === '') {
    $heading_title = HEADING_TITLE_SCREENREADER;
    $screen_reader_only = ' sr-only';
}
?>
<h1 id="indexDefault-pageHeading" class="pageHeading<?php echo $screen_reader_only; ?>"><?php echo $heading_title; ?></h1>

<?php if (SHOW_CUSTOMER_GREETING == 1) { ?>
<h2 id="indexDefault-greeting" class="greeting"><?php echo zen_customer_greeting(); ?></h2>
<?php } ?>

<?php
// -----
// Load the home-page slider.
//
?>
<div id="home-slider">
    <?php require $template->get_template_dir('tpl_index_slider.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_index_slider.php'; ?>
</div>

<?php if (DEFINE_MAIN_PAGE_STATUS >= 1 and DEFINE_MAIN_PAGE_STATUS <= 2) { ?>
<?php
/**
 * get the Define Main Page Text
 */
?>
<div id="indexDefault-defineContent" class="defineContent"><?php require $define_page; ?></div>
<?php } ?>

<?php
  $show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_MAIN);
  while (!$show_display_category->EOF) {
?>

<?php if ($show_display_category->fields['configuration_key'] === 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>
<?php require $template->get_template_dir('tpl_modules_featured_products.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_featured_products.php'; ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] === 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require $template->get_template_dir('tpl_modules_specials_default.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_specials_default.php'; ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] === 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require $template->get_template_dir('tpl_modules_whats_new.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_whats_new.php'; ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] === 'SHOW_PRODUCT_INFO_MAIN_UPCOMING') { ?>
<?php
/**
 * display the Upcoming Products Center Box
 */
?>
<?php require DIR_WS_MODULES . zen_get_module_directory('centerboxes/' . FILENAME_UPCOMING_PRODUCTS) ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] === 'SHOW_PRODUCT_INFO_MAIN_FEATURED_CATEGORIES') { ?>
<?php
/**
 * display the Featured Categories Center Box
 */
?>
<?php require $template->get_template_dir('tpl_modules_featured_categories.php', DIR_WS_TEMPLATE, $current_page_base, 'centerboxes') . '/tpl_modules_featured_categories.php'; ?>
<?php } ?>

<?php
  $show_display_category->MoveNext();
} // !EOF
?>
</div>
