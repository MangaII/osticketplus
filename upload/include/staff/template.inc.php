<?php
if(!defined('OSTADMININC') || !$thisuser->isadmin() || !is_object($template)) die(_('Access Denied'));
$tpl=($errors && $_POST)?Format::input($_POST):Format::htmlchars($template->getInfo());
?>
<div class="msg"><?= _('Email Templates') ?></div>
<table width="100%" border="0" cellspacing=0 cellpadding=0>
  <form action="admin.php?t=templates" method="post">
    <input type="hidden" name="t" value="templates">
    <input type="hidden" name="do" value="update">
    <input type="hidden" name="id" value="<?=$template->getId()?>">
    <tr><td>
        <table width="100%" border="0" cellspacing=0 cellpadding=2 class="tform tpl">
            <tr class="header"><td colspan=2 ><?= _('Template Info') ?></td></tr>
            <tr class="subheader"><td colspan=2><b><?= _('Last updated on') ?> <?=Format::db_daydatetime($template->getUpdateDate())?></b></td></tr>
            <tr>
                <th><?= _('Name') ?></th>
                <td>
                    <input type="text" size="45" name="name" value="<?=$tpl['name']?>">
                            &nbsp;<font class="error">*&nbsp;<?=$errors['name']?></font></td>
            </tr>
            <tr>
                <th><?= _('Internal notes:') ?></th>
                <td><i><?= _('Administrative notes') ?></i>&nbsp;<font class="error">&nbsp;<?=$errors['notes']?></font>
                    <textarea rows="5" cols="75" name="notes"><?=$tpl['notes']?></textarea>
                        &nbsp;<font class="error">&nbsp;<?=$errors['notes']?></font></td>
            </tr>
        </table>
            <div class="msg"><?= _('User') ?></div>
        <table width="100%" border="0" cellspacing=0 cellpadding=2 class="tform tpl">
            <tr class="header"><td colspan=2 ><?= _('New Ticket Autoresponse') ?></td></tr>
            <tr class="subheader"><td colspan=2 >
                    <?= _('Autoresponse sent to user on new ticket if enabled.') ?>
                    <?= _('Meant to give the user the ticket ID which can be used to check the status online.') ?></td>
                </tr>
            <tr>
                <th><?= _('Subject') ?></th>
                <td>
                    <input type="text" size="65" name="ticket_autoresp_subj" value="<?=$tpl['ticket_autoresp_subj']?>">
                            &nbsp;<font class="error">&nbsp;<?=$errors['ticket_autoresp_subj']?></font></td>
            </tr>
            <tr>
                <th><?= _('Message Body:') ?></th>
                <td><textarea rows="7" cols="75" name="ticket_autoresp_body"><?=$tpl['ticket_autoresp_body']?></textarea>
                        &nbsp;<font class="error">&nbsp;<?=$errors['ticket_autoresp_body']?></font></td>
            </tr>
            <tr class="header"><td colspan=2 ><?= _('New Message Autoresponse') ?></td></tr>
            <tr class="subheader"><td colspan=2 > 
                    <?= _('Confirmation sent to user when a new message is appended to an existing ticket. (email and web replies)') ?></td>
            </tr>
            <tr>
                <th><?= _('Subject') ?></th>
                <td>
                    <input type="text" size="65" name="message_autoresp_subj" value="<?=$tpl['message_autoresp_subj']?>">
                            &nbsp;<font class="error">&nbsp;<?=$errors['message_autoresp_subj']?></font></td>
            </tr>
            <tr>
                <th><?= _('Message Body:') ?></th>
                <td><textarea rows="7" cols="75" name="message_autoresp_body"><?=$tpl['message_autoresp_body']?></textarea>
                            &nbsp;<font class="error">&nbsp;<?=$errors['message_autoresp_body']?></font></td>
            </tr>
            <tr class="header"><td colspan=2 ><?= _('New Ticket Notice') ?></td></tr>
            <tr class="subheader"><td colspan=2 >
                    <?= _('Notice sent to user, if enabled, on new ticket <b>created by staff</b> on their behalf.') ?></td>
                </tr>
            <tr>
                <th><?= _('Subject') ?></th>
                <td>
                    <input type="text" size="65" name="ticket_notice_subj" value="<?=$tpl['ticket_notice_subj']?>">
                            &nbsp;<font class="error">&nbsp;<?=$errors['ticket_notice_subj']?></font></td>
            </tr>
            <tr>
                <th><?= _('Message Body:') ?></th>
                <td><textarea rows="7" cols="75" name="ticket_notice_body"><?=$tpl['ticket_notice_body']?></textarea>
                        &nbsp;<font class="error">&nbsp;<?=$errors['ticket_notice_body']?></font></td>
            </tr>
            <tr class="header"><td  colspan=2 ><?= _('Over Ticket limit Notice') ?></td></tr>
            <tr class="subheader"><td colspan=2 >
                    <?= _('A one time notice sent when user has reached the max allowed open tickets defined in preferences.') ?>
                    <br/><?= _('Admin email gets alert each time a support ticket request is denied.') ?>
            </td></tr>
            <tr>
                <th><?= _('Subject') ?></th>
                <td>
                    <input type="text" size="65" name="ticket_overlimit_subj" value="<?=$tpl['ticket_overlimit_subj']?>">
                            &nbsp;<font class="error">&nbsp;<?=$errors['ticket_overlimit_subj']?></font></td>
            </tr>
            <tr>
                <th><?= _('Message Body:') ?></th>
                <td><textarea rows="7" cols="75" name="ticket_overlimit_body"><?=$tpl['ticket_overlimit_body']?></textarea>
                    &nbsp;<font class="error">&nbsp;<?=$errors['ticket_overlimit_body']?></font></td>
            </tr>
            <tr class="header"><td colspan=2 >&nbsp;<?= _('Ticket Response/Reply') ?></td></tr>
            <tr class="subheader"><td colspan=2 >
                    <?= _('Message template used when responding to a ticket or simply alerting the user about a response/answer availability.') ?>
            </td></tr>
            <tr>
                <th><?= _('Subject') ?></th>
                <td>
                    <input type="text" size="65" name="ticket_reply_subj" value="<?=$tpl['ticket_reply_subj']?>">
                            &nbsp;<font class="error">&nbsp;<?=$errors['ticket_reply_subj']?></font></td>
            </tr>
            <tr>
                <th><?= _('Message Body:') ?></td>
                <td><textarea rows="7" cols="75" name="ticket_reply_body"><?=$tpl['ticket_reply_body']?></textarea>
                    &nbsp;<font class="error">&nbsp;<?=$errors['ticket_reply_body']?></font></td>
            </tr>
        </table>
            <span class="msg"><?= _('Staff') ?></span>
        <table width="100%" border="0" cellspacing=0 cellpadding=2 class="tform tpl">
            <tr class="header"><td colspan=2 ><?= _('New Ticket Alert') ?></td></tr>
            <tr class="subheader"><td colspan=2 ><?= _('Alert sent to staff ( if enabled) on new ticket.') ?></td></tr>
            <tr>
                <th><?= _('Subject') ?></th>
                <td>
                    <input type="text" size="65" name="ticket_alert_subj" value="<?=$tpl['ticket_alert_subj']?>">
                            &nbsp;<font class="error">&nbsp;<?=$errors['ticket_alert_subj']?></font></td>
            </tr>
            <tr>
                <th><?= _('Message Body:') ?></th>
                <td><textarea rows="7" cols="75" name="ticket_alert_body"><?=$tpl['ticket_alert_body']?></textarea>
                    &nbsp;<font class="error">&nbsp;<?=$errors['ticket_alert_body']?></font></td>
            </tr>
            <tr class="header"><td colspan=2 ><?= _('New Message Alert') ?></td></tr>
            <tr class="subheader"><td colspan=2 ><?= _('Alert sent to staff ( if enabled) when user replies to an existing ticket.') ?></td></tr>
            <tr>
                <th><?= _('Subject') ?></th>
                <td>
                    <input type="text" size="65" name="message_alert_subj" value="<?=$tpl['message_alert_subj']?>">
                            &nbsp;<font class="error">&nbsp;<?=$errors['message_alert_subj']?></font></td>
            </tr>
            <tr>
                <th><?= _('Message Body:') ?></th>
                <td><textarea rows="7" cols="75" name="message_alert_body"><?=$tpl['message_alert_body']?></textarea>
                    &nbsp;<font class="error">&nbsp;<?=$errors['message_alert_body']?></font></td>
            </tr>


            <tr class="header"><td colspan=2 ><?= _('New Internal Note Alert') ?></td></tr>
            <tr class="subheader"><td colspan=2 ><?= _('Alert sent to selected staff ( if enabled) when an internal note is appended to a ticket.') ?></td></tr>
            <tr>
                <th><?= _('Subject') ?></th>
                <td>
                    <input type="text" size="65" name="note_alert_subj" value="<?=$tpl['note_alert_subj']?>">
                            &nbsp;<font class="error">&nbsp;<?=$errors['note_alert_subj']?></font></td>
            </tr>
            <tr>
                <th><?= _('Message Body:') ?></th>
                <td><textarea rows="7" cols="75" name="note_alert_body"><?=$tpl['note_alert_body']?></textarea>
                    &nbsp;<font class="error">&nbsp;<?=$errors['note_alert_body']?></font></td>
            </tr>

            <tr class="header"><td colspan=2 ><?= _('Ticket Assigned Alert/Notice') ?></td></tr>
            <tr class="subheader"><td colspan=2 ><?= _('Alert sent to staff on ticket assignment.') ?></td></tr>
            <tr>
                <th><?= _('Subject') ?></th>
                <td>
                    <input type="text" size="65" name="assigned_alert_subj" value="<?=$tpl['assigned_alert_subj']?>">
                            &nbsp;<font class="error">&nbsp;<?=$errors['assigned_alert_subj']?></font></td>
            </tr>
            <tr>
                <th><?= _('Message Body:') ?></th>
                <td><textarea rows="7" cols="75" name="assigned_alert_body"><?=$tpl['assigned_alert_body']?></textarea>
                    &nbsp;<font class="error">&nbsp;<?=$errors['assigned_alert_body']?></font></td>
            </tr>
            <tr class="header"><td colspan=2 ><?= _('Overdue/Stale Ticket Alert/Notice') ?></td></tr>
            <tr class="subheader"><td colspan=2 ><?= _('Alert sent to staff on stale or overdue tickets.') ?></td></tr>
            <tr>
                <th><?= _('Subject') ?></th>
                <td>
                    <input type="text" size="65" name="ticket_overdue_subj" value="<?=$tpl['ticket_overdue_subj']?>">
                            &nbsp;<font class="error">&nbsp;<?=$errors['ticket_overdue_subj']?></font></td>
            </tr>
            <tr>
                <th><?= _('Message Body:') ?></th>
                <td><textarea rows="7" cols="75" name="ticket_overdue_body"><?=$tpl['ticket_overdue_body']?></textarea>
                    &nbsp;<font class="error">&nbsp;<?=$errors['ticket_overdue_body']?></font></td>
            </tr>
        </table>
    </td></tr>
    <tr><td style="padding-left:175px">
            <input class="button" type="submit" name="submit" value="<?= _('Save Changes') ?>">
        <input class="button" type="reset" name="reset" value="<?= _('Reset Changes') ?>">
        <input class="button" type="button" name="cancel" value="<?= _('Cancel Edit') ?>" onClick='window.location.href="admin.php?t=email"'></td>
    </tr>
  </form>
</table>