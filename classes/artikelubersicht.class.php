<?php

#require_once("funktionen.class.php");

class artikelubersicht
{
 	public function __construct(private $_smarty,private $_database)
	{
		$this->funktionen= new funktionen($_smarty,$_database);
		$show_artikel_newsletter=$this->funktionen->show_artikel_newsletter($_smarty,$_database);
		

		#echo "<pre>";
		#print_r($eingabe_check);
		#echo "</pre>";
		
		$this->_smarty->assign('contentTemplate', 'artikelubersicht.tpl');
	}
	
}
?>