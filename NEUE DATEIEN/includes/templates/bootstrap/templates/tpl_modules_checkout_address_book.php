<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_checkout_address_book.php 2024-10-26 17:22:39Z webchills $
 */
?>
<?php
/**
 * require code to get address book details
 */
require DIR_WS_MODULES . zen_get_module_directory('checkout_address_book.php');
foreach ($addresses as $address) {
    $address_book_id = (int)$address['address_book_id'];
    $selected = ($address_book_id === $_SESSION['sendto']);
    if ($current_page_base === FILENAME_CHECKOUT_PAYMENT_ADDRESS) {
        $selected = ($address_book_id === $_SESSION['billto']);
    }

    if ($selected === true) {
        $primary_class = ' primary-address';
        $primary_address = BOOTSTRAP_CURRENT_ADDRESS;
    } else {
        $primary_class = '';
        $primary_address = '';
    }
?>
<!--bof address book single entries card-->
<div id="cab-card-<?php echo $address_book_id; ?>" class="card mb-3<?php echo $primary_class; ?>">
    <div class="card-header">
        <div class="custom-control custom-radio custom-control-inline">
            <?php echo zen_draw_radio_field('address', $address_book_id, $selected, 'id="name-' . $address_book_id . '"'); ?>
            <label for="name-<?php echo $address_book_id; ?>" class="custom-control-label"><?php echo zen_output_string_protected($address['firstname'] . ' ' . $address['lastname']) . $primary_address; ?></label>
        </div>
    </div>

    <div class="card-body p-3">
        <address><?php echo zen_address_format(zen_get_address_format_id($address['country_id']), $address['address'], true, ' ', '<br>'); ?></address>
    </div>
</div>
<!--eof address book single entry card-->
<?php
}
