<?php
/**
* mysqlField.class.php
* @author Benjamin Wollenweber
* @package MDO
* @copyright 2008, Benjamin Wollenweber
* */
class mysqlField
{
	/** @var string Feldname */
	public $name;
	/** @var string Feldtyp */
	public $type;
	/** @var string Null erlaubt */
	public $null;
	/** @var string Schlüssel */
	public $key;
	/** @var string Standardwert */
	public $default;
	/** @var string Extra */
	public $extra;
	/** @var string Feldwert */
	public $value;
	/** @var float Feldlänge */
	public $length;
	/** @var string Typ des Feldwerts */
	public $valueType;

	/**
	* Nimmt ein Array mit allen relevaten Feldwerten entgegen und setzt die Eigenschaften.
	*
	* @param array $field Feldeigenschaften
	*/
	function __construct($field)
	{
		$this->name = $field[0];
		$this->type = $field[1];
		$this->null = $field[2];
		$this->key =  $field[3];
		$this->default = $field[4];
		$this->extra = $field[5];

		if( isset($field[6]) )
			$this->length = $field[6];

		$this->setDefaultValue();
	}

	/**
	* Setzt den Standardwert des Feldes.
	*/
	function setDefaultValue()
	{
		if($this->default == 'CURRENT_TIMESTAMP')
			$this->setValue($this->default, 'FUNC');
		else
			$this->setValue($this->default);
	}

	/**
	* Überprüft ob der zu setztende Wert im Datenbankfeld eingetragen werden kann.
	*
	* @param mixed $value Wert
	* @param string $type Typ des Wertes. Für MySQL Funktionen ist 'FUNC' zu übergeben
	* @return bool Erfolg
	*/
	function setValue(mixed $value, $type = '')
	{
		$value = trim(stripslashes($value));

		if(strlen($value))
		{
			if((((preg_match('/int/i', $this->type) && preg_match('/^-?\d+$/', $value)) ||                          // Ganzzahlenfeld
				(preg_match('/(float|double|decimal)/i', $this->type) && preg_match('/^-?\d+\.?\d*$/', $value)) ||  // Gleitzahlenfeld
				(preg_match('/enum/i', $this->type) && preg_match('/' . $value . '/', $this->type)) ||                    // Auswahl
				 preg_match('/(char|text|blob|time|date|year)/i', $this->type)) &&                               // Alles andere
				(strlen($value) <= $this->length || $this->length == 0)) || $type == 'FUNC')                      // L?nge des Feldes
			{
				$this->value = $value;
			}
			else
				return false;
		}
		elseif(strlen($this->default))
			$this->setDefaultValue();
		else
			$this->value = '';

		$this->valueType = $type;

		return true;
	}

	/**
	* Gibt den Wert so zurück das er für ein MySQL Query verwendet werden kann
	*
	* @param bool Geben sie an ob die Werte durch Magic Quotes escaped wurden
	* @return string Für MySQL escapedes Attribut
	*/
	function getSQLValue()
	{
		if($this->valueType == 'FUNC')
			return $this->value;
		else
			return "'" . mysql_escape_string($this->value) . "'";
	}

	/**
	* Gibt den Wert zurück
	*
	* @return string Wert
	*/
	function getValue()
	{
		return $this->value;
	}

	/**
	* Gibt den Typ des Wertes zurück.
	* Also ob es sich um 'FUNC' handelt oder nicht.
	*
	* @return string Typ des Wertes
	*/
	function getValueType()
	{
		return $this->valueType;
	}

	/**
	* Gibt des Feldtype zurück
	*
	* @return string Feldtyp
	*/
	function getType()
	{
		return $this->type;
	}

	/**
	* Gibt den Standardwert zurück
	*
	* @return mixed Standardwert
	*/
	function getDefaultValue()
	{
		return $this->default;
	}

	/**
	* Gibt die Länge des Feldes zurück
	*
	* @return int Feldlänge
	*/
	function getLength()
	{
		return $this->length;
	}
}
?>
