<?
define('INDEX_LOAD', true);
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Content-type: text/html; charset=UTF-8");

ini_set("arg_separator.output","&amp;");

require_once("includes/includes.php");
session_start();
$database = new mysqlDatabase();
$database->openDB();

$smarty = new Smarty();
$smarty->compile_dir = SMARTY_TEMPLATE_CACHE_DIR;

$kategorien = new mysqlTable($database, 'kategorien');
$kategorien->setWhere('`premium`=0');
$kategorien->select();
$kat = $kategorien->getRecords();
$karegorienArray = array();
foreach ($kat as $katKey => $katValue) {
    $karegorienArray[$katValue['id']] = $katValue['name'];
}

$artikel = new mysqlTable($database, 'artikel');
$artikel->setWhere('`premium`=1');
$artikel->setOrderBy('`kat_id` ASC');
$artikel->select();

$records = $artikel->getRecords();

$smarty->assign('artikel', $records);
$smarty->assign('cat', $karegorienArray);

$smarty->display(SMARTY_TEMPLATE_DIR."feed.tpl");
$database->closeDB();