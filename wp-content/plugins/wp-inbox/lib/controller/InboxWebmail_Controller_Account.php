<?php

/**
 * Class InboxWebmail_Controller_Account
 */
class InboxWebmail_Controller_Account
{
    /**
     * main route for actions
     */
    public function inboxWebmail_route()
    {
        $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : 'show';

        switch ($action) {
            case 'show':
                $this->inboxWebmail_showAction();
                break;
            case 'inbox':
                $this->inboxWebmail_showActionInbox();
                break;
            case 'refreshdata':
                $this->inboxWebmail_showActionRefresh();
                break;
            case 'compose':
                $this->inboxWebmail_showActionCompose();
                break;
            default:
                $this->inboxWebmail_showAction();
                break;
        }
    }

    /**
     * route actions for extra loading
     */
    public function inboxWebmail_routeAction()
    {
        $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : 'show';

        switch ($action) {
            case 'inbox':
                $this->inboxWebmail_showActionHookInbox();
                break;
            default:
                $this->inboxWebmail_showActionHook();
                break;
        }
    }

    /**
     * for set screen options on account page
     */
    private function inboxWebmail_showActionHook()
    {
        if (!empty(esc_url($_REQUEST['_wp_http_referer']))) {
            wp_redirect(remove_query_arg(array('_wp_http_referer', '_wpnonce'), wp_unslash($_SERVER['REQUEST_URI'])));
            exit;
        }

    }

    /**
     * for set screen options on inbox page
     */
    private function inboxWebmail_showActionHookInbox()
    {
        if (!empty(esc_url($_REQUEST['_wp_http_referer']))) {
            wp_redirect(remove_query_arg(array('_wp_http_referer', '_wpnonce'), wp_unslash($_SERVER['REQUEST_URI'])));
            exit;
        }

        if (!class_exists('WP_List_Table')) {
            require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
        }

        add_screen_option('per_page', array(
            'label' => esc_html__('Inbox', 'wp-inbox'),
            'default' => 20,
            'option' => 'inbox_webmail_inbox_overview_per_page'
        ));
    }

