<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_address_book_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="addressBookDefault" class="centerColumn">
    <h1 id="addressBookDefault-pageHeading" class="pageHeading"><?= HEADING_TITLE ?></h1>
<?php
if ($messageStack->size('addressbook') > 0) {
    echo $messageStack->output('addressbook');
}
?>
    <div id="primaryAddress-card" class="card mb-3">
        <h4 id="primaryAddress-card-header" class="card-header"><?= PRIMARY_ADDRESS_TITLE ?></h4>
        <div id="primaryAddress-card-body" class="card-body p-3">
            <div class="row">
                <div id="primaryAddress-content" class="content col-5 col-sm-7">
                    <?= PRIMARY_ADDRESS_DESCRIPTION ?>
                </div>

                <div id="primaryAddress-defaultAddress" class="defaultAddress col-7 col-sm-5">
                    <address class="p-3"><?= zen_address_label($_SESSION['customer_id'], $_SESSION['customer_default_address_id'], true, ' ', '<br>') ?></address>
                </div>
            </div>
        </div>
    </div>

    <div id="addressBookEntries-card" class="card mb-3">
        <h4 id="addressBookEntries-card-header" class="card-header"><?= ADDRESS_BOOK_TITLE ?></h4>
        <div id="addressBookEntries-card-body" class="card-body p-3">
            <div class="required-info text-right"><?= sprintf(TEXT_MAXIMUM_ENTRIES, MAX_ADDRESS_BOOK_ENTRIES) ?></div>
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
            <div id="addressBookSingleEntryId<?= $addresses['address_book_id'] ?>-card" class="card mb-3<?= $primary_class ?>">
                <h4 id="addressBookSingleEntryId<?= $addresses['address_book_id'] ?>-card-header" class="card-header">
                    <?= zen_output_string_protected($addresses['firstname'] . ' ' . $addresses['lastname']) . $primary_address ?>
                </h4>
                <div id="addressBookSingleEntryId<?= $addresses['address_book_id'] ?>-card-body" class="card-body p-3">
                    <address><?= zen_address_format($addresses['format_id'], $addresses['address'], true, ' ', '<br>') ?></address>
                    <div class="btn-toolbar justify-content-between" role="toolbar">
                        <?= zca_button_link(zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'edit=' . $addresses['address_book_id'], 'SSL'), BUTTON_EDIT_SMALL_ALT, 'small_edit') ?>
<?php
    if ($primary_class === '') {
?>
                        <?= zca_button_link(zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $addresses['address_book_id'], 'SSL'), BUTTON_DELETE_SMALL_ALT, 'button_delete_small') ?>
<?php
    }
?>
                    </div>
                </div>
            </div>
<?php
}
?>
        </div>
    </div>

    <div id="addressBookDefault-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
        <?= zca_button_link(zen_href_link(FILENAME_ACCOUNT, '', 'SSL'), BUTTON_BACK_ALT, 'button_back') ?>
<?php
if (count($addressArray) < MAX_ADDRESS_BOOK_ENTRIES) {
    echo zca_button_link(zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, '', 'SSL'),  BUTTON_ADD_ADDRESS_ALT, 'button_add_address');
}
?>
    </div>
</div>
