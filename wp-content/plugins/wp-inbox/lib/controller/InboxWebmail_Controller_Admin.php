<?php

/**
 * Class InboxWebmail_Controller_Admin
 */
class InboxWebmail_Controller_Admin
{

    /**
     * InboxWebmail_Controller_Admin constructor.
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'inboxWebmail_register_page'));
        add_filter('set-screen-option', array($this, 'inboxWebmail_setScreenOption'), 10, 3);
    }

    /**
     * used for set screen options
     * @param $status
     * @param $option
     * @param $value
     * @return mixed
     */
    public function inboxWebmail_setScreenOption($status, $option, $value)
    {
        if (in_array($option, array('inbox_webmail_account_overview_per_page', 'inbox_webmail_inbox_overview_per_page'))) {
            return $value;
        }

        return $status;
    }

    /**
     * used for localize js file
     */
    private function inboxWebmail_localizeScript()
    {
        $translation_array = array(
            'delete_msg' => esc_html__('Do you really want to delete the data?', 'wp-inbox')
        );

        wp_localize_script('inboxWebmail_admin_javascript', 'inboxWebmailLocalize', $translation_array);
    }

    /**
     * load js file with uses of enqueue_script
     */
    public function inboxWebmail_enqueueScript()
    {
        wp_enqueue_script(
            'inboxWebmail_admin_javascript',
            plugins_url('js/inboxWebmail_admin' . (INBOXWEBMAIL_DEV ? '' : '.min') . '.js', INBOXWEBMAIL_FILE),
            array(),
            INBOXWEBMAIL_VERSION
        );

        $this->inboxWebmail_localizeScript();
    }

    /**
     * used for register page i.e lefty side links
     */
    public function inboxWebmail_register_page()
    {
        $pages = array();

        $m = new InboxWebmail_Model_AccountMapper();
        $id = 1;
        $result = $m->inboxWebmail_fetch($id);

        $pages[] = add_menu_page(
            esc_html__('INBOX', 'wp-inbox'),
            esc_html__('INBOX', 'wp-inbox'),
            'read',
            'inboxWebmail',
            array($this, 'inboxWebmail_route'),
            'dashicons-email-alt', 25);

        $pages[] = add_submenu_page('inboxWebmail', esc_html__('Settings', 'wp-inbox'), esc_html__('Settings', 'wp-inbox'), 'read', 'inboxWebmail');

            if ($result['email'] != '') {
                $pages[] = add_submenu_page(
                    'inboxWebmail',
                    $result['email'],
                    $result['email'],
                    'read',
                    'inboxWebmail&action=inbox&uid=' . $id,
                    array($this, 'inboxWebmail_route'));
            }


        foreach ($pages as $p) {
            add_action('admin_print_scripts-' . $p, array($this, 'inboxWebmail_enqueueScript'));
            add_action('load-' . $p, array($this, 'inboxWebmail_routeLoadAction'));
        }
    }

    /**
     * load actions
     */
    public function inboxWebmail_routeLoadAction()
    {
        $screen = get_current_screen();

        if (!empty($screen)) {
            $name = strtolower($screen->id);
            set_current_screen($name);
            $screen = get_current_screen();
        }

        $this->inboxWebmail_route(true);
    }

    /**
     * route page
     * @param bool $routeAction
     */
    public function inboxWebmail_route($routeAction = false)
    {
        $c = new InboxWebmail_Controller_Account();

        if ($c !== null) {
            if ($routeAction) {
                if (method_exists($c, 'inboxWebmail_routeAction')) {
                    $c->inboxWebmail_routeAction();
                }
            } else {
                $c->inboxWebmail_route();
            }
        }

    }
}