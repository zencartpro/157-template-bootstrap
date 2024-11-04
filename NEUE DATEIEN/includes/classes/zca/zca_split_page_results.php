<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2024 rbarbour/lat9/drbyte/scottcwilson/marco-pm/dbltoe/dennisns7d/brittainmark/torvista/proseLA/daphilli224/retched/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: zca_split_page_results.php 2024-10-26 15:14:16Z webchills $
 */

if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
/**
 * Split Page Result Class
 *
 * An sql paging class, that allows for sql result to be shown over a number of pages using simple navigation system
 * Overhaul scheduled for subsequent release
 *
 */
// -----
// Provides a modified version of the splitPageResults formatting; loaded by
// /includes/init_includes/init_zca_bootstrap.php if the 'bootstrap' template is the
// currently-active template.  The template-specific processing will use this formatting
// when the ZCA Bootstrap template is active.
//
class zca_splitPageResults extends base
{
    public
        $sql_query,
        $number_of_rows,
        $current_page_number,
        $number_of_pages,
        $number_of_rows_per_page,
        $page_name,
        $countQuery;

    /* class constructor */
    public function __construct($query, $max_rows, $count_key = '*', $page_holder = 'page', $debug = false, $countQuery = '')
    {
        global $db;

        $max_rows = ($max_rows == '' || $max_rows == 0) ? 20 : $max_rows;

        $this->sql_query = str_replace(["\n", "\r"], ' ', $query);
        if ($countQuery !== '') {
            $countQuery = str_replace(["\n", "\r"], ' ', $countQuery);
        }
        $this->countQuery = ($countQuery !== '') ? $countQuery : $this->sql_query;
        $this->page_name = $page_holder;

        if ($debug !== false) {
            echo '<br><br>';
            echo 'original_query=' . $query . '<br><br>';
            echo 'original_count_query=' . $countQuery . '<br><br>';
            echo 'sql_query=' . $this->sql_query . '<br><br>';
            echo 'count_query=' . $this->countQuery . '<br><br>';
        }
        if (isset($_GET[$page_holder])) {
            $page = $_GET[$page_holder];
        } elseif (isset($_POST[$page_holder])) {
            $page = $_POST[$page_holder];
        } else {
            $page = '';
        }

        if (empty($page) || !ctype_digit((string)$page)) {
            $page = 1;
        }
        $this->current_page_number = $page;

        $this->number_of_rows_per_page = $max_rows;

        $pos_to = strlen($this->countQuery);

        $query_lower = strtolower($this->countQuery);
        $pos_from = (int)strpos($query_lower, ' from', 0);

        $pos_group_by = strpos($query_lower, ' group by', $pos_from);
        if ($pos_group_by !== false && $pos_group_by < $pos_to) {
            $pos_to = $pos_group_by;
        }

        $pos_having = strpos($query_lower, ' having', $pos_from);
        if ($pos_having !== false && $pos_having < $pos_to) {
            $pos_to = $pos_having;
        }

        $pos_order_by = strrpos($query_lower, ' order by', $pos_from);
        if ($pos_order_by !== false && $pos_order_by < $pos_to) {
            $pos_to = $pos_order_by;
        }

        if (strpos($query_lower, 'distinct') !== false || strpos($query_lower, 'group by') !== false) {
            $count_string = 'distinct ' . zen_db_input($count_key);
        } else {
            $count_string = zen_db_input($count_key);
        }
        $count_query = "SELECT COUNT(" . $count_string . ") AS total " . substr($this->countQuery, $pos_from, $pos_to - $pos_from);
        if ($debug !== false) {
            echo 'count_query=' . $count_query . '<br><br>';
        }
        $count = $db->Execute($count_query);

        $this->number_of_rows = $count->fields['total'];

        $this->number_of_pages = ceil($this->number_of_rows / $this->number_of_rows_per_page);

        if ($this->current_page_number > $this->number_of_pages) {
            $this->current_page_number = $this->number_of_pages;
        }

        $offset = ($this->number_of_rows_per_page * ($this->current_page_number - 1));

        // fix offset error on some versions
        if ($offset <= 0) { 
            $offset = 0; 
        }

        $this->sql_query .= ' LIMIT ' . ($offset > 0 ? $offset . ', ' : '') . $this->number_of_rows_per_page;
    }

    /* class functions */

