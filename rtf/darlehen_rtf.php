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
$cell->writeText('DARLEHENSVERTRAG', $fontTitle, $parRight);

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
$cell->writeText('nachstehend Darlehensgeber genannt,', $fontGrey, new ParFormat('center'));

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$parUnd = new ParFormat();
$parUnd->setIndentLeft(4);
$cell->writeText('und', $fontGrey, $parUnd);

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);
$cell->writeText("$absatz4_0<br />$absatz4<br />$absatz5<br />$absatz6<br />", $fontName, $parRight);
    if(isset($_POST['ex_vertreter']))
	    {
	    	$cell->writeText("$absatz5_2", $fontName, $parRight);
	    }

$cell->writeText('nachstehend Darlehensnehmer genannt,', $fontGrey, new ParFormat('center'));

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$parRight->setSpaceAfter(5);
$cell->writeText('wird nachfolgender Darlehensvertrag geschlossen.', $fontGrey, $parRight);

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
$parText->setSpaceAfter(30);
$parText->ParFormat('justify');

$parMarkText = new ParFormat();
$parMarkText->setIndentLeft(2);
$parMarkText->setIndentRight(1);
$parMarkText->setSpaceAfter(20);
$parMarkText->ParFormat('justify');
$parMText = new ParFormat();
$parMText->setIndentLeft(1.01);
$parMText->setIndentRight(1);
$parMText->setIndentFirst(1);
$parMText->setSpaceAfter(20);

    // Seite 2

        $paragraf_1="1. Darlehensmittel; Laufzeit; Darlehensauszahlung";
	  	$paragraf_1_abs_1="a. Die Darlehensgeber stellen dem Darlehensnehmer eine Summe in Höhe von ".$_POST['darlehen_summe']." € zur Verfügung. \n";
	  	if($_POST['ex_anrede']==1)
	  	{
	  		$darlehensnehmer_requisiten=" des ".$absatz4_0." ".$absatz4;
	  	}
	  	if($_POST['ex_anrede']==2)
	  	{
	  		$darlehensnehmer_requisiten=" der ".$absatz4_0." ".$absatz4;
	  	}
	  	$paragraf_1_abs_2="b. Das Darlehen wird ab dem ".$_POST['beginn_darlehen']." bis zum ".$_POST['dauer']." gewährt und auf das Konto ".$darlehensnehmer_requisiten." bei der ".$_POST['bank'].", Kto.Nr. ".$_POST['konto'].", BLZ ".$_POST['blz']." überwiesen.\n";
		$paragraf_1_abs_3="c. Spätestens 6 Monate vor Ende der Laufzeit können die Parteien über eine Prolongation für die Dauer von einem Jahr verhandeln.\n";
        $sect->writeText($paragraf_1, $fontPar, $parPar);
        $sect->writeText($paragraf_1_abs_1, $fontText, $parMarkText);
        $sect->writeText($paragraf_1_abs_2, $fontText, $parMarkText);
        $sect->writeText($paragraf_1_abs_3, $fontText, $parMarkText);
        
	  	$paragraf_2="2. Zinssatz und Tilgung";
	  	
	  	switch($_POST['falligkeit'])
	  	{
	  		case 1: $falligkeit="monatlich";break;
	  		case 2: $falligkeit="1/4jährlich";break;
	  		case 3: $falligkeit="1/2jährlich";break;
	  		case 4: $falligkeit="jährlich";break;
	  	}
	  	$paragraf_2_abs_1="a. Der Zinssatz beträgt ".$_POST['zinssatz']." v.H. p.a., berechnet sich von der offenen Darlehensforderung und ist während der Laufzeit nicht veränderbar. Im Falle einer Verlängerung der Laufzeit gemäß Punkt 1. c. des Vertrages, können die Parteien einen anderen Zinssatz vereinbaren. Die angelaufenen Zinszahlungen werden ".$falligkeit." ausgezahlt.";
	  	$paragraf_2_abs_2="b. Die Rückzahlung des Darlehens ist erst zum Ende der Laufzeit fällig. Dem Darlehensnehmer bleibt es jedoch unbelassen, Teil- oder Vollzahlungen auch vor Ablauf der Laufzeit zu leisten.";
	  	$paragraf_2_abs_3="c. Der Darlehensnehmer verzichtet auf Einwendungen jeglicher Art hinsichtlich des Grundes und der Höhe der Schuld sowie auf die Erhebung der Vollstreckungsgegenklage.";
	  	$paragraf_2_abs_4="d. Der Darlehensnehmer erklärt, bei gleichbleibenden wirtschaftlichen Verhältnissen zur Rückzahlung der Darlehenssumme am Tage der Fälligkeit in der Lage zu sein und nicht zu beabsichtigen, gerichtlichen Vollstreckungsschutz in Anspruch zu nehmen.";
	  	$sect->writeText($paragraf_2, $fontPar, $parPar);
        $sect->writeText($paragraf_2_abs_1, $fontText, $parMarkText);
        $sect->writeText($paragraf_2_abs_2, $fontText, $parMarkText);
        $sect->writeText($paragraf_2_abs_3, $fontText, $parMarkText);
        
        
	  	if($_POST['sicherheit']==1)
	  	{
	  		$paragraf_nummer_4="4.";
	  		$paragraf_nummer_5="5.";
            
	  		$paragraf_3="3. Sicherheiten";
		  	$paragraf_3_abs_0="Zur Sicherung des Darlehens stellt der Darlehensnehmer dem Darlehensgeber in gesonderten Verträgen folgende Sicherheiten:";
            $sect->writeText($paragraf_3, $fontPar, $parPar);
            $sect->writeText($paragraf_3_abs_0, $fontText, $parText);
		  	if($_POST['sicherungs_gut']==1)
		  	{
		  		if($_POST['sicherheit_gut']!="")
			  	{
			  		$sicherheit_gut=" (".$_POST['sicherheit_gut'].")";
			  	}
		  		
		  		$a="a.";
		  		$b="b.";
		  		$c="c.";
	  	
		  		if($_POST['sicherheit_hohe']!="")
		  		{
		  			$wert=" in Höhe von ".$_POST['sicherheit_hohe']." €"; 
		  		}
			  	$paragraf_3_abs_1=$a." Abtretung des Warenbestandes".$sicherheit_gut.$wert.".";
                $sect->writeText($paragraf_3_abs_1, $fontText, $parMarkText);
			}
		  	if($_POST['sicherungs_gut']==2)
		  	{
		  		$b="a.";
		  		$c="b.";
		  	}
		  	if($_POST['grundschuld']==1)
		  	{
			  	$paragraf_3_abs_2=$b." Verpflichtung zur Eintragung einer Grundschuld in höhe von ".$_POST['grundschuld_hohe']." €.";
                $sect->writeText($paragraf_3_abs_2, $fontText, $parMarkText);
			}
		  	if($_POST['grundschuld']==2)
		  	{
		  		$c="a.";
		  		if($_POST['sicherungs_gut']==1)
		  		{
		  			$c="b.";
		  		}
		  	}
		  	if($_POST['burgschafts_hohe']!="")
		  	{
		  		$burgschafts_hohe=" in Höhe von ".$_POST['burgschafts_hohe']." €"; 
		  	}
		  	if($_POST['burgschaft']==1)
		  	{
			  	$paragraf_3_abs_3=$c." Persönliche Bürgschaft ".$_POST['burgschafts_des'].$burgschafts_hohe.".";
                $sect->writeText($paragraf_3_abs_3, $fontText, $parMarkText);
		  	}
	  	}
	  	if($_POST['sicherheit']==2)
	  	{
	  		$paragraf_nummer_4="3.";
	  		$paragraf_nummer_5="4.";
	  	}
	  	
	  	$paragraf_3=$paragraf_nummer_4." Kündigung, Fälligstellung";
	  	$paragraf_3_abs_0="Der Darlehensgeber kann den Darlehensvertrag nur aus wichtigem Grund vorzeitig kündigen und in voller Höhe mit sofortiger Wirkung zur Rückzahlung fällig stellen. Ein wichtiger Grund liegt insbesondere vor, wenn";
	  	$paragraf_3_abs_1="a. der Darlehensnehmer Vertragspflichten verletzt;";
	  	$sect->writeText($paragraf_3, $fontPar, $parPar);
        $sect->writeText($paragraf_3_abs_0, $fontText, $parText);
        $sect->writeText($paragraf_3_abs_1, $fontText, $parMarkText);
	  	if($_POST['sicherheit']==1)
	  	{
	  		
            
	  	}
	  	$paragraf_3_abs_2="b. der Darlehensnehmer unrichtige Angaben gemacht hat, die auf die Gewährung des Darlehens Einfluss hatten;\n";
	  	$paragraf_3_abs_3="c. gegen den Darlehensnehmer das gerichtliche Vergleichs- oder Insolvenzverfahren beantragt oder eröffnet wird oder der Darlehensnehmer einen gerichtlichen Vergleich anstrebt oder Zahlungen dauernd oder vorübergehend einstellt oder seine wirtschaftlichen Verhältnisse sich sonst derart verschlechtern, dass die Ansprüche aus diesem Vertrag gefährdet werden;\n";
	  	$paragraf_3_abs_4="d. der Darlehensnehmer sich gegenüber dem Darlehensgeber oder anderen Gläubigern weigert oder außerstande erklärt, eine fällige und einredefreie Forderung, gleich welcher Höhe, zu erfüllen.\n";
	  	$sect->writeText($paragraf_3_abs_2, $fontText, $parMarkText);
        $sect->writeText($paragraf_3_abs_3, $fontText, $parMarkText);
        $sect->writeText($paragraf_3_abs_4, $fontText, $parMarkText);
	  	
	  	if($_POST['sicherheit']==2)
	  	{
	  		
	  	}
	  	
	  	
	  	$paragraf_3_abs_5="Das Recht des Darlehensgebers zur Kündigung aus einem sonstigen wichtigen Grund bleibt unberührt.\n";
        $sect->writeText($paragraf_3_abs_5, $fontText, $parText);
	  	$paragraf_5=$paragraf_nummer_5." Sonstige Vereinbarungen";
	  	$paragraf_5_abs_1="a. Nebenabreden und Änderungen zu diesem Vertrag bedürfen der Schriftform oder schriftlichen Bestätigung.\n";
	  	$paragraf_5_abs_2="b. Erfüllungsort für alle Zahlungen ist der Sitz des Darlehensgebers. \n";
	  	$paragraf_5_abs_3="c. Gerichtsstand ist Düsseldorf (Gerichtsstandsvereinbarung gemäß § 29 ZPO). \n";
	  	$paragraf_5_abs_4="d. Die Unwirksamkeit einzelner Vertragsbestimmungen berührt die Wirksamkeit des Vertrages im Übrigen nicht. \n";
	  	$paragraf_5_abs_5="e. Der Darlehensgeber ist berechtigt, die Darlehensforderung zu Refinanzierungszwecken abzutreten und die vom Darlehensnehmer bestellten Sicherheiten an den Abtretungsempfänger zu übertragen.\n";
	  	$sect->writeText($paragraf_5, $fontPar, $parPar);
        $sect->writeText($paragraf_5_abs_1, $fontText, $parMarkText);
        $sect->writeText($paragraf_5_abs_2, $fontText, $parMarkText);
        $sect->writeText($paragraf_5_abs_3, $fontText, $parMarkText);
        $sect->writeText($paragraf_5_abs_4, $fontText, $parMarkText);
        $sect->writeText($paragraf_5_abs_5, $fontText, $parMarkText);
	    
	    
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
        $cell->writeText('(Sicherungsgeber)', $fontText, $parCellTabl);

        $cell = &$table1->getCell(3, 4);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
        $cell->writeText('(Sicherungsnehmer)', $fontText, $parCellTabl);

        $foot = &$sect->addFooter('all');
        $foot->setPosition(2);
        $seite="Seite <pagenum /> von 4";
        $foot->writeText($seite, $fontSeite, $parSeite);
        $foot = &$rtf->addFooter('first');
    // Seite 2
//** TEXTS**//

$rtf->sendRtf('darlehensvertrag_'.date('Y-m-d_H-i-s'));
?>        