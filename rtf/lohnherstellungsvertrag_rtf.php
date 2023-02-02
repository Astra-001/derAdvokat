<?php
$rtf = new Rtf();
$rtf->setMargins(1, 2, 1 , 0.1);
$sect = &$rtf->addSection();

$table = &$sect->addTable();
$table->addRows(1);
$table->addColumn(5);

/**** Left column ****/
$table->setBackGroundOfCells('#26467f', 1, 1, 1, 1);
$cell = &$table->getCell(1, 1);
$parSimple = new ParFormat('center');
$parEmpty = new ParFormat();
$parEmpty->setSpaceBetweenLines(26);
$cell->writeText('<br /><br /><br />Dok. 05.07.2010', new Font(9, 'dejavusans', '#FFFFFF'), $parSimple);
$cell->writeText('<br />', new Font(), $parEmpty);
$cell->writeText('© Kanzlei Strauch<br />www.derAdvokat.de', new Font(9, 'dejavusans', '#FFFFFF'), $parSimple);
$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

/**** Left column ****/

/**** Right column ****/
$fontGrey = new Font(12, 'dejavusans', '#474747');

$table->addColumn(19);
$cell = &$table->getCell(1, 2);
$parEmpty->setSpaceBetweenLines(7);
$cell->writeText('<br />', new Font(), $parEmpty);

$parRight = new ParFormat();
$parRight->setIndentLeft(1);

$fontTitle = new Font(14, 'dejavusans', '#000000');
$fontTitle->setBold(1);
$cell->writeText('LOHNHERSTELLUNGSVERTRAG', $fontTitle, $parRight);

$parEmpty->setSpaceBetweenLines(3);
$cell->writeText('<br />', new Font(), $parEmpty);

$cell->writeText('zwischen', $fontGrey, $parRight);
$parEmpty->setSpaceBetweenLines(1.5);
$cell->writeText('<br />', new Font(), $parEmpty);

$fontName = new Font(12, 'dejavusans', '#000000');
$fontName->setBold(1);

$cell->writeText("$absatz1_0<br />$absatz1<br />$absatz2<br />$absatz3<br />", $fontName, $parRight);

$cell->writeText("$absatz2_2", $fontName, $parRight);


$cell->writeText('nachfolgend Auftraggeber genannt,', $fontGrey, new ParFormat('center'));

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$parUnd = new ParFormat();
$parUnd->setIndentLeft(4);
$cell->writeText('und', $fontGrey, $parUnd);

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);
$cell->writeText("$absatz4_0<br />$absatz4<br />$absatz5<br />$absatz6<br />", $fontName, $parRight);

$cell->writeText("$absatz5_2", $fontName, $parRight);

$cell->writeText('nachfolgend Auftragnehmer genannt,', $fontGrey, new ParFormat('center'));

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$parRight->setSpaceAfter(5);
$cell->writeText('wird folgender Lohnherstellungsvertrag geschlossen.', $fontGrey, $parRight);

$parLine = new ParFormat();
$parLine->setIndentLeft(0.9);
$parLine->setIndentRight(5);
$parLine->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
$cell->writeText(' ', new Font(1, 'dejavusans', '#474747'), $parLine);

/**** Right column ****/
$sect->insertPageBreak();
//** TEXTS**//
$fontPar = new Font(12, 'dejavusans', '#000000');
$fontPar->setBold();
$parPar = new ParFormat();
$parPar->setIndentLeft(1.01);
$parPar->setIndentRight(1);
$parPar->setSpaceAfter(13);


$fontSeite = new Font(12, 'dejavusans', '#232323');
$parSeite = new ParFormat();
$parSeite->setIndentLeft(15);


$fontText = new Font(11, 'dejavusans', '#232323');
//$fontText->setBold();
$parText = new ParFormat();
$parText->setIndentLeft(1.01);
$parText->setIndentRight(1);
$parText->setSpaceAfter(15);
$parText->ParFormat('justify');

$parMarkText = new ParFormat();
$parMarkText->setIndentLeft(2);
$parMarkText->setIndentRight(1);
$parMarkText->setSpaceAfter(15);
$parMarkText->ParFormat('justify');
$parMText = new ParFormat();
$parMText->setIndentLeft(1.01);
$parMText->setIndentRight(1);
$parMText->setIndentFirst(1);
$parMText->setSpaceAfter(20);

    // Seite 2

$paragraf_1="§1. Gegenstand";
$paragraf_1_abs_1="a. Lohnherstellung";

$paragraf_1_abs_2="Der Auftraggeber beauftragt den Auftragnehmer mit der Herstellung und der Qualitätskontrolle des gemäß der Anlage 1 zu diesem Vertrag beschriebenen kosmetischen Produktes bzw. der beschriebenen Produkte, die der AG in Verkehr bringen möchte, - nachfolgend Produkt genannt. Die Vorschriften der einschlägigen nationalen und europäischen Rechtsvorschriften sind Basis für die Produktion von kosmetischen Mitteln und bilden den maßgeblichen Auslegungsrahmen für diesen Vertrag.Über die in diesem Vertrag benannten Bestimmungen hinaus, regeln die Vertragsparteien.";

$paragraf_1_3="folgende Anlagen sind Bestandteil des Vertrages:";
$paragraf_1_abs_3="• in der Anlage 1 die Produktspezifikation und die zu verwendeten Rohstoffe, sowie das zu verwendende Verpackungsmaterial;";
$paragraf_1_abs_4="• in der Anlage 2 die Preise und ggf. Staffellisten;";
$paragraf_1_abs_5="• in der Anlage 3 werden die Verantwortlichkeiten abgegrenzt;";
$paragraf_1_abs_6="• in der Anlage 4 die Qualitätsanforderungen, sowie die Qualitätskontroll- und Prüfmaßnahmen;";
$paragraf_1_abs_7="• in der Anlage 5 der Umgang mit Restmaterialien.";


