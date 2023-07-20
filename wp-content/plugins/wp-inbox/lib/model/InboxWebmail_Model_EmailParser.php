<?php

/**
 * Class InboxWebmail_Model_EmailParser
 */
class InboxWebmail_Model_EmailParser extends InboxWebmail_Model_Mapper
{

    private $imap_stream = null;
    // variables for email data
    private $subject = null;
    private $from = null;
    private $to = null;
    private $reply_to = null;
    private $cc = null;
    private $bcc = null;
    private $header_info = '';
    private $created = '';
    private $charset = null;
    private $html_msg = null;
    private $plain_msg = null;
    private $attachments = array();
    private $uid = '';

    protected $_tableInbox;
    protected $_tableAttachment;

    /**
     * InboxWebmail_Model_EmailParser constructor.
     * @param $host
     * @param $login
     * @param $password
     * @param $uid
     * @throws Exception
     */
    public function __construct($host, $login, $password, $uid)
    {
        parent::__construct();

        $this->imap_stream = imap_open($host, $login, $password);
        $this->uid = $uid;


        $this->_tableInbox = $this->_prefix . "inbox";
        $this->_tableAttachment = $this->_prefix . "attachments";

        if ($this->imap_stream == false) {
            throw new Exception("can't connect: " . imap_last_error());
        }
    }

    /**
     * parse emails
     * @return int
     */
    public function inboxWebmail_parse()
    {

        require_once(ABSPATH . 'wp-admin/includes/file.php');
        global $wp_filesystem;
        if (!is_a($wp_filesystem, 'WP_Filesystem_Base')) {
            $creds = request_filesystem_credentials(site_url());
            wp_filesystem($creds);
        }

        $checkDate = $this->inboxWebmail_fetchLastDate($this->uid);

        if (!empty($checkDate)) {
            $date = date ( "d M Y H:i:s", strtotime($checkDate));
            $emails = imap_search($this->imap_stream, 'SINCE "' . $date . '"');
        } else {
            $emails = imap_search($this->imap_stream, 'ALL');
        }

        if ($emails != false) {
            $i = 0;
            arsort($emails); // it is mandatory to permanently move messages from inbox to processed/unprocessed folder.
            foreach ($emails as $email_number) {
                try {

                    $this->inboxWebmail_parse_msg($email_number);

                    $this->subject = sanitize_text_field($this->subject);
                    $this->to = sanitize_text_field($this->to);
                    $this->reply_to = sanitize_text_field($this->reply_to);
                    $this->cc = sanitize_text_field($this->cc);
                    $this->bcc = sanitize_text_field($this->bcc);
                    $this->header_info = sanitize_text_field($this->header_info);

                    $has_html_tags = ($this->html_msg == '') ? false : true;
                    $email_body = ($has_html_tags) ? $this->html_msg : $this->plain_msg;
                    $email_body = wp_kses_post($email_body);

                    $is_attachment = 0;
                    if (!empty($this->attachments)) {
                        $is_attachment = 1;
                    }

                    if ($this->from != '' && $this->subject != '' && $email_body != '') {
                        $set = array(
                            'account_id' => $this->uid,
                            'e_from' => $this->from,
                            'e_to' => $this->to,
                            'e_reply_to' => $this->reply_to,
                            'e_cc' => $this->cc,
                            'e_bcc' => $this->bcc,
                            'e_subject' => $this->subject,
                            'e_message' => $email_body,
                            'header_info' => $this->header_info,
                            'is_attachment' => $is_attachment,
                            'created' => $this->created
                        );


                        $result = $this->_wpdb->insert($this->_tableInbox,
                            $set,
                            array(
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
                                '%s'
                            ));

                        $inbox_id = $this->_wpdb->insert_id;

                        if (!empty($this->attachments) && $inbox_id > 0) {
                            $absolute_path = INBOXWEBMAIL_FILE_PATH . $inbox_id;
                            $wp_filesystem->mkdir($absolute_path, 0777);
                            $file_path = $absolute_path . '/index.php';
                            $wp_filesystem->put_contents($file_path, '');

                            foreach ($this->attachments as $attachment_arr) {
                                $documentType = strtolower($attachment_arr['extension']);
                                $file_name = sanitize_file_name($attachment_arr['file_name']);
                                $bytes = $attachment_arr['bytes'];

                                $allow_m_typesArr = get_allowed_mime_types();
                                $chk_fileType = wp_check_filetype($file_name);

                                if (in_array($chk_fileType['type'], $allow_m_typesArr)) {
                                    // download file
                                    $file_path = $absolute_path . '/' . $file_name;
                                    $wp_filesystem->put_contents($file_path, $bytes);

                                    if ($documentType == 'msword') {
                                        $documentType = 'doc';
                                    } elseif ($documentType == 'vnd.openxmlformats-officedocument.wordprocessingml.document') {
                                        $documentType = 'docx';
                                    } elseif ($documentType == 'vnd.ms-excel') {
                                        $documentType = 'xls';
                                    } elseif ($documentType == 'vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                                        $documentType = 'xlsx';
                                    } elseif ($documentType == 'vnd.ms-powerpoint') {
                                        $documentType = 'ppt';
                                    } elseif ($documentType == 'vnd.openxmlformats-officedocument.presentationml.presentation') {
                                        $documentType = 'pptx';
                                    }

                                    $set_a = array(
                                        'inbox_id' => $inbox_id,
                                        'file_name' => $file_name,
                                        'file_type' => $documentType,
                                        'file_bytes' => $file_path
                                    );
                                    $this->_wpdb->insert($this->_tableAttachment,
                                        $set_a,
                                        array(
                                            '%d',
                                            '%s',
                                            '%s',
                                            '%s'
                                        ));
                                }
                            }
                        }

                    }

                    continue;


                } catch (Exception $objExc) {
                    printf("%s <br/>", $objExc->getMessage());
                    exit;
                }
            }
            imap_expunge($this->imap_stream);
            return count($emails);
        } else {
            return 0;
        }

    }

