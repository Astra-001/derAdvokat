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
$parEmpty->setSpaceBetweenLines(6);
$cell->writeText('<br />', new Font(), $parEmpty);

$parRight = new ParFormat();
$parRight->setIndentLeft(1);

$fontTitle = new Font(14, 'dejavusans', '#000000');
$fontTitle->setBold(1);
$cell->writeText('VERTRAG ÜBER DIE NUTZUNG EINES<br />DIENSTFAHRZEUGS', $fontTitle, $parRight);

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
$cell->writeText('wird folgende Vereinbarung geschlossen.', $fontGrey, $parRight);

$parLine = new ParFormat();
$parLine->setIndentLeft(0.9);
$parLine->setIndentRight(5);
$parLine->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
$cell->writeText(' ', new Font(1, 'dejavusans', '#474747'), $parLine);

/**** Right column ****/

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
$parText->setSpaceAfter(21);
$parText->ParFormat('justify');
// Seite 2

//Paragraf 1
$parEmpty->setSpaceBetweenLines(1.5);
$sect->writeText('<br />', $fontText, $parEmpty);
$paragraf_1 = "§ 1 Überlassung";
$paragraf_1_abs_1="(1) Der Arbeitgeber überlässt dem Mitarbeiter jederzeit widerruflich ein Kraftfahrtzeug, z. Zt. das Fahrzeug ".$_POST['marke']." ".$_POST['typ']." mit dem amtlichen Kennzeichen ".$_POST['kennzeichen']." zur dienstlichen Benutzung. Werden dem Mitarbeiter vom Arbeitgeber andere oder weitere als das benannte Fahrzeug zur Verfügung gestellt, gelten die nachfolgenden Bestimmungen auch für diese Fahrzeuge.";
$paragraf_1_abs_2="(2) Darüber, ob und unter welchen Bedingungen das Fahrzeug dem Mitarbeiter für Privatfahrten zur Verfügung steht, ist in § 6 Abs. 4 geregelt.";
$sect->writeText($paragraf_1, $fontPar, $parPar);
$sect->writeText($paragraf_1_abs_1, $fontText, $parText);
$sect->writeText($paragraf_1_abs_2, $fontText, $parText);
//Paragraf 1

//Paragraf 2
$paragraf_2 = "§ 2 Fahrzeugpapiere";
$paragraf_2_abs_1="Der Fahrzeugschein ist vom Mitarbeiter ständig mitzuführen und sorgfältig zu verwahren. Gesetzlich und betrieblich vorgeschriebene Schichtfahrtenbücher und Fahrtenschreiber sind gewissenhaft zu führen und zum Monatsende unaufgefordert der Geschäftsleitung vorzulegen.";
$sect->writeText($paragraf_2, $fontPar, $parPar);
$sect->writeText($paragraf_2_abs_1, $fontText, $parText);
//Paragraf 2

//Paragraf 3
$paragraf_3 = "§ 3 Dienstfahrten | Betriebskosten";
$paragraf_3_abs_1="(1) Die Kraftfahrtzeugsteuer, die Versicherungsprämien sowie alle Betriebskosten die im Rahmen der dienstlichen Benutzung anfallen trägt der Arbeitgeber gegen Vorlage der Rechnungen; zur Erstattung der Treibstoffkosten sind die Tankstellenrechnungen mit dem Vermerk des Kilometerstandes vorzulegen. Der Mitarbeiter gibt die dienstlich gefahrenen Kilometer unter Angabe des Kilometerstandes jeweils am Monatsende unter Vorlage des Fahrtenbuches bekannt.";
$paragraf_3_abs_2="(2) Wird dem Mitarbeiter für die arbeitstäglichen Fahrten zwischen Wohnung und Arbeitsstätte das firmeneigene Kraftfahrzeug ebenfalls überlassen, ist der dadurch entstehende geldwerte Vorteil lohnsteuerpflichtig.";
$sect->writeText($paragraf_3, $fontPar, $parPar);
$sect->writeText($paragraf_3_abs_1, $fontText, $parText);
$sect->writeText($paragraf_3_abs_2, $fontText, $parText);
//Paragraf 3

