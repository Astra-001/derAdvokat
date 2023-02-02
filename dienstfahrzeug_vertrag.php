<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

if ($_SESSION['user']['status'] < STATUS_ACTIVE_AGB)
{
    header('Location: /derAdvokat/index.php');
}
$user = new mysqlTable($database, 'user');

show($user, $smarty);

if($_POST['dienstfahrzeug'])
{
	if(isset($_POST['ex_name']) AND isset($_POST['ex_vorname']) AND isset($_POST['ex_strasse']) AND isset($_POST['ex_plz']) AND isset($_POST['ex_ort']))
	{
	    if($_POST['zuzahlung']==2)
	    {
	    	if ($_POST['km_pauschale_summe']=='')
	  		{
	  		    $msg_km_pauschale_summe = "Bitte geben Sie - Zahlung einer Kilometerpauschale in H&ouml;he von - bei Privatfahrten aus";
	  		    $smarty->assign('msg_dar_priv', $msg_km_pauschale_summe);
	  		    $smarty->assign('msg_km_pauschale_summe', $msg_km_pauschale_summe);
	  		}
	    }
	    if($_POST['zuzahlung']==3)
	    {
	  		if ($_POST['monats_pauschale_summe']=='')
	  		{
	  		    $msg_monats_pauschale_summe = "Bitte geben Sie - Zahlung einer Monatspauschale in H&ouml;he von - bei Privatfahrten aus";
	  		    $smarty->assign('msg_dar_priv', $msg_monats_pauschale_summe);
	  		    $smarty->assign('msg_monats_pauschale_summe', $msg_monats_pauschale_summe);
	  		}
	    }
	    if($_POST['erlaubnis']!=1)
	    {
			if ($_POST['zuzahlung']=='')
			{
			    $msg_zuzahlung = "Bitte w&auml;hlen Sie - Zuzahlungsart bei Privatfahrten - aus";
			    $smarty->assign('msg_dar_priv', $msg_zuzahlung);
			    $smarty->assign('msg_zuzahlung', $msg_zuzahlung);
			}
	    }
		if ($_POST['erlaubnis']=='')
		{
		    $msg_erlaubnis = "Bitte w&auml;hlen Sie - Erlaubnisart bei Privatfahrten - aus";
		    $smarty->assign('msg_dar_priv', $msg_erlaubnis);
		    $smarty->assign('msg_erlaubnis', $msg_erlaubnis);
		}
		if ($_POST['kennzeichen']=='')
		{
		    $msg_kennzeichen = "Bitte geben Sie - amtliches Kennzeichen - ein";
		    $smarty->assign('msg_dar', $msg_kennzeichen);
		    $smarty->assign('msg_kennzeichen', $msg_kennzeichen);
		}
		if ($_POST['typ']=='')
		{
		    $msg_typ = "Bitte geben Sie den - Typ - des Fahrzeuges ein";
		    $smarty->assign('msg_dar', $msg_typ);
		    $smarty->assign('msg_typ', $msg_typ);
		}
		if ($_POST['marke']=='')
		{
		    $msg_marke = "Bitte geben Sie die - Marke - des Fahrzeuges ein";
		    $smarty->assign('msg_dar', $msg_marke);
		    $smarty->assign('msg_marke', $msg_marke);
		}
	}
	if ($_POST['ex_ort']=='')
	{
	    $msg_ort = "Bitte geben Sie - Ort - ein";
	    $smarty->assign('msg', $msg_ort);
	    $smarty->assign('msg_ort', $msg_ort);
	}
	if ($_POST['ex_plz']=='')
	{
	    $msg_plz = "Bitte geben Sie - Postleitzahl - ein";
	    $smarty->assign('msg', $msg_plz);
	    $smarty->assign('msg_plz', $msg_plz);
	}
	if ($_POST['ex_strasse']=='')
	{
	    $msg_strasse = "Bitte geben Sie - Strasse - ein";
	    $smarty->assign('msg', $msg_strasse);
	    $smarty->assign('msg_strasse', $msg_strasse);
	}
	if ($_POST['ex_vorname']=='')
	{
	    $msg_vorname = "Bitte geben Sie - Vorname - ein";
	    $smarty->assign('msg', $msg_vorname);
	    $smarty->assign('msg_vorname', $msg_vorname);
	}
	if ($_POST['ex_name']=='')
	{
	    $msg_name = "Bitte geben Sie - Nachname - ein";
	    $smarty->assign('msg', $msg_name);
	    $smarty->assign('msg_name', $msg_name);
	}

	//PDF Inhalt
	//Erste Person
	if($_POST['geschlecht']!=3)//Herr Frau
	{
		switch($_POST['geschlecht'])
		{
		   	case '1': $anrede='Herrn ';break;
		   	case '2': $anrede='Frau ';break;
		}
		if($_POST['titel']!="")
		{
			$titel=$_POST['titel']." ";
		}
		$absatz1_0=$anrede;
		$absatz1=$titel."".$_POST['vorname']."  ".$_POST['name'];
		$absatz2=$_POST['strasse'];
		$absatz3=$_POST['plz']." ".$_POST['ort'];
	}
    if($_POST['geschlecht']==3)//Firma
    {
    	$absatz1="Firma: ".$_POST['firma_name'];
    	$absatz2_2="vertreten durch: ".$_POST['vertreter'];
    	$absatz2=$_POST['strasse'];
    	$absatz3=$_POST['plz']." ".$_POST['ort'];
    }
    //Zweite Person

    if($_POST['ex_anrede']!=3)//Herr Frau
    {
    	switch($_POST['ex_anrede'])
    	{
    		case '1': $anrede='Herrn ';break;
    		case '2': $anrede='Frau ';break;
    	}
    	if($_POST['ex_titel']!="")
		{
			$ex_titel=$_POST['ex_titel']." ";
		}
    	$absatz4_0=$anrede;
    	$absatz4=$ex_titel."".$_POST['ex_vorname']." ".$_POST['ex_name'];
    	$absatz5=$_POST['ex_strasse'];
    	$absatz6=$_POST['ex_plz']." ".$_POST['ex_ort'];
    }

	switch($_POST['erlaubnis'])
	{
		case 1: $erlaubnis="Privatfahrten sind dem Mitarbeiter nicht erlaubt."; break;
	    case 2: $erlaubnis="Privatfahrten sind nur nach vorheriger Absprache mit der Geschäftsleitung erlaubt."; break;
	    case 3: $erlaubnis="Privatfahrten sind dem Mitarbeiter erlaubt."; break;
	}
	switch($_POST['zuzahlung'])
	{
		case 1: $zuzahlung="Für Privatfahrten muss der Mitarbeiter kein zusätzliches Entgelt an den Arbeitgeber leisten."; break;
	    case 2: $zuzahlung=" Für Privatfahrten zahlt der Mitarbeiter eine Kilometerpauschale in Höhe von ".$_POST['km_pauschale_summe']." Euro.  mit dieser Pauschale sind alle Fahrzeugkosten incl. der Kraftstoff- und Wartungskosten abgegolten."; break;
	    case 3: $zuzahlung=" Für Privatfahrten zahlt der Mitarbeiter eine monatliche Pauschale in Höhe von ".$_POST['monats_pauschale_summe']." Euro. mit dieser Pauschale sind alle Fahrzeugkosten incl. der Kraftstoff und Wartungskosten abgegolten."; break;
	}

	if(!isset($msg_name) AND !isset($msg_vorname) AND !isset($msg_strasse) AND !isset($msg_plz) AND !isset($msg_ort) AND !isset($msg_marke) AND !isset($msg_typ) AND !isset($msg_kennzeichen) AND !isset($msg_erlaubnis) AND !isset($msg_zuzahlung) AND !isset($msg_km_pauschale_summe) AND !isset($msg_monats_pauschale_summe))
	{
		require_once("rtf/dienstfahrzeug_vertrag_rtf.php");
	}
}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 19;
	$log_funk->log_insert();
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
#	$smarty->assign('email', $records[0]['email']);
	$smarty->assign('firma_name', $records[0]['firma_name']);
#	$smarty->assign('tel', $records[0]['tel']);
#	$smarty->assign('fax', $records[0]['fax']);
	$smarty->assign('strasse', $records[0]['strasse']);
	$smarty->assign('plz', $records[0]['plz']);
	$smarty->assign('ort', $records[0]['ort']);

    $smarty->assign('contentTemplate', 'dienstfahrzeug_vertrag.tpl');
}
$smarty->assign('status',$_SESSION['user']['status']);
$smarty->assign('contentTemplate', 'dienstfahrzeug_vertrag.tpl');