<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

if ($_SESSION['user']['status'] != STATUS_ADMIN)
{
    header('Location: /derAdvokat/index.php');
}
if(isset($_GET['execute']))
{
	if($_GET['execute']=='delete')
	{
		$log_funk = new log_funk($smarty,$database);
		$log_funk->delete($_GET['id']);
	}
}

$user = new mysqlTable($database, 'user');
$log = new mysqlTable($database, 'log');
$kategorien = new mysqlTable($database, 'kategorien');
$artikel = new mysqlTable($database, 'artikel');

if(isset($_POST['mitglieder_sort']))
{
	$_SESSION['order']=null;
	switch($_POST['mitglieder_sort'])
	{
		case 1:  $order="id DESC";break;
		case 2:  $order="letzte_anmeldung DESC";break;
	}
	$_SESSION['order']=$order;
}
else
{
	$_SESSION['order']="id DESC";
}


if(isset($_POST['log_entfernen']))
{
	if(isset($_POST['log']))
	{
		log_del($_POST['log'],$log);
	}
	else
	{
		$fehlermeldung="Bitte treffen Sie eine Auswahl!";
		$smarty->assign('fehler',$fehlermeldung);
	}
}
if(isset($_POST['log_entfernen']))
{
	if(isset($_POST['log_mitglieder']))
	{
		log_del($_POST['log_mitglieder'],$log);
	}
	else
	{
		$fehlermeldung="Bitte treffen Sie eine Auswahl!";
		$smarty->assign('fehler',$fehlermeldung);
	}
}
switch ($_REQUEST['act'])
{
  case 'add':
        add($user, $smarty);
        break;

  case 'del':
        $id = mysql_real_escape_string($_REQUEST['id']);
        delete($id, $user, $smarty);
        break;

  case 'edit':
    	$id = mysql_real_escape_string($_REQUEST['id']);
    	edit($id, $user, $smarty);
        break;

  case 'lock':
    	$id = mysql_real_escape_string($_REQUEST['id']);
    	lock($id, $user, $smarty);
        break;

  case 'unlock':
    	$id = mysql_real_escape_string($_REQUEST['id']);
    	unlock($id, $user, $smarty);
        break;

  default:
        show($user, $smarty, $log, $kategorien, $artikel);

}

// --- functions ---

function log_del($logs,&$log)
{
	$anz=count($logs);

	for($i=0;$i<$anz;$i++)
	{
		#$sql_bewertungen="DELETE FROM aktiv_lente WHERE aktion='2' && id_self='".$_SESSION['user']['id']."' && foto_id ='".mysql_escape_string($_SESSION['del_foto_id'][$i])."'";
	    $log->setWhere('id=' . $logs[$i]);
    	$log->delete();
	}
	reload();
}

