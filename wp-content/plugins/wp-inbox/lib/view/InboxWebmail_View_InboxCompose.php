<?php

/**
 * @property array inboxItems
 * @property array allLabels
 * @property array allCounts
 * @property int inboxCount
 * @property int perPage
 * @property int uid
 * @property string sub
 */
class InboxWebmail_View_InboxCompose extends InboxWebmail_View_View
{

    /**
     * for show compose data
     */
    public function inboxWebmail_show()
    {

        $aj_url = get_admin_url() . "admin.php?page=inboxWebmail&action=refreshdata&uid=" . $this->uid;
        $current_url = get_admin_url() . "admin.php?page=inboxWebmail&action=inbox&uid=" . $this->uid;
        $compose_url = get_admin_url() . "admin.php?page=inboxWebmail&action=compose&uid=" . $this->uid;

        ?>


        <div class="wrap">
            <h2>
                <?php esc_html_e('Webmail Inbox overview', 'wp-inbox'); ?>
                (<?php echo $this->inboxWebmail_current_email; ?>)

            </h2>

            <section class="content">
                <div class="body_scroll">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <input type="hidden" name="inlbl_refresh_url" id="inlbl_refresh_url"
                                           value="<?php echo esc_url($aj_url); ?>">
                                    <div class="mobile-left">
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
                                        if ($this->r == 1) {
                                            $to = $this->inboxWebmail_parse_validate_email($this->inboxDetails['e_from']);
                                            $cc = $this->inboxWebmail_parse_validate_email($this->inboxDetails['e_cc']);
                                            $bcc = '';
                                        } else {

                                            $to = "";
                                            $cc = "";
                                            $bcc = "";
                                        }
                                        if ($this->r == 1 || $this->r == 2) {
                                            $subject = sanitize_text_field($this->inboxDetails['e_subject']);
                                        } else {
                                            $subject = "";
                                        }
                                        ?>
                                        <div class="card">
                                            <form name="ac_frm" id="ac_frm" method="post" action=""
                                                  enctype='multipart/form-data'>
                                                <input type="hidden" name="page" value="inboxWebmail">
                                                <input type="hidden" name="uid"
                                                       value="<?php echo esc_attr($this->uid); ?>">
                                                <div class="body mb-2">
                                                    <p><?php esc_html_e('Use comma , separated email for multiple email ids.', 'wp-inbox'); ?></p>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name='to'
                                                               placeholder="<?php esc_html_e('To', 'wp-inbox'); ?>"
                                                               value="<?php echo esc_attr($to); ?>"
                                                               required="required"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name='cc'
                                                               placeholder="<?php esc_html_e('CC', 'wp-inbox'); ?>"
                                                               value="<?php echo esc_attr($cc); ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name='bcc'
                                                               placeholder="<?php esc_html_e('BCC', 'wp-inbox'); ?>"
                                                               value="<?php echo esc_attr($bcc); ?>"/>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control" name='subject'
                                                               placeholder="<?php esc_html_e('Subject', 'wp-inbox'); ?>"
                                                               value="<?php echo esc_attr($subject); ?>"
                                                               required="required"/>
                                                    </div>
                                                </div>
                                                <div class="body">
                                                    <?php
                                                    if ($this->r == 1 || $this->r == 2) {
                                                        $meta_content = "<br><br><br><br>" . $this->resultAccount['e_sign'] . "<hr>";
                                                        $meta_content .= "<br>-----On " . date('F j, Y h:i A', strtotime($this->inboxDetails['created'])) . " " . esc_attr($this->inboxDetails['e_from']) . " wrote-----<br><br>";
                                                        $meta_content .= $this->inboxDetails['e_message'];
                                                    } else {
                                                        $meta_content = "";
                                                        $meta_content .= "<br><br><br><br><br><br>" . $this->resultAccount['e_sign'];
                                                    }


                                                    wp_editor(wp_kses_post($meta_content), 'meta_content_editor', array(
                                                        'wpautop' => true,
                                                        'media_buttons' => false,
                                                        'textarea_name' => 'meta_content',
                                                        'textarea_rows' => 10,
                                                        'teeny' => true
                                                    ));
                                                    ?>
                                                    <div class="form-group"
                                                         style="text-align: left; padding-top: 10px;">
                                                        <table id="inboxWebmail_table_file" width="50%">
                                                            <thead>
                                                            <tr class="text-center">
                                                                <th colspan="3"
                                                                    style="height:50px;"><?php esc_html_e('Upload File', 'wp-inbox'); ?></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <tr class="add_row">
                                                                <td id="no" width="5%">&nbsp;</td>
                                                                <td width="75%"><input style="border:0px;" class="file"
                                                                                       name='file[]' type='file'
                                                                                       multiple/></td>
                                                                <td width="20%">

                                                                </td>
                                                            </tr>


                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <td colspan="4" align="right">
                                                                    <button class="btn btn-success btn-sm"
                                                                            style="background-color:#0c7ce6"
                                                                            type="button" id="add_file" title=''/>
                                                                    <?php esc_html_e('Add more file', 'wp-inbox'); ?></button>
                                                                </td>
                                                            </tr>

                                                            </tfoot>
                                                        </table>
                                                    </div>


                                                    <div class="form-group"
                                                         style="text-align: right; padding-top: 10px;">
                                                        <button type="submit" class="button action" name="frm_sub"
                                                                id="frm_sub"><?php esc_html_e('SEND', 'wp-inbox'); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

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


}