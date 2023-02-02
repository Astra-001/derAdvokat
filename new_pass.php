<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

if ($_SERVER["REQUEST_METHOD"])
{
	$user = new mysqlTable($database, 'user');

	if ($_SERVER["REQUEST_METHOD"] == 'POST')
	{
		if($_POST['email']!="" AND $_POST['new_pass'])
		{
			$check_mail=check_mail($user, $smarty);

			if($check_mail['email']==$_POST['email'])
			{
				edit_new_pass($check_mail['email'], $user, $smarty);

				$smarty->assign('msg_erfolg','Erstellung neues Passwortes ist Erfolgreich');
			}
			else
			{
				$smarty->assign('msg_fehler','Sie waren bei uns nicht angemeldet');
			}
		}
		else
		{
			$smarty->assign('msg_fehler','Bitte geben Sie Ihr E-Mail ein, mit dem Sie hier angemeldet waren');
		}
	}
	$smarty->assign('contentTemplate', 'new_pass.tpl');
}
//Funktionen
function mail_sent($geschlecht,$titel,$vorname,$name,$email,$passwort)
{
	$mail = new mail();

	$mail->assign('geschlecht', $geschlecht);
	$mail->assign('titel', $titel);
	$mail->assign('vorname', $vorname);
	$mail->assign('name', $name);
	$mail->assign('email', $email);
    $mail->assign('passwort', $passwort);
    $mail->template = 'mail_pass.tpl';
    $mail->subject = 'Ihre neue Zugangsdaten bei www.derAdvokat.de';
    $mail->to = $email;
    $mail->send();
}
function edit_new_pass($email, &$user, &$smarty)
{
    $where = "`email`='" . mysql_escape_string($_REQUEST['email']) . "'";
    $user->setWhere($where);
    $user->select();

    $records = $user->getRecords();

    $geschlecht=$records[0]['geschlecht'];
    $titel=$records[0]['titel'];
    $vorname=$records[0]['vorname'];
    $name=$records[0]['name'];
    $email=$records[0]['email'];

    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
    	$passwort = Password::getPassword();
        $user->passwort->setValue(md5($passwort));
        $user->save();

        mail_sent($geschlecht,$titel,$vorname,$name,$email,$passwort);

        $smarty->assign('passwort', $passwort);
    }
}
function check_mail(&$user, &$smarty)
{
    $where = "`email`='" . mysql_escape_string($_REQUEST['email']) . "'";
    $user->setWhere($where);
    $user->setOrderBy('id DESC');
    $user->select();

    $records = $user->getRecords();

    return $records[0];
}