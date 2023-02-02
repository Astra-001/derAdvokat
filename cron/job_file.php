<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("/var/customers/webs/strauchyve/derAdvokat/includes/defines.php");
ini_set('include_path' , ini_get('include_path').':'.ROOT_DIR.':'.ROOT_DIR.'classes');
//print ini_get('include_path');
#require_once(ROOT_DIR."includes/includes.php"); 
require_once(ROOT_DIR."classes/mysqlTable.class.php");
require_once(ROOT_DIR."classes/mysqlField.class.php");
require_once(ROOT_DIR."classes/mysqlDatabase.class.php");

require_once(ROOT_DIR."classes/phpmailer_v5_1/class.phpmailer.php");
require_once(ROOT_DIR."classes/phpmailer_v5_1/class.pop3.php");
require_once(ROOT_DIR."classes/phpmailer_v5_1/class.smtp.php");

require_once(ROOT_DIR."smarty/Smarty.class.php");

$database = new mysqlDatabase();
$database->openDB();

$smarty = new Smarty();
$smarty->compile_dir = ROOT_DIR.SMARTY_TEMPLATE_CACHE_DIR;

$job = new mysqlTable($database, 'job');
$where = "`status`=".NEWSLETTER_NEW;
$job->setWhere($where);
$job->setLimit(1);
$job->select();

if ($job->countRecords() == 0) {
    //print "Nix zu tun...<br />\n";
    exit;
}

$job->status->setValue(NEWSLETTER_ACTIVE);
$job->save();


$newsletter = new mysqlTable($database, 'newsletter');
$maillog = new mysqlTable($database, 'mail_log');   

$newsletter->setWhere('`id` = '.$job->newsletter_id->getValue());
$newsletter->select();
//print $newsletter->sql;
$nl = $newsletter->getRecords();

$newsletterArtiklel = new mysqlTable($database, 'newsletter_artikeln');
$newsletterArtiklel->setWhere('`parent_id`='.$job->newsletter_id->getValue());
$newsletterArtiklel->select();
$nlArtikel = $newsletterArtiklel->getRecords();     

$artikelIds = array();
foreach ($nlArtikel as $temp) {
    array_push($artikelIds, $temp['artikel_id']);
}


$MyArtikel  = new mysqlTable($database, 'artikel');
$MyArtikel->setWhere('`id` IN ('.implode(',', $artikelIds).')');
$MyArtikel->select();
$Artikel = $MyArtikel->getRecords();

$smarty->assign('nv', $nl[0]);            
$smarty->assign('artikel', $Artikel);            


$empfanger=unserialize(stripslashes($job->empfanger->getValue()));

$body = $smarty->fetch(SMARTY_TEMPLATE_DIR."mail_newsletter.tpl");        

foreach ($empfanger[0] as $empfaengerTypeKey => $empfaengerTypeValue) 
{
	foreach ($empfaengerTypeValue as $eType => $eValue) 
	{
    	$mail = new PHPMailer(false);   
        $mail->CharSet ='utf-8';
        $mail->IsMail();
        $mail->SetFrom(EMAIL, "Kanzlei-Strauch, derAdvokat-Newsletter");
        $mail->Subject = $job->titel->getValue();

        $mail->AddAddress($eValue);   

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
        $mail->AltBody = $job->plain->getValue();  // Alternativer Inhalt in Klartext
        $mail->MsgHTML($body);
	        
        $status = (bool) $mail->Send();
        print "Sende an: ".$eValue."\n<br />";
        $maillog->email->setValue($eValue);
        $maillog->job->setValue($job->id->getValue());
        $maillog->status->setValue($status);
        $maillog->save();
        
        unset($mail);
    }
}

$job->status->setValue(NEWSLETTER_DONE);
$job->save();
$database->closeDB();