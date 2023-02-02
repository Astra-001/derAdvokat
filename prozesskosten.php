<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

if($_POST['prozesskosten'])
{
	$prozesskosten = new mysqlTable($database, 'prozesskosten');

	$wert = 0;
	if (isset($_POST['wert'])) {
	    $_POST['wert'] = str_replace(',', '.', $_POST['wert']);
	}

	if (isset($_POST['wert']) && is_numeric($_POST['wert'])){
	    $wert = mysql_real_escape_string($_POST['wert']);
	}

	$msg = '';
	$records = null;

	if (isset($_POST['wert']) && $wert == 0) {
	    $msg = "Bitte geben Sie einen Streitwert an.";
	    $smarty->assign('msg_prozesskosten', $msg);
	}

	$instanz=1;
	if (isset($_POST['instanz'])) {
	    $instanz = mysql_real_escape_string($_POST['instanz']);
	}

	$anwalt=1;
	if (isset($_POST['anwalt2'])) {
	    $anwalt = mysql_real_escape_string($_POST['anwalt2']);
	}

	if ($_SERVER["REQUEST_METHOD"] == 'POST')
	{
		$prozesskosten->setWhere('wert >= ' . $wert . ' && instanz = ' . $instanz);
		$prozesskosten->setOrderBy('wert ASC');
		$prozesskosten->setLimit(1);

		$prozesskosten->select();
		$records = $prozesskosten->getRecords();
	}
	if (isset($_POST['wert']) && $wert > $records[0]['wert']) {
	    $msg = "Der Streitwert ist auf 2.500.000 &euro; Begrenzt!";
	    $smarty->assign('msg_prozesskosten', $msg);
	}
	//--

	$preis_anwalt = $records[0]['anwalt']+$records[0]['auslagen'];
	#$auslagen=$records[0]['auslagen'];

	if ($anwalt == 2)# OR $_POST['instanz']
	{
	    #$preis_anwalt = $records[0]['anwalt']+($records[0]['auslagen']);
	    $preis_anwalt = $records[0]['anwalt']*2+($records[0]['auslagen']*2);
	    $auslagen=$records[0]['auslagen']*2;
	    $anwalt = 2;#2?
	}
	$mwst=($preis_anwalt+$auslagen)*0.19;
	$mwst=($preis_anwalt)*0.19;
	$brutto=$mwst+$preis_anwalt;

	$gerichtskosten=$records[0]['gerichtskosten'];
	#$gesamtpreis = $preis_anwalt + $auslagen + $mwst + $records[0]['gerichtskosten'];
	$gesamtpreis = $preis_anwalt + $mwst + $records[0]['gerichtskosten'];

	$smarty->assign('wert', $wert);
	$smarty->assign('instanz', $instanz);
	$smarty->assign('anwalt', $anwalt);
	$smarty->assign('preis_anwalt', $preis_anwalt);
	#$smarty->assign('auslagen', $auslagen);
	$smarty->assign('brutto', $brutto);
	$smarty->assign('mwst', $mwst);
	$smarty->assign('gerichtskosten', $gerichtskosten);
	$smarty->assign('gesamtpreis', $gesamtpreis);

}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 5;
	$log_funk->log_insert();
}

$smarty->assign('contentTemplate', 'rechner.tpl');