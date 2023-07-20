<?php

/**
 * Class InboxWebmail_Model_InboxMapper
 */
class InboxWebmail_Model_InboxMapper extends InboxWebmail_Model_Mapper
{
    protected $_table;
    protected $_tableAttachment;

    /**
     * InboxWebmail_Model_InboxMapper constructor.
     */
    function __construct()
    {
        parent::__construct();

        $this->_table = $this->_prefix . "inbox";
        $this->_tableAttachment = $this->_prefix . "attachments";
        $this->_tableLabel = $this->_prefix . "labels";
    }

    /**
     * for delete inbox data
     * @param $id
     */
    public function inboxWebmail_delete($id)
    {
        $this->_wpdb->delete($this->_table, array(
            'id' => $id
        ),
            array('%d'));

        $this->_wpdb->delete($this->_tableAttachment, array(
            'inbox_id' => $id
        ),
            array('%d'));

        // delete folder and files
        $file_path = INBOXWEBMAIL_FILE_PATH . $id;

        require_once(ABSPATH . 'wp-admin/includes/file.php');
        global $wp_filesystem;
        if (!is_a($wp_filesystem, 'WP_Filesystem_Base')) {
            $creds = request_filesystem_credentials(site_url());
            wp_filesystem($creds);
        }
        if ($wp_filesystem->exists($file_path)) {
            $wp_filesystem->delete($file_path, true, 'd');
        }
    }

    /**
     * update message status as read
     * @param $id
     * @param $read
     */
    public function inboxWebmail_updateRead($id, $read)
    {
        $this->_wpdb->update(
            $this->_table,
            array(
                'is_read' => $read
            ),
            array('id' => $id),
            array('%d'),
            array('%d'));
    }

    /**
     * update message status as star
     * @param $id
     * @param $val
     */
    public function inboxWebmail_updateStar($id, $val)
    {
        $this->_wpdb->update(
            $this->_table,
            array(
                'is_star' => $val
            ),
            array('id' => $id),
            array('%d'),
            array('%d'));
    }

    /**
     * update message status as important
     * @param $id
     * @param $val
     */
    public function inboxWebmail_updateImportant($id, $val)
    {
        $this->_wpdb->update(
            $this->_table,
            array(
                'is_important' => $val
            ),
            array('id' => $id),
            array('%d'),
            array('%d'));
    }

    /**
     * update message statusas label
     * @param $id
     * @param $val
     */
    public function inboxWebmail_updateLabel($id, $val)
    {
        $this->_wpdb->update(
            $this->_table,
            array(
                'is_label' => $val
            ),
            array('id' => $id),
            array('%s'),
            array('%d'));
    }

    /**
     * update message status as deleted
     * @param $id
     * @param $val
     */
    public function inboxWebmail_updateDeleted($id, $val)
    {
        $this->_wpdb->update(
            $this->_table,
            array(
                'is_deleted' => $val
            ),
            array('id' => $id),
            array('%d'),
            array('%d'));
    }

    /**
     * check for exists inbox data
     * @param $id
     * @return null|string
     */
    public function inboxWebmail_exists($id)
    {
        return $this->_wpdb->get_var($this->_wpdb->prepare("SELECT COUNT(*) FROM {$this->_table} WHERE id = %d", $id));
    }

    /**
     * get inbox data
     * @param $uid
     * @param $id
     * @return array|null|object|void
     */
    public function inboxWebmail_fetch($uid, $id)
    {
        $results = $this->_wpdb->get_row(
            $this->_wpdb->prepare(
                "SELECT
									m.id, m.account_id, m.e_from, m.e_to, m.e_reply_to, m.e_cc, m.e_bcc, m.e_subject, m.e_message, m.is_sent, m.is_star, m.is_important, m.is_label, m.is_read, m.is_deleted, m.is_attachment,  m.created
								FROM
									{$this->_table} AS m
								  
								WHERE
								account_id={$uid}
								AND	id = %d",
                $id),
            ARRAY_A
        );

        return $results;
    }

    /**
     * get attachments
     * @param $in_id
     * @return array|null|object
     */
    public function inboxWebmail_fetchAttacments($in_id)
    {
        $results = $this->_wpdb->get_results(
            $this->_wpdb->prepare(
                "SELECT
									m.id, m.inbox_id, m.file_name, m.file_type, m.file_bytes 
								FROM
									{$this->_tableAttachment} AS m
								  
								WHERE
								inbox_id={$in_id}",
                $in_id),
            ARRAY_A
        );

        return $results;
    }

