<?php
switch($_POST['geschlecht'])
  {
    case 1: $var="Herr";
      $var1=$var."n";
      $buchstabe="r"; break;
    case 2: $var="Frau";
      $var1=$var;
      $buchstabe=" "; break;
  }
$betreff="KÜNDIGUNG ZUM ".$_POST['daterez'];
$absatz_date= date("d. m. Y");

$rtf = new Rtf();
$rtf->setMargins(2, 5, 2 , 2);
$sect = &$rtf->addSection();
$fontGrey = new Font(12, 'dejavusans', '#474747');
$fontTitle = new Font(12, 'dejavusans', '#000000');
$fontTitle->setBold(1);
$fontPar = new Font(12, 'dejavusans', '#000000');
//$fontPar->setBold(1);
$parPar = new ParFormat();
$parPar->setIndentLeft(0);
$parPar->setSpaceAfter(0);
$parDate = new ParFormat();
$parDate->setIndentLeft(14);
$parDate->setSpaceAfter(0);
$parMark = new ParFormat('justify');
$parMark->setIndentLeft(0);
$parMark->setSpaceBefore(10);

	$sect->writeText($var1, $fontPar, $parPar);
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
	$parLine->setIndentRight(0);
	$parLine->setSpaceBefore(5);
	$parLine->setSpaceAfter(20);
	$parLine->setBorders(new BorderFormat(1, '#ACA899', 'single', 0), false, true, false, false);
	$sect->writeText(' ', new Font(1, 'dejavusans', '#474747'), $parLine);
	$absatz_begruessung = "Sehr geehrte".$buchstabe." ".$var." ".$_POST['name'].",";
	$sect->writeText($absatz_begruessung.'<br />', $fontPar, $parPar);
	$parPar = new ParFormat('justify');
	$parPar->setIndentLeft(0);
	$parPar->setSpaceAfter(15);	
	$absatz1 = "hiermit beendigen wir das mit Ihnen seit dem ".$_POST['datum_begin']." bestehende Arbeitsverhältnis fristgerecht zum nächstmöglichen Termin, nach unseren Unterlagen der ".$_POST['daterez'].".";
	$sect->writeText($absatz1.'', $fontPar, $parPar);
	$absatz2 = "Sie werden mit sofortiger Wirkung für die Dauer der Kündigungsfrist unter Anrechnung auf noch bestehende Urlaubsansprüche und Ansprüche auf Freizeitausgleich wegen eines etwa bestehenden Guthabens auf Ihrem Arbeitszeitkonto von der weiteren Erbringung der Arbeitsleistung unwiderruflich freigestellt. Die Anrechung der Freistellung auf den Resturlaub erfolgt hierbei ab sofort bis zum Erlöschen des Urlaubsanspruchs durch Erfüllung. Anschließend erfolgt die Freistellung unter Anrechung aus einem eventuell bestehenden Zeitguthaben auf Ihrem Arbeitszeitkonto.";
	$sect->writeText($absatz2.'', $fontPar, $parPar);
	$absatz3 = "Wir machen Sie darauf aufmerksam, dass Sie verpflichtet sind, sich zur Aufrechterhaltung von Ansprüchen auf Arbeitslosengeld unverzüglich nach Erhalt einer Kündigung persönlich beim Arbeitsamt arbeitssuchend zu melden.";
	$sect->writeText($absatz3.'', $fontPar, $parPar);
	$absatz4 = "Soweit Ihnen Arbeitskleidung oder Gegenstände überlassen wurden und sich noch in Ihrem Besitz befinden, bitten wir diese unverzüglich zurückzugeben. ";
	$sect->writeText($absatz4.'', $fontPar, $parPar);
	$parPar = new ParFormat();
	$parPar->setIndentLeft(0);
	$parPar->setSpaceAfter(0);
	$absatz7 = "Mit freundlichen Grüßen";
	$sect->writeText($absatz7."<br />", $fontPar, $parPar);

	$table1 = &$sect->addTable();
    $parCellTabl = new ParFormat();
    $parCellTabl->setSpaceBefore(5);
	$table1->addRows(1, 1);
    $table1->addRows(1, 2);
	
    $table1->addColumn(6);
    
    $cell = &$table1->getCell(2, 1);
    
    $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
    $cell->writeText('(Unterschrift Arbeitgeber)', $fontPar, $parCellTabl);
    
$rtf->sendRtf('kuendigung_ordent_mit_freist_'.date('Y-m-d_H-i-s'));
?>
