<?php

/**
 * Class InboxWebmail_View_View
 */
class InboxWebmail_View_View
{
    /**
     * used for show messages
     * @param $msg
     * @param string $type
     */
    public static function inboxWebmail_admin_notices($msg, $type = 'error')
    {
        if ($type === 'info') {
            echo '<div class="updated"><p><strong>' . $msg . '</strong></p></div>';
        } else {
            echo '<div class="error"><p><strong>' . $msg . '</strong></p></div>';
        }
    }

    /**
     * check and validate email
     * @param $string_email
     * @return mixed|string
     */
    protected function inboxWebmail_parse_validate_email($string_email)
    {
        if (empty($string_email)) {
            return '';
        }
        $pattern_email = '/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i';
        preg_match_all($pattern_email, $string_email, $matches);

        if (is_array($matches[0])) {
            return $matches[0][0];
        } else {
            return $matches[0];
        }
    }
}