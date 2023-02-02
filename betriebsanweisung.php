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
	$log_funk->mod = 49;
	$log_funk->log_insert();
}

function show(&$user, &$smarty)
{
    $user->setWhere('id =' . $_SESSION['user']['id']);
    $user->setOrderBy('id DESC');
    $user->select();

    $records = $user->getRecords();

	$smarty->assign('user', $records[0]['firma_name']);

    $smarty->assign('contentTemplate', 'betriebsanweisung.tpl');
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

	switch($_POST['geschlecht'])
	  {
	    case 1: $var="Herr";
	      $var1=$var."n";
	      $buchstabe="r"; break;
	    case 2: $var="Frau";
	      $var1=$var;
	      $buchstabe=" "; break;
	  }
	$betreff="B E T R I E B S A N W E I S U N G";
	$betreff_untersatz="zur Ladegut- und Fahrzeugsicherung";
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
	$parMarkText->setIndentLeft(1);
	$parMarkText->setIndentRight(1);
	$parMarkText->setSpaceAfter(15);

	$parMark = new ParFormat();
	$parMark->setIndentLeft(0);
	$parMark->setSpaceBefore(10);
	$fontSeite = new Font(12, 'dejavusans', '#232323');
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
		$parLine = new ParFormat();
		$parLine->setIndentLeft(0);
		$parLine->setIndentRight(4);
		$parLine->setSpaceAfter(15);
		#$parLine->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
		$sect->writeText(' ', new Font(1, 'dejavusans', '#474747'), $parLine);
		$absatz_firma = "der Firma ".$_POST['firma_name'];
		$sect->writeText($absatz_firma.'<br />', $fontPar, $parPar);
		$parMark = new ParFormat();
		$parMarkText->ParFormat('justify');

		$fontPar = new Font(12, 'dejavusans', '#000000');
		$fontPar->setBold();

		$paragraf_1="1. Achsbelastung";
		$sect->writeText($paragraf_1, $fontPar, $parMarkText);
		$fontPar = new Font(12, 'dejavusans', '#000000');

		$absatz1 = "Bei der Verladung aller Fahrzeuge, ob eigene, Kunden- oder Lieferantenfahrzeug, müssen der Fahrer und der mit der Ladung beschäftigte Mitarbeiter gesondert darauf achten, dass diese Fahrzeuge nicht überladen werden. Auch auf die Achsbelastung muss geachtet werden. Gegebenenfalls müssen hierzu die Fahrzeugpapiere eingesehen werden.";
		$sect->writeText($absatz1, $fontPar, $parMarkText);

		$fontPar->setBold();
		$paragraf_2="2. Ladegutsicherung ";
		$sect->writeText($paragraf_2, $fontPar, $parMarkText);
		$fontPar = new Font(12, 'dejavusans', '#000000');

		$absatz2 = "Es ist von dem Fahrer und dem mit der Beladung zuständigen Mitarbeiter darauf zu achten, dass die zu beladenden Fahrzeuge eine entsprechenden Ladegutsicherung haben und die Fahrzeuge auch entsprechend beladen wurden. Bei nicht nach DIN EN 12642 Code x2 zertifizierten Fahrzeugen müssen die benannten Mitarbeiter darauf achten, dass anderweitige Maßnahmen zur Sicherung des Ladeguts vorgenommen wurden (z. B. Rückhaltesystem oder Spanngurte einsetzen). ";
		$sect->writeText($absatz2, $fontPar, $parMarkText);


		$absatz3 = "Fahrzeuge, die keinerlei Ladegutsicherung mit sich führen, dürfen nicht belasten werden. In zweifelhaften Fällen ist Rücksprache mit der Führparkleitung oder Geschäftsleitung zu nehmen. Die Verkehrssicherheit des Fahrzeugs darf durch die Ladung nicht beeinträchtigt werden. ";
		$sect->writeText($absatz3, $fontPar, $parMarkText);

		$fontPar->setBold();
		$paragraf_3="3. Fahrzeugsicherheit bzw. Fahrtüchtigkeit ";
		$sect->writeText($paragraf_3, $fontPar, $parMarkText);
		$fontPar = new Font(12, 'dejavusans', '#000000');

		$absatz4 = "Verkehrsüblicher Betrieb von Fahrzeugen darf niemand schädigen oder gefährden.";
		$sect->writeText($absatz4, $fontPar, $parMarkText);
		$absatz5 = "Die Schichtleiter haben mit einer Sichtkontrolle vor bzw. nach der Verladung die Verkehrssicherheit in Augenschein zu nehmen. Wenn Fahrzeuge aus dem Fuhrpark Sicherheitsmängel aufweisen, müssen sie dafür Sorge tragen, dass diese Fahrzeuge erst eingesetzt werden, wenn die vorhandenen Mängel beseitigt sind.";
		$sect->writeText($absatz5, $fontPar, $parMarkText);

		$rtf->sendRtf('betriebsanweisung'.date('Y-m-d_H-i-s'));
}
?>