$sect->writeText($paragraf_1, $fontPar, $parPar);
$sect->writeText($paragraf_1_abs_1, $fontText, $parText);
$sect->writeText($paragraf_1_abs_2, $fontText, $parText);
        
$sect->writeText($paragraf_1_3, $fontPar, $parPar);

if($_POST['anlage_1'])
{
	$sect->writeText($paragraf_1_abs_3, $fontText, $parMarkText);
}
if($_POST['anlage_2'])
{
	$sect->writeText($paragraf_1_abs_4, $fontText, $parMarkText);
}
if($_POST['anlage_3'])
{
	$sect->writeText($paragraf_1_abs_5, $fontText, $parMarkText);
}
if($_POST['anlage_4'])
{
	$sect->writeText($paragraf_1_abs_6, $fontText, $parMarkText);
}
if($_POST['anlage_5'])
{
	$sect->writeText($paragraf_1_abs_7, $fontText, $parMarkText);
}



if($_POST['produktentwiklungsaufnahme']==1)
{
	$paragraf_1_abs_2_satz_1="Der Auftraggeber stellt dem Auftragnehmer eine fertige Rezeptur des Produktes zur Verfügung. Der Auftragnehmer ist verpflichtet, bei dem Herstellungsprozess strengstens darauf zu achten, dass von der zur Verfügung gestellten Rezeptur nicht abgewichen wird und Verunreinigungen – soweit sie technisch vermeidbar sind – ausgeschlossen werden.";
    $sect->writeText($paragraf_1_abs_2_satz_1, $fontText, $parText);
}
if($_POST['produktentwiklungsaufnahme']==2)
{    
    $paragraf_1_abs_2_satz_1="Der Auftragnehmer wird für das Produkt eine fertige Rezeptur nach den Maßgaben des AG entwickeln. Bei der Entwicklung der Rezeptur darf der Auftragnehmer nur die Rohstoffe nach Maßgabe der Anlage 1 verwenden.\n";
    $sect->writeText($paragraf_1_abs_2_satz_1, $fontText, $parText);
}        
        
$paragraf_2="§2. Parteien";

$paragraf_2_abs_1="a. Auftraggeber";
$paragraf_2_abs_2="Der Auftraggeber stellt dem Auftragnehmer sämtliche Informationen, insbesondere Dokumente und Muster zur Verfügung, die zur ordnungsgemäßen Ausführung der Aufgabe erforderlich sind.";

$paragraf_2_abs_3="b. Auftragnehmer";
$paragraf_2_abs_4="Der Auftragnehmer  prüft die vom Auftraggeber zur Verfügung gestellten Informationen und versichert sofern er den Auftrag annimmt, dass er über die Kenntnisse, die Mittel, die Erfahrung und das kompetente Personal verfügt, das zur Erfüllung der vertraglichen Anforderungen erforderlich sind. Soweit eine behördliche Erlaubnis zur Herstellung der Produkte erforderlich ist, versichert der Auftragnehmer diese zu besitzen.";
$sect->writeText($paragraf_2, $fontPar, $parPar);
$sect->writeText($paragraf_2_abs_1, $fontText, $parText);
$sect->writeText($paragraf_2_abs_2, $fontText, $parText);
$sect->writeText($paragraf_2_abs_3, $fontText, $parText);
$sect->writeText($paragraf_2_abs_4, $fontText, $parText);        
        
$paragraf_2_abs_5="c. Dritte";
if($_POST['aufgaben_durch_dritte']==2)
{
	$paragraf_2_abs_6="• Es ist dem Auftragnehmer nicht gestattet, Aufgaben aus dem Vertrag durch Dritte ausführen zu lassen, wenn der Auftraggeber dies nicht auf Anfrage des Auftragnehmers schriftlich gestattet.";
}
if($_POST['aufgaben_durch_dritte']==1)
{
	$paragraf_2_abs_6="• Dem Auftragnehmer ist es gestattet, Aufgaben aus dem Vertrag auf Dritte zu übertragen, bzw. durch Dritte ausführen zu lassen.";
}

$paragraf_2_abs_7="Werden gemäß Satz 1 Aufgaben des Auftragnehmer aus diesem Vertrag von Dritten wahrgenommen, bleibt der Auftragnehmer gegenüber dem Auftraggeber für die Erfüllung aller Vertragspflichten verantwortlich. Der Dritte gilt als Erfüllungsgehilfe des Auftragnehmer.\n";

$sect->writeText($paragraf_2_abs_5, $fontText, $parText);
$sect->writeText($paragraf_2_abs_6, $fontText, $parMarkText);
$sect->writeText($paragraf_2_abs_7, $fontText, $parText);


$paragraf_3="§ 3 Rechte und Pflichten der Parteien";
$paragraf_3_abs_1="a) Herstellung nach GMP und Einhaltung der gesetzlichen Pflichten.";
$paragraf_3_abs_2="Der Auftragnehmer versichert, dass er fähig und in der Lage ist, die vereinbarten Aufgaben auszuführen; insbesondere, dass er über die erforderlichen Mittel und das geeignete Personal verfügt und bei der Umsetzung der Vertragsinhalte die Grundsätze der Guten Herstellungspraxis (GMP) einhalten werden.";
$paragraf_3_abs_3="Der Auftragnehmer kennt die gesetzlichen Regelungen zur Herstellung des Produkts und wird diese beachten.";

