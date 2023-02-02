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
$cell->writeText('<br /><br /><br />Dok. 15.09.2009', new Font(9, 'dejavusans', '#FFFFFF'), $parSimple);
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
$cell->writeText('VOLONTÄRSVERTRAG', $fontTitle, $parRight);

$parEmpty->setSpaceBetweenLines(3);
$cell->writeText('<br />', new Font(), $parEmpty);

$cell->writeText('zwischen', $fontGrey, $parRight);
$parEmpty->setSpaceBetweenLines(1.5);
$cell->writeText('<br />', new Font(), $parEmpty);

$fontName = new Font(12, 'dejavusans', '#000000');
$fontName->setBold(1);

$cell->writeText("$absatz1_0<br />$absatz1<br />$absatz2<br />$absatz3<br />", $fontName, $parRight);

if(isset($_POST['vertreter']))
{
     $cell->writeText("$absatz2_2", $fontName, $parRight);
}

$cell->writeText('nachstehend Arbeitgeber genannt,', $fontGrey, new ParFormat('center'));

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$parUnd = new ParFormat();
$parUnd->setIndentLeft(4);
$cell->writeText('und', $fontGrey, $parUnd);

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$cell->writeText("$absatz4_0<br />$absatz4<br />$absatz5<br />$absatz6<br />", $fontName, $parRight);

$cell->writeText('nachstehend Mitarbeiter genannt,', $fontGrey, new ParFormat('center'));

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$parRight->setSpaceAfter(5);
$cell->writeText('wird nachfolgender Anstellungsvertrag geschlossen.', $fontGrey, $parRight);

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

$fontSeite = new Font(12, 'dejavusans', '#000000');
$parSeite = new ParFormat();
$parSeite->setIndentLeft(15);

$fontText = new Font(12, 'dejavusans', '#000000');
//$fontText->setBold();
$parText = new ParFormat();
$parText->setIndentLeft(1.01);
$parText->setIndentRight(1);
$parText->setSpaceAfter(25);
$parText->ParFormat('justify');

//Paragraf 1
$paragraf_1="§ 1 Beginn des Ausbildungsverhältnisses";
$paragraf_1_abs_1="(1) Der Volontär wird ab dem ".$_POST['beginn']." für die Dauer von drei Arbeitstagen eingestellt. Ziel der Ausbildung - die keine Berufsausbildung im Sinne des Berufsbildungsgesetzes ist - ist der systematische Einblick des Volontärs in die berufliche Tätigkeit gemäß § 2 dieses Vertrages, der Erwerb bestimmter Kenntnisse über die berufliche Tätigkeit, sowie das Studium der betrieblichen Abläufe des Ausbilders.";
$paragraf_1_abs_2="(2) Für das Ausbildungsverhältnis gelten die gesetzlichen Bestimmungen des § 19 Berufsbildungsgesetzes in der Fassung vom 19.07.2001. Durch das Ausbildungsverhältnis wird kein Arbeitsverhältnis vereinbart.";
$sect->writeText($paragraf_1, $fontPar, $parPar);
$sect->writeText($paragraf_1_abs_1, $fontText, $parText);
$sect->writeText($paragraf_1_abs_2, $fontText, $parText);
//Paragraf 1

//Paragraf 2
$paragraf_2="§ 2 Tätigkeit";
$paragraf_2_abs_1="Der Volontär wird in dem Bereich ".$_POST['bereich']." ausgebildet.";
$sect->writeText($paragraf_2, $fontPar, $parPar);
$sect->writeText($paragraf_2_abs_1, $fontText, $parText);
//Paragraf 2

//Paragraf 3
$paragraf_3="§ 3 Arbeitszeit";
$paragraf_3_abs_1="Die tägliche Arbeitszeit des Volontärs entspricht der für Arbeitnehmer im Betrieb üblichen Arbeitszeit. Sie beträgt zurzeit ohne Pausen 8 Stunden täglich.";
$sect->writeText($paragraf_3, $fontPar, $parPar);
$sect->writeText($paragraf_3_abs_1, $fontText, $parText);
//Paragraf 3

