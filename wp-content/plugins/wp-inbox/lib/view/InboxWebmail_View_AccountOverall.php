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
class InboxWebmail_View_AccountOverall extends InboxWebmail_View_View
{

    /**
     * for show add/edit page
     */
    public function inboxWebmail_show()
    {
        ?>


        <div class="wrap">
            <h2>
                <?php esc_html_e('Inbox Account overview', 'wp-inbox'); ?>

            </h2>


            <section class="content">
                <div class="body_scroll">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <div class="mobile-left">
                                        <a class="btn btn-info btn-icon toggle-email-nav collapsed"
                                           data-toggle="collapse" href="#email-nav" role="button" aria-expanded="false"
                                           aria-controls="email-nav">
                                            <span class="btn-label"><i class="zmdi zmdi-more"></i></span>
                                        </a>
                                    </div>

                                    <div class="inbox left" id="email-nav">
                                        <?php echo $this->inboxWebmail_infoText(); ?>

                                    </div>

                                    <div class="inbox right">
                                        <div class="card">

                                            <form name="ac_frm" id="ac_frm" method="post" action="" autocomplete="off">

                                                <input type="hidden" name="page" value="inboxWebmail">
                                                <input type="hidden" name="uid"
                                                       value="<?php echo esc_attr($this->uid); ?>">
                                                <input type="hidden" name="subaction" value="update">
                                                <h3><?php esc_html_e('Account Details', 'wp-inbox'); ?></h3>
                                                <div class="body mb-2">
                                                    <div class="form-group">
                                                        <label style="width: 40%;float: left;"><?php esc_html_e('Name:', 'wp-inbox'); ?> </label>
                                                        <input style="width: 60%;" type="text" class="form-control"
                                                               placeholder="<?php esc_html_e('Name', 'wp-inbox'); ?>"
                                                               name="folder_name" id="folder_name"
                                                               value="<?php echo esc_attr($this->result['folder_name']); ?>"
                                                               required="required"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="width: 40%;float: left;"><?php esc_html_e('Email ID:', 'wp-inbox'); ?> </label>
                                                        <input style="width: 60%;" type="text" class="form-control"
                                                               placeholder="<?php esc_html_e('Email ID:', 'wp-inbox'); ?>"
                                                               name="email" id="email"
                                                               value="<?php echo esc_attr($this->result['email']); ?>"
                                                               required="required" autocomplete="off"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="width: 40%;float: left;"><?php esc_html_e('Password:', 'wp-inbox'); ?> </label>
                                                        <input style="width: 60%;" type="password" class="form-control"
                                                               placeholder="<?php esc_html_e('Password:', 'wp-inbox'); ?>"
                                                               name="password" id="password" value=""
                                                               required="required" autocomplete="off"/>
                                                    </div>


                                                    <div class="form-group">
                                                        <label style="width: 40%;float: left;"><?php esc_html_e('Active:', 'wp-inbox'); ?> </label>
                                                        <div class="checkbox simple d-inline-block mr-3">
                                                            <input id="active" name="active"
                                                                   type="checkbox" <?php if ($this->result['active'] == 1) {
                                                                echo 'checked="checked"';
                                                            } ?>>
                                                            <label for="active"></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="show_fold">
                                                        <label style="width: 40%;float: left;"><?php esc_html_e('Email Signature:', 'wp-inbox'); ?> </label>
                                                        <textarea style="width: 60%;" name="e_sign" id="e_sign"
                                                                  class="form-control" rows="6"
                                                                  placeholder="<?php esc_html_e('Email Signature:', 'wp-inbox'); ?>"><?php echo esc_textarea($this->result['e_sign']); ?> </textarea>
                                                    </div>
                                                    <div class="form-group" style="text-align: center;">
                                                        <input type="submit" class="button action" id="frm_sub"
                                                               name="frm_sub"
                                                               value="<?php esc_html_e('Save Data', 'wp-inbox'); ?>"/>
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

    /**
     * for show left side info text
     */
    private function inboxWebmail_infoText()
    {

        ?>
        <div class="mail-side">
            <h3><?php esc_html_e('Steps to Setup Inbox', 'wp-inbox'); ?></h3>

            <p><b>1)</b> <?php esc_html_e('Enter Name of Sender', 'wp-inbox'); ?></p>
            <p><b>2)</b> <?php esc_html_e('Enter Email ID', 'wp-inbox'); ?></p>
            <p><b>3)</b> <?php esc_html_e('Enter Email Password', 'wp-inbox'); ?></p>
            <p><b>4)</b> <?php esc_html_e('Click Active', 'wp-inbox'); ?></p>
            <p><b>5)</b> <?php esc_html_e('Enter Signature', 'wp-inbox'); ?></p>
            <p><b>6)</b> <?php esc_html_e('Click Save Data', 'wp-inbox'); ?></p>
            <p>
                 <?php esc_html_e('Note : Please read the Documentation for complete information', 'wp-inbox'); ?>
            </p>
        </div>
        <?php
    }

}