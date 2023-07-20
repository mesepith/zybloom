<?php
/**
 * used when uninstall plugin
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

include_once 'lib/helper/InboxWebmail_Helper_DbUpgrade.php';

$inboxWebmail_db = new InboxWebmail_Helper_DbUpgrade();
$inboxWebmail_db->inboxWebmail_delete();

delete_option('inboxWebmail_dbVersion');
delete_option('inboxWebmail_version');
