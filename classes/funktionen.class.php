<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}

class funktionen
{
 	public function __construct(private $_smarty, private $_database)
 {
 }

	/*public function log_sort($url)
	{
		switch($url)
		{
			case '/derAdvokat/index.php': $url="";break;
			case '/derAdvokat/login': $url="";break;

			default: $url;break;
		}

		return $url;
	}
	//--LOG TAB EINTRAG
	public function log_insert()
	{
		if($_GET['task']!='logout')
		{
			$insert_url = $this->log_sort($_SERVER['REQUEST_URI']);
		}


		if($insert_url!="")
		{
			$log = new mysqlTable($this->_database, 'log');

			if ($_SESSION['user']['status'])# != STATUS_ADMIN
			{
				$log->uid->setValue($_SESSION['user']['id']);
			}
			else
			{
				$log->uid->setValue(0);
			}

			$log->url->setValue($insert_url);
			$log->ip->setValue(getenv('REMOTE_ADDR'));
			$log->useragent->setValue(getenv('HTTP_USER_AGENT'));
			$log->save();
		}
	}*/

	//--JOB TAB Eintrag--//
	public function mail_selbsttest(&$smarty,&$_database)
	{
		if($_REQUEST['nl_id'])
		{
			$newsletter_id=$_REQUEST['nl_id'];

			#echo "<br>If Get True-NEWSLETTER_ARTIKELN";
			$newsletterArtiklel = new mysqlTable($_database, 'newsletter_artikeln');
			$newsletterArtiklel->setWhere('`parent_id`='.$newsletter_id);
			$newsletterArtiklel->select();
			$nlArtikel = $newsletterArtiklel->getRecords();

			#echo "<pre>";
			#print_r($nlArtikel);
			#echo "</pre>";
		}
		else
		{
			#echo "<br>if get false-NEWSLETTER_ARTIKELN";
			$newsletterArtiklel = new mysqlTable($_database, 'newsletter_artikeln');
			$newsletterArtiklel->setOrderBy('`id` DESC');
			$newsletterArtiklel->select();
			$nlArtikel = $newsletterArtiklel->getRecords();

			#echo "<pre>";
			#print_r($nlArtikel);
			#echo "</pre>";
		}

		#$this->newsletter_vorschau($newsletter_id,$smarty,$_database);

		$newsletter = new mysqlTable($_database, 'newsletter');

		if($nlArtikel)
		{
			$newsletter->setWhere('`id` = '.$nlArtikel[0]['parent_id']);
		}
		else
		{
			$newsletter->setWhere('`id` = '.$_REQUEST['nl_id']);
		}

		$newsletter->select();
		$nl = $newsletter->getRecords();

		#echo "<br>NL NEWSLETTER";
		#echo "<pre>";
		#print_r($nl);
		#echo "</pre>";

		$artikelIds = [];
		foreach ($nlArtikel as $temp) {
		    array_push($artikelIds, $temp['artikel_id']);
		}

		$MyArtikel  = new mysqlTable($_database, 'artikel');
		$MyArtikel->setWhere('`id` IN ('.implode(',', $artikelIds).')');
		$MyArtikel->select();
		$Artikel = $MyArtikel->getRecords();

		$smarty->assign('nv', $nl[0]);
		$smarty->assign('artikel', $Artikel);

		require_once("classes/phpmailer_v5_1/class.phpmailer.php");
		require_once("classes/phpmailer_v5_1/class.pop3.php");
		require_once("classes/phpmailer_v5_1/class.smtp.php");

		$mail  = new PHPMailer(false);
        #$mail_empfaenger[] = 'oleja@gmx.net';
        $eValue=$_SESSION['user']['email'];//AKTIVE ADMIN
        $body = $smarty->fetch(SMARTY_TEMPLATE_DIR."mail_newsletter.tpl");

        $mail->CharSet ='utf-8';

        $mail->IsMail();
        $mail->SetFrom(EMAIL, "Kanzlei-Strauch, derAdvokat-Newsletter");
        $mail->Subject    = $nl[0]['titel'];

        if ($nl[0]['logo_typ'] == 1) {
            $mail->AddEmbeddedImage(ROOT_DIR."grafik/logo_typ_deradvokat.png", "logo_typ_deradvokat", "logo_typ_deradvokat.png", "base64", "image/png");
        } else if ($nl[0]['logo_typ'] == 2) {
            $mail->AddEmbeddedImage(ROOT_DIR."grafik/logo_typ_kanzlei_strauch.png", "logo_typ_kanzlei_strauch", "logo_typ_kanzlei_strauch.png", "base64", "image/png");
        } else if ($nl[0]['logo_typ'] == 3) {
            $mail->AddEmbeddedImage(ROOT_DIR."grafik/logo_typ_icada.png", "logo_typ_icada", "logo_typ_icada.png", "base64", "image/png");
        }
        $mail->AddEmbeddedImage(ROOT_DIR."newsletter_bilder/main_".$nl[0]['bild_name'], $nl[0]['bild_name'], $nl[0]['bild_name'], "base64", "image/jpg");


        if ($nl[0]['logo_typ'] != 3){
        	$mail->AddEmbeddedImage(ROOT_DIR."grafik/unterschrift.jpg", "unterschrift", $nl[0]['bild_name'], "base64", "image/jpg");
        }
        $mail->AltBody    = $nl[0]['plain'];  // Alternativer Inhalt in Klartext
        $mail->MsgHTML($body);
        $mail->AddAddress($eValue);

        $mail->Send();
        #print "Sende an: ".$eValue."\n<br />";
        unset($mail);
	}
	public function job_eintrag(&$smarty,&$_database)
	{
		$id = null;
  if(isset($_POST['nl_id']))
		{
			#echo "nl_id-".$_POST['nl_id'];
			$id=$_POST['nl_id'];
		}
		$newsletter = new mysqlTable($this->_database, 'newsletter');
		$where = "`id`='" . mysql_escape_string($id) . "'";
		$newsletter->setWhere($where);
	  	$newsletter->select();
		$records = $newsletter->getRecords();

		#echo "Anz-Newsletter-".count($records);

		#echo "<pre>";
		#print_r($records);
		#echo "</pre>";

		$newsletter_empfanger = new mysqlTable($this->_database, 'newsletter_empfanger');
		$where_1 = "`parent_id`='" . mysql_escape_string($records[0]['id']) . "' && type_nr = 200";
		$newsletter_empfanger->setWhere($where_1);
		$newsletter_empfanger->select();
		$records_newsletter_empfanger = $newsletter_empfanger->getRecords();

		$anz_empf=count($records_newsletter_empfanger);

		#echo "<pre>";
		#print_r($records_newsletter_empfanger);
		#echo "</pre>";

		for($i=0;$i<$anz_empf;$i++)
		{
			$user = new mysqlTable($this->_database, 'user');
			$where_user = "`id`='" . mysql_escape_string($records_newsletter_empfanger[$i]['empfanger_id']) . "'";
			$user->setWhere($where_user);
		  	$user->select();
			$user_rec = $user->getRecords();

			#echo "<pre>";
			#print_r($user_rec);
			#echo "</pre>";

			foreach ($user_rec as $user_recKey => $user_recValue)
			{
			   $user_recArray[200][$user_recValue['id']] = $user_recValue['email'];
			}
		}

        $where_1 = "`parent_id`='" . mysql_escape_string($records[0]['id']) . "' && type_nr = 100";
        $newsletter_empfanger->setWhere($where_1);
        $newsletter_empfanger->select();
        $records_newsletter_empfanger = $newsletter_empfanger->getRecords();

        $anz_empf=count($records_newsletter_empfanger);

        #echo "<pre>";
        #print_r($records_newsletter_empfanger);
        #echo "</pre>";

        for($i=0;$i<$anz_empf;$i++)
        {
            $adressbuch = new mysqlTable($this->_database, 'adressbuch');
            $where_user = "`id`='" . mysql_escape_string($records_newsletter_empfanger[$i]['empfanger_id']) . "'";
            $adressbuch->setWhere($where_user);
              $adressbuch->select();
            $user_rec = $adressbuch->getRecords();

            #echo "<pre>";
            #print_r($user_rec);
            #echo "</pre>";

            foreach ($user_rec as $user_recKey => $user_recValue)
            {
               $user_recArray[100][$user_recValue['id']] = $user_recValue['email'];
            }
        }

		#echo "Anz-user-".count($user_rec);

		#echo "<pre>";
		#print_r($user_rec);
		#echo "</pre>";
		#$_smarty2 = new Smarty();
		#$this->_smarty2 = $_smarty2;
		#$this->_smarty2->assign();
		#echo $html = $this->_smarty->fetch(SMARTY_TEMPLATE_DIR."newsletter_vorschau_include.tpl");


		#echo "<pre>";
		#print_r($user_recArray);
		#echo "</pre>";

		$email = [$user_recArray];
		$newsletter_id= $records[0]['id'];
		$email = serialize($email);
		$titel = $records[0]['titel'];
		$plain = strip_tags($records[0]['content']);
		$html_content= $records[0]['content'];

		$job = new mysqlTable($_database, 'job');
		$job->newsletter_id->setValue($newsletter_id);
		$job->empfanger->setValue($email);
		$job->titel->setValue($titel);
		$job->plain->setValue($plain);
		$job->html_content->setValue($html_content);
		#$job->html->setValue($html);
		$status="10";
		$job->status->setValue($status);
		$job->send_date->setValue(date("Y-m-d G:i:s"));
		$job->save();
	}

