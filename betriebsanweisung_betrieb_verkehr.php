<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
$user = new mysqlTable($database, 'user');
show($user, $smarty);

if($_POST['betriebsanweisung'])
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
	$log_funk->mod = 50;
	$log_funk->log_insert();
}

function show(&$user, &$smarty)
{
    $user->setWhere('id =' . $_SESSION['user']['id']);
    $user->setOrderBy('id DESC');
    $user->select();

    $records = $user->getRecords();

	$smarty->assign('user', $records[0]['firma_name']);

    $smarty->assign('contentTemplate', 'betriebsanweisung_betrieb_verkehr.tpl');
}

//Funktionen
function eingabe_check()
{
  if($_POST['firma_name']=="")
  {
  	$meldung="Feld - Firmenname - darf nicht leer sein";
  	return $meldung;
  }
  return $meldung;
}

function rtf_ausgabe()
{
	$betreff="B E T R I E B S A N W E I S U N G";
	$betreff_untersatz="zum Verhalten auf den innerbetrieblichen Verkehrswegen ";
	$betreff_untersatz_1="Regelung bei der Benutzung der innerbetrieblichen Verkehrswege auf dem Gelände ";
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

	$parMarkText = new ParFormat();
	$parMarkText->setIndentLeft(3);
	$parMarkText->setIndentRight(1);
	$parMarkText->setSpaceAfter(15);


	$parMark = new ParFormat();
	$parMark->setIndentLeft(0);
	$parMark->setSpaceBefore(10);

	$parMarkZahl = new ParFormat();
	$parMarkZahl->setIndentLeft(2);

	#$fontSeite = new Font(11, 'dejavusans', '#232323');
	$parSeite = new ParFormat();
	$parSeite->setIndentLeft(14);
		#$sect->writeText("<br /><br />".$var1, $fontPar, $parPar);

		//Date
	    #$sect->writeText($absatz_date.'<br /><br />', $fontPar, $parDate);
		$parPar->setSpaceAfter(15);
		// Überschrift
		$sect->writeText($betreff, $fontTitle, new ParFormat());
		$parPar->setSpaceBefore(10);
		$sect->writeText($betreff_untersatz, $fontPar, $parPar);
		$parPar->setSpaceBefore(5);
		$sect->writeText($betreff_untersatz_1, $fontPar, $parPar);
		$parLine = new ParFormat();
		$parLine->setIndentLeft(0);
		$parLine->setIndentRight(4);
		#$parLine->setSpaceAfter(15);
		#$parLine->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
		$sect->writeText(' ', new Font(1, 'dejavusans', '#474747'), $parLine);
		$absatz_firma = "der Firma ".$_POST['firma_name'];
		$sect->writeText($absatz_firma.'<br />', $fontPar, $parPar);
		$parLine->setSpaceAfter(15);
		$parMark = new ParFormat();


		$fontPar = new Font(12, 'dejavusans', '#000000');



		$table1 = &$sect->addTable();
	    $parCellTabl = new ParFormat();
	    $parCellTabl->setSpaceBefore(1);

	    $table1->addRows(0, 0);
		$table1->addRows(1, 1);

	    $table1->addColumn(17);

	    $cell = &$table1->getCell(1, 1);
	    $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);


	    $table2 = &$sect->addTable();
        $parCellTabl = new ParFormat();
        $parCellTabl->ParFormat('justify');
        $parCellTabl->setSpaceBefore(5);
        $table2->addRows(1, 1);
        $table2->addRows(2, 1);
        $table2->addRows(3, 1.5);
        $table2->addRows(4, 1.5);

        $table2->addColumn(1);
        $table2->addColumn(16);

        $cell = &$table2->getCell(1, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('1.', $fontText, $parCellTabl);

        $cell = &$table2->getCell(1, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('Auf dem gesamten Betriebsgelände gelten die Regelungen der StVO soweit nachfolgend nichts anderes geregelt ist.', $parMarkText, $parCellTabl);

        $cell = &$table2->getCell(2, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('2.', $fontText, $parCellTabl);

        $cell = &$table2->getCell(2, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('Flurfördergeräte stehen Fahrzeugen (LKW und PKW) gleich.', $parMarkText, $parCellTabl);


		$cell = &$table2->getCell(3, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('3.', $fontText, $parCellTabl);

        $cell = &$table2->getCell(3, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('Die Höchstgeschwindigkeit auf dem gesamten Betriebsgelände beträgt 10km/h.', $parMarkText, $parCellTabl);

        $cell = &$table2->getCell(4, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('4.', $fontText, $parCellTabl);

        $cell = &$table2->getCell(4, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('Soweit Verkehrswege markiert sind, sind diese Wege zu benutzen.', $parMarkText, $parCellTabl);

		$cell = &$table2->getCell(5, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('5.', $fontText, $parCellTabl);

        $cell = &$table2->getCell(5, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('Soweit Fußgängerwege vorhanden sind, müssen diese von Fußgängern auch benutzt werden. Lässt sich das Gehen Sie auf Wegen, die zugleich dem Fahrverkehr dienen nicht vermeiden, so ist vom Fußgänger stets die linke Seite des Fahrweges zu nutzen.', $parMarkText, $parCellTabl);

		$cell = &$table2->getCell(6, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('6.', $fontText, $parCellTabl);

        $cell = &$table2->getCell(6, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('Fahrzeugführer und Führer von Flurfördergeräten haben auf Fußgänger und neben den Verkehrswegen arbeitenden Personen Rücksicht zu nehmen.', $parMarkText, $parCellTabl);

		$cell = &$table2->getCell(7, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('7.', $fontText, $parCellTabl);

        $cell = &$table2->getCell(7, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('Alle Mitarbeiter haben darauf zu achten, dass im Weg liegende Gegenstände, z. B. Abfälle oder Verpackungsmaterial sofort beseitigt wird. Gleiches gilt selbstverständlich auch für auf dem Boden gelangte Flüssigkeiten wie Wasserpfützen oder Öl.', $parMarkText, $parCellTabl);


		$cell = &$table2->getCell(8, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('8.', $fontText, $parCellTabl);

        $cell = &$table2->getCell(8, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('Mängel, die nicht selbst sofort beseitigen werden können, sind unverzüglich dem Vorgesetzten zu melden.', $parMarkText, $parCellTabl);


		$cell = &$table2->getCell(9, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('9.', $fontText, $parCellTabl);

        $cell = &$table2->getCell(9, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell->writeText('Für alle Staplerfahrer, Kommissionierer und alle die im Einsatzbereich von Flurförderzeugen manuelle Tätigkeiten ausführen, ist das Tragen von Sicherheitsschuhen vorgeschrieben.', $parMarkText, $parCellTabl);


        $cell = &$table2->getCell(10, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, true);
        $cell->writeText('', $fontText, $parCellTabl);

        $cell = &$table2->getCell(10, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, true);
        $cell->writeText('', $fontText, $parCellTabl);

		$rtf->sendRtf('betriebsanweisung'.date('Y-m-d_H-i-s'));
}
?>