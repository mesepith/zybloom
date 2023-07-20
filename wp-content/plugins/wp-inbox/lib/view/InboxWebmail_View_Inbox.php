<?php

/**
 * @property array inboxItems
 * @property array allLabels
 * @property array allCounts
 * @property array allLabelSelect
 * @property int inboxCount
 * @property int perPage
 * @property int uid
 * @property string sub
 */
class InboxWebmail_View_Inbox extends InboxWebmail_View_View
{

    /**
     * for show inbox data
     */
    public function inboxWebmail_show()
    {
        $aj_url = get_admin_url() . "admin.php?page=inboxWebmail&action=refreshdata&uid=" . $this->uid;
        $current_url = get_admin_url() . "admin.php?page=inboxWebmail&action=inbox&uid=" . $this->uid;
        $compose_url = get_admin_url() . "admin.php?page=inboxWebmail&action=compose&uid=" . $this->uid;

        ?>

        <div class="wrap">
            <h2>
                <?php esc_html_e('Webmail Inbox overview', 'wp-inbox'); ?> (<?php echo $this->inboxWebmail_current_email;?>)

            </h2>

            <section class="content">
                <div class="body_scroll">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <input type="hidden" name="inlbl_refresh_url" id="inlbl_refresh_url"
                                           value="<?php echo esc_url($aj_url); ?>">
                                    <div class="mobile-left" id="mobile_left">
                                        <a class="btn btn-info btn-icon toggle-email-nav collapsed"
                                           data-toggle="collapse" href="#email-nav" role="button" aria-expanded="false"
                                           aria-controls="email-nav">
                                            <span class="btn-label"><i class="zmdi zmdi-more"></i></span>
                                        </a>
                                    </div>
                                    <div class="inbox left" id="email-nav">
                                        <div class="mail-compose mb-4">
                                            <a style="padding-left: 20px;padding-right: 20px;"
                                               href="<?php echo esc_url($compose_url . "&r=0"); ?>"
                                               class="btn btn-danger"><?php esc_html_e('Compose', 'wp-inbox'); ?></a>
                                            <span style="float: right;"><button type="button" id="refresh_data"
                                                                                class="btn btn-outline-secondary btn-sm"
                                                                                title="Refresh Data"><i
                                                            class="zmdi zmdi-refresh"></i></button></span>
                                        </div>
                                        <div class="mail-side">
                                            <ul class="nav">
                                                <li class="<?php if ($this->sub == '' || $this->sub == 'inbox') {
                                                    echo 'active';
                                                } ?>"><a href="<?php echo esc_url($current_url . '&sub=inbox'); ?>"><i
                                                                class="zmdi zmdi-inbox"></i><?php esc_html_e('Inbox', 'wp-inbox'); ?>
                                                        <span class="badge badge-info-n"><?php echo esc_attr($this->allCounts['inbox']); ?></span></a>
                                                </li>
                                                <li class="<?php if ($this->sub == 'sent') {
                                                    echo 'active';
                                                } ?>"><a href="<?php echo esc_url($current_url . '&sub=sent'); ?>"><i
                                                                class="zmdi zmdi-mail-send"></i><?php esc_html_e('Sent', 'wp-inbox'); ?>
                                                        <span class="badge badge-info-n"><?php echo esc_attr($this->allCounts['sent']); ?></span></a>
                                                </li>
                                                <li class="<?php if ($this->sub == 'important') {
                                                    echo 'active';
                                                } ?>"><a href="<?php echo esc_url($current_url . '&sub=important'); ?>"><i
                                                                class="zmdi zmdi-badge-check"></i><?php esc_html_e('Important', 'wp-inbox'); ?>
                                                        <span class="badge badge-info-n"><?php echo esc_attr($this->allCounts['important']); ?></span>
                                                    </a></li>
                                                <li class="<?php if ($this->sub == 'star') {
                                                    echo 'active';
                                                } ?>"><a href="<?php echo esc_url($current_url . '&sub=star'); ?>"><i
                                                                class="zmdi zmdi-star"></i><?php esc_html_e('Starred', 'wp-inbox'); ?>
                                                        <span class="badge badge-info-n"><?php echo esc_attr($this->allCounts['star']); ?></span></a>
                                                </li>
                                                

                                                <li class="<?php if ($this->sub == 'trash') {
                                                    echo 'active';
                                                } ?>"><a href="<?php echo esc_url($current_url . '&sub=trash'); ?>"><i
                                                                class="zmdi zmdi-delete"></i><?php esc_html_e('Trash', 'wp-inbox'); ?>
                                                        <span class="badge badge-danger"><?php echo esc_attr($this->allCounts['trash']); ?></span></a>
                                                </li>
                                            </ul>
                                            <h3 class="label"><?php esc_html_e('Labels', 'wp-inbox'); ?></h3>
                                            <ul class="nav">
                                                <?php foreach ($this->allLabels as $label) { ?>
                                                    <li class="<?php if ($this->sub == $label['id']) {
                                                        echo 'active';
                                                    } ?>">
                                                        <a href="<?php echo esc_url($current_url . '&sub=' . $label['id']); ?>"><i
                                                                    class="zmdi zmdi-label text-dark"></i><?php echo esc_attr($label['lb_name']); ?>
                                                            <span style="background-color:<?php echo esc_attr($label['lb_code']); ?>"
                                                                  class="badge badge-info"><?php echo esc_attr($label['total']); ?></span></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="inbox right">

                                        <?php
                                        $overviewTable = $this->inboxWebmail_getTable();
                                        $overviewTable->prepare_items();
                                        $overviewTable->inboxWebmail_show();


                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <?php
    }

    /**
     * @return InboxWebmail_View_InboxData
     */
    protected function inboxWebmail_getTable()
    {
        if (!class_exists('WP_List_Table')) {
            require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
        }

        return new InboxWebmail_View_InboxData($this->inboxItems, $this->inboxCount, $this->perPage, $this->allLabels, $this->details, $this->inboxDetails, $this->uid, $this->attachments, $this->allLabelSelect, $this->sub);

    }

}