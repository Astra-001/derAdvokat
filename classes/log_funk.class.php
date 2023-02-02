<?php
class log_funk
{
	public $mod;
	public $unterkategorien_id = null;
	public $kategorien_id = null;
	public $artikel_id = null;
	public $rechner = null;

	public $table = null;

 	private $_smarty = null;
 	private $_database = null;

	public function __construct($_smarty,$_database)
	{
		$this->_smarty = $_smarty;
		$this->_database = $_database;
	}

	public function log_ausgabe($log)
	{
		#$where = "`uid`='" . mysql_escape_string(107) . "'";
	  	#$log->setWhere($where);
	  	$log->setOrderBy('`id` DESC');
		$log->select();
		$records = $log->getRecords();
		$anz = $log->countRecords();

		return array($records,$anz);
	}

	//--LOG TAB EINTRAG
	public function log_insert()
	{
//		if ($_SESSION['user']['status'])//!= STATUS_ADMIN
//		{
			$log = new mysqlTable($this->_database, 'log');

			if ($_SESSION['user']['status'])# != STATUS_ADMIN
			{
				$log->uid->setValue($_SESSION['user']['id']);
			}
			else
			{
				$log->uid->setValue(0);
			}

			$log->url->setValue($_SERVER['REQUEST_URI']);
			$log->ip->setValue(getenv('REMOTE_ADDR'));
			$log->useragent->setValue(getenv('HTTP_USER_AGENT'));
			$log->mod->setValue($this->mod);
			$log->unterkategorien_id->setValue($this->unterkategorien_id);
			$log->kategorien_id->setValue($this->kategorien_id);
			$log->artikel_id->setValue($this->artikel_id);
			$log->save();
//		}
	}

	function delete($id)
	{
		$log = new mysqlTable($this->_database, 'log');
	    $log->setWhere('id=' . $id);
	    $log->delete();
	}
}
?>
