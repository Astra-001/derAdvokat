<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

// MONITORING UNTERKATEGORIEN DB INSERT
$log_funk = new log_funk($smarty,$database);
$log_funk->mod = 2;
$log_funk->kategorien_id = $_GET['kat_id'];
$log_funk->unterkategorien_id = $_GET['ukat_id'];
$log_funk->log_insert();

$kategorien = new mysqlTable($database, 'kategorien');
$artikel = new mysqlTable($database, 'artikel');

show_kategorien($_GET['kat_id'],$kategorien, $smarty);

switch ($_REQUEST['act'])
{
    case 'del':
      	$art_id = mysql_real_escape_string($_REQUEST['art_id']);
      	if ($_SESSION['user']['status'] == STATUS_ADMIN)
    	{
        	delete($art_id, $artikel, $smarty);
    	}
        break;
    default:
        show_artikel($artikel, $smarty);
}
//Funktionen 
  
function delete($art_id, &$artikel, &$smarty)
{
  $where = "`id`='" . mysql_escape_string($art_id) . "'";
  $artikel->setWhere($where);
  $artikel->select();
  $records = $artikel->getRecords();

  if($records[0]['bild_name']!="")
  {
  	for($i=1;$i<=3;$i++)
    {
      switch($i)
      {
        case 1: $fall="klein_"; break;
        case 2: $fall="main_"; break;
        case 3: $fall=""; break;
      }
      $path="bilder/".$fall."";
      unlink($path.$records[0]['bild_name']); // Fotodatei l?schen
    }
  }
  $artikel->setWhere('id=' . $art_id);
  $artikel->delete();
  show_artikel($artikel, $smarty);
}
function show_kategorien($kat_id,&$kategorien, &$smarty)
{
  	$kategorien->setWhere('id =' . $kat_id);
	$kategorien->select();
	$records = $kategorien->getRecords();
	$smarty->assign('kategorie', $records[0]['name']);
}
function show_artikel(&$artikel, &$smarty)
{
	if ($_SESSION['user']['status'] == STATUS_ADMIN)
	{
		$where = "`kat_id`='" . mysql_escape_string($_GET['kat_id']) . "' && `ukat_id`='" . mysql_escape_string($_GET['ukat_id']) . "'";
	}
	if ($_SESSION['user']['status'] == STATUS_ACTIVE_AGB)
	{
		$where = "`kat_id`='" . mysql_escape_string($_GET['kat_id']) . "' && `ukat_id`='" . mysql_escape_string($_GET['ukat_id']) . "'";
		$where .= " && `status`='0'";
	}
	if ($_SESSION['user']==FALSE)
	{
		$where = "`kat_id`='" . mysql_escape_string($_GET['kat_id']) . "' && `ukat_id`='" . mysql_escape_string($_GET['ukat_id']) . "'";
		$where .= " && `premium`='1' && `status`='0'";
	}

	$artikel->setWhere($where);
	$artikel->setOrderBy("id ASC");
  	$artikel->select();
 
  	$records = $artikel->getRecords();
  	$smarty->assign('artikel', $records);
  	$smarty->assign('contentTemplate', 'unterkategorien.tpl');
}
?>