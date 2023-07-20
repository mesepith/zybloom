<?php

/**
 * Class InboxWebmail_Model_Mapper
 */
class InboxWebmail_Model_Mapper
{
    /**
     * @var wpdb
     */
    protected $_wpdb;

    /**
     * @var string
     */
    protected $_prefix;

    /**
     * @var string
     */
    protected $_tableAccounts;
    protected $_tableAttachements;
    protected $_tableInbox;
    protected $_tableLabel;

    /**
     * InboxWebmail_Model_Mapper constructor.
     */
    function __construct()
    {
        global $wpdb;

        $this->_wpdb = $wpdb;
        $this->_prefix = $wpdb->prefix . 'inboxwebmail_';

        $this->_tableAccounts = $this->_prefix . 'accounts';
        $this->_tableAttachements = $this->_prefix . 'attachments';
        $this->_tableInbox = $this->_prefix . 'inbox';
        $this->_tableLabel = $this->_prefix . 'labels';
    }

    /**
     * fetch latest date for fetch emails
     * @param $id
     * @return string
     */
    public function inboxWebmail_fetchLastDate($id)
    {
        $results = $this->_wpdb->get_row(
            $this->_wpdb->prepare(
                "SELECT
									m.created 
								FROM
									{$this->_tableInbox} AS m
								WHERE
									account_id = %d ORDER BY created DESC LIMIT 1",
                $id),
            ARRAY_A
        );
        if (!empty($results)) {
            return $results['created'];
        } else {
            return '';
        }

    }
}