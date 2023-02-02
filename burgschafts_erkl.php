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

if($_POST['darlehen'])
{
	if($_POST['name']=="" OR strstr($_POST['name']," "))
	{
		$msg_fehler="Ihr Nachname darf nicht fehlen";
	}
	if ($_POST['zinssatz']=='')
	{
	    $msg_zins = "Bitte geben Sie - Zinssatz - ein";
	    $smarty->assign('msg_dar', $msg_zins);
	    $smarty->assign('msg_zins', $msg_zins);
	}
	if ($_POST['darlehen_summe']=='')
	{
	    $msg_summe = "Bitte geben Sie die - Darlehenssumme - ein";
	    $smarty->assign('msg_dar', $msg_summe);
	    $smarty->assign('msg_summe', $msg_summe);
	}
	if ($_POST['beginn_darlehen']=='')
	{
	    $msg_beginn = "Bitte geben Sie - Beginn des Darlehens - ein";
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

	if ($_POST['ex_anrede']==3 AND $_POST['ex_vertreter']=="")
	{
	    $msg_strasse = "Bitte geben Sie - ggf. vertreten durch - ein";
	    $smarty->assign('msg', $msg_strasse);
	    $smarty->assign('msg_strasse', $msg_strasse);
	}

	if ($_POST['geschlecht']==3 AND $_POST['vertreter']=="")
	{
	    $msg_strasse = "Bitte geben Sie - ggf. vertreten durch - ein";
	    $smarty->assign('msg_fehler', $msg_strasse);
	    $smarty->assign('msg_strasse', $msg_strasse);
	}

	if ($_POST['ex_anrede']==3 AND $_POST['ex_firmen_name']=="")
	{
	    $msg_strasse = "Bitte geben Sie - Firmenname - ein";
	    $smarty->assign('msg', $msg_strasse);
	    $smarty->assign('msg_strasse', $msg_strasse);
	}

	if ($_POST['geschlecht']==3 AND $_POST['firma_name']=="")
	{
	    $msg_strasse = "Bitte geben Sie - Firmenname - ein";
	    $smarty->assign('msg_fehler', $msg_strasse);
	    $smarty->assign('msg_strasse', $msg_strasse);
	}
	if ($_POST['ex_anrede']!=3 AND $_POST['ex_vorname']=='')
	{
	    $msg_vorname = "Bitte geben Sie - Vorname - ein";
	    $smarty->assign('msg', $msg_vorname);
	    $smarty->assign('msg_vorname', $msg_vorname);
	}
	if ($_POST['ex_anrede']!=3 AND $_POST['ex_name']=='')
	{
	    $msg_name = "Bitte geben Sie - Nachname - ein";
	    $smarty->assign('msg', $msg_name);
	    $smarty->assign('msg_name', $msg_name);
	}
	if (!$_POST['person'])
	{
	    $msg_person = "Bitte treffen Sie eine Auswahl - B&uuml;rge oder Darlehensgeber - ?";
	    $smarty->assign('msg', $msg_person);
	    $smarty->assign('msg_person', $msg_person);
	}

	//PDF INHALT
	if($_POST['person']==1)//BÜRGE
	{
	    if($_POST['ex_anrede']!=3)//Herr Frau OBEN
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
	    if($_POST['ex_anrede']==3) //Firma
	    {
	    	$absatz1="Firma: ".$_POST['ex_firmen_name'];
	    	$absatz2_2="vertreten durch ".$_POST['ex_vertreter'];
	    	$absatz2=$_POST['ex_strasse'];
	    	$absatz3=$_POST['ex_plz']." ".$_POST['ex_ort'];

	    	$artikel="Die";
	    	$p1=$absatz1.", ".$absatz3.", ";
	    }

		//Zweite Person

    	if($_POST['geschlecht']!=3)//Herr Frau UNTEN
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
	    	$absatz4="Firma: ".$_POST['firma_name'];
	    	$absatz5_2="vertreten durch ".$_POST['vertreter'];
	    	$absatz5=$_POST['strasse'];
	    	$absatz6=$_POST['plz']." ".$_POST['ort'];

	    	$endung=" der";

	    	$p2=$absatz4.", ".$absatz6.", ";
	    }
	}
	if($_POST['person']==2)//DARLEHENSGEBER
	{
	    if($_POST['geschlecht']!=3)//Herr Frau
	    {
			switch($_POST['geschlecht'])//OBEN
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
	    	$absatz1="Firma: ".$_POST['firma_name'];
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
	    	$absatz4="Firma: ".$_POST['ex_firmen_name'];
	    	$absatz5_2="vertreten durch ".$_POST['ex_vertreter'];
	    	$absatz5=$_POST['ex_strasse'];
	    	$absatz6=$_POST['ex_plz']." ".$_POST['ex_ort'];

	    	$endung=" der";

	    	$p2=$absatz4.", ".$absatz6.", ";
	    }
	}

	$absatz_a=$artikel." ".$p1." einerseits und ".$p2." andererseits haben unter dem ".$_POST['beginn_darlehen']." einen Darlehensvertrag über eine Darlehenssumme in Höhe von ".$_POST['darlehen_summe']." €, nebst ".$_POST['zinssatz']." v. H. Jahreszins geschlossen.";

	if(!isset($msg_person) AND !isset($msg_name) AND !isset($msg_vorname) AND !isset($msg_strasse) AND !isset($msg_plz) AND !isset($msg_ort) AND !isset($msg_beginn) AND !isset($msg_summe) AND !isset($msg_zins))
	{
		switch(1)#$_POST['document']
		{
			case 1: require_once("rtf/burgschafts_erkl_rtf.php");break;
			#case 2: require_once("word/burgschafts_erkl_word.php");break;
		}
	}
}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 20;
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
$smarty->assign('contentTemplate', 'burgschafts_erkl_form.tpl');