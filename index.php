<?php
ini_set('display_errors', 1);
define('INDEX_LOAD', true);
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Content-type: text/html; charset=UTF-8");

ini_set("arg_separator.output","&amp;");
ini_set("display_errors","0");

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

require_once("includes/includes.php");
session_start();
$database = new mysqlDatabase();
$result = $database->openDB();
$smarty = new Smarty();
$smarty->compile_dir = SMARTY_TEMPLATE_CACHE_DIR;


//Kategorien
if (!isset($_SESSION['kategorien'])) {

    $kategorien = new mysqlTable($database, 'kategorien');
    $kategorien->setWhere('parent_id =0');
    $kategorien->select();
    $_SESSION['kategorien'] = $kategorien->getRecords();
}

/*switch($_REQUEST['kategorien_sortierung'])
{
	    case $_REQUEST['kategorien_sortierung']:
        require('unterkategorien_verwaltung.php');
        break;
}*/
#echo "GET Task-".$_REQUEST['task'];
switch($_REQUEST['task'])
{

	case 'lohnherstellungsvertrag':
        require('lohn_vertrage/lohnherstellungsvertrag.php');
        break;

	case 'test':
        require('test.php');
        break;

        case 'newsletter_archive':
        new newsletter_archive($smarty,$database);
        break;

        case 'neu_empfanger':
        new neu_empfanger($smarty,$database);
        break;

        case 'newsletter_menu':
        new newsletter_menu($smarty,$database);
        break;

        case 'newsletter':
        new newsletter($smarty,$database);
        break;

        case 'alarmplan':
        require('alarmplan.php');
        break;

        case 'betriebsanweisung_betrieb_verkehr':
        require('betriebsanweisung_betrieb_verkehr.php');
        break;

        case 'betriebsanweisung':
        require('betriebsanweisung.php');
        break;

        case 'nicht_wieterbeschaftigung_nach_ausbildung':
        require('nicht_wieterbeschaftigung_nach_ausbildung.php');
        break;

   case 1:
        require('unterkategorien_verwaltung.php');
        break;

    case 2:
        require('unterkategorien_verwaltung.php');
        break;

    case 3:
        require('unterkategorien_verwaltung.php');
        break;
    case 4:
        require('unterkategorien_verwaltung.php');
        break;
    case 5:
        require('unterkategorien_verwaltung.php');
        break;
    case 6:
        require('unterkategorien_verwaltung.php');
        break;

    case 7:
        require('unterkategorien_verwaltung.php');
        break;

	case 'unterkategorien':
        require('unterkategorien.php');
        break;

	case 'unterkategorien_verwaltung':
        require('unterkategorien_verwaltung.php');
        break;

	case 'sicherung':
        require('sicherung.php');
        break;

	case 'darlehen':
        require('darlehen.php');
        break;

  	case 'anstell_vertrag_volontar':
        require('anstell_vertrag_volontar.php');
        break;

  	case 'anstell_vertrag_verlangerung':
        require('anstell_vertrag_verlangerung.php');
        break;

  	case 'anstell_vertrag_ad_befristet':
        require('anstell_vertrag_ad_befristet.php');
        break;

  	case 'anstell_vertrag_befristet':
        require('anstell_vertrag_befristet.php');
        break;

  	case 'anstell_vertrag_aushilfe':
        require('anstell_vertrag_aushilfe.php');
        break;

  	case 'anstell_vertrag_ad':
        require('anstell_vertrag_ad.php');
        break;

  	case 'anstell_vertrag_allgemein':
        require('anstell_vertrag_allgemein.php');
        break;

  	case 'quittung':
        require('quittung.php');
        break;

  	case 'fahrschein_erlaubnis':
        require('fahrschein_erlaubnis.php');
        break;

  	case 'dienstfahrzeug_vertrag':
        require('dienstfahrzeug_vertrag.php');
        break;

  	case 'abmahnung':
        require('abmahnung.php');
        break;

	case 'kundigung':
        require('kundigung.php');
        break;

	case 'kundigung_wohnraum':
        require('kundigung_wohnraum.php');
        break;

  	case 'vertrag_arbeitsnehmer':
        require('vertrag_arbeitsnehmer.php');
        break;

  	case 'darlehen_sicherung':
        require('darlehen_sicherung.php');
        break;

  	case 'arbeits_vertrag':
        require('arbeits_vertrag.php');
        break;

 	case 'impressum':
        require('impressum.php');
        break;

	case 'agb':
        require('agb.php');
        break;

	case 'kontakt':
        require('kontakt.php');
        break;

	case 'vortrag':
        require('vortrag.php');
        break;

	case 'formulare':
        require('formulare.php');
        break;

	case 'arbeitsmodule':
        require('arbeitsmodul.php');
        break;

	case 'vertrag':
        require('vertrag.php');
        break;

	case 'kategorien':
        require('kategorien.php');
        break;

	case 'eigene_daten':
        require('eigene_daten.php');
        break;

    case 'burgschafts_erkl':
        require('burgschafts_erkl.php');
        break;

    case 'prozesskosten':
        require('prozesskosten.php');
        break;

    case 'bussgeldrechner':
        require('bussgeldrechner.php');
        break;

    case 'zeugnis':
        require('zeugnis_arbeitnehmer.php');
        break;

    case 'userliste':
        require('userliste.php');
       #require('log.php');
        break;

    case 'login':
        require('login.php');
        break;

    case 'new_pass':
        require('new_pass.php');
        break;

    case 'artikel':
        require('artikel.php');
        break;

    case 'artikeladmin':
        require('artikeladmin.php');
        break;

    case 'artikelview':
        require('artikelview.php');
        break;

    case 'rechner':
        require('rechner.php');
        break;

    case 'rechnermodul':
        require('rechner_modul.php');
        break;

    case 'logout':
        $_SESSION['user'] = null;
        $_SESSION['login'] = false;
        header("Location: index.php");
        break;

    default:
        require('homepage.php');
        break;
}

	#$funktionen = new funktionen($smarty,$database);
	#$funktionen->log_insert();


