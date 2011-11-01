<?php
if(!defined('OSTCLIENTINC') || !is_object($ticket)) die(_('Kwaheri rafiki!')); //Say bye to our friend..

//Please customize the message below to fit your organization speak!
?>
<div>
    <?if($errors['err']) {?>
        <p align="center" id="errormessage"><?=$errors['err']?></p>
    <?}elseif($msg) {?>
        <p align="center" id="infomessage"><?=$msg?></p>
    <?}elseif($warn) {?>
        <p id="warnmessage"><?=$warn?></p>
    <?}?>
</div>
<div style="margin:5px 100px 100px 0;">
    <?=Format::htmlchars($ticket->getName())?>,<br>
    <p>
     <?= _('Thank you for contacting us.<br>A support ticket request has been created and a representative will be getting back to you shortly if necessary.')?>
    </p>
         
    <?if($cfg->autoRespONNewTicket()){ ?>
    <p><?= sprintf(_("An email with the ticket number has been sent to <b>%s</b>.You'll need the ticket number along with your email to view status and progress online."), $ticket->getEmail())?>
    </p>
    <p>
       <?= _('If you wish to send additional comments or information regarding same issue, please follow the instructions on the email.')?>
    </p>
    <?}?>
    <p><?= _('Support Team')?></p>
</div>
<?
unset($_POST); //clear to avoid re-posting on back button??
?>