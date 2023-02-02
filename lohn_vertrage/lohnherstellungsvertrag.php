<?php
if(!defined('INDEX_LOAD')) {
    header('Location: index.php');
}

if ($_SESSION['user']['status'] < STATUS_ACTIVE_AGB)
{
    header('Location: index.php');
}
$user = new mysqlTable($database, 'user');

show($user, $smarty);

if($_POST['lohnherstellungsvertrag'])
{
	if ($_POST['ex_ort']=='')
	{
		$ort=ORT;
	    $smarty->assign('msg_vertragspartner', $ort);
	}
	if ($_POST['ex_plz']=='')
	{
		$plz=PLZ;
	    $smarty->assign('msg_vertragspartner', $plz);
	}
	if ($_POST['ex_strasse']=='')
	{
		$strasse=STRASSE;
	    $smarty->assign('msg_vertragspartner', $strasse);
	}
	if ($_POST['ex_anrede']==3 AND $_POST['ex_vertreter']=="")
	{
		$vertretung=VERTRETUNG;
	    $smarty->assign('msg_vertragspartner', $vertretung);
	}

	if ($_POST['ex_anrede']==3 AND $_POST['ex_firmen_name']=="")
	{
		$firmenname=FIRMENNAME;
	    $smarty->assign('msg_vertragspartner', $firmenname);
	}
	if ($_POST['geschlecht']==3 AND $_POST['vertreter']=="")
	{
		$vertretung=VERTRETUNG;
	    $smarty->assign('msg_eigene_daten', $vertretung);
	}
	if ($_POST['geschlecht']==3 AND $_POST['firma_name']=="")
	{
		$firmenname=FIRMENNAME;
	    $smarty->assign('msg_eigene_daten', $firmenname);
	}
	if ($_POST['ex_anrede']!=3 AND $_POST['ex_vorname']=='')
	{
		$vorname=VORNAME;
	    $smarty->assign('msg_vertragspartner', $vorname);
	}
	if ($_POST['ex_anrede']!=3 AND $_POST['ex_name']=='')
	{
		$name=NAME;
	    $smarty->assign('msg_vertragspartner', $name);
	}
	if (!$_POST['person'])
	{
	    $smarty->assign('msg_vertragspartner', AUFTRAG_GEBER_NEHMER);
	}

	//PDF INHALT
	if($_POST['person']==1)
	{
	    if($_POST['ex_anrede']!=3)
	    {
	    	switch($_POST['ex_anrede'])
	    	{
	    		case '1': $anrede='Herrn';
		    	$artikel="Der";break;
	    		case '2': $anrede='Frau';
		    	$artikel="Die";break;
	    	}
			if($_POST['ex_titel']!="")
			{
				$ex_titel=$_POST['ex_titel']." ";
			}
	    	$absatz1_0=$anrede;
	    	$absatz1=$ex_titel."".$_POST['ex_vorname']." ".$_POST['ex_name'];
	    	$absatz2=$_POST['ex_strasse'];
	    	$absatz3=$_POST['ex_plz']." ".$_POST['ex_ort'];

	    	$p1=$absatz1_0." ".$absatz1;
	    }
	    if($_POST['ex_anrede']==3)
	    {
	    	$absatz1="Firma ".$_POST['ex_firmen_name'];
	    	$absatz2_2="vertreten durch ".$_POST['ex_vertreter'];
	    	$absatz2=$_POST['ex_strasse'];
	    	$absatz3=$_POST['ex_plz']." ".$_POST['ex_ort'];

	    	$artikel="Die";
	    	$p1=$absatz1.", ".$absatz3.", ";
	    }

		//Zweite Person

    	if($_POST['geschlecht']!=3)
	    {
			switch($_POST['geschlecht'])
		    {
		    	case '1': $anrede='Herrn';
		    	$endung=" des";break;
		    	case '2': $anrede='Frau';
		    	$endung=" der";break;
		    }
	    	if($_POST['titel']!="")
			{
				$titel=$_POST['titel']." ";
			}
		    $absatz4_0=$anrede;
		    $absatz4=$titel."".$_POST['vorname']." ".$_POST['name'];
		    $absatz5=$_POST['strasse'];
		    $absatz6=$_POST['plz']." ".$_POST['ort'];

		    $p2=$absatz4_0." ".$absatz4;
	    }
	    if($_POST['geschlecht']==3)//Firma
	    {
	    	$absatz4="Firma ".$_POST['firma_name'];
	    	$absatz5_2="vertreten durch ".$_POST['vertreter'];
	    	$absatz5=$_POST['strasse'];
	    	$absatz6=$_POST['plz']." ".$_POST['ort'];

	    	$endung=" der";

	    	$p2=$absatz4.", ".$absatz6.", ";
	    }
	}
	if($_POST['person']==2)
	{
	    if($_POST['geschlecht']!=3)
	    {
			switch($_POST['geschlecht'])
		    {
		    	case '1': $anrede='Herrn';
		    	$artikel="Der";break;
	    		case '2': $anrede='Frau';
		    	$artikel="Die";break;
		    }
	    	if($_POST['titel']!="")
			{
				$titel=$_POST['titel']." ";
			}
		    $absatz1_0=$anrede;
		    $absatz1=$titel."".$_POST['vorname']." ".$_POST['name'];
		    $absatz2=$_POST['strasse'];
		    $absatz3=$_POST['plz']." ".$_POST['ort'];

		    $p1=$absatz1_0." ".$absatz1;
	    }
	    if($_POST['geschlecht']==3)//Firma
	    {
	    	$absatz1="Firma ".$_POST['firma_name'];
	    	$absatz2_2="vertreten durch ".$_POST['vertreter'];
	    	$absatz2=$_POST['strasse'];
	    	$absatz3=$_POST['plz']." ".$_POST['ort'];

	    	$endung=" der";
	    	$artikel="Die";
	    	$p1=$absatz1.", ".$absatz3.", ";
	    }

	    //Zweite Person

		if($_POST['ex_anrede']!=3)//Herr Frau UNTEN
	    {
	    	switch($_POST['ex_anrede'])
	    	{
		    	case '1': $anrede='Herrn';
		    	$endung=" des";break;
		    	case '2': $anrede='Frau';
		    	$endung=" der";break;
	    	}
	    	if($_POST['ex_titel']!="")
			{
				$ex_titel=$_POST['ex_titel']." ";
			}
	    	$absatz4_0=$anrede;
	    	$absatz4=$ex_titel."".$_POST['ex_vorname']." ".$_POST['ex_name'];
	    	$absatz5=$_POST['ex_strasse'];
	    	$absatz6=$_POST['ex_plz']." ".$_POST['ex_ort'];

	    	$p2=$absatz4_0." ".$absatz4;
	    }
	    if($_POST['ex_anrede']==3) //Firma
	    {
	    	$absatz4="Firma ".$_POST['ex_firmen_name'];
	    	$absatz5_2="vertreten durch ".$_POST['ex_vertreter'];
	    	$absatz5=$_POST['ex_strasse'];
	    	$absatz6=$_POST['ex_plz']." ".$_POST['ex_ort'];

	    	$endung=" der";

	    	$p2=$absatz4.", ".$absatz6.", ";
	    }
	}
	if(!isset($_POST['verpackung']))
	{
	    $smarty->assign('msg_verpackung', LOHN_VERPACKUNG);
	}
	if(!isset($_POST['rohstoffe_einkauf']))
	{
	    $smarty->assign('msg_rohstoffe_einkauf', LOHN_ROHSTOFF_EINKAUF);
	}
	if($_POST['verpackung']==2)
	{
		if(!isset($_POST['verpackungsschritte_abfuellen']) AND !isset($_POST['verpackungsschritte_verschliessen']) AND !isset($_POST['verpackungsschritte_etiketieren']) AND !isset($_POST['verpackungsschritte_kennziefern']))
		{
			$verpackungsschritte=LOHN_MINDEST_AUSWAHL_VERPACKUNG;
		    $smarty->assign('msg_verpackung', $verpackungsschritte);
		}
	}


	if(!isset($_POST['produktabholung']) AND !isset($_POST['versandrisiko']))
	{
		$smarty->assign('msg_lieferung', LOHN_VERSANDRISIKO_ABHOLUNG);
	}

	if(!isset($_POST['versandrisiko']) AND !isset($_POST['produktabholung']))
	{
		$smarty->assign('msg_lieferung', LOHN_VERSANDRISIKO_LIEFERUNG);
	}


	if(!isset($_POST['haftung_gewinn']) AND !isset($_POST['haftung_ruckruf']) AND !isset($_POST['haftung_geldbuss']) AND !isset($_POST['haftung_gutachter']))
	{
		$haftung=LOHN_HAFTUNG;
	    $smarty->assign('msg_haftung', $haftung);
	}
	if($_POST['frist']=='')
	{
		$frist=LOHN_FRIST;
	    $smarty->assign('msg_beendigung', $frist);
	}
	if(!isset($_POST['anlage_1']) AND !isset($_POST['anlage_2']) AND !isset($_POST['anlage_3']) AND !isset($_POST['anlage_4']) AND !isset($_POST['anlage_5']))
	{
		$anlagen=LOHN_ANLAGEN;
	    $smarty->assign('msg_anlagen', $anlagen);
	}
	/*if($_POST['auftragnehmer']=='')
	{
		$auftragnehmer=LOHN_AUFTRAGNEHMER;
	    $smarty->assign('msg_gerichtstand', $auftragnehmer);
	}
	if($_POST['auftraggeber']=='')
	{
		$auftraggeber=LOHN_AUFTRAGGEBER;
	    $smarty->assign('msg_gerichtstand', $auftraggeber);
	}
	if($_POST['beklagter']=='')
	{
		$beklagter=LOHN_BEKLAGTEN;
	    $smarty->assign('msg_gerichtstand', $beklagter);
	}*/

	if(!isset($_POST['auftragnehmer']) AND !isset($_POST['auftraggeber']) AND !isset($_POST['beklagten']))
	{
		$beklagter=LOHN_BEKLAGTEN;
	    $smarty->assign('msg_gerichtstand', $beklagter);
	}

	#$absatz_a=$artikel." ".$p1." einerseits und ".$p2." andererseits haben unter dem ".$_POST['beginn_darlehen']." einen Darlehensvertrag über eine Darlehenssumme in Höhe von ".$_POST['darlehen_summe']." €, nebst ".$_POST['zinssatz']." v. H. Jahreszins geschlossen.";

	if(isset($_POST['person']) && !isset($name) && !isset($vorname) && !isset($strasse) && !isset($plz) && !isset($ort) && !isset($firmenname) && !isset($vertretung) && isset($_POST['rohstoffe_einkauf']) && isset($_POST['verpackung']) && !isset($verpackungsschritte) && !isset($haftung) && !isset($frist) && !isset($anlagen) && !isset($beklagter))
	{
		switch(1)
		{
			case 1: require_once("rtf/lohnherstellungsvertrag_rtf.php");break;
		}
	}
}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 23;
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

    $smarty->assign('contentTemplate', 'lohnherstellungsvertrag.tpl');
}
$smarty->assign('status',$_SESSION['user']['status']);
$smarty->assign('contentTemplate', 'lohnherstellungsvertrag.tpl');