function show(&$user, &$smarty, &$log, &$kategorien, &$artikel)
{
	$funktionen= new funktionen($user, $smarty);
	$anzahl_seiten=$funktionen->seiten($user, $smarty);

    $start = 0;
    $anzeigen=10;

	if (isset($_GET['page']))
	$start = ($_GET['page']) * $anzeigen;

    #$user->setWhere('status != 3');
    $user->setOrderBy($_SESSION['order']);
    $user->setLimit($anzeigen,$start);
    $user->select();

    $records = $user->getRecords();


	$kategorien->select();
	$kat = $kategorien->getRecords();
	#print $kategorien->$sql;
	$karegorienArray = array();
	foreach ($kat as $katKey => $katValue)
	{
	   $karegorienArray[$katValue['id']] = $katValue['name'];
	}
    #echo "<pre>";
    #print_r($karegorienArray);
    #echo "</pre>";


	$artikel->select();
	$records_art = $artikel->getRecords();

	foreach ($records_art as $records_artKey => $records_artValue)
	{
	   $artArray[$records_artValue['id']] = $records_artValue['titel'];
	}

	#echo "Session-".$_SESSION['user']['letzte_anmeldung'];

    // MONITORING AUSGABE
	$log_funk = new log_funk($smarty,$database);
	#$log_funk ->table->$log;
	$return_log_funk = $log_funk->log_ausgabe($log);

	#echo "<pre>";
	#print_r($return_log_funk);
	#echo "</pre>";


	foreach ($return_log_funk[0] as $records_nl_artKey => $records_nl_artValue)
		{
			if (!isset($return_log_funkArray[$records_nl_artValue['uid']])) {
				$return_log_funkArray[$records_nl_artValue['uid']] = array();
			}
		   $return_log_funkArray[$records_nl_artValue['uid']][] = array('id'=>$records_nl_artValue['id'],'uid'=>$records_nl_artValue['uid'],'url'=>$records_nl_artValue['url'],'useragent'=>$records_nl_artValue['useragent'],'mod'=>$records_nl_artValue['mod'],'kategorien_id'=>$records_nl_artValue['kategorien_id'],'unterkategorien_id'=>$records_nl_artValue['unterkategorien_id'],'artikel_id'=>$records_nl_artValue['artikel_id'],'timestamp'=>$records_nl_artValue['timestamp']);
		}


	#echo "<pre>";
	#print_r($return_log_funkArray);
	#echo "</pre>";

    $smarty->assign('seiten', $anzahl_seiten);
    $smarty->assign('user', $records);
    $smarty->assign('logsArray', $return_log_funkArray);
    #$smarty->assign('logs', $return_log_funk[0]);
	$smarty->assign('kat', $karegorienArray);
	$smarty->assign('art', $artArray);

    $smarty->assign('contentTemplate', 'userliste.tpl');
}

function unlock($id, &$user, &$smarty)
{
    $user->setWhere('id =' . $id);
    $user->select();
    $user->status->setValue(STATUS_ACTIVE_AGB);
    $user->save();

    reload();
}
function reload()
{
	if(isset($_GET['page'])){
    	$page="&page=".$_GET['page'];
    }else{
    	$page="";
    }

    header('Location: /derAdvokat/index.php?task=userliste'.$page);
}
function lock($id, &$user, &$smarty)
{
    $user->setWhere('id =' . $id);
    $user->select();
    $user->status->setValue(STATUS_DISABLED);
    $user->save();

    reload();
}

function edit($id, &$user, &$smarty)
{
  $user->setWhere('id =' . $id);
  $user->select();

  if ($_SERVER["REQUEST_METHOD"] == 'POST')
  {
    $user->vorname->setValue($_POST['vorname']);
    $user->name->setValue($_POST['name']);
    $user->email->setValue($_POST['email']);
    $user->empfanger_art->setValue($_POST['empf_art']);
    $user->geschlecht->setValue($_POST['geschlecht']);
    $user->save();

    show($user, $smarty, $log, $kategorien, $artikel);
  }
  else
  {
    $records = $user->getRecords();
    $smarty->assign('user', $records[0]);
    $smarty->assign('contentTemplate', 'registration_eingabe_form.tpl');
  }
}

function delete($id, &$user, &$smarty)
{
    $user->setWhere('id=' . $id);
    $user->delete();

    reload();
}


