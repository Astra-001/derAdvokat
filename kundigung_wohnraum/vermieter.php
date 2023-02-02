<?php
switch($_POST['geschlecht'])
      {
	case 1: $var="Herr";
	  $var1=$var."n";
	  $buchstabe="r"; break;
	case 2: $var="Frau";
	  $var1=$var;
	  $buchstabe=" "; break;
      }
    $betreff="Kündigung der Wohnung";
    $absatz_date= date("d. m. Y");
    $bs21 = $_POST['sp_ort'].', '.$_POST['sp_strasse'].' '.$_POST['sp_hausnum'].'/'.$_POST['sp_wohnnum'];
    $bs22 = $_POST['date_rent_begin_in'];
    $bs3 = $_POST['date_rent_rez'];
    $bs4 = $_POST['eigendarf_form'];
    $rtf = new Rtf();
    $rtf->setMargins(2, 5, 2 , 2);
    $sect = &$rtf->addSection();
    $fontGrey = new Font(12, 'dejavusans', '#474747');
    $fontTitle = new Font(12, 'dejavusans', '#000000');
    $fontTitle->setBold(1);
    $fontPar = new Font(12, 'dejavusans', '#000000');
    //$fontPar->setBold(1);
    $parPar = new ParFormat();
    $parPar->setIndentLeft(0);
    $parPar->setSpaceAfter(0);
    $parParC = new ParFormat('center');
    $parParC->setIndentLeft(0);
    $parParC->setSpaceAfter(0);
    $parDate = new ParFormat();
    $parDate->setIndentLeft(14);
    $parDate->setSpaceAfter(0);
    $parMark = new ParFormat();
    $parMark->setIndentLeft(0);
    $parMark->setSpaceBefore(10);
    
	    $sect->writeText($var1, $fontPar, $parPar);
	    // Vorname Name
	$sect->writeText($_POST['vorname']." ".$_POST['name'], $fontPar, $parPar);
	
	// Straße
	$sect->writeText($_POST['strasse'], $fontPar, $parPar);
	    
	    // PLZ Ort
	$sect->writeText($_POST['plz']." ".$_POST['ort'].'<br />', $fontPar, $parPar);
	    
	    //Date
	$sect->writeText($absatz_date.'<br /><br />', $fontPar, $parDate);
    $parPar->setSpaceAfter(15);	
	    // Überschrift
    
	    $sect->writeText($betreff.' '.$bs21, $fontTitle, new ParFormat());
	    $parLine = new ParFormat();
	    $parLine->setIndentLeft(0);
	    $parLine->setIndentRight(0);
	    $parLine->setSpaceBefore(5);
	    $parLine->setSpaceAfter(20);
	    $parLine->setBorders(new BorderFormat(1, '#ACA899', 'single', 0), false, true, false, false);
	    $sect->writeText(' ', new Font(1, 'dejavusans', '#474747'), $parLine);
	    $absatz_begruessung = "Sehr geehrte".$buchstabe." ".$var." ".$_POST['name'].",";
	    
	    $sect->writeText($absatz_begruessung.'<br />', $fontPar, $parPar);
	    $parPar = new ParFormat();
	    $parPar->setIndentLeft(0);
	    $parPar->setSpaceAfter(0);
	    $absatz1 = "bezugnehmend auf das o. g. Objekt und den Wohnraummietvertrag vom ".$bs22." spreche ich Ihnen die";
	    $sect->writeText($absatz1.'<br />', $fontPar, $parPar);
	    $absatz11 = "<b>ordentliche Kündigung des Mietverhältnisses</b>";
	    $sect->writeText($absatz11.'<br />', $fontPar, $parParC);  
	    $absatz2 = "aus und stütze diese auf §§ 573 Abs. 2 Nr. 2, 573 c Abs. 1 BGB. Die Kündigung wird wirksam zum ";
	    $sect->writeText($absatz2.'<br />', $fontPar, $parPar);
	    $absatz3 = $bs3.".";
	    $sect->writeText('<br /><b>'.$absatz3.'</b><br /><br />', $fontPar, $parParC);
	    $absatz4 = "Der Fortsetzung des Mietverhältnisses über diesen Zeitpunkt hinaus wird gemäß § 545 BGB bereits jetzt widersprochen. ";
	    $sect->writeText($absatz4.'<br />', $fontPar, $parPar);
	    $absatz5 = "1. Die von Ihnen bewohnte Wohnung möchte ich selber nutzen.<br />".$bs4;
	    $sect->writeText($absatz5.'<br />', $fontPar, $parPar);
	    $absatz6 = "Es besteht die Möglichkeit gegen diese Kündigung gem. §§ 574, 574 b BGB Widerspruch einzulegen. Ich mache darauf aufmerksam, dass ein Widerspruch nur wirksam werden kann, wenn er form- und fristgerecht eingelegt wurde. Diesbezüglich verweise ich auf die unten abgedruckte Fassung der § 574 BGB und § 574 b BGB. ";
	    $sect->writeText($absatz6.'<br /><br />', $fontPar, $parPar);
	    $absatz7 = "§§ 574, 574 b BGB lauten:";
	    $sect->writeText($absatz7.'<br />', $fontPar, $parPar);
	    $absatz8 = "<b>§ 574</b>";
	    $sect->writeText($absatz8, $fontPar, $parParC);
	    $absatz9 = "<b>Widerspruch des Mieters gegen die Kündigung</b><br />";
	    $sect->writeText($absatz9, $fontPar, $parParC);
	    $absatz10 = "(1) Der Mieter kann der Kündigung des Vermieters widersprechen und von ihm die Fortsetzung des Mietverhältnisses verlangen, wenn die Beendigung des Mietverhältnisses für den Mieter, seine Familie oder einen anderen Angehörigen seines Haushalts eine Härte bedeuten würde, die auch unter Würdigung der berechtigten Interessen des Vermieters nicht zu rechtfertigen ist. Dies gilt nicht, wenn ein Grund vorliegt, der den Vermieter zur außerordentlichen fristlosen Kündigung berechtigt. ";
	    $sect->writeText($absatz10, $fontPar, $parPar);
	    $absatz11 = "(2) Eine Härte liegt auch vor, wenn angemessener Ersatzwohnraum zu zumutbaren Bedingungen nicht beschafft werden kann. ";
	    $sect->writeText($absatz11, $fontPar, $parPar);
	    $absatz12 = "(3) Bei der Würdigung der berechtigten Interessen des Vermieters werden nur die in dem Kündigungsschreiben nach § 573 Abs. 3 angegebenen Gründe berücksichtigt, außer wenn die Gründe nachträglich entstanden sind. ";
	    $sect->writeText($absatz12, $fontPar, $parPar);
	    $absatz13 = "(4) Eine zum Nachteil des Mieters abweichende Vereinbarung ist unwirksam. ";
	    $sect->writeText($absatz13.'<br /><br />', $fontPar, $parPar);
	    $absatz14 = "<b>§ 574b</b>";
	    $sect->writeText($absatz14, $fontPar, $parParC);
	    $absatz15 = "<b>Form und Frist des Widerspruchs</b><br />";
	    $sect->writeText($absatz15, $fontPar, $parParC);
	    $absatz16 = "(1) Der Widerspruch des Mieters gegen die Kündigung ist schriftlich zu erklären. Auf Verlangen des Vermieters soll der Mieter über die Gründe des Widerspruchs unverzüglich Auskunft erteilen. ";
	    $sect->writeText($absatz16, $fontPar, $parPar);
	    $absatz17 = "(2) Der Vermieter kann die Fortsetzung des Mietverhältnisses ablehnen, wenn der Mieter ihm den Widerspruch nicht spätestens zwei Monate vor der Beendigung des Mietverhältnisses erklärt hat. Hat der Vermieter nicht rechtzeitig vor Ablauf der Widerspruchsfrist auf die Möglichkeit des Widerspruchs sowie auf dessen Form und Frist hingewiesen, so kann der Mieter den Widerspruch noch im ersten Termin des Räumungsrechtsstreits erklären. ";
	    $sect->writeText($absatz17, $fontPar, $parPar);
	    $absatz18 = "(3) Eine zum Nachteil des Mieters abweichende Vereinbarung ist unwirksam. ";
	    $sect->writeText($absatz18, $fontPar, $parPar);
	    $parPar = new ParFormat();
	    $parPar->setIndentLeft(0);
	    $parPar->setSpaceAfter(0);
	    $absatz7 = "Mit freundlichen Grüßen";
	    $sect->writeText("<br /><br />".$absatz7."<br />", $fontPar, $parPar);
    
	    $table1 = &$sect->addTable();
	$parCellTabl = new ParFormat();
	$parCellTabl->setSpaceBefore(5);
	    $table1->addRows(1, 2);
	$table1->addRows(1, 2);
	    
	$table1->addColumn(8);
	
	$cell = &$table1->getCell(2, 1);
	
	$cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
	$cell->writeText('Unterschrift des/der Vermieter(s)', $fontPar, $parCellTabl);
	
    
    $rtf->sendRtf('kundigung_wohnraum_vermieter_'.date('Y-m-d_H-i-s'));
?>
