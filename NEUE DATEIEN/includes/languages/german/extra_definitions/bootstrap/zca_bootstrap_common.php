<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: zca_bootstrap_common.php 2024-10-26 15:14:16Z webchills $
 */
// -----
// Part of the Bootstrap template, defining commonly-used phrases and phrases unique to the bootstrap template.
//
define('BOOTSTRAP_PLEASE_SELECT', 'Bitte wählen ...');
define('BOOTSTRAP_CURRENT_ADDRESS', ' (derzeit ausgewählt)');

// -----
// Additional buttons.
//
define('BUTTON_BACK_TO_TOP_TITLE', 'nach oben');

// -----
// Used during checkout and on various address-rendering pages.
//
define('TEXT_SELECT_OTHER_PAYMENT_DESTINATION', 'Bitte wählen Sie die gewünschte Rechnungsadresse, wenn die Rechnung zu dieser Bestellung an eine andere Adresse geliefert werden soll.');
define('TEXT_SELECT_OTHER_SHIPPING_DESTINATION', 'Bitte wählen Sie die gewünschte Lieferadresse aus, wenn diese Bestellung an einen anderen Ort geliefert werden soll.');
define('NEW_ADDRESS_TITLE', 'Neue Adresse eingeben');
define('TEXT_PRIMARY_ADDRESS', ' (Hauptadresse)');
define('PRIMARY_ADDRESS', ' (Hauptadresse)');
define('TABLE_HEADING_ADDRESS_BOOK_ENTRIES', 'Aus Ihren Adressbucheinträgen wählen');

// -----
// Used on the product*_info pages.
//
define('TEXT_MULTIPLE_IMAGES', ' Weitere Bilder ');
define('TEXT_SINGLE_IMAGE', ' größeres Bild ');
define('PREV_NEXT_FROM', ' von ');
define('IMAGE_BUTTON_PREVIOUS', 'Vorheriger');
define('IMAGE_BUTTON_NEXT', 'Nächster');
define('IMAGE_BUTTON_RETURN_TO_PRODUCT_LIST', 'Artikelliste');
define('MODAL_ADDL_IMAGE_PLACEHOLDER_ALT', 'Modal Weitere Bilder zu %s');   //- %s is filled in with the product's name

// -----
// Used on the product_music_info page.
//
define('TEXT_ARTIST_URL', 'Für weitere Informationen besuchen Sie die <a href="%s" target="_blank">Website</a> dieser Künstler.');
define('TEXT_PRODUCT_RECORD_COMPANY', 'Plattenfirma: ');

// -----
// Used on the shopping_cart page.
//
define('TEXT_CART_MODAL_HELP', '[Hilfe (?)]');
define('HEADING_TITLE_CART_MODAL', 'Besucherwarenkorb/Kundenwarenkorb');

// -----
// Used on various pages that display the cart's contents.
//
define('SUB_TITLE_TOTAL', 'Gesamtsumme:');

// -----
// Used by various product listing pages, e.g. SNAF.
//
// -----
// The two image-heading constants are used when a site chooses to display listings
// in table-mode (PRODUCT_LISTING_COLUMNS_PER_ROW is set to '1').  If your site wants
// the image-heading to *always* be displayed, set the TABLE_HEADING_IMAGE value to
// the text you desire.  If that value is set to an empty string, then a screen-reader-only
// heading is used along with the TABLE_HEADING_IMAGE_SCREENREADER value.
//
define('TABLE_HEADING_IMAGE', '');
define('TABLE_HEADING_IMAGE_SCREENREADER', 'Artikelbild');

define('TABLE_HEADING_PRODUCTS', 'Artikelname');
define('TABLE_HEADING_MANUFACTURER', 'Hersteller');
define('TABLE_HEADING_PRICE', 'Preis');
define('TABLE_HEADING_WEIGHT', 'Gewicht');
define('TABLE_HEADING_BUY_NOW', 'Jetzt kaufen');
define('TEXT_NO_PRODUCTS', 'In dieser Kategorie gibt es derzeit keine Artikel.');
define('TEXT_NO_PRODUCTS2', 'Von diesem Hersteller gibt es derzeit keine Artikel.');

// -----
// Used by various /modalboxes
//
define('TEXT_MODAL_CLOSE', 'Schließen');
define('TEXT_MORE_INFO', '[Details]');
define('ARIA_REVIEW_STAR', 'Stern');
define('ARIA_REVIEW_STARS', 'Sterne');

// -----
// Overriding definition for the login page, removing unwanted javascript.
//
define('TEXT_VISITORS_CART', '<strong>Hinweis:</strong> Wenn Sie schon einmal bei uns eingekauft haben und etwas in Ihrem Warenkorb liegen gelassen haben, wird der Inhalt zusammengeführt, wenn Sie sich wieder einloggen.');

// -----
// Used by the (optional) AJAX search feature.
//
define('TEXT_AJAX_SEARCH_TITLE', 'Was können wir für Sie finden?');
define('TEXT_AJAX_SEARCH_PLACEHOLDER', 'Suchen...');
define('TEXT_AJAX_SEARCH_RESULTS', 'Insgesamt %u Ergebnisse gefunden.');
define('TEXT_AJAX_SEARCH_VIEW_ALL', 'Alle anzeigen');

// -----
// ARIA label text, used in the common header.
//
define('TEXT_HEADER_ARIA_LABEL_NAVBAR', 'Navigationsleiste');
define('TEXT_HEADER_ARIA_LABEL_LOGO', 'Website Logo');

// -----
// ARIA label text, used by /sideboxes/tpl_orders_history.php.
//
// NOTE: Not replicated in lang.zca_bootstrap_common.php, since this constant is
// defined in lang.english.php for zc158 and later.
//
define('PAGE_ACCOUNT_HISTORY', 'Bestellhistorie');

// -----
// <h1> text for index pages where the 'normal' heading-text isn't provided by a
// store ... for accessibility.
//
// Note: For zc200, this constant will be in /includes/languages/english/lang.index.php.
//
define('HEADING_TITLE_SCREENREADER', 'Weiterer Inhalt unten');