    /**
     * parse each email message
     * @param $email_number
     */
    private function inboxWebmail_parse_msg($email_number)
    {

        $this->subject = null;
        $this->charset = null;
        $this->html_msg = null;
        $this->plain_msg = null;
        $this->attachments = array();

        $this->from = null;
        $this->to = null;
        $this->reply_to = null;
        $this->cc = null;
        $this->bcc = null;
        $this->header_info = '';

        $this->created = '';

        // HEADER
        $h = imap_header($this->imap_stream, $email_number);
        $this->subject = $h->subject;

        $this->from = $h->fromaddress;
        $this->to = $h->toaddress;
        $this->reply_to = $h->reply_toaddress;
        $this->cc = $h->ccaddress;
        $this->bcc = $h->bccaddress;

        $this->created = date("Y-m-d H:i:s", strtotime($h->date));

        $this->header_info = json_encode($h);

        // BODY
        $s = imap_fetchstructure($this->imap_stream, $email_number);
        if (!$s->parts)  // simple
            $this->inboxWebmail_parse_msg_part($email_number, $s, 0);  // pass 0 as part-number
        else {  // multipart: cycle through each part
            foreach ($s->parts as $partno0 => $p)
                $this->inboxWebmail_parse_msg_part($email_number, $p, $partno0 + 1);
        }
    }

    /**
     * parse message
     * @param $email_number
     * @param $p
     * @param $partno
     */
    private function inboxWebmail_parse_msg_part($email_number, $p, $partno)
    {

        // DECODE DATA
        $data = ($partno) ?
            imap_fetchbody($this->imap_stream, $email_number, $partno) : // multipart
            imap_body($this->imap_stream, $email_number);  // simple
        // Any part may be encoded, even plain text messages, so check everything.
        if ($p->encoding == 4)
            $data = quoted_printable_decode($data);
        elseif ($p->encoding == 3)
            $data = base64_decode($data);

        // PARAMETERS
        // get all parameters, like charset, filenames of attachments, etc.
        $params = array();
        if ($p->ifparameters)
            foreach ($p->parameters as $x)
                $params[strtolower($x->attribute)] = $x->value;
        if ($p->ifdparameters)
            foreach ($p->dparameters as $x)
                $params[strtolower($x->attribute)] = $x->value;

        // ATTACHMENT
        // Any part with a filename is an attachment,
        // so an attached text file (type 0) is not mistaken as the message.
        if (isset($params['filename']) || isset($params['name'])) {
            if ($p->type) {
                $extension = $p->subtype;
            }
            // filename may be given as 'Filename' or 'Name' or both
            $filename = (isset($params['filename'])) ? $params['filename'] : $params['name'];
            // filename may be encoded, so see imap_mime_header_decode()
            $this->attachments[] = array('file_name' => $filename, 'extension' => $extension, 'bytes' => $data);  // this is a problem if two files have same name
        }

        // TEXT
        if ($p->type == 0 && $data) {
            // Messages may be split in different parts because of inline attachments,
            // so append parts together with blank row.
            if (strtolower($p->subtype) == 'plain')
                $this->plain_msg .= trim($data) . "\n\n";
            else
                $this->html_msg .= $data . "<br><br>";
            $this->charset = $params['charset'];  // assume all parts are same charset
        }

        // EMBEDDED MESSAGE
        // Many bounce notifications embed the original message as type 2,
        // but AOL uses type 1 (multipart), which is not handled here.
        // There are no PHP functions to parse embedded messages,
        // so this just appends the raw source to the main message.
        elseif ($p->type == 2 && $data) {
            $this->plain_msg .= $data . "\n\n";
        }

        // SUBPART RECURSION
        if (isset($p->parts) && $p->parts) {
            foreach ($p->parts as $partno0 => $p2)
                $this->inboxWebmail_parse_msg_part($email_number, $p2, $partno . '.' . ($partno0 + 1));  // 1.2, 1.2.1, etc.
        }
    }

    /**
     * for check and validate email
     * @param $string
     * @return mixed
     */
    private function inboxWebmail_parse_validate_email($string)
    {
        $pattern = '/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i';
        preg_match_all($pattern, $string, $matches);
        return $matches[0];
    }

    /**
     * destruct
     */
    public function __destruct()
    {
        imap_close($this->imap_stream);
    }
}

?>
