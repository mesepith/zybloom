<?php
/*
Plugin Name: WP Inbox
Plugin URI: http://wordpress.org/plugins/wp-inbox
Description: A powerful and beautiful inbox plugin for WordPress.
Version: 1.0
Author: Softbranch
Author URI: http://www.softbranch.com
Text Domain: wp-inbox
Domain Path: /languages
*/

define('INBOXWEBMAIL_VERSION', '1.0');

define('INBOXWEBMAIL_DEV', false);
define('INBOXWEBMAIL_PATH', dirname(__FILE__));
define('INBOXWEBMAIL_URL', plugins_url('', __FILE__));
define('INBOXWEBMAIL_FILE', __FILE__);
define('INBOXWEBMAIL_PPATH', dirname(plugin_basename(__FILE__)));
define('INBOXWEBMAIL_PLUGIN_PATH', INBOXWEBMAIL_PATH . '/plugin');

define('INBOXWEBMAIL_FILE_PATH', INBOXWEBMAIL_PATH . '/files/');
define('INBOXWEBMAIL_FILE_PATH_URL', INBOXWEBMAIL_URL . '/files/');


spl_autoload_register('inboxWebmail_autoload');

register_activation_hook(__FILE__, array('InboxWebmail_Helper_Upgrade', 'upgrade'));

add_action('plugins_loaded', 'inboxWebmail_pluginLoaded');

$inboxWebmail_page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : '';
if($inboxWebmail_page=='inboxWebmail'){
	add_action('admin_enqueue_scripts', 'inboxWebmail_load_admin_style');
}

/**
 * show only for admin
 */
if (is_admin()) {
    new InboxWebmail_Controller_Admin();
}

/**
 * load css file
 */
function inboxWebmail_load_admin_style()
{
    wp_enqueue_style('inboxWebmail_admin_css', plugins_url('wp-inbox/css/inboxWebmail_admin_style.min.css'), false, INBOXWEBMAIL_VERSION);
}

/**
 * load files/scripts
 * @param $class
 */
function inboxWebmail_autoload($class)
{
    $c = explode('_', $class);

    if ($c === false || count($c) != 3 || $c[0] !== 'InboxWebmail') {
        return;
    }

    switch ($c[1]) {
        case 'View':
            $dir = 'view';
            break;
        case 'Model':
            $dir = 'model';
            break;
        case 'Helper':
            $dir = 'helper';
            break;
        case 'Controller':
            $dir = 'controller';
            break;
        default:
            return;
    }

    $classPath = INBOXWEBMAIL_PATH . '/lib/' . $dir . '/' . $class . '.php';

    if (file_exists($classPath)) {
        include_once $classPath;
    }
}

/**
 * manage plugin load
 */
function inboxWebmail_pluginLoaded()
{

    load_plugin_textdomain('wp-inbox', false, INBOXWEBMAIL_PPATH . '/languages');

    if (get_option('inboxWebmail_version') !== INBOXWEBMAIL_VERSION) {
        InboxWebmail_Helper_Upgrade::inboxWebmail_upgrade();
    }
}