	//--NL ARCHIVE--//
	public function newsletter_archive_versanddatum_eintrag(&$_smarty,&$_database)
	{
		$versand = new mysqlTable($_database, 'newsletter');
		$where_1 = "`id`='" . mysql_escape_string($_POST['nl_id']) . "'";
		$versand->setWhere($where_1);
		$versand->select();
		$versand->versendet->setValue(date("Y-m-d G:i:s"));
		$versand->save();
	}
	public function newsletter_archive(&$_smarty,&$_database)
	{
		$newsletter = new mysqlTable($this->_database, 'newsletter');
	  	$newsletter->select();
		$records = $newsletter->getRecords();
		$this->_smarty->assign('newsletter', $records);

		#echo "<pre>";
		#print_r($records);
		#echo "</pre>";
		#return $records;
	}
	public function del_archive_eintrag(&$smarty,&$_database)
	{
		$newsletter = new mysqlTable($this->_database, 'newsletter');
		$where = "`id`='" . mysql_escape_string($_GET['id']) . "'";
		$newsletter->setWhere($where);
	  	$newsletter->select();
		$records = $newsletter->getRecords();

		#echo "<pre>";
		#print_r($records);
		#echo "</pre>";
		#echo "Bild- ".$records[0]['bild_name'];

		if(strlen($records[0]['bild_name']))
	  	{
			for($i=1;$i<=3;$i++)
			{
		  		switch($i)
		  		{
		   			case 1: $fall="klein_"; break;
		   			case 2: $fall="main_"; break;
		   			case 3: $fall=""; break;
		  		}
		  		$path="newsletter_bilder/".$fall."";
		  		unlink($path.$records[0]['bild_name']); // Fotodatei löschen
			}
	  	}

		$del_newsletter_artikeln = new mysqlTable($this->_database, 'newsletter_artikeln');
		$where_1 = "`parent_id`='" . mysql_escape_string($records[0]['id']) . "'";
		$del_newsletter_artikeln->setWhere($where_1);
		$del_newsletter_artikeln->delete();

		$del_newsletter_empfanger = new mysqlTable($this->_database, 'newsletter_empfanger');
		$where_2 = "`parent_id`='" . mysql_escape_string($records[0]['id']) . "'";
		$del_newsletter_empfanger->setWhere($where_2);
		$del_newsletter_empfanger->delete();

		$del_newsletter = new mysqlTable($this->_database, 'newsletter');
		$where_3 = "`id`='" . mysql_escape_string($records[0]['id']) . "'";
		$del_newsletter->setWhere($where_3);
		$del_newsletter->delete();

		$this->newsletter_archive($_smarty,$_database);
	}
	//--ADRESSBUCH--//

