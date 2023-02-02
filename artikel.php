<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if ($_SESSION['user']['status'] != STATUS_ADMIN)
{
    header('Location: /derAdvokat/index.php');
}

$artikel = new mysqlTable($database, 'artikel');

if($_REQUEST['act'])
{
	show_inhalt($_GET['art_id'],$artikel, $smarty);
}

//Ausgabe von Kategorien
$kategorien = new mysqlTable($database, 'kategorien');
show_kategorien($kategorien, $smarty);

//Ausgabe von Unterkategorien
show_unterkategorien($kategorien, $smarty);

if($_POST['sent'])
{
	$eingabe_check=eingabe_check($artikel, $smarty);

	if($eingabe_check[0]==TRUE)
	{
		$bild=add($artikel, $smarty);

		$smarty->assign('erfolg', $eingabe_check[1]);
    	
		show_inhalt($_GET['art_id'],$artikel, $smarty);

		$smarty->assign('bild', $bild);
	}
	else
	{
		$smarty->assign('error', $eingabe_check[1]);
	}
}
$smarty->assign('contentTemplate', 'artikel.tpl');

//Funktionen

function show_unterkategorien(&$kategorien, &$smarty)
{
	$kategorien->setWhere('parent_id !=0');
	$kategorien->select();
	$records = $kategorien->getRecords();
	$smarty->assign('unterkategorie', $records);
}
function show_inhalt($art_id,&$artikel, &$smarty)
{
	$artikel->setWhere('id =' . $art_id);
  	$artikel->select();
	$records = $artikel->getRecords();
	$smarty->assign('artikel', $records[0]);
}

function show_kategorien(&$kategorien, &$smarty)
{
	$kategorien->setWhere('parent_id =0');
	$kategorien->select();
	$records = $kategorien->getRecords();
	$smarty->assign('kategorie', $records);
}

function eingabe_check(&$artikel, &$smarty)
{
	if($_FILES['bild']['size']>3500000)
	{
	  $meldung="Das Bild ist zu gross !";
	  return array(FALSE,$meldung);
	}
	if(is_uploaded_file($_FILES['bild']['tmp_name']))
  	{
		if(!($_FILES['bild']['type']=='image/jpeg' OR
			 $_FILES['bild']['type']=='image/pjpeg' OR
				$_FILES['bild']['type']=='image/gif' OR
				$_FILES['bild']['type']=='image/png'))
		{
			$meldung="Der Dateityp des Bildes ist nicht zulaessig !";
			return array(FALSE,$meldung);
		}
	}
  if($_POST['titel']=="")
  {
  	$meldung="Titel fehlt";
  	return array(FALSE,$meldung);
  }
	if($_POST['inhalt']=="")
  {
  	$meldung="Inhalt fehlt";
  	return array(FALSE,$meldung);
  }

  return array(TRUE,"Eintrag erfolgreich");
}

function add(&$artikel, &$smarty)
{
  if (isset($_POST['status']))
  {
    $status = mysql_real_escape_string($_POST['status']);
  }

  if (isset($_POST['kategorie']))
  {
    $kategorie = mysql_real_escape_string($_POST['kategorie']);
  }

  if (isset($_POST['unterkategorie'])) 
  {
  	$unterkategorie = mysql_real_escape_string($_POST['unterkategorie']);
  }

  if (isset($_POST['titel']))
  {
    $titel = mysql_real_escape_string($_POST['titel']);
  }

  if (isset($_POST['inhalt']))
  {
    $inhalt = $_POST['inhalt'];
  }

  	if($_FILES['bild']['name'])
	{
		$bild_1=$_FILES['bild']['name'];
	  	$expl=explode(".",$bild_1);
 	  	$uniq=uniqid();
 	  	$bild=$uniq.".".$expl[1];

 	  	if($_GET['art_id'])
 	  	{
 	  		$where = "`id`='" . mysql_escape_string($_GET['art_id']) . "'";
		  	$artikel->setWhere($where);
		  	$artikel->select();
		  	$records = $artikel->getRecords();
 	  		
      		if($_GET['art_id']!=$bild AND strlen($records[0]['bild_name']))
   	  		{
        		delete($_GET['art_id'], $artikel, $smarty);
      		}
    	}
	  	$type = strtolower(substr(strrchr($_FILES['bild']['name'], '.'), 1));

 	  	copy($_FILES['bild']['tmp_name'],"/var/kunden/webs/strauchyve/derAdvokat/bilder/{$bild}");
 	 	//Kleine Version
 	 	resizeImage($_FILES['bild']['tmp_name'], "/var/kunden/webs/strauchyve/derAdvokat/bilder/klein_{$bild}", 130, 130, $type);
 		//Main Version
 		resizeImage($_FILES['bild']['tmp_name'], "/var/kunden/webs/strauchyve/derAdvokat/bilder/main_{$bild}", 300, 300, $type);
 	}

	if(isset($titel) AND isset($inhalt))
	{
	  	if($_FILES['bild']['name']==true)
	    {
	      $artikel->bild_name->setValue($bild);
	    }
	    $artikel->premium->setValue($status);
	    $artikel->kat_id->setValue($kategorie);
	   	$artikel->ukat_id->setValue($unterkategorie);
	    $artikel->titel->setValue($titel);
	    $artikel->content->setValue($inhalt);
	    $artikel->save();

		$erfolg = "Eintrag Erfolgreich";
		$smarty->assign('erfolg', $erfolg);
  }
  return $bild;
}

function delete($art_id, &$artikel, &$smarty)
{
  $where = "`id`='" . mysql_escape_string($art_id) . "'";
  $artikel->setWhere($where);
  $artikel->select();
  $records = $artikel->getRecords();

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

function resizeImage($src, $des, $x, $y, $type)
{
  if($oldImage = imageLoad($src, $type))
  {
    $oldX = imagesx($oldImage);
    $oldY = imagesy($oldImage);

    if($oldX > $oldY)
            $y = ($oldY / $oldX) * $x;
        else
            $x = ($oldX / $oldY) * $y;

        $newImage = imagecreatetruecolor($x, $y);
        imagecopyresampled($newImage, $oldImage, 0, 0, 0, 0, $x, $y, $oldX, $oldY);

        if($type == 'jpeg' || $type == 'jpg')
            imagejpeg($newImage, $des, 100);
        elseif($type == 'gif')
            imagegif($newImage, $des);
        elseif($type == 'png')
            imagepng($newImage, $des);

        imagedestroy($oldImage);
        imagedestroy($newImage);

        return true;
    }
    else
    {
        return false;
    }
}

/**
* @desc Lädt ein JPG, GIF oder PNG Bild ein und gibt es zurück
* @param string Pfad und Dateiname zur Quelldatei
* @return resoure Bildresource. Fehlerfall = false
*/
function imageLoad($src, $type)
{
    if(file_exists($src))
    {
        if($type == 'jpeg' || $type == 'jpg')
            $image = imagecreatefromjpeg($src);
        elseif($type == 'gif')
            $image = imagecreatefromgif($src);
        elseif($type == 'png')
            $image = imagecreatefrompng($src);
        else
            $image = false;
    }
    else
        $image = false;

    return $image;
}
?>
