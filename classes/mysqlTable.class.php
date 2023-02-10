<?php
/**
* klofuehrer_toilets.class.php
* @author Benjamin Wollenweber
* @package MDO
* @copyright 2008, Benjamin Wollenweber
* */
class mysqlTable
{
	/**
	* @var object Datenbankverbindung
	* @link database
	*/
	public $database;
	public $table;
	public $connection;
	/** @var array Tabellenfelder */
	public $fields = [[], []];
	/** @var string SQL Abfrage */
	public $sql;
	/** @var string SQL Where Klausel */
	public $where;
	/** @var string SQL Order By Klausel */
	public $orderBy;
	/** @var int SQL Limit Klausel*/
	public $limit;
	/** @var string SQL Select Funktion */
	public $selectFunc;
	/** @var string SQL Group By Klausel */
	public $groupBy;
	/** @var string SQL Having Klausel */
	public $having;

	/** @var array Datensätze */
	public $records = [];
	/** @var int Anzahl an Datensätzen */
	public $countRecords = 0;
	/** @var int Ausgewählte Datensätze */
	public $selectedRecord = 0;

	/**
  * @param string $database
  * @param string $table
  */
 function __construct($connection, $table, $database = DATABASE)
	{
		$this->database  = $database;
		$this->table     = $table; 
		$this->setConnection($connection);
		$this->connection->sendQuery("SHOW FIELDS FROM `" . $database . "`.`" . $table . "`;");
		while($field = $this->connection->fetchRow())
		{
			if(preg_match('/\(\d*\)/', $field[1], $length, PREG_OFFSET_CAPTURE))
			{
				$field[0] = substr($length[0][0], 1, strlen($length[0][0]) - 2);
				$field[1] = preg_replace('/\(\d*\)/', '', $field[1]);
			}
			
			array_push($this->fields[0] ,$field[0]);
			array_push($this->fields[1],  (array) new mysqlField($field));
		}
	}

	/**
	* Setzt die Datenbankverbindung für diese Tabelle
	*
	* @param object &$connection Datenbankverbindung
	*/
	function setConnection(&$connection)
	{
		$this->connection = &$connection;
	}

	/**
	* Lädt ein Datensatz in das Objekt.
	* Der Datensatz kann dabei ein indiziertes Array, ein Assoziatives Array oder ein Objekt dieser Klasse sein.
	*
	* @param mixed $record Datensatz
	* @return boolean Wenn erfolgreich true
	*/
	function load(mixed $record)
	{
		$return = true;

		if(is_object($record))
		{
			foreach($this->fields as $field)
				if(isset($record->$field)) $this->$field->setValue($record->$field);
		}
		elseif(is_array($record))
		{
			if(key($record))
				foreach($this->fields as $field)
					print_r( $record );
					print_r( $field );
					if(isset($record[$field])) $this->$field->setValue($record[$field]);
			else
				foreach($this->fields as $index => $field)
					if(isset($record[$index])) $this->$field->setValue($record[$index]);
		}
		else
		{
			foreach($this->fields as $field)
				$this->$field->setDefaultValue();

			$return = false;
		}

		return $return;
	}

	/**
	* Führ ein SQL Query aus mit dem Ziel Datensätze zu erhalten.
	*
	* @var boolean $loadRecord Wenn true werden die Datensätze in die Eigenschaft records geladen
	* @var string $select Gibt an welche Felder oder MySQL Funktion selektiert werden sollen
	* @return mixed Anzahl der Datensätze. Im Fehlerfall false
	*/
	function select($loadRecord = true, $select = "*")
	{
	
		$this->sql = trim("SELECT " . $this->selectFunc . $select . " FROM `" . $this->database . "`.`" . $this->table . "` " . $this->where . $this->groupBy . $this->having . $this->orderBy . $this->limit) . ";";

		if($this->connection->sendQuery($this->sql))
		{
			if($loadRecord)
			{
				$this->records = $this->connection->fetchAssocList();

				if($this->first())
					$this->countRecords = count($this->records);
				else
					$this->countRecords = 0;
			}

			return $this->countRecords;
		}
		else
		{
			unset($this->records);
			$this->countRecords = 0;

			return false;
		}
	}

	/**
	* Führ ein SQL Query aus mit dem Ziel das Ergebniss einer oder mehrerer Aggregatfunktionen zu erhalten
	*
	* @var boolean $loadRecord Wenn true werden die Datensätze in die Eigenschaft records geladen
	* @return array Mit der Rückgabe der Aggregatfunktionen
	* @link database
	*/
	function selectAggregate($function)
	{
		$this->select(false, $function);
		return $this->connection->fetchRow();
	}

	/**
	* Führ ein Query aus mit dem Ziel einen Datensatz zu speichern (SQL REPLACE)
	*
	* @return boolean Wenn erfolgreich true
	*/
	function save()
	{
		$this->sql = "REPLACE INTO `" . $this->database . "`.`" . $this->table . "` SET";

		foreach($this->fields as $field)
			$this->sql .= "`" . $field . "`=" . $this->$field->getSQLValue() . ", ";

		$this->sql = substr($this->sql, 0, strlen($this->sql) - 2) . ";";

		return $this->connection->sendQuery($this->sql);
	}

	/**
	* Lädt den zuletzt gespeicherten Datensatz
	*
	* @return boolean Wenn erfolgreich true
	*/
	function getReplacedRecord()
	{
		$where = null;
  foreach($this->fields as $field)
			if($this->$field->getValue()) $where .= "`" . $field . "`=" . $this->$field->getSQLValue() . " && ";

		$where = substr($where, 0, strlen($where) - 4);

		$this->setWhere($where);
		$this->select();
		$this->setWhere();

		if($this->countRecords() == 1)
			return true;
		else
			return false;
	}

