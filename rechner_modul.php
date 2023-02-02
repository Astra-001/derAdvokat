<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
#echo "Rechner Modul";

// MONITORING RECHNER DB INSERT
$log_funk = new log_funk($smarty,$database);
$log_funk->mod = 4;
$log_funk->log_insert();

$smarty->assign('contentTemplate', 'rechner_modul.tpl');
?>