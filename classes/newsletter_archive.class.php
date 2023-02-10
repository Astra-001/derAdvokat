<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if ($_SESSION['user']['status'] != STATUS_ADMIN)
{
    header('Location: /derAdvokat/index.php');
}
class newsletter_archive
{
 	public function __construct(private $_smarty,private $_database)
	{
		$this->funktionen= new funktionen($_smarty,$_database);
		
		if($_POST['versand'])
		{
			$meldung="Danke! Ihr Newsletter ist versendet worden.";
			$this->_smarty->assign('erfolg', $meldung);
			$this->funktionen->newsletter_archive_versanddatum_eintrag($_smarty,$_database);
		}
		
		$this->funktionen->newsletter_archive($_smarty,$_database);
		
		if($_GET['act']=='del')
		{
			$this->funktionen->del_archive_eintrag($_smarty,$_database);;
		}
		
		$this->_smarty->assign('contentTemplate', 'newsletter_archive.tpl');
	}	
	
}
?>