    /**
     * used for get data and save in db
     */
    private function inboxWebmail_showActionRefresh()
    {
        $uid = 1;
        $m = new InboxWebmail_Model_AccountMapper();
        $result = $m->inboxWebmail_fetch($uid);

        if ($result['active'] == 1) {
            $host = $result['domain'];
            $port = '993';
            $user = $result['email'];
            $pass = $result['password'];

            $host_string = "{" . $host . ":" . $port . "/imap/ssl/novalidate-cert}INBOX";
            $parser = new InboxWebmail_Model_EmailParser($host_string, $user, $pass, $uid);
            $total = $parser->inboxWebmail_parse();

            InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('Data parse successfully. Total new email =' . $total, 'wp-inbox'), 'info');
        } else {
            InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('Account not activated.', 'wp-inbox'), 'error');
        }
        die('done');

    }

    /**
     * manage send email compose page
     */
    private function inboxWebmail_showActionCompose()
    {
        $uid = 1;
        $r = 0;
        if (isset($_GET['r'])) {
            $r = sanitize_key($_GET['r']);
        }
        $sub = '';
        if (isset($_GET['sub'])) {
            $sub = sanitize_key($_GET['sub']);
        }

        $view = new InboxWebmail_View_InboxCompose();
        $m = new InboxWebmail_Model_InboxMapper();
        $m2 = new InboxWebmail_Model_AccountMapper();
        $resultAccount = $m2->inboxWebmail_fetch($uid);
        $view->resultAccount = $resultAccount;

        $details_uid = 0;
        if (isset($_GET['details']) && is_numeric($_GET['details'])) {
            $details_uid = absint($_GET['details']);
            $inboxDetails = $m->inboxWebmail_fetch($uid, $details_uid);
            $view->inboxDetails = $inboxDetails;
            $view->details = $details_uid;
            $view->attachments = array();

        } else {
            $view->attachments = array();
            $view->inboxDetails = array();
            $view->details = '';
        }

        $this->inboxWebmail_showActionComposeSubmit($resultAccount, $uid, $details_uid);

        $result = array();
        $filter = 'and is_deleted =0 and is_sent =0 and is_draft =0';
        $count = $m->inboxWebmail_fetchCount($uid, $filter);
        $allLabels = $m->inboxWebmail_fetchAllLabels($uid);

        $allCounts = $m->inboxWebmail_fetchAllCounts($uid);

        $macc = new InboxWebmail_Model_AccountMapper();
        $view->inboxWebmail_current_email = $macc->inboxWebmail_fetchEmail($uid);
        $view->sub = $sub;
        $view->uid = $uid;
        $view->r = $r;
        $view->inboxItems = $result;
        $view->inboxCount = $count;
        $view->perPage = 20;
        $view->allLabels = $allLabels;
        $view->allCounts = $allCounts;


        $view->inboxWebmail_show();
    }

    /**
     * after submit compose email page, here send email and save data in db
     * @param $resultAccount
     * @param $uid
     * @param $details_uid
     */
    private function inboxWebmail_showActionComposeSubmit($resultAccount, $uid, $details_uid)
    {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        global $wp_filesystem;
        if (!is_a($wp_filesystem, 'WP_Filesystem_Base')) {
            $creds = request_filesystem_credentials(site_url());
            wp_filesystem($creds);
        }

        if (isset($_POST['frm_sub'])) {
            $m = new InboxWebmail_Model_InboxMapper();
            // save data and send email
            $to = sanitize_text_field($_POST['to']);
            $cc = sanitize_text_field($_POST['cc']);
            $bcc = sanitize_text_field($_POST['bcc']);

            $to = $this->inboxWebmail_check_validate_email($to);
            $cc = $this->inboxWebmail_check_validate_email($cc);
            $bcc = $this->inboxWebmail_check_validate_email($bcc);

            $subject = sanitize_text_field($_POST['subject']);
            $message = $body = nl2br(wp_kses_post($_POST['meta_content']));
            $sender = sanitize_email($resultAccount['email']);
            $sender_name = sanitize_text_field($resultAccount['folder_name']);

            if ($to == '' || $subject == '' || $message == '') {
                InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('To email and Subject is required field.', 'wp-inbox'), 'error');
            } else {
                $headers = array();
                $attachments = array();

                $headers[] = 'Content-Type: text/html; charset=UTF-8';
                $headers[] = "From: $sender_name <$sender>";

                if ($cc != '') {
                    $headers[] = 'Cc:' . $cc;
                }
                if ($bcc != '') {
                    $headers[] = 'Bcc:' . $bcc;
                }

                $is_attachment = 0;
                if (count($_FILES["file"]['name']) > 0) {
                    $is_attachment = 1;
                }
                $set = array(
                    'account_id' => $uid,
                    'parent_id' => $details_uid,
                    'e_from' => $resultAccount['email'],
                    'e_to' => $to,
                    'e_reply_to' => '',
                    'e_cc' => $cc,
                    'e_bcc' => $bcc,
                    'e_subject' => $subject,
                    'e_message' => $body,
                    'header_info' => json_encode($headers),
                    'is_attachment' => $is_attachment,
                    'created' => date("Y-m-d H:i:s"),
                    'is_sent' => 1
                );
                $inbox_id = $m->inboxWebmail_saveData($set);
                if ($inbox_id > 0) {

                    // save attachments
                    if (count($_FILES["file"]['name']) > 0) {

                        $absolute_path = INBOXWEBMAIL_FILE_PATH . $inbox_id;

                        $wp_filesystem->mkdir($absolute_path, 0777);
                        $file_path = $absolute_path . '/index.php';

                        $wp_filesystem->put_contents($file_path, '');

                        for ($j = 0; $j < count($_FILES["file"]['name']); $j++) {
                            if ($_FILES["file"]["name"][$j] != '') {
                                $file_name = sanitize_file_name($_FILES["file"]["name"][$j]);
                                $file_path = $absolute_path . '/' . $file_name;
                                $ext = pathinfo($file_path, PATHINFO_EXTENSION);
                                $documentType = strtolower($ext);

                                $size_of_uploaded_file = $_FILES["file"]["size"][$j] / 1024; //size in KBs
                                $max_allowed_file_size = 2000; // size in KB

                                $allow_m_typesArr = get_allowed_mime_types();
                                $chk_fileType = wp_check_filetype($file_name);

                                if (in_array($chk_fileType['type'], $allow_m_typesArr) && ($size_of_uploaded_file < $max_allowed_file_size)) {
                                    if (move_uploaded_file($_FILES["file"]["tmp_name"][$j], $file_path)) {

                                        $set_a = array(
                                            'inbox_id' => $inbox_id,
                                            'file_name' => $file_name,
                                            'file_type' => $documentType,
                                            'file_bytes' => $file_path
                                        );
                                        $m->inboxWebmail_saveDataAttachments($set_a);

                                        $attachments[] = $file_path;
                                    }
                                }
                            }
                        }
                    }

                    wp_mail($to, $subject, $message, $headers, $attachments);
                    InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('Email send successfully.', 'wp-inbox'), 'info');
                    $url = get_admin_url() . "admin.php?page=inboxWebmail&action=inbox&uid=" . $uid . "&m=1";
                    wp_redirect($url);
                } else {
                    InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('Some Problem occurred.', 'wp-inbox'), 'error');
                }
            }
        }
    }

    /**
     * check and validate email ids
     * @param $email_txt
     * @return bool|string
     */
    private function inboxWebmail_check_validate_email($email_txt)
    {
        $result_email = '';
        if (!empty($email_txt)) {
            $email_Arr = explode(",", $email_txt);
            foreach ($email_Arr as $email) {
                if (is_email(trim($email))) {
                    $result_email .= sanitize_email(trim($email));
                    $result_email .= ',';
                }
            }

            if (!empty($result_email)) {
                $result_email = substr($result_email, 0, -1);
            }
        }
        return $result_email;
    }

    /**
     * get current page nummber
     * @return mixed
     */
    private function inboxWebmail_getCurrentPage()
    {
        $pagenum = isset($_REQUEST['paged']) ? absint($_REQUEST['paged']) : 0;

        return max(1, $pagenum);
    }

    /**
     * show/manage account page
     */
    private function inboxWebmail_showAction()
    {
        if (!current_user_can('list_users')) {
            wp_die(esc_html__('You do not have sufficient permissions to access this page.'));
        }

        $uid = 1;
        $view = new InboxWebmail_View_AccountOverall();
        $m = new InboxWebmail_Model_AccountMapper();
        if (isset($_POST['subaction']) && sanitize_key($_POST['subaction']) == 'update') {

            if (function_exists('imap_open')) {
                if (is_email($_POST['email'])) {
                    $email = sanitize_email($_POST['email']);
                    $password = sanitize_text_field($_POST['password']);
                    $emailArr = explode("@", $email);
                    $domain = $emailArr[1];
                    $port = '993';
                    $host_string = "{" . $domain . ":" . $port . "/imap/ssl/novalidate-cert}INBOX";

                    $mbox = imap_open($host_string, $email, $password);
                    if ($mbox) {
                        $folder_name = sanitize_text_field($_POST['folder_name']);
                        $e_sign = sanitize_textarea_field($_POST['e_sign']);

                        if (isset($_POST['active']) && $_POST['active'] == 'on') {
                            $active = 1;
                        } else {
                            $active = 0;
                        }
                        if ($uid > 0) {
                            $set = array(
                                'email' => $email,
                                'password' => $password,
                                'folder_name' => $folder_name,
                                'e_sign' => $e_sign,
                                'domain' => $domain,
                                'active' => $active
                            );
                        } else {
                            $set = array(
                                'email' => $email,
                                'password' => $password,
                                'folder_name' => $folder_name,
                                'e_sign' => $e_sign,
                                'domain' => $domain,
                                'active' => $active,
                                'created' => date("Y-m-d H:i:s")
                            );
                        }
                        $uid = $m->inboxWebmail_save($uid, $set);
                        InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('Data saved successfully.', 'wp-inbox'), 'info');
                        imap_close($mbox);
                    } else {
                        InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('Entered Email/password is not correct.', 'wp-inbox'), 'error');
                    }
                } else {
                    InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('Entered Email is not correct.', 'wp-inbox'), 'error');
                }
            } else {
                InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('IMAP function not enabled.', 'wp-inbox'), 'error');
            }
        }

        $result = $m->inboxWebmail_fetch($uid);
        $view->uid = $uid;
        $view->result = $result;
        $view->inboxWebmail_show();
    }

    /**
     * show/manage inbox page
     */
    public function inboxWebmail_showActionInbox()
    {
        $uid = 1;
        if (isset($_GET['m']) && absint($_GET['m']) == 1) {
            InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('Email send successfully.', 'wp-inbox'), 'info');
        }
        $view = new InboxWebmail_View_Inbox();

        $m = new InboxWebmail_Model_InboxMapper();


        $per_page = (int)get_user_option('inbox_webmail_inbox_overview_per_page');
        if (empty($per_page) || $per_page < 1) {
            $per_page = 20;
        }

        $sub = '';
        $filter = 'and is_deleted =0 and is_sent =0 and is_draft =0';
        if (isset($_GET['sub'])) {
            $sub = sanitize_key($_GET['sub']);
            switch ($sub) {
                case 'inbox':
                    $filter = 'and is_deleted =0 and is_sent =0 and is_draft =0';
                    break;
                case 'sent':
                    $filter = 'and is_sent =1 and is_deleted =0';
                    break;
                case 'important':
                    $filter = 'and is_important =1 and is_deleted =0';
                    break;
                case 'star':
                    $filter = 'and is_star =1 and is_deleted =0';
                    break;
                case 'draft':
                    $filter = 'and is_draft =1 and is_deleted =0';
                    break;
                case 'trash':
                    $filter = 'and is_deleted =1';
                    break;
                default:
                    $filter = "and is_label ='$sub'";
                    break;
            }
        }


        if (isset($_POST['bulk_action']) && sanitize_key($_POST['bulk_action'] != '')) {
            $bulk_action = sanitize_key($_POST['bulk_action']);
            $idArr = $_POST['inbox'];
            if (!empty($idArr) && is_array($idArr)) {
                foreach ($idArr as $dt_id) {
                    $dt_id = absint($dt_id);
                    switch ($bulk_action) {
                        case 'read':
                            $m->inboxWebmail_updateRead($dt_id, 1);
                            break;
                        case 'unread':
                            $m->inboxWebmail_updateRead($dt_id, 0);
                            break;
                        case 'important':
                            $m->inboxWebmail_updateImportant($dt_id, 1);
                            break;
                        case 'unimportant':
                            $m->inboxWebmail_updateImportant($dt_id, 0);
                            break;
                        case 'star':
                            $m->inboxWebmail_updateStar($dt_id, 1);
                            break;
                        case 'unstar':
                            $m->inboxWebmail_updateStar($dt_id, 0);
                            break;
                        case 'moveinbox':
                            $m->inboxWebmail_updateDeleted($dt_id, 0);
                            break;
                        case 'delete':
                            if ($sub == 'trash') {
                                $m->inboxWebmail_delete($dt_id);
                            } else {
                                $m->inboxWebmail_updateDeleted($dt_id, 1);
                            }
                            break;
                        case 1:
                        case 2:
                        case 3:
                            $m->inboxWebmail_updateLabel($dt_id, $bulk_action);
                            break;
                        default:
                            break;
                    }
                }

                InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('Bulk Action performed.', 'wp-inbox'), 'info');
            } else {
                InboxWebmail_View_View::inboxWebmail_admin_notices(esc_html__('No any email seleted.', 'wp-inbox'), 'error');
            }

        }
        $current_page = $this->inboxWebmail_getCurrentPage();

        $offset = ($current_page - 1) * $per_page;
        $limit = $per_page;

        $result = $m->inboxWebmail_fetchAll($uid, $filter, $limit, $offset);
        $count = $m->inboxWebmail_fetchCount($uid, $filter);
        $allLabels = $m->inboxWebmail_fetchAllLabels($uid);
        $allLabelSelect = $m->inboxWebmail_fetchLabelSelect($uid);

        $allCounts = $m->inboxWebmail_fetchAllCounts($uid);


        if (isset($_GET['details']) && is_numeric($_GET['details'])) {
            $details_uid = absint($_GET['details']);

            $inboxDetails = $m->inboxWebmail_fetch($uid, $details_uid);
            $view->inboxDetails = $inboxDetails;
            $view->details = $details_uid;

            $m->inboxWebmail_updateRead($details_uid, 1);

            $view->attachments = $m->inboxWebmail_fetchAttacments($details_uid);

        } else {
            $view->inboxDetails = '';
            $view->details = 0;
            $view->attachments = array();
        }

        $macc = new InboxWebmail_Model_AccountMapper();
        $view->inboxWebmail_current_email = $macc->inboxWebmail_fetchEmail($uid);

        $view->sub = $sub;
        $view->uid = $uid;
        $view->inboxItems = $result;
        $view->inboxCount = $count;
        $view->perPage = $per_page;
        $view->allLabels = $allLabels;
        $view->allCounts = $allCounts;
        $view->allLabelSelect = $allLabelSelect;

        $view->inboxWebmail_show();

    }

}