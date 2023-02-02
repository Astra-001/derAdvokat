<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
$user = new mysqlTable($database, 'user');#
show($user, $smarty);

switch($_REQUEST['alarmplan'])
{
	case 'Weiter':
  		$eingabe_check=eingabe_check($smarty);

  		if(strlen($eingabe_check))
  		{
    		$smarty->assign('error', $eingabe_check);
  		}
	    else
	    {
			$show_tab="show";
			$smarty->assign('show_tab', $show_tab);
	    }
	    break;

  case 'Ausgabe':

		$show_tab="show";
		$smarty->assign('show_tab', $show_tab);

 		$eingabe_check_1=eingabe_check_1($smarty);

  		if(strlen($eingabe_check_1))
		{
			$smarty->assign('error', $eingabe_check_1);
		}
		else
		{
			rtf_ausgabe();
		}

		break;
}
if(!$_REQUEST['alarmplan'])
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 51;
	$log_funk->log_insert();
}

function show(&$user, &$smarty)
{
    $user->setWhere('id =' . $_SESSION['user']['id']);
    $user->setOrderBy('id DESC');
    $user->select();

    $records = $user->getRecords();

	$smarty->assign('user', $records[0]['firma_name']);

    $smarty->assign('contentTemplate', 'alarmplan.tpl');
}

//Funktionen
function eingabe_check_1(&$smarty)
{

		if($_POST['standort_alarmplan']=="")
	  	{
	  		$meldung="Feld - Standort f&uuml;r den der Alarmplan gilt - darf nicht leer sein";
	  		return $meldung;
	  	}
		if($_POST['ort_feuerloescher']=="")
	  	{
	  		$meldung="Feld - Ort des n&auml;chster Feuerl&ouml;scher dort - darf nicht leer sein";
	  		return $meldung;
	  	}
		if($_POST['verbandskasten']=="")
	  	{
	  		$meldung="Feld - Ort des n&auml;chsten Verbandskastens dort - darf nicht leer sein";
	  		return $meldung;
	  	}
		if($_POST['sammelplatz']=="")
	  	{
	  		$meldung="Feld - Sammelplatz au&szlig;erhalb des Geb&auml;udes im Brandfall - darf nicht leer sein";
	  		return $meldung;
	  	}
	  	return $meldung;
}
function eingabe_check(&$smarty)
{
		if($_POST['firma_name']=="")
	  	{
	  		$meldung="Feld - Firmenname - darf nicht leer sein";
	  		return $meldung;
	  	}
		if($_POST['name_ersthelfer']=="")
	  	{
	  		$meldung="Feld - Name des/der Ersthelfer(s) – Sanit&auml;tsbeauftragte(r) - darf nicht leer sein";
	  		return $meldung;
	  	}
		if($_POST['artz']=="")
	  	{
	  		$meldung="Feld - N&auml;chster Arzt - darf nicht leer sein";
	  		return $meldung;
	  	}
		if($_POST['tel_artz']=="")
	  	{
	  		$meldung="Feld - Telefonnummer des n&auml;chsten Arztes - darf nicht leer sein";
	  		return $meldung;
	  	}
		if($_POST['krankenhaus']=="")
	  	{
	  		$meldung="Feld - N&auml;chstes Krankenhaus - darf nicht leer sein";
	  		return $meldung;
	  	}
		if($_POST['tel_krankenhaus']=="")
	  	{
	  		$meldung="Feld - Telefonnummer des n&auml;chsten Krankenhauses - darf nicht leer sein";
	  		return $meldung;
	  	}
		if($_POST['sicherheits_beauftragter']=="")
	  	{
	  		$meldung="Feld - Betrieblicher Sicherheitsbeauftragter - darf nicht leer sein";
	  		return $meldung;
	  	}

  	return $meldung;
}

function rtf_ausgabe()
{
	require_once("rtf/alarmplan_rtf.php");
}
?>