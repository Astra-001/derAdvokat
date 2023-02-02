<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

if ($_SESSION['user']['status'] < STATUS_ACTIVE_AGB)
{
    header('Location: /derAdvokat/index.php');
}
if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
	$check_eingabe=check_eingabe($user,$smarty);

	if($check_eingabe[0]==TRUE)
	{
		if (isset($_POST['geschlecht']))
		{
		   $anrede = 'Herr';
		   $anrede1=$anrede.'n';
		   $prenom_abs_1 = 'Seine';
		   $prenom_abs_3 = 'ihm';
		   $prenom_abs_3_a = 'Herrn';
		   $prenom_abs_3_b =  'er';
		   $prenom_abs_4 =  'Er';
		   $prenom_abs_7 = 'Sein';
		   $prenom_abs_7_a = 'Seinen';
		   $prenom_abs_7_b = 'seine';

		   if ($_POST['geschlecht'] == 2)
		   {
		       $anrede = 'Frau';
		       $anrede1 = $anrede;
		       $prenom_abs_1 = 'Ihre';
		       $prenom_abs_3 = 'ihr';
		       $prenom_abs_3_a = 'Frau';
		       $prenom_abs_3_b = 'sie';
		       $prenom_abs_4 =  'Sie';
		       $prenom_abs_7 = 'Ihr';
		       $prenom_abs_7_a = 'Ihren';
		       $prenom_abs_7_b = 'ihre';
		   }
		}
		switch($_POST['kollegen'])
		{
			case '1': $b3_b2='stets vorbildlich';break;
			case '2': $b3_b2='stets einwandfrei';break;
			case '3': $b3_b2='gut';break;
			case '4': $b3_b2='zufriedenstellend';break;
			case '5': $b3_b2='insgesamt zufriedenstellend';break;
			case '6': $b3_b2='';break;
		}
		if($_POST['kollegen']!=6)
		{
			$kollegen=$prenom_abs_7.' Verhalten gegenüber den Kollegen war '.$b3_b2.'. ';
		}
		switch($_POST['untergebene'])
		{
			case '1': $b3_b3='in jeder Situation ein vorbildliches Beispiel';break;
			case '2': $b3_b3='immer ein gutes Beispiel';break;
			case '3': $b3_b3='ein kompetenter Ansprechpartner';break;
			case '4': $b3_b3='ein Ansprechpartner';break;
			case '5': $b3_b3='oft ein Ansprechpartner';break;
			case '6': $b3_b3='';break;
		}
		if($_POST['untergebene']!=6)
		{
			$untergebene=$prenom_abs_7_a.' Mitarbeitern gegenüber ist '.$anrede.' '.$_POST['name'].' '.$b3_b3.' gewesen. ';
		}
		switch($_POST['kunden'])
		{
			case '1': $b3_b4_a='große Zuverlässigkeit und hohe Kompetenz';break;
			case '2': $b3_b4_a='Zuverlässigkeit und Kompetenz';break;
			case '3': $b3_b4_a='Zuverlässigkeit';break;
			case '4': $b3_b4_a='Einsatzbereitschaft';break;
			case '5': $b3_b4_a='Art';break;
			case '6': $b3_b4_a='';break;
		}
		switch($_POST['kunden'])
		{
			case '1': $b3_b4_b='';break;
			case '2': $b3_b4_b='sehr viele';break;
			case '3': $b3_b4_b='viele';break;
			case '4': $b3_b4_b='nicht wenige';break;
			case '5': $b3_b4_b='manche';break;
			case '6': $b3_b4_b='';break;
		}
		if($_POST['kunden']!=6)
		{
			$kunden=' Die Kunden schätzen '.$prenom_abs_7_b.' '.$b3_b4_a.' und '.$b3_b4_b.' bevorzugten '.$prenom_abs_3_a.' '.$_POST['name'].' als ihren Ansprechpartner. ';
		}
		switch($_POST['vorgesetzte'])
		{
			case '1': $b3_b1='sehr angenehm und von großer Verbindlichkeit geprägt';break;
			case '2': $b3_b1='stets freundlich, angenehm und verbindlich';break;
			case '3': $b3_b1='angenehm und verbindlich';break;
			case '4': $b3_b1='freundlich';break;
			case '5': $b3_b1='zufriedenstellend';break;
			case '6': $b3_b1='';break;
		}
		if($_POST['vorgesetzte']!=6)
		{
			$vorgesetzte=$prenom_abs_7.' Auftreten gegenüber Vorgesetzten war '.$b3_b1.'. ';
		}
		switch($_POST['berufserfahrung'])
		{
			case '1': $b3_a1='keine';break;
			case '2': $b3_a1='nur geringe';break;
			case '3': $b3_a1='einige';break;
			case '4': $b3_a1='eine langjährige';break;
		}
		switch($_POST['einarbeitung'])
		{
			case '1': $b3_a2_a='sehr schnell';break;
			case '2': $b3_a2_a='schnell';break;
			case '3': $b3_a2_a='gut';break;
			case '4': $b3_a2_a='zufriedenstellend schaffte die Einarbeitung nicht';break;
			case '5': $b3_a2_a='im großen und ganzen';break;
		}
		switch($_POST['einarbeitung'])
		{
			case '1': $b3_a2_b='sehr rasche';break;
			case '2': $b3_a2_b='rasche';break;
			case '3': $b3_a2_b='gute';break;
			case '4': $b3_a2_b='zufriedenstellende';break;
			case '5': $b3_a2_b='ausreichende';break;
		}
		switch($_POST['quantitat'])
		{
			case '1': $b3_a4='äußerst hohen';break;
			case '2': $b3_a4='stets hohen';break;
			case '3': $b3_a4='hohen';break;
			case '4': $b3_a4='befriedigenden';break;
			case '5': $b3_a4='meist zufriedenstellenden';break;
		}
		switch($_POST['qualitat'])
		{
			case '1': $b3_a3='stets exzellente';break;
			case '2': $b3_a3='ausgezeichnete';break;
			case '3': $b3_a3='gute';break;
			case '4': $b3_a3='stets annehmbare';break;
			case '5': $b3_a3='annehmbare';break;
		}
		switch($_POST['arbeits_befahigung'])
		{
			case '1': $b3_a5='herausragend';break;
			case '2': $b3_a5='deutlich überdurchschnittlich';break;
			case '3': $b3_a5='voll zufriedenstellend';break;
			case '4': $b3_a5='zufriedenstellend';break;
			case '5': $b3_a5='stets von Interesse geprägt';break;
		}
		switch($_POST['engagement'])
		{
			case '1': $b3_a6_a='höchstem';break;
			case '2': $b3_a6_a='stets großem';break;
			case '3': $b3_a6_a='viel';break;
			case '4': $b3_a6_a='';break;
			case '5': $b3_a6_a='merklichem';break;
		}
		switch($_POST['engagement'])
		{
			case '1': $b3_a6_b='zu jeder Zeit sehr ernst';break;
			case '2': $b3_a6_b='sehr ernst';break;
			case '3': $b3_a6_b='stets ernst';break;
			case '4': $b3_a6_b='wahr';break;
			case '5': $b3_a6_b='häufig wahr';break;
		}
		switch($_POST['bes_leistungen'])
		{
			case '1': $b3_a7_a='sehr viele';break;
			case '2': $b3_a7_a='viele';break;
			case '3': $b3_a7_a='einige';break;
			case '4': $b3_a7_a='keine';break;
		}
		switch($_POST['bes_leistungen'])
		{
			case '1': $b3_a7_b='höchstem';break;
			case '2': $b3_a7_b='großem';break;
			case '3': $b3_a7_b='';break;
			case '4': $b3_a7_b='';break;
		}
		switch($_POST['leistung_gesamt_note'])
		{
			case '1': $b3_a8='höchsten Erwartungen';break;
			case '2': $b3_a8='besten Erwartungen';break;
			case '3': $b3_a8='in ihn gesetzten Erwartungen';break;
			case '4': $b3_a8='gesetzten Erwartungen';break;
			case '5': $b3_a8='Mindesterwartungen';break;
		}
		switch($_POST['auftreten'])
		{
			case '1': $b3_b5_a='sehr sympathisches';break;
			case '2': $b3_b5_a='sympathisches';break;
			case '3': $b3_b5_a='angenehmes';break;
			case '4': $b3_b5_a='recht angenehmes';break;
			case '5': $b3_b5_a='interessantes';break;
		}
		switch($_POST['auftreten'])
		{
			case '1': $b3_b5_b='sehr gute und verbindliche';break;
			case '2': $b3_b5_b='sehr gute';break;
			case '3': $b3_b5_b='gute';break;
			case '4': $b3_b5_b='angenehme';break;
			case '5': $b3_b5_b='zufriedenstellende';break;
		}
		switch($_POST['ges_note'])
		{
			case '1': $b3_c_a='stets unsere vollste Zufriedenheit gefunden hat.';break;
			case '2': $b3_c_a='stets unsere volle Zufriedenheit gefunden hat.';break;
			case '3': $b3_c_a='unsere volle Zufriedenheit gefunden hat.';break;
			case '4': $b3_c_a='unsere Zufriedenheit gefunden hat.';break;
			case '5': $b3_c_a='zufriedenstellend war.';break;
		}
		switch($_POST['ges_note'])
		{
			case '1': $b3_c_b='maßgeblich zum Weiteraufbau';break;
			case '2': $b3_c_b='zum Weiteraufbau';break;
			case '3': $b3_c_b='zum Erfolg';break;
			case '4': $b3_c_b='zum Auftritt';break;
			case '5': $b3_c_b='zur Arbeit';break;
		}
	/*	switch($_POST['ende_grund'])
		{
			case '1': $b1_12_a='';break;
			case '2': $b1_12_a='';break;
			case '3': $b1_12_a='';break;
		}
		switch($_POST['ende_grund'])
		{
			case '1': $b1_12_b='';break;
			case '2': $b1_12_b='';break;
			case '3': $b1_12_b='';break;
		}  */

		#$datum=date("d. m. Y");
		#$absatz_date=$datum;

		if ($_SERVER["REQUEST_METHOD"] == 'POST')
		{
		    $rtf = new Rtf();
			$rtf->setMargins(2, 2, 2 , 2);
			$sect = &$rtf->addSection();
			$fontGrey = new Font(12, 'dejavusans', '#474747');
			$fontTitle = new Font(20, 'dejavusans', '#000000');
			$fontTitle->setBold(1);
			$fontPar = new Font(12, 'dejavusans', '#000000');
			$parPar = new ParFormat();
			$parPar->setIndentLeft(0);
			$parPar->setSpaceAfter(0);
			$parMark = new ParFormat();
			$parMark->setIndentLeft(0);
			$parMark->setSpaceBefore(5);
			$fontSeite = new Font(12, 'dejavusans', '#232323');
			$parSeite = new ParFormat();
			$parSeite->setIndentLeft(14);
	$sect->writeText("<br /><br /><br /><br />".$anrede1, $fontPar, $parPar);
	// Titel Vorname Name
    if (isset($_POST['titel']) && isset($_POST['vorname']) && isset($_POST['name']))
    {
    	if($_POST['titel']!="")
    	{
	   		$titel=$_POST['titel']." ";
    	}
		$sect->writeText($titel. '' . $_POST['vorname'] . ' ' . $_POST['name'].'', $fontPar, $parPar);
    }
    // Straße
    if (isset($_POST['strasse']))
	{
		$sect->writeText($_POST['strasse'].'', $fontPar, $parPar);
	}
	// PLZ Ort
    if (isset($_POST['plz']) && isset($_POST['ort']))
	{
	    $sect->writeText($_POST['plz'] . ' ' . $_POST['ort'].'<br /><br />', $fontPar, $parPar);
    }

	// Überschrift
	$sect->writeText('ZEUGNIS<br />', $fontTitle, new ParFormat('center'));

	if($_POST['anrede']!="")
	{
	  	$anrede=$_POST['anrede']." ";
	}
	if($_POST['titel']!="")
	{
	   	$titel=" ".$_POST['titel'];
	}
	$absatz1 = $anrede . "" . $titel . " " . $_POST['vorname'] . " " . $_POST['name'] . ", geboren am " . $_POST['geb_datum'] . " in " . $_POST['geb_ort'] . ", wohnhaft " . $_POST['strasse'] . ", " . $_POST['plz'] . " " . $_POST['ort'] . ", war vom " . $_POST['beginn_arbeitsvertrag'] . " bis zum " . $_POST['ende_arbeitsvertrag'] . " als " . $_POST['bezeichnung_arb_platz'] . " in unserer Firma beschäftigt. ".$prenom_abs_1. " Aufgaben waren:";
	$sect->writeText($absatz1, $fontPar, $parPar);
	$sect->writeText('- '.$_POST['aufgabe_arb_nehmer'], $fontPar, $parMark);
	if($_POST['kompetenz']!="")
	{
		$sect->writeText('- '.$_POST['kompetenz'], $fontPar, $parMark);
	}
	if($_POST['erw_aufgaben_bereich']!="")
	{
		$sect->writeText('- '.$_POST['erw_aufgaben_bereich'], $fontPar, $parMark);
	}
	if($_POST['ver_aufgaben_bereich']!="")
	{
				$sect->writeText('- '.$_POST['ver_aufgaben_bereich'], $fontPar, $parMark);
	}
			$absatz2 = $anrede ." " . $_POST['name'] . " hatte " .$b3_a1." Berufserfahrung und arbeitete sich in die ".$prenom_abs_3." übertragenen Aufgaben ". $b3_a2_a ." ein und bewies eine " .$b3_a2_b. " Auffassungsgabe.\n";
			$absatz3 = "Die ".$prenom_abs_3." übertragenen Arbeiten erledigte ".$prenom_abs_3_b." in einer ".$b3_a4." Arbeitsgeschwindigkeit und erzielte hierbei ".$b3_a3." Arbeitsergebnisse. Die Arbeitsleistungen von ".$prenom_abs_3_a." ".$_POST['name']." waren ".$b3_a5.".\n";
			$absatz4 = $prenom_abs_4." brachte sich mit ".$b3_a6_a." Engagement ein und nahm ".$prenom_abs_7_b." Verantwortung für das Unternehmen ".$b3_a6_b.".\n";
			$sect->writeText('<br />'.$absatz2.'<br /><br />', $fontPar, $parPar);
			$sect->writeText($absatz3.'<br /><br />', $fontPar, $parPar);
			$sect->writeText($absatz4.'<br /><br />', $fontPar, $parPar);
			if($_POST['bes_leistungen']!=4)
		    {
			    $absatz5 = $anrede." ".$_POST['name']." entwickelte ".$b3_a7_a." Arbeitsabläufe mit ".$b3_a7_b." Nutzen für das Unternehmen weiter.\n";
				$sect->writeText($absatz5.'<br /><br />', $fontPar, $parPar);
			}
			$absatz6 = "Die Leistungen von ".$prenom_abs_3_a." ".$_POST['name']." entsprachen unseren ".$b3_a8.".\n";
			$absatz7 = $anrede." ".$_POST['name']." verfügt über ein ".$b3_b5_a." Auftreten und ".$b3_b5_b." Umgangsformen. ".$kollegen."".$untergebene."".$kunden."".$vorgesetzte."\n";
			$absatz8 = "Gerne bescheinigen wir ".$prenom_abs_3_a." ".$_POST['name'].", dass ".$prenom_abs_7_b." Mitarbeit ".$b3_c_a." ".$prenom_abs_1." Mitarbeit trug ".$b3_c_b." unserer Firma bei.\n";
			$absatz9 = $anrede." ".$_POST['name']." scheidet aus unserem Unternehmen aus, was wir bedauern. Wir wünschen ".$prenom_abs_3_a." ".$_POST['name']." für ".$prenom_abs_7_b." weitere berufliche Zukunft alles Gute und weiterhin viel Erfolg.\n";
			$sect->writeText($absatz6.'<br /><br />', $fontPar, $parPar);
			$sect->writeText($absatz7.'', $fontPar, $parPar);
			$sect->writeText($absatz8.'<br /><br />', $fontPar, $parPar);
			$sect->writeText($absatz9.'<br /><br />', $fontPar, $parPar);

		$table1 = &$sect->addTable();
        $parCellTabl = new ParFormat();
        $parCellTabl->setSpaceBefore(5);
        $table1->addRows(1, 0.8);
        $table1->addRows(2, 1.5);
        $table1->addColumn(5);
        $table1->addColumn(5);
        $table1->addColumn(5);
        $cell = &$table1->getCell(2, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
        $cell->writeText('(Ort)', $fontPar, $parCellTabl);

        $cell = &$table1->getCell(2, 3);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
        $cell->writeText('(Datum)', $fontPar, $parCellTabl);

        $cell = &$table1->getCell(3, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
        $cell->writeText('(Unterschrift)', $fontPar, $parCellTabl);
		$foot = &$sect->addFooter('all');
        $foot->setPosition(2);
        $seite="Seite <pagenum /> von 2";
        $foot->writeText($seite, $fontSeite, $parSeite);

        $rtf->sendRtf('zeugnis_'.date('Y-m-d_H-i-s'));
		}
	}
	else
	{
		$smarty->assign('error',$check_eingabe[1]);
	}
}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 25;
	$log_funk->log_insert();
}

