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
$cell->writeText('SICHERUNGSVERTRAG', $fontTitle, $parRight);

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




$cell->writeText('nachstehend Sicherungsnehmer genannt,', $fontGrey, new ParFormat('center'));

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

$cell->writeText('nachstehend Sicherungsgeber genannt,', $fontGrey, new ParFormat('center'));

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$parRight->setSpaceAfter(5);
$cell->writeText('werden nachfolgende Vereinbarungen getroffen.', $fontGrey, $parRight);

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
$parPar->setSpaceAfter(10);


$fontSeite = new Font(12, 'dejavusans', '#232323');
$parSeite = new ParFormat();
$parSeite->setIndentLeft(15);


$fontText = new Font(11, 'dejavusans', '#232323');
//$fontText->setBold();
$parText = new ParFormat();
$parText->setIndentLeft(1.01);
$parText->setIndentRight(1);
$parText->setSpaceAfter(10);

$parMarkText = new ParFormat();
$parMarkText->setIndentLeft(2);
$parMarkText->setIndentRight(1);
$parMarkText->setSpaceAfter(10);
$parMarkText->ParFormat('justify');
$parMText = new ParFormat();
$parMText->setIndentLeft(1.01);
$parMText->setIndentRight(1);
$parMText->setIndentFirst(1);
$parMText->setSpaceAfter(10);
$parM2Text = new ParFormat();
$parM2Text->setIndentLeft(3);
$parM2Text->setIndentRight(1);
$parM2Text->setSpaceAfter(13);
    // Seite 2

    $paragraf_1="1. Gegenstand";
	  	$paragraf_1_abs_1="a. Sicherungsgeber und Sicherungsnehmer haben unter dem ".$_POST['beginn_darlehen']." einen Darlehensvertrag über eine Darlehenssumme in Höhe von ".$_POST['darlehen_summe']." €, nebst ".$_POST['zinssatz']." v. H. Jahreszins geschlossen.";
	  	$paragraf_1_abs_2="b. Zur Sicherung aller gegenwärtigen und zukünftigen, auch bedingten und befristeten Ansprüche des Sicherungsnehmers aus diesem Darlehensvertrag treffen die Vertragsparteien die nachstehenden Vereinbarungen.";
		$paragraf_1_abs_3="c. Zur Sicherung dieses Darlehens wird der Sicherungsgeber auf Anforderung des Sicherungsnehmers beantragen:";
	  	
		if($_POST['grundstuck_bezeichnung']!="")
	  	{
	  	 	$paragraf_1_abs_4="Grundstückbezeihnung: ".$_POST['grundstuck_bezeichnung'];
        }
		
		if($_POST['und_grundstuck']!="")
	  	{
	  		$zusatz_grundstuck="und FlStNr ".$_POST['und_grundstuck'].".";
	  	}
	  	else
	  	{
	  		$punkt=".";
	  	}
	  	$paragraf_1_abs_5="die Eintragung einer Grundschuld zu Lasten der Grundstücke FlStNr ".$_POST['grundstuck']." auf Gemarkung ".$_POST['gemarkung'].", eingetragen im Grundbuch von ".$_POST['grundbuch']." Blatt ".$_POST['blatt']."".$punkt." ".$zusatz_grundstuck;
        $sect->writeText($paragraf_1, $fontPar, $parPar);
        $sect->writeText($paragraf_1_abs_1, $fontText, $parMarkText);
        $sect->writeText($paragraf_1_abs_2, $fontText, $parMarkText);
        $sect->writeText($paragraf_1_abs_3, $fontText, $parMarkText);
        $sect->writeText($paragraf_1_abs_4, $fontText, $parM2Text);
        $sect->writeText($paragraf_1_abs_5, $fontText, $parM2Text);
	  	$paragraf_2="2. Eigentum und Voreintragungen";
	  	$paragraf_2_abs_1="a. Der Sicherungsgeber versichert, dass das unter Ziff. 1. c. genannte Grundstück in seinem Alleineigentum steht und der Eintragung einer Grundschuld keine anderweitigen Rechte entgegenstehen.";
	  	$sect->writeText($paragraf_2, $fontPar, $parPar);
        $sect->writeText($paragraf_2_abs_1, $fontText, $parMarkText);
        
	  	if($_POST['belastung']!="")
	  	{
	  	 	$paragraf_2_abs_2="b. Für das unter Ziff. 1. c. genannte Grundstück bestehen folgende Belastungen und Voreintragungen:";
		  	$paragraf_2_abs_3=$_POST['belastung'];
            $sect->writeText($paragraf_2_abs_2, $fontText, $parMarkText);
            $sect->writeText($paragraf_2_abs_3, $fontText, $parMarkText);
        }
        
        
        $paragraf_3="3. Schlussbestimmungen";
	  	$paragraf_3_abs_1="a. Der Darlehensvertrag zwischen Sicherungsgeber und -nehmer wird durch diesen Vertrag nicht berührt.";
	  	$paragraf_3_abs_2="b. Sollte eine Bestimmung dieses Vertrages unwirksam oder undurchführbar sein oder werden, so bleibt die Wirksamkeit der übrigen Bestimmungen unberührt.";
	  	$paragraf_3_abs_3="c. Gerichtsstand ist Düsseldorf (Gerichtsstandvereinbarung gemäß § 29 ZPO).";
        $sect->writeText($paragraf_3, $fontPar, $parPar);
        $sect->writeText($paragraf_3_abs_1, $fontText, $parMarkText);
        $sect->writeText($paragraf_3_abs_2, $fontText, $parMarkText);
        $sect->writeText($paragraf_3_abs_3, $fontText, $parMarkText);
		$sect->writeText("", $fontText, $parMarkText);
	  	
	 	$table1 = &$sect->addTable();
        $parCellTabl = new ParFormat();
        $parCellTabl->setSpaceBefore(4);
        $table1->addRows(1, 2);
        $table1->addRows(1, 2);
        $table1->addColumn(1.8);
        $table1->addColumn(5);
        $table1->addColumn(5);
        $table1->addColumn(5);
        $cell = &$table1->getCell(1, 2);
        
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
        $cell->writeText('(Ort)', $fontText, $parCellTabl);

        $cell = &$table1->getCell(1, 4);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
        $cell->writeText('(Datum)', $fontText, $parCellTabl);

        $cell = &$table1->getCell(2, 2);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
        $cell->writeText('(Sicherungsgeber)', $fontText, $parCellTabl);

        $cell = &$table1->getCell(2, 4);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
        $cell->writeText('(Sicherungsnehmer)', $fontText, $parCellTabl);

        $foot = &$sect->addFooter('all');
        $foot->setPosition(2);
        $seite="Seite <pagenum /> von 2";
        $foot->writeText($seite, $fontSeite, $parSeite);
        $foot = &$rtf->addFooter('first');
    // Seite 2
//** TEXTS**//

$rtf->sendRtf('sicherungsvertrag_'.date('Y-m-d_H-i-s'));
?>        