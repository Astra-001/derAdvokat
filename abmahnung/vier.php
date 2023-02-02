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

  $betreff="Abmahnung wegen privater Internetnutzung";
  $absatz_date= date("d. m. Y");

  if($_POST['zeit_verstoss']!="")
  {
    $zeit_verstoss=" um ".$_POST['zeit_verstoss']." Uhr, das heißt während Ihrer Arbeitszeit";
  }

  if($_POST['privat_internet']==1)
  {
     $aushandigung=", welche Ihnen ausgehändigt wurde";
  }
  if($_POST['privat_internet']==2)
  {
     $aushandigung=", die im Betrieb ausgehängt ist";
  }

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

	// Überschrift
	$sect->writeText($betreff.'', $fontTitle, new ParFormat());
	$parPar->setSpaceAfter(15);
	$parLine = new ParFormat();
	$parLine->setIndentLeft(0);
	$parLine->setIndentRight(3);
	$parLine->setSpaceAfter(15);
	$parLine->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
	$sect->writeText(' ', new Font(1, 'dejavusans', '#474747'), $parLine);
	$absatz_begruessung = "Sehr geehrte".$buchstabe." ".$var." ".$_POST['name'].",";
	$absatz1 = "wir mussten feststellen, dass Sie gegen Ihre arbeitsvertraglichen Pflichten verstoßen haben. Wir müssen Sie deswegen heute leider abmahnen. Dieser Abmahnung liegt folgender Sachverhalt zu Grunde:";
	$absatz2 = "Gemäß unserer allgemeinen Arbeitsanweisung über das Verbot der privaten Internetnutzung".$aushandigung.", ist die Nutzung des Internets zu privaten Zwecken während der Arbeitszeit verboten. Wir mussten feststellen, dass Sie am ".$_POST['datum_verstoss'].$zeit_verstoss.", für die Dauer von ".$_POST['dauer_in_min']." Minuten im Internet gesurft haben. Sie wurden am ".$_POST['anhorungs_datum']." zu dem Vorfall gehört und konnten keine überzeugende Entschuldigung für Ihr Verhalten vorbringen.";
	$absatz3 = "Wir weisen Sie darauf hin, dass es sich hierbei um einen schweren Verstoß gegen Ihre arbeitsvertraglichen Pflichten handelt. Es liegt ein Fall des Arbeitszeitbetrugs vor, wenn sich Mitarbeiter während der Arbeitszeit auf Kosten des Arbeitgebers Informationen für private Zwecke via Internet beschaffen. Wir fordern Sie dazu auf, sich zukünftig vertragsgemäß zu verhalten.";
	$absatz4 = "Wir machen mit dieser Abmahnung deutlich, dass wir das von Ihnen gezeigte Verhalten in unserem Betrieb nicht dulden. Es handelt sich um einen schwerwiegenden Verstoß gegen Ihre Verpflichtungen als Arbeitnehmer. Ein solches Verhalten werden wir nicht tolerieren können.";
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
    
$rtf->sendRtf('vier_'.date('Y-m-d_H-i-s'));
?>
