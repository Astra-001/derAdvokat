<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

$user = new mysqlTable($database, 'user');

$smarty->assign('status',$_SESSION['user']['status']);

switch ($_POST['ubernehmen'])
{
	case 'Speichern':

		if($_POST['name']==" " OR strlen($_POST['name'])==0)
		{
			$message="Ihr Nachname darf nicht fehlen";
		}
		if($_POST['email']=="")
		{
			$message="Ihr E-Mail darf nicht fehlen";
		}
		if($message=="")
		{
			edit_eigene_daten($_SESSION['user']['id'], $user, $smarty);
			$smarty->assign('msg_erfolg','Änderung Ihrer Daten ist erfolgreich');
		}
		else
		{
			$smarty->assign('msg_fehler',$message);
		}
		show($user, $smarty);break;

	case 'Erstellen':

		if($_POST['passw_neu']!=$_POST['passw_neu_1'])
		{
			$message_pass="Neues Passwort stimmt mit der wiederholtem Passwort nicht überein";
		}
		if($_POST['passw_neu_1']=="")
		{
			$message_pass="Bitte wiederholen Sie neues Passwort";
		}
		if($_POST['passw_neu']=="")
		{
			$message_pass="Bitte geben Sie Ihr neues Passwort ein";
		}

		$check_altes_pass=check_altes_pass($user, $smarty);
		#echo "Altes Passwort-".$check_altes_pass['passwort'];
		if(md5($_POST['passw_alt'])!=$check_altes_pass['passwort'])
		{
			$message_pass="Ihr altes Passwort ist falsch";
		}
		if($_POST['passw_alt']=="")
		{
			$message_pass="Bitte geben Sie Ihr altes Passwort ein";
		}


		#echo "<pre>";
		#print_r($check_altes_pass);
		#echo "</pre>";

		if($message_pass=="")
		{
			edit_pass($_SESSION['user']['id'], $user, $smarty);
			$smarty->assign('msg_pass_erfolg','Änderung Ihres Passwortes ist erfolgreich');
		}
		else
		{
			$smarty->assign('msg_pass_fehler',$message_pass);
		}
		show($user, $smarty);break;

		default: show($user, $smarty);break;
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
    $mail->subject = 'Zugangsdatenänderung bei derAdvokat.de';
    $mail->to = $email;
    $mail->send();
}
function check_altes_pass(&$user, &$smarty)
{
    $user->setWhere('id =' . $_SESSION['user']['id']);
    $user->setOrderBy('id DESC');
    $user->select();

    $records = $user->getRecords();

    return $records[0];
}
function edit_pass($id, &$user, &$smarty)
{
    $user->setWhere('id =' . $id);
    $user->select();

    $records = $user->getRecords();

    $geschlecht=$records[0]['geschlecht'];
    $titel=$records[0]['titel'];
    $vorname=$records[0]['vorname'];
    $name=$records[0]['name'];
    $email=$records[0]['email'];

    #$smarty->assign('geschlecht', $geschlecht);
    #$smarty->assign('titel', $titel);
    #$smarty->assign('vorname', $vorname);
    #$smarty->assign('name', $name);
    #$smarty->assign('email', $email);

    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
    	$passwort = $_POST['passw_neu'];
        $user->passwort->setValue(md5($passwort));
        $user->save();

        mail_sent($geschlecht,$titel,$vorname,$name,$email,$passwort);

        $smarty->assign('passwort', $passwort);
    }
}

function edit_eigene_daten($id, &$user, &$smarty)
{
    $user->setWhere('id =' . $id);
    $user->select();

    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
    	$user->geschlecht->setValue($_POST['geschlecht']);
    	$user->name->setValue($_POST['name']);
    	$user->vorname->setValue($_POST['vorname']);
    	$user->titel->setValue($_POST['titel']);
        $user->vertreter->setValue($_POST['vertreter']);
        $user->email->setValue($_POST['email']);
        $user->firma_name->setValue($_POST['firma_name']);
        $user->tel->setValue($_POST['tel']);
        $user->fax->setValue($_POST['fax']);
        $user->strasse->setValue($_POST['strasse']);
        $user->plz->setValue($_POST['plz']);
        $user->ort->setValue($_POST['ort']);

        $user->save();
    }
}

function show(&$user, &$smarty)
{
    $user->setWhere('id =' . $_SESSION['user']['id']);
    $user->setOrderBy('id DESC');
    $user->select();

    $records = $user->getRecords();

    $smarty->assign('id', $records[0]['id']);
	$smarty->assign('geschlecht', $records[0]['geschlecht']);
	$smarty->assign('name', $records[0]['name']);
	$smarty->assign('vorname', $records[0]['vorname']);
	$smarty->assign('titel', $records[0]['titel']);
	$smarty->assign('vertreter', $records[0]['vertreter']);
	$smarty->assign('email', $records[0]['email']);
	$smarty->assign('firma_name', $records[0]['firma_name']);
	$smarty->assign('tel', $records[0]['tel']);
	$smarty->assign('fax', $records[0]['fax']);
	$smarty->assign('strasse', $records[0]['strasse']);
	$smarty->assign('plz', $records[0]['plz']);
	$smarty->assign('ort', $records[0]['ort']);

	$smarty->assign('registrationsdatum', $records[0]['registrationsdatum']);

    $smarty->assign('contentTemplate', 'eigene_daten.tpl');
}
?>