	public function del_adressbuch_eintrag(&$smarty,&$_database)
	{
		$del_adr_eintag = new mysqlTable($this->_database, 'adressbuch');
		$where = "`id`='" . mysql_escape_string($_GET['id']) . "'";
		$del_adr_eintag->setWhere($where);
		$del_adr_eintag->delete();
	}
	public function show_adressbuch_eintrag(&$smarty,&$_database)
	{
		$adressbuch = new mysqlTable($this->_database, 'adressbuch');
		$adressbuch->setOrderBy('`id` DESC');
	  	$adressbuch->select();
		$records = $adressbuch->getRecords();
		$this->_smarty->assign('adressbuch', $records);
		#echo "<pre>";
		#print_r($records);
		#echo "</pre>";
	}
	public function adressbuch_eintrag(&$smarty,&$_database)
	{
		$email = null;
  $name = null;
  $vorname = null;
  $geschlecht = null;
  $firma_namel = null;
  $empfanger_art = null;
  if (isset($_POST['email']))
	    {
	      $email = mysql_real_escape_string($_POST['email']);
	    }
		if (isset($_POST['name']))
	    {
	      $name = mysql_real_escape_string($_POST['name']);
	    }
		if (isset($_POST['vorname']))
	    {
	      $vorname = mysql_real_escape_string($_POST['vorname']);
	    }
		if (isset($_POST['geschlecht']))
	    {
	      $geschlecht = mysql_real_escape_string($_POST['geschlecht']);
	    }
		if (isset($_POST['firma_name']))
	    {
	      $firma_namel = mysql_real_escape_string($_POST['firma_name']);
	    }
		if (isset($_POST['empf_art']))
	    {
	      $empfanger_art = mysql_real_escape_string($_POST['empf_art']);
	    }
		$adressbuch = new mysqlTable($_database, 'adressbuch');
		$adressbuch->email->setValue($email);
		$adressbuch->name->setValue($name);
		$adressbuch->vorname->setValue($vorname);
		$adressbuch->geschlecht->setValue($geschlecht);
		$adressbuch->firma_name->setValue($firma_namel);
		$adressbuch->empfanger_art->setValue($empfanger_art);
		$adressbuch->save();
	}

