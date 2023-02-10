<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
class mutterschutzurlaub
{
 	public function __construct(private $_smarty,$database)
	{
		$smarty = null;
		$this->_db = $database;

		if($_SESSION['user'])
		{
			if(isset($_POST['muterschutz']))
			{
				$set_date=$this->check_input($_POST['entbindungsdatum']);

				#echo "<pre>";
				#print_r($set_date);
				#echo "</pre>";


				if(isset($_POST['mehrlinge'])){
					$mehrlinge=1;
				}else{
					$mehrlinge=0;
				}
				$vor_berechnung=$this->vor_berechnung($mehrlinge,$set_date);

				#echo "<pre>";
				#print_r($vor_berechnung);
				#echo "</pre>";

				$back_berechnung=$this->back_berechnung($set_date);

				#echo "<pre>";
				#print_r($back_berechnung);
				#echo "</pre>";

				$vor_monat_ausgabe=$this->monat_ausgabe($vor_berechnung[1]);
				$back_monat_ausgabe=$this->monat_ausgabe($back_berechnung[1]);

				$this->_smarty->assign('vor_berechnung',$vor_berechnung);
				$this->_smarty->assign('vor_monat_ausgabe',$vor_monat_ausgabe);

				$this->_smarty->assign('back_berechnung',$back_berechnung);
				$this->_smarty->assign('back_monat_ausgabe',$back_monat_ausgabe);
			}
			else
			{
				// MONITORING RECHNER DB INSERT
				$log_funk = new log_funk($smarty,$database);
				$log_funk->mod = 8;
				$log_funk->log_insert();
			}
		}

		$this->_smarty->assign('contentTemplate', 'rechner.tpl');

	}//KONSTRUKTOR ENDE