//Paragraf 4
$paragraf_4="§ 4 Vergütung";
$paragraf_4_abs_1="Der Volontär erhält gemäß § 10 Berufsbildungsgesetz eine angemessene Vergütung. Sie beträgt ".$_POST['gehalt']." € am Tag und wird zum Ende des Volontärsverhältnisses fällig.";
$sect->writeText($paragraf_4, $fontPar, $parPar);
$sect->writeText($paragraf_4_abs_1, $fontText, $parText);
//Paragraf 4

//Paragraf 5
$paragraf_5="§ 5 Urlaub";
$paragraf_5_abs_1="Der Volontär hat aufgrund der kurzen Ausbildungszeit keinen Anspruch auf Urlaub.";
$sect->writeText($paragraf_5, $fontPar, $parPar);
$sect->writeText($paragraf_5_abs_1, $fontText, $parText);
//Paragraf 5

//Paragraf 6
$paragraf_6="§ 6 Herausgabe und Verschwiegenheitspflicht";
$paragraf_6_abs_1="(1) Alle die Interessen des Ausbilders berührenden Schriftstücke und Dateien sind ohne Rücksicht auf den Adressaten ebenso wie alle sonstigen Geschäftsstücke, Zeichnungen, Notizen, Bücher, Muster, Modelle, Werkzeuge, Material usw. alleiniges Eigentum des Ausbilders und nach Anforderung bzw. nach Beendigung des Ausbildungsverhältnisses unaufgefordert herauszugeben. Zurückbehaltungsrechte sind ausgeschlossen.";
$paragraf_6_abs_2="(2) Der Volontär verpflichtet sich, über alle Angelegenheiten des Ausbilders und seiner Kunden strengste Verschwiegenheit zu wahren. Die Verschwiegenheit gilt auch nach der Beendigung des Ausbildungsverhältnisses unverändert weiter.";
$sect->writeText($paragraf_6, $fontPar, $parPar);
$sect->writeText($paragraf_6_abs_1, $fontText, $parText);
$sect->writeText($paragraf_6_abs_2, $fontText, $parText);
//Paragraf 6

//Paragraf 7
$paragraf_7="§ 7 Beendigung des Ausbildungsverhältnisses";
$paragraf_7_abs_1="(1) Das Ausbildungsverhältnis kann jederzeit von beiden Parteien gelöst werden. Schadensersatzansprüche wegen der vorzeitigen Lösung des Volontärsverhältnisses sind ausgeschlossen.";
$paragraf_7_abs_2="(2) Die Kündigung bedarf der Schriftform.";
$sect->writeText($paragraf_7, $fontPar, $parPar);
$sect->writeText($paragraf_7_abs_1, $fontText, $parText);
$sect->writeText($paragraf_7_abs_2, $fontText, $parText);
//Paragraf 7
   
//Paragraf 8
$paragraf_8="§ 8 Ausschlussfristen";
$paragraf_8_abs_1="(1) Alle beiderseitigen Ansprüche aus dem Ausbildungsverhältnis – mit Ausnahme von Ansprüchen, die aus der Verletzung des Lebens, des Körpers, der Gesundheit sowie aus vorsätzlichen oder grob fahrlässigen Pflichtverletzungen des Ausbilders oder seines gesetzlichen Vertreters oder Erfüllungsgehilfen resultieren – verfallen, wenn sie nicht innerhalb von drei Monaten nach ihrer Fälligkeit gegenüber der anderen Vertragspartei schriftlich erhoben werden.";
$paragraf_8_abs_2="(2) Lehnt die Gegenseite den Anspruch ab oder erklärt sie sich nicht innerhalb von einem Monat nach Geltendmachung des Anspruchs, so verfällt dieser, wenn er nicht innerhalb von drei Monaten nach der Ablehnung oder dem Fristablauf gerichtlich geltend gemacht wird. Dies gilt nicht für Zahlungsansprüche des Volontärs, die während eines Prozesses fällig werden und von seinem Ausgang abhängen. Für diese Ansprüche beginnt die Verfallsfrist nach rechtskräftiger Beendigung des Verfahrens und beträgt zwei Monate.";
$sect->writeText($paragraf_8, $fontPar, $parPar);
$sect->writeText($paragraf_8_abs_1, $fontText, $parText);
$sect->writeText($paragraf_8_abs_2, $fontText, $parText);
//Paragraf 8

