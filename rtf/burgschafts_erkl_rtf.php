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
$cell->writeText('BÜRGSCHAFTSERKLÄRUNG', $fontTitle, $parRight);

$parEmpty->setSpaceBetweenLines(3);
$cell->writeText('<br />', new Font(), $parEmpty);

$cell->writeText('zwischen', $fontGrey, $parRight);
$parEmpty->setSpaceBetweenLines(1.5);
$cell->writeText('<br />', new Font(), $parEmpty);

$fontName = new Font(12, 'dejavusans', '#000000');
$fontName->setBold(1);

        $cell->writeText("$absatz1_0<br />$absatz1<br />$absatz2<br />$absatz3<br />", $fontName, $parRight);
	    //if(isset($_POST['vertreter']))
	    #{
        	$cell->writeText("$absatz2_2", $fontName, $parRight);
	    #}




$cell->writeText('nachfolgend Bürge genannt,', $fontGrey, new ParFormat('center'));

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$parUnd = new ParFormat();
$parUnd->setIndentLeft(4);
$cell->writeText('gibt zugunsten', $fontGrey, $parUnd);

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$cell->writeText("$absatz4_0<br />$absatz4<br />$absatz5<br />$absatz6<br />$absatz5_2", $fontName, $parRight);


$cell->writeText('nachfolgend Darlehensgeber genannt,', $fontGrey, new ParFormat('center'));

$parEmpty->setSpaceBetweenLines(2);
$cell->writeText('<br />', new Font(), $parEmpty);

$parRight->setSpaceAfter(5);
$cell->writeText('nachfolgende Bürgschaftserklärung ab.', $fontGrey, $parRight);

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
$parText->setSpaceAfter(27);
$parText->ParFormat('justify');


        $absatz1='a. '.$absatz_a;
	
	   	$absatz2="b. Zur Sicherung aller gegenwärtigen und zukünftigen, auch bedingten und befristeten Ansprüche des Darlehensgebers aus diesem Darlehensvertrag, übernimmt der Bürge die Bürgschaft unter Verzicht auf die Einrede der Vorausklage.";
	   	$sect->writeText($absatz1, $fontText, $parText);
        $sect->writeText($absatz2, $fontText, $parText);
        
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
        $cell->writeText('(Bürge)', $fontText, $parCellTabl);

        $cell = &$table1->getCell(3, 4);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
        $cell->writeText('(Darlehensgeber)', $fontText, $parCellTabl);

        $foot = &$sect->addFooter('all');
        $foot->setPosition(2);
        $seite5="Seite <pagenum /> von 2";
        $foot->writeText($seite5, $fontSeite, $parSeite);


		$foot = &$rtf->addFooter('first');

    // Seite 2

//
//** TEXTS**//

$rtf->sendRtf('buergschaftserklaerung_'.date('Y-m-d_H-i-s'));
?>        