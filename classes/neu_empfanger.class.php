<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if ($_SESSION['user']['status'] != STATUS_ADMIN)
{
    header('Location: /derAdvokat/index.php');
}
class neu_empfanger
{
 	private $_smarty = null;
 	private $_database = null;

	public function __construct($_smarty,$_database)
	{
		$this->_smarty = $_smarty;
		$this->_database = $_database;

		$this->funktionen= new funktionen($_smarty,$_database);
		
		if(isset($_POST['neu_empfanger']))
		{
			if($_POST['email']=="")
			{
		  		$meldung="E-Mail Adresse fehlt";
		  		$this->_smarty->assign('error', $meldung);
			}
			if(!$meldung)
			{
				$adressbuch_eintrag=$this->funktionen->adressbuch_eintrag($_smarty,$_database);
				header('Location: /derAdvokat/newsletter_user_neu');
			}
		}
				
		if(isset($_GET['act'])=="del")
		{
			$this->funktionen->del_adressbuch_eintrag($_smarty,$_database);
		}
		$show_adressbuch_eintrag=$this->funktionen->show_adressbuch_eintrag($_smarty,$_database);
		
		#echo "<pre>";
		#print_r($show_adressbuch_eintrag);
		#echo "</pre>";
		
		$this->_smarty->assign('contentTemplate', 'neu_empfanger.tpl');
	}	
	
}
?>