$paragraf_3_abs_4="b) Besichtigungserlaubnis des Auftraggebers für die Fertigungsstätten des Auftragnehmer- Der Auftragnehmer erlaubt dem Auftraggeber jederzeit seinen Betrieb, in dem das Produkt gefertigt wird, zu besichtigen.";

$sect->writeText($paragraf_3, $fontPar, $parPar);
$sect->writeText($paragraf_3_abs_1, $fontText, $parText);
$sect->writeText($paragraf_3_abs_2, $fontText, $parText);
$sect->writeText($paragraf_3_abs_3, $fontText, $parText);
$sect->writeText($paragraf_3_abs_4, $fontText, $parText);


$paragraf_4="§ 4 Verteilung der gesetzlichen Pflichten";
$paragraf_4_abs_1="a) Dokumentation – Rückgabe bzw. Aufbewahrungspflicht";
$paragraf_4_abs_2="aa. Der Auftragnehmer bestätigt dem Auftraggeber die ordnungsgemäße Herstellung jedes Loses (Charge) und stellt dem Auftraggeber eine Dokumentation gemäß dem in Auftragnehmerlage 4 festgelegten Umfang zur Verfügung. Der Auftragnehmer ist hierbei verpflichtet, dem Auftraggeber bei entsprechender Aufforderung sämtliche Originaldokumente an seinem Firmensitz vorzulegen und Kopien zur Verfügung zu stellen.";

if($_POST['dokumentation_ubergabe']==2)
{
	$paragraf_4_abs_3="Ausgenommen hiervon sind solche Dokumente, die Betriebsgeheimnisse oder fachspezifische Kenntnisse des Auftragnehmer offen legen würden. In diesen Fällen kann der Auftraggeber die Einsicht durch einen zur Verschwiegenheit verpflichteten Sachverständigen vornehmen lassen, der etwaige Betriebsgeheimnisse oder fachspezifische Kenntnisse des Auftragnehmer dem Auftraggeber oder sonstigen Personen nicht mitteilen darf. Können sich die Parteien auf einen Sachverständigen nicht einigen, werden sie die am Sitz des Auftragnehmer zuständige IHK um Benennung eines Sachverständigen bitten. Die Benennung des Sachverständigen durch die zuständige IHK ist für die Parteien bindend.";
}

$paragraf_4_abs_4="bb. Der Auftragnehmer ist verpflichtet Unterlagen, die einer Behörde vorzulegen sind, den Behörden zugänglich zu machen und die entsprechenden Unterlagen ggf. an die Behörde zu senden.";
$paragraf_4_abs_5="cc. In Fällen einer notwendigen Änderung der Anlage 4 (z. B. aufgrund von Gesetzesänderungen, neuere Rechtssprechung etc.) verpflichtet sich der Auftragnehmer, umgehend alle Dokumente entsprechend den notwendigen Änderungen anzupassen.";
$paragraf_4_abs_6="dd. Der Auftragnehmer bewahrt die Dokumente für jedes hergestellte Produkt gemäß der Anlage 4 für einen Zeitraum von 10 Jahren auf. Die weitere Erstellung der Dokumente zu den gesetzlich erforderlichen Produktinformationen liegt in dem Pflichtenbereich";

if($_POST['produktinformation']==1)
{
	$paragraf_4_abs_7="• des  Aufgragnehmers";
}
if($_POST['produktinformation']==2)
{
	$paragraf_4_abs_7="• des Auftraggebers";
}

$paragraf_4_abs_9="b) Überwachung";
$paragraf_4_abs_10="Die Mitteilungs- und Berichtspflichten an die zuständigen Behörden sind von dem";


if($_POST['behordenpflicht']==2)
{
	$paragraf_4_abs_11="• Auftraggeber";
}

if($_POST['behordenpflicht']==1)
{
	$paragraf_4_abs_11="• Auftragnehmer";
}

$paragraf_4_abs_13="wahrzunehmen. Demgemäss werden sämtliche, für die zuständigen Behörden aufgrund gesetzlicher Grundlage bereit zu stellenden Unterlagen beim der oben genannten Partei in der gesetzlich vorgeschriebenen Form aufbewahrt. Zur Verantwortlichkeit im Innenverhältnis der Parteien wird auf die Anlage 3 verwiesen.";

$paragraf_4_abs_14="c) Kennzeichnung";
$paragraf_4_abs_15="Der Aufgragnehmer stellt dem Aufgraggeber die INCI-Deklaration auf der Datenbasis seiner Rohstofflieferanten zur Verfügung. Der Aufgragnehmer haftet gegenüber dem Aufgraggeber nicht für Schäden aufgrund mangelhafter Daten, wenn ihm diese von seinem Lieferanten übermittelt wurden und nicht als fehlerhaft erkennbar waren. Der Aufgragnehmer verpflichtet sich in diesen Fällen, einen etwaigen Schadenersatzanspruch, der ihm gegenüber seinem Lieferanten erwächst, an den Aufgraggeber abzutreten. Tritt der Aufgragnehmer einen etwaigen Schadenersatzanspruch nicht an den Aufgraggeber ab, sei es weil er gute Vertragsbeziehungen zu seinem Lieferanten unterhält oder aus anderen Gründen, bleibt er gegenüber dem Aufgraggeber zum Schadenersatz verpflichtet.";

$paragraf_4_abs_16="d) Mindesthaltbarkeitsdatum des Produktes wird vom";

if($_POST['produkthaltbarkeit']==2)
{
	$paragraf_4_abs_17="• Auftraggeber";
}

if($_POST['produkthaltbarkeit']==1)
{
	$paragraf_4_abs_17="• Auftragnehmer";
}