	protected function monat_ausgabe($monat)
	{
		$monat = match ($monat) {
      '01' => "Januar",
      '02' => "Februar",
      '03' => "M&auml;rz",
      '04' => "April",
      '05' => "Mai",
      '06' => "Juni",
      '07' => "Juli",
      '08' => "August",
      '09' => "September",
      '10' => "Oktober",
      '11' => "November",
      '12' => "Dezember",
      default => $monat,
  };
		return $monat;
	}
	protected function back_berechnung($set_date)
	{
		$daysArray = [];
  $mounth_year_negativ = [];
  $back=42;

		for($m=1;$m<=12;$m++)//LIEFERT ALLE MONATE SAMT ANZAHL DER TAGEN ZU JEDEM
		{
			$anz_tagen_im_monat=$this->anz_tagen_im_monat($m,$set_date[2]);
			$daysArray[$m] = $anz_tagen_im_monat[0];
		}
		#echo "<pre>";
		#print_r($daysArray);
		#echo "</pre>";

		$expl=explode("0",$set_date[1]);
		$monat=array_pop($expl);//LIEFERT AKTUELLEN MONAT

		#echo "<br><br>BACKWARD---------------------------";
		#echo "<br>Im Monat: ".$monat." sind: ".$daysArray[$monat]." Tagen";

		if($back>$set_date[0])
		{
			$rest_1=$back-$set_date[0];
			$monat-=1;
			$mounth_year_negativ=$this->mounth_year_negativ($monat,$set_date[2]);

			#echo "<pre>";
			#print_r($mounth_year_negativ);
			#echo "</pre>";

			$vorMon_1=$daysArray[$mounth_year_negativ[0]];

			if($rest_1>$vorMon_1)
			{
				$rest_2=$rest_1-$vorMon_1;
				$monat-=1;
				$mounth_year_negativ=$this->mounth_year_negativ($monat,$set_date[2]);

				#echo "<pre>";
				#print_r($mounth_year_negativ);
				#echo "</pre>";

				$vorMon_2=$daysArray[$mounth_year_negativ[0]];

				if($rest_2>$vorMon_2)
				{
					$rest_3=$rest_2-$vorMon_2;
					$vorMon_2-=1;
					$mounth_year_negativ=$this->mounth_year_negativ($vorMon_2,$set_date[2]);

					#echo "<pre>";
					#print_r($mounth_year_negativ);
					#echo "</pre>";

					$vorMon_3=$daysArray[$mounth_year_negativ[0]];
				}
				else
				{
					$erg=($vorMon_2-$rest_2);
				}
			}
			else
			{
				$erg=($vorMon_1-$rest_1);
			}


		}
		return [$erg, $mounth_year_negativ[0], $mounth_year_negativ[1]];
	}
	protected function mounth_year_negativ($monat,$jahr)
	{
		if($monat==0)
		{
			$monat=12;
			$jahr-=1;
		}
		if($monat<0)
		{
			$monat=($monat)+12;
			$jahr-=1;
		}
		return [$monat, $jahr];
	}
	protected function vor_berechnung($merlinge,$set_date)
	{
		$daysArray = [];
  $mounth_year_positiv = [];
  if($merlinge==1){
			$schutz_lange=84;
		}else{
			$schutz_lange=56;
		}

		for($m=1;$m<=12;$m++)//LIEFERT ALLE MONATE SAMT ANZAHL DER TAGEN ZU JEDEM
		{
			$anz_tagen_im_monat=$this->anz_tagen_im_monat($m,$set_date[2]);
			$daysArray[$m] = $anz_tagen_im_monat[0];
		}
		#echo "<pre>";
		#print_r($daysArray);
		#echo "</pre>";

		$expl=explode("0",$set_date[1]);
		$monat=array_pop($expl);//LIEFERT AKTUELLEN MONAT

		#echo "<br><br><br>VORWARD---------------------------";

		#echo "<br>Im Monat: ".$monat." sind: ".$daysArray[$monat]." Tagen";
		$lange=$schutz_lange+$set_date[0];

		if($lange>$daysArray[$monat])
		{
			$rest_1=$lange-$daysArray[$monat];
			$monat+=1;
			$mounth_year_positiv=$this->mounth_year_positiv($monat,$set_date[2]);
			$nexMon_1=$daysArray[$mounth_year_positiv[0]];

			if($rest_1>$nexMon_1)
			{
				$rest_2=$rest_1-$daysArray[$mounth_year_positiv[0]];
				$monat+=1;
				$mounth_year_positiv=$this->mounth_year_positiv($monat,$set_date[2]);
				$nexMon_2=$daysArray[$mounth_year_positiv[0]];

				if($rest_2>$nexMon_2)
				{
					$rest_3=$rest_2-$daysArray[$mounth_year_positiv[0]];
					$monat+=1;
					$mounth_year_positiv=$this->mounth_year_positiv($monat,$set_date[2]);
					$nexMon_3=$daysArray[$mounth_year_positiv[0]];

					if($rest_3>$nexMon_2)
					{
						$rest_4=$rest_3-$daysArray[$mounth_year_positiv[0]];
						$monat+=1;
						$mounth_year_positiv=$this->mounth_year_positiv($monat,$set_date[2]);
						$nexMon_2=$daysArray[$mounth_year_positiv[0]];
						$erg=$rest_3+$set_date[0];
						$tag_erg=$rest_3;
					}
					else
					{
						$erg=$rest_3;
						$tag_erg=$rest_3;
					}
				}
				else
				{
					$erg=$rest_2;
					$tag_erg=$rest_2;

				}
			}
			else
			{
				$erg=$rest_1;
				$tag_erg=$rest_1;
			}
		}
		return [$tag_erg, $mounth_year_positiv[0], $mounth_year_positiv[1]];
	}

	protected function mounth_year_positiv($monat,$jahr)
	{
		if($monat==12)
		{
			$monat=1;
			$jahr+=1;
		}

		if($monat>=13)
		{
			$monat=$monat-12;
			$jahr+=1;
		}

		if($monat<13)
		{
			$monat=$monat;
			$jahr=$jahr;
		}
		#echo "<br>Mounth: ".$monat;
		#echo "</br>Year: ".$jahr;
		return [$monat, $jahr];
	}

