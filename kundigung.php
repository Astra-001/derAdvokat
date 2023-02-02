<?php

if(!defined('INDEX_LOAD')) {
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
		$log_funk->mod = 38;
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
      case 1:   require_once("kundigung/ausserordentl.php");break;
      case 2:   require_once("kundigung/ordentlmitfreist.php");break;
      case 3:   require_once("kundigung/ordentlohnefreist.php");break;

    }
  }
}

switch($_POST['kundigung'])
{
  case 1: $bs_drei=1; $art="Au&szlig;erordentlich";
  $mod = 39; break;

  case 2: $bs_drei=2; $art="Ordentlich mit Freistellung";
  $mod = 40; break;

  case 3: $bs_drei=3; $art="Ordentlich ohne Freistellung";
  $mod = 41; break;
}
if($_POST['kundigung'])
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

$smarty->assign('contentTemplate', 'kundigung.tpl');

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
  if($_POST['daterez']=="")
  {
  	$meldung="Bitte geben Sie - das richtige Datum - ein";
  	return $meldung;
  }

  return $meldung;
}
function eingabe_check()
{
  if($_POST['kundigung']=="")
  {
  	$meldung="Bitte treffen Sie eine Auswahl";
  	return $meldung;
  }
  return $meldung;
}
?>