$paragraf_4_abs_19="vorgegeben. Auf Anforderung des Auftraggeber führt der Auftragnehmer Stabilitätsuntersuchungen in der vorgesehenen Endverpackung durch.";



$sect->writeText($paragraf_4, $fontPar, $parPar);
$sect->writeText($paragraf_4_abs_1, $fontText, $parText);
$sect->writeText($paragraf_4_abs_2, $fontText, $parMarkText);

if($_POST['dokumentation_ubergabe']==2)
{
	$sect->writeText($paragraf_4_abs_3, $fontText, $parMarkText);
}
$sect->writeText($paragraf_4_abs_4, $fontText, $parMarkText);
$sect->writeText($paragraf_4_abs_5, $fontText, $parMarkText);
$sect->writeText($paragraf_4_abs_6, $fontText, $parMarkText);
$sect->writeText($paragraf_4_abs_7, $fontText, $parMarkText);
$sect->writeText($paragraf_4_abs_9, $fontText, $parText);
$sect->writeText($paragraf_4_abs_10, $fontText, $parText);
$sect->writeText($paragraf_4_abs_11, $fontText, $parMarkText);
$sect->writeText($paragraf_4_abs_13, $fontText, $parText);	    
$sect->writeText($paragraf_4_abs_14, $fontText, $parText);
$sect->writeText($paragraf_4_abs_15, $fontText, $parText);
$sect->writeText($paragraf_4_abs_16, $fontText, $parText);
$sect->writeText($paragraf_4_abs_17, $fontText, $parMarkText);
$sect->writeText($paragraf_4_abs_19, $fontText, $parText);


$paragraf_5="§ 5 Herstellungsprozess";
$paragraf_5_abs_1="a) Einkauf der zu verwendenden Stoffe";

if($_POST['rohstoffe_einkauf']==1)
{
	$paragraf_5_abs_2="Der AG stellt sämtliche Rohstoffe die zur Herstellung des Produktes erforderlich sind, zur Verfügung und garantiert deren ordnungsgemäße Beschaffenheit. Er prüft die Unversehrtheit der Gebinde und Verschlüsse, die korrekte Kennzeichnung und die diesbezügliche Identität. Nach Anlieferung bei dem AN, ist dieser für die ordnungsgemäße Lagerung der Rohstoffe verantwortlich. ";
	$paragraf_5_abs_3="Werden die Rohstoffe von einem Dritten auf Bestellung des AG an den AN geliefert, stellt der AN sicher, dass die Gebinde und Verschlüsse unversehrt sind, die Kennzeichnung korrekt und die Rohstoffe mit der Lieferscheinbezeichnung identisch ist.";
}

if($_POST['rohstoffe_einkauf']==2)
{
	$paragraf_5_abs_2="Der AN stellt sämtliche Rohstoffe die zur Herstellung des Produktes erforderlich sind, zur Verfügung und haftet für deren ordnungsgemäße Beschaffenheit. Er prüft die Unversehrtheit der Gebinde und Verschlüsse, die korrekte Kennzeichnung und die diesbezügliche Identität.";
}

if($_POST['rohstoffe_einkauf']==3)
{
	$paragraf_5_abs_2="Der AG stellt die in der Anlage 1 gesondert gekennzeichneten Rohstoffe zur Verfügung. Die weiteren Rohstoffe werden von dem AN besorgt. Jede Partei trägt die Verantwortung für die ordnungsgemäße Beschaffenheit der von ihr zur Verfügung gestellten Rohstoffe, die Unversehrtheit der Gebinde und Verschlüsse, die korrekte Kennzeichnung und die diesbezügliche Identität. Nach Anlieferung bei dem AN, ist dieser für die ordnungsgemäße Lagerung der Rohstoffe verantwortlich. ";
	$paragraf_5_abs_3="Werden die Rohstoffe von einem Dritten auf Bestellung des AG an den AN geliefert, stellt der AN sicher, dass die Gebinde und Verschlüsse unversehrt sind, die Kennzeichnung korrekt und die Rohstoffe mit der Lieferscheinbezeichnung identisch ist.";
}

$paragraf_5_abs_7="b) Produktionsablauf";
$paragraf_5_abs_8="aa. Der AN trägt die Verantwortung für die Einhaltung der vom AG vorgegebenen Spezifikation des Füllgutes bzw. des Endproduktes sowie für die Einhaltung des Herstellungsverfahrens, soweit diese vom Auftraggeber gemäß Anlage 1 vorgegeben ist. ";
$paragraf_5_abs_9="bb. Erfolgt die Herstellung nach Herstelleranweisung des AG, ist der AN nicht berechtigt, eigenständigen Änderungen am Herstellungsverfahren vorzunehmen, sofern der AG dem nicht schriftlich zugestimmt hat.";
$paragraf_5_abs_10="cc. Erfolgt die Herstellung des Produktes ohne besondere Anweisung durch den AG, ist der AN für die Spezifikation des Füllgutes, sowie die Methode des Herstellungsverfahrens verantwortlich.";
$paragraf_5_abs_11="dd. Der AN ist verpflichtet, im Rahmen der Herstellung als Hilfs- und Betriebsmittel, die in unmittelbaren Kontakt mit dem Produkt gelangen, nur solche Mittel zu verwenden, die unbedenklich sind.";
$paragraf_5_abs_12="ee. Sofern bei dem Herstellungsprozess eine Abweichung von den Vorgaben des AG vorgekommen ist, die einen Einfluss auf die Produktqualität haben könnte, werden dem AG die Abweichungen und diesbezüglichen technischen Daten in vollem Umfang vom AN schriftlich und unmittelbar mitgeteilt.";

$paragraf_5_abs_13="c) Verpackung / Befüllung";

