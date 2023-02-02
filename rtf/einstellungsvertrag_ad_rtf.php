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
$cell->writeText('ANSTELLUNGSVERTRAG', $fontTitle, $parRight);

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
$parText->setSpaceAfter(24);
$parText->ParFormat('justify');

$parMarkText = new ParFormat();
$parMarkText->setIndentLeft(2);
$parMarkText->setIndentRight(1);
$parMarkText->setSpaceAfter(21);
$parMText = new ParFormat();
$parMText->setIndentLeft(1.01);
$parMText->setIndentRight(1);
$parMText->setIndentFirst(1);
$parMText->setSpaceAfter(28);
    // Seite 2
   	 
    
        //Paragraf 1
        $paragraf_1="§ 1 Beginn des Arbeitsverhältnisses";
        $sect->writeText($paragraf_1, $fontPar, $parPar);
            $paragraf_1_abs_1="(1) Der Mitarbeiter wird beginnend zum ".$_POST['beginn']." eingestellt. Vor Beginn des Arbeitsverhältnisses ist die ordentliche Kündigung ausgeschlossen.";
            $sect->writeText($paragraf_1_abs_1, $fontText, $parText);
            $paragraf_1_abs_2="(2) Der Mitarbeiter ist verpflichtet, sich auf Wunsch des Arbeitgebers zur Feststellung der gesundheitlichen Eignung ärztlich untersuchen zu lassen. Die Kosten der Untersuchung trägt der Arbeitgeber.";
    	  	$sect->writeText($paragraf_1_abs_2, $fontText, $parText);
    	  	$paragraf_1_abs_3="(3) Die ersten sechs Monate gelten als Probezeit.";
            $sect->writeText($paragraf_1_abs_3, $fontText, $parText);
            $paragraf_1_abs_4="(4) Der Mitarbeiter verpflichtet sich, für den Fall der rechtswidrigen und schuldhaften Nichtaufnahme der Arbeit oder der vertragswidrigen Beendigung des Arbeitsverhältnisses eine Vertragsstrafe zu zahlen. Die Vertragsstrafe darf das in der maßgeblichen Kündigungsfrist ansonsten enthaltene Arbeitsentgelt nicht übersteigen. Abgesehen von dieser Begrenzung wird sie auf ein Bruttomonatsentgelt festgesetzt.";
            $sect->writeText($paragraf_1_abs_4, $fontText, $parText);
        //Paragraf 1

        //Paragraf 2
        $paragraf_2="§ 2 Tätigkeit";
        $sect->writeText($paragraf_2, $fontPar, $parPar);
            $paragraf_2_abs_1="(1) Der Mitarbeiter wird für den Unternehmensbereich Vertrieb als Außendienstvertretter eingestellt. Erfüllungsort für die Arbeitsleistung ist der Betriebssitz. Der Arbeitgeber wird dem Mitarbeiter ein Vertriebsgebiet innerhalb ".$_POST['vertriebsgebiet']." zuzuweisen, das von dem Mitarbeiter zu bereisen ist.";
            $sect->writeText($paragraf_2_abs_1, $fontText, $parText);
            $paragraf_2_abs_2="(2) Der Arbeitgeber behält sich vor, den Mitarbeiter innerhalb des Unternehmens zu versetzen, wenn ihm dies bei Abwägung der betrieblichen und seiner persönlichen Belange zuzumuten ist.";
    	  	$sect->writeText($paragraf_2_abs_2, $fontText, $parText);
    	  	$paragraf_2_abs_3="(3) Der Mitarbeiter erhält mit diesem Vertrag die Aufgaben- und Verhaltensrichtlinien des Arbeitgebers ausgehändigt, soweit diese bereits erarbeitet sind und die im Falle des Vorliegens, Bestandteil dieses Vertrages sind.";
            $sect->writeText($paragraf_2_abs_3, $fontText, $parText);
            $paragraf_2_abs_4="(4) Der Mitarbeiter nimmt ausschließlich die Interessen des Arbeitgebers wahr. Zu Geschäftsabschlüssen und zur Einräumung besonderer Zahlungsfristen ist er nicht befugt. Zahlungen darf der Mitarbeiter nur entgegennehmen, wenn er in Einzelfällen von der Geschäftsleitung ausdrücklich ermächtigt wird.";
            $sect->writeText($paragraf_2_abs_4, $fontText, $parText);
        //Paragraf 2

        //Paragraf 3
         
	  	$paragraf_3="§ 3 Arbeitszeit";
        $sect->writeText($paragraf_3, $fontPar, $parPar);
            $paragraf_3_abs_1="(1) Die regelmäßige Arbeitszeit entspricht der für Vollzeitarbeitnehmer im Betrieb üblichen Arbeitszeit. Sie beträgt zurzeit ohne Pausen 40 Stunden wöchentlich.";
            $sect->writeText($paragraf_3_abs_1, $fontText, $parText);
            $paragraf_3_abs_2="(2) Der Mitarbeiter ist verpflichtet, Sonn-, Feiertags- und Mehrarbeit zu leisten, soweit dies betrieblich notwendig und gesetzlich zulässig ist.";
    	  	$sect->writeText($paragraf_3_abs_2, $fontText, $parText);
    	//Paragraf 3

        //Paragraf 4
        $paragraf_4="§ 4 Vergütung";
        $sect->writeText($paragraf_4, $fontPar, $parPar);
            $paragraf_4_abs_1="(1) Der Mitarbeiter erhält ein Monatsbruttogehalt von ".$_POST['gehalt']." EURO, das nachträglich fällig wird.";
            $sect->writeText($paragraf_4_abs_1, $fontText, $parText);
            $paragraf_4_abs_2="(2) Mit der Vergütung nach Absatz 1 sind - soweit sie vom Arbeitgeber nicht angeordnet wurden - Sonn-, Feiertags- und  auch Mehrarbeitsstunden abgegolten. Sind mehr als fünf Stunden Mehrarbeit in der Woche angeordnet, sind die hierüber hinaus gehenden Mehrarbeitsstunden zu vergüten. Die Höhe der Vergütung pro Stunde Mehrarbeit beträgt dann ein Monatsbruttogehalt geteilt durch 168. Dem Arbeitgeber steht es frei, dem Mitarbeiter statt der Vergütung einen Freizeitausgleich zu gewähren.";
    	  	$sect->writeText($paragraf_4_abs_2, $fontText, $parText);
      
            $paragraf_4_abs_3="(3) Wird die Vergütung durch einen gerichtlichen Pfändungsbeschluss gepfändet, so fällt hierfür eine Bearbeitungspauschale in Höhe von 1,5 % des gepfändeten Betrages pro Pfändung an.";
            $sect->writeText($paragraf_4_abs_3, $fontText, $parText);
            
            if ($verpflegung!="" AND $ubernachtung!="")
            {
	            $paragraf_4_abs_4="(4) Aufwendungsersatz für Reise, Verpflegung und Übernachtung wird nach folgenden Bestimmungen, jedoch nicht bei Urlaub, geleitet:";
	            $sect->writeText($paragraf_4_abs_4, $fontText, $parText);
	            $paragraf_4_abs_5=$verpflegung;
	            $sect->writeText($paragraf_4_abs_5, $fontText, $parMarkText);
	            $paragraf_4_abs_6=$ubernachtung;
	            $sect->writeText($paragraf_4_abs_6, $fontText, $parMarkText);
	            $paragraf_4_abs_7="Die Spesen sind vom Mitarbeiter jeweils zum Monatsanfang für den abgelaufenen Monat beim Arbeitgeber geltend zu machen und müssen spätestens am 3. Werktag des Monats als Abrechnung dort vorliegen. Die Spesen werden mit der nächsten Gehaltszahlung ausgezahlt.";
	            $sect->writeText($paragraf_4_abs_7, $fontText, $parText);
            }
            
    	//Paragraf 4
        //Paragraf 5
        $paragraf_5="§ 5 Gratifikationen";
        $sect->writeText($paragraf_5, $fontPar, $parPar);
            $paragraf_5_abs_1="(1) Der Mitarbeiter erhält keine Gratifikation.";
            $sect->writeText($paragraf_5_abs_1, $fontText, $parText);
            $paragraf_5_abs_2="(2) Zahlt der Arbeitgeber dem Mitarbeiter dennoch einer Gratifikation erfolgt dies, soweit sie gesetzlich nicht vorgeschrieben ist, freiwillig und ohne jeden zukünftigen Rechtsanspruch. Auch aus wiederholter Gewährung kann ein Rechtsanspruch nicht abgeleitet werden.";
    	  	$sect->writeText($paragraf_5_abs_2, $fontText, $parText);
    	//Paragraf 5

        //Paragraf 6
        if ($verpflegung!="" AND $ubernachtung!="")
            {
		        $paragraf_61="";
		        $sect->writeText($paragraf_61, $fontPar, $parPar);
		        $sect->writeText($paragraf_61, $fontPar, $parPar);
		        $sect->writeText($paragraf_61, $fontPar, $parPar);
            }
        $paragraf_6="§ 6 Urlaub";
        $sect->writeText($paragraf_6, $fontPar, $parPar);
            $paragraf_6_abs_1="(1) Der Mitarbeiter hat Anspruch auf ".$_POST['urlaub']." Werktagen Urlaub pro Jahr. Der Urlaub wird in Abstimmung mit dem Mitarbeiter vom Arbeitgeber festgelegt. Im Übrigen gelten die gesetzlichen Bestimmungen.";
            $sect->writeText($paragraf_6_abs_1, $fontText, $parText);
            $paragraf_6_abs_2="(2) Nicht genommener Urlaub verfällt am 31.03. des Folgejahres ersatzlos, sofern der Mitarbeiter nicht aufgrund von Krankheit verhindert ist, den Urlaub zu nehmen. Wird Urlaub gewährt, wird dieser Urlaub zunächst auf den gesetzlichen Mindesturlaubsanspruch angerechnet und erst darüber hinaus auf einen etwaigen darüber hinaus zu gewährenden vertraglichen Anspruch.";
            $sect->writeText($paragraf_6_abs_2, $fontText, $parText);
	  	//Paragraf 6


        $paragraf_7="§ 7 Arbeitsverhinderung";
        $sect->writeText($paragraf_7, $fontPar, $parPar);
            $paragraf_7_abs_1="(1) Der Mitarbeiter ist verpflichtet, dem Arbeitgeber jede Dienstverhinderung und ihre voraussichtliche Dauer sofort anzuzeigen. Auf Verlangen sind die Gründe der Dienstverhinderung mitzuteilen. Bei anstehenden Terminsachen hat der Mitarbeiter auf vordringlich zu erledigende Arbeiten hinzuweisen.";
            $sect->writeText($paragraf_7_abs_1, $fontText, $parText);
            $paragraf_7_abs_2="(2) Im Krankheitsfall ist der Mitarbeiter verpflichtet, dem Arbeitgeber sofort eine entsprechende Mitteilung zu machen und auf Verlangen des Arbeitgebers sofort, spätestens jedoch vor Ablauf des dritten Kalendertages nach Beginn der Arbeitsunfähigkeit eine ärztliche Bescheinigung über die Arbeitsunfähigkeit vom ersten Tage an sowie über deren voraussichtlichen Dauer vorzulegen. Dauert die Arbeitsunfähigkeit länger als in der Bescheinigung angegeben, so ist der Mitarbeiter verpflichtet, unverzüglich eine neue ärztliche Bescheinigung vorzulegen, auch wenn der Zeitraum der Entgeltfortzahlung überschritten ist.";
            $sect->writeText($paragraf_7_abs_2, $fontText, $parText);
            $paragraf_7_abs_3="(3) Der Mitarbeiter verpflichtet sich für den Fall, dass der Arbeitgeber Zweifel an der Richtigkeit der Arbeitsunfähigkeitsbescheinigung nach Absatz 2 hat, sich auf Verlangen des Arbeitgebers einer ärztlichen Untersuchung durch einen zweiten Arzt zu unterziehen. Die Kosten der zweiten Untersuchung trägt der Arbeitgeber.";
            $sect->writeText($paragraf_7_abs_3, $fontText, $parText);
        //Paragraf 7


        //Paragraf 7
            $paragraf_7_abs_4="(4) Der Mitarbeiter ist verpflichtet, dem Arbeitgeber sofort eine Bescheinigung über die Bewilligung einer Kur oder eines Heilverfahrens vorzulegen und den Zeitpunkt des Kurantritts mitzuteilen. Die Bescheinigung über die Bewilligung muss Angaben über die voraussichtliche Dauer der Kur enthalten. Dauert die Kur länger als in der Bescheinigung angegeben, so ist der Mitarbeiter verpflichtet, dem Arbeitgeber sofort eine weitere entsprechende Bescheinigung vorzulegen.";
            $sect->writeText($paragraf_7_abs_4, $fontText, $parText);
            $paragraf_7_abs_5="(5) Abweichend von § 616 BGB wird bei vorübergehender unverschuldeter Arbeitsverhinderung aus in der Person des Arbeitnehmers liegenden Gründen für eine verhältnismäßig nicht erhebliche Zeit keine bezahlte Freistellung gewährt. Die Vergütungsfortzahlung im Krankheitsfall richtet sich nach den jeweiligen gesetzlichen Bestimmungen.";
            $sect->writeText($paragraf_7_abs_5, $fontText, $parText);

	  	//Paragraf 7
        //Paragraf 8
        $paragraf_8="§ 8 Nebentätigkeit";
        $sect->writeText($paragraf_8, $fontPar, $parPar);
            $paragraf_8_abs_1="Während der Dauer des Arbeitsverhältnisses ist jede entgeltliche oder unentgeltliche Nebenbeschäftigung nur mit Zustimmung des Arbeitgebers zulässig. Die Zustimmung ist zu erteilen, wenn berechtigte Interessen des Arbeitgebers nicht beeinträchtigt werden. Der Arbeitgeber hat die Entscheidung über den Antrag des Mitarbeiters auf Zustimmung zur Nebentätigkeit innerhalb von zwei Wochen nach Eingang des Antrages zu treffen. Wird innerhalb dieser Frist eine Entscheidung nicht gefällt, gilt die Zustimmung als erteilt, soweit die Nebentätigkeit nicht in einem Konkurrenz- oder branchenähnlichen Betrieb ausgeübt werden soll.";
            $sect->writeText($paragraf_8_abs_1, $fontText, $parText);
	  	//Paragraf 8

        //Paragraf 9
        $paragraf_9="§ 9 Abtretung";
        $sect->writeText($paragraf_9, $fontPar, $parPar);
            $paragraf_9_abs_1="(1) Der Mitarbeiter tritt seine Schadensersatzansprüche insoweit an den Arbeitgeber ab, als er durch einen Dritten verletzt wird und der Arbeitgeber Vergütungsfortzahlung im Krankheitsfall leistet.";
            $sect->writeText($paragraf_9_abs_1, $fontText, $parText);
            $paragraf_9_abs_2="(2) Der Mitarbeiter ist verpflichtet, dem Arbeitgeber die zur Erhebung der Ansprüche erforderlichen Auskünfte zu erteilen.";
            $sect->writeText($paragraf_9_abs_2, $fontText, $parText);
	  	//Paragraf 9

        //Paragraf 10
            if ($verpflegung=="" AND $ubernachtung=="")
            {
		        $paragraf_101="";
		        $sect->writeText($paragraf_101, $fontPar, $parPar);
            }
        $paragraf_10="§ 10 Herausgabe und Verschwiegenheitspflicht";
        $sect->writeText($paragraf_10, $fontPar, $parPar);
            $paragraf_10_abs_1="(1) Alle die Interessen des Arbeitgebers berührenden Schriftstücke und Dateien sind ohne Rücksicht auf den Adressaten ebenso wie alle sonstigen Geschäftsstücke, Zeichnungen, Notizen, Bücher, Muster, Modelle, Werkzeuge, Material usw. alleiniges Eigentum des Arbeitgebers und nach Anforderung bzw. nach Beendigung des Arbeitsverhältnisses unaufgefordert herauszugeben. Zurückbehaltungsrechte sind ausgeschlossen.";
            $sect->writeText($paragraf_10_abs_1, $fontText, $parText);
            $paragraf_10_abs_2="(2) Der Mitarbeiter verpflichtet sich, über alle Angelegenheiten des Arbeitgebers und seiner Kunden strengste Verschwiegenheit zu wahren. Die Verschwiegenheit gilt auch nach der Beendigung des Arbeitsverhältnisses unverändert weiter.";
            $sect->writeText($paragraf_10_abs_2, $fontText, $parText);
	  	//Paragraf 10

        //Paragraf 11
        $paragraf_11="§ 11 Beendigung des Arbeitsverhältnisses";
        $sect->writeText($paragraf_11, $fontPar, $parPar);
            $paragraf_11_abs_1="(1) Das Arbeitsverhältnis endet automatisch, spätestens jedoch mit Ablauf des Monats, in dem der Mitarbeiter sein 65. Lebensjahr vollendet. Einer Kündigung bedarf es nicht.";
            $sect->writeText($paragraf_11_abs_1, $fontText, $parText);
            $paragraf_11_abs_2="(2) Während der Probezeit kann das Arbeitsverhältnis beiderseits mit einer Frist von zwei Wochen gekündigt werden, darüber hinaus kann das Arbeitsverhältnis im Rahmen der gesetzlichen Kündigungsfristen gekündigt werden. Für den Mitarbeiter und den Arbeitgeber sollen die gleichen Kündigungsfristen gelten, dass heißt, dass die für den Fall einer Kündigung durch den Arbeitgeber geltende Kündigungsfrist, jeweils auch für die Kündigung durch den Mitarbeiter gilt.";
            $sect->writeText($paragraf_11_abs_2, $fontText, $parText);
            
        //Paragraf 11


        //Paragraf 11
            $paragraf_11_abs_3="(3) Die Kündigung bedarf der Schriftform.";
            $sect->writeText($paragraf_11_abs_3, $fontText, $parText);
            $paragraf_11_abs_4="(4) Der Arbeitgeber ist berechtigt, den Mitarbeiter unter Fortzahlung seiner Vergütung und unter Anrechnung restlicher Urlaubsansprüche von der Arbeit freizustellen, wenn das Arbeitsverhältnis gekündigt oder die Beendigung des Arbeitsverhältnisses vereinbart ist.";
            $sect->writeText($paragraf_11_abs_4, $fontText, $parText);
            $paragraf_11_abs_5="(5) Das Recht zur fristlosen Kündigung bleibt unberührt.";
            $sect->writeText($paragraf_11_abs_5, $fontText, $parText);
        //Paragraf 11
        //Paragraf 12
        $paragraf_12="§ 12 Ausschlussfristen";
	  	$sect->writeText($paragraf_12, $fontPar, $parPar);
            $paragraf_12_abs_1="(1) Alle beiderseitigen Ansprüche aus dem Arbeitsverhältnis – mit Ausnahme von Ansprüchen, die aus der Verletzung des Lebens, des Körpers, der Gesundheit sowie aus vorsätzlichen oder grob fahrlässigen Pflichtverletzungen des Arbeitgebers oder seines gesetzlichen Vertreters oder Erfüllungsgehilfen resultieren – verfallen, wenn sie nicht innerhalb von drei Monaten nach ihrer Fälligkeit gegenüber der anderen Vertragspartei schriftlich erhoben werden.";
            $sect->writeText($paragraf_12_abs_1, $fontText, $parText);
            $paragraf_12_abs_2="(2) Lehnt die Gegenseite den Anspruch ab oder erklärt sie sich nicht innerhalb von einem Monat nach Geltendmachung des Anspruchs, so verfällt dieser, wenn er nicht innerhalb von drei Monaten nach der Ablehnung oder dem Fristablauf gerichtlich geltend gemacht wird. Dies gilt nicht für Zahlungsansprüche des Mitarbeiters, die während eines Kündigungsprozesses fällig werden und von seinem Ausgang abhängen. Für diese Ansprüche beginnt die Verfallsfrist nach rechtskräftiger Beendigung des Kündigungsschutzverfahrens und beträgt zwei Monate.";
            $sect->writeText($paragraf_12_abs_2, $fontText, $parText);
	  	//Paragraf 12
        //Paragraf 13
        $paragraf_13="§ 13 Schlussbestimmungen";
        $sect->writeText($paragraf_13, $fontPar, $parPar);
            #$paragraf_13_abs_1="(1) Die Kündigung sowie Ergänzungen, Verlängerungen oder sonstige Änderungen dieses Vertrages einschließlich dieser Klausel bedürfen zu ihrer Rechtswirksamkeit der Schriftform. Eine stillschweigende Verlängerung des Arbeitsverhältnisses über den in § 1 Abs. 1 genannten Zeitraum ist ausgeschlossen. Sonstige Vereinbarungen außerhalb dieses Vertrages bestehen zwischen den Parteien nicht.";
            $paragraf_13_abs_1="(1) Mündliche Nebenabreden bestehen nicht. Die Kündigung sowie Ergänzungen, Verlängerungen oder sonstige Änderungen dieses Vertrages einschließlich dieser Klausel bedürfen zu ihrer Rechtswirksamkeit der Schriftform, sofern sie nicht auf einer ausdrücklichen oder individuell ausgehandelten Abrede beruhen. Betriebliche Übungen begründen keinen Rechtsanspruch. Sonstige Vereinbarungen außerhalb dieses Vertrages bestehen zwischen den Parteien nicht.";
            $sect->writeText($paragraf_13_abs_1, $fontText, $parText);
            $paragraf_13_abs_2="(2) Die etwaige Unwirksamkeit einzelner Vertragsbestimmungen oder von Teilen hiervon, berührt nicht die Wirksamkeit der übrigen Vereinbarungen.";
            $sect->writeText($paragraf_13_abs_2, $fontText, $parText);
            $paragraf_13_abs_3="(3) Auf Verlangen des Arbeitgebers beschafft der Mitarbeiter ein polizeiliches Führungszeugnis. Die Gebühren hierfür trägt der Arbeitgeber.";
            $sect->writeText($paragraf_13_abs_3, $fontText, $parText);
            $paragraf_13_abs_4="(4) Alle Änderung in den persönlichen Verhältnissen, soweit sie für das Arbeitsverhältnis von Bedeutung sind, insbesondere ein Wechsel der Anschrift, im Urlaub die Urlaubsanschrift, sind dem Vorgesetzten ohne besondere Aufforderung unverzüglich mitzuteilen. Ist eine Änderung der Anschrift oder der Urlaubsanschrift nicht ordnungsgemäß gemeldet, so gelten die Mitteilungen des Arbeitgebers in dem Zeitpunkt als zugegangen, in dem sie dem Mitarbeiter unter der zuletzt angegebenen Anschrift erreicht hätten.";
            $sect->writeText($paragraf_13_abs_4, $fontText, $parText);
            $paragraf_13_abs_5="(5) Der Vertrag wird in zwei Ausfertigungen erstellt, von denen jede Partei eine erhalten hat.";
            $sect->writeText($paragraf_13_abs_5, $fontText, $parText);
            
	  	//Paragraf 13
        $table1 = &$sect->addTable();
        $parCellTabl = new ParFormat();
        $parCellTabl->setSpaceBefore(5);
        $table1->addRows(2, 2);
        #$table1->addRows(2, 2);
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
        $cell->writeText('(Arbeitgeber)', $fontText, $parCellTabl);

        $cell = &$table1->getCell(2, 4);
        $cell->setBorders(new BorderFormat(0.5, '#000000', 'single', 0), false, true, false, false);
        $cell->writeText('(Mitarbeiter)', $fontText, $parCellTabl);

        $foot = &$sect->addFooter('all');
        $foot->setPosition(2);
        $seite5="Seite <pagenum /> von 7";
        $foot->writeText($seite5, $fontSeite, $parSeite);


		$foot = &$rtf->addFooter('first');

    // Seite 5

//
//** TEXTS**//

$rtf->sendRtf('anstellungsvertrag_aussendienst_'.date('Y-m-d_H-i-s'));
?>
