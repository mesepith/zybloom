<?php

/**
 * Class InboxWebmail_View_InboxData
 */
class InboxWebmail_View_InboxData extends WP_List_Table
{
    private $inboxItems;

    private $inboxCount;
    private $perPage;
    private $allLabels;
    private $details;
    private $inboxDetails;
    private $uid;
    private $attachments;
    private $allLabelSelect;
    private $sub;

    /**
     * InboxWebmail_View_InboxData constructor.
     * @param array|string $inboxItems
     * @param $inboxCount
     * @param $perPage
     * @param $labels
     * @param $details
     * @param $inboxDetails
     * @param $uid
     * @param $attachments
     * @param $allLabelSelect
     * @param $sub
     */
    function __construct($inboxItems, $inboxCount, $perPage, $labels, $details, $inboxDetails, $uid, $attachments, $allLabelSelect, $sub)
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
        $this->allLabels = $labels;
        $this->details = $details;
        $this->inboxDetails = $inboxDetails;
        $this->uid = $uid;
        $this->attachments = $attachments;
        $this->allLabelSelect = $allLabelSelect;
        $this->sub = $sub;

    }

    /**
     * when no item thne show this message
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
     * show column based on screen
     * @return array
     */
    function get_columns()
    {
        return get_column_headers(get_current_screen());
    }

    /**
     * for show bulkaction
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
     * for show checkbox
     * @param object $item
     * @return string
     */
    function column_cb($item)
    {
        return sprintf(
            '<input id="mc' . $item['id'] . '" class="mycls" type="checkbox" name="inbox[]" value="%s" /><label for="mc' . $item['id'] . '"></label>', $item['id']
        );
    }

    /**
     * for prepare items to show
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

    /**
     * for show inbox page
     */
    function inboxWebmail_show()
    {

        if ($this->details > 0) {
            ?>

            <div class="card">
                <?php $this->inboxWebmail_showDetails(); ?>
            </div>

            <?php
        } else {
            if ($this->inboxCount > 0) {
                ?>
                <form id="frm_inbox" name="frm_inbox" action="" method="post">
                    <input type="hidden" name="page" value="inboxWebmail">
                    <div class="i_action d-flex justify-content-between align-items-center">
                        <div class="">
                            <div class="checkbox simple d-inline-block mr-1">
                                <input id="mc0" type="checkbox">
                                <label for="mc0"></label>
                            </div>

                            <div class="btn-group">
                                <select name="bulk_action" id="bulk_action" style="margin-right: 6px;">
                                    <option value=""><?php esc_html_e('Bulk Actions', 'wp-inbox'); ?></option>
                                    <?php if ($this->sub == 'trash') { ?>
                                        <option value="moveinbox"><?php esc_html_e('Move to Inbox', 'wp-inbox'); ?></option>
                                        <option value="delete"><?php esc_html_e('Delete Permanently', 'wp-inbox'); ?></option>
                                    <?php } else { ?>
                                        <option value="read"><?php esc_html_e('Mark as Read', 'wp-inbox'); ?></option>
                                        <option value="unread"><?php esc_html_e('Mark as Unread', 'wp-inbox'); ?></option>
                                        <option value="important"><?php esc_html_e('Mark as Important', 'wp-inbox'); ?></option>
                                        <option value="unimportant"><?php esc_html_e('Remove Important', 'wp-inbox'); ?></option>
                                        <option value="star"><?php esc_html_e('Mark as Starred', 'wp-inbox'); ?></option>
                                        <option value="unstar"><?php esc_html_e('Remove Starred', 'wp-inbox'); ?></option>
                                        <option value="delete"><?php esc_html_e('Delete', 'wp-inbox'); ?></option>
                                        <option value="" style='background-color:#ccc;font-weight:bold;'
                                                disabled><?php esc_html_e('Labels', 'wp-inbox'); ?></option>

                                        <?php foreach ($this->allLabelSelect as $label) { ?>
                                            <option value="<?php echo esc_attr($label['id']); ?>"><?php echo esc_attr($label['lb_name']); ?></option>
                                        <?php } ?>

                                    <?php } ?>
                                </select>
                                <input type="submit" id="doaction" class="button action"
                                       value="<?php esc_html_e('Apply', 'wp-inbox'); ?>">
                            </div>

                        </div>
                        <div class="pagination-email">
                            <?php $this->pagination('top'); ?>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <?php $this->inboxWebmail_showList(); ?>
                    </div>
                </form>
            <?php } else {
                $this->no_items();
            } ?>

        <?php } ?>

        <?php
    }

    /**
     * for show detail inbox data
     */
    private function inboxWebmail_showDetails()
    {
        $compose_url = get_admin_url() . "admin.php?page=inboxWebmail&action=compose&uid=" . $this->uid . "&details=" . $this->details;
        ?>

        <div class="body mb-2">
            <div class="d-flex justify-content-between flex-wrap-reverse">
                <h5 class="mt-0 mb-0 font-17"><?php echo esc_attr($this->inboxDetails['e_subject']); ?></h5>
                <div>
                    <small><?php echo date('F j, Y h:i A', strtotime(esc_attr($this->inboxDetails['created']))); ?></small>
                    <a href="<?php echo esc_url($compose_url . "&r=1"); ?>" class="p-2" title="Reply"><i
                                class="zmdi zmdi-mail-reply"></i></a>
                </div>
            </div>
        </div>
        <div class="body mb-2">
            <ul class="list-unstyled d-flex justify-content-md-start mb-0">
                <li class="ml-3">
                    <p class="mb-0"><span class="text-muted"><?php esc_html_e('From:', 'wp-inbox'); ?></span> <a
                                href="javascript:void(0);"><?php echo esc_attr($this->inboxDetails['e_from']); ?></a>
                    </p>
                    <p class="mb-0"><span
                                class="text-muted"><?php esc_html_e('To:', 'wp-inbox'); ?></span> <?php echo esc_attr($this->inboxDetails['e_to']); ?>
                    </p>
                    <?php if ($this->inboxDetails['e_cc'] != '') { ?>  <p class="mb-0"><span
                            class="text-muted"><?php esc_html_e('CC:', 'wp-inbox'); ?></span> <?php echo esc_attr($this->inboxDetails['e_cc']); ?>
                        </p><?php } ?>
                    <?php if ($this->inboxDetails['e_bcc'] != '') { ?> <p class="mb-0"><span
                            class="text-muted"><?php esc_html_e('BCC:', 'wp-inbox'); ?></span> <?php echo esc_attr($this->inboxDetails['e_bcc']); ?>
                        </p><?php } ?>
                </li>
            </ul>
        </div>
        <div class="body mb-2">
            <?php echo wp_kses_post($this->inboxDetails['e_message']); ?>

            <br>
            <br>
            <br>
            <?php if ($this->inboxDetails['is_attachment'] == 1) { ?>

                <?php if (!empty($this->attachments)) { ?>

                    <div class="file_folder">
                        <?php
                        foreach ($this->attachments as $files) {
                            $file_name = $files['file_name'];
                            $inbox_id = $files['inbox_id'];
                            $file_path = INBOXWEBMAIL_FILE_PATH . $inbox_id . '/' . $file_name;
                            if (file_exists($file_path)) {
                                $size = filesize($file_path);
                                $size = ceil($size / 1024);

                                $file_path_url = INBOXWEBMAIL_FILE_PATH_URL . $inbox_id . '/' . $file_name;

                                ?>
                                <a href="<?php echo esc_url($file_path_url); ?>"
                                   title="<?php esc_html_e('Download', 'wp-inbox'); ?> <?php echo esc_attr($file_name); ?>"
                                   download="<?php echo esc_attr($file_name); ?>">
                                    <div class="icon">
                                        <i class="zmdi zmdi-file text-primary"></i>
                                    </div>
                                    <div class="file-name">
                                        <p class="mb-0 text-muted"><?php echo esc_attr($file_name); ?></p>
                                        <small><?php esc_html_e('Size:', 'wp-inbox'); ?><?php echo esc_attr($size); ?><?php esc_html_e('KB', 'wp-inbox'); ?></small>
                                    </div>
                                </a>
                            <?php }
                        } ?>

                    </div>
                <?php } ?>

            <?php } ?>

        </div>
        <div class="body">
            <a href="<?php echo esc_url($compose_url . "&r=1"); ?>" class="p-2" title="Reply"><i
                        class="zmdi zmdi-mail-reply"></i> <?php esc_html_e('Reply', 'wp-inbox'); ?>
            </a> <?php esc_html_e('or', 'wp-inbox'); ?>
            <a href="<?php echo esc_url($compose_url . "&r=2"); ?>" class="p-2" title="Forward"><i
                        class="zmdi zmdi-mail-send"></i> <?php esc_html_e('Forward', 'wp-inbox'); ?></a>
        </div>
        <?php
    }

    /**
     * for show inbox list data
     */
    private function inboxWebmail_showList()
    {
        $removable_query_args = wp_removable_query_args();
        $current_url = set_url_scheme('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        $current_url = remove_query_arg($removable_query_args, $current_url);

        $lblData = array();
        foreach ($this->allLabels as $label) {
            $lblData[$label['id']] = array('name' => $label['lb_name'], 'color' => $label['lb_code']);
        }

        ?>

        <table class="table c_table inbox_table">

            <?php foreach ($this->inboxItems as $item) { ?>
                <tr>
                    <td class="chb">
                        <div class="checkbox simple">
                            <?php echo $this->column_cb($item); ?>

                        </div>
                    </td>
                    <td class="starred <?php if ($item['is_star'] == 1) {
                        echo 'active';
                    } ?>"><a href="javascript:void(0);" style="cursor:default;"><i
                                    class="zmdi zmdi-star"></i></a></td>
                    <td class="starred <?php if ($item['is_important'] == 1) {
                        echo 'active';
                    } ?>"><a href="javascript:void(0);" style="cursor:default;"><i
                                    class="zmdi zmdi-badge-check"></i></a></td>
                    <td class="u_name"><h5 class="font-15 mt-0 mb-0"><a class="link"
                                                                        href="<?php echo esc_url($current_url . '&details=' . $item['id']); ?>"><?php if ($this->sub == 'sent') {
                                    echo esc_attr($item['e_to']);
                                } else {
                                    echo esc_attr($item['e_from']);
                                } ?></a></h5></td>
                    <td class="max_ellipsis" style="<?php if ($item['is_read'] == 0) {
                        echo 'font-weight:bold';
                    } ?>">
                        <a class="link"
                           href="<?php echo esc_url($current_url . '&details=' . $item['id']); ?>">

                            <?php if ($item['is_label'] > 0) {
                                $lData = $lblData[$item['is_label']];
                                ?>
                                <span style="background-color:<?php echo esc_attr($lData['color']); ?>"
                                      class="badge badge-info mr-2"><?php echo esc_attr($lData['name']); ?></span>
                            <?php } ?>

                            <?php echo esc_attr($item['e_subject']); ?> -
                            &nbsp;<?php echo esc_attr(strip_tags($item['e_message'])); ?>
                        </a>
                    </td>
                    <td class="clip"><?php if ($item['is_attachment'] == 1) { ?>
                            <i class="zmdi zmdi-attachment-alt"></i>
                        <?php } ?></td>
                    <td class="time"
                        title="<?php echo date('F j, Y h:i A', strtotime($item['created'])); ?>">

                        <?php
                        if (date("d") == date('d', strtotime($item['created']))) {
                            echo date('h:i A', strtotime($item['created']));
                        } elseif (date("Y") == date('Y', strtotime($item['created']))) {
                            echo date('M d', strtotime($item['created']));
                        } else {
                            echo date('d M Y', strtotime($item['created']));
                        }

                        ?>

                    </td>
                </tr>
            <?php } ?>


        </table>
        <?php
    }

}