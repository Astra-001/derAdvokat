<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if($_POST['sent']){
	if ($_POST['datum']==''){
	    $msg_datum = "Bitte geben Sie - Datum - ein";
	    $smarty->assign('msg', $msg_datum);
	    $smarty->assign('msg_datum', $msg_datum);
	}
	if ($_POST['ort']==''){
	    $msg_ort = "Bitte geben Sie den - Ort - ein";
	    $smarty->assign('msg', $msg_ort);
	    $smarty->assign('msg_ort', $msg_ort);
	}
	if($_POST['zahler']==''){
	    $msg_zahler = "Bitte geben Sie den - Zahlungssender- ein";
	    $smarty->assign('msg', $msg_zahler);
	    $smarty->assign('msg_zahler', $msg_zahler);
	}
	if($_POST['empfanger']==''){
	    $msg_empfanger = "Bitte geben Sie den - Empf&auml;nger - ein";
	    $smarty->assign('msg', $msg_empfanger);
	    $smarty->assign('msg_empfanger', $msg_empfanger);
	}
    if($_POST['betrag_worten']==''){
	    $msg_betrag_worten = "Bitte geben Sie den - Betrag in Worten - ein";
	    $smarty->assign('msg', $msg_betrag_worten);
	    $smarty->assign('msg_betrag_worten', $msg_betrag_worten);
	}
	if($_POST['betrag']==''){
	    $msg_betrag = "Bitte geben Sie den - Betrag in Euro - ein";
	    $smarty->assign('msg', $msg_betrag);
	    $smarty->assign('msg_betrag', $msg_betrag);
	}

    if(!isset($msg_betrag) AND !isset($msg_betrag_worten) AND !isset($msg_empfanger) AND !isset($msg_zahler) AND !isset($msg_ort) AND !isset($msg_datum)) {
        $text = '';
        $rtf = new Rtf();
$rtf->setMargins(2, 2, 2 , 2);
$sect = &$rtf->addSection();
$fontGrey = new Font(12, 'dejavusans', '#474747');
$fontTitle = new Font(18, 'dejavusans', '#000000');
$fontTitle->setBold(1);


$parMark = new ParFormat();
$parMark->setIndentLeft(1);
$parMark->setSpaceAfter(40);
$fontText = new Font(12, 'dejavusans', '#000000');

$parText = new ParFormat();
$parText->setIndentLeft(0);
$parText->setSpaceAfter(0);



$table = &$sect->addTable();
$parCellTabl = new ParFormat('center');
$parCellTabl->setSpaceBefore(5);
$table->addRows(1, 1);
$table->addColumn(5);
$table->setBackGroundOfCells('#CCCCCC', 1, 1, 1, 1);

$cell = &$table->getCell(1, 1);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText('QUITTUNG', $fontTitle, $parCellTabl);
$parEmpty = new ParFormat();
$parEmpty->setSpaceBetweenLines(1);
$sect->writeText('<br />', new Font(), $parEmpty);
$table1 = &$sect->addTable();
$parCellTabl = new ParFormat('left');
$parCellTabl->setSpaceBefore(5);
$table1->addRows(4, 0.8);
$table1->addColumn(15);
$table1->addColumn(2);
$table1->setBackGroundOfCells('#CCCCCC', 1, 1, 4, 2);

$cell = &$table1->getCell(1, 1);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText('<b>Den Betrag in Höhe von</b>', $fontText, $parCellTabl);

$cell = &$table1->getCell(1, 2);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText($_POST['betrag'].' €', $fontText, $parCellTabl);

$cell = &$table1->getCell(2, 1);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText('<b>Betrag in Worten</b>', $fontText, $parCellTabl);

$cell = &$table1->getCell(2, 2);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText($_POST['betrag_worten'].' €', $fontText, $parCellTabl);

$cell = &$table1->getCell(3, 1);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText('<b>brutto habe ich</b>', $fontText, $parCellTabl);

$cell = &$table1->getCell(3, 2);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText($_POST['empfanger'], $fontText, $parCellTabl);

$cell = &$table1->getCell(4, 1);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText('<b>von (Zahler)</b>', $fontText, $parCellTabl);

$cell = &$table1->getCell(4, 2);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText($_POST['zahler'], $fontText, $parCellTabl);

$sect->writeText('erhalten.<br />', $fontText, $parText);


$table2 = &$sect->addTable();
$table2->addRows(1, 0.8);
$table2->addColumn(8.5);
$table2->addColumn(8.5);
$table2->setBackGroundOfCells('#CCCCCC', 1, 1, 1, 2);

$cell = &$table2->getCell(1, 1);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText("<b>".$_POST['datum']."</b>", $fontText, $parCellTabl);

$cell = &$table2->getCell(1, 2);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, true);
$cell->writeText($_POST['ort'], $fontText, $parCellTabl);

$parEmpty->setSpaceBetweenLines(1);
$sect->writeText('<br />', new Font(), $parEmpty);
$absatz = "Unterschrift: _______________________________________";
$sect->writeText($absatz, $fontText, $parText);


$rtf->sendRtf('quittung_'.date('Y-m-d_H-i-s'));
  }
}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 47;
	$log_funk->log_insert();
}
$smarty->assign('contentTemplate', 'quittung.tpl');
?>
