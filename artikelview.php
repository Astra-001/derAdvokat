<?

$kategorien = new mysqlTable($database, 'kategorien');
$kategorien->select();
$kat = $kategorien->getRecords();

$karegorienArray = array();

foreach ($kat as $katKey => $katValue)
{
    $karegorienArray[$katValue['id']] = $katValue['name'];
}
$artId = 0;

if (isset($_REQUEST['art_id']))
{
   $artId = $_REQUEST['art_id'];
}

$artikel = new mysqlTable($database, 'artikel');

switch ($_REQUEST['act'])
{
	case 'lock':
	    	$art_id = mysql_real_escape_string($_REQUEST['art_id']);
	    	if ($_SESSION['user']['status'] == STATUS_ADMIN)
	    	{
	    		lock($art_id, $artikel, $smarty);
	    	}
	        break;

	case 'unlock':
	    	$art_id = mysql_real_escape_string($_REQUEST['art_id']);
	    	if ($_SESSION['user']['status'] == STATUS_ADMIN)
	    	{
	    		unlock($art_id, $artikel, $smarty);
	    	}
	        break;
	    #default:
	     #   show($artikel, $smarty);
}

$artikel->setWhere('`id`='.$artId);
$artikel->setOrderBy('`kat_id` ASC');
$artikel->select();
$records = $artikel->getRecords();
$smarty->assign('artikel', $records[0]);


// MONITORING ARTIKEL DB INSERT
$log_funk = new log_funk($smarty,$database);
$log_funk->mod = 3;
$log_funk->kategorien_id = $records[0]['kat_id'];
$log_funk->unterkategorien_id = $records[0]['ukat_id'];
$log_funk->artikel_id = $_REQUEST['art_id'];
$log_funk->log_insert();


$smarty->assign('cat', $karegorienArray);
$smarty->assign('contentTemplate', 'artikelview.tpl');

function unlock($art_id, &$artikel, &$smarty)
{
    $artikel->setWhere('id =' . $art_id);
    $artikel->select();
    $artikel->status->setValue(0);
    $artikel->save();
    #show($artikel, $smarty);
}

function lock($art_id, &$artikel, &$smarty)
{
    $artikel->setWhere('id =' . $art_id);
    $artikel->select();
    $artikel->status->setValue(1);
    $artikel->save();

    #show($artikel, $smarty);
}
?>