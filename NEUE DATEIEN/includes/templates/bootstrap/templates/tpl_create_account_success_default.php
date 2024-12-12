<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018-2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills  
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_create_account_success_default.php 2024-10-26 17:22:39Z webchills $
 */
?>
<div id="createAccountSuccessDefault" class="centerColumn">
    <h1 id="createAccountSuccessDefault-heading" class="pageHeading"><?= HEADING_TITLE ?></h1>

    <div id="createAccountSuccessDefault-content" class="content"><?= TEXT_ACCOUNT_CREATED ?></div>

<!--bof address details card-->
    <div id="addressDetails-card" class="card mb-3">
        <h2 id="addressDetails-card-header" class="card-header"><?= PRIMARY_ADDRESS_TITLE ?></h2>

        <div id="addressDetails-card-body" class="card-body p-3">
<?php
/**
 * Used to loop thru and display address book entries
 */
foreach ($addressArray as $addresses) {
    if ($addresses['address_book_id'] == $_SESSION['customer_default_address_id']) {
        $primary_class = ' primary-address';
        $primary_address = PRIMARY_ADDRESS;
    } else {
        $primary_class = '';
        $primary_address = '';
    }
?>
<!--bof address book single entries card-->
            <div id="addressBookSingleEntryId<?= $addresses['address_book_id'] ?>-card" class="card mb-3<?= $primary_class ?>">
                <h4 id="addressBookSingleEntryId<?= $addresses['address_book_id'] ?>-card-header" class="card-header">
                    <?= zen_output_string_protected($addresses['firstname'] . ' ' . $addresses['lastname']) . $primary_address ?>
                </h4>
                <div id="addressBookSingleEntryId<?= $addresses['address_book_id'] ?>-card-body" class="card-body p-3">
                    <address><?= zen_address_format($addresses['format_id'], $addresses['address'], true, ' ', '<br>') ?></address>

                    <div class="btn-toolbar justify-content-between my-3" role="toolbar">
<?php
    if ($primary_class === '') {
?>
                        <?= zca_button_link(zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $addresses['address_book_id'], 'SSL'), BUTTON_DELETE_ALT, 'button_delete') ?>
<?php
    }
?>
                        <?= zca_button_link(zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'edit=' . $addresses['address_book_id'], 'SSL'), BUTTON_EDIT_SMALL_ALT, 'edit_small') ?>
                    </div>
                </div>
            </div>
<!--eof address book single entry card-->
<?php
}
?>
        </div>
    </div>
<!--bof address details card-->

    <div id="createAccountSuccessDefault-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
        <?= zca_button_link($origin_href, BUTTON_CONTINUE_ALT, 'button_continue') ?>
    </div>
</div>
