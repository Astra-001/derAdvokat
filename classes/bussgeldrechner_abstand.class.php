<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
class bussgeldrechner_abstand
{
 	private $_smarty = null;

	public function __construct($_smarty,$database)
	{
		$this->_smarty = $_smarty;
		$this->_db = $database;

		if(isset($_POST['abstand_bussgeld_berechnung']))
		{
			$check_input=$this->check_input($_POST['distance'],$_POST['speed']);

			#echo "<pre>";
			#print_r($check_input);
			#echo "</pre>";
		}
		else
		{
			// MONITORING RECHNER DB INSERT
			$log_funk = new log_funk($smarty,$database);
			$log_funk->mod = 7;
			$log_funk->log_insert();
		}

		$geschwindigkeit_stuffe=$this->geschwindigkeit_stuffe($check_input[1]);#Geschwindigkeit

		#echo "Geschwindigkeitsstuffe-".$geschwindigkeit_stuffe;

		$berechnung=$this->berechnung($check_input[1]);#Geschwindigkeit

		#echo "<pre>";
		#print_r($berechnung);
		#echo "</pre>";

		$vergleich=$this->vergleich($check_input[0],$berechnung);#Abstand

		#echo "<pre>";
		#print_r($vergleich);
		#echo "</pre>";

		$sanktion=$this->sanktion($vergleich,$geschwindigkeit_stuffe);

		$this->_smarty->assign('contentTemplate', 'rechner.tpl');

	}//KONSTRUKTOR ENDE
	public function stufe_4($vergleich)
	{
		switch($vergleich)
		{
			case 5: $euro=100; $punkte="2 Punkte";break;
			case 4: $euro=180; $punkte="3 Punkte";break;
			case 3: $euro=240; $punkte="4 Punkte"; $fahrverbot="1 Monat";break;
			case 2: $euro=320; $punkte="4 Punkte"; $fahrverbot="2 Monate";break;
			case 1: $euro=400; $punkte="4 Punkte"; $fahrverbot="3 Monate";break;
		}
		#echo "<br/>Stuffe 4";
		#echo "<br/>Euro-".$euro;
		#echo "<br/>Punkte-".$punkte;
		#echo "<br/>Fahrverbot-".$fahrverbot;

		$this->_smarty->assign('euro', $euro);
		$this->_smarty->assign('punkte', $punkte);
		$this->_smarty->assign('fahrverbot', $fahrverbot);
	}
	public function stufe_3($vergleich)
	{
		switch($vergleich)
		{
			case 5: $euro=75;  $punkte="1 Punkt";break;
			case 4: $euro=100; $punkte="2 Punkte";break;
			case 3: $euro=160; $punkte="3 Punkte"; $fahrverbot="1 Monat";break;
			case 2: $euro=240; $punkte="4 Punkte"; $fahrverbot="2 Monate";break;
			case 1: $euro=320; $punkte="4 Punkte"; $fahrverbot="3 Monate";break;
		}
		#echo "<br/>Stuffe 3";
		#echo "<br/>Euro-".$euro;
		#echo "<br/>Punkte-".$punkte;
		#echo "<br/>Fahrverbot-".$fahrverbot;

		$this->_smarty->assign('euro', $euro);
		$this->_smarty->assign('punkte', $punkte);
		$this->_smarty->assign('fahrverbot', $fahrverbot);
	}
	public function stufe_2($vergleich)
	{
		switch($vergleich)
		{
			case 5: $euro=75;  $punkte="1 Punkt";break;
			case 4: $euro=100; $punkte="2 Punkte";break;
			case 3: $euro=160; $punkte="3 Punkte";break;
			case 2: $euro=240; $punkte="4 Punkte";break;
			case 1: $euro=320; $punkte="4 Punkte";break;
		}

		#echo "<br/>Stuffe 2";
		#echo "<br/>Euro-".$euro;
		#echo "<br/>Punkte-".$punkte;

		$this->_smarty->assign('euro', $euro);
		$this->_smarty->assign('punkte', $punkte);
	}
	public function sanktion($vergleich,$geschwindigkeit_stuffe)
	{
		switch($geschwindigkeit_stuffe)
		{
			case 2: $this->stufe_2($vergleich);break;
			case 3: $this->stufe_3($vergleich);break;
			case 4: $this->stufe_4($vergleich);break;
		}

	}

	public function vergleich($abstand=null,$berechnung=null)
	{
		#echo "Abstand-".$abstand;
		for($x=1;$x<=count($berechnung);$x++)
		{
			if($abstand<=$berechnung[$x])#Abstand
			{
				#echo "<br/>Schl&uuml;ssel-".$x." Wert-".$berechnung[$x];
				$vergleich_array[$x]=$berechnung[$x];
			}
		}
		#echo "<pre>";
		#print_r($vergleich_array);
		#echo "</pre>";

		$erster_element = array_shift($vergleich_array);

		$key = array_search($erster_element,$berechnung);

		return $key;
	}
	public function berechnung($speed=null)
	{
		$halb_gesch=$speed/2;
		#echo "<br/>Halbierte Geschwindigkeit-".$halb_gesch;

		for($i=1;$i<=5;$i++)
		{
			$meter=($halb_gesch/10)*$i;
			$meter_array[$i]=$meter;
		}

		return $meter_array;
	}
	public function geschwindigkeit_stuffe($geschwindigkeit=null)
	{
		if($geschwindigkeit>0 && $geschwindigkeit<=80)
		{
			$geschwindigkeit_stuffe=1;
		}
		if($geschwindigkeit>80 && $geschwindigkeit<=100)
		{
			$geschwindigkeit_stuffe=2;
		}
		if($geschwindigkeit>100 && $geschwindigkeit<=130)
		{
			$geschwindigkeit_stuffe=3;
		}
		if($geschwindigkeit>130)
		{
			$geschwindigkeit_stuffe=4;
		}
		return $geschwindigkeit_stuffe;
	}

	public function check_input($distance=null,$speed=null)
	{
		#ABSTAND
		if (isset($distance))
		{
		   $distance = str_replace(',', '.', $distance);

			if (isset($distance) && is_numeric($distance))
			{
			    $distance = mysql_real_escape_string($distance);
			}
			if (isset($distance) && $distance < 1)
			{
			    $msg .= "Bitte geben Sie einen an, der h&ouml;her als 1 Meter ist.";
			    $this->_smarty->assign('msg_geschwindigkeit_abstand', $msg);
			    return false;
			}
			$distance_erg=true;
		}

		#GESCHWINDIGKEIT
		if (isset($speed))
		{
		    $speed = str_replace(',', '.', $speed);

			if (isset($speed) && is_numeric($speed))
			{
			    $speed = mysql_real_escape_string($speed);
			}
			if (isset($speed) && $speed < 81)
			{
			    $msg .= "<br/>Bitte geben Sie einen Geschwindigkeitswert &uuml;ber 80 Km/h an.";
			    $this->_smarty->assign('msg_geschwindigkeit_abstand', $msg);
			    return false;
			}
			$speed_erg=true;
		}

		#echo "Geschwindigkeit-".$speed;
		#echo "<br/>Abstand-". $distance;

		if($distance_erg && $speed_erg)
		{
			return array($distance,$speed);
		}
		return false;
	}
}
?>