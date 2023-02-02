<?php
	$betreff="Alarmplan";
	$firma="Firma: ".$_POST['firma_name'];
	$standort="Standort: ".$_POST['standort_alarmplan'];
	$anweisung="BEI EINEM NOTRUF SIND FOLGENDE ANGABEN WICHTIG:";
	$fragen="Wo geschah es? Was geschah? Wie viele Verletzte?";
	$fragen_1="Welche Arten von Verletzungen? Warten auf Rückfragen!";
	
	
	
	$rtf = new Rtf();
	$rtf->setMargins(2, 2, 2 , 2);
	$sect = &$rtf->addSection();
	
	//ÜberschriftTextBold
	$fontTitleBold = new Font(14, 'dejavusans', '#000000');
	$fontTitleBold->setBold(1);
	
	//ÜberschriftText
	$fontTitle = new Font(11, 'dejavusans', '#000000');
	
	//KleinText
	$fontKlein = new Font(9, 'dejavusans', '#000000');
	//KleinTextBold
	$fontKleinBold = new Font(9, 'dejavusans', '#000000');
	$fontKleinBold->setBold(1);
	
	//StandartTextBold
	$fontStandartBold = new Font(10, 'dejavusans', '#000000');
	$fontStandartBold->setBold(1);
	
	//KleinText
	$fontStandart = new Font(10, 'dejavusans', '#000000');

	
	$parPar = new ParFormat();
	$parPar->setIndentLeft(0);
	$parPar->setSpaceAfter(0);
	
	$parMark = new ParFormat();
	$parMark->setIndentLeft(3);
	$parMark->setSpaceBefore(25);
	
	$parMarkText = new ParFormat();
	$parMarkText->setIndentLeft(7);
	$parMarkText->setSpaceBefore(30);
	

		// Überschrift
		$sect->writeText($firma, $fontTitleBold, new ParFormat());

		$sect->writeText($betreff, $fontTitleBold, $parMarkText);
		$parPar->setSpaceAfter(10);
		//Standort
		$parMarkText->setIndentLeft(4);
		$parMarkText->setSpaceBefore(20);
		$sect->writeText($standort, $fontKlein, $parMarkText);
		$parPar->setSpaceAfter(5);
		//Anweisung
		$sect->writeText($anweisung, $fontTitle, $parMark);
		$parPar->setSpaceBefore(10);
		$parPar->setIndentLeft(4.65);
		$sect->writeText($fragen, $fontStandart, $parPar);
		$parPar->setSpaceAfter(5);
		$parPar->setIndentLeft(4.2);
		$sect->writeText($fragen_1, $fontStandart, $parPar);
		$sect->writeText('<br>', $fontStandart, $parPar);
		
		//Tabelle 0
		
		$table = &$sect->addTable();
        $parCellTabl = new ParFormat();
        $parCellTabl->setSpaceBefore(15);
        $parCellTabl->setIndentLeft(0.2);
        $table->addRows(1, 1);

        $table->addColumn(1.5);
        $table->addColumn(7);
        $table->addColumn(1);
        $table->addColumn(7);
        

        $cell = &$table->getCell(1, 1);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        
        $cell = &$table->getCell(1, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, false);
        $cell->writeText('FEUER', $fontText, $parCellTabl);
        
        
        
        //->NEUE TABELLE 1
        $table1 = &$sect->addTable();
        $parCellTabl1 = new ParFormat();
        $parCellTabl1->setSpaceBefore(15);
        $parCellTabl1->setIndentLeft(0.2);
        $table1->addRows(1, 0);
        
        $table1->addColumn(1.5);
        $table1->addColumn(4);
        $table1->addColumn(3);
        $table1->addColumn(1);
        $table1->addColumn(4);
        $table1->addColumn(3);
        
        
        $cell1 = &$table1->getCell(1, 1);
        $cell1->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell1->writeText('', $fontKlein, $parCellTabl1);

        $cell1 = &$table1->getCell(1, 2);
        $cell1->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, false, false);
        $cell1->writeText('Feuerwehr alarmieren: ', $fontKlein, $parCellTabl1);
        
        $cell1 = &$table1->getCell(1, 3);
        $cell1->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, true, false);
        $cell1->writeText('112', $fontTitleBold, $parCellTabl1);
        
        $cell1 = &$table1->getCell(1, 4);
        $cell1->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell1->writeText('', $fontKlein, $parCellTabl1);
        
        $cell1 = &$table1->getCell(1, 5);
        $cell1->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, false, false);
        $cell1->writeText('Rettungsdienst anfordern:', $fontKlein, $parCellTabl1);
        
        $cell1 = &$table1->getCell(1, 6);
        $cell1->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, true, false);
        $cell1->writeText('112', $fontTitleBold, $parCellTabl1);
        
        //-<ENDE
        
        
       
        
        //->NEUE TABELLE 2
        $table2 = &$sect->addTable();
        $parCellTabl2 = new ParFormat();
        $parCellTabl2->setSpaceBefore(15);
        $parCellTabl2->setIndentLeft(0.2);
        $table2->addRows(1, 0);
        $table2->addRows(2, 0);
        #$table2->addRows(3, 0);
        
        $table2->addColumn(1.5);
        $table2->addColumn(7);
        $table2->addColumn(1);
        $table2->addColumn(7);
        
        
        $cell2 = &$table2->getCell(1, 1);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);

        $cell2 = &$table2->getCell(1, 2);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, false, false);
        $cell2->writeText('nächster Feuerlöscher:', $fontStandartBold, $parCellTabl2);
        
        $cell2 = &$table2->getCell(1, 3);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        
        $cell2 = &$table2->getCell(1, 4);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('nächster Verbandkasten:', $fontStandartBold, $parCellTabl2);
        
        
        //Neuer Rows      
        
        $cell2 = &$table2->getCell(2, 1);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);

        $cell2 = &$table2->getCell(2, 2);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, false, false);
        $cell2->writeText($_POST['ort_feuerloescher'], $fontStandart, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 3);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 4);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText($_POST['verbandskasten'], $fontStandart, $parCellTabl2);
        
        
        //Neuer Rows      
        
        $cell2 = &$table2->getCell(2, 1);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);

        $cell2 = &$table2->getCell(2, 2);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, false, false);
        $cell2->writeText('Menschen retten!', $fontStandartBold, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 3);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 4);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('Ersthelfer:', $fontStandartBold, $parCellTabl2);
        
        
        //Neuer Rows      
        
        $cell2 = &$table2->getCell(2, 1);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);

        $cell2 = &$table2->getCell(2, 2);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, false, false);
        $cell2->writeText('Brennende Personen mit Decken oder durch Wälzen auf dem Boden löschen!', $fontStandart, $parCellTabl2);
        $cell2->writeText('Brand bekämpfen!', $fontStandartBold, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 3);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 4);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText($_POST['name_ersthelfer'], $fontStandart, $parCellTabl2);
        $cell2->writeText('Nächster Arzt für Erste Hilfe und Durchgangsarzt: '.$_POST['artz'], $fontStandart, $parCellTabl2);
        
        
        //Neuer Rows      
        
        $cell2 = &$table2->getCell(2, 1);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);

        $cell2 = &$table2->getCell(2, 2);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, false, false);
        $cell2->writeText('Bei Brand in elektrischen Anlagen Strom ausschalten!', $fontStandart, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 3);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 4);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('Telefon: '.$_POST['tel_artz'], $fontStandart, $parCellTabl2);
        $cell2->writeText('', $fontStandart, $parCellTabl2);
        
        
        //Neuer Rows      
        
        $cell2 = &$table2->getCell(2, 1);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);

        $cell2 = &$table2->getCell(2, 2);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, false, false);
        $cell2->writeText('Feuerschutztüren schließen!', $fontStandart, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 3);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 4);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('Nächstes Krankenhaus: '.$_POST['krankenhaus'], $fontStandart, $parCellTabl2);
        
        
        //Neuer Rows      
        
        $cell2 = &$table2->getCell(2, 1);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);

        $cell2 = &$table2->getCell(2, 2);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, false, false);
        $cell2->writeText('Gefahrenbereich verlassen!', $fontStandart, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 3);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 4);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('', $fontStandart, $parCellTabl2);
        
        
        //Neuer Rows      
        
        $cell2 = &$table2->getCell(2, 1);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        $cell2->writeText('', $fontKlein, $parCellTabl2);

        $cell2 = &$table2->getCell(2, 2);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, false, true);
        $cell2->writeText('Sammelplatz: '.$_POST['sammelplatz'], $fontStandart, $parCellTabl2);
        $cell2->writeText('Feuerwehr einweisen!', $fontStandart, $parCellTabl2);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 3);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, false);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        
        $cell2 = &$table2->getCell(2, 4);
        $cell2->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, false, true, true);
        $cell2->writeText('Telefon: '.$_POST['tel_krankenhaus'], $fontStandart, $parCellTabl2);
        $cell2->writeText('', $fontKlein, $parCellTabl2);
        //-<ENDE 2 Tabelle
        
        
        
        
		$cell = &$table->getCell(1, 3);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, false, false, false);
		
		$cell = &$table->getCell(1, 4);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), true, true, true, false);
        $cell->writeText('UNFALL', $fontText, $parCellTabl);

        
        $parPar->setSpaceBefore(5);
		$parPar->setIndentLeft(2);
		$parPar->ParFormat('center');
		$sect->writeText('Haben Sie an Ihrem Arbeitsplatz etwas festgestellt, das eine Gefährdung für Sie oder Mitarbeiter darstellen können?', $fontStandart, $parPar);
		$sect->writeText('Sprechen Sie unseren Sicherheitsbeauftragten oder Ihren Vorgesetzten an.', $fontStandart, $parPar);
		$parPar->ParFormat('left');
		$sect->writeText('Sicherheitsbeauftragter: '.$_POST['sicherheits_beauftragter'], $fontStandart, $parPar);
		
		$rtf->sendRtf('alarmplan'.date('Y-m-d_H-i-s'));
?>
