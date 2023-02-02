<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (isset($_REQUEST['kontakt_name']) && mb_strlen($_REQUEST['kontakt_name']) &&
        isset($_REQUEST['kontakt_nachricht']) && mb_strlen($_REQUEST['kontakt_nachricht'])
    ){
        $mail = new mail();
        $mail->template = 'mail_kontakt.tpl';
        $mail->subject = 'Anfrage von derAdvokat.de';
        $mail->to = EMAIL;
        $mail->send();
    } else {
        $msg = "Bitte geben Sie ihren Namen und ihre Nachricht ein!";
        $smarty->assign('msg', $msg);
    }
}

  $smarty->assign('contentTemplate', 'kontakt.tpl');
?>
