<?php
/**
* database.class.php
* @author Benjamin Wollenweber
* @package MDO
* @copyright 2008, Benjamin Wollenweber
* */
class mysqlDatabase
{
	/** @var ressource Connection Ressource */
	public $linkDB = NULL;
	/** @var string SQL Abfrage */
	public $sql;
	/** @var ressource SQL Result */
	public $result;

	/**
  * @param $host MySQL Host
  * @param $user MySQL Benutzer
  * @param $user MySQL Passwort
  * @param string $host
  * @param string $user
  * @param string $pass
  */
 function __construct(
     /** @var string MySQL Host */
     $host = MYSQL_HOST,
     /** @var string MySQL User */
     $user = MYSQL_USER,
     /** @var string MySQL Passwort */
     $pass = MYSQL_PASS
 )
 {
 }

	/**
	* Öffnet die Datenbankverbindung
	*
	* @return bool Im Erfolgsfall true
	*/
	function openDB()
	{
		// var_dump( new mysqli("localhost", "root", "") );
		if($this->linkDB = new mysqli("localhost", "root", ""))
		{
			mysqli_query( $this->linkDB,"SET NAMES 'utf8';",);
			return true;
		}
		else
			return false;
	}

	/**
	* Schließt die Datenbankverbindung
	*
	* @return bool Im Erfolgsfall true
	*/
	function closeDB()
	{
		return mysqli_close($this->linkDB);
	}

	/**
	* Gibt die MySQL Fehlermeldung zurück
	*
	* @return string MySQL Fehlermeldung
	*/
	function error()
	{
		return mysqli_error($this->linkDB);
	}

	/**
	* Sendet ein MySQL Query
	*
	* @param string $query MySQL Query
	* @return bool Im Erfolgsfall true
	*/
	function sendQuery($query)
	{
		$this->sql = $query;

		if(DEBUG)
			echo $this->sql . "<br />\n";

		if($this->result = mysqli_query($this->linkDB, $this->sql))
			return true;
		else
			return false;
	}

	/**
	* Gibt den aktuellen Datensatz als Indexiertes und Associatives Array zurück
	*
	* @return array Datensatz
	*/
	function fetchArray()
	{
		return @mysqli_fetch_array($this->result);
	}

	/**
	* Gibt den aktuellen Datensatz als Indexiertes Array zurück
	*
	* @return array Datensatz
	*/
	function fetchRow()
	{
		return @mysqli_fetch_row($this->result);
	}

	/**
	* Gibt den aktuellen Datensatz als Associatives Array zurück
	*
	* @return array Datensatz
	*/
	function fetchAssoc()
	{
		return @mysqli_fetch_assoc($this->result);
	}

	/**
	* Gibt den aktuellen Datensatz als Objekt zurück
	*
	* @return object Datensatz
	*/
	function fetchObject()
	{
		return @mysql_fetch_object($this->result);
	}

	/**
	* Gibt ein Feld des aktuellen Datensatz zurück.
	* Das Feld ist als nummerischer Index zu übergeben.
	*
	* @var int $field Arrayindex
	* @return mixed Feld
	*/
	function fetchResult($field = 0)
	{
		if($row = $this->fetchRow())
			return $row[$field];
		else
			return false;
	}

	/**
	* Gibt alle Datensätze als Indexiertes und Associatives Array zurück
	*
	* @return array Datensätze
	*/
	function fetchArrayList()
	{
		$rows = [];

        while($row = $this->fetchArray())
			$rows[] = $row;

		return $rows;
	}

	/**
	* Gibt alle Datensätze als Indexiertes Array zurück
	*
	* @return array Datensätze
	*/
	function fetchRowList()
	{
		$rows = [];

        while($row = $this->fetchRow())
			$rows[] = $row;

		return $rows;
	}

	/**
	* Gibt alle Datensätze als Associatives Array zurück
	*
	* @return array Datensätze
	*/
	function fetchAssocList()
	{
		$rows = [];

        while($row = $this->fetchAssoc())
			$rows[] = $row;

		return $rows;
	}

	/**
	* Gibt alle Datensätze als Objekte zurück
	*
	* @return array Datensätze
	*/
	function fetchObjectList()
	{
		$rows = [];

        while($row = $this->fetchObject())
			$rows[] = $row;

		return $rows;
	}

	/**
	* Gibt ein Feld aller Datensäte zurück.
	* Das Feld ist als nummerischer Index zu übergeben.
	*
	* @param int $field Arrayindex
	* @return array Felder
	*/
	function fetchResultList($field = 0)
	{
		$rows = [];

        while($row = $this->fetchResult($field))
			$rows[] = $row;

		return $rows;
	}
}
?>