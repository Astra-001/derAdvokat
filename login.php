<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
	$user = new mysqlTable($database, 'user');

	if ($_POST['agb_sent']=='Akzeptieren')
	{
		$where = "`id`='" . mysql_escape_string($_SESSION['user']['id']) . "'";
	    $where .= " && `status`>0";
	    $user->setWhere($where);

		$user->setWhere('id =' . $_SESSION['user']['id']);
		$user->select();
		$user->status->setValue(STATUS_ACTIVE_AGB);
    	$user->save();
	}
	if($_POST['login']=='Login')
	{
	    $where = "`email`='" . mysql_escape_string($_REQUEST['email']) . "'";
	    $where .= " && `passwort`=md5('" . mysql_escape_string($_REQUEST['passwort']) . "')";
	    $where .= " && `status`>0";
	    $user->setWhere($where);
	}
    $user->select();
	$records = $user->getRecords();
	#echo "<pre>";
	#print_r($records);
	#echo "</pre>";
    if (isset($user->records[0]['id']))
    {
        $_SESSION['user'] = $user->records[0];

        #echo "<pre>";
        #print_r($_SESSION['user']);
        #echo "</pre>";

        $_SESSION['login'] = true;
        $smarty->assign('msg', "");

        $user->setWhere('id =' . $user->records[0]['id']);
	    $user->select();
	    $user->letzte_anmeldung->setValue(date("Y-m-d G:i:s"));
	    $user->logins->setValue($user->records[0]['logins']+1);
        $user->save();
    }
    else
    {
        $_SESSION['login'] = false;
        $smarty->assign('msg', "Ungültige Benutzerdaten! Bitte versuchen Sie es erneut!");
        $smarty->assign('contentTemplate', 'login.tpl');
    }

    if ($_SESSION['user']['status'] == STATUS_ADMIN)
    {
        $_SESSION['navTemplate'] = "tpl/admin.tpl";
        $smarty->assign('contentTemplate', 'admin.tpl');
    }
    else if ($_SESSION['user']['status'] == STATUS_ACTIVE OR $_SESSION['user']['status'] == STATUS_ACTIVE_AGB)
    {
    	#echo "Logins-".$_SESSION['user']['status'];
    	if($_SESSION['user']['status']==STATUS_ACTIVE)
    	{
    		$_SESSION['navTemplate'] = "tpl/agb.tpl";
        	$smarty->assign('contentTemplate', 'agb.tpl');
    	}
    	if($_SESSION['user']['status']==STATUS_ACTIVE_AGB)
    	{
        	$_SESSION['navTemplate'] = "tpl/kunde.tpl";
        	$smarty->assign('contentTemplate', 'kunde.tpl');
    	}
    }
}
else
{
    $smarty->assign('contentTemplate', 'login.tpl');
}
