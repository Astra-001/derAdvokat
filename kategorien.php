<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

// MONITORING KATEGORIEN DB INSERT
$log_funk = new log_funk($smarty,$database);
$log_funk->mod = 1;
$log_funk->kategorien_id = $_GET['kat_id'];
$log_funk->log_insert();



$kategorien = new mysqlTable($database, 'kategorien');
#$artikel = new mysqlTable($database, 'artikel');

show_kategorien($_GET['kat_id'],$kategorien, $smarty);
show_unterkategorien($_GET['kat_id'],$kategorien, $smarty);

function show_kategorien($kat_id,&$kategorien, &$smarty)
{
  	$kategorien->setWhere('id =' . $kat_id);
	$kategorien->select();
	$records = $kategorien->getRecords();
	$smarty->assign('kategorie', $records[0]['name']);
}
function show_unterkategorien($kat_id,&$kategorien, &$smarty)
{
	/*if ($_SESSION['user']['status'] == STATUS_ADMIN)
	{
		$where = "`parent_id`='" . mysql_escape_string($_GET['kat_id']) . "'";//Admin
	}
	if ($_SESSION['user']['status'] == STATUS_ACTIVE_AGB)//Premium
	{
		$where = "`parent_id`='" . mysql_escape_string($_GET['kat_id']) . "'";
	}
	if ($_SESSION['user']==FALSE)//Öffentlich
	{
		$where = "`parent_id`='" . mysql_escape_string($_GET['kat_id']) . "'";
		#$where .= " && `premium`='0'";
	}*/

	$kategorien->setWhere("`parent_id`='" . mysql_escape_string($_GET['kat_id']) . "'");
	$kategorien->setOrderBy("id DESC");
  	$kategorien->select();
  	#$anz=$kategorien->countRecords();

  	$records = $kategorien->getRecords();
  	$smarty->assign('unterkategorien', $records);
  	$smarty->assign('contentTemplate', 'kategorien.tpl');
}
?>