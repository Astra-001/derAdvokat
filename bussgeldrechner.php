<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

if($_POST['bussgeld'])
{
	$bussgeldkatalog = new mysqlTable($database, 'bussgeldkatalog');

	if (isset($_POST['ort'])) {
	    $ort = mysql_real_escape_string($_POST['ort']);
	}

	if (isset($_POST['geschwindigkeit'])) {
	    $_POST['geschwindigkeit'] = str_replace(',', '.', $_POST['geschwindigkeit']);
	}
	if (isset($_POST['geschwindigkeit']) && is_numeric($_POST['geschwindigkeit'])){
	    $geschwindigkeit = mysql_real_escape_string($_POST['geschwindigkeit']);
	}
	if (isset($_POST['geschwindigkeit']) && $geschwindigkeit == 0) {
	    $msg .= "Bitte geben Sie einen Geschwindigkeitswert an.";
	    $smarty->assign('msg_bussgeld', $msg);
	}
	if($geschwindigkeit>71)
	{
		$geschwindigkeit=71;
	}

	$bussgeldkatalog->setWhere('geschwindigkeit <= ' . $geschwindigkeit . ' && ort = ' . $ort);
	$bussgeldkatalog->setOrderBy('geschwindigkeit DESC');
	$bussgeldkatalog->setLimit(1);

	$bussgeldkatalog->select();
	$records = $bussgeldkatalog->getRecords();
	#echo "ORT-".$ort;
	#echo "<br>GESCH-".$geschwindigkeit;
	#print_r($records);
	$smarty->assign('bussgeld', $records[0]['bussgeld']);
	$smarty->assign('punkte', $records[0]['punkte']);

	$buchstabe_punkte="";
    if ($records[0]['punkte'] > 1) {
		$buchstabe_punkte="e";
	}

	$smarty->assign('buchstabe_punkte', $buchstabe_punkte);

	$smarty->assign('fahrverbot', $records[0]['fahrverbot']);

    $buchstabe_monate="";
	if ($records[0]['fahrverbot'] > 1) {
        $buchstabe_monate="e";
	}
	$smarty->assign('status',$_SESSION['user']['status']);
	$smarty->assign('buchstabe_monate', $buchstabe_monate);
}
else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 6;
	$log_funk->log_insert();
}
$smarty->assign('contentTemplate', 'rechner.tpl');
?>