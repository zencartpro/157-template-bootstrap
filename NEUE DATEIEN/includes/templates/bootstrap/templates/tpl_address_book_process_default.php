<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/webchills/drbyte/webchills 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_address_book_process_default.php 2024-10-26 15:22:39Z webchills $
 */
?>
<div id="addressBookProcessDefault" class="centerColumn">
<?php 
if (!isset($_GET['delete'])) {
    echo zen_draw_form('addressbook', zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, (isset($_GET['edit']) ? 'edit=' . $_GET['edit'] : ''), 'SSL'), 'post', 'onsubmit="return check_form(addressbook);"');
}
?>
    <h1 id="addressBookDefault-pageHeading" class="pageHeading">
<?php 
if (isset($_GET['edit'])) {
    echo HEADING_TITLE_MODIFY_ENTRY; 
} elseif (isset($_GET['delete'])) { 
    echo HEADING_TITLE_DELETE_ENTRY; 
} else { 
    echo HEADING_TITLE_ADD_ENTRY; 
} 
?>
    </h1>
    
    <?php if ($messageStack->size('addressbook') > 0) echo $messageStack->output('addressbook'); ?>    

<?php
if (isset($_GET['delete'])) {
?>
    <div class="required-info text-right"><?php echo DELETE_ADDRESS_DESCRIPTION; ?></div>

    <address><?php echo zen_address_label($_SESSION['customer_id'], $_GET['delete'], true, ' ', '<br>'); ?></address>
    <br class="clearBoth">
 
    <div id="addressBookDelete-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
        <?php echo zen_draw_form('delete_address', zen_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'action=deleteconfirm', 'SSL'), 'post'); ?>
        <?php echo zen_draw_hidden_field('delete', $_GET['delete']); ?>
        <?php echo zen_image_submit(BUTTON_IMAGE_DELETE, BUTTON_DELETE_ALT); ?>
        <?php echo zca_button_link(zen_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'), BUTTON_BACK_ALT, 'button_back'); ?>
        <?php echo '</form>'; ?>
    </div>

<?php
} else {
    /**
     * Used to display address book entry form
     */
?>
<?php require $template->get_template_dir('tpl_modules_address_book_details.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_address_book_details.php'; ?>

    <div class="p-2"></div>
<?php
    if (isset($_GET['edit']) && ctype_digit($_GET['edit'])) {
?>

        <div id="addressBookEdit-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
        <?php echo zca_button_link(zen_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'), BUTTON_BACK_ALT, 'button_back'); ?>
        <?php echo zen_draw_hidden_field('action', 'update') . zen_draw_hidden_field('edit', (int)$_GET['edit']) . zen_image_submit(BUTTON_IMAGE_UPDATE, BUTTON_UPDATE_ALT); ?>
    </div>
<?php
    } else {
?>
    <div id="addressBookNew-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
        <?php echo zca_button_link(zen_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'), BUTTON_BACK_ALT, 'button_back'); ?>
        <?php echo zen_draw_hidden_field('action', 'process') . zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_ALT); ?>
    </div>

<?php
    }
}
if (!isset($_GET['delete'])) {
    echo '</form>'; 
}
?>
</div>