    // display split-page-number-links
    public function display_links($max_page_links, $parameters = '', $outputAsUnorderedList = false, $navElementLabel = '')
    {
        global $request_type;

        if (empty($max_page_links)) {
            $max_page_links = 1;
        }

        if ($this->number_of_pages <= 1) {
            return '&nbsp;';
        }

        $display_links_string = $ul_elements = '';
        $counter_actual_page_links = 0;

        $class = '';

        if (!empty($parameters) && substr($parameters, -1) !== '&' && $this->current_page_number > 1) {
            $parameters .= '&';
        }

        // previous button - not displayed on first page
        $href_link = zen_href_link($_GET['main_page'], $parameters . ($this->current_page_number > 2 ? $this->page_name . '=' . ($this->current_page_number - 1) : ''), $request_type);
        $link = 
            '<a class="page-link" href="' . $href_link . '" title="' . PREVNEXT_TITLE_PREVIOUS_PAGE . '" aria-label="' . ARIA_PAGINATION_PREVIOUS_PAGE . '">' .
                PREVNEXT_BUTTON_PREV .
            '</a>';
        if ($this->current_page_number > 1) {
            $display_links_string .= '<li class="page-item">' . $link . '</li>';
            $ul_elements .= '  <li class="pagination-previous page-item">' . $link . '</li>' . "\n";
        } else {
            // $ul_elements .= '  <li class="disabled pagination-previous">' . $link . '</li>' . "\n";
        }

        // check if number_of_pages > $max_page_links
        $cur_window_num = (int)($this->current_page_number / $max_page_links);
        if ($this->current_page_number % $max_page_links) {
            $cur_window_num++;
        }

        $max_window_num = (int)($this->number_of_pages / $max_page_links);
        if ($this->number_of_pages % $max_page_links) {
            $max_window_num++;
        }

        // previous group of pages
        $href_link = zen_href_link($_GET['main_page'], $parameters . ((($cur_window_num - 1) * $max_page_links) > 1 ? $this->page_name . '=' . (($cur_window_num - 1) * $max_page_links) : ''), $request_type);
        $link = '<a class="page-link" href="' . $href_link . '" title="' . sprintf(PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE, $max_page_links) . '" aria-label="' . ARIA_PAGINATION_ELLIPSIS_PREVIOUS . '">...</a>';
        if ($cur_window_num > 1) {
            $display_links_string .= '<li class="page-item">' . $link . '</li>';
            $ul_elements .= '  <li class="ellipsis page-item">' . $link . '</li>' . "\n";
        } else {
            // $ul_elements .= '  <li class="ellipsis" aria-hidden="true">' . $link . '</li>' . "\n";
        }

        // page nn button
        for ($jump_to_page = 1 + (($cur_window_num - 1) * $max_page_links); ($jump_to_page <= ($cur_window_num * $max_page_links)) && ($jump_to_page <= $this->number_of_pages); $jump_to_page++) {
            $aria_jump_to_page = sprintf(ARIA_PAGINATION_PAGE_NUM, $jump_to_page);
            if ($jump_to_page == $this->current_page_number) {
                $display_links_string .=
                    ' <li class="page-item active" aria-current="true" aria-label="' . ARIA_PAGINATION_CURRENT_PAGE . ', ' . $aria_jump_to_page . '">' .
                        '<span class="page-link">' . $jump_to_page . '</span>' .
                    '</li>';
                $ul_elements .= '  <li class="page-item active">' . $jump_to_page . '</li>' . "\n";
                $counter_actual_page_links++;
            } else {
                $href_link = zen_href_link($_GET['main_page'], $parameters . ($jump_to_page > 1 ? $this->page_name . '=' . $jump_to_page : ''), $request_type);
                $link =
                    '<a class="page-link" href="' . $href_link . '" title="' . sprintf(PREVNEXT_TITLE_PAGE_NO, $jump_to_page) . '" aria-label="' . ARIA_PAGINATION_GOTO . $aria_jump_to_page . '">' .
                        $jump_to_page .
                    '</a>';
                $display_links_string .= '<li class="page-item">' . $link . '</li>';
                $ul_elements .= '  <li class="page-item">' . $link . '</li>' . "\n";
                $counter_actual_page_links++;
            }
        }

        // next group of pages
        if ($cur_window_num < $max_window_num) {
            $href_link = zen_href_link($_GET['main_page'], $parameters . $this->page_name . '=' . (($cur_window_num) * $max_page_links + 1), $request_type);
            $link = '<li><a class="page-link" href="' . $href_link . '" title="' . sprintf(PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE, $max_page_links) . '" aria-label="' . ARIA_PAGINATION_ELLIPSIS_NEXT . '">...</a></li>';
            $display_links_string .= $link;
            $ul_elements .= '  <li class="ellipsis page-item">' . $link . '</li>' . "\n";
        } else {
            // $ul_elements .= '  <li class="ellipsis" aria-hidden="true">' . $link . '</li>' . "\n";
        }

        // next button
        if ($this->number_of_pages !== 1 && $this->current_page_number < $this->number_of_pages) {
            $href_link = zen_href_link($_GET['main_page'], $parameters . 'page=' . ($this->current_page_number + 1), $request_type);
            $link = '<a class="page-link" href="' . $href_link . '" title="' . PREVNEXT_TITLE_NEXT_PAGE . '" aria-label="' . ARIA_PAGINATION_NEXT_PAGE . '">' . PREVNEXT_BUTTON_NEXT . '</a>';
            $display_links_string .= '<li class="page-item">' . $link . '</li>';
            $ul_elements .= '  <li class="pagination-next page-item">' . $link . '</li>' . "\n";
        } else {
            // $ul_elements .= '  <li class="disabled pagination-next">' . $link . '</li>' . "\n";
        }

        // if no pagination needed, return blank
        if ($counter_actual_page_links == 0) {
            return '';
        }

        // not setting role="navigation" because we're using a <nav> element already.

        $aria_label = empty($navElementLabel) ? ARIA_PAGINATION_ROLE_LABEL_GENERAL : sprintf(ARIA_PAGINATION_ROLE_LABEL_FOR, zen_output_string_protected($navElementLabel));
        $aria_label .= sprintf(ARIA_PAGINATION_CURRENTLY_ON, $this->current_page_number);
        return  
            '<nav aria-label="' . $aria_label . '">' . "\n" .
                '<ul class="pagination float-right">' . "\n" .
                    ($outputAsUnorderedList ? $ul_elements : $display_links_string) .
                '</ul>' . "\n" .
            '</nav>';
    }

    // display number of total products found
    public function display_count($text_output)
    {
        $to_num = $this->number_of_rows_per_page * $this->current_page_number;
        if ($to_num > $this->number_of_rows) {
            $to_num = $this->number_of_rows;
        }

        $from_num = $this->number_of_rows_per_page * ($this->current_page_number - 1);

        if ($to_num === 0) {
            $from_num = 0;
        } else {
            $from_num++;
        }

        return ($to_num <= 1) ? '&nbsp;' : sprintf($text_output, $from_num, $to_num, $this->number_of_rows);
    }

    public function getSqlQuery()
    {
        return $this->sql_query;
    }
}