if($_POST['verpackung']==1)
{
	$paragraf_5_abs_14="Der AN liefert dem AG das Produkt in der gemäß der Einzelbestellung georderten Menge in geeigneten Großbehältnissen. Die Einzelportionierung und Verpackung des Endproduktes ist Sache des AG.";
}

if($_POST['verpackung']==2)
{
	$paragraf_5_abs_14="Die Parteien legen in der Anlage 1 zu diesem Vertrag die Liste der zu verwendeten Verpackungsmaterialien fest. Der AN nimmt folgende Verpackungsschritte vor: ";
	$paragraf_5_abs_15="• Abfüllen";
	$paragraf_5_abs_16="• Verschließen";
	$paragraf_5_abs_17="• Etikettieren";
	$paragraf_5_abs_18="• Versehen mit Kennziffern.";

	$paragraf_5_abs_19="Der AN garantiert hierbei insbesondere, dass er über die geeignete Ausrüstung verfügt. ";
	$paragraf_5_abs_20="•	Er garantiert insbesondere, dass die Etikettierung den gesetzlichen Kennzeichnungspflichten genügen wird.";
	$paragraf_5_abs_21="•	Der AN stellt sicher, dass die Vergabe der Kennziffern die gesetzlich geforderte Identifizierung des Produktes mit Hilfe der Kennziffern ermöglicht.";
	
	$paragraf_5_abs_22="Soweit die Verpackungsmaterialien von dem AG gemäß der Anlage 1 vorgegeben werden, trägt dieser die Verantwortung für die Eignung des Materials zur Verpackung des Produkts. Andernfalls geht die Verantwortung auf den AN über.";
	$paragraf_5_abs_23="Der AG trägt die Verantwortung für die ordnungsgemäße Lagerung der Verpackungsmaterialien.";
}

$sect->writeText($paragraf_5, $fontPar, $parPar);
$sect->writeText($paragraf_5_abs_1, $fontText, $parText);
$sect->writeText($paragraf_5_abs_2, $fontText, $parText);
$sect->writeText($paragraf_5_abs_3, $fontText, $parText);
#$sect->writeText($paragraf_5_abs_4, $fontText, $parText);
#$sect->writeText($paragraf_5_abs_5, $fontText, $parText);
#$sect->writeText($paragraf_5_abs_6, $fontText, $parText);
$sect->writeText($paragraf_5_abs_7, $fontText, $parText);

$sect->writeText($paragraf_5_abs_8, $fontText, $parMarkText);
$sect->writeText($paragraf_5_abs_9, $fontText, $parMarkText);
$sect->writeText($paragraf_5_abs_10, $fontText, $parMarkText);
$sect->writeText($paragraf_5_abs_11, $fontText, $parMarkText);
$sect->writeText($paragraf_5_abs_12, $fontText, $parMarkText);

$sect->writeText($paragraf_5_abs_13, $fontText, $parText);
$sect->writeText($paragraf_5_abs_14, $fontText, $parText);

if($_POST['verpackung']==2)
{
	if($_POST['verpackungsschritte_abfuellen'])
	{
		$sect->writeText($paragraf_5_abs_15, $fontText, $parMarkText);
	}
	if($_POST['verpackungsschritte_verschliessen'])
	{
		$sect->writeText($paragraf_5_abs_16, $fontText, $parMarkText);
	}
	if($_POST['verpackungsschritte_etiketieren'])
	{
		$sect->writeText($paragraf_5_abs_17, $fontText, $parMarkText);
	}
	if($_POST['verpackungsschritte_kennziefern'])
	{
		$sect->writeText($paragraf_5_abs_18, $fontText, $parMarkText);
	}
	
	$sect->writeText($paragraf_5_abs_19, $fontText, $parText);
	$sect->writeText($paragraf_5_abs_20, $fontText, $parMarkText);
	$sect->writeText($paragraf_5_abs_21, $fontText, $parMarkText);
	$sect->writeText($paragraf_5_abs_22, $fontText, $parText);
	$sect->writeText($paragraf_5_abs_23, $fontText, $parText);
}


$paragraf_6="§ 6 Auftragsabwicklung";
$paragraf_6_abs_1="a) Auftragserteilung / Terminierung";
$paragraf_6_abs_2="Alle Aufträge des AG sind in Schriftform mit Angabe des gewünschten Fertigstellungs-/Liefertermins an den AN zu richten. Der AG erhält dann eine Auftragsbestätigung des AN. Kann der AN zu dem gewünschten Termin das Produkt nicht fertig stellen / liefern, gilt der Auftrag so lange als nicht erteilt, bis die Parteien sich über einen Fertigstellungs-/Liefertermin geeinigt haben. ";
$paragraf_6_abs_3="b) Freigabe des Produkts";
$paragraf_6_abs_4="Erfolgt die Herstellung des Produktes beim AN zum ersten Mal, erhält der AG ein Muster zur Freigabe. Weitere Verarbeitungsschritte erfolgen erst nach der schriftlich erteilten Freigabe durch den AG.";

$paragraf_6_abs_5="c) Lieferung / Gefahrübergang ";

$paragraf_6_abs_6="Nach Feststellung der ordnungsgemäßen Herstellung und Prüfung des Produktes durch den AN, liefert der AN das Produkt an den Firmensitz des AG.";
$paragraf_6_abs_7="•	Der AN trägt das diesbezügliche Versendungsrisiko. Sollte der AG eine Lieferung zu einem anderen Ort wünschen, übernimmt der AG das Versendungsrisiko, sofern die Parteien keine andere Vereinbarung getroffen haben.";
$paragraf_6_abs_8="•	Der AG trägt das diesbezügliche Versendungsrisiko.";
$paragraf_6_abs_9="Liegt zum Zeitpunkt des Versands des Produktes keine Versandspezifikation des AG vor (Palettensetzplan, Versandkartonmaße, Packvorschriften, Füllstoffe für Transportsicherung etc.), so erfolgt der Versand des Produkts nach Spezifikation des AN.";