function add(&$user, &$smarty)
{
  if ($_SERVER["REQUEST_METHOD"] == 'POST')
  {
    if (isset($_POST['geschlecht']))
    {
      $geschlecht = mysql_real_escape_string($_POST['geschlecht']);
    }

 	if (isset($_POST['titel']))
    {
      $titel = mysql_real_escape_string($_POST['titel']);
    }

    if (isset($_POST['vorname']))
    {
      $vorname = mysql_real_escape_string($_POST['vorname']);
    }

    if (isset($_POST['name']))
    {
      $name = mysql_real_escape_string($_POST['name']);
    }

  	if (isset($_POST['empf_art']))
    {
      $empf_art = mysql_real_escape_string($_POST['empf_art']);
    }

    if (isset($_POST['email']))
    {
      $email = mysql_real_escape_string($_POST['email']);
    }

    if (isset($_POST['vertreter']))
    {
      $vertreter = mysql_real_escape_string($_POST['vertreter']);
    }
    if (isset($_POST['firma_name']))
    {
      $firma_name = mysql_real_escape_string($_POST['firma_name']);
    }
    if (isset($_POST['tel']))
    {
      $tel = mysql_real_escape_string($_POST['tel']);
    }
    if (isset($_POST['fax']))
    {
      $fax = mysql_real_escape_string($_POST['fax']);
    }
    if (isset($_POST['strasse']))
    {
      $strasse = mysql_real_escape_string($_POST['strasse']);
    }
    if (isset($_POST['plz']))
    {
      $plz = mysql_real_escape_string($_POST['plz']);
    }
    if (isset($_POST['ort']))
    {
      $ort = mysql_real_escape_string($_POST['ort']);
    }



    $user->setWhere("email='" . $email . "'");
    $user->select();
    $user->countRecords();

    if ($user->countRecords())
    {
     	$ben_exist = "Dieser Benutzer ".$email." existiert bereit";
      	$smarty->assign('error', $ben_exist);
    }
    else
    {
        if ($_POST['email']=='')
	    {
	    	$msg_mail = "Bitte geben Sie ein E-Mail ein";
	    	$smarty->assign('error', $msg_mail);
	    	$smarty->assign('msg_mail', $msg_mail);
	    }
    	if ($_POST['geschlecht']!=3)
      	{
	      	if ($_POST['name']=='')
	    	{
	    	  $msg_name = "Bitte geben Sie eine Nachname ein";
	    	  $smarty->assign('error', $msg_name);
	    	  $smarty->assign('msg_name', $msg_name);
	    	}
	      	if ($_POST['vorname']=='')
	    	{
	    	  $msg_vorname = "Bitte geben Sie eine Vorhname ein";
	    	  $smarty->assign('error', $msg_vorname);
	    	  $smarty->assign('msg_vorname', $msg_vorname);
	    	}
      	}
      	else
      	{
      		if ($_POST['firma_name']=='')
	    	{
	    	  $msg_vorname = "Bitte geben Sie - Firmenname - ein";
	    	  $smarty->assign('error', $msg_vorname);
	    	  $smarty->assign('msg_vorname', $msg_vorname);
	    	}
      	}

    	if(!isset($msg_name) AND !isset($msg_vorname) AND !isset($msg_mail))
    	{
    	  $passwort = Password::getPassword();
    	  $user->passwort->setValue(md5($passwort));
    	  $user->geschlecht->setValue($geschlecht);
    	  $user->titel->setValue($titel);
    	  $user->vorname->setValue($vorname);
          $user->name->setValue($name);
          $user->vertreter->setValue($vertreter);
    	  $user->email->setValue($email);
    	  $user->empfanger_art->setValue($empf_art);
    	  $user->firma_name->setValue($firma_name);
    	  $user->tel->setValue($tel);
    	  $user->fax->setValue($fax);
    	  $user->strasse->setValue($strasse);
    	  $user->plz->setValue($plz);
    	  $user->ort->setValue($ort);
    	  $user->status->setValue(STATUS_ACTIVE);
    	  $user->save();

    	  $smarty->assign('passwort', $passwort);

    	  $mail = new mail();
    	  $mail->assign('passwort', $passwort);
    	  $mail->template = 'mail_register.tpl';
    	  $mail->subject = 'Registration bei derAdvokat.de';
    	  $mail->to = $email;
    	  $mail->send();

    	  $erfolg = "Registration erfolgreich";
    	  $smarty->assign('erfolg', $erfolg);
    	}
    }
  }

  $smarty->assign('contentTemplate', 'registration_eingabe_form.tpl');
}