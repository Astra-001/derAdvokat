<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if (!$_SESSION['user']['status'])
{
    header('Location: /derAdvokat/index.php');
}
if($_POST['sent'])
{
  $eingabe_check=eingabe_check();

  if(strlen($eingabe_check))
  {
    $smarty->assign('error', $eingabe_check);
  }
}
else
{
	if(!$_POST['sent_pdf'])
	{
		// MONITORING RECHNER DB INSERT
		$log_funk = new log_funk($smarty,$database);
		$log_funk->mod = 26;
		$log_funk->log_insert();
	}
}
if($_POST['sent_pdf'])
{
  $eingabe_check_pdf=eingabe_check_pdf();

  if(strlen($eingabe_check_pdf))
  {
    $smarty->assign('error_pdf', $eingabe_check_pdf);
  }
  if($eingabe_check_pdf=="")
  {
    $smarty->assign('erfolg', "Eintrag Erfolgreich");
    #echo "BS-".$_POST['versteckt'];
    switch($_POST['versteckt'])    // Hier PDF Auswahl
    {
      case 1:   require_once("abmahnung/einz.php");break;
      case 2:   require_once("abmahnung/zwei.php");break;
      case 3:   require_once("abmahnung/drei.php");break;
      case 4:   require_once("abmahnung/vier.php");break;
      case 5:   require_once("abmahnung/fuenf.php");break;
      case 6:   require_once("abmahnung/sechs.php");break;
      case 7:   require_once("abmahnung/sieben.php");break;
      case 8:   require_once("abmahnung/acht.php");break;
      case 9:   require_once("abmahnung/neun.php");break;
      case 10:  require_once("abmahnung/zehn.php");break;
      case 11:  require_once("abmahnung/elf.php");break;
    }
  }
}


switch($_POST['abmahnung'])
{
  case 1: $bs_drei=1; $art="Zusp&auml;tkommens";
  $mod=27; break;

  case 2: $bs_drei=2; $art="Fehlens in der Berufsschule";
  $mod=28; break;

  case 3: $bs_drei=3; $art="Anzeigepflichtverletzung";
  $mod=29; break;

  case 4: $bs_drei=4; $art="privater Internetnutzung";
  $mod=30; break;

  case 5: $bs_drei=5; $art="unerlaubter Nebent&auml;tigkeit";
  $mod=31; break;

  case 6: $bs_drei=6; $art="Versto&szlig; gegen das Rauchverbot";
  $mod=32; break;

  case 7: $bs_drei=7; $art="&Uuml;berschreitung der Pause";
  $mod=33; break;

  case 8: $bs_drei=8; $art="Versto&szlig; gegen das Alkoholverbot";
  $mod=34; break;

  case 9: $bs_drei=9; $art="Beleidigung";
  $mod=35; break;

  case 10: $bs_drei=10; $art="Schlechtleistung";
  $mod=36; break;

  case 11: $bs_drei=11; $art="unentschuldigten Fehlens";
  $mod=37; break;
}

if($_POST['abmahnung'])
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = $mod;
	$log_funk->log_insert();
}
if($_POST['versteckt'])
{
   $bs_drei=$_POST['versteckt'];
}
#echo "BS3-".$bs_drei;
$smarty->assign('bs_drei', $bs_drei);

if($_POST['versteckt_art'])
{
   $art=$_POST['versteckt_art'];
}
$smarty->assign('art', $art);

$smarty->assign('contentTemplate', 'abmahnung.tpl');

