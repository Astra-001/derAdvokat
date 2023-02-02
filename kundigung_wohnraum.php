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
		$log_funk->mod = 42;
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
      case 1:   require_once("kundigung_wohnraum/vermieter.php");break;
      case 2:   require_once("kundigung_wohnraum/verwandten.php");break;
    }
  }
}

switch($_POST['kundigung'])
{
  case 1: $bs_drei=1; $art="Kündigung von Wohnraum wegen Eigenbedarfs eines Vermieter";
  $mod = 43; break;

  case 2: $bs_drei=2; $art="Kündigung von Wohnraum wegen Eigenbedarfs eines Verwandten";
  $mod = 44; break;
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

$smarty->assign('contentTemplate', 'kundigung_wohnraum.tpl');

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
  if($_POST['date_rent_rez']=="")
  {
      $meldung="Bitte geben Sie - das richtige Datum - ein";
      return $meldung;
  }
  if($_POST['date_rent_begin_in']=="")
  {
      $meldung="Bitte geben Sie - das richtige Datum - ein";
      return $meldung;
  }

    $verwand = $_POST['verwand'];
    $verwname = $_POST['verwname'];
    $verwshaft = $_POST['verwshaft'];
    $flag = 1;
    for ($i=0;$i<count($verwand);$i++) {
    if ($verwname[$i] == "") $flag=0;
    if ($verwshaft[$i] == "") $flag=0;
    if (!$flag) break;
    }

  if(!$flag)
  {
      $meldung="Bitte geben Sie - die richtigen Daten von den Verwandten - ein.";
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
