<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_create_account_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="createAccountDefault" class="centerColumn">

    <?php echo zen_draw_form('createAccountForm', zen_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'), 'post', 'onsubmit="return check_form(createAccountForm);" id="createAccountForm"') . zen_draw_hidden_field('action', 'process') . zen_draw_hidden_field('email_pref_html', 'email_format'); ?>

<h1 id="createAccountDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="createAccountDefault-content" class="content my-3"><?php echo sprintf(TEXT_ORIGIN_LOGIN, zen_href_link(FILENAME_LOGIN, zen_get_all_get_params(array('action')), 'SSL')); ?></div>

<!--bof your personal details card-->
<div id="personalDetails-card" class="card mb-3">
<h4 id="personalDetails-card-header" class="card-header"><?php echo CATEGORY_PERSONAL; ?></h4>

<div id="personalDetails-card-body" class="card-body p-3">

<?php require($template->get_template_dir('tpl_modules_create_account.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_create_account.php'); ?>

<div id="personalDetails-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
<?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_ALT); ?>
</div>

</div>
    </div>
<!--eof your personal details card-->
    <?php echo '</form>'; ?>
</div>