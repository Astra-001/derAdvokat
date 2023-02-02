<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

if($_POST['nicht_wieterbeschaftigung_nach_ausbildung'])
{
  $eingabe_check=eingabe_check();

  if(strlen($eingabe_check))
  {
    $smarty->assign('error', $eingabe_check);
  }
  else
  {
  	rtf_ausgabe();
  }
}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 48;
	$log_funk->log_insert();
}
$smarty->assign('contentTemplate', 'nicht_wieterbeschaftigung_nach_ausbildung.tpl');

//Funktionen
function eingabe_check()
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
  if($_POST['abschluss_prufung']=="")
  {
  	$meldung="Bitte geben Sie - Datum der Abschlussprüfung - ein";
  	return $meldung;
  }
  return $meldung;
}

function rtf_ausgabe()
{

switch($_POST['geschlecht'])
  {
    case 1: $var="Herr";
      $var1=$var."n";
      $buchstabe="r"; break;
    case 2: $var="Frau";
      $var1=$var;
      $buchstabe=" "; break;
  }
$betreff="Nichtweiterbeschäftigung nach der Ausbildung";
$absatz_date= date("d. m. Y");

$rtf = new Rtf();
$rtf->setMargins(2, 2, 2 , 2);
$sect = &$rtf->addSection();
$fontGrey = new Font(12, 'dejavusans', '#474747');
$fontTitle = new Font(14, 'dejavusans', '#000000');
$fontTitle->setBold(1);
$fontPar = new Font(12, 'dejavusans', '#000000');
//$fontPar->setBold(1);
$parPar = new ParFormat();
$parPar->setIndentLeft(0);
$parPar->setSpaceAfter(0);
$parDate = new ParFormat();
$parDate->setIndentLeft(14);
$parDate->setSpaceAfter(0);
$parMark = new ParFormat();
$parMark->setIndentLeft(0);
$parMark->setSpaceBefore(10);
$fontSeite = new Font(12, 'dejavusans', '#232323');
$parSeite = new ParFormat();
$parSeite->setIndentLeft(14);
	$sect->writeText("<br /><br /><br /><br />".$var1, $fontPar, $parPar);
	// Vorname Name
    $sect->writeText($_POST['vorname']." ".$_POST['name'], $fontPar, $parPar);

    // Straße
    $sect->writeText($_POST['strasse'], $fontPar, $parPar);

	// PLZ Ort
    $sect->writeText($_POST['plz']." ".$_POST['ort'].'<br />', $fontPar, $parPar);

	//Date
    $sect->writeText($absatz_date.'<br /><br />', $fontPar, $parDate);
	$parPar->setSpaceAfter(15);
	// Überschrift
	$sect->writeText($betreff, $fontTitle, new ParFormat());
	$parLine = new ParFormat();
	$parLine->setIndentLeft(0);
	$parLine->setIndentRight(4);
	$parLine->setSpaceAfter(20);
	$parLine->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
	$sect->writeText(' ', new Font(1, 'dejavusans', '#474747'), $parLine);
	$absatz_begruessung = "Sehr geehrte".$buchstabe." ".$var." ".$_POST['name'].",";
	$sect->writeText($absatz_begruessung.'<br />', $fontPar, $parPar);
	$parMark = new ParFormat();
	$parMark->ParFormat('justify');
	$absatz1 = "Sie werden am ".$_POST['abschluss_prufung']." den letzten Teil Ihrer Abschlussprüfung ablegen. Wenn Sie die Prüfung bestanden haben, ist ihre Ausbildung mit Bekanntgabe des Prüfungsergebnisses (voraussichtlich unmittelbar nach der letzten Prüfung) beendet.";
	$sect->writeText($absatz1, $fontPar, $parPar);
	$absatz2 = "Da wir Sie nicht in ein Arbeitsverhältnis übernehmen können, weisen wir darauf hin, dass Sie nach Bekanntgabe Ihres Prüfungsergebnisses keinerlei Arbeiten in unserem Unternehmen ausführen dürfen. Das gilt auch für den Fall, dass Sie von ehemaligen Ausbildern/Vorgesetzten einen entsprechenden Auftrag erhalten.";
	$sect->writeText($absatz2, $fontPar, $parPar);
	$absatz3 = "Nachdem Sie Kenntnis von Ihrem Ausbildungsergebnis erlangt und die Prüfung bestanden haben, räumen Sie bitte lediglich Ihren Arbeitsplatz. Selbstverständlich können Sie sich im angemessenen Rahmen von Ihren Kollegen und Kolleginnen verabschieden und sich zu diesem Zweck in unseren Räumlichkeiten aufhalten.";
	$sect->writeText($absatz3, $fontPar, $parPar);
	$absatz4 = "Wir müssen Ihnen aus rechtlichen Gründen diese Information zukommen lassen und bitten Sie, eine Ausfertigung dieses Schreibens an uns zurück zu geben und die andere zu Ihren Unterlagen zu nehmen.";
	$sect->writeText($absatz4, $fontPar, $parPar);
	$absatz5 = "Für Ihre Mitarbeit bedanken wir uns und für Ihre Prüfung wünschen wir Ihnen viel Erfolg!";
	$sect->writeText($absatz5, $fontPar, $parPar);

	$absatz7 = "Mit freundlichen Grüßen";
	$sect->writeText($absatz7."<br /><br /><br /><br />", $fontPar, $parPar);

	$table1 = &$sect->addTable();
    $parCellTabl = new ParFormat();
    $parCellTabl->setSpaceBefore(1);

    $table1->addRows(0, 0);
	$table1->addRows(1, 1);
	#$table1->addRows(1, 2);
    $table1->addColumn(6);
    $table1->addColumn(4);
    $table1->addColumn(6);
    $cell = &$table1->getCell(1, 1);
    $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
    $cell->writeText('(Ort, Datum)', $fontPar, $parCellTabl);

    $cell = &$table1->getCell(1, 3);
    $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
    $cell->writeText('(Arbeitgeber)', $fontPar, $parCellTabl);

    $foot = &$sect->addFooter('all');
        $foot->setPosition(2);
        $seite="Seite <pagenum /> von 1";
        $foot->writeText($seite, $fontSeite, $parSeite);

$rtf->sendRtf('nichtweiterbeschaeftigung_nach_der_ausbildung'.date('Y-m-d_H-i-s'));
#}


}
?>