//Paragraf 4
$paragraf_4 = "§ 4 Pflege | Wartung";
$paragraf_4_abs_1="(1) Der Mitarbeiter hält das Fahrzeug stets in fahrbereitem Zustand, überprüft vor und nach jeder Fahrt die Fahrsicherheit, sorgt für ordnungsgemäße Pflege und Wartung und stellt das Fahrzeug ordnungsgemäß ab. Der Mitarbeiter steht für die Durchführung der regelmäßigen Haupt- und Abgassonderuntersuchung ein.";
$paragraf_4_abs_2="(2) Die anfallenden Kosten für die unter Absatz 1 benannten Maßnahmen hat der Arbeitgeber zu tragen.";
$sect->writeText($paragraf_4, $fontPar, $parPar);
$sect->writeText($paragraf_4_abs_1, $fontText, $parText);
$sect->writeText($paragraf_4_abs_2, $fontText, $parText);
//Paragraf 4

//Paragraf 5
$paragraf_5 = "§ 5 Schäden";
$paragraf_5_abs_1="(1) Unfälle, Verlust, Beschädigungen, Veränderungen und besondere Wertminderungen des Kraftfahrtzeuges sowie Auswirkungen auf den firmeneigenen Kraftfahrtzeuginhalt meldet der Mitarbeiter unverzüglich der Geschäftsleitung. Mündliche und fernmündliche Meldungen sind unverzüglich unter Angabe der Einzelheiten schriftlich zu bestätigen. Bei Verkehrsunfällen mit dem Verdacht auf Personenschäden, bei Sachschäden mit einer mutmaßlichen Höhe von mehr als   300,00 € und bei Verlust des Fahrzeuges ist eine polizeiliche Aufnahme zu veranlassen. Bei allen Verkehrsunfällen ist ein stets mitzuführendes Unfallmeldeformular zur Unterrichtung des Arbeitgebers zu verwenden.";
$sect->writeText($paragraf_5, $fontPar, $parPar);
$sect->writeText($paragraf_5_abs_1, $fontText, $parText);
//Paragraf 5

