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

	if(isset($_POST['ex_name']) AND isset($_POST['ex_vorname']) AND isset($_POST['ex_strasse']) AND isset($_POST['ex_plz']) AND isset($_POST['ex_ort']))
	{
		if ($_POST['urlaub']=='')
		{
		    $msg_urlaub = "Bitte geben Sie die - Anzahl Urlaubstage - ein";
		    $smarty->assign('msg_urlaub', $msg_urlaub);
		    $smarty->assign('msg_urlaub', $msg_urlaub);
		}
		if ($_POST['reisekosten']==1)
		{
			if ($_POST['ubernachtung']=="")
			{
			    $msg_ubernachtung = "Bitte geben Sie die - &Uuml;bernachtungsspesen t&auml;glich in h&ouml;he - ein";
			    $smarty->assign('msg_vergutung', $msg_ubernachtung);
			    $smarty->assign('msg_ubernachtung', $msg_ubernachtung);
			}
			if ($_POST['verpflegung']=="")
			{
			    $msg_verpflegung = "Bitte geben Sie die - Verpflegungsspesen t&auml;glich in h&ouml;he - ein";
			    $smarty->assign('msg_vergutung', $msg_verpflegung);
			    $smarty->assign('msg_verpflegung', $msg_verpflegung);
			}
		}
		if ($_POST['reisekosten']=="")
		{
			$msg_ubernachtung = "Bitte w&auml;hlen Sie die - Erstattung der Reisekosten - aus";
			$smarty->assign('msg_vergutung', $msg_ubernachtung);
			$smarty->assign('msg_ubernachtung', $msg_ubernachtung);
		}
    	if ($_POST['gehalt']=='')
		{
		    $msg_gehalt = "Bitte geben Sie die - Monatsbruttogehalt - ein";
		    $smarty->assign('msg_vergutung', $msg_gehalt);
		    $smarty->assign('msg_vergutung', $msg_gehalt);
		}
		if ($_POST['vertriebsgebiet']=='')
		{
		    $msg_bereich = "Bitte geben Sie hier - Vertriebsgebiet von - ein";
		    $smarty->assign('msg_tatig', $msg_bereich);
		    $smarty->assign('msg_bereich', $msg_bereich);
		}
		if ($_POST['bis']=='')
		{
		    $msg_bis = "Bitte geben Sie - Befristung bis zum - ein";
		    $smarty->assign('msg_dar', $msg_bis);
		    $smarty->assign('msg_bis', $msg_bis);
		}
		if ($_POST['beginn']=='')
		{
		    $msg_beginn = "Bitte geben Sie - befristet vom nach § 14 TzBfG - ein";
		    $smarty->assign('msg_dar', $msg_beginn);
		    $smarty->assign('msg_beginn', $msg_beginn);
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
	    $absatz1=$titel."".$_POST['vorname']." ".$_POST['name'];
	    $absatz2=$_POST['strasse'];
	    $absatz3=$_POST['plz']." ".$_POST['ort'];
	}
	if($_POST['geschlecht']==3)//Firma
	{
	   	$absatz1="Firma: ".$_POST['firma_name'];
	   	$absatz2_2="Vertreten durch: ".$_POST['vertreter'];
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

	if($_POST['reisekosten']==1)
	{
		if($_POST['verpflegung']!="")
		{
			$verpflegung="• Verpflegungsspesen arbeitstäglich nur bei Tätigkeit im Außendienst - ".$_POST['verpflegung']." € als Pauschale";
		}

		if($_POST['ubernachtung']!="")
		{
			$ubernachtung="• Übernachtungsspesen soweit diese tatsächlich anfallen und notwendig waren, ".$_POST['ubernachtung']." € als Pauschale.";
		}

	}
	if($_POST['reisekosten']==2)
	{
		$verpflegung="• kein Verpflegungsspesen.";

		$ubernachtung="• kein Übernachtungsspesen.";
	}
	if(!isset($msg_person) AND !isset($msg_name) AND !isset($msg_vorname) AND !isset($msg_strasse) AND !isset($msg_plz) AND !isset($msg_ort) AND !isset($msg_beginn) AND !isset($msg_bis) AND !isset($msg_bereich) AND !isset($msg_gehalt) AND !isset($msg_ubernachtung) AND !isset($msg_verpflegung) AND !isset($msg_urlaub))
	{
	  	require_once("rtf/anstell_vertrag_ad_befristet_rtf.php");
	}
}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 16;
	$log_funk->log_insert();
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
        #$user->email->setValue($_POST['email']);
        $user->firma_name->setValue($_POST['firma_name']);
        #$user->tel->setValue($_POST['tel']);
        #$user->fax->setValue($_POST['fax']);
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
$smarty->assign('contentTemplate', 'anstell_vertrag_ad_befristet.tpl');