	/**
	* Führ ein Query aus mit dem Ziel Datensätze zu löschen
	*
	* @return boolean Wenn erfolgreich true
	*/
	function delete()
	{
		if(strlen($this->where))
			$this->sql = "DELETE FROM `" . $this->database . "`.`" . $this->table . "` " . $this->where . ";";
		else
		{
			$this->sql = "DELETE FROM `" . $this->database . "`.`" . $this->table . "` WHERE";

			foreach($this->fields as $field)
				$this->sql .= "`" . $field . "`=" . $this->$field->getSQLValue() . " && ";

			$sql = substr($this->sql, 0, strlen($this->sql) - 2) . ";";

			// Datensatz aus Array löschen!
		}

		return $this->connection->sendQuery($this->sql);
	}

	/**
	* Lädt den ersten selektierten Datensatz
	*
	* @return boolean Wenn erfolgreich true
	*/
	function first()
	{
		if(isset($this->records[0]) && $this->load($this->records[0]))
        {
            $this->selectedRecord = 0;
			return true;
        }

		return false;
	}

	/**
	* Lädt den letzten selektierten Datensatz
	*
	* @return boolean Wenn erfolgreich true
	*/
	function last()
	{
		if(isset($this->records[$this->countRecords - 1]) && $this->load($this->records[$this->countRecords - 1]))
        {
            $this->selectedRecord = $this->countRecords - 1;
			return true;
        }

		return false;
	}

	/**
	* Lädt den nächsten selktierten Datensatz
	*
	* @return boolean Wenn erfolgreich true
	*/
	function next()
	{
		if($this->selectedRecord < $this->countRecords)
		{
			if(isset($this->records[$this->selectedRecord + 1]) && $this->load($this->records[$this->selectedRecord + 1]))
            {
                $this->selectedRecord++;
				return true;
            }
		}

		return false;
	}

	/**
	* Lädt den voherigen selktierten Datensatz
	*
	* @return boolean Wenn erfolgreich true
	*/
	function previous()
	{
		if($this->selectedRecord != 0)
		{

			if(isset($this->records[$this->selectedRecord - 1]) && $this->load($this->records[$this->selectedRecord - 1]))
            {
                $this->selectedRecord--;
				return true;
            }
		}

		return false;
	}

	/**
	* Setzt eine SQL Funktion die beim select mit ausgeführt wird
	*/
	function setSelectFunc($function = false)
	{
		if($function)
			$this->selectFunc = $function . " ";
		else
			$this->selectFunc = "";
	}

	/**
	* Setzt eine SQL Where Klausel
	*
	* @param string $where SQL Where Klausel
	*/
	function setWhere($where = false)
	{
		if($where)
			$this->where = "WHERE " . $where . " ";
		else
			$this->where = "";
	}

	/**
	* Setzt eine SQL Group By Klausel
	*
	* @param string $groupBy SQL Group By Klausel
	* @param string $having SQL Having Klausel
	*/
	function setGroupBy($groupBy = false, $having = false)
	{
		if($groupBy)
		{
			$this->groupBy = "GROUP BY " . $groupBy . " ";

			if($having)
				$this->having = "HAVING " . $having . " ";
			else
				$this->having = "";
		}
		else
		{
			$this->groupBy = "";
			$this->having = "";
		}
	}

	/**
	* Setzt eine SQL Order By Klausel
	*
	* @param string $orderBy SQL Order By Klausel
	*/
	function setOrderBy($orderBy = false)
	{
		if($orderBy)
			$this->orderBy = "ORDER BY " . $orderBy . " ";
		else
			$this->orderBy = "";
	}

	/**
	* Setzt eine SQL Limit Klausel
	*
	* @param int $rows Anzahl an Datensätzen
	* @param int $from Angefangen von Datensatz
	*/
	function setLimit($rows = false, $from = false)
	{
		if($from)
			$this->limit = "LIMIT " . $from . ", " . $rows;
		elseif($rows)
			$this->limit = "LIMIT " . $rows;
		else
			$this->limit = "";
	}

	/**
	* Gibt ein Array mit allen selektierten Datensätzen zurück
	*
	* @return array Datensätze
	*/
	function getRecords()
	{
		return $this->records;
	}

	/**
	* Gibt die Anzahl der selektierten Datensätze zurück
	*
	* @return int Anzahl an Datensätzen
	*/
	function countRecords()
	{
		return $this->countRecords;
	}

	/**
	* Gibt die Datenbanknamen zurück
	*
	* @return string Datenbankname
	*/
	function getDBName()
	{
		return $this->database;
	}

	/**
	* Gibt den Tabellennamen zurück
	*
	* @return string Tabellenname
	*/
	function getTableName()
	{
		return $this->table;
	}

	function __call($stringMethodName, $arrayParameter)
	{
		$mixedReturnValue = FALSE;

		if(preg_match('°^(set|get)([a-z_][a-z0-9_]*)$i°', $stringMethodName, $arrayResult) == 1)
		{
			if(isset ($this->$arrayResult[2]) === TRUE)
			{
				switch (strtoupper ($arrayResult[1]))
				{
					case 'SET':
						$mixedReturnValue = $this->$arrayResult[2];
						$this->$arrayResult[2] = $arrayParameter[0];
						break;
					case 'GET':
						$mixedReturnValue = $this->$arrayResult[2];
						break;
				}
			}
		}

		return $mixedReturnValue;
	}
}

/*define('DATABASE', 'klofuehrer');
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'kfc2008');
define('MYSQL_PASS', 'maria385');

require_once('database.class.php');
$db = new database();
$db->openDB();
$table = new mysqlTable($db, 'content');
print_r($table);*/
?>
