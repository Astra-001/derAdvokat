<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if (!$_SESSION['user']['status'])
{
    header('Location: /derAdvokat/index.php');
}

else
{
	// MONITORING RECHNER DB INSERT
	$log_funk = new log_funk($smarty,$database);
	$log_funk->mod = 24;
	$log_funk->log_insert();
}

$smarty->assign('contentTemplate', 'arbeitsmodul.tpl');
?>
