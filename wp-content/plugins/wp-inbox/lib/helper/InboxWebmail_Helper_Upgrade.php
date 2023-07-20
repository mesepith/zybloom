<?php

/**
 * Class InboxWebmail_Helper_Upgrade
 */
class InboxWebmail_Helper_Upgrade
{

    /**
     * manage upgrade
     */
    public static function inboxWebmail_upgrade()
    {

        InboxWebmail_Helper_Upgrade::inboxWebmail_updateDb();

        $oldVersion = get_option('inboxWebmail_version');

        if ($oldVersion == '1.0') {
            InboxWebmail_Helper_Upgrade::inboxWebmail_updateV1();
        }

        switch ($oldVersion) {
            case '1.0':
                break;
            default:
                InboxWebmail_Helper_Upgrade::inboxWebmail_install();
                break;
        }

        if (add_option('inboxWebmail_version', INBOXWEBMAIL_VERSION) === false) {
            update_option('inboxWebmail_version', INBOXWEBMAIL_VERSION);
        }
    }

    /**
     * add cap when install
     */
    private static function inboxWebmail_install()
    {
        $role = get_role('administrator');

        $role->add_cap('inboxWebmail_show');
        $role->add_cap('inboxWebmail_add_accounts');
        $role->add_cap('inboxWebmail_edit_accounts');
        $role->add_cap('inboxWebmail_delete_accounts');
        $role->add_cap('inboxWebmail_show_inbox');
    }

    /**
     * update version
     */
    private static function inboxWebmail_updateV1()
    {
        $role = get_role('administrator');
        $role->add_cap('inboxWebmail_show');
    }

    /**
     * update db
     */
    private static function inboxWebmail_updateDb()
    {
        $db = new InboxWebmail_Helper_DbUpgrade();
        $v = $db->inboxWebmail_upgrade(get_option('inboxWebmail_dbVersion', false));

        if (add_option('inboxWebmail_dbVersion', $v) === false) {
            update_option('inboxWebmail_dbVersion', $v);
        }
    }

}