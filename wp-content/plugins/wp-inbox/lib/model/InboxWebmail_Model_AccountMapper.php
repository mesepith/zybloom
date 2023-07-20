<?php

/**
 * Class InboxWebmail_Model_AccountMapper
 */
class InboxWebmail_Model_AccountMapper extends InboxWebmail_Model_Mapper
{
    protected $_table;

    /**
     * InboxWebmail_Model_AccountMapper constructor.
     */
    function __construct()
    {
        parent::__construct();

        $this->_table = $this->_prefix . "accounts";
        $this->_tableLabel = $this->_prefix . "labels";
    }

    /**
     * check if account exists
     * @param $id
     * @return null|string
     */
    public function inboxWebmail_exists($id)
    {
        return $this->_wpdb->get_var($this->_wpdb->prepare("SELECT COUNT(*) FROM {$this->_table} WHERE id = %d", $id));
    }

    /**
     * fetch account data
     * @param $id
     * @return array|null|object|void
     */
    public function inboxWebmail_fetch($id)
    {
        $results = $this->_wpdb->get_row(
            $this->_wpdb->prepare(
                "SELECT
									m.id, m.email, m.password, m.domain, m.delete_server, m.folder_name, m.active, m.e_sign, m.created 
								FROM
									{$this->_table} AS m
								  
								WHERE
									id = %d",
                $id),
            ARRAY_A
        );

        return $results;
    }

    /**
     * fetch email id based on id
     * @param $id
     * @return mixed
     */
    public function inboxWebmail_fetchEmail($id)
    {
        $results = $this->_wpdb->get_row(
            $this->_wpdb->prepare(
                "SELECT
									m.email 
								FROM
									{$this->_table} AS m
								  
								WHERE
									id = %d",
                $id),
            ARRAY_A
        );

        return $results['email'];
    }

    /**
     * fetch all account info
     * @return array|null|object
     */
    public function inboxWebmail_fetchAll()
    {
        $results = $this->_wpdb->get_results($this->_wpdb->prepare(
            "
				SELECT 
					m.id, m.email, m.password, m.domain, m.delete_server, m.folder_name, m.active, m.e_sign, m.created 
				FROM 
					{$this->_table} AS m
				  
			",
            array())
            , ARRAY_A);


        return $results;
    }

    /**
     * fetch table data
     * @param $orderBy
     * @param $order
     * @param $search
     * @param $limit
     * @param $offset
     *
     * @return array
     */
    public function inboxWebmail_fetchTable($orderBy, $order, $search, $limit, $offset)
    {
        switch ($orderBy) {
            default:
                $_orderBy = 'm.id';
                break;
        }

        $results = $this->_wpdb->get_results($this->_wpdb->prepare(
            "
				SELECT
					m.id, m.email, m.active, m.e_sign, m.created , m.folder_name 
				FROM
					{$this->_table} AS m
				WHERE
					m.email LIKE %s
				
				ORDER BY
					{$_orderBy} " . ($order == 'asc' ? 'asc' : 'desc') . "
				LIMIT %d, %d
			",
            array(
                '%' . $search . '%',
                $offset,
                $limit
            )), ARRAY_A);


        $count = $this->_wpdb->get_var($this->_wpdb->prepare(
            "
				SELECT
					COUNT(*) as count_rows
				FROM
					{$this->_table} AS m
				WHERE
					m.email LIKE %s
				
			",
            array(
                '%' . $search . '%'
            )));

        return array(
            'items' => $results,
            'count' => $count ? $count : 0
        );
    }

    /**
     * save data for account create/update
     * @param $id
     * @param $set
     * @return int|null
     */
    public function inboxWebmail_save($id, $set)
    {
        if ($id > 0) {
            $this->_wpdb->update($this->_table,
                $set,
                array(
                    'id' => $id
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%d'
                ),
                array('%d'));
        }
        return $id;
    }

}