//Funktionen
function eingabe_check_pdf()
{
  if($_POST['vorname']=="")
  {
  	$meldung="Bitte geben Sie eine - Vorname - ein";
  	return $meldung;
  }
  if($_POST['name']=="")
  {
  	$meldung="Bitte geben Sie eine - Nachname - ein";
  	return $meldung;
  }
  if($_POST['strasse']=="")
  {
  	$meldung="Bitte geben Sie eine - Strasse - ein";
  	return $meldung;
  }
  if($_POST['plz']=="")
  {
  	$meldung="Bitte geben Sie ein - Postleitzahl - ein";
  	return $meldung;
  }
  if($_POST['ort']=="")
  {
  	$meldung="Bitte geben Sie ein - Ort - ein";
  	return $meldung;
  }
  if($_POST['datum_verstoss']=="")
  {
  	$meldung="Bitte geben Sie - Datum des Versto&szlig;es - ein";
  	return $meldung;
  }
  if($_POST['anhorungs_datum']=="")
  {
  	$meldung="Bitte geben Sie - Datum der Anh&ouml;rung - ein";
  	return $meldung;
  }
  if($_POST['ersch_tag']=="" AND $_POST['versteckt']=="1")
  {
  	$meldung="Bitte geben Sie - Uhrzeit des Erscheinens am fraglichen Tag - ein";
  	return $meldung;
  }
  if($_POST['reg_arb_beginn']=="" AND $_POST['versteckt']=="1")
  {
  	$meldung="Bitte geben Sie - Regul&auml;rer Beginn der Arbeitszeit - ein";
  	return $meldung;
  }
  if($_POST['privat_internet']=="" AND $_POST['versteckt']=="4")
  {
  	$meldung="Bitte w&auml;hlen Sie - Info über Verbot der Internetnutzung - aus";
  	return $meldung;
  }
  if($_POST['dauer_in_min']=="" AND $_POST['versteckt']=="4")
  {
  	$meldung="Bitte geben Sie - Dauer des Versto&szlig;es in Minuten - ein";
  	return $meldung;
  }
  if($_POST['neben_tagig']=="" AND $_POST['versteckt']=="5")
  {
  	$meldung="Bitte geben Sie - Nebent&auml;tigkeit als - ein";
  	return $meldung;
  }
  if($_POST['rauch_verbot']=="" AND $_POST['versteckt']=="6")
  {
  	$meldung="Bitte geben Sie - Bereich in dem geraucht wurde - ein";
  	return $meldung;
  }
  if($_POST['uber_in_min']=="" AND $_POST['versteckt']=="7")
  {
  	$meldung="Bitte geben Sie - &Uuml;berschreitung in Minuten - ein";
  	return $meldung;
  }
  if($_POST['pause_dauer']=="" AND $_POST['versteckt']=="7")
  {
  	$meldung="Bitte geben Sie - Regul&auml;re Dauer der Pause - ein";
  	return $meldung;
  }
  if($_POST['beleid_anrede']=="" AND $_POST['versteckt']=="9")
  {
  	$meldung="Bitte geben Sie - Anrede des Beleidigten - ein";
  	return $meldung;
  }
  if($_POST['beleid_name']=="" AND $_POST['versteckt']=="9")
  {
  	$meldung="Bitte geben Sie - Name des Beleidigten - ein";
  	return $meldung;
  }
  if($_POST['beleid_wort']=="" AND $_POST['versteckt']=="9")
  {
  	$meldung="Bitte geben Sie - Beleidigende Bezeichnung (verwendetes Wort) - ein";
  	return $meldung;
  }

  if($_POST['einsatzort']=="" AND $_POST['versteckt']=="10")
  {
  	$meldung="Bitte geben Sie - Einsatzort - ein";
  	return $meldung;
  }
  if($_POST['tatigkeit']=="" AND $_POST['versteckt']=="10")
  {
  	$meldung="Bitte geben Sie - T&auml;tigkeit - ein";
  	return $meldung;
  }
  if($_POST['normal_leistung']=="" AND $_POST['versteckt']=="10")
  {
  	$meldung="Bitte geben Sie - normales Leistungsspektrum - ein";
  	return $meldung;
  }
  if($_POST['schlecht_leistung']=="" AND $_POST['versteckt']=="10")
  {
  	$meldung="Bitte geben Sie - Sie leisteten schlecht weil Sie - ein";
  	return $meldung;
  }
  return $meldung;
}
function eingabe_check()
{
  if($_POST['abmahnung']=="")
  {
  	$meldung="Bitte treffen Sie eine Auswahl";
  	return $meldung;
  }
  return $meldung;
}
?>