$paragraf_6_abs_10="Nach Feststellung der ordnungsgemäßen Herstellung und Prüfung des Produktes durch den AN, holt der AG das Produkt selbst oder durch einen Dritten an dem ";
$paragraf_6_abs_11="•	in Deutschland befindlichen und vom AN benannten Ort ";
$paragraf_6_abs_12="•	Firmensitz des AN ";
$paragraf_6_abs_13="•	Herstellungsort des Produktes";
$paragraf_6_abs_14="ab.";

$paragraf_6_abs_15="d) Lagerkosten ";
$paragraf_6_abs_16="Nimmt der AG die Ware nicht zu dem vereinbarten Termin ab, hat er dem AN die diesem entstehenden Lagerkosten zu ersetzen. Der AG hat bei verspäteter Abnahme nur die gewöhnliche Sorgfalt einzuhalten, die er in eigenen Angelegenheiten anzuwenden hat (§ 277 BGB). Darüber hinaus geht die Gefahr für Verschlechterung oder Untergang des Produkts auf den AG über.";

$paragraf_6_abs_17="e) Vertragsstrafe";
$paragraf_6_abs_18="Kommt der AN mit der Fertigstellung/Lieferung des Produkts in Verzug, hat er eine Vertragsstrafe gemäß den Bestimmungen der Anlage 2 zu zahlen, soweit die dort genannten Voraussetzungen vorliegen.";

$paragraf_6_abs_19="f) Eigentumsvorbehalt";
$paragraf_6_abs_20="Der AN behält das Eigentum an dem Produkt bis zur vollständigen Bezahlung und ist bei Zahlungsverzug des AG berechtigt, nach einer Fristsetzung das Produkt zurück zu verlangen. Nach der Rücknahme des Produkts ist der AN berechtigt, dass Produkt ungeachtet der Rechte des AG das Produkt unter eigenem Namen und auf eigenes Risiko zu veräußern.";


$sect->writeText($paragraf_6, $fontPar, $parPar);
$sect->writeText($paragraf_6_abs_1, $fontText, $parText);
$sect->writeText($paragraf_6_abs_2, $fontText, $parText);
$sect->writeText($paragraf_6_abs_3, $fontText, $parText);
$sect->writeText($paragraf_6_abs_4, $fontText, $parText);
$sect->writeText($paragraf_6_abs_5, $fontText, $parText);

if($_POST['lieferung']==1 || $_POST['lieferung']==2)
{
	$sect->writeText($paragraf_6_abs_6, $fontText, $parText);

	if($_POST['lieferung']==1)
	{
		$sect->writeText($paragraf_6_abs_7, $fontText, $parMarkText);
	}
	if($_POST['lieferung']==2)
	{
		$sect->writeText($paragraf_6_abs_8, $fontText, $parMarkText);
	}
	$sect->writeText($paragraf_6_abs_9, $fontText, $parText);
}


if($_POST['lieferung']==3 || $_POST['lieferung']==4 || $_POST['lieferung']==5)
{
	$sect->writeText($paragraf_6_abs_10, $fontText, $parText);
	
	if($_POST['lieferung']==3)
	{
		$sect->writeText($paragraf_6_abs_11, $fontText, $parMarkText);
	}
	if($_POST['lieferung']==4)
	{	
		$sect->writeText($paragraf_6_abs_12, $fontText, $parMarkText);
	}
	if($_POST['lieferung']==5)
	{	
		$sect->writeText($paragraf_6_abs_13, $fontText, $parMarkText);
	}
	$sect->writeText($paragraf_6_abs_14, $fontText, $parText);
}	

$sect->writeText($paragraf_6_abs_15, $fontText, $parText);
$sect->writeText($paragraf_6_abs_16, $fontText, $parText);
		

$paragraf_7="§ 7 Haftung / Gewährleistung ";
$paragraf_7_abs_1="a) Prüfung";
$paragraf_7_abs_2="Der AG verpflichtet sich, innerhalb von 14 Tagen nach Auslieferung das Produkt und die Dokumentation auf Mängel zu prüfen; danach gilt es als abgenommen, sofern keine Mängel gemeldet wurden. Etwaige Mängel sind vom AG dem AN in schriftlicher Form anzuzeigen.";
$paragraf_7_abs_3="b) Gewährleistungsumfang  ";
$paragraf_7_abs_4="aa. Liegt ein Mangel an dem gelieferten Produkt vor, ist der AN berechtigt, nach seiner Wahl zunächst eine Nacherfüllung in Form einer Mängelbeseitigung oder eine Ersatzlieferung vorzunehmen. Schlägt der Nachbesserungsversuch fehl bzw. ist auch die Ersatzlieferung mangelhaft, gelten die gesetzlichen Vorschriften.";
$paragraf_7_abs_5="bb. Der AN haftet dem AG gegenüber nicht für Kosten für Imageverlust,";

$sect->writeText($paragraf_7, $fontPar, $parPar);
$sect->writeText($paragraf_7_abs_1, $fontText, $parText);
$sect->writeText($paragraf_7_abs_2, $fontText, $parText);
$sect->writeText($paragraf_7_abs_3, $fontText, $parText);
$sect->writeText($paragraf_7_abs_4, $fontText, $parMarkText);
$sect->writeText($paragraf_7_abs_5, $fontText, $parMarkText);