//Paragraf 9
$paragraf_9="§ 9 Schlussbestimmungen";
$paragraf_9_abs_1="(1) Mündliche Nebenabreden bestehen nicht. Die Kündigung sowie Ergänzungen, Verlängerungen oder sonstige Änderungen dieses Vertrages einschließlich dieser Klausel bedürfen zu ihrer Rechtswirksamkeit der Schriftform, sofern sie nicht auf einer ausdrücklichen oder individuell ausgehandelten Abrede beruhen. Betriebliche Übungen begründen keinen Rechtsanspruch. Eine stillschweigende Verlängerung des Ausbildungsverhältnisses über den in § 1 Abs. 1 genannten Zeitraum ist ausgeschlossen. Sonstige Vereinbarungen außerhalb dieses Vertrages bestehen zwischen den Parteien nicht.";
#$paragraf_9_abs_1="(1) Die Kündigung sowie Ergänzungen, Verlängerungen oder sonstige Änderungen dieses Vertrages einschließlich dieser Klausel bedürfen zu ihrer Rechtswirksamkeit der Schriftform. Eine stillschweigende Verlängerung des Ausbildungsverhältnisses über den in § 1 Abs. 1 genannten Zeitraum ist ausgeschlossen. Sonstige Vereinbarungen außerhalb dieses Vertrages bestehen zwischen den Parteien nicht.";
$paragraf_9_abs_2="(2) Die etwaige Unwirksamkeit einzelner Vertragsbestimmungen oder von Teilen hiervon, berührt nicht die Wirksamkeit der übrigen Vereinbarungen.";
$paragraf_9_abs_3="(3) Auf Verlangen des Ausbilders beschafft der Volontär ein polizeiliches Führungszeugnis. Die Gebühren hierfür trägt der Ausbilder.";
$paragraf_9_abs_4="(4) Alle Änderung in den persönlichen Verhältnissen, soweit sie für das Ausbildungsverhältnis von Bedeutung sind, insbesondere ein Wechsel der Anschrift, sind dem Ausbilder ohne besondere Aufforderung unverzüglich mitzuteilen. Ist eine Änderung der Anschrift nicht ordnungsgemäß gemeldet, so gelten die Mitteilungen des Ausbilders in dem Zeitpunkt als zugegangen, in dem sie dem Volontär unter der zuletzt angegebenen Anschrift erreicht hätten.";
$paragraf_9_abs_5="(5) Der Vertrag wird in zwei Ausfertigungen erstellt, von denen jede Partei eine erhalten hat.";
$sect->writeText($paragraf_9, $fontPar, $parPar);
$sect->writeText($paragraf_9_abs_1, $fontText, $parText);
$sect->writeText($paragraf_9_abs_2, $fontText, $parText);
$sect->writeText($paragraf_9_abs_3, $fontText, $parText);
$sect->writeText($paragraf_9_abs_4, $fontText, $parText);
$sect->writeText($paragraf_9_abs_5, $fontText, $parText);
//Paragraf 9

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
$cell->writeText('(Arbeitgeber)', $fontText, $parCellTabl);

$cell = &$table1->getCell(3, 4);
$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
$cell->writeText('(Mitarbeiter)', $fontText, $parCellTabl);

$foot = &$sect->addFooter('all');
$foot->setPosition(2);
$seite5="Seite <pagenum /> von 4";
$foot->writeText($seite5, $fontSeite, $parSeite);

$foot = &$rtf->addFooter('first');

// Seite 3

//
//** TEXTS**//

$rtf->sendRtf('anstellungsvertrag_volontar'.date('Y-m-d_H-i-s'));
?>