<?
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if ($_SESSION['user']['status'] != STATUS_ADMIN)
{
    header('Location: /derAdvokat/index.php');
}

$kategorien = new mysqlTable($database, 'kategorien');
$artikel = new mysqlTable($database, 'artikel');
      
switch ($_REQUEST['act'])
{
    case 'del':
      	$art_id = mysql_real_escape_string($_REQUEST['art_id']);
      	
      	if ($_SESSION['user']['status'] == STATUS_ADMIN)
    	{
        	delete($art_id,$kategorien,$artikel, $smarty);
        	#show($kategorien,$artikel,$smarty);
        	reload();
    	}
        break;
   default:
   	show($kategorien,$artikel,$smarty);
}
function reload()
{
	if(isset($_GET['page'])){
    	$page="&page=".$_GET['page'];
    }else{
    	$page="";
    }
    
    header('Location: /derAdvokat/index.php?task=artikeladmin'.$page);
}
function delete($art_id,&$kategorien, &$artikel, &$smarty)
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
	      	unlink($path.$records[0]['bild_name']); // Fotodatei löschen
    	}
  	}
  	$artikel->setWhere('id=' . $records[0]['id']);
  	$artikel->delete();
#	show($kategorien,$artikel,$smarty);
}
function show(&$kategorien,&$artikel,&$smarty)
{
	$kategorien->select();
	$kat = $kategorien->getRecords();
	#print $kategorien->$sql;
	$karegorienArray = array();
	foreach ($kat as $katKey => $katValue) 
	{
	   $karegorienArray[$katValue['id']] = $katValue['name'];
	}
	
	$funktionen= new funktionen($artikel, $smarty);
	$anzahl_seiten=$funktionen->seiten($artikel, $smarty);

    $start = 0;
    $anzeigen=10;
    
	if (isset($_GET['page']))
	$start = ($_GET['page']) * $anzeigen;
	
	
	$artikel->setOrderBy('`kat_id` ASC');
	$artikel->setLimit($anzeigen,$start);
	$artikel->select();
	$records = $artikel->getRecords();
	
	/*echo "<pre>";
	print_r($records);//Array Auflistung: [52] => Vertragsklauseln    
	echo "</pre>";*/
	
	$smarty->assign('seiten', $anzahl_seiten);
	$smarty->assign('artikel', $records);
	$smarty->assign('cat', $karegorienArray);
	$smarty->assign('contentTemplate', 'artikelliste.tpl');
}
?>