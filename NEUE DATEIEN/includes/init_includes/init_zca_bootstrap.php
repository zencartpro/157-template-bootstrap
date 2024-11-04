<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: Init_zca_bootstrap.php 2024-10-26 15:14:16Z webchills $
 */
// -----
// Updated for Bootstrap-v3.0.0 (zc157), removing the need for a $breadcrumb override.
//
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// -----
// This module provides the initialization required for the ZCA Bootstrap template,
// if that template is the currently-active template.
//
// First, load the plugin's function-file; it has a common function that identifies
// whether/not the template is active.  If the template's not active, simply return
// since no further initialization is needed.
//
require DIR_WS_FUNCTIONS . 'zca_bootstrap_functions.php';
if (!zca_bootstrap_active()) {
    return;
}

// -----
// Next, load the modified message_stack class and replace the $messageStack
// instantiation with the bootstrap version.
//
require DIR_WS_CLASSES . 'zca/zca_message_stack.php';
if (!isset($messageStack)) {
    $messageStack = new zca_messageStack();
} else {
    $messages = $messageStack->messages;
    unset($messageStack);
    $messageStack = new zca_messageStack();
    $messageStack->messages = $messages; 
}

// -----
// Next, load the modified version of the splitPagesResult class adapted for
// use by the bootstrap template, if the associated class doesn't
// already exist.
//
if (!class_exists('zca_splitPageResults')) {
    require DIR_WS_CLASSES . 'zca/zca_split_page_results.php';
}
