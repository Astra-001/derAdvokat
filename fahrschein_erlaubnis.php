<?php
if(!defined('INDEX_LOAD')) {
    header('Location: index.php');
}
if($_POST['sent'])
{
	if ($_POST['fuehrschein_klasse']=='')
	{
	    $msg_fuehrschein_klasse = "Bitte - F&uuml;hrerscheinklasse - eingeben";
	    $smarty->assign('msg', $msg_fuehrschein_klasse);
	    $smarty->assign('msg_fuehrschein_klasse', $msg_fuehrschein_klasse);
	}
	if($_POST['fahrzeug']=='')
	{
	    $msg_fahrzeug = "Bitte - zugeordnetes Fahrzeug- eingeben";
	    $smarty->assign('msg', $msg_fahrzeug);
	    $smarty->assign('msg_fahrzeug', $msg_fahrzeug);
	}
	/*if($_POST['abteilung']=='')
	{
	    $msg_abteilung = "Bitte - Abteilung - eingeben";
	    $smarty->assign('msg', $msg_abteilung);
	    $smarty->assign('msg_abteilung', $msg_abteilung);
	}*/
  if($_POST['vorname']=='')
	{
	    $msg_vorname = "Bitte geben Sie - Vorname - ein";
	    $smarty->assign('msg', $msg_vorname);
	    $smarty->assign('msg_vorname', $msg_vorname);
	}
	if($_POST['name']=='')
	{
	    $msg_name = "Bitte geben Sie - Nachname - ein";
	    $smarty->assign('msg', $msg_name);
	    $smarty->assign('msg_name', $msg_name);
	}

  if(!isset($msg_name) AND !isset($msg_vorname) AND !isset($msg_abteilung) AND !isset($msg_fahrzeug) AND !isset($msg_fuehrschein_klasse))
  {
    $rtf = new Rtf();
$rtf->setMargins(2, 2, 2 , 2);
$sect = &$rtf->addSection();
$fontGrey = new Font(12, 'dejavusans', '#474747');
$fontTitle = new Font(14, 'dejavusans', '#000000');
$fontTitle->setBold(1);


$parMark = new ParFormat();
$parMark->setIndentLeft(1);
$parMark->setSpaceAfter(40);
$fontText = new Font(12, 'dejavusans', '#000000');

$parText = new ParFormat();
$parText->setIndentLeft(0);
$parText->setSpaceAfter(10);



$table = &$sect->addTable();
$parCellTabl = new ParFormat('center');
$parCellTabl->setSpaceBefore(5);
$table->addRows(1, 0.8);
$table->addColumn(17);
$table->setBackGroundOfCells('#CCCCCC', 1, 1, 1, 1);

$cell = &$table->getCell(1, 1);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText('ERKLÄRUNG ZUM BESITZ EINER FAHRERLAUBNIS', $fontTitle, $parCellTabl);
$parEmpty = new ParFormat();
$parEmpty->setSpaceBetweenLines(2);
$sect->writeText('<br />', new Font(), $parEmpty);
$name_zusatz = "Name: ";
$name = $_POST['name'];
$sect->writeText("$name_zusatz<b>$name</b>", $fontText, $parText);

$vorname_zusatz = "Vorname: ";
$vorname = $_POST['vorname'];
$sect->writeText("$vorname_zusatz<b>$vorname</b>", $fontText, $parText);

if($_POST['abteilung']!='')
{
    $abteilung_zusatz = "Abteilung: ";
	$abteilung = $_POST['abteilung'];
	$sect->writeText("$abteilung_zusatz<b>$abteilung</b>", $fontText, $parText);
}
$fahrzeug_zusatz = "Zugeordnetes Kraftfahrzeug: ";
$fahrzeug = $_POST['fahrzeug'];
$sect->writeText("$fahrzeug_zusatz<b>$fahrzeug</b>", $fontText, $parText);

$fuehrschein_klasse_zusatz = "Führerscheinklasse(n): ";
$fuehrschein_klasse = $_POST['fuehrschein_klasse'];
$sect->writeText("$fuehrschein_klasse_zusatz<b>$fuehrschein_klasse</b><br /><br />", $fontText, $parText);
//$sect->writeText('<br />', new Font(), $parEmpty);
    $absatz1 = "Mit meiner Unterschrift erkläre ich, dass ich im Besitz einer gültigen Fahrerlaubnis – Führerscheinklasse(n) wie oben angegeben – für das Führen eines Kraftfahrzeugs bin. Ich bestätige ferner, dass \n";
  	$absatz2 = "ich meinen Arbeitgeber unverzüglich informieren werde, wenn mir aus rechtlichen oder tatsächlichen Gründen das Führen eines Kraftfahrzeugs nicht möglich ist. Die hierfür ursächlichen Umstände und Gründe brauche ich meinem Arbeitgeber nicht mitzuteilen;\n";
  	$absatz3 = "ich darüber informiert worden bin, dass das Führen eines firmeneigenen Fahrzeugs ohne gültige Fahrerlaubnis ein vorsätzliches bzw. grobfahrlässiges Verhalten darstellen kann. Ich bin mir im Klaren darüber, dass Schäden, die während des Führens eines Kraftfahrzeugs ohne gültige Fahrerlaubnis von mir schuldhaft verursacht worden sind, zu meinen Lasten gehen.\n";
  	$absatz4 = "Ort, Datum: _______________________________________";
  	$absatz5 = "Unterschrift: _______________________________________";
  	$absatz6 = "Vermerk der Personalabteilung:";
  	$absatz7 = "Die oben genannte hat heute ihre Fahrerlaubnis nebst einem amtlichen Ausweisdokument vorgelegt. Die dort vorgefundenen Eintragungen widersprechen nicht den oben gemachten Angaben.\n";
  	$absatz8 = "Ort, Datum: _______________________________________";
  	$absatz9 = "Unterschrift: _______________________________________";
	$parText->setSpaceAfter(10);
 $sect->writeText("$absatz1", $fontText, $parText);
 $table1 = &$sect->addTable();
 $table1->addRows(2);
 $table1->addColumn(1.3);
 $table1->addColumn(16);
 $cell = &$table1->getCell(1, 1);
 $cell->writeText("•", $fontText, $parMark);
 $cell = &$table1->getCell(1, 2);
 $cell->writeText("$absatz2<br />", $fontText, new ParFormat());
 $cell = &$table1->getCell(2, 1);
 $cell->writeText("•", $fontText, $parMark);
 $cell = &$table1->getCell(2, 2);
 $cell->writeText("$absatz3", $fontText, new ParFormat());
 //$sect->writeText("$absatz3", $fontText, $parMark);
 $parEmpty->setSpaceBetweenLines(1);
 $sect->writeText('<br />', new Font(), $parEmpty);
 $parText->setSpaceAfter(20);
 $sect->writeText("$absatz4", $fontText, $parText);
 $parText->setSpaceAfter(30);
 $sect->writeText("$absatz5", $fontText, $parText);
 $sect->writeText("<b>$absatz6</b><br />$absatz7", $fontText, $parText);
 $parText->setSpaceAfter(20);
 $sect->writeText("$absatz8", $fontText, $parText);
 $sect->writeText("$absatz9", $fontText, $parText);



$rtf->sendRtf('fuehrerscheinerlaubnis_'.date('Y-m-d_H-i-s'));
  }
}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 46;
	$log_funk->log_insert();
}
$smarty->assign('contentTemplate', 'fahrschein_erlaubnis.tpl');