if($_POST['haftung_gewinn']=='gewinn')
{
	$paragraf_7_abs_6="• entgangenen Gewinn";
	$sect->writeText($paragraf_7_abs_6, $fontText, $parMarkText);
}
if($_POST['haftung_ruckruf']=='ruckruf')
{
	$paragraf_7_abs_7="• Rückrufaktionen";
	$sect->writeText($paragraf_7_abs_7, $fontText, $parMarkText);
}
if($_POST['"haftung_geldbuss']=='geldbuss')
{	
	$paragraf_7_abs_8="• Geldbußen";
	$sect->writeText($paragraf_7_abs_8, $fontText, $parMarkText);
}
if($_POST['haftung_gutachter']=='gutachter')
{
	$paragraf_7_abs_9="• Gutachterkosten";
	$sect->writeText($paragraf_7_abs_9, $fontText, $parMarkText);
}

$paragraf_7_abs_10="c) Haftung";
$paragraf_7_abs_11="Wird einer der Parteien von einem Dritten in Anspruch genommen, ist der andere verpflichtet, diesen bei der Abwehr unberechtigter Ansprüche zu unterstützen. Die in Anspruch genommene Partei ist nicht berechtigt, Ansprüche Dritter ohne Zustimmung der anderen Partei anzuerkennen, wenn auch eine Inanspruchnahme der anderen Partei durch den Dritten möglich wäre.";

$sect->writeText($paragraf_7_abs_10, $fontText, $parText);
$sect->writeText($paragraf_7_abs_11, $fontText, $parText);


$paragraf_8="§ 8 Vertragsdauer / Beendigung";
$paragraf_8_abs_1="a) Vertragsbeginn und -dauer";
$paragraf_8_abs_2="Dieser Vertrag tritt mit der Unterzeichnung der Parteien in Kraft und wird auf unbestimmte Zeit abgeschlossen. Die Bestimmungen dieses Vertrages gelten auch für Aufträge, die noch nicht abgeschlossen sind, sofern diese Produkte gemäß der Anlage 1 betreffen.";
$paragraf_8_abs_3="b) Beendigung";
$paragraf_8_abs_4="aa. Der Vertrag kann von beiden Parteien mit einer Frist von: ".$_POST['frist']." Monaten gekündigt werden.";
$paragraf_8_abs_5="bb. Das Recht zur außerordentlichen Kündigung aus wichtigem Grund, ohne Einhaltung einer Kündigungsfrist bleibt hiervon unberührt. Ein wichtiger Grund liegt insbesondere vor, bei Nichtzahlung, Verstößen gegen primäre Vertragsverpflichtungen oder gesetzlichen Sicherheitsbestimmungen oder auch bei Unternehmensauflösung.";
$paragraf_8_abs_6="cc. Die Kündigung hat schriftlich zu erfolgen. Der Zugang per Fax ist ausreichend.";


$sect->writeText($paragraf_8, $fontPar, $parPar);
$sect->writeText($paragraf_8_abs_1, $fontText, $parText);
$sect->writeText($paragraf_8_abs_2, $fontText, $parText);
$sect->writeText($paragraf_8_abs_3, $fontText, $parText);
$sect->writeText($paragraf_8_abs_4, $fontText, $parMarkText);
$sect->writeText($paragraf_8_abs_5, $fontText, $parMarkText);
$sect->writeText($paragraf_8_abs_6, $fontText, $parMarkText);


$paragraf_9="§ 9 Geheimhaltung";
$paragraf_9_abs_1="a) Geschäftsgeheimnisse";
$paragraf_9_abs_2="Der AG und der AN verpflichten sich, während und nach der Vertragsabwicklung über alle ihnen bekannt gewordenen Geschäftsgeheimnisse der jeweils anderen Vertragspartei Stillschweigen gegenüber Dritten zu bewahren und solche Geschäftsgeheimnisse auch nicht selber auszuwerten.";
$paragraf_9_abs_3="b) Spezifisches Fachwissen („Know-how“)";
$paragraf_9_abs_4="Ferner verpflichten sich die Parteien des durch die Vorgespräche bzw. Vorverhandlungen zu diesem Vertrag und die durch die Abwicklung dieses Vertrages erlangte spezifische Fachwissen („Know-how“) zur Geheimhaltung.";
$paragraf_9_abs_5="c) Aufhebung der Geheimhaltungspflicht";
$paragraf_9_abs_6="Die Verpflichtung zur Geheimhaltung und zum Nichtgebrauch der Informationen entfällt, soweit diese";

$paragraf_9_abs_7="- vor Bekanntgabe durch eine Vertragspartei bereits der anderen Vertragspartei bekannt waren und die Vertragspartei dieses unverzüglich mitgeteilt hatte oder";
$paragraf_9_abs_8="- durch Publikationen oder in sonstiger Weise Gemeingut sind oder werden und damit nicht mehr geheim oder schutzfähig sind, oder";
$paragraf_9_abs_9="- einer der Vertragsparteien außerhalb der Vertragsanbahnung oder Vertragsabwicklung bekannt werden und nicht direkt oder indirekt von der anderen Vertragspartei stammen, oder";
$paragraf_9_abs_10="- auf Grund einschlägiger Vorschriften des Gesetzgebers oder der Behörden zugänglich gemacht werden müssen.";

$paragraf_9_abs_11="Diese Geheimhaltungspflichten gelten auch nach der Beendigung des Vertrages fort.";