	protected function anz_tagen_im_monat($monat,$jahr)
	{
		$schaltjahr=$this->schaltjahr($jahr);

		#echo "<pre>";
		#print_r($schaltjahr);
		#echo "</pre>";

		switch($schaltjahr)
		{
			case 0: $februar=28;break;
			case 1: $februar=29;break;#Schaltjahr
		}
		switch($monat)
		{
			case '01': $tagen=31;break;
			case '02': $tagen=$februar;break;
			case '03': $tagen=31;break;
			case '04': $tagen=30;break;
			case '05': $tagen=31;break;
			case '06': $tagen=30;break;
			case '07': $tagen=31;break;
			case '08': $tagen=31;break;
			case '09': $tagen=30;break;
			case '10': $tagen=31;break;
			case '11': $tagen=30;break;
			case '12': $tagen=31;break;
		}
		return [$tagen, $monat];
	}

	protected function schaltjahr($jahr)
	{
		if(($jahr % 400) == 0 || (($jahr % 4) == 0 && ($jahr % 100) != 0))
		{
	   		return 1;#Schaltjahr
		}
		else
		{
	   		return 0;
		}
	}

	public function check_input($entbindungsdatum)
	{
		if($entbindungsdatum=="")
		{
	    	$msg= "Eingabefeld f&uuml;r Entbindungsdatum ist leer! Bitte geben Sie das Datum ein!";
		    $this->_smarty->assign('entbindungsdatum_error', $msg);
		    return false;
		}
		if (isset($entbindungsdatum))
		{
			$entbindungsdatum = str_replace(',', '.', $entbindungsdatum);

		    $entbindungsdatum =explode(".",$entbindungsdatum);

		    #echo "<pre>";
		    #print_r($entbindungsdatum);
		    #echo "</pre>";

		    if (count($entbindungsdatum)!=3)
			{
			    $msg= "Datum soll im Format TT.MM.JJJJ eingegeben werden!";
			    $this->_smarty->assign('entbindungsdatum_error', $msg);
			    return false;
			}
		    if(!is_numeric($entbindungsdatum[1]))
		    {
		    	$msg= "Monat soll als eine Zahl eingegeben werden!";
			    $this->_smarty->assign('entbindungsdatum_error', $msg);
			    return false;
		    }

		    $expl=explode("0",$entbindungsdatum[0]);
			$monatstag=array_pop($expl);//LIEFERT AKTUELLEN TAG

			if($monatstag<1 && $monatstag>31)
		    {
		    	$msg= "Ein Tagesdatum soll zwischen 01 und 31 eingegeben werden!";
			    $this->_smarty->assign('entbindungsdatum_error', $msg);
			    return false;
		    }

		    $expl=explode("0",$entbindungsdatum[1]);
			$monatsformat=array_pop($expl);//LIEFERT AKTUELLEN MONAT

			if($monatsformat<1 && $monatsformat>12)
			{
				$msg= "Ein Monat soll zwischen 01 und 12 eingegeben werden!";
			    $this->_smarty->assign('entbindungsdatum_error', $msg);
			    return false;
			}

			if(strlen($entbindungsdatum[0])!=2)
		    {
		    	$msg= "Falsches Format! Der Tag soll aus 2 Ziffern bestehen z.Bsp. 01 oder 12 etc.";
			    $this->_smarty->assign('entbindungsdatum_error', $msg);
			    return false;
		    }
			if(strlen($entbindungsdatum[1])!=2)
		    {
		    	$msg= "Falsches Format! Der Monat soll aus 2 Ziffern bestehen z.Bsp. 01-f&uuml;r Januar oder 12-f&uuml;r Dezember etc.";
			    $this->_smarty->assign('entbindungsdatum_error', $msg);
			    return false;
		    }
			if(strlen($entbindungsdatum[2])!=4)
		    {
		    	$msg= "Falsches Format! Das Jahr soll aus 4 Ziffern bestehen z.Bsp. 2009 oder 2010 etc.";
			    $this->_smarty->assign('entbindungsdatum_error', $msg);
			    return false;
		    }

		}
		return $entbindungsdatum;
	}
}
?>