//Paragraf 5
$paragraf_5_abs_2="(2)Der Mitarbeiter haftet bei schuldhaftem Verhalten für Personen- und Sachschäden, sowie einer etwaigen Wertminderung. Eine Schadensaufteilung nach dem Verschuldensgrad richtet sich nach den von der Rechtssprechung entwickelten Grundsätzen. Im Zweifel ist der Mitarbeiter für seinen Verschuldensgrad beweispflichtig.";
$paragraf_5_abs_3="Für Beschädigungen, die nicht beim Betrieb des Fahrzeugs entstanden sind, und bei Entwendung des Fahrzeugs haftet der Mitarbeiter für jedes Verschulden (z. B. mangelnde Aufsicht, nachlässige Abstellung, unsachgemäße Behandlung etc.) in voller Höhe.";
$paragraf_5_abs_4="Die Haftung des Mitarbeiters entfällt, soweit der Schaden durch eine Versicherung gedeckt ist.";
#$paragraf_5_abs_5="(3) Der Mitarbeiter ist gehalten, alle das Fahrzeug betreffenden Rechte für die Firma Dritten gegenüber geltend zu machen. Eigene Ersatzansprüche gegen Dritte tritt der Mitarbeiter an den Arbeitgeber ab, soweit er von diesem schadlos gestellt wird.";
$sect->writeText($paragraf_5_abs_2, $fontText, $parText);
$sect->writeText($paragraf_5_abs_3, $fontText, $parText);
$sect->writeText($paragraf_5_abs_4, $fontText, $parText);
#$sect->writeText($paragraf_5_abs_5, $fontText, $parText);
//Paragraf 5
//Paragraf 6
$paragraf_6 = "§ 6 Eigene Sorgfalt | Fahrten";
$paragraf_6_abs_1="(1) Der Mitarbeiter wird sich bei allen Fahrten verkehrsrichtig verhalten und dazu auch ggf. Mitfahrer anhalten; das gilt insbesondere für das Anlegen der Sicherheitsgurte.";
$paragraf_6_abs_2="(2) Die Mitnahme von dritten Personen und von Sachen zugunsten Dritter ist nur ausnahmsweise nach Rücksprache mit der Geschäftsleitung gestattet. Werden Personen und fremde Sachen auf Fahrten mitgenommen, so hat der Mitarbeiter von den Mitfahrern bzw. Eigentümern eine im Fahrzug mitzuführende Haftungsausschlusserklärung unterzeichnen zu lassen und im Schadensfall dem Arbeitgeber auszuhändigen.";
$paragraf_6_abs_3="(3) Das Vermieten, Verleihen und das sonstige Überlassen des Fahrzeugs an dritte Personen  ist unzulässig. Dies gilt auch, wenn der Mitarbeiter bei dem Gebrauch durch den Dritten selbst zugegen sein sollte.";
$paragraf_6_abs_4="(4) ".$erlaubnis."".$zuzahlung;
$paragraf_6_abs_5="(5) Bei Verstößen gegen die Regelungen gemäß Absatz 1 bis 3 haftet der Mitarbeiter für alle Schäden unbeschränkt, soweit keine Versicherung hierfür eintritt. Dies gilt auch dann, wenn ein Schaden durch dritte Personen verursacht worden ist, sowie für Zufall oder höhere Gewalt. Der Mitarbeiter ist dann verpflichtet, den Arbeitgeber von allen etwaigen Schadensersatzansprüchen Dritter freizustellen.";
$paragraf_6_abs_6="(6) Verstöße gegen die Regelungen gemäß Absatz 1 bis 3 stellen einen wichtigen Grund zur fristlosen Kündigung dar. Weitere wichtige Entlassungsgründe sind z. B. Alkoholmissbrauch, grobe Verstöße gegen die Verkehrsvorschriften, Entzug des Führerscheins.";
$sect->writeText($paragraf_6, $fontPar, $parPar);
$sect->writeText($paragraf_6_abs_1, $fontText, $parText);
$sect->writeText($paragraf_6_abs_2, $fontText, $parText);
$sect->writeText($paragraf_6_abs_3, $fontText, $parText);
$sect->writeText($paragraf_6_abs_4, $fontText, $parText);
$sect->writeText($paragraf_6_abs_5, $fontText, $parText);
$sect->writeText($paragraf_6_abs_6, $fontText, $parText);
//Paragraf 6

//Paragraf 7
$paragraf_7 = "§ 7 Rückgabe";
$paragraf_7_abs_1="Der Arbeitgeber kann die Benutzung des Fahrzeugs jederzeit widerrufen, das Fahrzeug herausverlangen oder dem Mitarbeiter ein anderes Fahrzeug zur Verfügung stellen. Ein Zurückbehaltungsrecht des Mitarbeiters gleich aus welchem Grund, ist ausgeschlossen.";
$sect->writeText($paragraf_7, $fontPar, $parPar);
$sect->writeText($paragraf_7_abs_1, $fontText, $parText);
//Paragraf 7

//Paragraf 8
$paragraf_8 = "§ 8 Schlussbestimmungen";
$paragraf_8_abs_1="(1) Die etwaige Unwirksamkeit einzelner Vertragsbestimmungen oder von Teilen hiervon, berührt nicht die Wirksamkeit der übrigen Vereinbarungen.";
$paragraf_8_abs_2="(2) Für Streitigkeiten aus diesem Vertrag ist das Arbeitsgericht zuständig.";
$paragraf_8_abs_3="(3) Der Vertrag wird in zwei Ausfertigungen erstellt, von denen jede Partei eine erhalten hat.";

$sect->writeText($paragraf_8, $fontPar, $parPar);
$sect->writeText($paragraf_8_abs_1, $fontText, $parText);
$sect->writeText($paragraf_8_abs_2, $fontText, $parText);
$sect->writeText($paragraf_8_abs_3, $fontText, $parText);
//Paragraf 8
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

$rtf->sendRtf('dienstfahrzeug_vertrag'.date('Y-m-d_H-i-s'));
?>