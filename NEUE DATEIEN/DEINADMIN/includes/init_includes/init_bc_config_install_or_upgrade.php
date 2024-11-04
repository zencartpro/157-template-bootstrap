<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: init.bc_config_install_or_upgrade.php 2024-11-01 15:22:39Z webchills $
 */
// -----
// Brought in by /admin/init_includes/init_bc_config.php for an initial installation or upgrade to the colors. 
//
// Determine the configuration-group id to use for the plugin's settings, creating that
// group if it's not currently present.
//
$bc_menu_title = 'ZCA Bootstrap Colors';
$configuration = $db->Execute(
    "SELECT configuration_group_id
       FROM " . TABLE_CONFIGURATION_GROUP . "
      WHERE configuration_group_title = '$bc_menu_title'
      LIMIT 1"
);
if (!$configuration->EOF) {
    $bccid = $configuration->fields['configuration_group_id'];
    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION_GROUP . "
            SET visible = 0
          WHERE configuration_group_id = $bccid
          LIMIT 1"
    );
} else {
    $db->Execute(
        "INSERT INTO " . TABLE_CONFIGURATION_GROUP . "
            (configuration_group_title, configuration_group_description, language_id, sort_order, visible)
         VALUES
            ('$bc_menu_title', '$bc_menu_title', 43, 1, 1)"
    );
    $bccid = $db->Insert_ID();
    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION_GROUP . "
            SET sort_order = $bccid
          WHERE configuration_group_id = $bccid
          LIMIT 1"
    );
}

