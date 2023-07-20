<?php

/**
 * Class InboxWebmail_View_InboxTable
 */
class InboxWebmail_View_InboxTable extends WP_List_Table
{
    private $inboxItems;

    private $inboxCount;
    private $perPage;

    /**
     * @return array
     */
    public static function inboxWebmail_getColumnDefs()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'e_from' => esc_html__('From', 'wp-inbox'),
            'e_subject' => esc_html__('Subject', 'wp-inbox'),
            'e_message' => esc_html__('Message', 'wp-inbox')
        );

        return $columns;
    }

    /**
     * InboxWebmail_View_InboxTable constructor.
     * @param array|string $inboxItems
     * @param $inboxCount
     * @param $perPage
     */
    function __construct($inboxItems, $inboxCount, $perPage)
    {
        parent::__construct(array(
            'singular' => esc_html__('Inbox', 'wp-inbox'),
            'plural' => esc_html__('Inbox', 'wp-inbox'),
            'ajax' => false,
            'screen' => 'toplevel_page_inboxwebmail'
        ));

        $this->inboxItems = $inboxItems;
        $this->inboxCount = $inboxCount;
        $this->perPage = $perPage;
    }

    /**
     * show when no data present
     */
    function no_items()
    {
        esc_html_e('No data available', 'wp-inbox');
    }

    /**
     * @param object $item
     * @param string $column_name
     * @return string
     */
    function column_default($item, $column_name)
    {
        return isset($item[$column_name]) ? $item[$column_name] : '';
    }

    /**
     * @return array
     */
    function get_sortable_columns()
    {
        $sortable_columns = array(
            'e_from' => array('e_from', false),
            'e_subject' => array('e_subject', false),
        );

        return $sortable_columns;
    }

    /**
     * @return array
     */
    function get_columns()
    {
        return get_column_headers(get_current_screen());
    }

    /**
     * @return array
     */
    function get_bulk_actions()
    {
        $actions = array();

        $actions['delete'] = esc_html__('Delete', 'wp-inbox');
        $actions['read'] = esc_html__('Mark as Read', 'wp-inbox');
        $actions['unread'] = esc_html__('Mark as Unread', 'wp-inbox');
        $actions['star'] = esc_html__('Mark as Star', 'wp-inbox');
        $actions['important'] = esc_html__('Mark as Important', 'wp-inbox');

        return $actions;
    }

    /**
     * @param object $item
     * @return string
     */
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="inbox[]" value="%s" />', $item['ID']
        );
    }

    /**
     * for prepare items
     */
    function prepare_items()
    {
        $this->set_pagination_args(array(
            'total_items' => $this->inboxCount,
            'per_page' => $this->perPage
        ));

        $items = array();

        foreach ($this->inboxItems as $q) {
            $items[] = array(
                'ID' => $q['id'],
                'e_from' => $q['e_from'],
                'e_subject' => $q['e_subject'],
                'e_message' => $q['e_message']
            );
        }

        $this->items = $items;
    }
}