    /**
     * get inbox data
     * @param $uid
     * @param $filter
     * @param $limit
     * @param $offset
     * @return array|null|object
     */
    public function inboxWebmail_fetchAll($uid, $filter, $limit, $offset)
    {

        $results = $this->_wpdb->get_results($this->_wpdb->prepare(
            "
				SELECT 
					m.id, m.account_id, m.e_from,m.e_to, m.e_subject, m.e_message, m.is_sent, m.is_star, m.is_important, m.is_label, m.is_read, m.is_attachment, m.created
				FROM 
					{$this->_table} AS m
				  WHERE account_id={$uid}
				  {$filter}
				 order by created desc
				   LIMIT %d, %d
			",
            array(
                $offset,
                $limit
            )), ARRAY_A);


        return $results;
    }

    /**
     * get inbox counts
     * @param $uid
     * @param $filter
     * @return null|string
     */
    public function inboxWebmail_fetchCount($uid, $filter)
    {

        $count = $this->_wpdb->get_var($this->_wpdb->prepare(
            "
				SELECT
					COUNT(*) as count_rows
				FROM
					{$this->_table} AS m
				WHERE
					account_id={$uid}
					{$filter}
			",
            array()));
        return $count;
    }

    /**
     * get label for select
     * @param $uid
     * @return array|null|object
     */
    public function inboxWebmail_fetchLabelSelect($uid)
    {
        $results = $this->_wpdb->get_results($this->_wpdb->prepare(
            "
				SELECT 
					m.id,m.lb_name,m.lb_code
				FROM 
					{$this->_tableLabel} AS m
				  WHERE
				  m.account_id={$uid}
				 order by m.lb_name
			",
            array()), ARRAY_A);

        return $results;
    }

    /**
     * get all labels
     * @param $uid
     * @return array|null|object
     */
    public function inboxWebmail_fetchAllLabels($uid)
    {
        $results = $this->_wpdb->get_results($this->_wpdb->prepare(
            "
				SELECT 
					m.id,m.lb_name,m.lb_code,count(i.id) as total
				FROM 
					{$this->_tableLabel} AS m, {$this->_table} As i
				  WHERE
				  m.account_id=i.account_id AND
				  m.id = i.is_label AND
				  m.account_id={$uid}
				 group by i.is_label
				 order by m.lb_name
			",
            array()), ARRAY_A);

        return $results;
    }

    /**
     * fetch all counts for left side show
     * @param $uid
     * @return array
     */
    public function inboxWebmail_fetchAllCounts($uid)
    {
        $r = array();

        $results = $this->_wpdb->get_row($this->_wpdb->prepare(
            "
				SELECT 
					count(m.id) as total
				FROM 
					{$this->_table} AS m
				  WHERE account_id={$uid}
				  and is_deleted =0 and is_sent =0 and is_draft =0 and is_read=0
			",
            array()), ARRAY_A);
        $r['inbox'] = $results['total'];

        $results = $this->_wpdb->get_row($this->_wpdb->prepare(
            "
				SELECT 
					count(m.id) as total
				FROM 
					{$this->_table} AS m
				  WHERE account_id={$uid}
				  and is_sent =1 and is_deleted =0
			",
            array()), ARRAY_A);
        $r['sent'] = $results['total'];

        $results = $this->_wpdb->get_row($this->_wpdb->prepare(
            "
				SELECT 
					count(m.id) as total
				FROM 
					{$this->_table} AS m
				  WHERE account_id={$uid}
				  and is_draft =1
			",
            array()), ARRAY_A);
        $r['draft'] = $results['total'];

        $results = $this->_wpdb->get_row($this->_wpdb->prepare(
            "
				SELECT 
					count(m.id) as total
				FROM 
					{$this->_table} AS m
				  WHERE account_id={$uid}
				  and is_deleted =1
			",
            array()), ARRAY_A);
        $r['trash'] = $results['total'];

        $results = $this->_wpdb->get_row($this->_wpdb->prepare(
            "
				SELECT 
					count(m.id) as total
				FROM 
					{$this->_table} AS m
				  WHERE account_id={$uid}
				  and is_star =1 and is_deleted =0
			",
            array()), ARRAY_A);
        $r['star'] = $results['total'];

        $results = $this->_wpdb->get_row($this->_wpdb->prepare(
            "
				SELECT 
					count(m.id) as total
				FROM 
					{$this->_table} AS m
				  WHERE account_id={$uid}
				  and is_important =1 and is_deleted =0
			",
            array()), ARRAY_A);
        $r['important'] = $results['total'];

        return $r;
    }

    /**
     * save inbox data
     * @param $set
     * @return int
     */
    public function inboxWebmail_saveData($set)
    {
        $this->_wpdb->insert($this->_table,
            $set,
            array(
                '%d',
                '%d',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%d',
                '%s',
                '%d'
            ));

        $inbox_id = $this->_wpdb->insert_id;

        return $inbox_id;
    }

    /**
     * save attachments data
     * @param $set
     */
    public function inboxWebmail_saveDataAttachments($set)
    {
        $this->_wpdb->insert($this->_tableAttachment,
            $set,
            array(
                '%d',
                '%s',
                '%s',
                '%s'
            ));
    }

}