#echo "<br>GET rechner-".$_GET['rechner'];
switch($_GET['rechner'])
{
	case "prozesskosten":
		require_once('prozesskosten.php');
		$smarty->assign('prozesskosten',true);
		$smarty->assign('contentTemplate', 'rechner.tpl');break;

	case "arb_geb_kund":

		if(!$_POST['berechnen'])
		{
			// MONITORING RECHNER DB INSERT
			$log_funk = new log_funk($smarty,$database);
			$log_funk->mod = 10;
			$log_funk->log_insert();
		}

		$smarty->assign('arb_geb_kund',true);
		$smarty->assign('contentTemplate', 'rechner.tpl');break;

	case "mutterschutz":
		new mutterschutzurlaub($smarty,$database);
		$smarty->assign('mutterschutz',true);
		$smarty->assign('contentTemplate', 'rechner.tpl');break;

	case "vermieter_kund":

		if(!$_POST['berechnen'])
		{
			// MONITORING RECHNER DB INSERT
			$log_funk = new log_funk($smarty,$database);
			$log_funk->mod = 9;
			$log_funk->log_insert();
		}

		$smarty->assign('vermieter_kund',true);
		$smarty->assign('contentTemplate', 'rechner.tpl');break;

	case "geschwindigkeit":
		require_once('bussgeldrechner.php');
		$smarty->assign('geschwindigkeit',true);
		$smarty->assign('contentTemplate', 'rechner.tpl');break;

	case "abstand":
		new bussgeldrechner_abstand($smarty,$database);
		$smarty->assign('abstand',true);
		$smarty->assign('contentTemplate', 'rechner.tpl');break;
}

if($_POST['agb_ablehnung']=='Ablehnen')
{
	$_SESSION['user'] = null;
    $_SESSION['login'] = false;
    header("Location: index.php");
}
$smarty->assign('kategorien', $_SESSION['kategorien']);//Darstellung in navi.tpl
$smarty->display(SMARTY_TEMPLATE_DIR."index.tpl");
$database->closeDB();