	//--NEWSLETTER--//

	public function show_edit_empfanger(&$_smarty,&$_database)
	{
		$recordsArray = [];
  $newsletter_empfanger = new mysqlTable($this->_database, 'newsletter_empfanger');
		$newsletter_empfanger->setWhere('`parent_id`='.$_GET['nl_id']);
	  	$newsletter_empfanger->select();
		$records = $newsletter_empfanger->getRecords();

		#echo "newsletter_empfanger";
		#echo "<pre>";
		#print_r($records);
		#echo "</pre>";

		foreach ($records as $recordsKey => $recordsValue)
		{
		   $recordsArray[$recordsValue['type_nr']][$recordsValue['empfanger_id']] = $recordsValue['empfanger_id'];
		}
		$this->_smarty->assign('nl_empfanger', $recordsArray);

		#echo "<pre>";
		#print_r($recordsArray);
		#echo"</pre>";
	}
	public function show_empfanger(&$_smarty,&$_database)
	{
		$newsletter = new mysqlTable($this->_database, 'email_empfaenger');

		switch($_POST['task_empf'])
		{
			case 1: ;break;
			case 2: $newsletter->setWhere('`empfanger_art`=2');break;
			case 3: $newsletter->setWhere('`empfanger_art`=3');break;
		}
	  	$newsletter->select();
		$newsletter = $newsletter->getRecords();
		$this->_smarty->assign('user', $newsletter);
	}

	public function newsletter_artikeln($newsletter_id,&$_smarty,&$_database)
	{
		$recordsArray = [];
  $records_nl_art = new mysqlTable($this->_database, 'newsletter_artikeln');
		$records_nl_art->setWhere('`parent_id`='.$newsletter_id);
	  	$records_nl_art->select();
		$records_nl_art = $records_nl_art->getRecords();

		#echo "<pre>";
		#print_r($records_nl_art);
		#echo"</pre>";

		$anz_artikeln=count($records_nl_art);
		$this->_smarty->assign('anz_artikeln', $anz_artikeln);

		$this->_smarty->assign('newsletter_artikeln_id', $records_nl_art);

		$artikeln = new mysqlTable($this->_database, 'artikel');
	  	$artikeln->select();
		$records = $artikeln->getRecords();

		#echo "<pre>";
		#print_r($records);
		#echo"</pre>";

		foreach ($records as $recordsKey => $recordsValue)
		{
		   $recordsArray[$recordsValue['id']] = $recordsValue['titel'];
		}
		#echo "<pre>";
		#print_r($recordsArray);
		#echo"</pre>";

		$this->_smarty->assign('newsletter_artikeln', $recordsArray);
	}

