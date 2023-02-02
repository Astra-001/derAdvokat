<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if ($_SESSION['user']['status'] != STATUS_ADMIN)
{
    header('Location: /derAdvokat/index.php');
}
//Ausgabe von Unterkategorien
$kategorien = new mysqlTable($database, 'kategorien');
$artikel = new mysqlTable($database, 'artikel');

switch ($_REQUEST['act'])
{
	case 'del':
		if($_POST['loeschen'])
		{
			if ($_SESSION['user']['status'] == STATUS_ADMIN)
    		{
				$id = mysql_real_escape_string($_REQUEST['id']);
			    delete_unterkat($id, $kategorien, $smarty);
			    $del_message_anzeigen=FALSE;			    		
	        	delete_artikel($id, $artikel, $smarty);
	        	show_unterkategorien($kategorien, $smarty);
	    	}
		}
		else
		{
			$del_message_anzeigen=TRUE;
			$smarty->assign('del_message_anzeigen', $del_message_anzeigen);
		
			$id = mysql_real_escape_string($_REQUEST['id']);
			$kategorien->setWhere('id ='.$id);
			$kategorien->select();
			$records = $kategorien->getRecords();
			
			$smarty->assign('unterkategorie', $records[0]['name']);
			
			show_artikel($id, $artikel, $smarty);

		}
        break;
	default:
        show_unterkategorien($kategorien, $smarty);
}

if($_POST['eintragen'])
{
	if($_POST['unter_kat_name']=="")
	{
		$msg_fehler="Bitte tragen Sie die - Unterkategorie - ein";
		$smarty->assign('msg_fehler', $msg_fehler);
	}
	else
	{
		add($kategorien, $smarty);
	}
}
$smarty->assign('contentTemplate', 'unterkategorien_verwaltung.tpl');

//Funktionen
function delete_artikel($id, &$artikel, &$smarty)
{
	$where = "`ukat_id`='" . mysql_escape_string($id) . "'";
	$artikel->setWhere($where);
	$artikel->select();
	$records = $artikel->getRecords();
			
	for($i=0;$i<count($records);$i++)//Artikeln durchlaufen
	{
		if($records[$i]['bild_name']!="")//Falls Bilder vorhanden
		{
			for($a=1;$a<=3;$a++)
		    {
			      switch($a)
			      {
			        case 1: $fall="klein_"; break;
			        case 2: $fall="main_"; break;
			        case 3: $fall=""; break;
			      }
			      $path="bilder/".$fall."";
			      unlink($path.$records[$i]['bild_name']); // Fotodatei löschen
			}
		}
		$artikel->setWhere('id=' . $records[$i]['id']);
		$artikel->delete();
	}
}
function add(&$kategorien, &$smarty)
{
	if (isset($_POST['unter_kat_name']) AND isset($_POST['kategorien']))
    {
    	$kategorien_id = mysql_real_escape_string($_POST['kategorien']);
      	$unter_kat_name = mysql_real_escape_string($_POST['unter_kat_name']);
      	$kategorien->load(1);
      	$kategorien->parent_id->setValue($kategorien_id);
      	$kategorien->name->setValue($unter_kat_name);
		$kategorien->save();
		#print $kategorien->sql;
		show_unterkategorien($kategorien, $smarty);
    }
}
function delete_unterkat($id, &$kategorien, &$smarty)
{
    $kategorien->setWhere('id=' . $id);
    $kategorien->delete();
    show_unterkategorien($kategorien, $smarty);
}
function show_unterkategorien(&$kategorien, &$smarty)
{
	#$kategorien = new mysqlTable($database, 'kategorien');
    switch($_REQUEST['task'])
    {
    	case 2: 
    		$where = "`id`='1'";
    		$where1 = "parent_id =1";
    	  	break;
    	case 3: 
    		$where = "`id`='2'";
    		$where1 = "parent_id =2";
    		break;
    	case 4: 
    		$where = "`id`='3'";
    		$where1 = "parent_id =3";
    		break;
    	case 5: 
    		$where = "`id`='4'";
    		$where1 = "parent_id =4";
    		break;
    	case 6: 
    		$where = "`id`='5'";
    		$where1 = "parent_id =5";
    		break;
    	case 7: 
    		$where = "`id`='6'";
    		$where1 = "parent_id =6";
    		break;
    	default: 
    		$where = "";
    		$where1 = "parent_id !=0";
    		break;
    }
    
    $kategorien->setWhere($where);
    $kategorien->select();
    $kat = $kategorien->getRecords();
    $karegorienArray = array();
    foreach ($kat as $katKey => $katValue) {
        $karegorienArray[$katValue['id']] = $katValue['name'];
    }
    
	#echo "<pre>";
    #print_r($karegorienArray);//Array Auflistung: [52] => Vertragsklauseln    
    #echo "</pre>";
    
    $kategorien->setWhere($where1);
	#$kategorien->setWhere('parent_id !=0');
    $kategorien->setOrderBy('parent_id');
	$kategorien->select();
	$records = $kategorien->getRecords();

	#echo "<pre>";
    #print_r($records);//Array Auflistung: [52] => Vertragsklauseln    
    #echo "</pre>";
    
	$smarty->assign('unterkategorie', $records);
	
	$smarty->assign('cat', $karegorienArray);
}
function show_artikel($id,&$artikel, &$smarty)
{
	$where = "`ukat_id`='" . mysql_escape_string($id) . "'";
	$artikel->setWhere($where);
	$artikel->select();
	$records = $artikel->getRecords();
	
	$smarty->assign('show_artikel', $records);
}
?>
