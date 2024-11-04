<?php
/**
 * Bootstrap Template for Zen Cart German 1.5.7i
 * Zen Cart German Specific
 * Copyright 2018- 2023 rbarbour/lat9/drbyte/webchills
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: zca_message_stack.php 2024-10-26 15:14:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
/**
 * messageStack Class.
 * This class is used to manage messageStack alerts
 *
 */
// -----
// Note: Overriding "only" the 'add' method, to ensure that the bootstrap classes are included.
//
class zca_messageStack extends messageStack
{
    function add($class, $message, $type = 'error') 
    {
        global $template, $current_page_base;
        $message = trim($message);
        $duplicate = false;
        if (strlen($message) > 0) {
            if ($type == 'error') {
//-bof-zca_bootstrap  *** 1 of 1 ***          
//        $theAlert = array('params' => 'class="messageStackError larger"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_ERROR, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_ERROR, ICON_ERROR_ALT) . '  ' . $message);
                $theAlert = array(
                    'params' => 'class="alert alert-danger"', 
                    'class' => $class, 
                    'text' => '<i class="fas fa-exclamation-triangle fa-lg" data-title="' . ICON_ERROR_ALT . '"></i>  ' . $message
                );
            } elseif ($type == 'warning') {
//        $theAlert = array('params' => 'class="messageStackWarning larger"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_WARNING, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_WARNING, ICON_WARNING_ALT) . '  ' . $message);
                $theAlert = array(
                    'params' => 'class="alert alert-warning"', 
                    'class' => $class, 
                    'text' => '<i class="fas fa-exclamation-circle fa-lg" data-title="'.ICON_WARNING_ALT.'"></i>  ' . $message
                );
            } elseif ($type == 'success') {
//        $theAlert = array('params' => 'class="messageStackSuccess larger"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_SUCCESS, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_SUCCESS, ICON_SUCCESS_ALT) . '  ' . $message);
                $theAlert = array(
                    'params' => 'class="alert alert-success"', 
                    'class' => $class, 
                    'text' => '<i class="fas fa-check-circle fa-lg" data-title="'.ICON_SUCCESS_ALT.'"></i>  ' . $message
                );
            } elseif ($type == 'caution') {
//        $theAlert = array('params' => 'class="messageStackCaution larger"', 'class' => $class, 'text' => zen_image($template->get_template_dir(ICON_IMAGE_WARNING, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_WARNING, ICON_WARNING_ALT) . '  ' . $message);
                $theAlert = array(
                    'params' => 'class="alert alert-info"', 
                    'class' => $class, 
                    'text' => '<i class="fas fa-question-circle fa-lg" data-title="'.ICON_WARNING_ALT.'"></i>  ' . $message
                );
        
            } else {
//        $theAlert = array('params' => 'class="messageStackError larger"', 'class' => $class, 'text' => $message);
                $theAlert = array(
                    'params' => 'class="alert alert-danger"', 
                    'class' => $class, 
                    'text' => $message
                );
        
            }
//-eof-zca_bootstrap  *** 1 of 1 ***      

            foreach ($this->messages as $next_message) {
                if ($theAlert['text'] == $next_message['text'] && $theAlert['class'] == $next_message['class']) {
                    $duplicate = true;
                    break;
                }
            }
            if (!$duplicate) {
                $this->messages[] = $theAlert;
            }
        }
    }
}