	//--NEWSLETTER VORSCHAU--//

	public function newsletter_vorschau($newsletter_id,&$_smarty,&$_database)
	{
		$newsletter = new mysqlTable($this->_database, 'newsletter');
		$newsletter->setWhere('`id`='.$newsletter_id);
	  	$newsletter->select();
		$records = $newsletter->getRecords();
		$this->_smarty->assign('newsletter', $records);

		#echo "<pre>";
		#print_r($records);
		#echo "</pre>";

		return $records;
	}
	public function show_edit_newsletter(&$_smarty,&$_database)
	{
		$newsletter = new mysqlTable($this->_database, 'newsletter');
		$newsletter->setWhere('`id`='.$_GET['nl_id']);
	  	$newsletter->select();
		$records = $newsletter->getRecords();
		$this->_smarty->assign('newsletter', $records);

		#echo "<pre>";
		#print_r($records);
		#echo "</pre>";

		#return $records;
	}
	public function show_artikel_newsletter(&$smarty,&$_database)
	{
		$records_nl_artArray = [];
  $kategorien = new mysqlTable($_database, 'kategorien');
		$artikel = new mysqlTable($_database, 'artikel');

		$kategorien->select();
		$kat = $kategorien->getRecords();
		#print $kategorien->$sql;
		$karegorienArray = [];
		foreach ($kat as $katKey => $katValue)
		{
		   $karegorienArray[$katValue['id']] = $katValue['name'];
		}

		/*echo "<pre>";
		print_r($karegorienArray);//Array Auflistung: [52] => Vertragsklauseln
		echo "</pre>";*/

		$artikel->setOrderBy('`kat_id` ASC');
		$artikel->select();
		$records = $artikel->getRecords();

		/*echo "<pre>";
		print_r($records);//Array Auflistung: [52] => Vertragsklauseln
		echo "</pre>";*/

		#echo $_GET['nl_id'];

		$records_nl_art = new mysqlTable($this->_database, 'newsletter_artikeln');
		$records_nl_art->setWhere('`parent_id`='.$_REQUEST['nl_id']);
	  	$records_nl_art->select();
		$records_nl_art = $records_nl_art->getRecords();

		#echo "<pre>";
		#print_r($records_nl_art);//Array Auflistung: [52] => Vertragsklauseln
		#echo "</pre>";

		if($records_nl_art!=0)
		{
			foreach ($records_nl_art as $records_nl_artKey => $records_nl_artValue)
			{
				#echo $records_nl_artKey;
			   $records_nl_artArray[$records_nl_artValue['artikel_id']] = $records_nl_artValue['artikel_id'];
			}
		}
		if($records_nl_art)
		{
			$show=true;
			$smarty->assign('show', $show);
		}
		#echo "<pre>";
		#print_r($records_nl_artArray);//Array Auflistung: [52] => Vertragsklauseln
		#echo "</pre>";

		$smarty->assign('nl_artikel', $records_nl_artArray);
		$smarty->assign('artikel', $records);
		$smarty->assign('cat', $karegorienArray);
		#$this->_smarty->assign('contentTemplate', 'artikelubersicht.tpl');
	}
	public function newsletter_eintrag(&$smarty,&$_database)
	{
		$bild = null;
  $logo_typ = null;
  $newsletter_aus = [];
  if (isset($_POST['titel']))
	  	{
	    	$titel = mysql_real_escape_string($_POST['titel']);
	  	}

	  	if (isset($_POST['inhalt']))
	  	{
	    	$inhalt = $_POST['inhalt'];
	  	}

		if (isset($_POST['logo_typ']))
	  	{
	    	$logo_typ = $_POST['logo_typ'];
	  	}

	  	if($_FILES['bild']['name'])
		{
			$bild_1=$_FILES['bild']['name'];
		  	$expl=explode(".",$bild_1);
		  	$file_type = array_pop($expl);
	 	  	$uniq=uniqid();
	 	  	$bild=$uniq.".".$file_type;

		  	$type = strtolower(substr(strrchr($_FILES['bild']['name'], '.'), 1));

	 	  	copy($_FILES['bild']['tmp_name'],"/var/kunden/webs/strauchyve/derAdvokat/newsletter_bilder/{$bild}");
	 	 	//Kleine Version
	 	 	$this->resizeImage($_FILES['bild']['tmp_name'], "/var/kunden/webs/strauchyve/derAdvokat/newsletter_bilder/klein_{$bild}", 130, 130, $type);
	 		//Main Version
	 		$this->resizeImage($_FILES['bild']['tmp_name'], "/var/kunden/webs/strauchyve/derAdvokat/newsletter_bilder/main_{$bild}", 300, 300, $type);
	 	}

		#if($_GET['nl_id'])
 	  	#{
 	  		/*$nl_artikel = new mysqlTable($_database, 'newsletter');
 	  		$where = "`id`='" . mysql_escape_string($_GET['nl_id']) . "'";
		  	$nl_artikel->setWhere($where);
		  	$nl_artikel->select();
		  	$records = $nl_artikel->getRecords();*/

      		if($_GET['nl_id']!=$bild)
   	  		{
        		$this->delete($_GET['nl_id'],$_smarty,$_database);#falls neues Bild vorhanden ist, werden die alte gelöscht und ebenfalls dieses Datensatz
      		}
    	#}

		if(isset($titel) AND isset($inhalt))
		{
			//NEWSLETTEREINTRAG
			$newsletter = new mysqlTable($_database, 'newsletter');

			if($_POST['bild'])
		    {
		      $newsletter->bild_name->setValue($_POST['bild']);
		    }
		  	if($_FILES['bild']['name']==true)
		    {
		      $newsletter->bild_name->setValue($bild);
		    }

		    $plain = strip_tags($_POST['inhalt']);

		    $newsletter->titel->setValue($titel);
		    $newsletter->content->setValue($inhalt);
		    $newsletter->plain->setValue($plain);
		    $newsletter->logo_typ->setValue($logo_typ);
		    $newsletter->save();

			//NEWSLETTER ARTIKEL EINTRAG
		    $newsletter_aus = new mysqlTable($_database, 'newsletter');
		    $newsletter_aus->setOrderBy('`id` DESC');
		    $newsletter_aus->select();
			$newsletter_aus = $newsletter_aus->getRecords();

		    #echo "<pre>";
		    #print_r($newsletter_aus);
		    #echo "</pre>";

		    $anz=is_countable($_POST['artikel']) ? count($_POST['artikel']) : 0;#echo "ANZ-".

		    $newsletter_artikeln = new mysqlTable($_database, 'newsletter_artikeln');

		    $newsletter_artikeln_ein = new mysqlTable($_database, 'newsletter_artikeln');

		    for($i=0;$i<$anz;$i++)
		    {
		    	if($_GET['nl_id'])
		    	{
				  	$where = "`parent_id`='" . mysql_escape_string($_GET['nl_id']) . "'";
				  	$newsletter_artikeln->setWhere($where);
				  	$newsletter_artikeln->delete();
		    	}

		    	if(!$_POST['keine_artikeln'])
		    	{
					$newsletter_artikeln->artikel_id->setValue($_POST['artikel'][$i]);
					$newsletter_artikeln->parent_id->setValue($newsletter_aus[0]['id']);
			    	$newsletter_artikeln->save();
		    	}
		    }
		    if($anz==0 AND $_GET['nl_id'])
		    {
		    	$where = "`parent_id`='" . mysql_escape_string($_GET['nl_id']) . "'";
		    	$newsletter_artikeln->setWhere($where);
				$newsletter_artikeln->select();
				$records = $newsletter_artikeln->getRecords();
				$anz_nl_artikeln=count($records);#echo "Anz Nl Artikeln-".

		    	for($a=0;$a<$anz_nl_artikeln;$a++)
		    	{
		    		#echo "<br>a-".$a;
		  			#echo "<br>Art-".$records[$a]['artikel_id'];
				  	$newsletter_artikeln_ein->artikel_id->setValue($records[$a]['artikel_id']);
					$newsletter_artikeln_ein->parent_id->setValue($newsletter_aus[0]['id']);
		    		$newsletter_artikeln_ein->save();

		    		$where = "`parent_id`='" . mysql_escape_string($_GET['nl_id']) . "'";
					$newsletter_artikeln->setWhere($where);
					$newsletter_artikeln->delete();
		    	}
		    }

		    //------------newsletter_empfangerTAB-------------//
		    $empf_anz=is_countable($_POST['empfanger']) ? count($_POST['empfanger']) : 0;#echo "ANZ-".

		    $newsletter_empfanger = new mysqlTable($_database, 'newsletter_empfanger');
            //   echo "<br>count-".$anz_eintragen=count($_POST['type']);
            #print_r($_POST);
            if($_GET['nl_id']) {
                $where = "`parent_id`='" . mysql_escape_string($_GET['nl_id']) . "'";
                $newsletter_empfanger->setWhere($where);
                $newsletter_empfanger->delete();
            }
		   	foreach ($_POST['empfanger'] as $empfaengerTypeKey => $empfaengerTypeValue) {
                foreach ($empfaengerTypeValue as $eType => $eValue) {
                   $newsletter_empfanger->parent_id->setValue($newsletter_aus[0]['id']);
                   $newsletter_empfanger->empfanger_id->setValue($eValue);

                   $newsletter_empfanger->type_nr->setValue($empfaengerTypeKey);
                   $newsletter_empfanger->save();
                }
            }
		}
	  	return $newsletter_aus[0]['id'];
	}
	public function delete($nl_id, &$_smarty,&$_database)
	{
		if($_FILES['bild']['name']==true)
		{
		   	$newsletter = new mysqlTable($_database, 'newsletter');
		  	$where = "`id`='" . mysql_escape_string($nl_id) . "'";
	  		$newsletter->setWhere($where);
	  		$newsletter->select();
	  		$records = $newsletter->getRecords();

	  		if(strlen($records[0]['bild_name']))
	  		{
		  		for($i=1;$i<=3;$i++)
		  		{
		    		switch($i)
		    		{
		      			case 1: $fall="klein_"; break;
		      			case 2: $fall="main_"; break;
		      			case 3: $fall=""; break;
		    		}
		    		$path="newsletter_bilder/".$fall."";
		    		unlink($path.$records[0]['bild_name']); // Fotodatei löschen
		  		}
	  		}
		}
	  	$newsletter = new mysqlTable($_database, 'newsletter');
	  	$where = "`id`='" . mysql_escape_string($nl_id) . "'";
	  	$newsletter->setWhere($where);
	  	$newsletter->delete();

	}
	public function eingabe_check()
	{
		if($_FILES['bild']['size']>3_500_000)
		{
		  $meldung="Das Bild ist zu gross !";
		  return [FALSE, $meldung];
		}
		if(is_uploaded_file($_FILES['bild']['tmp_name']))
	  	{
			if(!($_FILES['bild']['type']=='image/jpeg' OR
				 $_FILES['bild']['type']=='image/pjpeg' OR
					$_FILES['bild']['type']=='image/gif' OR
					$_FILES['bild']['type']=='image/png'))
			{
				$meldung="Der Dateityp des Bildes ist nicht zulaessig !";
				return [FALSE, $meldung];
			}
		}
	  	if($_POST['titel']=="")
	  	{
	  		$meldung="Titel fehlt";
	  		return [FALSE, $meldung];
	  	}
		if($_POST['inhalt']=="")
	  	{
	  		$meldung="Inhalt fehlt";
	  		return [FALSE, $meldung];
	  	}
	  	$empf_anz=is_countable($_POST['empfanger']) ? count($_POST['empfanger']) : 0;

		if($empf_anz==0)
	  	{
	  		$meldung="Bitte Empf&auml;nger ausw&auml;hlen";
	  		return [FALSE, $meldung];
	  	}
	  	return [TRUE, "Eintrag erfolgreich"];
	}
	public function resizeImage($src, $des, $x, $y, $type)
	{
	  if($oldImage = $this->imageLoad($src, $type))
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
	public function imageLoad($src, $type)
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

	public function seiten(&$user, &$smarty)
	{
		#$user->setWhere('status != 3');

	    #$user->setOrderBy('id DESC');
	    $user->select();

	    $user->getRecords();
	    $anz_user=$user->countRecords();

	    #$funktionen= new funktionen($user, $smarty);
	    $anzahl_seiten=$this->seiten_zahlen_ausgabe($anz_user);//SEITENBLATT

		#echo "<pre>";
		#print_r($anzahl_seiten);
		#echo "</pre>";

		return $anzahl_seiten;
	}

	public function seiten_zahlen_ausgabe($anz_art=null)
  	{
  		$page=null;
	    if(isset($_GET['page']))
	    {
	    	$page=$_GET['page'];
	    }
	    $task=null;
  	 	if(isset($_GET['task']))
	    {
	    	$task=$_GET['task'];
	    }
	    $act=null;
  		if(isset($_GET['act']))
	    {
	    	$act="&amp;act=".$_GET['act'];
	    }

	    $anzeigen=10;
	    $aus = $this->getPageList($anz_art, $page, $anzeigen, "?task=".$task."".$act."&amp;page=", false, $_SERVER['PHP_SELF']);
	    return $aus;
	}
	public function getPageList($amount, $page = 0, $recordsPerPage = 10, $pagePrefix = false, $anchor = false, $link = false)
	{

    if(!$link)
			$link = $_SERVER['REQUEST_URI'];

		if($anchor)
			$anchor = '#' . $anchor;
		else
			$anchor = '';

		if(!$pagePrefix)
			$pagePrefix = '';

		$maxPages = ($amount-($amount%$recordsPerPage))/$recordsPerPage;

		if($amount%$recordsPerPage == 0)
			$maxPages--;

		if(strlen($page))
			$link = preg_replace('/\/' . preg_quote($pagePrefix, '/') . $page . '\/$/', '/', $link);
		else
			$page = 0;

		if($maxPages > 0)
		{
			$from = intval($page - (NUMBER_DISPLAYED_PAGENUMBERS - 1) / 2);

			if($from < 0)
			{
				$from = 0;
				$to = NUMBER_DISPLAYED_PAGENUMBERS - 1;
			}
			else
				$to = $from + NUMBER_DISPLAYED_PAGENUMBERS - 1;

			if($to > $maxPages)
			{
				$to = $maxPages;
				$from = $maxPages - NUMBER_DISPLAYED_PAGENUMBERS + 1;

				if($from < 0)
					$from = 0;
			}

			if(isset($pages))
			{
				$pages;
			}
			else
			{
				$pages=null;
			}
			if(isset($seite))
			{
				$seite;
			}
			else
			{
				$seite=null;
			}
			if($page > $from)
				$pages .= '<td><a class="blatt_in_aus" href="' . $link . $pagePrefix . '0' . $anchor . '" title="1">&lt;&lt;</a></td> ';

			if($page > 0)
				$pages .= '<td><a class="blatt_in_aus" href="' . $link . $pagePrefix . ($page - 1) . '' . $anchor . '" title="' . $seite . '">&lt;</a></td> ';

			for($i = $from;$i <= $to && $i <= $maxPages;$i++)
			{
				if($i < 0)
					$i = 0;
				if($i == $page)
					$pages .= '<td style="background:orange;"><font color="white"><b>'.($i + 1) . '</b></font></td> ';
				else
					$pages .= '<td><a class="blatt_in_aus" href="' . $link . $pagePrefix . $i . '' . $anchor . '" title="' . ($i + 1) . '">' . ($i + 1) . '</a></td> ';
			}

			if($page < $maxPages)
				$pages .= '<td><a class="blatt_in_aus" href="' . $link . $pagePrefix . ($page + 1) . '' . $anchor . '" title="' . ($page + 2) . '">&gt;</a></td> ';

			if($page < $to)
				$pages .= '<td><a class="blatt_in_aus" href="' . $link . $pagePrefix . $maxPages . '' . $anchor . '" title="' . ($maxPages + 1) . '">&gt;&gt;</a></td> ';
		}

		if(isset($pages))
		{
			$pages;
		}
		else
		{
			$pages=null;
		}


		if(!$pages)
			$pages = "";

		$pages='<table border="0"><tr>'.$pages.'</tr></table>';

		return $pages;
	}
}
?>
