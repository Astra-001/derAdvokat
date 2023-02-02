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

if($_POST['einstellung_allg'])
{
	if($_POST['name']=="" OR strstr($_POST['name']," "))
	{
		$msg_fehler="Ihr Nachname darf nicht fehlen";
	}
	/*if ($_POST['urlaub']=='')
	{
	    $msg_urlaub = "Bitte geben Sie die - Anzahl Urlaubstage - ein";
	    $smarty->assign('msg_urlaub', $msg_urlaub);
	    $smarty->assign('msg_urlaub', $msg_urlaub);
	}*/
	if ($_POST['art_vergutung']==2)
	{
	    if ($_POST['gehalt_stunden_brutto']=='')
		{
		    $gehalt_stunden_brutto = "Bitte geben Sie die - Bruttostundenlohn in H&ouml;he von - ein";
		    $smarty->assign('msg_vergutung', $gehalt_stunden_brutto);
		    $smarty->assign('msg_vergutung', $gehalt_stunden_brutto);
		}
	}
	if ($_POST['art_vergutung']==1)
	{
	    if ($_POST['gehalt_monats_brutto']=='')
		{
		    $msg_monats_brutto_gehalt = "Bitte geben Sie die - Monatsbruttogehalt in H&ouml;he von - ein";
		    $smarty->assign('msg_vergutung', $msg_monats_brutto_gehalt);
		    $smarty->assign('msg_vergutung', $msg_monats_brutto_gehalt);
		}
	}
	if ($_POST['art_vergutung']=="")
	{
	    if ($_POST['gehalt_monats_brutto']=='')
		{
		    $msg_vergutungsart = "Bitte w&auml;hlen Sie Verg&uuml;tungsart - Monatsbruttogehalt oder Stundenbruttolohn - aus";
		    $smarty->assign('msg_vergutung', $msg_vergutungsart);
		    $smarty->assign('msg_vergutung', $msg_vergutungsart);
		}
	}
	if ($_POST['arbeitszeit']=='')
	{
	    $msg_arbeitszeit = "Bitte geben Sie die - Wochenarbeitszeit - ein";
	    $smarty->assign('msg_arbeitszeit', $msg_arbeitszeit);
	    $smarty->assign('msg_arbeitszeit', $msg_arbeitszeit);
	}
	if ($_POST['funktion']=='')
	{
	    $msg_funktion = "Bitte geben Sie die - Funktion - ein";
	    $smarty->assign('msg_arbeitszeit', $msg_funktion);
	    $smarty->assign('msg_funktion', $msg_funktion);
	}
	if ($_POST['bereich']=='')
	{
	    $msg_bereich = "Bitte geben Sie hier - Unternehmensbereich - ein";
	    $smarty->assign('msg_arbeitszeit', $msg_bereich);
	    $smarty->assign('msg_bereich', $msg_bereich);
	}
	if ($_POST['beginn']=='')
	{
	    $msg_beginn = "Bitte geben Sie - Beginn des Arbeitsverh&auml;ltnisses - ein";
	    $smarty->assign('msg_dar', $msg_beginn);
	    $smarty->assign('msg_beginn', $msg_beginn);
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

if($_POST['geschlecht']!=3) //Firma
    {
		if ($_POST['ort']=='')
		{
		    $msg_ort = "Bitte geben Sie - Ort - ein";
		    $smarty->assign('msg_fehler', $msg_ort);
		    $smarty->assign('msg_name', $msg_ort);
		}
		if ($_POST['plz']=='')
		{
		    $msg_plz = "Bitte geben Sie - PLZ - ein";
		    $smarty->assign('msg_fehler', $msg_plz);
		    $smarty->assign('msg_name', $msg_plz);
		}
		if ($_POST['strasse']=='')
		{
		    $msg_strasse = "Bitte geben Sie - Strasse und Hausnummer - ein";
		    $smarty->assign('msg_fehler', $msg_strasse);
		    $smarty->assign('msg_name', $msg_strasse);
		}
		if ($_POST['name']=='')
		{
		    $msg_name = "Bitte geben Sie - Nachname - ein";
		    $smarty->assign('msg_fehler', $msg_name);
		    $smarty->assign('msg_name', $msg_name);
		}
		if ($_POST['vorname']=='')
		{
		    $msg_vorname = "Bitte geben Sie - Vorname - ein";
		    $smarty->assign('msg_fehler', $msg_vorname);
		    $smarty->assign('msg_name', $msg_vorname);
		}
	}

	if($_POST['geschlecht']==3) //Firma
    {
	    if ($_POST['firma_name']=='')
		{
		    $msg_firma_name = "Bitte geben Sie - Firmenname - ein";
		    $smarty->assign('msg_fehler', $msg_firma_name);
		    $smarty->assign('msg_name', $msg_firma_name);
		}
		if ($_POST['strasse']=='')
		{
		    $msg_strasse = "Bitte geben Sie - Strasse und Hausnummer - ein";
		    $smarty->assign('msg_fehler', $msg_strasse);
		    $smarty->assign('msg_name', $msg_strasse);
		}
		if ($_POST['plz']=='')
		{
		    $msg_plz = "Bitte geben Sie - PLZ - ein";
		    $smarty->assign('msg_fehler', $msg_plz);
		    $smarty->assign('msg_name', $msg_plz);
		}
    	if ($_POST['ort']=='')
		{
		    $msg_ort = "Bitte geben Sie - Ort - ein";
		    $smarty->assign('msg_fehler', $msg_ort);
		    $smarty->assign('msg_name', $msg_ort);
		}
    }

	//PDF Inhalt

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
	    $absatz1=$titel."".$_POST['vorname']." ".$_POST['name'];
	    $absatz2=$_POST['strasse'];
	    $absatz3=$_POST['plz']." ".$_POST['ort'];
    }
    if($_POST['geschlecht']==3)//Firma
    {
    	$absatz1="Firma: ".$_POST['firma_name'];
    	if($_POST['vertreter'])
    	{
    		$absatz2_2="Vertreten durch: ".$_POST['vertreter'];
    	}
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
		if($_POST['titel']!="")
		{
			$ex_titel=$_POST['ex_titel']." ";
		}
		$absatz4_0=$anrede;
    	$absatz4=$ex_titel."".$_POST['ex_vorname']." ".$_POST['ex_name'];
    	$absatz5=$_POST['ex_strasse'];
    	$absatz6=$_POST['ex_plz']." ".$_POST['ex_ort'];
    }

    if ($_POST['art_vergutung']==1)
	{
		$p4_a1="(1) Der Mitarbeiter erhält ein Monatsbruttogehalt von ".$_POST['gehalt_monats_brutto']." EURO, das nachträglich fällig wird.\n";
	}
	if ($_POST['art_vergutung']==2)
	{
		$p4_a1="(1) Der Mitarbeiter erhält einen Bruttostundenlohn in Höhe von ".$_POST['gehalt_stunden_brutto']." EURO als Vergütung, der
nachträglich am Anfang des nächsten Monats fällig wird.\n";

	}
	if(!isset($msg_name) AND !isset($msg_vorname) AND !isset($msg_strasse) AND !isset($msg_plz) AND !isset($msg_ort) AND !isset($msg_beginn) AND !isset($msg_bereich) AND !isset($msg_funktion) AND !isset($msg_arbeitszeit) AND !isset($msg_vergutungsart) AND !isset($msg_monats_brutto_gehalt) AND !isset($gehalt_stunden_brutto))
	{
		require_once("rtf/einstellungsvertrag_aushilfe_rtf.php");
	}
}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 14;
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

    $smarty->assign('contentTemplate', 'burgschafts_erkl_form.tpl');
}
$smarty->assign('status',$_SESSION['user']['status']);
$smarty->assign('contentTemplate', 'anstell_vertrag_aushilfe.tpl');