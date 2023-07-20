<?php

/**
 * Class InboxWebmail_Helper_DbUpgrade
 */
class InboxWebmail_Helper_DbUpgrade
{
    const INBOXWEBMAIL_DB_VERSION = 1;

    private $_wpdb;
    private $_prefix;

    /**
     * InboxWebmail_Helper_DbUpgrade constructor.
     */
    public function __construct()
    {
        global $wpdb;

        $this->_wpdb = $wpdb;
    }

    /**
     * manage upgrade version/install
     * @param $version
     * @return int
     */
    public function inboxWebmail_upgrade($version)
    {
        set_time_limit(300);


        if ($version === false || ((int)$version) > InboxWebmail_Helper_DbUpgrade::INBOXWEBMAIL_DB_VERSION) {
            $this->inboxWebmail_install();

            return InboxWebmail_Helper_DbUpgrade::INBOXWEBMAIL_DB_VERSION;
        }

        $version = (int)$version;

        if ($version === InboxWebmail_Helper_DbUpgrade::INBOXWEBMAIL_DB_VERSION) {
            return InboxWebmail_Helper_DbUpgrade::INBOXWEBMAIL_DB_VERSION;
        }

        do {
            $f = 'inboxWebmail_upgradeDbV' . $version;

            if (method_exists($this, $f)) {
                $version = $this->$f();
            } else {
                die("InboxWebmail upgrade error");
            }
        } while ($version < InboxWebmail_Helper_DbUpgrade::INBOXWEBMAIL_DB_VERSION);

        return InboxWebmail_Helper_DbUpgrade::INBOXWEBMAIL_DB_VERSION;
    }

    /**
     * for delete plugin
     */
    public function inboxWebmail_delete()
    {
        $this->_wpdb->query('DROP TABLE IF EXISTS `' . $this->_wpdb->prefix . 'inboxwebmail_accounts`');
        $this->_wpdb->query('DROP TABLE IF EXISTS `' . $this->_wpdb->prefix . 'inboxwebmail_attachments`');
        $this->_wpdb->query('DROP TABLE IF EXISTS `' . $this->_wpdb->prefix . 'inboxwebmail_inbox`');
        $this->_wpdb->query('DROP TABLE IF EXISTS `' . $this->_wpdb->prefix . 'inboxwebmail_labels`');
    }

    /**
     * for install
     */
    private function inboxWebmail_install()
    {
        $this->inboxWebmail_delete();
        $this->inboxWebmail_databaseDelta();
    }

    /**
     * create db tables when install
     */
    public function inboxWebmail_databaseDelta()
    {
        if (!function_exists('dbDelta')) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        }

        dbDelta("
			CREATE TABLE IF NOT EXISTS {$this->_wpdb->prefix}inboxwebmail_accounts (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `email` varchar(50) DEFAULT NULL,
              `password` varchar(50) DEFAULT NULL,
              `domain` varchar(50) DEFAULT NULL,
              `delete_server` tinyint(1) DEFAULT 0,
              `folder_name` varchar(25) DEFAULT NULL,
              `active` tinyint(1) DEFAULT 1,
              `e_sign` text DEFAULT NULL,
              `created` datetime DEFAULT NULL,
              `last_mod` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		");

        dbDelta("
			INSERT INTO {$this->_wpdb->prefix}inboxwebmail_accounts (`id`, `email`, `password`, `domain`, `delete_server`, `folder_name`, `active`, `e_sign`, `created`) VALUES (1, '', '', '', 0, '', 1, '', now());
		");

        dbDelta("
			 CREATE TABLE IF NOT EXISTS {$this->_wpdb->prefix}inboxwebmail_attachments (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `inbox_id` int(11) DEFAULT NULL,
              `file_name` varchar(100) DEFAULT NULL,
              `file_type` varchar(50) DEFAULT NULL,
              `file_bytes` longtext DEFAULT NULL,
              `last_mod` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
              PRIMARY KEY (`id`),
              KEY `inbox_id` (`inbox_id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		");

        dbDelta("
			  CREATE TABLE IF NOT EXISTS {$this->_wpdb->prefix}inboxwebmail_labels (
             `id` int(11) NOT NULL AUTO_INCREMENT,
             `account_id` int(11) DEFAULT NULL,
              `lb_name` varchar(25) DEFAULT NULL,
              `lb_code` varchar(10) DEFAULT NULL,
              `last_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		");

        dbDelta("
			INSERT INTO {$this->_wpdb->prefix}inboxwebmail_labels(`id`,`account_id`,`lb_name`,`lb_code`) values (1,1,'Primary','#888888');
		");

        dbDelta("
			INSERT INTO {$this->_wpdb->prefix}inboxwebmail_labels(`id`,`account_id`,`lb_name`,`lb_code`) values (2,1,'Promotions','#1cbfd0');
		");

        dbDelta("
			INSERT INTO {$this->_wpdb->prefix}inboxwebmail_labels(`id`,`account_id`,`lb_name`,`lb_code`) values (3,1,'Social','#0c7ce6');
		");

        dbDelta("
			CREATE TABLE IF NOT EXISTS {$this->_wpdb->prefix}inboxwebmail_inbox (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `account_id` int(11) DEFAULT NULL,
              `parent_id` int(11) DEFAULT 0,
              `e_from` varchar(255) DEFAULT NULL,
              `e_to` varchar(255) DEFAULT NULL,
              `e_reply_to` varchar(255) DEFAULT NULL,
              `e_cc` varchar(255) DEFAULT NULL,
              `e_bcc` varchar(255) DEFAULT NULL,
              `e_subject` varchar(255) DEFAULT NULL,
              `e_message` longtext DEFAULT NULL,
              `header_info` text DEFAULT NULL,
              `is_sent` tinyint(1) DEFAULT 0,
              `is_star` tinyint(1) DEFAULT 0,
              `is_important` tinyint(1) DEFAULT 0,
              `is_label` int(11) DEFAULT 0,
              `is_read` tinyint(1) DEFAULT 0,
              `is_deleted` tinyint(1) DEFAULT 0,
              `is_attachment` tinyint(1) DEFAULT 0,
              `is_draft` tinyint(1) DEFAULT 0,
              `created` datetime DEFAULT NULL,
              `last_mod` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
              PRIMARY KEY (`id`),
              KEY `account_id` (`account_id`),
              KEY `is_sent` (`is_sent`),
              KEY `is_label` (`is_label`),
              KEY `is_deleted` (`is_deleted`),
              KEY `is_star` (`is_star`),
              KEY `is_important` (`is_important`),
              KEY `is_draft` (`is_draft`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		");

    }

    /**
     * for upgrade version
     * @return int
     */
    private function inboxWebmail_upgradeDbV1()
    {
        return 2;
    }

}