// -----
// This array identifies the current "Bootstrap Colors" configuration elements.
// These values are used by the processing below on an initial installation or upgrade
// of the ZCA Bootstrap template's 'coloring'.
//
// Each entry, keyed by the color's 'configuration_key' contains:
//
// - 'configuration_title' ... The color's configuration title
// - 'configuration_value' ... The color's default configuration value; its description indicates this default value.
// - 'sort_order' ............ The sort-order of the color on the display.  Note that different sections use a different sort-order range!
// - 'added' ................. This (optional) value indicates the version of Bootstrap (prior to v3.5.2) or the Bootstrap Colors (after that) that the color was added.
// - 'set_default' ........... This (optional) value indicates whether, on an upgrade, a newly-added color should be initialized to its default; otherwise, the value's set to 'not-set'.
//
$zca_bc_colors = [
    // -----
    // Body-related colors sort-orders range from 0-999
    //
    'ZCA_BODY_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Body</b> Background Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 1,
    ],
    'ZCA_BODY_TEXT_COLOR' => [
        'configuration_title' => 'Body Text Color',
        'configuration_value' => '#000000',
        'sort_order' => 10,
    ],
    'ZCA_BODY_BREADCRUMBS_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Body Breadcrumbs</b> Background Color',
        'configuration_value' => '#cccccc',
        'sort_order' => 100,
    ],
    'ZCA_BODY_BREADCRUMBS_TEXT_COLOR' => [
        'configuration_title' => 'Body Breadcrumbs Text Color',
        'configuration_value' => '#000000',
        'sort_order' => 110,
    ],
    'ZCA_BODY_BREADCRUMBS_LINK_COLOR' => [
        'configuration_title' => 'Body Breadcrumbs Link Color',
        'configuration_value' => '#0a3f52',
        'sort_order' => 120,
    ],
    'ZCA_BODY_BREADCRUMBS_LINK_COLOR_HOVER' => [
        'configuration_title' => 'Body Breadcrumbs Link Color on Hover',
        'configuration_value' => '#003c52',
        'sort_order' => 130,
    ],
    'ZCA_BODY_PRODUCTS_BASE_COLOR' => [
        'configuration_title' => '<b>Body Products</b> Base Price',
        'configuration_value' => '#000000',
        'sort_order' => 200,
    ],
    'ZCA_BODY_PRODUCTS_NORMAL_COLOR' => [
        'configuration_title' => 'Body Products Normal Price',
        'configuration_value' => '#000000',
        'sort_order' => 210,
    ],
    'ZCA_BODY_PRODUCTS_SPECIAL_COLOR' => [
        'configuration_title' => 'Body Products Special Price',
        'configuration_value' => '#a80000',
        'sort_order' => 220,
    ],
    'ZCA_BODY_PRODUCTS_DISCOUNT_COLOR' => [
        'configuration_title' => 'Body Products Price Discount Price',
        'configuration_value' => '#a80000',
        'sort_order' => 230,
    ],
    'ZCA_BODY_PRODUCTS_SALE_COLOR' => [
        'configuration_title' => 'Body Products Sale Price',
        'configuration_value' => '#a80000',
        'sort_order' => 240,
    ],
    'ZCA_BODY_PRODUCTS_FREE_COLOR' => [
        'configuration_title' => 'Body Products Free Price',
        'configuration_value' => '#0000ff',
        'sort_order' => 250,
    ],
    'ZCA_BODY_PLACEHOLDER' => [
        'configuration_title' => '<b>Body Form</b> Placeholder',
        'configuration_value' => '#a80000',
        'sort_order' => 260,
    ],
    'ZCA_ALERT_INFO_COLOR' => [
        'configuration_title' => '<b>Alert Info Color</b>',
        'configuration_value' => '#13525e',
        'sort_order' => 270,
        'added' => '3.6.0',
    ],
    'ZCA_ALERT_INFO_BACKGROUND_COLOR' => [
        'configuration_title' => 'Alert Info Background Color',
        'configuration_value' => '#d1ecf1',
        'sort_order' => 280,
        'added' => '3.6.0',
    ],
    'ZCA_ALERT_INFO_BORDER_COLOR' => [
        'configuration_title' => 'Alert Info Border Color',
        'configuration_value' => '#bee5eb',
        'sort_order' => 290,
        'added' => '3.6.0',
    ],
    'ZCA_BODY_RATING_STAR_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Body Rating Stars</b> Background Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 500,
        'added' => '3.5.2',
    ],
    'ZCA_BODY_RATING_STAR_COLOR' => [
        'configuration_title' => 'Body Rating Stars Color',
        'configuration_value' => '#987000',
        'sort_order' => 510,
        'added' => '3.5.2',
        'set_default' => true,
    ],

    // -----
    // Button-related colors sort-orders range from 1000-1999
    //
    'ZCA_BUTTON_TEXT_COLOR' => [
        'configuration_title' => '<b>Button</b> Text Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 1000,
    ],
    'ZCA_BUTTON_TEXT_COLOR_HOVER' => [
        'configuration_title' => 'Button Text Color on Hover',
        'configuration_value' => '#0056b3',
        'sort_order' => 1010,
    ],
    'ZCA_BUTTON_COLOR' => [         //- Note, mis-named, should "really" be ZCA_BUTTON_BACKGROUND_COLOR; aliased on the storefront
        'configuration_title' => 'Button Background Color',
        'configuration_value' => '#13607c',
        'sort_order' => 1030,
    ],
    'ZCA_BUTTON_COLOR_HOVER' => [   //- Note, mis-named, should "really" be ZCA_BUTTON_BACKGROUND_COLOR_HOVER; aliased on the storefront
        'configuration_title' => 'Button Background Color on Hover',
        'configuration_value' => '#ffffff',
        'sort_order' => 1040,
    ],
    'ZCA_BUTTON_BORDER_COLOR' => [
        'configuration_title' => 'Button Border Color',
        'configuration_value' => '#13607c',
        'sort_order' => 1050,
    ],
    'ZCA_BUTTON_BORDER_COLOR_HOVER' => [
        'configuration_title' => 'Button Border Color on Hover',
        'configuration_value' => '#a80000',
        'sort_order' => 1060,
    ],
    'ZCA_BUTTON_LINK_COLOR' => [
        'configuration_title' => '<b>A Link</b> Color',
        'configuration_value' => '#0000a0',
        'sort_order' => 1070,
    ],
    'ZCA_BUTTON_LINK_COLOR_HOVER' => [
        'configuration_title' => 'A Link Color on Hover',
        'configuration_value' => '#0056b3',
        'sort_order' => 1080,
    ],
    'ZCA_BUTTON_PAGEINATION_TEXT_COLOR' => [
        'configuration_title' => '<b>Pagination Button</b> Text Color',
        'configuration_value' => '#000000',
        'sort_order' => 1080,
    ],
    'ZCA_BUTTON_PAGEINATION_TEXT_COLOR_HOVER' => [
        'configuration_title' => 'Pagination Button Text Color on Hover',
        'configuration_value' => '#ffffff',
        'sort_order' => 1090,
    ],
    'ZCA_BUTTON_PAGEINATION_COLOR' => [
        'configuration_title' => 'Pagination Button Color',
        'configuration_value' => '#cccccc',
        'sort_order' => 1100,
    ],
    'ZCA_BUTTON_PAGEINATION_COLOR_HOVER' => [
        'configuration_title' => 'Pagination Button Color on Hover',
        'configuration_value' => '#0099cc',
        'sort_order' => 1110,
    ],
    'ZCA_BUTTON_PAGEINATION_BORDER_COLOR' => [
        'configuration_title' => 'Pagination Button Border Color',
        'configuration_value' => '#cccccc',
        'sort_order' => 1120,
    ],
    'ZCA_BUTTON_PAGEINATION_BORDER_COLOR_HOVER' => [
        'configuration_title' => 'Pagination Button Border Color on Hover',
        'configuration_value' => '#0099cc',
        'sort_order' => 1130,
    ],
    'ZCA_BUTTON_PAGEINATION_ACTIVE_TEXT_COLOR' => [
        'configuration_title' => 'Pagination Active Button Text Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 1140,
    ],
    'ZCA_BUTTON_PAGEINATION_ACTIVE_COLOR' => [
        'configuration_title' => 'Pagination Active Button Color',
        'configuration_value' => '#13607c',
        'sort_order' => 1150,
    ],

    // -----
    // Header-related colors sort-orders range from 2000-2999
    //
    'ZCA_HEADER_WRAPPER_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Header Wrapper</b> Background Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 2000,
    ],
    'ZCA_HEADER_TAGLINE_TEXT_COLOR' => [
        'configuration_title' => 'Header Tagline Text Color',
        'configuration_value' => '#000000',
        'sort_order' => 2010,
    ],
    'ZCA_HEADER_NAV_BAR_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Header Nav Bar</b> Background Color',
        'configuration_value' => '#333333',
        'sort_order' => 2100,
    ],
    'ZCA_HEADER_NAVBAR_LINK_COLOR' => [
        'configuration_title' => '<b>Header Nav Bar Link</b> Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 2110,
    ],
    'ZCA_HEADER_NAVBAR_LINK_COLOR_HOVER' => [
        'configuration_title' => 'Header Nav Bar Link Color on Hover',
        'configuration_value' => '#cccccc',
        'sort_order' => 2120,
    ],
    'ZCA_HEADER_NAVBAR_LINK_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Header Nav Bar Link Background Color on Hover',
        'configuration_value' => '#333333',
        'sort_order' => 2130,
        'added' => '3.6.0',
    ],
    'ZCA_HEADER_NAVBAR_BUTTON_TEXT_COLOR' => [          //- Note, mis-named, should "really" be ZCA_HEADER_NAVBAR_TOGGLER_COLOR; aliased on the storefront
        'configuration_title' => '<b>Header Nav Bar Toggler</b> Text Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 2140,
    ],
    'ZCA_HEADER_NAVBAR_BUTTON_TEXT_COLOR_HOVER' => [    //- Note, mis-named, should "really" be ZCA_HEADER_NAVBAR_TOGGLER_COLOR_HOVER; aliased on the storefront
        'configuration_title' => 'Header Nav Bar Toggler Text Color on Hover',
        'configuration_value' => '#cccccc',
        'sort_order' => 2160,
    ],
    'ZCA_HEADER_NAVBAR_BUTTON_COLOR' => [               //- Note, mis-named, should "really" be ZCA_HEADER_NAVBAR_TOGGLER_BACKGROUND_COLOR; aliased on the storefront
        'configuration_title' => 'Header Nav Bar Toggler Background Color',
        'configuration_value' => '#343a40',
        'sort_order' => 2170,
    ],
    'ZCA_HEADER_NAVBAR_BUTTON_COLOR_HOVER' => [         //- Note, mis-named, should "really" be ZCA_HEADER_NAVBAR_TOGGLER_BACKGROUND_COLOR_HOVER; aliased on the storefront
        'configuration_title' => 'Header Nav Bar Toggler Background Color on Hover',
        'configuration_value' => '#919aa1',
        'sort_order' => 2180,
    ],
    'ZCA_HEADER_NAVBAR_BUTTON_BORDER_COLOR' => [        //- Note, mis-named, should "really" be ZCA_HEADER_NAVBAR_TOGGLER_BORDER_COLOR; aliased on the storefront
        'configuration_title' => 'Header Nav Bar Toggler Border Color',
        'configuration_value' => '#343a40',
        'sort_order' => 2190,
    ],
    'ZCA_HEADER_NAVBAR_BUTTON_BORDER_COLOR_HOVER' => [  //- Note, mis-named, should "really" be ZCA_HEADER_NAVBAR_TOGGLER_BORDER_COLOR_HOVER; aliased on the storefront
        'configuration_title' => 'Header Nav Bar Toggler Border Color on Hover',
        'configuration_value' => '#919aa1',
        'sort_order' => 2200,
    ],
    'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_TEXT_COLOR' => [
        'configuration_title' => '<b>Header Nav Bar Extra Button</b> Text Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 2300,
        'added' => '3.6.0',
    ],
    'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_TEXT_COLOR_HOVER' => [
        'configuration_title' => 'Header Nav Bar Extra Button Text Color on Hover',
        'configuration_value' => '#0056b3',
        'sort_order' => 2310,
        'added' => '3.6.0',
    ],
    'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_BACKGROUND_COLOR' => [
        'configuration_title' => 'Header Nav Bar Extra Button Background Color',
        'configuration_value' => '#13607c',
        'sort_order' => 2330,
        'added' => '3.6.0',
    ],
    'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Header Nav Bar Extra Button Background Color on Hover',
        'configuration_value' => '#ffffff',
        'sort_order' => 2340,
        'added' => '3.6.0',
    ],
    'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_BORDER_COLOR' => [
        'configuration_title' => 'Header Nav Bar Extra Button Border Color',
        'configuration_value' => '#13607c',
        'sort_order' => 2350,
        'added' => '3.6.0',
    ],
    'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_BORDER_COLOR_HOVER' => [
        'configuration_title' => 'Header Nav Bar Extra Button Border Color on Hover',
        'configuration_value' => '#a80000',
        'sort_order' => 2360,
        'added' => '3.6.0',
    ],
    'ZCA_HEADER_TABS_COLOR' => [                        //- Note, mis-named, should "really" be ZCA_HEADER_TABS_BACKGROUND_COLOR; aliased on the storefront
        'configuration_title' => '<b>Header Category Tabs</b> Background Color',
        'configuration_value' => '#13607c',
        'sort_order' => 2500,
    ],
    'ZCA_HEADER_TABS_COLOR_HOVER' => [                  //- Note, mis-named, should "really" be ZCA_HEADER_TABS_BACKGROUND_COLOR_HOVER; aliased on the storefront
        'configuration_title' => 'Header Category Tabs Background Color on Hover',
        'configuration_value' => '#ffffff',
        'sort_order' => 2510,
    ],
    'ZCA_HEADER_TABS_TEXT_COLOR' => [
        'configuration_title' => 'Header Category Tabs Text Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 2520,
    ],
    'ZCA_HEADER_TABS_TEXT_COLOR_HOVER' => [
        'configuration_title' => 'Header Category Tabs Text Color on Hover',
        'configuration_value' => '#13607c',
        'sort_order' => 2540,
    ],
    'ZCA_HEADER_TABS_BORDER_COLOR' => [
        'configuration_title' => 'Header Category Tabs Border Color',
        'configuration_value' => '#13607c',
        'sort_order' => 2560,
        'added' => '3.5.2',
    ],
    'ZCA_HEADER_TABS_BORDER_COLOR_HOVER' => [
        'configuration_title' => 'Header Category Tabs Border Color on Hover',
        'configuration_value' => '#13607c',
        'sort_order' => 2580,
        'added' => '3.5.2',
    ],
    'ZCA_HEADER_TABS_ACTIVE_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Header Category Tabs Active</b> Background Color',
        'configuration_value' => '#a80000',
        'sort_order' => 2590,
        'added' => '3.5.2',
    ],
    'ZCA_HEADER_TABS_ACTIVE_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Header Category Tabs Active Background Color on Hover',
        'configuration_value' => '#ffffff',
        'sort_order' => 2592,
        'added' => '3.5.2',
    ],
    'ZCA_HEADER_TABS_ACTIVE_COLOR' => [
        'configuration_title' => 'Header Category Tabs Active Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 2600,
        'added' => '3.5.2',
    ],
    'ZCA_HEADER_TABS_ACTIVE_COLOR_HOVER' => [
        'configuration_title' => 'Header Category Tabs Active Color on Hover',
        'configuration_value' => '#a80000',
        'sort_order' => 2602,
        'added' => '3.5.2',
    ],
    'ZCA_HEADER_TABS_ACTIVE_BORDER_COLOR' => [
        'configuration_title' => 'Header Category Tabs Active Border Color',
        'configuration_value' => '#a80000',
        'sort_order' => 2620,
        'added' => '3.5.2',
    ],
    'ZCA_HEADER_TABS_ACTIVE_BORDER_COLOR_HOVER' => [
        'configuration_title' => 'Header Category Tabs Active Border Color on Hover',
        'configuration_value' => '#a80000',
        'sort_order' => 2622,
        'added' => '3.5.2',
    ],
    'ZCA_HEADER_EZPAGE_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Header EZ-Page Bar</b> Background Color',
        'configuration_value' => '#464646',
        'sort_order' => 2700,
    ],
    'ZCA_HEADER_EZPAGE_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Header EZ-Page Bar Background Color on Hover',
        'configuration_value' => '#363636',
        'sort_order' => 2710,
        'added' => '3.5.2',
    ],
    'ZCA_HEADER_EZPAGE_LINK_COLOR' => [
        'configuration_title' => 'Header EZ-Page Bar Link Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 2720,
    ],
    'ZCA_HEADER_EZPAGE_LINK_COLOR_HOVER' => [
        'configuration_title' => 'Header EZ-Page Bar Link Color on Hover',
        'configuration_value' => '#cccccc',
        'sort_order' => 2740,
    ],

    // -----
    // Footer-related colors sort-orders range from 3000-3999
    //
    'ZCA_FOOTER_WRAPPER_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Footer Wrapper</b> Background Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 3000,
    ],
    'ZCA_FOOTER_WRAPPER_TEXT_COLOR' => [
        'configuration_title' => 'Footer Wrapper Text Color',
        'configuration_value' => '#000000',
        'sort_order' => 3010,
    ],
    'ZCA_FOOTER_EZPAGE_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Footer EZ-Page Bar</b> Background Color',
        'configuration_value' => '#464646',
        'sort_order' => 3020,
    ],
    'ZCA_FOOTER_EZPAGE_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Footer EZ-Page Bar Background Color on Hover',
        'configuration_value' => '#363636',
        'sort_order' => 3022,
        'added' => '3.5.2',
    ],
    'ZCA_FOOTER_EZPAGE_LINK_COLOR' => [
        'configuration_title' => 'Footer EZ-Page Bar Link Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 3030,
    ],
    'ZCA_FOOTER_EZPAGE_LINK_COLOR_HOVER' => [
        'configuration_title' => 'Footer EZ-Page Bar Link Color on Hover',
        'configuration_value' => '#cccccc',
        'sort_order' => 3040,
    ],

    // -----
    // Sidebox-related colors sort-orders range from 4000-4999
    //
    'ZCA_SIDEBOX_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Sidebox</b> Background Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 4000,
    ],
    'ZCA_SIDEBOX_TEXT_COLOR' => [
        'configuration_title' => 'Sidebox Text Color',
        'configuration_value' => '#000000',
        'sort_order' => 4010,
    ],
    'ZCA_SIDEBOX_LINK_BACKGROUND_COLOR' => [
        'configuration_title' => 'Sidebox Link Background Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 4020,
    ],
    'ZCA_SIDEBOX_LINK_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Sidebox Link Background Color on Hover',
        'configuration_value' => '#cccccc',
        'sort_order' => 4030,
    ],
    'ZCA_SIDEBOX_LINK_COLOR' => [
        'configuration_title' => 'Sidebox Link Color',
        'configuration_value' => '#0000a0',
        'sort_order' => 4040,
    ],
    'ZCA_SIDEBOX_LINK_COLOR_HOVER' => [
        'configuration_title' => 'Sidebox Link Color on Hover',
        'configuration_value' => '#003975',
        'sort_order' => 4050,
    ],
    'ZCA_SIDEBOX_CARD_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Sidebox Product Card</b> Background Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 4060,
    ],
    'ZCA_SIDEBOX_CARD_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Sidebox Product Card Background Color on Hover',
        'configuration_value' => '#cccccc',
        'sort_order' => 4070,
    ],
    'ZCA_SIDEBOX_HEADER_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Sidebox Header</b> Background Color',
        'configuration_value' => '#333333',
        'sort_order' => 4080,
    ],
    'ZCA_SIDEBOX_HEADER_TEXT_COLOR' => [
        'configuration_title' => 'Sidebox Header Text Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 4090,
    ],
    'ZCA_SIDEBOX_HEADER_LINK_COLOR' => [
        'configuration_title' => 'Sidebox Header Link Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 4100,
    ],
    'ZCA_SIDEBOX_HEADER_LINK_COLOR_HOVER' => [
        'configuration_title' => 'Sidebox Header Link Color on Hover',
        'configuration_value' => '#cccccc',
        'sort_order' => 4110,
    ],
    'ZCA_SIDEBOX_COUNTS_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Sidebox Category Counts</b> Background Color',
        'configuration_value' => '#13607c',
        'sort_order' => 4120,
    ],
    'ZCA_SIDEBOX_COUNTS_COLOR' => [
        'configuration_title' => 'Sidebox Category Counts Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 4130,
    ],

    // -----
    // Centerbox-related colors range from 5000-5999
    //
    'ZCA_CENTERBOX_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Centerbox</b> Background Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 5000,
    ],
    'ZCA_CENTERBOX_TEXT_COLOR' => [
        'configuration_title' => 'Centerbox Text Color',
        'configuration_value' => '#000000',
        'sort_order' => 5010,
    ],
    'ZCA_CENTERBOX_CARD_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Centerbox Product Card</b> Background Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 5020,
    ],
    'ZCA_CENTERBOX_CARD_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Centerbox Product Card Background Color on Hover',
        'configuration_value' => '#efefef',
        'sort_order' => 5030,
    ],
    'ZCA_CENTERBOX_HEADER_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Centerbox Header</b> Background Color',
        'configuration_value' => '#333333',
        'sort_order' => 5040,
    ],
    'ZCA_CENTERBOX_HEADER_TEXT_COLOR' => [
        'configuration_title' => 'Centerbox Header Text Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 5050,
    ],

    // -----
    // Add-to-cart colors sort-orders range from 6000-6999
    //
    'ZCA_ADD_TO_CART_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Add-to-Cart Card</b> Background Color',
        'configuration_value' => '#036811',
        'sort_order' => 6000,

    ],
    'ZCA_ADD_TO_CART_TEXT_COLOR' => [
        'configuration_title' => 'Add-to-Cart Card Text Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 6010,
        'added' => '3.1.2',
    ],
    'ZCA_ADD_TO_CART_BORDER_COLOR' => [
        'configuration_title' => 'Add-to-Cart Card Border Color',
        'configuration_value' => '#036811',
        'sort_order' => 6020,
        'added' => '3.1.2',
    ],
    'ZCA_BUTTON_IN_CART_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Add-to-Cart Button</b> Background Color',
        'configuration_value' => '#036811',
        'sort_order' => 6030,
        'added' => '3.1.2',
    ],
    'ZCA_BUTTON_IN_CART_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Add-to-Cart Button Background Color on Hover',
        'configuration_value' => '#007e33',
        'sort_order' => 6040,
        'added' => '3.1.2',
    ],
    'ZCA_BUTTON_IN_CART_TEXT_COLOR' => [
        'configuration_title' => 'Add-to-Cart Button Text Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 6050,
        'added' => '3.1.2',
    ],
    'ZCA_BUTTON_IN_CART_TEXT_COLOR_HOVER' => [
        'configuration_title' => 'Add-to-Cart Button Text Color on Hover',
        'configuration_value' => '#ffffff',
        'sort_order' => 6060,
        'added' => '3.1.2',
    ],
    'ZCA_BUTTON_ADD_SELECTED_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Add-Selected Button</b> Background Color',
        'configuration_value' => '#036811',
        'sort_order' => 6070,
        'added' => '3.1.2',
    ],
    'ZCA_BUTTON_ADD_SELECTED_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Add-Selected Button Background Color on Hover',
        'configuration_value' => '#007e33',
        'sort_order' => 6080,
        'added' => '3.1.2',
    ],
    'ZCA_BUTTON_ADD_SELECTED_TEXT_COLOR' => [
        'configuration_title' => 'Add-Selected Button Text Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 6090,
        'added' => '3.1.2',
    ],
    'ZCA_BUTTON_ADD_SELECTED_TEXT_COLOR_HOVER' => [
        'configuration_title' => 'Add-Selected Button Text Color on Hover',
        'configuration_value' => '#ffffff',
        'sort_order' => 6100,
        'added' => '3.1.2',
    ],

    // -----
    // Checkout-related colors sort-orders range from 7000-7499
    //
    'ZCA_CHECKOUT_PROGRESS_BAR_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Checkout 3-Page</b> Progress Bar Background Color',
        'configuration_value' => '#036811',
        'sort_order' => 7000,
        'added' => '3.5.2',
        'set_default' => true,
    ],
    'ZCA_CHECKOUT_CONTINUE_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Checkout &quot;Continue&quot; Button</b> Background Color',
        'configuration_value' => '#ffd814',
        'sort_order' => 7100,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONTINUE_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Checkout &quot;Continue&quot; Button Background Color on Hover',
        'configuration_value' => '#f7ca00',
        'sort_order' => 7120,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONTINUE_COLOR' => [
        'configuration_title' => 'Checkout &quot;Continue&quot; Button Color',
        'configuration_value' => '#0f1111',
        'sort_order' => 7140,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONTINUE_COLOR_HOVER' => [
        'configuration_title' => 'Checkout &quot;Continue&quot; Button Color on Hover',
        'configuration_value' => '#0f1111',
        'sort_order' => 7160,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONTINUE_BORDER_COLOR' => [
        'configuration_title' => 'Checkout &quot;Continue&quot; Button Border Color',
        'configuration_value' => '#fcd200',
        'sort_order' => 7180,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONTINUE_BORDER_COLOR_HOVER' => [
        'configuration_title' => 'Checkout &quot;Continue&quot; Button Border Color on Hover',
        'configuration_value' => '#f2c200',
        'sort_order' => 7200,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONFIRM_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Checkout &quot;Confirm&quot; Button</b> Background Color',
        'configuration_value' => '#ffd814',
        'sort_order' => 7300,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONFIRM_BACKGROUND_COLOR_HOVER' => [
        'configuration_title' => 'Checkout &quot;Confirm&quot; Button Background Color on Hover',
        'configuration_value' => '#f7ca00',
        'sort_order' => 7320,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONFIRM_COLOR' => [
        'configuration_title' => 'Checkout &quot;Confirm&quot; Button Color',
        'configuration_value' => '#0f1111',
        'sort_order' => 7340,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONFIRM_COLOR_HOVER' => [
        'configuration_title' => 'Checkout &quot;Confirm&quot; Button Color on Hover',
        'configuration_value' => '#0f1111',
        'sort_order' => 7360,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONFIRM_BORDER_COLOR' => [
        'configuration_title' => 'Checkout &quot;Confirm&quot; Button Border Color',
        'configuration_value' => '#fcd200',
        'sort_order' => 7380,
        'added' => '3.5.2',
    ],
    'ZCA_CHECKOUT_CONFIRM_BORDER_COLOR_HOVER' => [
        'configuration_title' => 'Checkout &quot;Confirm&quot; Button Border Color on Hover',
        'configuration_value' => '#f2c200',
        'sort_order' => 7400,
        'added' => '3.5.2',
    ],

    // -----
    // "Sold Out" button coloring sort-orders range from 7500-7519
    //
    'ZCA_SOLD_OUT_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Sold Out Button</b> Background Color',
        'configuration_value' => '#a80000',
        'sort_order' => 7500,
        'added' => '3.6.0',
    ],
    'ZCA_SOLD_OUT_COLOR' => [
        'configuration_title' => 'Sold Out Button Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 7505,
        'added' => '3.6.0',
    ],
    'ZCA_SOLD_OUT_BORDER_COLOR' => [
        'configuration_title' => 'Sold Out Button Border Color',
        'configuration_value' => '#a80000',
        'sort_order' => 7510,
        'added' => '3.6.0',
    ],

    // -----
    // Carousel-related colors sort-orders range from 8000-8499
    //
    'ZCA_CAROUSEL_PREV_NEXT_COLOR' => [
        'configuration_title' => '<b>Carousel</b> Prev/Next Icon Color',
        'configuration_value' => '#000000',
        'sort_order' => 8000,
        'added' => '3.5.2',
        'set_default' => true,
    ],
    'ZCA_CAROUSEL_PREV_NEXT_COLOR_HOVER' => [
        'configuration_title' => 'Carousel Prev/Next Icon Color on Hover',
        'configuration_value' => '#000000',
        'sort_order' => 8100,
        'added' => '3.5.2',
        'set_default' => true,
    ],
    'ZCA_CAROUSEL_BANNER_INDICATORS_BACKGROUND_COLOR' => [
        'configuration_title' => 'Carousel Indicators Background Color',
        'configuration_value' => '#000000',
        'sort_order' => 8120,
        'added' => '3.5.2',
        'set_default' => true,
    ],

    // -----
    // Primary-address-related colors sort-orders range from 8500-8999
    //
    'ZCA_PRIMARY_ADDRESS_ADDRESS_BACKGROUND_COLOR' => [
        'configuration_title' => '<b>Primary Address</b> Address Book Background Color',
        'configuration_value' => '#036811',
        'sort_order' => 8500,
        'added' => '3.5.2',
        'set_default' => true,
    ],
    'ZCA_PRIMARY_ADDRESS_ADDRESS_COLOR' => [
        'configuration_title' => 'Primary Address Address Book Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 8510,
        'added' => '3.5.2',
        'set_default' => true,
    ],
    'ZCA_PRIMARY_ADDRESS_CARD_HEADER_BACKGROUND_COLOR' => [
        'configuration_title' => 'Primary Address Card Header Background Color',
        'configuration_value' => '#13607c',
        'sort_order' => 8520,
        'added' => '3.5.2',
        'set_default' => true,
    ],
    'ZCA_PRIMARY_ADDRESS_CARD_HEADER_COLOR' => [
        'configuration_title' => 'Primary Address Card Header Color',
        'configuration_value' => '#ffffff',
        'sort_order' => 8530,
        'added' => '3.5.2',
        'set_default' => true,
    ],
    'ZCA_PRIMARY_ADDRESS_CARD_BORDER_COLOR' => [
        'configuration_title' => 'Primary Address Card Border Color',
        'configuration_value' => '#13607c',
        'sort_order' => 8540,
        'added' => '3.5.2',
        'set_default' => true,
    ],
];

