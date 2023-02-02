<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if ($_SESSION['user']['status'] != STATUS_ADMIN)
{
    header('Location: /derAdvokat/index.php');
}
class newsletter
{
 	private $_smarty = null;
 	private $_database = null;

	public function __construct($_smarty,$_database)
	{
		$this->_smarty = $_smarty;
		$this->_database = $_database;

		$this->funktionen= new funktionen($_smarty,$_database);
		
		#$this->reload_check= new reload_check($_smarty,$_database);
		#$get_formtoken=$this->reload_check->get_formtoken($_smarty,$_database);
		#$this->_smarty->assign('get_formtoken', $get_formtoken);	
		#$_SESSION['token_check']=$get_formtoken;
			
		#echo "<pre>";
		#print_r($_SESSION['token_check']);
		#echo "</pre>";
		/*switch($_POST['task_empf'])
		{
			case 2: echo $_POST['task_empf'];break;
			case 3: echo $_POST['task_empf'];break;
		}*/
		if($_POST['vorschau'])
		{
			$eingabe_check=$this->funktionen->eingabe_check();

			#$easycheck=$this->reload_check->easycheck($_smarty,$_database);
			/*<input type="text" name="token_check" value="{$get_formtoken}" size="50"/>*/
			#echo "<pre>";
			#print_r($easycheck);
			#echo "</pre>";
			
			#echo "<pre>";
			#print_r($_SESSION['token_array']);
			#echo "</pre>";
			
			if($eingabe_check[0]==TRUE)
			{				
				$newsletter_eintrag=$this->funktionen->newsletter_eintrag($_smarty,$_database);
		
				#echo "<pre>";
				#print_r($newsletter_eintrag);
				#echo "</pre>";
				
				$newsletter_vorschau=$this->funktionen->newsletter_vorschau($newsletter_eintrag,$_smarty,$_database);
				$this->_smarty->assign('newsletter_vorschau', $newsletter_vorschau);
		    	
				#echo "<pre>";
				#print_r($newsletter_vorschau);
				#echo "</pre>";
				
				#echo "<pre>";
				#print_r($_POST['empfanger']);
				#echo "</pre>";
				
				$this->_smarty->assign('nl_id',$newsletter_vorschau[0]['id']);
				
				$this->funktionen->newsletter_artikeln($newsletter_vorschau[0]['id'],$_smarty,$_database);

				$this->_smarty->assign('mail', EMAIL);

				$this->_smarty->assign('contentTemplate', 'newsletter_vorschau.tpl');
				
				
			}
			else
			{
				$this->funktionen->show_artikel_newsletter($_smarty,$_database);
				$this->funktionen->show_empfanger($_smarty,$_database);
				$this->_smarty->assign('error', $eingabe_check[1]);
				$this->_smarty->assign('contentTemplate', 'newsletter.tpl');
			}
		}
		else
		{		
			if($_GET['nl_id'])
			{
				#echo "Newsletter_id-".$_GET['nl_id'];	
				$this->funktionen->show_edit_newsletter($_smarty,$_database);	
				$this->funktionen->show_edit_empfanger($_smarty,$_database);
			}
			
			$this->funktionen->show_empfanger($_smarty,$_database);
			$this->funktionen->show_artikel_newsletter($_smarty,$_database);

			#echo "<pre>";
			#print_r($eingabe_check);
			#echo "</pre>";
			
			if($_POST['selbsttest'])
			{
				#echo "Selbsttest";
				if($_GET['nl_id'])
				{
					$nl_id=$_REQUEST['nl_id'];
				}
				else
				{
					$nl_id=$_POST['nl_id'];
				}
				#echo "<br>nl-".$nl_id;
				$newsletter_vorschau=$this->funktionen->newsletter_vorschau($nl_id,$_smarty,$_database);
				
				#echo "<pre>";
				#print_r($newsletter_vorschau);
				#echo "</pre>";
				
				$newsletter_artikeln=$this->funktionen->newsletter_artikeln($newsletter_vorschau[0]['id'],$_smarty,$_database);

				$this->_smarty->assign('mail', EMAIL);

				$mail_selbsttest=$this->funktionen->mail_selbsttest($_smarty,$_database);
				#$job_eintrag=$this->funktionen->job_eintrag($_smarty,$_database);
				$this->_smarty->assign('newsletter_vorschau', $newsletter_vorschau);
				$this->_smarty->assign('contentTemplate', 'newsletter_vorschau.tpl');
			}
			if($_POST['versand'])
			{
				#echo "Versand";
				$job_eintrag=$this->funktionen->job_eintrag($_smarty,$_database);
				new newsletter_archive($_smarty,$_database);
			}
			if(!$_POST['versand'] AND !$_POST['selbsttest'])
			{
				$this->_smarty->assign('contentTemplate', 'newsletter.tpl');
			}
		}
	}
}
?>