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
$betreff="Abmahnung wegen Fehlens in der Berufsschule";
  $absatz_date= date("d. m. Y");

  if($_POST['zeit_verstoss']!="")
  {
    $zeit_verstoss=" um ".$_POST['zeit_verstoss']." Uhr";
  }

  if($_POST['fehlzeiten1']!="")
  {
     $ers="und am";
  }
  if($_POST['fehlzeiten1']!="" AND $_POST['fehlzeiten2']!="")
  {
     $ers=", ";
     $ers1=" und am";
  }

  if($_POST['fehlzeiten1']!="")
  {
    $fehl_date1=" ".$ers." ".$_POST['fehlzeiten1'];
  }
  if($_POST['zeit_fehlzeiten1']!="")
  {
    $fehl_zeit1=" um ".$_POST['zeit_fehlzeiten1']." Uhr";
  }
  
  if($_POST['fehlzeiten2']!="")
  {
    $fehl_date2=" ".$ers1." ".$_POST['fehlzeiten2'];
  }
  if($_POST['zeit_fehlzeiten2']!="")
  {
    $fehl_zeit2=" um ".$_POST['zeit_fehlzeiten2']." Uhr";
  }

$rtf = new Rtf();
$rtf->setMargins(2, 2, 2 , 2);
$sect = &$rtf->addSection();
$fontGrey = new Font(12, 'dejavusans', '#474747');
$fontTitle = new Font(14, 'dejavusans', '#000000');
$fontTitle->setBold();
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
	$sect->writeText($betreff.'', $fontTitle, new ParFormat());
	$parLine = new ParFormat();
	$parLine->setIndentLeft(0);
	$parLine->setIndentRight(3.5);
	$parLine->setSpaceAfter(20);
	$parLine->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
	$sect->writeText(' ', new Font(1, 'dejavusans', '#474747'), $parLine);
	$absatz_begruessung = "Sehr geehrte".$buchstabe." ".$var." ".$_POST['name'].",";
	$sect->writeText('<br />'.$absatz_begruessung.'<br />', $fontPar, $parPar);
	$absatz1 = "wir mussten feststellen, dass Sie gegen Ihre arbeitsvertraglichen Pflichten verstoßen haben. Wir müssen Sie deswegen heute leider abmahnen. Dieser Abmahnung liegt folgender Sachverhalt zu Grunde:";
	$sect->writeText($absatz1, $fontPar, $parPar);
	$absatz2 = "Die Berufsschule hat sich an uns gewandt und uns über Ihr Fehlverhalten informiert. Nach den dortigen Feststellungen sind Sie dem Unterricht am ".$_POST['datum_verstoss']."".$zeit_verstoss.$fehl_date1.$fehl_zeit1.$fehl_date2.$fehl_zeit2." unentschuldigt ferngeblieben. In Ihrer Anhörung vom ".$_POST['anhorungs_datum']." konnten Sie keine hinreichende Entschuldigung hierfür benennen.";
	$sect->writeText($absatz2, $fontPar, $parPar);
	$absatz3 = "Sie haben damit gegen Ihre Lernpflicht verstoßen. Als Auszubildender müssen Sie an den Ausbildungsmaßnahmen teilnehmen, für die Sie freigestellt sind. Hierzu zählt vor allem der Berufsschulunterricht, §§ 13 Satz 2 Nr. 2, 15 Satz 1 Berufsbildungsgesetz (BBiG).";
	$sect->writeText($absatz3, $fontPar, $parPar);
	$absatz4 = "Wir weisen Sie darauf hin, dass wir diese arbeitsvertraglichen Pflichtverletzungen nicht hinnehmen können. Wir fordern Sie deshalb auf, zukünftig nicht unentschuldigt zu fehlen. Im Wiederholungsfall müssen Sie mit arbeitsrechtlichen Konsequenzen, bis hin zu einer Kündigung Ihres Arbeitsverhältnisses rechnen.";
	$sect->writeText($absatz4, $fontPar, $parPar);
	$absatz6 = "Eine Kopie dieser Abmahnung legen wir in Ihrer Personalakte ab.";
	$sect->writeText($absatz6.'<br />', $fontPar, $parPar);
	$absatz7 = "Mit freundlichen Grüßen";
	$sect->writeText($absatz7."<br /><br />", $fontPar, $parPar);

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
        $foot->writeText($seite, $fontSeite, $parSeite);

$rtf->sendRtf('zwei_'.date('Y-m-d_H-i-s'));
?>
