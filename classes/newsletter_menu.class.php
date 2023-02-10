<?php
if(!defined('INDEX_LOAD')) {
    header('Location: /derAdvokat/index.php');
}
if ($_SESSION['user']['status'] != STATUS_ADMIN)
{
    header('Location: /derAdvokat/index.php');
}
class newsletter_menu
{
 	public function __construct(private $_smarty,private $_database)
	{
		$this->_smarty->assign('contentTemplate', 'newsletter_menu.tpl');
	}
}
?>