//Funktionen
function check_eingabe(&$user, &$smarty)
{
	if($_POST['name']=="")
	{
		$message="Bitte -Nachname- eingeben";
		$smarty->assign('msg_name',$message);
		return array(false,$message);
	}
	if($_POST['vorname']=="")
	{
		$message="Bitte -Vorname- eingeben";
		$smarty->assign('msg_vorname',$message);
		return array(false,$message);
	}
	if($_POST['geb_datum']=="")
	{
		$message="Bitte -Geburtsdatum- eingeben";
		$smarty->assign('msg_geb_datum',$message);
		return array(false,$message);
	}
	if($_POST['geb_ort']=="")
	{
		$message="Bitte -Geburtsort- eingeben";
		$smarty->assign('msg_geb_ort',$message);
		return array(false,$message);
	}
	if($_POST['strasse']=="")
	{
		$message="Bitte -Strasse- eingeben";
		$smarty->assign('msg_strasse',$message);
		return array(false,$message);
	}
	if($_POST['plz']=="")
	{
		$message="Bitte -Postleitzahl- eingeben";
		$smarty->assign('msg_plz',$message);
		return array(false,$message);
	}
	if($_POST['ort']=="")
	{
		$message="Bitte -Ort- eingeben";
		$smarty->assign('msg_ort',$message);
		return array(false,$message);
	}
	if($_POST['beginn_arbeitsvertrag']=="")
	{
		$message="Bitte -Beginn des Arbeitsvertrages- eingeben";
		$smarty->assign('msg_beginn_arbeitsvertrag',$message);
		return array(false,$message);
	}
	if($_POST['ende_arbeitsvertrag']=="")
	{
		$message="Bitte -Ende des Arbeitsvertrages- eingeben";
		$smarty->assign('msg_ende_arbeitsvertrag',$message);
		return array(false,$message);
	}
	if($_POST['ende_grund']=="")
	{
		$message="Bitte -Grund der Beendigung- eingeben";
		$smarty->assign('msg_ende_grund',$message);
		return array(false,$message);
	}
	if($_POST['bezeichnung_arb_platz']=="")
	{
		$message="Bitte -Bezeihnung des Arbeitsplatzes- eingeben";
		$smarty->assign('msg_bezeichnung_arb_platz',$message);
		return array(false,$message);
	}
	if($_POST['aufgabe_arb_nehmer']=="")
	{
		$message="Bitte -Aufgaben des Arbeitsnehmers- eingeben";
		return array(false,$message);
	}

/*	if($_POST['kompetenz']=="")
	{
		$message="Bitte -Kompetenzen und Vollmachten- eingeben";
		return array(false,$message);
	}
	if($_POST['erw_aufgaben_bereich']=="")
	{
		$message="Bitte -Erweiterung des Aufgabenbereichs- eingeben";
		return array(false,$message);
	}
	if($_POST['ver_aufgaben_bereich']=="")
	{
		$message="Bitte -Ver&aufahrscheinerlaubnisml;nderung des Aufgabenbereichs- eingeben";
		return array(false,$message);
	}*/

	if($_POST['berufserfahrung']=="")
	{
		$message="Bitte -Berufserfahrung des Arbeitnehmers in dem Beruf von Begin des Arbeitsvertrages- eingeben";
		return array(false,$message);
	}
	if($_POST['einarbeitung']=="")
	{
		$message="Bitte -Einarbeitungszeit bei Aufnahme der Tätigkeit- eingeben";
		return array(false,$message);
	}
	if($_POST['qualitat']=="")
	{
		$message="Bitte -Qualit&auml;t der Arbeit- eingeben";
		return array(false,$message);
	}
	if($_POST['quantitat']=="")
	{
		$message="Bitte -Quantit&auml;t der Arbeit- eingeben";
		return array(false,$message);
	}
	if($_POST['arbeits_befahigung']=="")
	{
		$message="Bitte -Arbeitsbef&auml;higung- eingeben";
		return array(false,$message);
	}
	if($_POST['engagement']=="")
	{
		$message="Bitte -Engagement- eingeben";
		return array(false,$message);
	}
	if($_POST['bes_leistungen']=="")
	{
		$message="Bitte -Besondere Leistungen- eingeben";
		return array(false,$message);
	}
	if($_POST['leistung_gesamt_note']=="")
	{
		$message="Bitte -Gesamtnote der Leistung- eingeben";
		return array(false,$message);
	}
	if($_POST['vorgesetzte']=="")
	{
		$message="Bitte -gegen&uuml;ber Vorgesetzten- eingeben";
		return array(false,$message);
	}
	if($_POST['kollegen']=="")
	{
		$message="Bitte -gegen&uuml;ber Kollegen- eingeben";
		return array(false,$message);
	}
	if($_POST['untergebene']=="")
	{
		$message="Bitte -gegen&uuml;ber Untergebenen- eingeben";
		return array(false,$message);
	}
	if($_POST['kunden']=="")
	{
		$message="Bitte -gegen&uuml;ber Kunden- eingeben";
		return array(false,$message);
	}
	if($_POST['auftreten']=="")
	{
		$message="Bitte -Auftreten- eingeben";
		return array(false,$message);
	}
	if($_POST['ges_note']=="")
	{
		$message="Bitte -Gesamtnote- eingeben";
		return array(false,$message);
	}
	$message="Eintragung Erfolgreich";
	return array(true,$message);
}

$smarty->assign('status',$_SESSION['user']['status']);
$smarty->assign('contentTemplate', 'zeugnis_arbeitsnehmer_eingabe_form.tpl');