$sect->writeText($paragraf_9, $fontPar, $parPar);
$sect->writeText($paragraf_9_abs_1, $fontText, $parText);
$sect->writeText($paragraf_9_abs_2, $fontText, $parText);
$sect->writeText($paragraf_9_abs_3, $fontText, $parText);
$sect->writeText($paragraf_9_abs_4, $fontText, $parText);
$sect->writeText($paragraf_9_abs_5, $fontText, $parText);
$sect->writeText($paragraf_9_abs_6, $fontText, $parText);
$sect->writeText($paragraf_9_abs_7, $fontText, $parMarkText);
$sect->writeText($paragraf_9_abs_8, $fontText, $parMarkText);
$sect->writeText($paragraf_9_abs_9, $fontText, $parMarkText);
$sect->writeText($paragraf_9_abs_10, $fontText, $parMarkText);
$sect->writeText($paragraf_9_abs_11, $fontText, $parText);


$paragraf_10="§ 10 Schlussbestimmungen";
$paragraf_10_abs_1="a) Anlagen";
$paragraf_10_abs_2="Die Anlagen";

$sect->writeText($paragraf_10, $fontPar, $parPar);
$sect->writeText($paragraf_10_abs_1, $fontText, $parText);
$sect->writeText($paragraf_10_abs_2, $fontText, $parText);

if($_POST['anlage_1']==1)
{
	$paragraf_10_abs_3="• 1";
	$sect->writeText($paragraf_10_abs_3, $fontText, $parMarkText);
}
if($_POST['anlage_2']==2)
{
	$paragraf_10_abs_4="• 2";
	$sect->writeText($paragraf_10_abs_4, $fontText, $parMarkText);
}
if($_POST['anlage_3']==3)
{
	$paragraf_10_abs_5="• 3";
	$sect->writeText($paragraf_10_abs_5, $fontText, $parMarkText);
}
if($_POST['anlage_4']==4)
{
	$paragraf_10_abs_6="• 4";
	$sect->writeText($paragraf_10_abs_6, $fontText, $parMarkText);
}
if($_POST['anlage_5']==5)
{
	$paragraf_10_abs_7="• 5";
	$sect->writeText($paragraf_10_abs_7, $fontText, $parMarkText);
}

$paragraf_10_abs_8="sind Bestandteil dieses Vertrages.";

$paragraf_10_abs_9="b) Änderungen und Ergänzungen des Vertrages";
$paragraf_10_abs_10="Änderungen und Ergänzungen zu diesem Vertrag und seiner Anlagen bedürfen der Schriftform. Die Allgemeinen Geschäftsbedingungen der Parteien finden keine Anwendung.";


$paragraf_10_abs_11="c) Vertragslücken und unwirksame Bestimmungen";
$paragraf_10_abs_12="Soweit einzelne Bestimmungen dieses Vertrages unwirksam sein sollten oder unwirksam werden oder der Vertrag aus einem anderen Grund eine Regeldungslücke enthält, so wird hierdurch die Gültigkeit der anderen Bestimmungen nicht berührt. Die Vertragsparteien sind verpflichtet, anstelle der unwirksamen Bestimmung eine wirksame Bestimmung zu vereinbaren, die wirtschaftlich dem am nächsten kommt, was die Parteien gewollt haben. Entsprechendes gilt für Regelungslücken.";

$paragraf_10_abs_13="d) Anzuwendendes Recht und Gerichtsstand";
$paragraf_10_abs_14="Für Streitigkeiten aus diesem Vertrag gilt ausschließlich das Recht der Bundesrepublik Deutschland. Gerichtsstand ist der Sitz des";

$sect->writeText($paragraf_10_abs_8, $fontText, $parText);
$sect->writeText($paragraf_10_abs_9, $fontText, $parText);
$sect->writeText($paragraf_10_abs_10, $fontText, $parText);
$sect->writeText($paragraf_10_abs_11, $fontText, $parText);
$sect->writeText($paragraf_10_abs_12, $fontText, $parText);
$sect->writeText($paragraf_10_abs_13, $fontText, $parText);
$sect->writeText($paragraf_10_abs_14, $fontText, $parText);

if($_POST['beklagten'])
{
	$paragraf_10_abs_15="• jeweils Beklagten";
	$sect->writeText($paragraf_10_abs_15, $fontText, $parMarkText);
}
if($_POST['auftraggeber'])
{
	$paragraf_10_abs_16="• Auftraggeber";
	$sect->writeText($paragraf_10_abs_16, $fontText, $parMarkText);
}
if($_POST['auftragnehmer'])
{
	$paragraf_10_abs_17="• Auftragnehmer";
	$sect->writeText($paragraf_10_abs_17, $fontText, $parMarkText);
}


$table1 = &$sect->addTable();
$parCellTabl = new ParFormat();
$parCellTabl->setSpaceBefore(5);
$table1->addRows(1, 2);
$table1->addRows(2, 2);
$table1->addColumn(1.8);
$table1->addColumn(5);
$table1->addColumn(5);
$table1->addColumn(5);
$cell = &$table1->getCell(2, 2);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
$cell->writeText('(Ort)', $fontText, $parCellTabl);

$cell = &$table1->getCell(2, 4);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
$cell->writeText('(Datum)', $fontText, $parCellTabl);

$cell = &$table1->getCell(3, 2);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
$cell->writeText('(Unterschrift Auftraggeber)', $fontText, $parCellTabl);

$cell = &$table1->getCell(3, 4);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
$cell->writeText('(Unterschrift Auftragnehmer)', $fontText, $parCellTabl);

$foot = &$sect->addFooter('all');
$foot->setPosition(2);
$seite="Seite <pagenum /> von 9";
$foot->writeText($seite, $fontSeite, $parSeite);
$foot = &$rtf->addFooter('first');
    // Seite 2
//** TEXTS**//

$rtf->sendRtf('Lohnherstellungsvertrag_'.date('Y-m-d_H-i-s'));
?>        