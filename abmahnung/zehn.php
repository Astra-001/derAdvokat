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

  $betreff="Abmahnung wegen Schlechtleistung";
  $absatz_date= date("d. m. Y");
  
  
  if($_POST['zeit_verstoss']!="")
  {
  	$zeit_verstoss=" um ".$_POST['zeit_verstoss']." Uhr ";
  }

$rtf = new Rtf();
$rtf->setMargins(2, 2, 2 , 2);
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
$parDate->setIndentLeft(13);
$parDate->setSpaceAfter(0);
$parMark = new ParFormat();
$parMark->setIndentLeft(0);
$parMark->setSpaceBefore(10);
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
$parPar->setSpaceAfter(20);
	// Überschrift
	$sect->writeText($betreff.'', $fontTitle, new ParFormat());
	$parLine = new ParFormat();
	$parLine->setIndentLeft(0);
	$parLine->setIndentRight(3);
	$parLine->setSpaceAfter(15);
	$parLine->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
	$sect->writeText(' ', new Font(1, 'dejavusans', '#474747'), $parLine);
	$absatz_begruessung = "Sehr geehrte".$buchstabe." ".$var." ".$_POST['name'].",";
	$absatz1 = "wir mussten feststellen, dass Sie gegen Ihre arbeitsvertraglichen Pflichten verstoßen haben. Wir müssen Sie deswegen heute leider abmahnen. Dieser Abmahnung liegt folgender Sachverhalt zu Grunde:";
	$absatz2 = "Sie waren am ".$_POST['datum_verstoss'].$zeit_verstoss." im Bereich ".$_POST['einsatzort']." als ".$_POST['tatigkeit']." eingesetzt. Es stellt eine gewöhnliche Arbeitsleistung eines durchschnittlichen Mitarbeiters dar ".$_POST['normal_leistung'].". Ihre Tätigkeit am ".$_POST['datum_verstoss']." bemängeln wir, weil Sie ".$_POST['schlecht_leistung'].".";
	$absatz3 = "In Ihrer Anhörung vom ".$_POST['anhorungs_datum']." konnten Sie uns keine zufriedenstellende Begründung dafür geben, warum es Ihnen nicht möglich gewesen sein soll, eine durchschnittliche Arbeitsleistung abzuliefern. Die von Ihnen benannten Entschuldigungsgründe für die Schlechtleistung können wir nicht akzeptieren. ";
	$absatz4 = "Wir weisen Sie heute auch noch einmal schriftlich darauf hin, dass wir von unseren Mitarbeitern gerne überdurchschnittliche Leistungen sehen, diese jedoch keineswegs voraussetzen. Grundlage des Arbeitsvertrages mit Ihnen ist eine durchschnittliche Leistungserbringung. Die von Ihnen gezeigten Leistungen, die wir mit dieser Abmahnung rügen, entsprechen nicht den geforderten durchschnittlichen Leistungen und stellen daher einen Verstoß gegen Ihre Verpflichtungen als Arbeitnehmer dar. Ein solches Verhalten werden wir nicht tolerieren können.";
	$absatz5 = "Außerdem weisen wir Sie ausdrücklich darauf hin, dass Sie im Wiederholungsfall mit arbeitsrechtlichen Konsequenzen, bis hin zur Kündigung Ihres Arbeitsverhältnisses rechnen müssen. ";
	$absatz6 = "Eine Kopie dieser Abmahnung legen wir in Ihrer Personalakte ab.";
	$absatz7 = "Mit freundlichen Grüßen";
	$sect->writeText(''.$absatz_begruessung.'', $fontPar, $parPar);
	$sect->writeText($absatz1, $fontPar, $parPar);
	$sect->writeText($absatz2, $fontPar, $parPar);
	$sect->writeText($absatz3, $fontPar, $parPar);
	$sect->writeText($absatz4, $fontPar, $parPar);
	$sect->writeText($absatz5, $fontPar, $parPar);
	$sect->writeText($absatz6.'', $fontPar, $parPar);
	$sect->writeText($absatz7, $fontPar, $parPar);

	$table1 = &$sect->addTable();
    $parCellTabl = new ParFormat();
    $parCellTabl->setSpaceBefore(5);
	$table1->addRows(1, 2);
    $table1->addRows(1, 2);
	$table1->addRows(1, 2);
	$table1->addRows(1, 2);
    $table1->addColumn(6);
    $table1->addColumn(4);
    $table1->addColumn(6);
    $cell = &$table1->getCell(2, 1);
    $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
    $cell->writeText('(Ort, Datum)', $fontPar, $parCellTabl);

    $cell = &$table1->getCell(2, 3);
    $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
    $cell->writeText('(Arbeitgeber)', $fontPar, $parCellTabl);

	$cell = &$table1->getCell(3, 1);
	$cell->writeText('Abmahnung erhalten am:', $fontPar, $parCellTabl);
		
    $cell = &$table1->getCell(4, 1);
    $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
    $cell->writeText('(Unterschrift Mitarbeiter)', $fontPar, $parCellTabl);

	$foot = &$sect->addFooter('all');
    $foot->setPosition(2);
    $seite="Seite <pagenum /> von 2";
    $foot->writeText($seite, $fontPar, $parSeite);
    
$rtf->sendRtf('zehn_'.date('Y-m-d_H-i-s'));
?>