// -----
// Prior to Bootstrap/Bootstrap Colors v3.5.2, there was no versioning for the colors' configuration. The
// initial 'upgrade' for v3.5.2 will start by applying *all* current color configurations if the
// Bootstrap Colors' version setting isn't yet defined, implying either a pre-v3.5.2 or initial installation that
// we're starting with.
//
// NOTE: No 'use_function' or 'set_function' needed for any of these human-enterable settings!
//
$zca_bc_installed = false;
if (!defined('ZCA_BOOTSTRAP_COLORS_VERSION')) {
    // -----
    // Further, if this is an _initial_ install of the Bootstrap template and its associated colors, all
    // current colors' default values are set as their color selection.  If that color-setting *is* defined,
    // then any colors added on or after v3.5.2 will be added with a 'not-set' value to enable a
    // site to choose the best color for their store's color-scheme prior to use on the storefront.
    //
    if (!defined('ZCA_BODY_TEXT_COLOR')) {
        $zca_bc_installed = true;
    }
    $configuration_values = '';
    foreach ($zca_bc_colors as $key => $values) {
        $default_value = $values['configuration_value'];
        $added_version = (isset($values['added']) && $values['added'] >= '3.5.2') ? (' (Added in v'. $values['added'] . ')') : '';
        $default_color = ($zca_bc_installed === false && $added_version !== '' && empty($values['set_default'])) ? 'not-set' : $default_value;
        $configuration_values .= "('" . $values['configuration_title'] . "', '$key', '$default_color', 'Default: $default_value.$added_version', $bccid, " . $values['sort_order'] . ", now()),";
    }
    $configuration_values = rtrim($configuration_values, ',');
    $db->Execute(
        "INSERT IGNORE INTO " . TABLE_CONFIGURATION . "
            (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added)
         VALUES
            $configuration_values"
    );
    unset($configuration_values);
    // -----
    // Lets translate all these template config settings to German
    //
    $db->Execute(
 "REPLACE INTO " . TABLE_CONFIGURATION_LANGUAGE . " (configuration_title, configuration_key, configuration_language_id, configuration_description,  last_modified, date_added) VALUES
('<b>Body</b> Hintergrund Farbe', 'ZCA_BODY_BACKGROUND_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Body Text Farbe', 'ZCA_BODY_TEXT_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Body Breadcrumbs</b> Hintergrund Farbe', 'ZCA_BODY_BREADCRUMBS_BACKGROUND_COLOR', 43, 'Voreinstellung: #cccccc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Body Breadcrumbs Text Farbe', 'ZCA_BODY_BREADCRUMBS_TEXT_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Body Breadcrumbs Link Farbe', 'ZCA_BODY_BREADCRUMBS_LINK_COLOR', 43, 'Voreinstellung: #0a3f52', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Body Breadcrumbs Link Farbe bei Hover', 'ZCA_BODY_BREADCRUMBS_LINK_COLOR_HOVER', 43, 'Voreinstellung: #003c52', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Body Artikel</b> Preis', 'ZCA_BODY_PRODUCTS_BASE_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Body Artikel Normalpreis', 'ZCA_BODY_PRODUCTS_NORMAL_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Body Artikel Sonderangebotspreis', 'ZCA_BODY_PRODUCTS_SPECIAL_COLOR', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Body Artikel Rabattpreis', 'ZCA_BODY_PRODUCTS_DISCOUNT_COLOR', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Body Products Abverkaufspreis', 'ZCA_BODY_PRODUCTS_SALE_COLOR', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Body Products Gratis Preis', 'ZCA_BODY_PRODUCTS_FREE_COLOR', 43, 'Voreinstellung: #0000ff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Body Formularfelder</b> Platzhalter', 'ZCA_BODY_PLACEHOLDER', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Alarm Info Farbe</b>', 'ZCA_ALERT_INFO_COLOR', 43, 'Voreinstellung: #13525e', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Alarm Info Hintergrund Farbe', 'ZCA_ALERT_INFO_BACKGROUND_COLOR', 43, 'Voreinstellung: #d1ecf1', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Alarm Info Rahmen Farbe', 'ZCA_ALERT_INFO_BORDER_COLOR', 43, 'Voreinstellung: #bee5eb', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Body Bewertungssterne</b> Hintergrund Farbe', 'ZCA_BODY_RATING_STAR_BACKGROUND_COLOR', 43, 'Voreinstellung: #322424', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Body Bewertungssterne Farbe', 'ZCA_BODY_RATING_STAR_COLOR', 43, 'Voreinstellung: #efa31d', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Button</b> Text Farbe', 'ZCA_BUTTON_TEXT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Button Text Farbe bei Hover', 'ZCA_BUTTON_TEXT_COLOR_HOVER', 43, 'Voreinstellung: #0056b3', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Button Hintergrund Farbe', 'ZCA_BUTTON_COLOR', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Button Hintergrund Farbe bei Hover', 'ZCA_BUTTON_COLOR_HOVER', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Button Rahmen Farbe', 'ZCA_BUTTON_BORDER_COLOR', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Button Rahmen Farbe bei Hover', 'ZCA_BUTTON_BORDER_COLOR_HOVER', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Link</b> Farbe', 'ZCA_BUTTON_LINK_COLOR', 43, 'Voreinstellung: #0000a0', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Link Farbe bei Hover', 'ZCA_BUTTON_LINK_COLOR_HOVER', 43, 'Voreinstellung: #0056b3', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Bl�ttern Button</b> Text Farbe', 'ZCA_BUTTON_PAGEINATION_TEXT_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Bl�ttern Button Text Farbe bei Hover', 'ZCA_BUTTON_PAGEINATION_TEXT_COLOR_HOVER', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Bl�ttern Button Farbe', 'ZCA_BUTTON_PAGEINATION_COLOR', 43, 'Voreinstellung: #cccccc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Bl�ttern Button Farbe bei Hover', 'ZCA_BUTTON_PAGEINATION_COLOR_HOVER', 43, 'Voreinstellung: #0099cc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Bl�ttern Button Rahmen Farbe', 'ZCA_BUTTON_PAGEINATION_BORDER_COLOR', 43, 'Voreinstellung: #cccccc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Bl�ttern Button Rahmen Farbe bei Hover', 'ZCA_BUTTON_PAGEINATION_BORDER_COLOR_HOVER', 43, 'Voreinstellung: #0099cc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Bl�ttern Aktiv Button Text Farbe', 'ZCA_BUTTON_PAGEINATION_ACTIVE_TEXT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Bl�ttern Aktiv Button Farbe', 'ZCA_BUTTON_PAGEINATION_ACTIVE_COLOR', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Header Wrapper</b> Hintergrund Farbe', 'ZCA_HEADER_WRAPPER_BACKGROUND_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Tagline Text Farbe', 'ZCA_HEADER_TAGLINE_TEXT_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Header Navigationsleiste</b> Hintergrund Farbe', 'ZCA_HEADER_NAV_BAR_BACKGROUND_COLOR', 43, 'Voreinstellung: #333333', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Header Navigationsleiste Link</b> Farbe', 'ZCA_HEADER_NAVBAR_LINK_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Link Farbe bei Hover', 'ZCA_HEADER_NAVBAR_LINK_COLOR_HOVER', 43, 'Voreinstellung: #cccccc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Link Hintergrund Farbe bei Hover', 'ZCA_HEADER_NAVBAR_LINK_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #333333', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Header Navigationsleiste Toggler</b> Text Farbe', 'ZCA_HEADER_NAVBAR_BUTTON_TEXT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Toggler Text Farbe bei Hover', 'ZCA_HEADER_NAVBAR_BUTTON_TEXT_COLOR_HOVER', 43, 'Voreinstellung: #cccccc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Toggler Hintergrund Farbe', 'ZCA_HEADER_NAVBAR_BUTTON_COLOR', 43, 'Voreinstellung: #343a40', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Toggler Hintergrund Farbe bei Hover', 'ZCA_HEADER_NAVBAR_BUTTON_COLOR_HOVER', 43, 'Voreinstellung: #919aa1', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Toggler Rahmen Farbe', 'ZCA_HEADER_NAVBAR_BUTTON_BORDER_COLOR', 43, 'Voreinstellung: #343a40', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Toggler Rahmen Farbe bei Hover', 'ZCA_HEADER_NAVBAR_BUTTON_BORDER_COLOR_HOVER', 43, 'Voreinstellung: #919aa1', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Header Navigationsleiste Extra Button</b> Text Farbe', 'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_TEXT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Extra Button Text Farbe bei Hover', 'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_TEXT_COLOR_HOVER', 43, 'Voreinstellung: #0056b3', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Extra Button Hintergrund Farbe', 'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_BACKGROUND_COLOR', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Extra Button Hintergrund Farbe bei Hover', 'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Extra Button Rahmen Farbe', 'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_BORDER_COLOR', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Navigationsleiste Extra Button Rahmen Farbe bei Hover', 'ZCA_HEADER_NAVBAR_EXTRA_BUTTON_BORDER_COLOR_HOVER', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Header Kategorie Tabs</b> Hintergrund Farbe', 'ZCA_HEADER_TABS_COLOR', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Kategorie Tabs Hintergrund Farbe bei Hover', 'ZCA_HEADER_TABS_COLOR_HOVER', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Kategorie Tabs Text Farbe', 'ZCA_HEADER_TABS_TEXT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Kategorie Tabs Text Farbe bei Hover', 'ZCA_HEADER_TABS_TEXT_COLOR_HOVER', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Kategorie Tabs Rahmen Farbe', 'ZCA_HEADER_TABS_BORDER_COLOR', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Kategorie Tabs Rahmen Farbe bei Hover', 'ZCA_HEADER_TABS_BORDER_COLOR_HOVER', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Header Kategorie Tabs Aktiv</b> Hintergrund Farbe', 'ZCA_HEADER_TABS_ACTIVE_BACKGROUND_COLOR', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Kategorie Tabs Aktiv Hintergrund Farbe bei Hover', 'ZCA_HEADER_TABS_ACTIVE_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Kategorie Tabs Aktiv Farbe', 'ZCA_HEADER_TABS_ACTIVE_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Kategorie Tabs Aktiv Farbe bei Hover', 'ZCA_HEADER_TABS_ACTIVE_COLOR_HOVER', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Kategorie Tabs Aktiv Rahmen Farbe', 'ZCA_HEADER_TABS_ACTIVE_BORDER_COLOR', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header Kategorie Tabs Aktiv Rahmen Farbe bei Hover', 'ZCA_HEADER_TABS_ACTIVE_BORDER_COLOR_HOVER', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Header EZ-Seite Leiste</b> Hintergrund Farbe', 'ZCA_HEADER_EZPAGE_BACKGROUND_COLOR', 43, 'Voreinstellung: #464646', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header EZ-Seite Leiste Hintergrund Farbe bei Hover', 'ZCA_HEADER_EZPAGE_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #363636', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header EZ-Seite Leiste Link Farbe', 'ZCA_HEADER_EZPAGE_LINK_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Header EZ-Seite Leiste Link Farbe bei Hover', 'ZCA_HEADER_EZPAGE_LINK_COLOR_HOVER', 43, 'Voreinstellung: #cccccc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Footer Wrapper</b> Hintergrund Farbe', 'ZCA_FOOTER_WRAPPER_BACKGROUND_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Footer Wrapper Text Farbe', 'ZCA_FOOTER_WRAPPER_TEXT_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Footer EZ-Seite Leiste</b> Hintergrund Farbe', 'ZCA_FOOTER_EZPAGE_BACKGROUND_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Footer EZ-Seite Leiste Hintergrund Farbe bei Hover', 'ZCA_FOOTER_EZPAGE_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Footer EZ-Seite Leiste Link Farbe', 'ZCA_FOOTER_EZPAGE_LINK_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Footer EZ-Seite Leiste Link Farbe bei Hover', 'ZCA_FOOTER_EZPAGE_LINK_COLOR_HOVER', 43, 'Voreinstellung: #cccccc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Sidebox</b> Hintergrund Farbe', 'ZCA_SIDEBOX_BACKGROUND_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Sidebox Text Farbe', 'ZCA_SIDEBOX_TEXT_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Sidebox Link Hintergrund Farbe', 'ZCA_SIDEBOX_LINK_BACKGROUND_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Sidebox Link Hintergrund Farbe bei Hover', 'ZCA_SIDEBOX_LINK_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #cccccc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Sidebox Link Farbe', 'ZCA_SIDEBOX_LINK_COLOR', 43, 'Voreinstellung: #0000a0', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Sidebox Link Farbe bei Hover', 'ZCA_SIDEBOX_LINK_COLOR_HOVER', 43, 'Voreinstellung: #003975', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Sidebox Product Card</b> Hintergrund Farbe', 'ZCA_SIDEBOX_CARD_BACKGROUND_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Sidebox Product Card Hintergrund Farbe bei Hover', 'ZCA_SIDEBOX_CARD_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #cccccc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Sidebox Header</b> Hintergrund Farbe', 'ZCA_SIDEBOX_HEADER_BACKGROUND_COLOR', 43, 'Voreinstellung: #333333', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Sidebox Header Text Farbe', 'ZCA_SIDEBOX_HEADER_TEXT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Sidebox Header Link Farbe', 'ZCA_SIDEBOX_HEADER_LINK_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Sidebox Header Link Farbe bei Hover', 'ZCA_SIDEBOX_HEADER_LINK_COLOR_HOVER', 43, 'Voreinstellung: #cccccc', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Sidebox Kategoriez�hler</b> Hintergrund Farbe', 'ZCA_SIDEBOX_COUNTS_BACKGROUND_COLOR', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Sidebox Kategoriez�hler Farbe', 'ZCA_SIDEBOX_COUNTS_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Centerbox</b> Hintergrund Farbe', 'ZCA_CENTERBOX_BACKGROUND_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Centerbox Text Farbe', 'ZCA_CENTERBOX_TEXT_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Centerbox Product Card</b> Hintergrund Farbe', 'ZCA_CENTERBOX_CARD_BACKGROUND_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Centerbox Product Card Hintergrund Farbe bei Hover', 'ZCA_CENTERBOX_CARD_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #efefef', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Centerbox Header</b> Hintergrund Farbe', 'ZCA_CENTERBOX_HEADER_BACKGROUND_COLOR', 43, 'Voreinstellung: #333333', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Centerbox Header Text Farbe', 'ZCA_CENTERBOX_HEADER_TEXT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>in den Warenkorb Schaltfl�che</b> Hintergrund Farbe', 'ZCA_ADD_TO_CART_BACKGROUND_COLOR', 43, 'Voreinstellung: #036811', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('in den Warenkorb Schaltfl�che Text Farbe', 'ZCA_ADD_TO_CART_TEXT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('in den Warenkorb Schaltfl�che Rahmen Farbe', 'ZCA_ADD_TO_CART_BORDER_COLOR', 43, 'Voreinstellung: #036811', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>in den Warenkorb Button</b> Hintergrund Farbe', 'ZCA_BUTTON_IN_CART_BACKGROUND_COLOR', 43, 'Voreinstellung: #036811', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('in den Warenkorb Button Hintergrund Farbe bei Hover', 'ZCA_BUTTON_IN_CART_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #007e33', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('in den Warenkorb Button Text Farbe', 'ZCA_BUTTON_IN_CART_TEXT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('in den Warenkorb Button Text Farbe bei Hover', 'ZCA_BUTTON_IN_CART_TEXT_COLOR_HOVER', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Ausgew�hlte in den Warenkorb Button</b> Hintergrund Farbe', 'ZCA_BUTTON_ADD_SELECTED_BACKGROUND_COLOR', 43, 'Voreinstellung: #036811', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Ausgew�hlte in den Warenkorb Button Hintergrund Farbe bei Hover', 'ZCA_BUTTON_ADD_SELECTED_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #007e33', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Ausgew�hlte in den Warenkorb Button Text Farbe', 'ZCA_BUTTON_ADD_SELECTED_TEXT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Ausgew�hlte in den Warenkorb Button Text Farbe bei Hover', 'ZCA_BUTTON_ADD_SELECTED_TEXT_COLOR_HOVER', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Checkout 3-Seite</b> Progress Leiste Hintergrund Farbe', 'ZCA_CHECKOUT_PROGRESS_BAR_BACKGROUND_COLOR', 43, 'Voreinstellung: #036811', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Checkout &quot;Weiter&quot; Button</b> Hintergrund Farbe', 'ZCA_CHECKOUT_CONTINUE_BACKGROUND_COLOR', 43, 'Voreinstellung: #ffd814', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Checkout &quot;Weiter&quot; Button Hintergrund Farbe bei Hover', 'ZCA_CHECKOUT_CONTINUE_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #f7ca00', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Checkout &quot;Weiter&quot; Button Farbe', 'ZCA_CHECKOUT_CONTINUE_COLOR', 43, 'Voreinstellung: #0f1111', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Checkout &quot;Weiter&quot; Button Farbe bei Hover', 'ZCA_CHECKOUT_CONTINUE_COLOR_HOVER', 43, 'Voreinstellung: #0f1111', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Checkout &quot;Weiter&quot; Button Rahmen Farbe', 'ZCA_CHECKOUT_CONTINUE_BORDER_COLOR', 43, 'Voreinstellung: #fcd200', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Checkout &quot;Weiter&quot; Button Rahmen Farbe bei Hover', 'ZCA_CHECKOUT_CONTINUE_BORDER_COLOR_HOVER', 43, 'Voreinstellung: #f2c200', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Checkout &quot;Confirm&quot; Button</b> Hintergrund Farbe', 'ZCA_CHECKOUT_CONFIRM_BACKGROUND_COLOR', 43, 'Voreinstellung: #ffd814', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Checkout &quot;Confirm&quot; Button Hintergrund Farbe bei Hover', 'ZCA_CHECKOUT_CONFIRM_BACKGROUND_COLOR_HOVER', 43, 'Voreinstellung: #f7ca00', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Checkout &quot;Confirm&quot; Button Farbe', 'ZCA_CHECKOUT_CONFIRM_COLOR', 43, 'Voreinstellung: #0f1111', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Checkout &quot;Confirm&quot; Button Farbe bei Hover', 'ZCA_CHECKOUT_CONFIRM_COLOR_HOVER', 43, 'Voreinstellung: #0f1111', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Checkout &quot;Confirm&quot; Button Rahmen Farbe', 'ZCA_CHECKOUT_CONFIRM_BORDER_COLOR', 43, 'Voreinstellung: #fcd200', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Checkout &quot;Confirm&quot; Button Rahmen Farbe bei Hover', 'ZCA_CHECKOUT_CONFIRM_BORDER_COLOR_HOVER', 43, 'Voreinstellung: #f2c200', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Ausverkauft Button</b> Hintergrund Farbe', 'ZCA_SOLD_OUT_BACKGROUND_COLOR', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Ausverkauft Button Farbe', 'ZCA_SOLD_OUT_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Ausverkauft Button Rahmen Farbe', 'ZCA_SOLD_OUT_BORDER_COLOR', 43, 'Voreinstellung: #a80000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Karussell</b> Vorheriger/N�chster Icon Farbe', 'ZCA_CAROUSEL_PREV_NEXT_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Karussell Vorheriger/N�chster Icon Farbe bei Hover', 'ZCA_CAROUSEL_PREV_NEXT_COLOR_HOVER', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Karussell Indikatoren Hintergrund Farbe', 'ZCA_CAROUSEL_BANNER_INDICATORS_BACKGROUND_COLOR', 43, 'Voreinstellung: #000000', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('<b>Hauptadresse</b> Adressbuch Hintergrund Farbe', 'ZCA_PRIMARY_ADDRESS_ADDRESS_BACKGROUND_COLOR', 43, 'Voreinstellung: #036811', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Hauptadresse Adressbuch Farbe', 'ZCA_PRIMARY_ADDRESS_ADDRESS_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Hauptadresse Card Header Hintergrund Farbe', 'ZCA_PRIMARY_ADDRESS_CARD_HEADER_BACKGROUND_COLOR', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Hauptadresse Card Header Farbe', 'ZCA_PRIMARY_ADDRESS_CARD_HEADER_COLOR', 43, 'Voreinstellung: #ffffff', '2024-11-04 11:24:31', '2024-11-04 11:24:31'),
('Hauptadresse Card Rahmen Farbe', 'ZCA_PRIMARY_ADDRESS_CARD_BORDER_COLOR', 43, 'Voreinstellung: #13607c', '2024-11-04 11:24:31', '2024-11-04 11:24:31');"
    );

    // -----
    // Create the menu item for the ZCA Bootstrap Colors tool, if it's not already there.
    //
    if (!zen_page_key_exists('toolsZCABootstrapColors')) {
        zen_register_admin_page('toolsZCABootstrapColors', 'BOX_TOOLS_ZCA_BOOTSTRAP_COLORS', 'FILENAME_ZCA_BOOTSTRAP_COLORS', '', 'tools', 'Y');
    }

    // -----
    // Let the admin know that the initial installation was successfully completed.  The configuration value checked
    // has been there since the initial release, so defer the message output to the upgrade section if it's currently
    // defined.
    //
    if ($zca_bc_installed === true) {
        $messageStack->add_session(sprintf(SUCCESS_ZCA_BOOTSTRAP_COLORS_INSTALLED, ZCA_BOOTSTRAP_COLORS_CURRENT_VERSION), 'success');
    }
}

// -----
// Now, apply any version-specific updates needed.
//
switch (true) {
    // -----
    // If this was an *initial* installation, these updates have already been applied; nothing further to do.
    //
    case ($zca_bc_installed === true):
        break;

    // -----
    // v3.5.2+: Major restructuring of the colors' titles and sort-orders.  The initialization section above has recorded
    // all of the newly-added color settings for an initial installation.
    //
    // Go back through each, updating each setting to use the now-current version of the colors' settings.
    //
    // Note: Left as a 'case' statement just in case some future version needs to remove a setting.
    //
    case true:
        foreach ($zca_bc_colors as $key => $values) {
            $default_value = $values['configuration_value'];
            $added_version = (isset($values['added']) && $values['added'] >= '3.5.2') ? (' (Added in v'. $values['added'] . ')') : '';
            $default_color = ($zca_bc_installed === false && $added_version !== '' && empty($values['set_default'])) ? 'not-set' : $default_value;
            $description = "Voreinstellung: $default_value.$added_version";
            if (isset($values['added'])) {
                $db->Execute(
                    "INSERT IGNORE INTO " . TABLE_CONFIGURATION . "
                        (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added)
                     VALUES
                        ('" . $values['configuration_title'] . "', '$key', '$default_color', '$description', $bccid, " . $values['sort_order'] . ", now())"
                );
            }
            $db->Execute(
                "UPDATE " . TABLE_CONFIGURATION . "
                    SET configuration_title = '" . $values['configuration_title'] . "',
                        configuration_description = '$description',
                        sort_order = " . $values['sort_order'] . "
                  WHERE configuration_key = '$key'
                  LIMIT 1"
            );
        }
    default:                                                            //-Fall-through from above.
        break;
}

// -----
// Now 'get rid of' that hefty array of configuration settings.
//
unset($zca_bc_colors);

// -----
// If the Bootstrap Colors version setting hasn't yet been recorded, do that now.  In any
// case, update that setting to reflect the 'Bootstrap Colors' current version.  Note, this
// setting is recorded in the 'Modules' configuration group, so it's not displayed as a row
// within the Tools :: ZCA Bootstrap Colors tool.
//
if (!defined('ZCA_BOOTSTRAP_COLORS_VERSION')) {
    $db->Execute(
        "INSERT INTO " . TABLE_CONFIGURATION . "
            (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, set_function)
         VALUES
            ('Bootstrap Colors Version', 'ZCA_BOOTSTRAP_COLORS_VERSION', '" . ZCA_BOOTSTRAP_COLORS_CURRENT_VERSION . "', 'Displays the current version of the <em>ZCA Bootstrap Colors</em> tool.', 6, now(), 0, 'zen_cfg_read_only(')"
    );
} else {
    $db->Execute(
        "UPDATE " . TABLE_CONFIGURATION . "
            SET configuration_value = '" . ZCA_BOOTSTRAP_COLORS_CURRENT_VERSION . "',
                last_modified = now()
          WHERE configuration_key = 'ZCA_BOOTSTRAP_COLORS_VERSION'
          LIMIT 1"
    );
}

// -----
// If an initial installation wasn't also run, let the admin know that the upgrade was successfully completed.
//
if ($zca_bc_installed === false) {
    $messageStack->add_session(sprintf(SUCCESS_ZCA_BOOTSTRAP_COLORS_UPDATED, ZCA_BOOTSTRAP_COLORS_CURRENT_VERSION), 'success');
}
