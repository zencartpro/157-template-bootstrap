<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_time_out_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="timeOutDefault" class="centerColumn">

<?php
if (zen_is_logged_in()) {
?>
<h1 id="timeOutDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE_LOGGED_IN; ?></h1>

<div id="timeOutDefault-content" class="content"><?php echo TEXT_INFORMATION_LOGGED_IN; ?></div>
<?php
  } else {
?>
<h1 id="timeOutDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="timeOutDefault-content" class="content"><?php echo TEXT_INFORMATION; ?></div>

<?php echo zen_draw_form('login', zen_href_link(FILENAME_LOGIN, 'action=process', 'SSL')); ?>

<div id="login-card" class="card">
  <h2 id="login-card-header" class="card-header">
<?php echo HEADING_RETURNING_CUSTOMER; ?>
  </h2>
  <div id="login-card-body" class="card-body">
<label class="inputLabel" for="login-email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
<?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' id="login-email-address" autocomplete="off"', 'email'); ?>
<div class="p-2"></div>

<label class="inputLabel" for="login-password"><?php echo ENTRY_PASSWORD; ?></label>
<?php echo zen_draw_password_field('password', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password', 40) . ' id="login-password" autocomplete="off"'); ?>
<div class="p-2"></div>

<?php echo zen_draw_hidden_field('securityToken', $_SESSION['securityToken']); ?>

<div id="timeOutDefault-btn-toolbar" class="btn-toolbar justify-content-between my-3" role="toolbar">
    <?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?>
<?php echo zen_image_submit(BUTTON_IMAGE_LOGIN, BUTTON_LOGIN_ALT); ?>
</div>

  </div>
</div>

</form>

<?php
 }
 ?>
</div>
